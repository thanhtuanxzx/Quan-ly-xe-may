<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class NguoiDungSeeder extends Seeder
{
    public function run()
    {
        DB::table('nguoi_dung')->insert([
            'ten_dang_nhap' => 'admin',
            'mat_khau' => '123', 
            'ho_ten' => 'Admin User',
            'email' => 'admin@example.com',
            'token' => null,
            'so_dien_thoai' => '',
            'vai_tro' => 'Admin',
            'ngay_tao' => Carbon::now(),
            'trang_thai' => 'Hoạt động',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
