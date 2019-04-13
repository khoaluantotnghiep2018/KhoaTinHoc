<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChiTietBinhLuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_tiet_binh_luans', function (Blueprint $table) {
            $table->increments('id');
            $table->text('noidung'); 
            $table->integer('id_binhluan')->unsigned(); 
            $table->foreign('id_binhluan')->references('id')->on('binh_luans')->onDelete('cascade'); 
            $table->integer('id_user')->unsigned(); 
            $table->foreign('id_user')->references('id')->on('users');  
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
        Schema::dropIfExists('chi_tiet_binh_luans');
    }
}

