<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\XeMay;
use App\Models\ChuXe;
use App\Models\GiaoDich;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{


    public function addMotor()
    {
        return view('admin.add_motor');
    }

    public function detailMotor(Request $request)
    {
        $idXe = $request->query('id_xe');

        // Tìm sản phẩm bằng Model
        $sanPham = XeMay::find($idXe);
    
        // Kiểm tra sản phẩm có tồn tại hay không
        if (!$sanPham) {
            abort(404, 'Sản phẩm không tồn tại');
        }
    
        // Trả dữ liệu về view
        return view('admin.detail_motor', ['sanPham' => $sanPham]);
    }

    public function editMotor(Request $request)
    {
        // Lấy ID từ query string
        $id = $request->query('id_xe');
    
        // Tìm thông tin xe cần chỉnh sửa
        $xeMay = XeMay::find($id);
    
        // Kiểm tra xem xe có tồn tại không
        if (!$xeMay) {
            return redirect()->route('admin.list_motor')->with('error', 'Xe không tồn tại.');
        }
    
        // Truyền thông tin xe vào view
        return view('admin.edit_motor', compact('xeMay'));
    }
    public function update(Request $request, $id)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'loai_xe' => 'required|integer',
            'ten_xe' => 'required|string|max:255',
            'mau_sac' => 'required|string|max:255',
            'cong_nghe' => 'required|string|max:255',
            'gia' => 'required|numeric',
            'tinh_nang' => 'nullable|string',
            'thiet_ke' => 'nullable|string',
            'tienich_antoan' => 'nullable|string',
            'hinh_anh' => 'nullable|url',
        ]);

        // Tìm xe theo ID
        $xeMay = XeMay::findOrFail($id);

        // Cập nhật thông tin xe
        $xeMay->update([
            'loai_xe' => $request->loai_xe,
            'ten_xe' => $request->ten_xe,
            'mau_sac' => $request->mau_sac,
            'cong_nghe' => $request->cong_nghe,
            'gia' => $request->gia,
            'tinh_nang' => $request->tinh_nang,
            'thiet_ke' => $request->thiet_ke,
            'tienich_antoan' => $request->tienich_antoan,
            'hinh_anh' => $request->hinh_anh,
        ]);

        // Quay lại trang danh sách hoặc trang chi tiết sau khi cập nhật thành công
        return redirect()->route('admin.list_motor')->with('success', 'Cập nhật xe thành công!');
    }



    public function listMotor()
    {
        $sanPhams = XeMay::all();

        // Truyền dữ liệu sang view
        return view('admin.list_motor', compact('sanPhams'));
    }

   
    public function deleteMotor(Request $request)
    {
        // Lấy id_xe từ query string
        $idXe = $request->query('id_xe');

        // Tìm sản phẩm cần xóa
        $sanPham = XeMay::find($idXe);

        // Kiểm tra sản phẩm có tồn tại không
        if (!$sanPham) {
            abort(404, 'Sản phẩm không tồn tại');
        }

        // Xóa sản phẩm
        $sanPham->delete();

        // Điều hướng về danh sách sản phẩm với thông báo thành công
        return redirect()->route('admin.list_motor')->with('success', 'Sản phẩm đã được xóa thành công!');
    }
    public function search(Request $request)
    {
        // Lấy dữ liệu từ form gửi đến
        $brand = $request->input('brand');
        $model = $request->input('model');
        $dongxe = $request->input('dongxe');
        $color = $request->input('color');

        // Tìm kiếm xe máy theo các điều kiện
        $query = XeMay::query();

        if ($brand) {
            $query->where('loai_xe', $brand);  // Tìm theo loại xe
        }

        if ($model) {
            $query->where('ten_xe', 'like', '%' . $model . '%');  // Tìm theo tên xe
        }

        if ($dongxe) {
            $query->where('dong_xe', 'like', '%' . $dongxe . '%');  // Tìm theo dòng xe
        }

        if ($color) {
            $query->where('mau_sac', 'like', '%' . $color . '%');  // Tìm theo màu sắc
        }

        // Lấy kết quả tìm kiếm
        $motors = $query->get();

        // Trả kết quả về view
        return view('admin.vehicle_lookup', ['motors' => $motors]);
    }
    public function store(Request $request)
    {
        // Xác thực dữ liệu
        $validatedData = $request->validate([
            'dong_xe'=>'required|string|max:255',
            'bien_so'=>'nullable|string|max:15',
            'loai_xe' => 'required|integer',
            'ten_xe' => 'required|string|max:255',
            'mau_sac' => 'required|string|max:255',
            'cong_nghe' => 'required|string|max:255',
            'gia' => 'required|numeric',
            'tinh_nang' => 'required|string|max:255',
            'thiet_ke' => 'required|string|max:255',
            'tienich_antoan' => 'required|string|max:255',
            'hinh_anh' => 'required|url',
        ]);

        // Lưu thông tin xe vào cơ sở dữ liệu
        XeMay::create($validatedData);

        // Chuyển hướng về trang danh sách xe và thông báo thành công
        return redirect()->route('admin.list_motor')->with('success', 'Thông tin xe đã được thêm thành công!');
    }
    public function accountAdmin()
    {
        return view('admin.account_admin');
    }

    // public function addCustomer()
    // {
    //     return view('admin.add_customer');
    // }

   

    public function customerLookup()
    {
        return view('admin.customer_lookup');
    }



    public function editCustomer(Request $request)
    {
    // Lấy ID xe từ query string
        $id_xe = $request->query('id_xe');

        // Lấy thông tin xe máy
        $xemay = XeMay::with('chuXe')->findOrFail($id_xe);

        // Lấy thông tin chủ xe từ xe máy
        $chuxe = $xemay->chuXe;

        return view('admin.edit_customer', compact('xemay', 'chuxe'));
    }

    public function updateCustomer(Request $request)
{
    // Kiểm tra và lấy dữ liệu từ request
    $validated = $request->validate([
        'id_xe'=> 'required|string',
        'ho_ten' => 'required|string|max:255',
        'so_dien_thoai' => 'required|string|max:20',
        'dia_chi' => 'required|string|max:255',
        'bien_so' => 'required|string|max:20',
        'mau_sac' => 'required|string|max:50',
        'dong_xe' => 'nullable|string|max:255',
        'ten_xe' => 'nullable|string|max:255',
        'loai_xe' => 'required|integer',
    ]);

    // Cập nhật dữ liệu vào bảng `chu_xe` và `xe_may`
    $chuxe = ChuXe::where('id_xe', $request->id_xe)->first();
    if (!$chuxe) {
        return redirect()->back()->withErrors(['message' => 'Chủ xe không tồn tại.']);
    }

    // Cập nhật thông tin chủ xe
    $chuxe->update([
        'ho_ten' => $validated['ho_ten'],
        'so_dien_thoai' => $validated['so_dien_thoai'],
        'dia_chi' => $validated['dia_chi'],
    ]);

    // Cập nhật thông tin xe
    $xemay = XeMay::where('id_xe', $request->id_xe)->first();
    if ($xemay) {
        $xemay->update([
            'bien_so' => $validated['bien_so'],
            'loai_xe' => $validated['loai_xe'],
            'ten_xe' => $validated['ten_xe'],
            
            'mau_sac' => $validated['mau_sac'],
            'dong_xe'=> $validated['dong_xe']
        ]);
    }

    return redirect()->route('admin.list.customer')->with('success', 'Cập nhật thành công!');
}




    public function historyCustomer(Request $request)
    {
        $idChuXe = $request->query('id_chu_xe');
        $giaodich = GiaoDich::where('id_nguoi_mua', $idChuXe)
        ->orWhere('id_nguoi_mua', $idChuXe)
        ->with(['xeMay', 'nguoiBan', 'nguoiMua'])
        ->get();
        return view('admin.history_customer', compact('giaodich'));
    } 
    


    public function statistical()
    {
        return view('admin.statistical');
    }

    public function tradeMaintenance()
    {
        return view('admin.trade_maintenance');
    }

   

    public function transactionList()
    {
        $giaodich = GiaoDich::with(['xeMay', 'nguoiBan', 'nguoiMua'])->get();
        return view('admin.transaction_list',compact('giaodich'));
    }
    public function trade(Request $request)
    {
        try {
            // Xác thực dữ liệu đầu vào
            $validatedData = $request->validate([
                'ho_ten' => 'required|string|max:255',
                'so_dien_thoai' => 'required|string|max:11|regex:/^0[0-9]{9,10}$/',
                'ngay_giao_dich' => 'required|date|before_or_equal:today',
                'loai_giao_dich' => 'required|string|in:Bảo dưỡng,Sửa chữa',
                'ghi_chu' => 'required|string|max:255',
                'gia_ban' => 'required|numeric',
                'ten_xe' => 'string|max:255',
                'bien_so' => 'required|string|max:15',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
    
        // Kiểm tra biển số trong bảng XeMay
        $vehicle = XeMay::firstOrCreate(
            ['bien_so' => $validatedData['bien_so']], // Điều kiện tìm xe
            ['ten_xe' => $validatedData['ten_xe']]  // Nếu không có, tạo xe mới
        );
    
        // Kiểm tra chủ xe theo số điện thoại
        $owner = ChuXe::firstOrCreate(
            ['so_dien_thoai' => $validatedData['so_dien_thoai']], // Điều kiện tìm chủ xe
            [
                'ho_ten' => $validatedData['ho_ten'],
                'id_xe' => $vehicle->id_xe  // Gắn id_xe vào chủ xe
            ]
        );
    
        // Tạo giao dịch
        GiaoDich::create([
            'id_xe' => $vehicle->id_xe,  // ID xe
            'ngay_giao_dich' => $validatedData['ngay_giao_dich'],
            'gia_ban' => $validatedData['gia_ban'],
            'ghi_chu' => $validatedData['ghi_chu'],
            'loai_giao_dich' => $validatedData['loai_giao_dich'],
            'id_nguoi_ban' => auth()->id(),
            'id_nguoi_mua' => $owner->id_chu_xe,  // ID chủ xe mua
        ]);
    
        return redirect()->route('admin.trade.maintenance')->with('success', 'Thông tin xe đã được thêm thành công!');
    }
    // Hiển thị form thêm admin
    public function addAD()
    {
        return view('admin.add_admin'); // Trả về view form thêm admin
    }

    // Hiển thị form chỉnh sửa admin
    public function editAD()
    {
      

        return view('admin.edit_admin'); // Trả về view form chỉnh sửa admin
    }

    // Hiển thị danh sách admin
    public function listAD()
    {
       
        return view('admin.list_admin'); // Trả về view danh sách admin
    }

    // Hiển thị thông tin liên hệ
    public function contact()
    {
        return view('admin.contact'); // Trả về view thông tin liên hệ
    }
   // Minh Tue 



    // public function accountAdmin()
    // {
    //     // Đổi tên view cho đúng với file account_admin.blade.php
    //     return view('admin.account_admin'); 
    // }

    public function addCustomer(Request $request)
    {
        $idXe = $request->query('id_xe');

        // Tìm sản phẩm bằng Model
        $sanPham = XeMay::find($idXe);
    
        return view('admin.add_customer', ['sanPham' => $sanPham]);
    }
    public function addnguoidung(Request $request)
    {
        // Xác thực dữ liệu
        $validatedData = $request->validate([
            'id_xe'        => 'required|exists:xe_may,id_xe', // ID xe cần nhân bản
            'ho_ten'       => 'required|string|max:255',
            'so_cmnd'      => 'required|string|max:12',
            'so_dien_thoai'=> 'required|string|max:11',
            'dia_chi'      => 'required|string',
            'bien_so'      => 'nullable|string|max:15',
            'so_khung'     => 'nullable|string|max:50',
            'so_may'       => 'nullable|string|max:50',
        ]);

        // Lấy dữ liệu xe gốc theo `id_xe`
        $xeGoc = XeMay::findOrFail($validatedData['id_xe']);

        // Tạo bản ghi mới cho xe
        $xeMoi = XeMay::create([
            'hinh_anh' => $xeGoc->hinh_anh,
            'bien_so'  => $validatedData['bien_so'] ?? $xeGoc->bien_so,
            'dong_xe'  => $xeGoc->dong_xe,
            'ten_xe'   => $xeGoc->ten_xe,
            'gia'      => $xeGoc->gia,
            'mau_sac'  => $xeGoc->mau_sac,
            'so_khung' => $validatedData['so_khung'] ?? $xeGoc->so_khung,
            'so_may'   => $validatedData['so_may'] ?? $xeGoc->so_may,
            'loai_xe'  => $xeGoc->loai_xe,
            'tinh_nang' => $xeGoc->tinh_nang,
            'cong_nghe' => $xeGoc->cong_nghe,
            'thiet_ke'  => $xeGoc->thiet_ke,
            'tienich_antoan' => $xeGoc->tienich_antoan,
        ]);

        // Thêm chủ xe mới gắn với xe vừa tạo
        $chuXe = new ChuXe();
        $chuXe->ho_ten = $validatedData['ho_ten'];
        $chuXe->so_cmnd = $validatedData['so_cmnd'];
        $chuXe->so_dien_thoai = $validatedData['so_dien_thoai'];
        $chuXe->dia_chi = $validatedData['dia_chi'];
        $chuXe->id_xe = $xeMoi->id_xe; // Gắn với xe mới
        $chuXe->save();

        return redirect()->route('admin.list_motor')->with('success', 'Thêm xe mới và chủ xe thành công!');
    }

    public function searchcustomer(Request $request)
    {
        // Lấy giá trị từ form
        $dongxe = $request->input('dongxe');  // Biển số xe
        $phone = $request->input('phone');    // Số điện thoại khách hàng

        // Xây dựng query tìm kiếm cho bảng xe_may
        $query = XeMay::query();

        // Tìm kiếm theo biển số xe (bảng xe_may)
        if ($dongxe) {
            $query->where('bien_so', 'LIKE', '%' . $dongxe . '%');
        }

        // Tìm kiếm theo số điện thoại của khách hàng (bảng chu_xe)
        if ($phone) {
            $query->whereHas('chuXe', function ($query) use ($phone) {
                $query->where('so_dien_thoai', 'LIKE', '%' . $phone . '%');
            });
        }

        // Thực hiện eager loading quan hệ chuXe (lấy thông tin chủ xe cùng lúc)
        $vehicles = $query->with('chuXe')->get();  // eager load dữ liệu từ bảng chu_x
// Trả về kết quả tìm kiếm ra view
        return view('admin.customer_lookup', compact('vehicles'));
    }
    public function tradeMotor(Request $request)
    {
$idXe = $request->query('id_xe');

        // Tìm sản phẩm bằng Model
        $sanPham = XeMay::find($idXe);
    
        return view('admin.trade_motor', ['sanPham' => $sanPham]);
    }
    public function processForm(Request $request)
    {
        try {
            // Kiểm tra biển số xe xem đã tồn tại chưa
            $vehiclePlate = $request->input('update_plate');
            if (XeMay::where('bien_so', $vehiclePlate)->exists()) {
                return redirect()->back()->withErrors(['update_plate' => 'Biển số xe này đã tồn tại!']);
            }

            // Validate all input data
            $validatedData = $request->validate([
                'vehicle_id' => 'required|exists:xe_may,id_xe',
                'owner_name' => 'required|string|max:255',
                'owner_phone' => 'required|string|max:11|regex:/^[0-9]+$/',
                'owner_cmnd' => 'required|string|max:12|regex:/^[0-9]+$/',
                'owner_address' => 'nullable|string|max:500',
                'update_plate' => 'required|string|max:15',  // Đã kiểm tra unique ở trên
                'vehicle_price' => 'required|numeric|min:0',
                'transaction_date' => 'required|date',
                'transaction_type' => 'required|in:Mua xe,Bảo dưỡng,Sửa chữa',
                'transaction_note' => 'nullable|string|max:500',
            ]);

            // Thêm chủ xe
            $chuXe = ChuXe::create([
                'ho_ten' => $validatedData['owner_name'],
                'so_dien_thoai' => $validatedData['owner_phone'],
                'dia_chi' => $validatedData['owner_address'],
                'so_cmnd' => $validatedData['owner_cmnd'],
                
                'id_xe' => $validatedData['vehicle_id'],
            ]);

            // Cập nhật biển số xe
            $xe = XeMay::findOrFail($validatedData['vehicle_id']);
            $xe->update([
                'bien_so' => $validatedData['update_plate'],
            ]);

            // Thêm giao dịch
            GiaoDich::create([
                'id_xe' => $validatedData['vehicle_id'],
                'ngay_giao_dich' => $validatedData['transaction_date'],
                'gia_ban' => $validatedData['vehicle_price'],
                'loai_giao_dich' => $validatedData['transaction_type'],
                'ghi_chu' => $validatedData['transaction_note'],
                'id_nguoi_ban' => auth()->check() ? auth()->id() : 1, // Nếu chưa đăng nhập, dùng ID mặc định là 1
                'id_nguoi_mua' => $chuXe->id_chu_xe,
            ]);

            // Redirect back with success message
            return redirect()->route('admin.list_motor')->with('success', 'Giao dịch đã được tạo thành công!');
            
        } catch (\Exception $e) {
            // Catch any unexpected errors and redirect back with error message
return redirect()->back()->withErrors('Đã xảy ra lỗi: ' . $e->getMessage());
        }
    }
}     
