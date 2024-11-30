<?php

namespace App\Http\Controllers;

use App\Models\ChuXe;
use App\Models\XeMay;
use Illuminate\Http\Request;

class ChuXeController extends Controller
{
    /**
     * Hiển thị danh sách các chủ xe.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Lấy tất cả các chủ xe
        $chuXes = ChuXe::all();
        return view('chu_xe.index', compact('chuXes'));
    }
    public function listCustomer()
    {
        // Lấy danh sách chủ xe cùng xe liên kết
        $Chuxe = ChuXe::with('xeMay')->get();
    
        if ($Chuxe->isEmpty()) {
            return redirect()->back()->withErrors(['message' => 'Không tìm thấy thông tin.']);
        }
    
        return view('admin.list_customer', compact('Chuxe'));
    }
    

    /**
     * Hiển thị form để tạo mới chủ xe.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('chu_xe.create');
    }

    /**
     * Lưu thông tin chủ xe mới vào cơ sở dữ liệu.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'ho_ten' => 'required',
            'so_cmnd' => 'required|unique:chu_xe,so_cmnd',
            'so_dien_thoai' => 'required',
            'dia_chi' => 'required',
        ]);

        // Lưu chủ xe mới
        ChuXe::create([
            'ho_ten' => $request->ho_ten,
            'so_cmnd' => $request->so_cmnd,
            'so_dien_thoai' => $request->so_dien_thoai,
            'dia_chi' => $request->dia_chi,
        ]);

        return redirect()->route('chu_xe.index');
    }

    /**
     * Hiển thị chi tiết của một chủ xe.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Lấy thông tin chủ xe theo ID
        $chuXe = ChuXe::findOrFail($id);
        return view('chu_xe.show', compact('chuXe'));
    }

    /**
     * Hiển thị form để chỉnh sửa thông tin chủ xe.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Lấy thông tin chủ xe cần chỉnh sửa
        $chuXe = ChuXe::findOrFail($id);
        return view('chu_xe.edit', compact('chuXe'));
    }

    /**
     * Cập nhật thông tin chủ xe trong cơ sở dữ liệu.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'ho_ten' => 'required',
            'so_cmnd' => 'required|unique:chu_xe,so_cmnd,' . $id,
            'so_dien_thoai' => 'required',
            'dia_chi' => 'required',
        ]);

        // Cập nhật thông tin chủ xe
        $chuXe = ChuXe::findOrFail($id);
        $chuXe->update([
            'ho_ten' => $request->ho_ten,
            'so_cmnd' => $request->so_cmnd,
            'so_dien_thoai' => $request->so_dien_thoai,
            'dia_chi' => $request->dia_chi,
        ]);

        return redirect()->route('chu_xe.index');
    }

    /**
     * Xoá chủ xe khỏi cơ sở dữ liệu.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Xoá chủ xe
        ChuXe::destroy($id);
        return redirect()->route('chu_xe.index');
    }
   
}
