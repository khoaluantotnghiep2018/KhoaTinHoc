@extends('layout/admin/index')
@section('title')
Giới thiệu
@endsection  
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-home"></i> Giới thiệu</h1>
            <p>Thay đổi nội dung giới thiệu</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Giới thiệu</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-title-w-btn">
                    <h3 class="title">Chỉnh sửa nội dung</h3>
                </div>
                <div class="tile-body"> 
                    <textarea name="" rows="30" id="textGioiThieu" >{!! $trangchu->gioithieu !!}</textarea>
                    <p>Toàn bộ nội dung thay đổi sẽ không thể hoàn tác, bạn hãy chắc chắc thay đổi.</p>
                    <a class="btn btn-info" id="suagioithieu" href="javascript:void(0)">Cập nhật</a>
                    <input name="image" type="file" id="upload" hidden>
                </div>
            </div>
        </div>
    </div>
</main> 

@section('script')
<script src="assets/admin/js/gioithieu.js"></script> 
@endsection