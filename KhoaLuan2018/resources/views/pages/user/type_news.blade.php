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
                <i class="fas fa-bars"></i> <a href="trangchu">Home</a> <span>/</span> <a href="javascript:void(0)">Danh sách bài viết</a>	
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
                <h3 class="information-title"><a href="tintuc/{{$dsbv->id}}">{{$dsbv->tieude}}</a></h3> 
                <div class="information-date">
                    <small><i class="far fa-calendar-plus"></i> {{$dsbv->updated_at}}</small>
                    <small><i class="fas fa-eye"></i> <span>{{$dsbv->luotxem}}</span></small>   
                    @php
                        if($binhluan != null){
                            $dembinhluan = 0;
                            foreach($binhluan as $bl){
                                if($bl->id_tintuc == $dsbv->id){
                                    $dembinhluan++;
                                }
                            }
                        }
                    @endphp
                    <small><i class="fas fa-comments"></i> <span>{{$dembinhluan}} bình luận</span></small> 
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

</div> <!-- END CONTENT -->
@endsection

@section('script')
<script src='assets/user/js/date.js'></script>
@endsection