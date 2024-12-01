<?php

namespace App\Http\Controllers\Auth;
use App\Models\NguoiDung;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordEmail;
use App\Mail\VerificationEmail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str; 


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
    public function verifyEmail(Request $request)
{
    // $request->validate(['token' => 'required|string']);
    // $user = NguoiDung::where('token', $request->token)->first();

    // if ($user) {
    //     $user->token = null;
    //     $user->save();

    //     return view('auth.login', ['message' => 'Email verified successfully.']);
    // }

    return view('auth.email_verified');
}

public function forgetPassword(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => 'required|string|email|max:255|exists:nguoi_dung,email',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();

    }

    $user = NguoiDung::where('email', $request->email)->first();
    $token = Str::random(60);
    $user->token = $token;
    $user->save();

    $resetLink = url('password/reset?token=' . $token); // Tạo URL chứa token

    // Truyền thêm thông tin người dùng vào email
    Mail::to($user->email)->send(new ResetPasswordEmail($user->ho_ten, $resetLink));

    // // Redirect tới route password.reset.form và truyền token
    // return redirect()->route('password.reset.form', ['token' => $token])
    //                  ->with('status', 'Password reset link sent to your email.');
    return redirect()->route('login');
}
public function showResetPasswordForm(Request $request)
{
    return view('auth.reset_password', ['token' => $request->token]);
}

    // Đặt lại mật khẩu
    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required|string',
            'email' => 'required|string|email|exists:nguoi_dung,email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = NguoiDung::where('email', $request->email)->where('token', $request->token)->first();

        if (!$user) {
            return back()->with('error', 'Invalid token or email.');
        }

        $user->mat_khau = $request->password;
        $user->token = null;
        $user->save();

        return redirect()->route('login')->with('status', 'Password reset successfully.');
    }
 // $request->validate(['token' => 'required|string']);
    // $user = NguoiDung::where('token', $request->token)->first();

    // if ($user) {
    //     $user->token = null;
    //     $user->save();

    //     return view('auth.login', ['message' => 'Email verified successfully.']);
    // }
    public function showForgetPasswordForm()
    {
        return view('auth.forget_password');  // Chỉ đơn giản trả về view của form quên mật khẩu
    }





}