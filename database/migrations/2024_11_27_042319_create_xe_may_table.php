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
        Schema::create('xe_may', function (Blueprint $table) {
            $table->id('id_xe');
            $table->string('hinh_anh')->nullable();
            $table->string('bien_so', 15)->nullable();
            $table->string('dong_xe')->nullable();
            $table->string('ten_xe');
            $table->integer('gia')->nullable();
    
            $table->string('mau_sac')->nullable();
            $table->string('so_khung', 50)->nullable();
            $table->string('so_may', 50)->nullable();
            $table->enum('loai_xe', ['1', '2', '3', '4'])->default('1');
            $table->string('tinh_nang')->nullable();
            $table->string('cong_nghe')->nullable();
            $table->string('thiet_ke')->nullable();
            $table->string('tienich_antoan')->nullable();
         
           
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
        Schema::dropIfExists('xe_may');
    }
};
