@extends('layout/user/index')
@section('title')
Bài viết
@endsection

@section('css')
<link rel="stylesheet" href="assets/user/css/pagination.css">
<link rel="stylesheet" href="assets/user/css/news.css">
@endsection

@section('content')  
<div class="content">  
    @if($chitietbaiviet != null) 
    <div class="news">
        <div class="news-title">
            <h1>{{$chitietbaiviet->tieude}}</h1>
        </div> <!-- tiêu đề tin tức -->

        <div class="news-infor">
            <span><i class="fas fa-user"></i> <a href="javascript:void(0)">{{$nameuser->viewname}}</a></span>
            <span><i class="fas fa-clock"></i> {{$chitietbaiviet->updated_at}}</span>
            <span><i class="fas fa-tags"></i> <a href="javascript:void(0)">{{$theloaitheotintuc->tentheloai}}</a></span>
            <iframe src="https://www.facebook.com/plugins/share_button.php?href=<?php echo url()->current();?>&layout=button_count&size=small&mobile_iframe=true&width=78&height=20&appId" width="78" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
        </div> <!-- người đăng bài  -->

        <div class="news-tomtat">
            <strong>{{$chitietbaiviet->mota}}</strong>
            
        </div> <!-- Tóm tắt tin tức -->

        <div class="news-content"> 
            {!!$chitietbaiviet->noidung!!}
        </div>


        <div class="comment">
            <div class="cmt-title">  
                <strong>{{count($binhluanbaiviet)}} bình luận</strong>
                @if(!Auth::check())
                <small><p>Cần đăng nhập để bình luận.</p></small>
                @endif
            </div>
            <div class="cmt-add">
                <div class="cmt-add__input">
                @if(Auth::check()) 
                <img src="assets/user/images/avatar/{{Auth::User()->image}}" alt="">
                @endif
                    <textarea id="textThemBinhLuan" name="them" cols="30" rows="3" @if(!Auth::check()) disabled @endif></textarea>	
                </div> 
                <div class="btn">
                    <button id="btnHuySuaBinhLuan" hidden>Hủy bỏ</button>
                    <button id="btnSubBinhLuan" value="them" @if(!Auth::check()) disabled @endif>Gửi bình luận</button>
                </div> 
            </div>
            <div id="showAllComment"> 
            @if($binhluanbaiviet != null)
            @php
                $id_toggle = 0;
            @endphp
            @foreach($binhluanbaiviet as $blbv)
            <div class="cmt-content">   
                <div class="user">
                    <div class="cmt-user">
                        <img src="assets/user/images/avatar/{{$blbv->image}}" alt="">
                        <div class="cmt-user__text">
                            <div class="name">{{$blbv->viewname}} <small>{{$blbv->updated_at}}</small></div>
                            <div class="text">{{$blbv->noidung}}</div> 
                            @if(Auth::check() && Auth::User()->id == $blbv->id_user)  
                            <button onclick="clickXoaBinhLuan({{$blbv->id}})" class='fas fa-trash-alt remove'  id="btnXoaBinhLuan"> Xóa</button>
                            <button onclick="clickSuaBinhLuan({{$blbv->id}} , '{{$blbv->noidung}}');" id="btnSuaBinhLuan" class='far fa-edit remove'> Sửa</button> 
                            @endif
                            @if($chitietbinhluanbaiviet != null)
                                @php
                                    $dem = 0; 
                                foreach($chitietbinhluanbaiviet as $ctblbv){
                                    if($ctblbv->id_binhluan == $blbv->id && $ctblbv->idtintuc == $chitietbaiviet->id)
                                        $dem++;   
                                }
                                @endphp
                                <div class="rep"> 
                                    <a onclick="clickRepComment(this, {{$id_toggle}})" class="btn-rep far fa-comment-dots"> {{$dem}}.</a>
                                </div> 
                                @php
                                    $id_toggle++; 
                                @endphp
                            @endif
                        </div>
                    </div>	 <!-- Nội dung comment của user -->
                     
                    <div class="user-content__rep">
                        @if($chitietbinhluanbaiviet != null)
                            @foreach($chitietbinhluanbaiviet as $ctblbv)
                            @if($ctblbv->id_binhluan == $blbv->id && $ctblbv->idtintuc == $chitietbaiviet->id)
                        <div class="rep-user"> 
                            <div class="cmt-user">
                                <img src="assets/user/images/avatar/{{$ctblbv->image}}" alt="">
                                <div class="cmt-user__text">
                                    <div class="name">{{$ctblbv->viewname}} <small>{{$ctblbv->updated_at}}</small></div>
                                    <div class="text">{{$ctblbv->noidung}}</div>
                                    @if(Auth::check() && Auth::User()->id == $ctblbv->id_user)   
                                    <button onclick="clickXoaTraloiBinhLuan({{$ctblbv->id}})" class='fas fa-trash-alt remove'> Xóa</button>
                                    <button onclick="clickSuaTraloiBinhLuan({{$ctblbv->id}}, {{$blbv->id}}, '{{$ctblbv->noidung}}')" class='far fa-edit remove'> Sửa</button>
                                    @endif
                                </div>
                            </div>	   
                        </div> <!-- nội dung rep của user -->
                                @endif
                            @endforeach
                        @endif
                        <div class="rep-input">
                            <div class="cmt-add">
                                <div class="cmt-add__input">
                                @if(Auth::check()) 
                                <img src="assets/user/images/avatar/{{Auth::User()->image}}" alt="">
                                @endif
                                    <textarea name="" id="texttraloi{{$blbv->id}}" cols="30" rows="1" @if(!Auth::check()) readonly @endif></textarea>	
                                </div>
                                <div class="btn">
                                    <button id="btnHuyTraLoiBinhLuan{{$blbv->id}}" hidden onclick="clickHuyTraLoiBinhLuan({{$blbv->id}})">Hủy bỏ</button>
                                    <button value="them" onclick="clickSubTraLoiBinhLuan({{$blbv->id}})" id="btnSubTraLoiBinhLuan{{$blbv->id}}" @if(!Auth::check()) disabled @endif>Trả lời</button>
                                </div>
                            </div>
                        </div> <!-- ô input rep user -->	
                    </div> <!-- Khung chứa của rep -->
                    
                </div> 
            </div>
            @endforeach
            @endif
            </div>
            

            <div class="paginationbackground">  
        @if ($binhluanbaiviet->lastPage() > 1)
        <ul class="pagination">
            <li class="{{ ($binhluanbaiviet->currentPage() == 1) ? ' disabled' : '' }}">
                <a href="{{ $binhluanbaiviet->url(1) }}"><<</a>
            </li>

            <?php
                // config
                $link_limit = 10;
            ?>

            @for ($i = 1; $i <= $binhluanbaiviet->lastPage(); $i++)
                <?php
                    $half_total_links = floor($link_limit / 2);
                    $from = $binhluanbaiviet->currentPage() - $half_total_links;
                    $to = $binhluanbaiviet->currentPage() + $half_total_links;
                    if ($binhluanbaiviet->currentPage() < $half_total_links) {
                        $to += $half_total_links - $binhluanbaiviet->currentPage();
                    }
                    if ($binhluanbaiviet->lastPage() - $binhluanbaiviet->currentPage() < $half_total_links) {
                        $from -= $half_total_links - ($binhluanbaiviet->lastPage() - $binhluanbaiviet->currentPage()) - 1;
                    }
                ?>
                @if ($from < $i && $i < $to)
                    <li class="{{ ($binhluanbaiviet->currentPage() == $i) ? ' active' : '' }}">
                        <a href="{{ $binhluanbaiviet->url($i) }}">{{ $i }}</a>
                    </li>
                @endif
            @endfor 
            <li class="{{ ($binhluanbaiviet->currentPage() == $binhluanbaiviet->lastPage()) ? ' disabled' : '' }}">
                <a href="{{ $binhluanbaiviet->url($binhluanbaiviet->lastPage()) }}" >>></a>
            </li>
        </ul>
        @endif
        </div>
 
            
        </div>
    </div>

    @endif   

