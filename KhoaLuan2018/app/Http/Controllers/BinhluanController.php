<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\LoaiTin;
use App\Model\TheLoai;
use App\Model\TinTuc;
use App\Model\BinhLuan;
use App\Model\ChiTietBinhLuan;
use App\User;
use View;
use Auth;
use DB;

class BinhluanController extends Controller
{
    // NGƯỜI DÙNG
    public function themBinhLuanMoi(Request $req){
        $id_baiviet = $req->data[0];
        $noidung = $req->data[1];
        $id_userbinhluan = Auth::User()->id;
        $binhluanmoi  = new BinhLuan;
        $binhluanmoi->id_user = $id_userbinhluan;
        $binhluanmoi->id_tintuc = $id_baiviet;
        $binhluanmoi->noidung = $noidung;
        $binhluanmoi->save();
        $chitietbaiviet = DB::table('tin_tucs')  
                            ->where('id','=',$id_baiviet)  
                            ->first();
        $nameuser = DB::table('users')  
                        ->where('id','=',$chitietbaiviet->id_user)  
                        ->first(); 
        $binhluanbaiviet = DB::table('binh_luans')
                            ->join('users', 'binh_luans.id_user', '=', 'users.id')
                            ->join('tin_tucs', 'binh_luans.id_tintuc', '=', 'tin_tucs.id')
                            ->where('binh_luans.id_tintuc','=',$id_baiviet)
                            ->select('binh_luans.*','users.name','users.viewname','users.email','users.image','users.updated_at')                            
                            ->orderBy('binh_luans.id', 'desc')   
                            ->paginate(20);  
        $chitietbinhluanbaiviet = DB::table('tin_tucs')  
                                    ->join('binh_luans', 'binh_luans.id_tintuc', '=', 'tin_tucs.id')
                                    ->join('chi_tiet_binh_luans', 'chi_tiet_binh_luans.id_binhluan', '=', 'binh_luans.id') 
                                    ->join('users', 'chi_tiet_binh_luans.id_user', '=', 'users.id') 
                                    ->select('chi_tiet_binh_luans.*','users.id as id_usBinhLuan','users.viewname','users.image','tin_tucs.id as idtintuc')
                                    ->get(); 
        $ketqua = "";
        if($binhluanbaiviet != null){
            $id_toggle = 0;
            foreach($binhluanbaiviet as $blbv){
                $ketqua = $ketqua.'<div class="cmt-content">   
                                    <div class="user">
                                        <div class="cmt-user">
                                            <img src="assets/user/images/avatar/'.$blbv->image.'" alt="">
                                            <div class="cmt-user__text">
                                                <div class="name">'.$blbv->viewname.' <small>'.$blbv->updated_at.'</small></div>
                                                    <div class="text">'.$blbv->noidung.'</div> ';
                            

                                                if(Auth::check() && Auth::User()->id == $blbv->id_user){
                                                    $ketqua = $ketqua.'<button onclick="clickXoaBinhLuan('.$blbv->id.')" class="fas fa-trash-alt remove"  id="btnXoaBinhLuan"> Xóa</button>
                                                    <button onclick="clickSuaBinhLuan('.$blbv->id.' , \''.$blbv->noidung.'\');" id="btnSuaBinhLuan" class="far fa-edit remove"> Sửa</button>';
                                                }

                                                if($chitietbinhluanbaiviet != null){ 
                                                    $dem = 0; 
                                                    foreach($chitietbinhluanbaiviet as $ctblbv){
                                                        if($ctblbv->id_binhluan == $blbv->id && $ctblbv->idtintuc == $id_baiviet)
                                                            $dem++;   
                                                    } 
                                                    $ketqua = $ketqua.'
                                                                        <div class="rep"> 
                                                                            <a onclick="clickRepComment(this, '.$id_toggle.')" class="btn-rep far fa-comment-dots"> '.$dem.'.</a>
                                                                        </div> 
                                                                    ';
                                                }
                                                $id_toggle++;
                            $ketqua = $ketqua.      '</div>
                                                </div>	 <!-- Nội dung comment của user -->' ; 
                                                
                                                // Chi tiết bình luận 

                            $ketqua = $ketqua.'<div class="user-content__rep">';
                            if($chitietbinhluanbaiviet != null){
                                foreach($chitietbinhluanbaiviet as $ctblbv){ 
                                    if($ctblbv->id_binhluan == $blbv->id && $ctblbv->idtintuc == $id_baiviet){
                                        $ketqua = $ketqua.'<div class="rep-user"> 
                                        <div class="cmt-user">
                                            <img src="assets/user/images/avatar/'.$ctblbv->image.'" alt="">
                                            <div class="cmt-user__text">
                                                <div class="name">'.$ctblbv->viewname.' <small>'.$ctblbv->updated_at.'</small></div>
                                                <div class="text">'.$ctblbv->noidung.'</div>';
                                                if(Auth::check() && Auth::User()->id == $ctblbv->id_user){  
                                                    $ketqua = $ketqua.'<button onclick="clickXoaTraloiBinhLuan('.$ctblbv->id.')" class="fas fa-trash-alt remove"> Xóa</button>
                                                    <button onclick="clickSuaTraloiBinhLuan('.$ctblbv->id.', '.$blbv->id.', \''.$ctblbv->noidung.'\')" class="far fa-edit remove"> Sửa</button>';
                                                }

                                            $ketqua = $ketqua.'</div>
                                        </div>	   
                                    </div> <!-- nội dung rep của user -->';
                                    }
                                } 
                            } 
                            $ketqua = $ketqua.'<div class="rep-input">
                                <div class="cmt-add">
                                    <div class="cmt-add__input">';
                                    if(Auth::check()) {
                                        $ketqua = $ketqua.'<img src="assets/user/images/avatar/'.$nameuser->image.'" alt="">';
                                    }
                                    $ketqua = $ketqua.'<textarea name="" id="texttraloi'.$blbv->id.'" cols="30" rows="1" ';
                                    if(!Auth::check()) $ketqua = $ketqua.'readonly'; 
                                    
                                    $ketqua = $ketqua.'></textarea>	
                                    </div>
                                    <div class="btn"> <button id="btnHuyTraLoiBinhLuan'.$blbv->id.'" hidden onclick="clickHuyTraLoiBinhLuan('.$blbv->id.')">Hủy bỏ</button>
                                    <button value="them" onclick="clickSubTraLoiBinhLuan('.$blbv->id.')" id="btnSubTraLoiBinhLuan'.$blbv->id.'"';
                                    if(!Auth::check()){
                                        $ketqua = $ketqua.'disabled';
                                    } 
                                    $ketqua = $ketqua.'>Trả lời</button></div>
                                </div>
                            </div> <!-- ô input rep user -->	
                        </div> <!-- Khung chứa của rep -->';
 

                                $ketqua = $ketqua.'</div>
                                                </div> <!-- ô input rep user -->	
                                            </div> <!-- Khung chứa của rep -->'; 
                $ketqua = $ketqua.'  
                            </div> 
                        </div>';  

                    }  
        } 
        
        return $ketqua;
    } 
    public function suaBinhLuan(Request $req){
        $suabinhluan = BinhLuan::find($req->id_sua);
        $suabinhluan->noidung = $req->noidung;
        $suabinhluan->save();

        $chitietbaiviet = DB::table('tin_tucs')  
                            ->where('id','=',$req->id_baiviethientai)  
                            ->first();
        $nameuser = DB::table('users')  
                        ->where('id','=',$chitietbaiviet->id_user)  
                        ->first(); 
        $binhluanbaiviet = DB::table('binh_luans')
                            ->join('users', 'binh_luans.id_user', '=', 'users.id')
                            ->join('tin_tucs', 'binh_luans.id_tintuc', '=', 'tin_tucs.id')
                            ->where('binh_luans.id_tintuc','=',$req->id_baiviethientai)
                            ->select('binh_luans.*','users.name','users.viewname','users.email','users.image','users.updated_at')                            
                            ->orderBy('binh_luans.id', 'desc')   
                            ->paginate(20);  
        $chitietbinhluanbaiviet = DB::table('tin_tucs')  
                                    ->join('binh_luans', 'binh_luans.id_tintuc', '=', 'tin_tucs.id')
                                    ->join('chi_tiet_binh_luans', 'chi_tiet_binh_luans.id_binhluan', '=', 'binh_luans.id') 
                                    ->join('users', 'chi_tiet_binh_luans.id_user', '=', 'users.id') 
                                    ->select('chi_tiet_binh_luans.*','users.id as id_usBinhLuan','users.viewname','users.image','tin_tucs.id as idtintuc')
                                    ->get(); 
        $ketqua = "";
        if($binhluanbaiviet != null){
            $id_toggle = 0;
            foreach($binhluanbaiviet as $blbv){
                $ketqua = $ketqua.'<div class="cmt-content">   
                                    <div class="user">
                                        <div class="cmt-user">
                                            <img src="assets/user/images/avatar/'.$blbv->image.'" alt="">
                                            <div class="cmt-user__text">
                                                <div class="name">'.$blbv->viewname.' <small>'.$blbv->updated_at.'</small></div>
                                                    <div class="text">'.$blbv->noidung.'</div> ';
                            

                                                if(Auth::check() && Auth::User()->id == $blbv->id_user){
                                                    $ketqua = $ketqua.'<button onclick="clickXoaBinhLuan('.$blbv->id.')" class="fas fa-trash-alt remove"  id="btnXoaBinhLuan"> Xóa</button>
                                                    <button onclick="clickSuaBinhLuan('.$blbv->id.' , \''.$blbv->noidung.'\');" id="btnSuaBinhLuan" class="far fa-edit remove"> Sửa</button>';
                                                }

                                                if($chitietbinhluanbaiviet != null){ 
                                                    $dem = 0; 
                                                    foreach($chitietbinhluanbaiviet as $ctblbv){
                                                        if($ctblbv->id_binhluan == $blbv->id && $ctblbv->idtintuc == $req->id_baiviethientai)
                                                            $dem++;   
                                                    } 
                                                    $ketqua = $ketqua.'
                                                                        <div class="rep"> 
                                                                            <a onclick="clickRepComment(this, '.$id_toggle.')" class="btn-rep far fa-comment-dots"> '.$dem.'.</a>
                                                                        </div> 
                                                                    ';
                                                }
                                                $id_toggle++;
                            $ketqua = $ketqua.      '</div>
                                                </div>	 <!-- Nội dung comment của user -->' ; 
                                                
                                                // Chi tiết bình luận 

                            $ketqua = $ketqua.'<div class="user-content__rep">';
                            if($chitietbinhluanbaiviet != null){
                                foreach($chitietbinhluanbaiviet as $ctblbv){ 
                                    if($ctblbv->id_binhluan == $blbv->id && $ctblbv->idtintuc == $req->id_baiviethientai){
                                        $ketqua = $ketqua.'<div class="rep-user"> 
                                        <div class="cmt-user">
                                            <img src="assets/user/images/avatar/'.$ctblbv->image.'" alt="">
                                            <div class="cmt-user__text">
                                                <div class="name">'.$ctblbv->viewname.' <small>'.$ctblbv->updated_at.'</small></div>
                                                <div class="text">'.$ctblbv->noidung.'</div>';
                                                if(Auth::check() && Auth::User()->id == $ctblbv->id_user){  
                                                    $ketqua = $ketqua.'<button onclick="clickXoaTraloiBinhLuan('.$ctblbv->id.')" class="fas fa-trash-alt remove"> Xóa</button>
                                                    <button onclick="clickSuaTraloiBinhLuan('.$ctblbv->id.', '.$blbv->id.', \''.$ctblbv->noidung.'\')" class="far fa-edit remove"> Sửa</button>';
                                                }

                                            $ketqua = $ketqua.'</div>
                                        </div>	   
                                    </div> <!-- nội dung rep của user -->';
                                    }
                                } 
                            } 
                            $ketqua = $ketqua.'<div class="rep-input">
                                <div class="cmt-add">
                                    <div class="cmt-add__input">';
                                    if(Auth::check()) {
                                        $ketqua = $ketqua.'<img src="assets/user/images/avatar/'.$nameuser->image.'" alt="">';
                                    }
                                    $ketqua = $ketqua.'<textarea name="" id="texttraloi'.$blbv->id.'" cols="30" rows="1" ';
                                    if(!Auth::check()) $ketqua = $ketqua.'readonly'; 
                                    
                                    $ketqua = $ketqua.'></textarea>	 
                                    </div>
                                    <div class="btn"> <button id="btnHuyTraLoiBinhLuan'.$blbv->id.'" hidden onclick="clickHuyTraLoiBinhLuan('.$blbv->id.')">Hủy bỏ</button>
                                    <button value="them" onclick="clickSubTraLoiBinhLuan('.$blbv->id.')" id="btnSubTraLoiBinhLuan'.$blbv->id.'"';
                                    if(!Auth::check()){
                                        $ketqua = $ketqua.'disabled';
                                    } 
                                    $ketqua = $ketqua.'>Trả lời</button></div>
                                </div>
                            </div> <!-- ô input rep user -->	
                        </div> <!-- Khung chứa của rep -->';
 

                                $ketqua = $ketqua.'</div>
                                                </div> <!-- ô input rep user -->	
                                            </div> <!-- Khung chứa của rep -->'; 
                $ketqua = $ketqua.'  
                            </div> 
                        </div>';  
            } 
        } 
        
        return $ketqua;
    }

