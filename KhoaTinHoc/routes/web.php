<?php
 

Route::get('/', function () {
    return view('pages/user/home');
});

Route::get('/loaitintuc', function () {
    return view('pages/user/type_news');
});

Route::get('/danhsach', function () {
    return view('pages/user/list_view');
});

Route::get('/baiviet', function () {
    return view('pages/user/news');
});