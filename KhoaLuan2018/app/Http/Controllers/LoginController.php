<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    //


    // NGƯỜI DÙNG
    public function postLoginSinhVien(Request $req){
        $login = filter_var($req->name, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        $payload[$login] = $req->name;
        $payload['password'] = $req->password;
        if (Auth::attempt($payload, $req->has('remember'))) {
            if (Auth::User()->permission == "SinhVien") { 
                return "ok"; 
            }
            return 'loiphanquyen'; 
        }
        return 'loidangnhap';  
    }
 
    public function postLoginGiangVien(Request $req){
        $login = filter_var($req->name, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        $payload[$login] = $req->name;
        $payload['password'] = $req->password;
        if (Auth::attempt($payload, $req->has('remember'))) {
            if (Auth::User()->permission == "GiangVien") { 
                return "ok"; 
            }
            return 'loiphanquyen'; 
        }
        return 'loidangnhap';  
    }

    public function getLogoutSinhVien(){
        Auth::logout();
        return back();
    }
    
    // QUẢN TRỊ VIÊN
}
