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
    	
		return response()->json($motbaiviettheoloaichung);
    }
}