    public function xoaBinhLuan(Request $req){
        $xoabinhluan = BinhLuan::find($req->id_xoa);
        $xoabinhluan->delete();

        $chitietbaiviet = DB::table('tin_tucs')  
                            ->where('id','=',$req->id_baiviethientai)  
                            ->first();
        $nameuser = DB::table('users')  
                        ->where('id','=',$chitietbaiviet->id_user)  
                        ->first(); 
        $binhluanbaiviet = DB::table('binh_luans')
                            ->join('users', 'binh_luans.id_user', '=', 'users.id')
                            ->join('tin_tucs', 'binh_luans.id_tintuc', '=', 'tin_tucs.id')
                            ->where('binh_luans.id_tintuc','=',$req->id_baiviethientai)
                            ->select('binh_luans.*','users.name','users.viewname','users.email','users.image','users.updated_at')                            
                            ->orderBy('binh_luans.id', 'desc')   
                            ->paginate(20);  
        $chitietbinhluanbaiviet = DB::table('tin_tucs')  
                                    ->join('binh_luans', 'binh_luans.id_tintuc', '=', 'tin_tucs.id')
                                    ->join('chi_tiet_binh_luans', 'chi_tiet_binh_luans.id_binhluan', '=', 'binh_luans.id') 
                                    ->join('users', 'chi_tiet_binh_luans.id_user', '=', 'users.id') 
                                    ->select('chi_tiet_binh_luans.*','users.id as id_usBinhLuan','users.viewname','users.image','tin_tucs.id as idtintuc')
                                    ->get(); 
        $ketqua = "";
        if($binhluanbaiviet != null){
            $id_toggle = 0;
            foreach($binhluanbaiviet as $blbv){
                $ketqua = $ketqua.'<div class="cmt-content">   
                                    <div class="user">
                                        <div class="cmt-user">
                                            <img src="assets/user/images/avatar/'.$blbv->image.'" alt="">
                                            <div class="cmt-user__text">
                                                <div class="name">'.$blbv->viewname.' <small>'.$blbv->updated_at.'</small></div>
                                                    <div class="text">'.$blbv->noidung.'</div> ';
                            

                                                if(Auth::check() && Auth::User()->id == $blbv->id_user){
                                                    $ketqua = $ketqua.'<button onclick="clickXoaBinhLuan('.$blbv->id.')" class="fas fa-trash-alt remove"  id="btnXoaBinhLuan"> Xóa</button>
                                                    <button onclick="clickSuaBinhLuan('.$blbv->id.' , \''.$blbv->noidung.'\');" id="btnSuaBinhLuan" class="far fa-edit remove"> Sửa</button>';
                                                }

                                                if($chitietbinhluanbaiviet != null){ 
                                                    $dem = 0; 
                                                    foreach($chitietbinhluanbaiviet as $ctblbv){
                                                        if($ctblbv->id_binhluan == $blbv->id && $ctblbv->idtintuc == $req->id_baiviethientai)
                                                            $dem++;   
                                                    } 
                                                    $ketqua = $ketqua.'
                                                                        <div class="rep"> 
                                                                            <a onclick="clickRepComment(this, '.$id_toggle.')" class="btn-rep far fa-comment-dots"> '.$dem.'.</a>
                                                                        </div> 
                                                                    ';
                                                }
                                                $id_toggle++;
                            $ketqua = $ketqua.      '</div>
                                                </div>	 <!-- Nội dung comment của user -->' ; 
                                                
                                                // Chi tiết bình luận 

                            $ketqua = $ketqua.'<div class="user-content__rep">';
                            if($chitietbinhluanbaiviet != null){
                                foreach($chitietbinhluanbaiviet as $ctblbv){ 
                                    if($ctblbv->id_binhluan == $blbv->id && $ctblbv->idtintuc == $req->id_baiviethientai){
                                        $ketqua = $ketqua.'<div class="rep-user"> 
                                        <div class="cmt-user">
                                            <img src="assets/user/images/avatar/'.$ctblbv->image.'" alt="">
                                            <div class="cmt-user__text">
                                                <div class="name">'.$ctblbv->viewname.' <small>'.$ctblbv->updated_at.'</small></div>
                                                <div class="text">'.$ctblbv->noidung.'</div>';
                                                if(Auth::check() && Auth::User()->id == $ctblbv->id_user){  
                                                    $ketqua = $ketqua.'<button onclick="clickXoaTraloiBinhLuan('.$ctblbv->id.')" class="fas fa-trash-alt remove"> Xóa</button>
                                                    <button onclick="clickSuaTraloiBinhLuan('.$ctblbv->id.', '.$blbv->id.', \''.$ctblbv->noidung.'\')" class="far fa-edit remove"> Sửa</button>';
                                                }

                                            $ketqua = $ketqua.'</div>
                                        </div>	   
                                    </div> <!-- nội dung rep của user -->';
                                    }
                                } 
                            } 
                            $ketqua = $ketqua.'<div class="rep-input">
                                <div class="cmt-add">
                                    <div class="cmt-add__input">';
                                    if(Auth::check()) {
                                        $ketqua = $ketqua.'<img src="assets/user/images/avatar/'.$nameuser->image.'" alt="">';
                                    }
                                    $ketqua = $ketqua.'<textarea name="" id="texttraloi'.$blbv->id.'" cols="30" rows="1" ';
                                    if(!Auth::check()) $ketqua = $ketqua.'readonly'; 
                                    
                                    $ketqua = $ketqua.'></textarea>	
                                    </div>
                                    <div class="btn"> <button id="btnHuyTraLoiBinhLuan'.$blbv->id.'" hidden onclick="clickHuyTraLoiBinhLuan('.$blbv->id.')">Hủy bỏ</button>
                                    <button value="them" onclick="clickSubTraLoiBinhLuan('.$blbv->id.')" id="btnSubTraLoiBinhLuan'.$blbv->id.'"';
                                    if(!Auth::check()){
                                        $ketqua = $ketqua.'disabled';
                                    } 
                                    $ketqua = $ketqua.'>Trả lời</button></div>
                                </div>
                            </div> <!-- ô input rep user -->	
                        </div> <!-- Khung chứa của rep -->';
 

                                $ketqua = $ketqua.'</div>
                                                </div> <!-- ô input rep user -->	
                                            </div> <!-- Khung chứa của rep -->'; 
                $ketqua = $ketqua.'  
                            </div> 
                        </div>';  
            } 
        } 
        
        return $ketqua;

    }

