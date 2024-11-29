<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LienHe extends Model
{
    use HasFactory;

    protected $table = 'lien_he';

    protected $fillable = [
        'ho_ten',
        'so_dien_thoai',
        'dich_vu',
        'ghi_chu',
    ];
}
