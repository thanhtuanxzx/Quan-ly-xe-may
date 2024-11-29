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
        Schema::create('giao_dich', function (Blueprint $table) {
            $table->id('id_giao_dich');
            $table->unsignedBigInteger('id_xe');
            $table->foreign('id_xe')->references('id_xe')->on('xe_may')->onDelete('cascade');
            $table->date('ngay_giao_dich');
            $table->decimal('gia_ban', 15, 2);
            $table->text('ghi_chu')->nullable();
            $table->enum('loai_giao_dich', ['Mua mới', 'Bảo trì']);
            $table->unsignedBigInteger('id_nguoi_ban');
            $table->unsignedBigInteger('id_nguoi_mua');
            $table->foreign('id_nguoi_ban')->references('id_chu_xe')->on('chu_xe')->onDelete('cascade');
            $table->foreign('id_nguoi_mua')->references('id_chu_xe')->on('chu_xe')->onDelete('cascade');
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
        Schema::dropIfExists('giao_dich');
    }
};
