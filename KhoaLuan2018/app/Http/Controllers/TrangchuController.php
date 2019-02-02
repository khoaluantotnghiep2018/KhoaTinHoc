<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;  
use DB;
use App\TrangChu;
use View;

class TrangchuController extends Controller
{

    function __construct(){
        $trangchu = DB::table('trang_chus')->first(); 
        View::share('trangchu',$trangchu);
    } 

    public function loadTrangChu(){
        return view('pages/user/home');
    }

    // Cập nhật giới thiệu
    public function SuaGioiThieu(){
        if(isset($_POST['textgioithieu'])){
            $textgioithieu = $_POST['textgioithieu']; 
            $updateText = DB::table('trang_chus')->where('id', 1)->update(['gioithieu' => $textgioithieu]); 
            if($updateText){
                return $textgioithieu;
            }
            else{
                return "";
            }
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
            // echo $mangtintuc['0']['id'];
            // echo $mangtintuc['0']['value'];

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

            return (string)$mangtintuc['0']['value'];
        }
       
    }
}
