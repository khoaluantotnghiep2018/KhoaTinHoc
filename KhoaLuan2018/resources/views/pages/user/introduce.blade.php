@extends('layout/user/index')

@section('title')
Giới thiệu
@endsection
@section('css') 
<link rel="stylesheet" href="assets/user/css/news.css">

@endsection
@section('content')     

<div class="content">  
    <div class="news">  
        <div class="news-content"> 
            {!!$trangchu->gioithieu!!}  
        </div> 
    </div> 
</div> <!-- END CONTENT -->

@endsection

@section('script')
@endsection