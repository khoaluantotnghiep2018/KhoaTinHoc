<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\TrangChu;

class thu extends Controller
{
    public function testmodel(){
    	$trangchu = TrangChu::all();
    	return $trangchu;
    }
}