</div> <!-- END CONTENT -->
@endsection

@section('script') 
<script src="assets/user/js/comment.js"></script>  
<script> 
    var id_toggle_hientai;
    function clickRepComment(e, id){ 
        $('.user-content__rep:eq('+id+')').toggleClass("hienthi");
        id_toggle_hientai = id; 
        $('.user-content__rep').each(function (index, value) {
            if(index != id){
                $(this).removeClass("hienthi");
            }
        });
    }

    var btnSubBinhLuan = $('#btnSubBinhLuan');
    var textThemBinhLuan = $('#textThemBinhLuan'); 
    var id_baiviethientai;
    if({{$chitietbaiviet->id}} != null){
        id_baiviethientai = {{$chitietbaiviet->id}};
    }
    var id_sua;

    btnSubBinhLuan.click(function(){ 
        if(textThemBinhLuan.val() == ""){ 
            alert("Chưa có nội dung bình luận!");
            return false;
        }
        if(btnSubBinhLuan.val() == "them"){   
            var mang = [];
            mang[0] = id_baiviethientai; 
            mang[1] = textThemBinhLuan.val(); 
            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                url: 'binhluan/them',
                method: 'get', 
                data: {data: mang},
                success:function(response){   
                    $('#showAllComment').html(response); 
                    textThemBinhLuan.val("");
                }
            });    
        } 
        if(btnSubBinhLuan.val() == "sua"){ 
            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                url: 'binhluan/sua',
                method: 'get', 
                data: {
                    id_sua: id_sua,
                    noidung: textThemBinhLuan.val(),
                    id_baiviethientai : id_baiviethientai,
                },
                success:function(response){   
                    $('#showAllComment').html(response);  
                }
            });  
            btnHuySuaBinhLuan.hide();
            btnSubBinhLuan.attr('value', 'them');
            textThemBinhLuan.val("");   
        }  
    });

    var btnSuaBinhLuan = $('#btnSuaBinhLuan');
    var btnHuySuaBinhLuan = $('#btnHuySuaBinhLuan');

    function clickSuaBinhLuan(id, text){  
        btnSubBinhLuan.attr('value', 'sua');
        btnHuySuaBinhLuan.show();
        textThemBinhLuan.val(text); 
        id_sua = id;  
        myscroll = $('.cmt-title'); 
        // Đẩy về vị trí bình luận
        document.documentElement.scrollTop = myscroll.offset().top - 50; 
    };

    var btnXoaBinhLuan = $('#btnXoaBinhLuan');
    function clickXoaBinhLuan(id){  
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url: 'binhluan/xoa',
            method: 'get', 
            data: {
                id_xoa: id,
                id_baiviethientai : id_baiviethientai,
            },
            success:function(response){   
                $('#showAllComment').html(response);  
            }
        });  
    };


    btnHuySuaBinhLuan.click(function(){  
        btnHuySuaBinhLuan.hide();
        btnSubBinhLuan.attr('value', 'them');
        textThemBinhLuan.val("");  
    });
    
    // Js trả lời bình luận
    var id_traloi;
    function clickSubTraLoiBinhLuan(id_binhluan){
        var btnSubTraLoiBinhLuan = $('#btnSubTraLoiBinhLuan'+id_binhluan); 
        var texttraloi = $("#texttraloi"+id_binhluan);
        if(texttraloi.val() == ""){ 
            alert("Chưa có nội dung trả lời!");
            return false;
        }
        if(btnSubTraLoiBinhLuan.val() == "them"){  
            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                url: 'traloibinhluan/them',
                method: 'get', 
                data: {
                    id_binhluan: id_binhluan,
                    noidung: texttraloi.val(),
                    id_baiviethientai : id_baiviethientai,
                    id_toggle_hientai : id_toggle_hientai,
                },
                success:function(response){   
                    $('#showAllComment').html(response); 
                    texttraloi.val("");
                }
            });   
               
        } 
        if(btnSubTraLoiBinhLuan.val() == "sua"){   
            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                url: 'traloibinhluan/sua',
                method: 'get', 
                data: {
                    id_sua: id_traloi,
                    noidung: $("#texttraloi"+id_binhluan).val(),
                    id_baiviethientai : id_baiviethientai,
                    id_toggle_hientai : id_toggle_hientai,
                },
                success:function(response){   
                    $('#showAllComment').html(response);  
                }
            });  
            $("#btnHuyTraLoiBinhLuan"+id_binhluan).hide();
            var btnSubTraLoiBinhLuan = $('#btnSubTraLoiBinhLuan'+id_binhluan);    
            btnSubTraLoiBinhLuan.attr('value', 'them');
            $("#btnHuyTraLoiBinhLuan"+id_binhluan).val("");    
        }  
    } 
     
    function clickXoaTraloiBinhLuan(id){  
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url: 'traloibinhluan/xoa',
            method: 'get', 
            data: {
                id_xoa: id,
                id_baiviethientai : id_baiviethientai,
                id_toggle_hientai : id_toggle_hientai,
            },
            success:function(response){   
                $('#showAllComment').html(response);  
            }
        });   
    };

    function clickSuaTraloiBinhLuan(id_tl, id, text){ 
        var btnSubTraLoiBinhLuan = $('#btnSubTraLoiBinhLuan'+id);   
        id_traloi = id_tl; 
        $("#btnHuyTraLoiBinhLuan"+id).show();
        $("#texttraloi"+id).val(text);
        btnSubTraLoiBinhLuan.val("sua");
    }

    function clickHuyTraLoiBinhLuan(id){
        var btnSubTraLoiBinhLuan = $('#btnSubTraLoiBinhLuan'+id); 
        $("#texttraloi"+id).val("");
        btnSubTraLoiBinhLuan.val("them");
        $("#btnHuyTraLoiBinhLuan"+id).hide();
    }
    
</script>
@endsection