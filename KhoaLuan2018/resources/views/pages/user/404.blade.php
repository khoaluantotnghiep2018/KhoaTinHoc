@extends('layout/user/index')
@section('title')
Lỗi
@endsection

@section('css')
<link rel="stylesheet" href="assets/user/css/news.css">
@endsection
<style>
    .page-error {
        text-align: center;
        margin-top: 1em;
    }

    .page-error h1 {
        margin: 10px;
        color: #dc3545;
        font-size: 42px;
    }

    .btnbackgohome {
        margin-top: 0.5em;
        cursor: pointer;
        display: inline-block;
        font-weight: 700;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        border: 2px solid transparent;
        padding: 0.375rem 0.75rem;
        font-size: 0.875rem;
        line-height: 1.5;
        border-radius: 3px;
        box-sizing: border-box;
        color: #FFF;
        background-color: #009688;
        border-color: #009688;
    }

    .btnbackgohome:hover {}
</style>

@section('content')
<div class="content">
    <div class="page-error tile">
        <h1><i class="fa fa-exclamation-circle"></i> Lỗi 404: Trang không tồn tại!</h1>
        <p>Trang bạn yêu cầu không được tìm thấy.</p>
        <p><a class="btnbackgohome" href="javascript:window.history.back();">Quay lại</a></p>
    </div> 
</div> <!-- END CONTENT -->
@endsection

@section('script')
<script src='assets/user/js/comment.js'></script>
@endsection