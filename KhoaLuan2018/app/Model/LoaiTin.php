<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LoaiTin extends Model
{
    protected $table = "loai_tins";
    public $timestamps = false;

    public function theloai(){
    	return $this->belongsTo('App\Model\TheLoai','id_theloai','id');
    }
    public function tintuc(){
    	return $this->hasMany('App\Model\TinTuc','id_loaitin','id');
    }
}
