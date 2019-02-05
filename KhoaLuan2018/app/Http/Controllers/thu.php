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
    	// $TheLoai =  TheLoai::all();  
    	// foreach ($TheLoai as $value) {
    	// 	echo $value->tentheloai."<br>"; 
    	// }
    	// $trangchu = TrangChu::whereId(1)->update(['gioithieu' => "1"]); 
    	$LoaiTin =  LoaiTin::all(); 
    	foreach ($LoaiTin as $lt) {
    		echo $lt->tenloaitin." ".$lt->theloai->tentheloai ."<br>";
    	} 
    }
}
