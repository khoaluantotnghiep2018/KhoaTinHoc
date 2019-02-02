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
}
