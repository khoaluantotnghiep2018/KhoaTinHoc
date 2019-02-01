<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitiettintucsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitiettintucs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_binhluan')->unsigned(); 
            $table->foreign('id_binhluan')->references('id')->on('tin_tucs');
            $table->string('noidungbinhluan');
            $table->integer('id_users')->unsigned(); 
            $table->foreign('id_users')->references('id')->on('users'); 
            $table->integer('id_tintuc')->unsigned(); 
            $table->foreign('id_tintuc')->references('id')->on('tin_tucs');
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
        Schema::dropIfExists('chitiettintucs');
    }
}