    public function themTraloiBinhLuanMoi(Request $req){
        $themtraloibinhluan = new ChiTietBinhLuan;
        $themtraloibinhluan->noidung = $req->noidung;
        $themtraloibinhluan->id_binhluan = $req->id_binhluan; 
        $themtraloibinhluan->id_user = Auth::User()->id;
        $themtraloibinhluan->save();
        $chitietbaiviet = DB::table('tin_tucs')  
                            ->where('id','=',$req->id_baiviethientai)  
                            ->first();
        $nameuser = DB::table('users')  
                        ->where('id','=',$chitietbaiviet->id_user)  
                        ->first(); 
        $binhluanbaiviet = DB::table('binh_luans')
                            ->join('users', 'binh_luans.id_user', '=', 'users.id')
                            ->join('tin_tucs', 'binh_luans.id_tintuc', '=', 'tin_tucs.id')
                            ->where('binh_luans.id_tintuc','=',$req->id_baiviethientai)
                            ->select('binh_luans.*','users.name','users.viewname','users.email','users.image','users.updated_at')                            
                            ->orderBy('binh_luans.id', 'desc')   
                            ->paginate(20);  
        $chitietbinhluanbaiviet = DB::table('tin_tucs')  
                                    ->join('binh_luans', 'binh_luans.id_tintuc', '=', 'tin_tucs.id')
                                    ->join('chi_tiet_binh_luans', 'chi_tiet_binh_luans.id_binhluan', '=', 'binh_luans.id') 
                                    ->join('users', 'chi_tiet_binh_luans.id_user', '=', 'users.id') 
                                    ->select('chi_tiet_binh_luans.*','users.id as id_usBinhLuan','users.viewname','users.image','tin_tucs.id as idtintuc')
                                    ->get(); 
        $ketqua = "";
        if($binhluanbaiviet != null){
            $id_toggle = 0;
            foreach($binhluanbaiviet as $blbv){
                $ketqua = $ketqua.'<div class="cmt-content">   
                                    <div class="user">
                                        <div class="cmt-user">
                                            <img src="assets/user/images/avatar/'.$blbv->image.'" alt="">
                                            <div class="cmt-user__text">
                                                <div class="name">'.$blbv->viewname.' <small>'.$blbv->updated_at.'</small></div>
                                                    <div class="text">'.$blbv->noidung.'</div> ';
                            

                                                if(Auth::check() && Auth::User()->id == $blbv->id_user){
                                                    $ketqua = $ketqua.'<button onclick="clickXoaBinhLuan('.$blbv->id.')" class="fas fa-trash-alt remove"  id="btnXoaBinhLuan"> Xóa</button>
                                                    <button onclick="clickSuaBinhLuan('.$blbv->id.' , \''.$blbv->noidung.'\');" id="btnSuaBinhLuan" class="far fa-edit remove"> Sửa</button>';
                                                }

                                                if($chitietbinhluanbaiviet != null){ 
                                                    $dem = 0; 
                                                    foreach($chitietbinhluanbaiviet as $ctblbv){
                                                        if($ctblbv->id_binhluan == $blbv->id && $ctblbv->idtintuc == $req->id_baiviethientai)
                                                            $dem++;   
                                                    } 
                                                    $ketqua = $ketqua.'
                                                                        <div class="rep"> 
                                                                            <a onclick="clickRepComment(this, '.$id_toggle.')" class="btn-rep far fa-comment-dots"> '.$dem.'.</a>
                                                                        </div> 
                                                                    ';
                                                }
                                                $id_toggle++;
                            $ketqua = $ketqua.      '</div>
                                                </div>	 <!-- Nội dung comment của user -->' ; 
                                                
                                                // Chi tiết bình luận  
                            if($id_toggle != $req->id_toggle_hientai+1){
                                $ketqua = $ketqua.'<div class="user-content__rep">';
                            }
                            else{
                                $ketqua = $ketqua.'<div class="user-content__rep hienthi">'; 
                            }

                            if($chitietbinhluanbaiviet != null){
                                foreach($chitietbinhluanbaiviet as $ctblbv){ 
                                    if($ctblbv->id_binhluan == $blbv->id && $ctblbv->idtintuc == $req->id_baiviethientai){
                                        $ketqua = $ketqua.'<div class="rep-user"> 
                                        <div class="cmt-user">
                                            <img src="assets/user/images/avatar/'.$ctblbv->image.'" alt="">
                                            <div class="cmt-user__text">
                                                <div class="name">'.$ctblbv->viewname.' <small>'.$ctblbv->updated_at.'</small></div>
                                                <div class="text">'.$ctblbv->noidung.'</div>';
                                                if(Auth::check() && Auth::User()->id == $ctblbv->id_user){  
                                                    $ketqua = $ketqua.'<button onclick="clickXoaTraloiBinhLuan('.$ctblbv->id.')" class="fas fa-trash-alt remove"> Xóa</button>
                                                    <button onclick="clickSuaTraloiBinhLuan('.$ctblbv->id.', '.$blbv->id.', \''.$ctblbv->noidung.'\')" class="far fa-edit remove"> Sửa</button>';
                                                }

                                            $ketqua = $ketqua.'</div>
                                        </div>	   
                                    </div> <!-- nội dung rep của user -->';
                                    }
                                } 
                            } 
                            $ketqua = $ketqua.'<div class="rep-input">
                                <div class="cmt-add">
                                    <div class="cmt-add__input">';
                                    if(Auth::check()) {
                                        $ketqua = $ketqua.'<img src="assets/user/images/avatar/'.$nameuser->image.'" alt="">';
                                    }
                                    $ketqua = $ketqua.'<textarea name="" id="texttraloi'.$blbv->id.'" cols="30" rows="1" ';
                                    if(!Auth::check()) $ketqua = $ketqua.'readonly'; 
                                    
                                    $ketqua = $ketqua.'></textarea>	
                                    </div>
                                    <div class="btn"> <button id="btnHuyTraLoiBinhLuan'.$blbv->id.'" hidden onclick="clickHuyTraLoiBinhLuan('.$blbv->id.')">Hủy bỏ</button>
                                    <button value="them" onclick="clickSubTraLoiBinhLuan('.$blbv->id.')" id="btnSubTraLoiBinhLuan'.$blbv->id.'"';
                                    if(!Auth::check()){
                                        $ketqua = $ketqua.'disabled';
                                    } 
                                    $ketqua = $ketqua.'>Trả lời</button></div>
                                </div>
                            </div> <!-- ô input rep user -->	
                        </div> <!-- Khung chứa của rep -->';
 

                                $ketqua = $ketqua.'</div>
                                                </div> <!-- ô input rep user -->	
                                            </div> <!-- Khung chứa của rep -->'; 
                $ketqua = $ketqua.'  
                            </div> 
                        </div>';  
            } 
        } 
        
        return $ketqua;
    }    

