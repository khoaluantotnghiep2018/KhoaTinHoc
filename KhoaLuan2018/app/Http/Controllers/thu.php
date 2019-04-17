<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\TrangChu;
use App\Model\TheLoai;
use App\Model\LoaiTin;
use App\Model\TinTuc;
use App\Model\binhluan;
use DB, Mail; 


class thu extends Controller
{
    public function testmodel(){   
			$hopthuchuadocchung = DB::table("hop_thus")->where('daxem','=','1')->get();
			if($hopthuchuadocchung->count() != 0){

				echo $hopthuchuadocchung;
			}
    }
}
