<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;  
use DB; 
use View;
use Carbon\Carbon;

class TrangchuController extends Controller
{

    function __construct(){
        $trangchu = DB::table('trang_chus')->first(); 
        $theloai =  DB::table('the_loais')->orderBy('uutien', 'asc')->get();
        $dulieuthongbao = DB::table('thong_baos')->first(); 
        View::share(['trangchu'=>$trangchu,'theloai'=>$theloai,'dulieuthongbao'=>$dulieuthongbao]); 
    } 
    // NGƯỜI DÙNG
    public function loadTrangChu(){
        return view('pages/user/home');
    }

    // Cập nhật giới thiệu
    public function SuaGioiThieu(){
        if(isset($_POST['textgioithieu'])){
            $textgioithieu = $_POST['textgioithieu']; 
            $updateText = DB::table('trang_chus')->where('id', 1)->update(['gioithieu' => $textgioithieu]);  
            return $textgioithieu; 
        }
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
    public function updateHienThiRss(){
        if(isset($_POST['trangthai'])){
            $trangthai = $_POST['trangthai']; 
            if($trangthai == 1){
                $updateHienThiRss = DB::table('trang_chus')->where('id', 1)->update(['hienthirss' => 1]);  
            }
            if($trangthai == 0){
                $updateHienThiRss = DB::table('trang_chus')->where('id', 1)->update(['hienthirss' => 0]);  
            }
            return $updateHienThiRss;  
        }
    }
    public function updateHienThiTinTuc(){
        if(isset($_POST['mangtintuc'])){
            $mangtintuc = $_POST['mangtintuc']; 

            $arrlength = count($mangtintuc);

            for($i = 0; $i < $arrlength; $i++) {
                $uutien = $mangtintuc[$i]['uutien'];
                switch ($mangtintuc[$i]['value']) {
                    case "Tin tức": 
                        DB::table('the_loais')->where('tentheloai', 'Tin tức')->update(['uutien' => $uutien]);
                        break;
                    case "Thông báo":
                        DB::table('the_loais')->where('tentheloai', 'Thông báo')->update(['uutien' => $uutien]);
                        break;
                    case "Tuyển sinh":
                        DB::table('the_loais')->where('tentheloai', 'Tuyển sinh')->update(['uutien' => $uutien]);
                        break;
                    case "Chương trình đào tạo":
                        DB::table('the_loais')->where('tentheloai', 'Chương trình đào tạo')->update(['uutien' => $uutien]);
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

    public function updateThongBao(){
        if(isset($_POST['mangthongbao'])){
            $mangthongbao = $_POST['mangthongbao'];  
            $arrlength = count($mangthongbao);

            for($i = 0; $i < $arrlength; $i++) {
                $ma = $mangthongbao[$i]['ten']; 
                $hienthi = $mangthongbao[$i]['giatri'];  
            }  

            $ngayhienthi = date("Y-d-m", strtotime($mangthongbao[3]['giatri']));
            $ngayketthuc = date("Y-d-m", strtotime($mangthongbao[4]['giatri']));
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
}
