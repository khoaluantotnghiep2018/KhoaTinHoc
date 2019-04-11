@extends('layout/user/index')

@section('title')
Loại tin tức
@endsection

@section('css')
<link rel="stylesheet" href="assets/user/css/categories.css">
<link rel="stylesheet" href="assets/user/css/pagination.css">
@endsection

@section('content')
<div class="content"> 
    <!-- Danh Sách Chuyên Mục Loại tin -->
    <div class="list-categories">
        <div class="list-categories__title">
            <div>
                <i class="fas fa-bars"></i> <a href="">Home</a> <span>/</span> <a href="">Tin chuyên mục</a>	
            </div>
            

            <form action="">
                <input type="date" class='date'>
            </form> <!-- SEARCH tin THEO Ngày -->
        </div>
 
        
        @if($dsbaiviet != null)
            @foreach($dsbaiviet as $dsbv)
        <div class="list-categories__box">
            <a href="tintuc/{{$dsbv->id}}"><img src="assets/user/images/hinhtintuc/{{$dsbv->hinhdaidien}}" alt=""></a>
            <div class="information"> 
                <h3 class="information-title"><a href="">{{$dsbv->tieude}}</a></h3> 
                <div class="information-date">
                    <small><i class="far fa-calendar-plus"></i> {{$dsbv->updated_at}}</small>
                    <small><i class="fas fa-eye"></i> <span>{{$dsbv->luotxem}}</span></small>   
                    <small><i class="fas fa-comments"></i> <span>{{$dsbv->binhluan}}</span></small> 
                </div>
                <div class="information-text">{{$dsbv->mota}}</div>
                <div class="list-categories__btn"> 
                </div>	
            </div>	
        </div> <!-- Tin theo chuyên mục-->
            @endforeach
        @endif 
        <div class="paginationbackground">  
        @if ($dsbaiviet->lastPage() > 1)
        <ul class="pagination">
            <li class="{{ ($dsbaiviet->currentPage() == 1) ? ' disabled' : '' }}">
                <a href="{{ $dsbaiviet->url(1) }}"><<</a>
            </li>

            <?php
                // config
                $link_limit = 10; // maximum number of links (a little bit inaccurate, but will be ok for now)
            ?>

            @for ($i = 1; $i <= $dsbaiviet->lastPage(); $i++)
                <?php
                    $half_total_links = floor($link_limit / 2);
                    $from = $dsbaiviet->currentPage() - $half_total_links;
                    $to = $dsbaiviet->currentPage() + $half_total_links;
                    if ($dsbaiviet->currentPage() < $half_total_links) {
                        $to += $half_total_links - $dsbaiviet->currentPage();
                    }
                    if ($dsbaiviet->lastPage() - $dsbaiviet->currentPage() < $half_total_links) {
                        $from -= $half_total_links - ($dsbaiviet->lastPage() - $dsbaiviet->currentPage()) - 1;
                    }
                ?>
                @if ($from < $i && $i < $to)
                    <li class="{{ ($dsbaiviet->currentPage() == $i) ? ' active' : '' }}">
                        <a href="{{ $dsbaiviet->url($i) }}">{{ $i }}</a>
                    </li>
                @endif
            @endfor 
            <li class="{{ ($dsbaiviet->currentPage() == $dsbaiviet->lastPage()) ? ' disabled' : '' }}">
                <a href="{{ $dsbaiviet->url($dsbaiviet->lastPage()) }}" >>></a>
            </li>
        </ul>
        @endif
        </div>
        
    </div>
    
    <div class="contact">
        <div class="contact-title">
            <i class="fas fa-envelope-square"></i> <span>Hổ trợ sinh viên</span>
            <div class="contact-title__close"><i class="fas fa-times-circle"></i></div>
        </div>
        <div class="contact-content">
            <form action="">
                <label for="">
                    <span><i class="fas fa-user"></i></span>
                    <input type="text" placeholder="Họ tên">
                </label>
                <label for="">
                    <span><i class="fas fa-envelope"></i></span>
                    <input type="text" placeholder="Email">
                </label>
                <label for="">
                    <span><i class="fas fa-phone-volume"></i></span>
                    <input type="text" placeholder="Điện thoại">
                </label>
                <label for="">
                    <textarea name="" id="" placeholder="Bạn cần khoa hổ trợ điều gì?" rows="1" cols="28"></textarea>
                </label>
                <button>Gửi</button>
            </form>
        </div>
    </div> <!-- END CONTACT (LH) -->

</div> <!-- END CONTENT -->
@endsection

@section('script')
<script src='assets/user/js/date.js'></script>
@endsection