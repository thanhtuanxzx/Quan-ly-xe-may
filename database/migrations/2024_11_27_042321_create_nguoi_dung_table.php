<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nguoi_dung', function (Blueprint $table) {
            $table->id('id_nguoi_dung');
            $table->string('ten_dang_nhap')->unique();
            $table->string('mat_khau');
            $table->string('ho_ten');
            $table->string('email')->nullable()->unique();
            $table->string('so_dien_thoai', 15);
            $table->enum('vai_tro', ['Admin', 'Nhân viên'])->default('Nhân viên');
            $table->date('ngay_tao')->default(now());
            $table->enum('trang_thai', ['Hoạt động', 'Tạm khóa'])->default('Hoạt động');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nguoi_dung');
    }
};
