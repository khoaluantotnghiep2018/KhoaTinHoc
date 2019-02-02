@extends('layout/user/index')

@section('title')
Giới thiệu
@endsection

@section('content')    
    <div class="news">
        {!!$trangchu->gioithieu!!} 
    </div>
@endsection

@section('script')
@endsection