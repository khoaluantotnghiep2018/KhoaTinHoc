<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHopThusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hop_thus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hoten')->nullable();
            $table->string('email')->nullable();
            $table->string('dienthoai')->nullable();
            $table->text('noidung');
            $table->boolean('andanh');
            $table->boolean("daxem");
            $table->boolean('dadoc');
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
        Schema::dropIfExists('hop_thus');
    }
}
