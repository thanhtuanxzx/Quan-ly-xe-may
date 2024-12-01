<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\XeMay;
use App\Models\ChuXe;
use App\Models\GiaoDich;
use App\Models\LienHe;
use App\Models\NguoiDung;
use Illuminate\Support\Facades\Validator;
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
    


    public function statistical(Request $request)
    {
        // Lấy query ban đầu
        $query = GiaoDich::query();
    
        // Kiểm tra và áp dụng điều kiện lọc loại giao dịch (nếu có)
        if ($request->filled('loai_giao_dich')) {
            $query->where('loai_giao_dich', $request->input('loai_giao_dich'));
        }
    
        // Lọc theo ngày giao dịch trong 6 tháng gần đây và sắp xếp
        $giaoDich = $query->where('ngay_giao_dich', '>=', now()->subMonths(6))
                          ->orderByDesc('ngay_giao_dich')
                          ->get();
    
        // Nhóm giao dịch theo tháng và loại giao dịch
        $thongKe = $giaoDich->groupBy(function($item) {
            return \Carbon\Carbon::parse($item->ngay_giao_dich)->format('Y-m'); // Nhóm theo tháng (format: YYYY-MM)
        });
    
        // Tính tổng giá trị cho mỗi tháng
        $thongKeData = [];
        foreach ($thongKe as $month => $transactions) {
            $muaBan = $transactions->where('loai_giao_dich', 'Mua xe')->sum('gia_ban');
            $baoDuong = $transactions->whereIn('loai_giao_dich', ['Bảo dưỡng', 'Sửa chữa'])->sum('gia_ban');
            $tong = $muaBan + $baoDuong;
    
            $thongKeData[] = [
                'thang' => $month,
                'mua_ban' => $muaBan,
                'bao_duong' => $baoDuong,
                'tong' => $tong
            ];
        }
    
        // Trả về view với dữ liệu thống kê
        return view('admin.statistical', compact('thongKeData'));
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
    
        // Kiểm tra biển số
        $vehicle = XeMay::where('bien_so', $validatedData['bien_so'])->first();
    
        if ($vehicle) {
            // Kiểm tra xem xe này đã gắn với một chủ xe khác
            $existingOwner = ChuXe::where('id_xe', $vehicle->id_xe)->first();
            if ($existingOwner && $existingOwner->so_dien_thoai !== $validatedData['so_dien_thoai']) {
                return back()->withErrors(['bien_so' => 'Biển số này đã được gắn với một chủ xe khác!']);
            }
        } else {
            // Tạo xe mới nếu chưa tồn tại
            $vehicle = XeMay::create([
                'bien_so' => $validatedData['bien_so'],
                'ten_xe' => $validatedData['ten_xe']
            ]);
        }
    
        // Kiểm tra chủ xe
        $owner = ChuXe::where('so_dien_thoai', $validatedData['so_dien_thoai'])->first();
        if (!$owner) {
            // Tạo mới chủ xe nếu chưa tồn tại
            $owner = ChuXe::create([
                'ho_ten' => $validatedData['ho_ten'],
                'so_dien_thoai' => $validatedData['so_dien_thoai'],
                'id_xe' => $vehicle->id_xe
            ]);
        } else {
            // Gắn lại xe nếu chủ xe đã tồn tại
            $owner->update(['id_xe' => $vehicle->id_xe]);
        }
    
        // Tạo giao dịch
        GiaoDich::create([
            'id_xe' => $vehicle->id_xe,
            'ngay_giao_dich' => $validatedData['ngay_giao_dich'],
            'gia_ban' => $validatedData['gia_ban'],
            'ghi_chu' => $validatedData['ghi_chu'],
            'loai_giao_dich' => $validatedData['loai_giao_dich'],
            'id_nguoi_ban' => auth()->id(),
            'id_nguoi_mua' => $owner->id_chu_xe,
        ]);
    
        return redirect()->route('admin.trade.maintenance')->with('success', 'Thông tin xe và giao dịch đã được xử lý thành công!');
    }
    
    // Hiển thị form thêm admin
    public function addAD()
    {
        return view('admin.add_admin'); // Trả về view form thêm admin
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

        // $ID = ChuXe::where('so_cmnd',$validatedData['so_cmnd'])->first();
        //Thêm giao dịch mới 
   
        $gd = new GiaoDich();
        $gd->id_xe = $xeMoi->id_xe;
        $gd->ngay_giao_dich = now();
        $gd->gia_ban = $xeMoi->gia;
        $gd->ghi_chu = 'Mua mới';
        $gd->loai_giao_dich = 'Mua xe';
        $gd->id_nguoi_ban = auth()->id();
        $gd->id_nguoi_mua = $chuXe->id_chu_xe;
        $gd ->save();


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
    public function contact()
    {
        $sanPhams = LienHe::all();

        return view('admin.contact', data: compact('sanPhams')); // Trả về view thông tin liên hệ
    }
    public function destroy(Request $request)
    {
        // Lấy id_xe từ query string
        $idXe = $request->query('id');

        // Tìm sản phẩm cần xóa
        $sanPham = LienHe::find($idXe);

        // Kiểm tra sản phẩm có tồn tại không
        if (!$sanPham) {
            abort(404, 'Sản phẩm không tồn tại');
        }

        // Xóa sản phẩm
        $sanPham->delete();

        // Điều hướng về danh sách sản phẩm với thông báo thành công
        return redirect()->route('admin.contact');
    }
    public function themad(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ten_dang_nhap' => 'required|unique:nguoi_dung,ten_dang_nhap|max:255',
            'mat_khau' => 'required|max:255',
            'ho_ten' => 'required|max:255',
            'so_dien_thoai' => 'required|max:255',
            'email' => 'required|email|unique:nguoi_dung,email|max:255',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
        
            // Tạo một thông báo lỗi cụ thể
            if ($errors->has('ten_dang_nhap')) {
                return redirect()->back()
                    ->withErrors(['ten_dang_nhap' => 'Tên đăng nhập đã tồn tại.'])
                    ->withInput();
            }
        
            if ($errors->has('email')) {
                return redirect()->back()
                    ->withErrors(['email' => 'Email đã được sử dụng.'])
                    ->withInput();
            }
        
            // Trường hợp có nhiều lỗi khác
            return redirect()->back()
                ->withErrors($errors)
                ->withInput();
        }

        $nguoiDung = new NguoiDung();
        $nguoiDung->ten_dang_nhap = $request->ten_dang_nhap;
        $nguoiDung->mat_khau = $request->mat_khau;
        $nguoiDung->ho_ten = $request->ho_ten;
        $nguoiDung->so_dien_thoai = $request->so_dien_thoai;
        $nguoiDung->email = $request->email;
        $nguoiDung->ngay_tao = now();
        $nguoiDung->vai_tro = 'Nhân viên'; // Mặc định là Nhân viên
        $nguoiDung->trang_thai = 'Hoạt động'; // Mặc định hoạt động
        $nguoiDung->save();

        return redirect()->route('admin.list.admin')->with('success', 'Thêm người dùng thành công!');
    }
    public function listAD()
    {
        $sanPhams = NguoiDung::all();
        return view('admin.list_admin', data: compact('sanPhams'));
    }
    public function deleteAdmin(Request $request)
    {
        // Validate the input
        $idNguoiDung = $request->query('id_nguoidung');

        try {
            // Attempt to find the user
            $user = NguoiDung::find($idNguoiDung);
if (!$user) {
                return redirect()->back()->with('error', 'User not found!');
            }

            // Delete the user
            $user->delete();

            // Redirect with success message
            return redirect()->back()->with('success', 'User deleted successfully!');
        } catch (\Exception $e) {
            // Handle any errors
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    public function editAD(Request $request)
    {
        $id_nguoi_dung = $request->query('id_nguoidung');
        // Tìm thông tin xe cần chỉnh sửa
        $xeMay = NguoiDung::find($id_nguoi_dung);
        return view('admin.edit_admin', compact('xeMay')); // Trả về view form chỉnh sửa admin
    }
    public function updateAdmin(Request $request)
    {
        // Validate dữ liệu đầu vào
        $validated = $request->validate([
            'id_nguoi_dung' => 'required|integer|exists:nguoi_dung,id_nguoi_dung',
            'fullName' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:nguoi_dung,email,' . $request->id_nguoi_dung . ',id_nguoi_dung',
            'phone' => 'nullable|string|max:15',
            'mat_khau' => 'nullable|string|max:255',
        ]);

        try {
            // Lấy thông tin người dùng theo ID
            $user = NguoiDung::find($validated['id_nguoi_dung']);

            if (!$user) {
                return redirect()->route('admin.list.admin')->with('error', 'Không tìm thấy người dùng!');
            }

            // Cập nhật thông tin người dùng
            $user->ho_ten = $validated['fullName'];
            $user->email = $validated['email'];
            $user->so_dien_thoai = $validated['phone'];
            $user->mat_khau = $validated['mat_khau'];

            // Lưu thông tin
            $user->save();

            // Chuyển hướng với thông báo thành công
            return redirect()->route('admin.list.admin')->with('success', 'Cập nhật thông tin người dùng thành công!');
        } catch (\Exception $e) {
            // Ghi log lỗi
            \Log::error('Lỗi khi cập nhật người dùng: ' . $e->getMessage());

            // Chuyển hướng với thông báo lỗi
            return redirect()->route('admin.list.admin')->with('error', 'Có lỗi xảy ra khi cập nhật thông tin người dùng.');
        }
    }
}     
