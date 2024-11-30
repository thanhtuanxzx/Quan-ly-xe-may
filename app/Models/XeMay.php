<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XeMay extends Model
{
    use HasFactory;

    protected $table = 'xe_may';
    protected $primaryKey = 'id_xe'; 
    protected $fillable = [
        'hinh_anh',
        'bien_so',
        'dong_xe',
        'ten_xe',
        'gia',
        'mau_sac',
        'so_khung',
        'so_may',
        'loai_xe',
        'tinh_nang',
        'cong_nghe',
        'thiet_ke',
        'tienich_antoan',
    ];


    // public function chuXe()
    // {
    //     return $this->belongsTo(ChuXe::class, 'id_chu_xe');
    // }

    public function giaoDich()
    {
        return $this->hasMany(GiaoDich::class, 'id_xe');
    }
    // public function chuXe()
    // {
    //     return $this->belongsTo(ChuXe::class, 'id_chu_xe');
    // }
    public function chuXe()
    {
        return $this->hasOne(ChuXe::class, 'id_xe', 'id_xe'); // 'id_xe' là khóa chính của xe_may, 'id_xe' là khóa ngoại trong chu_xe
    }
    
   
}
