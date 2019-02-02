<?php
    
    
Route::group(['prefix'=>''] , function(){
    Route::get('', function () {
        return redirect()->route('trangchinh');
    }); 
    Route::get('trangchu', function () {
        return view('pages/user/home');
    })->name('trangchinh');   
    Route::get('gioithieu', function () {
        return view('pages/user/introduce');
    });  
    Route::get('danhsachtin', function () {
        return view('pages/user/type_news');
    });  
    Route::get('tintuc', function () {
        return view('pages/user/news');
    });
});
    

Route::group(['prefix'=>'quantri'] , function(){
    Route::get('trangchu', function () {
        return view('pages/admin/trangchu');
    }); 
    Route::group(['prefix'=>'gioithieu'] , function(){
        Route::get('/', function () {
            return view('pages/admin/gioithieu');
        });   
        Route::post('/sua', 'TrangchuController@SuaGioiThieu');
    });
});

