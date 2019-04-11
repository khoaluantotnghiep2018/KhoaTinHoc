<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    protected $table = "binh_luans";
    public $timestamps = true;
    public function tintuc(){
    	return $this->belogsTo('App\Model\TinTuc','id_tintuc','id');
    }

    public function user(){
    	return $this->belogsTo('App\User','id_user','id');
    }

    public function chitietbinhluan(){
    	return $this->hasMany('App\Model\ChiTietBinhLuan','id_binhluan','id');
    }


}
