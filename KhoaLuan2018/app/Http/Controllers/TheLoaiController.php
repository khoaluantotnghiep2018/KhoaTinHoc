<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TheLoaiController extends Controller
{
    public function getTheLoai(){
    	return view('pages.admin.theloai.ds_theloai');
    }
}
