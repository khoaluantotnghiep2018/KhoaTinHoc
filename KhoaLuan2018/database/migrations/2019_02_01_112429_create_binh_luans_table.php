<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBinhluansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('binh_luans', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('noidung');
            $table->integer('id_user')->unsigned(); 
            $table->foreign('id_user')->references('id')->on('users'); 
            $table->integer('id_tintuc')->unsigned(); 
            $table->foreign('id_tintuc')->references('id')->on('tin_tucs');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('binh_luans');
    }
}
