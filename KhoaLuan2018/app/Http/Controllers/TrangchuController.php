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
     
}
