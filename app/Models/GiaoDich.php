<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiaoDich extends Model
{
    use HasFactory;

    protected $table = 'giao_dich'; 
    protected $primaryKey = 'id_giao_dich'; 
    protected $fillable = [
        'id_xe',
        'ngay_giao_dich',
        'gia_ban',
        'ghi_chu',
        'loai_giao_dich',
        'id_nguoi_ban',
        'id_nguoi_mua',
    ];

    public function xeMay()
    {
        return $this->belongsTo(XeMay::class, 'id_xe');
    }

    public function nguoiBan()
    {
        return $this->belongsTo(ChuXe::class, 'id_nguoi_ban');
    }

    public function nguoiMua()
    {
        return $this->belongsTo(ChuXe::class, 'id_nguoi_mua');
    }
}
