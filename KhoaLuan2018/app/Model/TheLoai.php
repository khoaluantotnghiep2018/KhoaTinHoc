<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    protected $table = "the_loais";
    public $timestamps = true;

    public function loaitin(){ 		    	
    	return $this->hasMany('App\Model\LoaiTin','id_theloai','id'); 
    }

    public function tintuc(){
    	return $this->hasManyThrough('App\Model\TinTuc','App\Model\LoaiTin','id_theloai','id_loaitin','id');
    }
}
