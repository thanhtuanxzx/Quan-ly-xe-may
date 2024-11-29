<?php

namespace App\Http\Controllers;

use App\Models\NguoiDung;
use Illuminate\Http\Request;

class NguoiDungController extends Controller
{
    /**
     * Hiển thị danh sách người dùng.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Lấy tất cả người dùng
        $nguoiDungs = NguoiDung::all();
        return view('nguoi_dung.index', compact('nguoiDungs'));
    }

    /**
     * Hiển thị form tạo người dùng mới.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nguoi_dung.create');
    }

    /**
     * Lưu người dùng mới vào cơ sở dữ liệu.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Xác thực dữ liệu
        $request->validate([
            'ten' => 'required|string|max:255',
            'email' => 'required|email|unique:nguoi_dung,email',
            'mat_khau' => 'required|min:6',
        ]);

        // Lưu người dùng mới
        NguoiDung::create([
            'ten' => $request->ten,
            'email' => $request->email,
            'mat_khau' => bcrypt($request->mat_khau), // Mã hoá mật khẩu
        ]);

        return redirect()->route('nguoi_dung.index');
    }

    /**
     * Hiển thị chi tiết người dùng.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Lấy thông tin người dùng theo ID
        $nguoiDung = NguoiDung::findOrFail($id);
        return view('nguoi_dung.show', compact('nguoiDung'));
    }

    /**
     * Hiển thị form chỉnh sửa người dùng.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Lấy thông tin người dùng theo ID
        $nguoiDung = NguoiDung::findOrFail($id);
        return view('nguoi_dung.edit', compact('nguoiDung'));
    }

    /**
     * Cập nhật thông tin người dùng.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Xác thực dữ liệu
        $request->validate([
            'ten' => 'required|string|max:255',
            'email' => 'required|email|unique:nguoi_dung,email,' . $id,
            'mat_khau' => 'nullable|min:6', // Mật khẩu có thể để trống, nếu có thì tối thiểu 6 ký tự
        ]);

        // Cập nhật người dùng
        $nguoiDung = NguoiDung::findOrFail($id);
        $nguoiDung->ten = $request->ten;
        $nguoiDung->email = $request->email;
        if ($request->mat_khau) {
            $nguoiDung->mat_khau = bcrypt($request->mat_khau); // Mã hoá mật khẩu
        }
        $nguoiDung->save();

        return redirect()->route('nguoi_dung.index');
    }

    /**
     * Xoá người dùng.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Xoá người dùng
        $nguoiDung = NguoiDung::findOrFail($id);
        $nguoiDung->delete();

        return redirect()->route('nguoi_dung.index');
    }
}
