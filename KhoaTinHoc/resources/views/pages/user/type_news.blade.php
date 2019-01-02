@extends('layout/user/index')

@section('title')
Loại tin tức
@endsection

@section('css')
<link rel="stylesheet" href="assets/user/css/categories.css">
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
        

        <div class="list-categories__box">
            <a href=""><img src="http://tgu.edu.vn/images/news/5bd65f1a95455.jpg" alt=""></a>
            <div class="information"> 
                <h3 class="information-title"><a href="">Thông báo tuyển sinh ĐH .....Thông báo tuyển sinh ĐH .......</a></h3> 
                <div class="information-date">
                    <small><i class="far fa-calendar-plus"></i> 22-10-2018</small>
                    <small><i class="fas fa-eye"></i> <span>05</span></small>   
                    <small><i class="fas fa-comments"></i> <span>05</span></small> 
                    <iframe src="https://www.facebook.com/plugins/share_button.php?href=<?php echo url()->current();?>&layout=button_count&size=small&mobile_iframe=true&width=78&height=20&appId" width="78" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                </div>
                <div class="information-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero explicabo placeat facilis temporibus soluta dolor possimus ipsum a quibusdam iste rerum ipsa reiciendis, esse sapiente similique, illo corrupti ea corporis!</div>
                <div class="list-categories__btn"> 
                </div>	
            </div>	
        </div> <!-- Tin theo chuyên mục-->

        <div class="list-categories__box">
            <a href=""><img src="https://znews-photo.zadn.vn/w860/Uploaded/qhj_yvobvhfwbv/2018_07_18/Nguyen_Huy_Binh1.jpg" alt=""></a>
            <div class="information"> 
                <h3 class="information-title"><a href="">Thông báo tuyển sinh ĐH .....Thông báo tuyển sinh ĐH .......</a></h3> 
                <div class="information-date">
                    <small><i class="far fa-calendar-plus"></i> 22-10-2018</small>
                    <small><i class="fas fa-eye"></i> <span>05</span></small>   
                    <small><i class="fas fa-comments"></i> <span>05</span></small> 
                    <iframe src="https://www.facebook.com/plugins/share_button.php?href=<?php echo url()->current();?>&layout=button_count&size=small&mobile_iframe=true&width=78&height=20&appId" width="78" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                </div>
                <div class="information-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero explicabo placeat facilis temporibus soluta dolor possimus ipsum a quibusdam iste rerum ipsa reiciendis, esse sapiente similique, illo corrupti ea corporis!</div>
                <div class="list-categories__btn"> 
                </div>	
            </div>	
        </div> <!-- Tin theo chuyên mục-->

        <div class="list-categories__box">
            <a href=""><img src="http://tgu.edu.vn/images/news/5bd65f1a95455.jpg" alt=""></a>
            <div class="information"> 
                <h3 class="information-title"><a href="">Thông báo tuyển sinh ĐH .....Thông báo tuyển sinh ĐH .......</a></h3> 
                <div class="information-date">
                    <small><i class="far fa-calendar-plus"></i> 22-10-2018</small>
                    <small><i class="fas fa-eye"></i> <span>05</span></small>   
                    <small><i class="fas fa-comments"></i> <span>05</span></small> 
                    <iframe src="https://www.facebook.com/plugins/share_button.php?href=<?php echo url()->current();?>&layout=button_count&size=small&mobile_iframe=true&width=78&height=20&appId" width="78" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                </div>
                <div class="information-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero explicabo placeat facilis temporibus soluta dolor possimus ipsum a quibusdam iste rerum ipsa reiciendis, esse sapiente similique, illo corrupti ea corporis!</div>
                <div class="list-categories__btn"> 
                </div>	
            </div>	
        </div> <!-- Tin theo chuyên mục-->

        <div class="list-categories__box">
            <a href=""><img src="https://znews-photo.zadn.vn/w860/Uploaded/qhj_yvobvhfwbv/2018_07_18/Nguyen_Huy_Binh1.jpg" alt=""></a>
            <div class="information"> 
                <h3 class="information-title"><a href="">Thông báo tuyển sinh ĐH .....Thông báo tuyển sinh ĐH .......</a></h3> 
                <div class="information-date">
                    <small><i class="far fa-calendar-plus"></i> 22-10-2018</small>
                    <small><i class="fas fa-eye"></i> <span>05</span></small>   
                    <small><i class="fas fa-comments"></i> <span>05</span></small> 
                    <iframe src="https://www.facebook.com/plugins/share_button.php?href=<?php echo url()->current();?>&layout=button_count&size=small&mobile_iframe=true&width=78&height=20&appId" width="78" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                </div>
                <div class="information-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero explicabo placeat facilis temporibus soluta dolor possimus ipsum a quibusdam iste rerum ipsa reiciendis, esse sapiente similique, illo corrupti ea corporis!</div>
                <div class="list-categories__btn"> 
                </div>	
            </div>	
        </div> <!-- Tin theo chuyên mục-->

        <div class="list-categories__box">
            <a href=""><img src="http://tgu.edu.vn/images/news/5bd65f1a95455.jpg" alt=""></a>
            <div class="information"> 
                <h3 class="information-title"><a href="">Thông báo tuyển sinh ĐH .....Thông báo tuyển sinh ĐH .......</a></h3> 
                <div class="information-date">
                    <small><i class="far fa-calendar-plus"></i> 22-10-2018</small>
                    <small><i class="fas fa-eye"></i> <span>05</span></small>   
                    <small><i class="fas fa-comments"></i> <span>05</span></small> 
                    <iframe src="https://www.facebook.com/plugins/share_button.php?href=<?php echo url()->current();?>&layout=button_count&size=small&mobile_iframe=true&width=78&height=20&appId" width="78" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                </div>
                <div class="information-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero explicabo placeat facilis temporibus soluta dolor possimus ipsum a quibusdam iste rerum ipsa reiciendis, esse sapiente similique, illo corrupti ea corporis!</div>
                <div class="list-categories__btn"> 
                </div>	
            </div>	
        </div> <!-- Tin theo chuyên mục-->

        <div class="list-categories__box">
            <a href=""><img src="https://znews-photo.zadn.vn/w860/Uploaded/qhj_yvobvhfwbv/2018_07_18/Nguyen_Huy_Binh1.jpg" alt=""></a>
            <div class="information"> 
                <h3 class="information-title"><a href="">Thông báo tuyển sinh ĐH .....Thông báo tuyển sinh ĐH .......</a></h3> 
                <div class="information-date">
                    <small><i class="far fa-calendar-plus"></i> 22-10-2018</small>
                    <small><i class="fas fa-eye"></i> <span>05</span></small>   
                    <small><i class="fas fa-comments"></i> <span>05</span></small> 
                    <iframe src="https://www.facebook.com/plugins/share_button.php?href=<?php echo url()->current();?>&layout=button_count&size=small&mobile_iframe=true&width=78&height=20&appId" width="78" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                </div>
                <div class="information-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero explicabo placeat facilis temporibus soluta dolor possimus ipsum a quibusdam iste rerum ipsa reiciendis, esse sapiente similique, illo corrupti ea corporis!</div>
                <div class="list-categories__btn"> 
                </div>	
            </div>	
        </div> <!-- Tin theo chuyên mục--> 
        
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
