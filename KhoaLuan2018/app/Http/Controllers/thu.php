<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\TrangChu;
use App\Model\TheLoai;
use App\Model\LoaiTin;
use App\Model\TinTuc;
use App\Model\binhluan;


class thu extends Controller
{
    public function testmodel(){
    	// $trangchu = TrangChu::all();
    	// return $trangchu;
    	$TheLoai =  TheLoai::find(1);  
    	foreach ($TheLoai->loaitin as $value) {
    		echo $value->id; 
    	}
    }
}
