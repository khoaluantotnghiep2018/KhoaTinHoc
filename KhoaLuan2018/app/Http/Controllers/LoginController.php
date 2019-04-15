<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth, DB, Mail;
use App\User; 

class LoginController extends Controller
{
    //

    var $User_sendMail; 
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

    public function getLoginQuanTri(){
    	return view('pages.admin.login'); 
    }

    public function postLoginQuanTri(Request $req){
        $login = filter_var($req->name, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        $payload[$login] = $req->name;
        $payload['password'] = $req->password;
        if (Auth::attempt($payload, $req->has('remember'))) {
            if (Auth::User()->permission == "Admin") { 
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
    public function getLogoutQuanTriVien(){
        Auth::logout();
        return redirect('login/quantri'); 
    }
    public function postKiemTraQuenMatKhau(Request $req){
        $email = $req->email;
        $User = DB::table('users')->where('email','=',$email)->first();
        if($User == null || $User->permission != 'Admin'){
            return 'loixacnhanemail';
        } 
        
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 6; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $password_resets = DB::table('password_resets')->where('email','=',$email)->first();
        if($password_resets != null){  
            $password_resets = DB::table('password_resets')->where('email','=',$email)
                                    ->update(['token' => $randomString]);
        }
        else{
            $password_resets = DB::table('password_resets')->insert(
                                        ['email' => $email, 'token' => $randomString]
                                    );
        }  
        $data = [
            'tenhienthi' => $User->viewname,'maxacthuc' => $randomString,
        ];
        Mail::send('mail.reset_pass', $data, function($msg) use ($User){ 
			$msg->from('huynhvanthuy97@gmail.com',"Khoa Tin học trường Đại học Sư phạm Huế");
			$msg->to($User->email, $User->viewname)
				->subject('Yêu cầu xác thực tài khoản!');
		}); 
        return "XacNhanMail";
    }
    public function getXacNhanMaQuenMatKhau(Request $req){
        $email = $req->email;
        $token = $req->maXacThuc;
        $password_resets = DB::table('password_resets')->where('email','=',$email)->first();
        if($password_resets->token != $token){
            return "LoiXacNhanToken";
        }
        $User = DB::table('users')->where('email','=',$email)->first(); 
        return $User->id;
    }
    public function getXacNhanDoiMatKhau($id, $maxacthuc){ 
        $User = User::find($id); 
        $password_resets = DB::table('password_resets')->where('email','=',$User->email)->first(); 
        if($password_resets->token == $maxacthuc){
            return view('pages.admin.reset',['id_user'=>$id]); 
        }
        return redirect('404');  
    }

    public function postXacNhanDoiMatKhau(Request $req){
        $passNew = $req->password;
        $id_user = $req->id_user;
        $gologin = $req->checkLog;
        $User = User::find($id_user); 
        $User->password = bcrypt($passNew);
        $check = $User->save();
        if($check != 0){
            if($gologin == "on"){ 
                    return '2';    
            }
            else{
                return '1';   
            }
        } 
        return '0';
    }
    
    // QUẢN TRỊ VIÊN
}
