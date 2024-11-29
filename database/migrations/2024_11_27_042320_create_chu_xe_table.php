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
        Schema::create('chu_xe', function (Blueprint $table) {
            $table->id('id_chu_xe');
            $table->string('ho_ten');
            $table->string('so_cmnd', 12)->unique();
            $table->string('so_dien_thoai', 11);
            $table->text('dia_chi');
            $table->unsignedBigInteger('id_xe');
            $table->foreign('id_xe')->references('id_xe')->on('xe_may')->onDelete('cascade');
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
        Schema::dropIfExists('chu_xe');
    }
};
