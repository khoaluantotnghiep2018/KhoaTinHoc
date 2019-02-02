@extends('layout/user/index')

@section('title')
Giới thiệu
@endsection

@section('content')    
    <div class="news">
        <div class="news-content">
            {!!$trangchu->gioithieu!!} 
        </div>
    </div>
@endsection

@section('script')
@endsection