    public function suaTraloiBinhLuan(Request $req){ 
        $suatraloibinhluan = ChiTietBinhLuan::find($req->id_sua);
        $suatraloibinhluan->noidung = $req->noidung;
        $suatraloibinhluan->save();

        $chitietbaiviet = DB::table('tin_tucs')  
                            ->where('id','=',$req->id_baiviethientai)  
                            ->first();
        $nameuser = DB::table('users')  
                        ->where('id','=',$chitietbaiviet->id_user)  
                        ->first(); 
        $binhluanbaiviet = DB::table('binh_luans')
                            ->join('users', 'binh_luans.id_user', '=', 'users.id')
                            ->join('tin_tucs', 'binh_luans.id_tintuc', '=', 'tin_tucs.id')
                            ->where('binh_luans.id_tintuc','=',$req->id_baiviethientai)
                            ->select('binh_luans.*','users.name','users.viewname','users.email','users.image','users.updated_at')                            
                            ->orderBy('binh_luans.id', 'desc')   
                            ->paginate(20);  
        $chitietbinhluanbaiviet = DB::table('tin_tucs')  
                                    ->join('binh_luans', 'binh_luans.id_tintuc', '=', 'tin_tucs.id')
                                    ->join('chi_tiet_binh_luans', 'chi_tiet_binh_luans.id_binhluan', '=', 'binh_luans.id') 
                                    ->join('users', 'chi_tiet_binh_luans.id_user', '=', 'users.id') 
                                    ->select('chi_tiet_binh_luans.*','users.id as id_usBinhLuan','users.viewname','users.image','tin_tucs.id as idtintuc')
                                    ->get(); 
        $ketqua = "";
        if($binhluanbaiviet != null){
            $id_toggle = 0;
            foreach($binhluanbaiviet as $blbv){
                $ketqua = $ketqua.'<div class="cmt-content">   
                                    <div class="user">
                                        <div class="cmt-user">
                                            <img src="assets/user/images/avatar/'.$blbv->image.'" alt="">
                                            <div class="cmt-user__text">
                                                <div class="name">'.$blbv->viewname.' <small>'.$blbv->updated_at.'</small></div>
                                                    <div class="text">'.$blbv->noidung.'</div> ';
                            

                                                if(Auth::check() && Auth::User()->id == $blbv->id_user){
                                                    $ketqua = $ketqua.'<button onclick="clickXoaBinhLuan('.$blbv->id.')" class="fas fa-trash-alt remove"  id="btnXoaBinhLuan"> Xóa</button>
                                                    <button onclick="clickSuaBinhLuan('.$blbv->id.' , \''.$blbv->noidung.'\');" id="btnSuaBinhLuan" class="far fa-edit remove"> Sửa</button>';
                                                }

                                                if($chitietbinhluanbaiviet != null){ 
                                                    $dem = 0; 
                                                    foreach($chitietbinhluanbaiviet as $ctblbv){
                                                        if($ctblbv->id_binhluan == $blbv->id && $ctblbv->idtintuc == $req->id_baiviethientai)
                                                            $dem++;   
                                                    } 
                                                    $ketqua = $ketqua.'
                                                                        <div class="rep"> 
                                                                            <a onclick="clickRepComment(this, '.$id_toggle.')" class="btn-rep far fa-comment-dots"> '.$dem.'.</a>
                                                                        </div> 
                                                                    ';
                                                }
                                                $id_toggle++;
                            $ketqua = $ketqua.      '</div>
                                                </div>	 <!-- Nội dung comment của user -->' ; 
                                                
                                                // Chi tiết bình luận  
                            if($id_toggle != $req->id_toggle_hientai+1){
                                $ketqua = $ketqua.'<div class="user-content__rep">';
                            }
                            else{
                                $ketqua = $ketqua.'<div class="user-content__rep hienthi">'; 
                            }

                            if($chitietbinhluanbaiviet != null){
                                foreach($chitietbinhluanbaiviet as $ctblbv){ 
                                    if($ctblbv->id_binhluan == $blbv->id && $ctblbv->idtintuc == $req->id_baiviethientai){
                                        $ketqua = $ketqua.'<div class="rep-user"> 
                                        <div class="cmt-user">
                                            <img src="assets/user/images/avatar/'.$ctblbv->image.'" alt="">
                                            <div class="cmt-user__text">
                                                <div class="name">'.$ctblbv->viewname.' <small>'.$ctblbv->updated_at.'</small></div>
                                                <div class="text">'.$ctblbv->noidung.'</div>';
                                                if(Auth::check() && Auth::User()->id == $ctblbv->id_user){  
                                                    $ketqua = $ketqua.'<button onclick="clickXoaTraloiBinhLuan('.$ctblbv->id.')" class="fas fa-trash-alt remove"> Xóa</button>
                                                    <button onclick="clickSuaTraloiBinhLuan('.$ctblbv->id.', '.$blbv->id.', \''.$ctblbv->noidung.'\')" class="far fa-edit remove"> Sửa</button>';
                                                }

                                            $ketqua = $ketqua.'</div>
                                        </div>	   
                                    </div> <!-- nội dung rep của user -->';
                                    }
                                } 
                            } 
                            $ketqua = $ketqua.'<div class="rep-input">
                                <div class="cmt-add">
                                    <div class="cmt-add__input">';
                                    if(Auth::check()) {
                                        $ketqua = $ketqua.'<img src="assets/user/images/avatar/'.$nameuser->image.'" alt="">';
                                    }
                                    $ketqua = $ketqua.'<textarea name="" id="texttraloi'.$blbv->id.'" cols="30" rows="1" ';
                                    if(!Auth::check()) $ketqua = $ketqua.'readonly'; 
                                    
                                    $ketqua = $ketqua.'></textarea>	
                                    </div>
                                    <div class="btn"> <button id="btnHuyTraLoiBinhLuan'.$blbv->id.'" hidden onclick="clickHuyTraLoiBinhLuan('.$blbv->id.')">Hủy bỏ</button>
                                    <button value="them" onclick="clickSubTraLoiBinhLuan('.$blbv->id.')" id="btnSubTraLoiBinhLuan'.$blbv->id.'"';
                                    if(!Auth::check()){
                                        $ketqua = $ketqua.'disabled';
                                    } 
                                    $ketqua = $ketqua.'>Trả lời</button></div>
                                </div>
                            </div> <!-- ô input rep user -->	
                        </div> <!-- Khung chứa của rep -->';
 

                                $ketqua = $ketqua.'</div>
                                                </div> <!-- ô input rep user -->	
                                            </div> <!-- Khung chứa của rep -->'; 
                $ketqua = $ketqua.'  
                            </div> 
                        </div>';  
            } 
        } 
        
        return $ketqua;
    }    

