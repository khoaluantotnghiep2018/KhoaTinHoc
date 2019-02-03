@extends('layout/admin/index')
@section('title')
Giới thiệu
@endsection

@section('css')
<style> 
    #list li{
        cursor: move;
    }
    #mceu_13-body {
        display: none;
    }
</style>
@endsection

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Hiển thị</h1>
            <p>Quản lí trình bày - hiển thị nội dung trang chủ</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Trang chủ</li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Hiển thị</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="row">
                    <div class="col-lg-5">

                        <legend>Hiển thị tin đầu trang</legend>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" id="optionsRadios1" type="radio" name="optionsRadios"
                                    value="option1" @if($trangchu->hienthirss) checked @endif>Lựa chọn tin lấy
                                từ RSS
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" id="optionsRadios2" type="radio" name="optionsRadios"
                                    value="option2" @if(!$trangchu->hienthirss) checked @endif>Lựa chọn tin lấy
                                từ tin tức nỗi bật
                            </label>
                        </div>
                        <legend>Danh mục tin tức hiển thị</legend>
                        @foreach($theloai as $tlhienthi)
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input hienthitin" type="checkbox"  value="{{$tlhienthi->id}}" @if($tlhienthi->hienthi) checked @endif >{{$tlhienthi->tentheloai}}
                            </label>
                        </div>
                        @endforeach 
                        <button class="btn btn-primary" type="button" id="subhienthitintuc"><i class="fa fa-fw fa-lg fa-check-circle"></i>Lưu lại</button> 
                        <!-- Quản lý tin tức ưu tiên -->
                        <legend>Sắp xếp hiển thị ưu tiên</legend>
                        <section> 
                            <ul class="sortable list" id="list">
                                @foreach($theloai as $tlsapxep)
                                <li class="indextintuc">{{$tlsapxep->tentheloai}}</li> 
                                @endforeach
                            </ul>
                        </section> 
                        <button class="btn btn-primary" type="button" id="subxeptintuc"><i class="fa fa-fw fa-lg fa-check-circle"></i>Xếp lại</button>

                        <form> 
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input class="form-control" id="exampleInputPassword1" type="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleSelect1">Example select</label>
                                <select class="form-control" id="exampleSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleSelect2">Example multiple select</label>
                                <select class="form-control" id="exampleSelect2" multiple="">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea">Example textarea</label>
                                <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <input class="form-control-file" id="exampleInputFile" type="file" aria-describedby="fileHelp"><small
                                    class="form-text text-muted" id="fileHelp">This is some placeholder block-level
                                    help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox">Check me out
                                </label>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-5 offset-lg-1">
                        <div class="form-group">
                            <legend>Cập nhật thông báo</legend> 
                            <textarea name="" rows="9" id="textthongbao" ></textarea> 
                        </div>
                        <button class="btn btn-primary" type="button" id="subdangthongbao"><i class="fa fa-fw fa-lg fa-check-circle"></i>Tải lên thông báo mới</button>

                        <form>
                            <div class="form-group">
                                <fieldset disabled="">
                                    <label class="control-label" for="disabledInput">Disabled input</label>
                                    <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input here..."
                                        disabled="">
                                </fieldset>
                            </div>
                            <div class="form-group">
                                <fieldset>
                                    <label class="control-label" for="readOnlyInput">Readonly input</label>
                                    <input class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…"
                                        readonly="">
                                </fieldset>
                            </div>
                            <div class="form-group has-success">
                                <label class="form-control-label" for="inputSuccess1">Valid input</label>
                                <input class="form-control is-valid" id="inputValid" type="text">
                                <div class="form-control-feedback">Success! You've done it.</div>
                            </div>
                            <div class="form-group has-danger">
                                <label class="form-control-label" for="inputDanger1">Invalid input</label>
                                <input class="form-control is-invalid" id="inputInvalid" type="text">
                                <div class="form-control-feedback">Sorry, that username's taken. Try another?</div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label col-form-label-lg" for="inputLarge">Large input</label>
                                <input class="form-control form-control-lg" id="inputLarge" type="text">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" for="inputDefault">Default input</label>
                                <input class="form-control" id="inputDefault" type="text">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label col-form-label-sm" for="inputSmall">Small input</label>
                                <input class="form-control form-control-sm" id="inputSmall" type="text">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Input addons</label>
                                <div class="form-group">
                                    <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                        <input class="form-control" id="exampleInputAmount" type="text" placeholder="Amount">
                                        <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tile-footer">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </div>
        </div>
    </div>
</main>

@section('script')
<script src="assets/admin/js/hienthi.js"></script>
<script src="assets/admin/js/jquery.sortable.js"></script>
<script>

$(document).ready(function () { 
    if (tinymce.editors.length > 0) {
        for (i = 0; i < tinymce.editors.length; i++) {
            tinymce.editors[i].remove();
        }
    }

    tinyMCE.init({
        mode: "textthongbao",
        theme : "advanced",
        // (more init options here)
        setup: function(ed) {
            // Force Paste-as-Plain-Text
            ed.onPaste.add( function(ed, e, o) {
                ed.execCommand('mcePasteText', true);
                return tinymce.dom.Event.cancel(e);
            });
        }
    }); 
    
    
 
});


    $(function() {
        $('.sortable').sortable(); 
    }); 
   
    $("#subxeptintuc").click(function(){ 
        var mangtintuc = [];  
        $( ".indextintuc" ).each(function( index ) { 
            mangtintuc.push( {
                uutien: index,
                value: $( this ).text(), 
            }); 
        });
        // console.log( mangtintuc );  
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url:'quantri/hienthi/suahienthitintuc',
            method:'post',
            data: {mangtintuc: mangtintuc},
            success:function(response){   
                if(response != ""){ 
                    // Hiển thị thông báo thành công
                    $.notify({
                        title: "Thành công : ",
                        message: "Nội dung đã được cập nhật!",
                        icon: 'fa fa-check' 
                    },{
                        type: "success"
                    });   
                }
                else{
                    swal({
                        title: "Lỗi dữ liệu, thông tin chưa được cập nhật!",
                    });
                } 
            }
        })
    });

    $("#subhienthitintuc").click(function(){ 
        var manghienthitin = [];  
        $( ".hienthitin").each(function( ) {
            var hienthi = 0;
            if(this.checked){
                hienthi = 1;
            }
            manghienthitin.push( {
                id: $( this ).val(), 
                hienthi: hienthi, 
            }); 
        });  
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url:'quantri/hienthi/suaanhientintuc',
            method:'post',
            data: {manghienthitin: manghienthitin},
            success:function(response){   
                if(response != ""){ 
                    // Hiển thị thông báo thành công
                    $.notify({
                        title: "Thành công : ",
                        message: "Nội dung đã được cập nhật!",
                        icon: 'fa fa-check' 
                    },{
                        type: "success"
                    });   
                }
                else{
                    swal({
                        title: "Lỗi dữ liệu, thông tin chưa được cập nhật!",
                    });
                } 
            }
        })
    });
</script>
@endsection