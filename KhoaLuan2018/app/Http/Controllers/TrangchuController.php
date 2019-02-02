<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;  
use DB;

class TrangchuController extends Controller
{
    public function SuaGioiThieu(){
        if(isset($_POST['textgioithieu'])){
            $textgioithieu = $_POST['textgioithieu']; 
            $updateText = DB::table('trangchus')->where('id', 1)->update(['gioithieu' => $textgioithieu]); 
            if($updateText){
                return $textgioithieu;
            }
            else{
                return "";
            }
        }
    }
}
