<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\LoaiTin;
use App\Model\TheLoai;
use App\Model\TinTuc;
use View;
use Auth;
use DateTime;
use DB;

class BaiVietController extends Controller
{
    function __construct(){ 
    	$loaitin = LoaiTin::all();
        $theloai = TheLoai::all();
    	view::share(['loaitin', $loaitin, 'theloai',$theloai]);
	}


	// NGƯỜI DÙNG
    public function getDsTinTuc(){
        $dsbaiviet = TinTuc::paginate(4);  
        return view('pages/user/type_news',['dsbaiviet'=>$dsbaiviet]); 
    }

	// QUẢN TRỊ VIÊN
    public function getBaiViet(){ 
        $dsbaiviet = TinTuc::all();   
    	return view('pages.admin.BaiViet.ds_baiviet',['dsbaiviet'=>$dsbaiviet]);
    }

    public function themBaiViet(){ 
    	return view('pages.admin.BaiViet.them_baiviet');
    }

    public function postThemBaiViet(Request $request){   
        if($request->noidung == null){
            return back()->with('thongbaonoidung','Bạn chưa nhập nội dung, vui lòng thực hiện lại!');
        }
        else{
            $baivietmoi = new TinTuc;
            $baivietmoi->tieude = $request->tieude;
            if($request->hasFile('hinhanh')){ 
                $now = new DateTime(); 
                $file = $request->file('hinhanh'); 
                $fileName = $now->getTimestamp().$file->getClientOriginalName(); 
                $file->move('assets/user/images/hinhtintuc',$fileName);  
            }
            else{
                $fileName = "hinhmota.jpg";
            }
            $baivietmoi->hinhdaidien = $fileName;
            $baivietmoi->mota = $request->mota;
            $baivietmoi->noidung = $request->noidung;
            $baivietmoi->id_loaitin = $request->idLoaiTin;

            $baivietmoi->id_user = Auth::User()->id;
            
            if($request->noibat === "on"){
                $baivietmoi->noibat = 1; 
            }
            $kiemtra = $baivietmoi->save(); 
            return redirect('quantri/tintuc/baiviet/them')->with('thongbaothem',$kiemtra);
        }
    }

    public function selectLoaiTin(Request $request){ 
        $loaitinajax = LoaiTin::all();
        $hienthi = '<label for="selectLoaiTin">Loại tin tức</label>
        <select class="form-control" name="idLoaiTin">';
        foreach($loaitinajax as $lt) {
            if($lt->id_theloai == $request->idTheLoai){
                $hienthi = $hienthi.'<option value="'. $lt->id .'">'. $lt->tenloaitin .'</option>';  
            }
        } 
        return $hienthi.'</select>';
    }

    public function postSuaNoiBat(Request $request){
        $hienthi = '<label>'; 
        $tintucsua = TinTuc::find($request->id);
        if($tintucsua->noibat == "1"){
            $tintucsua->noibat = 0;
            $hienthi = $hienthi.'<input type="checkbox" onchange="DoiNoiBat('.$request->id.')"><span class="label-text"> Tắt</span>'; 
        }
        else{
            $tintucsua->noibat = 1;
            $hienthi = $hienthi.'<input type="checkbox" checked onchange="DoiNoiBat('.$request->id.')"><span class="label-text"> Mở</span>';
        }
        $tintucsua->save(); 
        echo $hienthi.'</label>';
    }

    public function getsuaBaiViet($id){  
        $baivietsua = DB::table('tin_tucs')->join('loai_tins', 'tin_tucs.id_loaitin', '=', 'loai_tins.id') 
                    ->join('the_loais', 'loai_tins.id_theloai', '=', 'the_loais.id')
                    ->select('tin_tucs.*','the_loais.id as idTheLoai','the_loais.tentheloai','loai_tins.tenloaitin')
                    ->where('tin_tucs.id','=',$id)
                    ->first();
        
        return view('pages.admin.BaiViet.sua_baiviet',['baivietsua'=>$baivietsua]);  
    }

    public function postsuaBaiViet(Request $request, $id){ 
        $baivietsua = TinTuc::find($id);
        if($request->noidung == null){
            return back()->with('thongbaonoidung','Bạn chưa nhập nội dung, vui lòng thực hiện lại!');
        }
        else{
            $baivietsua->tieude = $request->tieude;
            if($request->hasFile('hinhanh')){ 
                $now = new DateTime(); 
                $file = $request->file('hinhanh'); 
                $fileName = $now->getTimestamp().$file->getClientOriginalName(); 
                $file->move('assets/user/images/hinhtintuc',$fileName);  
                $baivietsua->hinhdaidien = $fileName; 
            } 
            $baivietsua->mota = $request->mota;
            $baivietsua->noidung = $request->noidung;
            $baivietsua->id_loaitin = $request->idLoaiTin; 
            $baivietsua->id_user = Auth::User()->id; 
            if($request->noibat === "on"){
                $baivietsua->noibat = 1; 
            }
            else{
                $baivietsua->noibat = 0; 
            }
            $kiemtra = $baivietsua->save(); 
            return back()->with('thongbaosua',$kiemtra);
        } 
    }

    public function getXoaBaiViet($id){ 
    	$baivietxoa = TinTuc::find($id);
        $kiemtra = $baivietxoa->delete(); 
        return redirect('quantri/tintuc/baiviet/danhsach/')->with('thongbaoxoa',$kiemtra);  
    }
  
}
