@extends('layout/admin/index')
@section('title')
Quản trị - Tài khoản - Thêm tài khoản
@endsection
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Thêm bài viết</h1>
            <p>Đăng bài lên hệ thống</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Trang chủ</li>
            <li class="breadcrumb-item">Bài viết</li>
            <li class="breadcrumb-item"><a href="#">Thêm</a></li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if(session('thongbaonoidung'))
            <div class="alert alert-dismissible alert-danger">
                    <center><button class="close" type="button" data-dismiss="alert">×</button> <strong> Thất bại!</strong>
                {{session('thongbaonoidung')}}</center>
            </div>
            @endif

            @if(session('thongbaothem'))
                @if(session('thongbaothem') == '1')
                    <div class="alert alert-dismissible alert-success">
                        <button class="close" type="button" data-dismiss="alert">×</button>	<strong>Thành công!</strong> Dữ liệu đã được thêm mới!
                </div>
                @else
                    <div class="alert alert-dismissible alert-danger">
                        <button class="close" type="button" data-dismiss="alert">×</button>	<strong>Thất bại!</strong> Lỗi tiến trình thêm dữ liệu!
                </div>
                @endif
            @endif

            <form id="formBaiViet" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="selectTheLoai">Thể loại</label>
                    <select class="form-control" id="selectTheLoai" required>
                        <option></option>  
                        @foreach($theloai as $tl)
                        <option value="{{$tl->id}}">{{$tl->tentheloai}}</option> 
                        @endforeach
                    </select>
                </div>
                <div class="form-group" id="luuLoaiTin">
                    <label for="selectLoaiTin">Loại tin tức</label>
                    <select class="form-control"> 
                        <option></option>  
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Tiêu đề</label>
                    <input required class="form-control" type="text" placeholder="Nhập vào tiêu đề" name="tieude">
                </div>
                <div class="form-group">
                    <label class="control-label">Mô tả ngắn</label>
                    <textarea required class="form-control" rows="4" placeholder="Nhập vào mô tả"
                        name="mota"></textarea>
                </div>
                <div class="form-group row">
                    <div class="col-md-8 col-md-offset-3">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="noibat" checked> Tin nổi bật
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Hình mô tả</label>
                    <input required id="hinhmota" class="form-control" type="file" name="hinhanh">
                </div>
                <div class="tile">
                    <div class="tile-title-w-btn">
                        <h3 class="title">Nội dung bài đăng</h3>
                    </div>
                    <div class="tile-body">
                        <textarea name="noidung" rows="30" id="textcontent"></textarea>
                        <p>Nhấn tải lên để hoàn tất việc đăng tải một bài viết mới lên hệ thống.</p>
                        <input name="image" type="file" id="upload" hidden>
                    </div>
                </div>
                <button class="btn btn-info" type="submit">Tải lên <i class="fa fa-upload"
                        aria-hidden="true"></i></button>
                <button class="btn btn-secondary" type="reset">Nhập lại <i class="fa fa-refresh"
                        aria-hidden="true"></i></button>
            </form>
        </div>
    </div>
</main>
@section('script')
<script>
    $(document).ready(function () {
        if (tinymce.editors.length > 0) {
            for (i = 0; i < tinymce.editors.length; i++) {
                tinymce.editors[i].remove();
            }
        }
        tinymce.init({
            selector: "#textcontent",
            theme: "modern",
            paste_data_images: true,
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
            toolbar2: "print preview media | forecolor backcolor emoticons",
            image_advtab: true,
            file_picker_callback: function (callback, value, meta) {
                if (meta.filetype == 'image') {
                    $('#upload').trigger('click');
                    $('#upload').on('change', function () {
                        var file = this.files[0];
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            callback(e.target.result, {
                                alt: ''
                            });
                        };
                        reader.readAsDataURL(file);
                    });
                }
            },
            templates: [{
                title: 'Test template 1',
                content: 'Test 1'
            }, {
                title: 'Test template 2',
                content: 'Test 2'
            }]
        });

        // tinymce.get('contentintro').setContent(content);
    });

    // Xử lý submit form 
    var frm = $('#formBaiViet');
    frm.submit(function (e) {
        var text_hinhmota = $("#hinhmota").val();
        var duoianh;
        if (text_hinhmota != '') {
            duoianh = $('#hinhmota')[0].files[0].type;
        }
        else {
            duoianh = '';
        }
        switch (duoianh) {
            case '':
            case 'image/png':
            case 'image/gif':
            case 'image/jpeg':
            case 'image/pjpeg':
                $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    url: 'quantri/tintuc/baiviet/them',
                    method: 'post',
                    success: function (response) {
                        
                    }
                });
                break;
            default:
                swal({
                    title: "File ảnh không hợp lệ!",
                });
                return false;
        }
    });

    var slTheLoai = $('#selectTheLoai');
    slTheLoai.change(function() {
        var idTheLoai = slTheLoai.val();
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url: 'quantri/tintuc/baiviet/selectLoaiTin',
            method: 'post',
            data: {idTheLoai: idTheLoai},
            success: function (data) { 
                $("#luuLoaiTin").html(data); 
            }
        }); 
    });
</script>
@endsection