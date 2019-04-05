<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Model\LoaiTin;
use App\Model\TheLoai;
use View;
use DateTime;
use DB; 

class TaiKhoanController extends Controller
{
    function __construct(){ 
    	// $loaitin = LoaiTin::all();
    	// $theloai = TheLoai::all();
    	// view::share(['loaitin', $loaitin, 'theloai',$theloai, 'taikhoan',$taikhoan]);
	}
    // NGƯỜI DÙNG


    // QUẢN TRỊ VIÊN
    public function getTaiKhoan(){  
        $taikhoan = User::all(); 
        return view('pages.admin.TaiKhoan.ds_taikhoan',['taikhoan'=>$taikhoan]); 
    }
    public function themTaiKhoan(){ 
    	return view('pages.admin.TaiKhoan.them_taikhoan');
    }

    public function getsuaTaiKhoan($id){  
    }

    public function postsuaTaiKhoan(Request $request, $id){  
    }

    public function getXoaTaiKhoan($id){   
    }
 

    public function postthemTaiKhoan(Request $request){    
        $checkname = DB::table('users')->where('name', $request->name)->first();
        $checkemail = DB::table('users')->where('email', $request->email)->first();
        if($checkemail == null && $checkname == null){
            if($request->hasFile('hinhanh')){ 
                $now = new DateTime(); 
                $file = $request->file('hinhanh'); 
                $fileName = $now->getTimestamp().$file->getClientOriginalName(); 
                $file->move('assets/user/images/avatar',$fileName);  
            }
            else{
                $fileName = "avatar.jpg";
            }
            $taikhoanmoi  = new User;
            $taikhoanmoi->name = $request->name;
            $taikhoanmoi->email = $request->email;
            $taikhoanmoi->password = bcrypt($request->password);
            $taikhoanmoi->permission = $request->permission;
            $taikhoanmoi->image = $fileName;
            $check =  $taikhoanmoi->save(); 
            return redirect('quantri/taikhoan/quantri/them')->with('thongbao',$check); 
        }
        else{
            return redirect('quantri/taikhoan/quantri/them')->with('thongbao',"2");
        }
         
    }
}
