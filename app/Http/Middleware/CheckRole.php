<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $role)
    {
        $user = Auth::user(); 
    
        if ($user && $user->vai_tro === $role) {
            return $next($request); // Cho phép tiếp tục request
        }
    
        // Nếu không phù hợp, chuyển hướng hoặc trả về lỗi
        return response()->json([
            'message' => 'Bạn không có quyền truy cập.',
        ], 403); // HTTP 403: Forbidden
    }
}
