<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\XeMay;
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
            'bien_so'=>'string|max:15',
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
}
