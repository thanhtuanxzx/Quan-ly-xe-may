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
        'trang_thai',
    ];

    protected $hidden = [
        'mat_khau',
    ];

    // Tùy chỉnh mật khẩu nếu cần mã hóa
    public function setMatKhauAttribute($value)
    {
        $this->attributes['mat_khau'] = bcrypt($value);
    }
}
