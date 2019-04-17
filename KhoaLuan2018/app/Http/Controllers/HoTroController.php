<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\HopThu;

class HoTroController extends Controller
{
    // NGƯỜI DÙNG
    public function postHoTroThuong(Request $req){
        $hopthumoi = new HopThu;
        $hopthumoi->hoten = $req->hoten;
        $hopthumoi->email = $req->email;
        $hopthumoi->dienthoai = $req->dienthoai;
        $hopthumoi->noidung = $req->noidung;
        $hopthumoi->andanh = 0;
        $hopthumoi->daxem = 0;
        $hopthumoi->dadoc = 0;
        $check = $hopthumoi->save();
        echo  $check;
    }

    public function getHoTroAnDanh(Request $req){ 
        $hopthumoi = new HopThu;
        $hopthumoi->hoten = "Ẩn danh";  
        $hopthumoi->noidung = $req->noidung;
        $hopthumoi->andanh = 1;
        $hopthumoi->daxem = 0;
        $hopthumoi->dadoc = 0;
        $check = $hopthumoi->save();
        echo  $check; 
    }
    // QUẢN TRỊ VIÊN

    public function getDsHopThu(){
        $hopthu = HopThu::all();
        return view('pages.admin.hopthu.dsHopThu',['hopthu'=>$hopthu]); 
    }
}
