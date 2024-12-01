<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class NguoiDung extends Authenticatable
{
    protected $table = 'nguoi_dung'; // Tên bảng
    protected $primaryKey = 'id_nguoi_dung'; // Khóa chính

    protected $fillable = [
        'ten_dang_nhap',
        'mat_khau',
        'ho_ten',
        'email',
        'so_dien_thoai',
        'vai_tro',
        'token',
        'ngay_tao',
        'trang_thai',
    ];

    protected $hidden = [
        'mat_khau',
    ];

    protected $dates = [
        'ngay_tao',
        'created_at',
        'updated_at',
    ];
    protected $attributes = [
        'vai_tro' => 'Nhân viên',
        'trang_thai' => 'Hoạt động',
    ];
    
    
}
