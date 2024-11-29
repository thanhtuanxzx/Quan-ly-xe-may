<?php

namespace App\Http\Controllers\Auth;
use App\Models\NguoiDung;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validate dữ liệu đầu vào
        $request->validate([
            'ten_dang_nhap' => 'required',
            'mat_khau' => 'required',
        ]);

        // Kiểm tra người dùng
        $user = NguoiDung::where('ten_dang_nhap', $request->ten_dang_nhap)->first();

        if ($user && $user->mat_khau == $request->mat_khau) {
            if ($user->trang_thai == 'Hoạt động') {
                Auth::login($user);
                return redirect()->intended('/admin/list-motor'); // Redirect tới trang quản lý sau khi đăng nhập thành công
            } else {
                return back()->withErrors(['trang_thai' => 'Tài khoản của bạn đã bị tạm khóa.']);
            }
        } else {
            return back()->withErrors(['ten_dang_nhap' => 'Tên đăng nhập hoặc mật khẩu không đúng.']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}