<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
    protected $table = "tin_tucs";
    public $timestamps = false;
    public function loaitin(){
    	return $this->belogsTo('App\Model\LoaiTin','id_loaitin','id');
    }

     public function user(){
    	return $this->belogsTo('App\User','id_user','id');
    }
 
    public function binhluan(){
    	return $this->hasMany('App\Model\BinhLuan','id_tintuc','id');
    }
}
