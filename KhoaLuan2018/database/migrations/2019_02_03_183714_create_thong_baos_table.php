<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThongbaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thong_baos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tieude');
            $table->text('noidung');
            $table->string('ghichu');
            $table->dateTime('ngaybatdau');
            $table->dateTime('ngayhethan');
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
        Schema::dropIfExists('thong_baos');
    }
}
