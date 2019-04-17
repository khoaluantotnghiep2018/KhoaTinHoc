<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\HopThu;
use DB;

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
        $hopthu = DB::table('hop_thus')->paginate(10);
        return view('pages.admin.hopthu.dsHopThu',['hopthu'=>$hopthu]); 
    }
    public function xemTatTinNhan(){
        $hopthu = HopThu::all();
        foreach($hopthu as $ht){
            $ht->daxem = '1';
            $ht->save();
        }
        return back();
    }
    public function xemTinChuaDoc(){
        $hopthu = DB::table('hop_thus')->where('daxem','=','0')->paginate(10);
        foreach($hopthu as $ht){
            $ht = HopThu::find($ht->id);
            $ht->daxem = '1';
            $ht->save();
        }
        return view('pages.admin.hopthu.dsHopThu',['hopthu'=>$hopthu]); 
    }
    public function xemTinTheoId($id){
        $hopthutheoid = HopThu::find($id);
        $hopthutheoid->dadoc = '1';
        $hopthutheoid->save();
        return back();
    }
}
