<?php

namespace App\Http\Controllers;

use App\Models\GiaoDich;
use App\Models\XeMay;
use App\Models\ChuXe;
use Illuminate\Http\Request;

class GiaoDichController extends Controller
{
    /**
     * Hiển thị danh sách giao dịch.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Lấy tất cả các giao dịch
        $giaoDichs = GiaoDich::with(['xeMay', 'nguoiBan', 'nguoiMua'])->get();
        return view('giao_dich.index', compact('giaoDichs'));
    }

    /**
     * Hiển thị form tạo giao dịch mới.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Lấy danh sách xe máy và chủ xe để hiển thị trong form
        $xeMays = XeMay::all();
        $chuXes = ChuXe::all();
        return view('giao_dich.create', compact('xeMays', 'chuXes'));
    }

    /**
     * Lưu giao dịch vào cơ sở dữ liệu.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'id_xe' => 'required|exists:xe_may,id_xe',
            'ngay_giao_dich' => 'required|date',
            'gia_ban' => 'required|numeric',
            'id_nguoi_ban' => 'required|exists:chu_xe,id_chu_xe',
            'id_nguoi_mua' => 'required|exists:chu_xe,id_chu_xe',
            'loai_giao_dich' => 'required|in:Mua mới,Bảo trì',
        ]);

        // Tạo giao dịch mới
        GiaoDich::create([
            'id_xe' => $request->id_xe,
            'ngay_giao_dich' => $request->ngay_giao_dich,
            'gia_ban' => $request->gia_ban,
            'id_nguoi_ban' => $request->id_nguoi_ban,
            'id_nguoi_mua' => $request->id_nguoi_mua,
            'loai_giao_dich' => $request->loai_giao_dich,
            'ghi_chu' => $request->ghi_chu,
        ]);

        return redirect()->route('giao_dich.index');
    }

    /**
     * Hiển thị chi tiết giao dịch.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Lấy thông tin giao dịch theo ID
        $giaoDich = GiaoDich::with(['xeMay', 'nguoiBan', 'nguoiMua'])->findOrFail($id);
        return view('giao_dich.show', compact('giaoDich'));
    }

    /**
     * Hiển thị form chỉnh sửa giao dịch.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Lấy thông tin giao dịch và các dữ liệu cần thiết
        $giaoDich = GiaoDich::findOrFail($id);
        $xeMays = XeMay::all();
        $chuXes = ChuXe::all();
        return view('giao_dich.edit', compact('giaoDich', 'xeMays', 'chuXes'));
    }

    /**
     * Cập nhật giao dịch trong cơ sở dữ liệu.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'id_xe' => 'required|exists:xe_may,id_xe',
            'ngay_giao_dich' => 'required|date',
            'gia_ban' => 'required|numeric',
            'id_nguoi_ban' => 'required|exists:chu_xe,id_chu_xe',
            'id_nguoi_mua' => 'required|exists:chu_xe,id_chu_xe',
            'loai_giao_dich' => 'required|in:Mua mới,Bảo trì',
        ]);

        // Cập nhật thông tin giao dịch
        $giaoDich = GiaoDich::findOrFail($id);
        $giaoDich->update([
            'id_xe' => $request->id_xe,
            'ngay_giao_dich' => $request->ngay_giao_dich,
            'gia_ban' => $request->gia_ban,
            'id_nguoi_ban' => $request->id_nguoi_ban,
            'id_nguoi_mua' => $request->id_nguoi_mua,
            'loai_giao_dich' => $request->loai_giao_dich,
            'ghi_chu' => $request->ghi_chu,
        ]);

        return redirect()->route('giao_dich.index');
    }

    /**
     * Xoá giao dịch khỏi cơ sở dữ liệu.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Xoá giao dịch
        GiaoDich::destroy($id);
        return redirect()->route('giao_dich.index');
    }
    
}