    public function xoaTraloiBinhLuan(Request $req){
        $xoabinhluan = ChiTietBinhLuan::find($req->id_xoa);
        $xoabinhluan->delete();
        $chitietbaiviet = DB::table('tin_tucs')  
                            ->where('id','=',$req->id_baiviethientai)  
                            ->first();
        $nameuser = DB::table('users')  
                        ->where('id','=',$chitietbaiviet->id_user)  
                        ->first(); 
        $binhluanbaiviet = DB::table('binh_luans')
                            ->join('users', 'binh_luans.id_user', '=', 'users.id')
                            ->join('tin_tucs', 'binh_luans.id_tintuc', '=', 'tin_tucs.id')
                            ->where('binh_luans.id_tintuc','=',$req->id_baiviethientai)
                            ->select('binh_luans.*','users.name','users.viewname','users.email','users.image','users.updated_at')                            
                            ->orderBy('binh_luans.id', 'desc')   
                            ->paginate(20);  
        $chitietbinhluanbaiviet = DB::table('tin_tucs')  
                                    ->join('binh_luans', 'binh_luans.id_tintuc', '=', 'tin_tucs.id')
                                    ->join('chi_tiet_binh_luans', 'chi_tiet_binh_luans.id_binhluan', '=', 'binh_luans.id') 
                                    ->join('users', 'chi_tiet_binh_luans.id_user', '=', 'users.id') 
                                    ->select('chi_tiet_binh_luans.*','users.id as id_usBinhLuan','users.viewname','users.image','tin_tucs.id as idtintuc')
                                    ->get(); 
        $ketqua = "";
        if($binhluanbaiviet != null){
            $id_toggle = 0;
            foreach($binhluanbaiviet as $blbv){
                $ketqua = $ketqua.'<div class="cmt-content">   
                                    <div class="user">
                                        <div class="cmt-user">
                                            <img src="assets/user/images/avatar/'.$blbv->image.'" alt="">
                                            <div class="cmt-user__text">
                                                <div class="name">'.$blbv->viewname.' <small>'.$blbv->updated_at.'</small></div>
                                                    <div class="text">'.$blbv->noidung.'</div> ';
                            

                                                if(Auth::check() && Auth::User()->id == $blbv->id_user){
                                                    $ketqua = $ketqua.'<button onclick="clickXoaBinhLuan('.$blbv->id.')" class="fas fa-trash-alt remove"  id="btnXoaBinhLuan"> Xóa</button>
                                                    <button onclick="clickSuaBinhLuan('.$blbv->id.' , \''.$blbv->noidung.'\');" id="btnSuaBinhLuan" class="far fa-edit remove"> Sửa</button>';
                                                }

                                                if($chitietbinhluanbaiviet != null){ 
                                                    $dem = 0; 
                                                    foreach($chitietbinhluanbaiviet as $ctblbv){
                                                        if($ctblbv->id_binhluan == $blbv->id && $ctblbv->idtintuc == $req->id_baiviethientai)
                                                            $dem++;   
                                                    } 
                                                    $ketqua = $ketqua.'
                                                                        <div class="rep"> 
                                                                            <a onclick="clickRepComment(this, '.$id_toggle.')" class="btn-rep far fa-comment-dots"> '.$dem.'.</a>
                                                                        </div> 
                                                                    ';
                                                }
                                                $id_toggle++;
                            $ketqua = $ketqua.      '</div>
                                                </div>	 <!-- Nội dung comment của user -->' ; 
                                                
                                                // Chi tiết bình luận  
                            if($id_toggle != $req->id_toggle_hientai+1){
                                $ketqua = $ketqua.'<div class="user-content__rep">';
                            }
                            else{
                                $ketqua = $ketqua.'<div class="user-content__rep hienthi">'; 
                            }

                            if($chitietbinhluanbaiviet != null){
                                foreach($chitietbinhluanbaiviet as $ctblbv){ 
                                    if($ctblbv->id_binhluan == $blbv->id && $ctblbv->idtintuc == $req->id_baiviethientai){
                                        $ketqua = $ketqua.'<div class="rep-user"> 
                                        <div class="cmt-user">
                                            <img src="assets/user/images/avatar/'.$ctblbv->image.'" alt="">
                                            <div class="cmt-user__text">
                                                <div class="name">'.$ctblbv->viewname.' <small>'.$ctblbv->updated_at.'</small></div>
                                                <div class="text">'.$ctblbv->noidung.'</div>';
                                                if(Auth::check() && Auth::User()->id == $ctblbv->id_user){  
                                                    $ketqua = $ketqua.'<button onclick="clickXoaTraloiBinhLuan('.$ctblbv->id.')" class="fas fa-trash-alt remove"> Xóa</button>
                                                    <button onclick="clickSuaTraloiBinhLuan('.$ctblbv->id.', '.$blbv->id.', \''.$ctblbv->noidung.'\')" class="far fa-edit remove"> Sửa</button>';
                                                }

                                            $ketqua = $ketqua.'</div>
                                        </div>	   
                                    </div> <!-- nội dung rep của user -->';
                                    }
                                } 
                            } 
                            $ketqua = $ketqua.'<div class="rep-input">
                                <div class="cmt-add">
                                    <div class="cmt-add__input">';
                                    if(Auth::check()) {
                                        $ketqua = $ketqua.'<img src="assets/user/images/avatar/'.$nameuser->image.'" alt="">';
                                    }
                                    $ketqua = $ketqua.'<textarea name="" id="texttraloi'.$blbv->id.'" cols="30" rows="1" ';
                                    if(!Auth::check()) $ketqua = $ketqua.'readonly'; 
                                    
                                    $ketqua = $ketqua.'></textarea>	
                                    </div>
                                    <div class="btn"> <button id="btnHuyTraLoiBinhLuan'.$blbv->id.'" hidden onclick="clickHuyTraLoiBinhLuan('.$blbv->id.')">Hủy bỏ</button>
                                    <button value="them" onclick="clickSubTraLoiBinhLuan('.$blbv->id.')" id="btnSubTraLoiBinhLuan'.$blbv->id.'"';
                                    if(!Auth::check()){
                                        $ketqua = $ketqua.'disabled';
                                    } 
                                    $ketqua = $ketqua.'>Trả lời</button></div>
                                </div>
                            </div> <!-- ô input rep user -->	
                        </div> <!-- Khung chứa của rep -->';
 

                                $ketqua = $ketqua.'</div>
                                                </div> <!-- ô input rep user -->	
                                            </div> <!-- Khung chứa của rep -->'; 
                $ketqua = $ketqua.'  
                            </div> 
                        </div>';  
            } 
        } 
        
        return $ketqua;
    }    
}
