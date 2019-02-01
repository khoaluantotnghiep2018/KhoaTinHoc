<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoaiTinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loai_tins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tenloaitin');
            $table->integer('id_theloai')->unsigned(); 
            $table->foreign('id_theloai')->references('id')->on('the_loais');
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
        Schema::dropIfExists('loai_tins');
    }
}
