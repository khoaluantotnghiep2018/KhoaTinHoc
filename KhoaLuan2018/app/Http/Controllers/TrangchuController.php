<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;  
use DB; 
use View;
use Carbon\Carbon;
use App\Model\TrangChu;

class TrangchuController extends Controller
{

    function __construct(){
         
    } 
    // NGƯỜI DÙNG
    public function loadTrangChu(){
        return view('pages/user/home');  
    }
 
    public function getDuLieuNguoiDung(){ 
        return view('pages.user.introduce');
    }
    public function getDuLieuQuanTri(){ 
        return view('pages.admin.gioithieu');
    }

    // Xử lý phần hiển thị ngoài trang chủ
    public function HienThiRss(){
        return view('pages.admin.hienthi');
    }

    // QUẢN TRỊ VIÊN

    // Cập nhật giới thiệu
    public function SuaGioiThieu(Request $request){
        $gioithieu = TrangChu::find(1);
        $gioithieu->gioithieu = $request->textgioithieu;
        $test = $gioithieu->save(); 
        return (string)$test;
    }
    //  Cập nhật hiển thị / ẩn tin tức
    public function updateHienThiRss(Request $request){ 
            $trangthai = $request->trangthai; 
            $trangthai == 1 ? $updateHienThiRss = DB::table('trang_chus')->where('id', 1)->update(['hienthirss' => 1]) : $updateHienThiRss = DB::table('trang_chus')->where('id', 1)->update(['hienthirss' => 0]);  
            return $updateHienThiRss;   
    }
    // Cập nhật sắp xếp tin tức
    public function updateHienThiTinTuc(){
        if(isset($_POST['mangtintuc'])){
            $mangtintuc = $_POST['mangtintuc']; 

            $arrlength = count($mangtintuc);

            for($i = 0; $i < $arrlength; $i++) {
                $uutien = $mangtintuc[$i]['uutien'];
                $id = $mangtintuc[$i]['value'];
                switch ($mangtintuc[$i]['value']) {
                    case 1: 
                        DB::table('the_loais')->where('id', $id)->update(['uutien' => $uutien]);
                        break;
                    case 2:
                        DB::table('the_loais')->where('id', $id)->update(['uutien' => $uutien]);
                        break;
                    case 3:
                        DB::table('the_loais')->where('id', $id)->update(['uutien' => $uutien]);
                        break;
                    case 4:
                        DB::table('the_loais')->where('id', $id)->update(['uutien' => $uutien]);
                    break; 
                    default:
                        break;
                }
            } 
            return "success";
        } 
    }

    public function updateAnHienTinTuc(){
        if(isset($_POST['manghienthitin'])){
            $manghienthitin = $_POST['manghienthitin'];  
            $arrlength = count($manghienthitin);

            for($i = 0; $i < $arrlength; $i++) {
                $ma = $manghienthitin[$i]['id']; 
                $hienthi = $manghienthitin[$i]['hienthi']; 
                DB::table('the_loais')->where('id', $ma)->update(['hienthi' => $hienthi]); 
            } 
            return "ok";
        }
       
    }

    public function updateThongBao(Request $request){  
        if(isset($_POST['mangthongbao'])){
            $mangthongbao = $_POST['mangthongbao'];  
            $arrlength = count($mangthongbao);

            for($i = 0; $i < $arrlength; $i++) {
                $ma = $mangthongbao[$i]['ten']; 
                $hienthi = $mangthongbao[$i]['giatri'];  
            }  
 
            $ngayht = explode("/",$mangthongbao[3]['giatri']);
            $ngaykt = explode("/",$mangthongbao[4]['giatri']);

            $ngayhienthi = $ngayht[2].'/'.$ngayht[1].'/'.$ngayht[0];
            $ngayketthuc = $ngaykt[2].'/'.$ngaykt[1].'/'.$ngaykt[0];

            $checkupdate = DB::table('thong_baos')->where('id', 1)->update(
                                    [ 
                                        'tieude' => $mangthongbao[0]['giatri'], 
                                        'noidung' => $mangthongbao[1]['giatri'],
                                        'ghichu' => $mangthongbao[2]['giatri'],
                                        'ngaybatdau' => $ngayhienthi,
                                        'ngayhethan' => $ngayketthuc
                                    ]);
            return $checkupdate; 
        }
    }

    public function HienThiLienKet(){
        return view('pages.admin.lienket');
    }
}
