<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ChiTietBinhLuan extends Model
{
   	protected $table = "chi_tiet_binh_luans";
    public $timestamps = true;

    public function binhluan(){ 		    	
    	return $this->belogsTo('App\Model\BinhLuan','id_binhluan','id'); 
    }

    public function user(){ 		    	
    	return $this->belogsTo('App\User','id_user','id'); 
    }
}
