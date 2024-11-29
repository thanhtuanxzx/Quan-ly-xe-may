<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\XeMay;
use App\Models\LienHe;
class UserController extends Controller
{
    public function banggiasanpham()
    {
        $sanPhams = XeMay::all();

        // Truyền dữ liệu sang view
        return view('users.banggiasanpham', compact('sanPhams'));
    }

    public function chinhsachbd()
    {
        return view('users.chinhsachbd');
    }

    public function chinhsachhbb()
    {
        return view('users.chinhsachbh');
    }

    public function chitietsanpham(Request $request)
   
    {
        $idXe = $request->query('id_xe');

        // Tìm sản phẩm bằng Model
        $sanPham = XeMay::find($idXe);
    
        // Kiểm tra sản phẩm có tồn tại hay không
        if (!$sanPham) {
            abort(404, 'Sản phẩm không tồn tại');
        }
    
        // Trả dữ liệu về view
        return view('users.chitietsanpham', ['sanPham' => $sanPham]);
      
    }
    public function submit(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'ho_ten' => 'required|string|max:255',
            'so_dien_thoai' => 'required|string|max:15',
            'dich_vu' => 'required|string',
            'ghi_chu' => 'nullable|string',
        ]);

        // Lưu dữ liệu vào bảng 'lien_he'
        LienHe::create($request->all());

        // Trả về thông báo thành công
        return view('users.thongtin');
    }

    public function lienhemuahang()
    {
        return view('users.lienhemuahang');
    }


    public function sanpham(Request $request)
    {

        $loai_xe = $request->query('loai_xe');
    
        $xeMays = XeMay::where('loai_xe', $loai_xe)->get(); // 'loai_xe' là cột trong bảng XeMay

        // Truyền dữ liệu ra view
        return view('users.sanpham', compact('xeMays', 'loai_xe'));
    }
    
    public function thongtin()
    {
        return view('users.thongtin');
    }

    public function index()
    {
        return view('users.index');
    }
}
