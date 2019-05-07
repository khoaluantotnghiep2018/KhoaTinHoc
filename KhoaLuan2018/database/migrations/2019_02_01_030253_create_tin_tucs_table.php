<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTinTucsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tin_tucs', function (Blueprint $table) {
            $table->increments('id');
            $table->text('tieude');
            $table->text('mota');
            $table->text('hinhdaidien');
            $table->longText('noidung');
            $table->boolean('noibat')->default(0); 
            $table->integer('luotxem')->default(0);  
            $table->integer('id_loaitin')->unsigned(); 
            $table->foreign('id_loaitin')->references('id')->on('loai_tins')->onDelete('cascade');
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
        Schema::dropIfExists('tin_tucs');
    }
}
