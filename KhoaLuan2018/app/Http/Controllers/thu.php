<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\TrangChu;
use App\Model\TheLoai;
use App\Model\LoaiTin;
use App\Model\TinTuc;
use App\Model\binhluan;
use DB;


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
		$test = DB::table('tin_tucs')->join('loai_tins', 'tin_tucs.id_loaitin', '=', 'loai_tins.id') 
                    ->join('the_loais', 'loai_tins.id_theloai', '=', 'the_loais.id')
                    ->select('tin_tucs.*','the_loais.id as idTheLoai','the_loais.tentheloai','loai_tins.tenloaitin')
					->orderBy('tin_tucs.id', 'desc')
					->first();
		$motbaiviettheoloaichung = DB::table('tin_tucs')->join('loai_tins', 'tin_tucs.id_loaitin', '=', 'loai_tins.id') 
						->join('the_loais', 'loai_tins.id_theloai', '=', 'the_loais.id')
						->select('tin_tucs.*','the_loais.id as idTheLoai')  
						->orderBy('id', 'desc')  
						->get();
    	// $LoaiTin =  LoaiTin::all(); 
    	// foreach ($LoaiTin as $lt) {
    	// 	echo $lt->tenloaitin." ".$lt->theloai->tentheloai ."<br>";
		// } 
		return response()->json($motbaiviettheoloaichung);
    }
}
