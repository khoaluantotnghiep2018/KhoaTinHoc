<div class="log-form">
    <div class="form-wrapper">
        <div class="close-form"><i class="fas fa-times-circle"></i></div>
        <form action="" class='form-dangnhap'>

            <div class="log-form__title">Sinh viên đăng nhập</div>
            <label for="">
                <span class='icon'><i class="fas fa-user"></i></span>
                <input type="text" placeholder="Tên đăng nhập hoặc email">
                <span class="error"></span>
            </label>
            <label for="">
                <span class='icon'><i class="fas fa-unlock-alt"></i></span>
                <input type="password" placeholder="Mật khẩu">
                <span class="error"></span>
            </label>
            <label for="">
                <a href="" class='link-register'>Giành cho giảng viên</a>
            </label>
            <label for="">
                <button type='submit' class='btn-login'>Đăng nhập</button>
            </label>
        </form>
        <form action="" class='form-dangky'>
            <div class="log-form__title">Giảng viên đăng nhập</div>
            <label for="">
                <span class='icon'><i class="fas fa-user"></i></span>
                <input type="text" placeholder="Tên đăng nhập hoặc email">
                <span class="error"></span>
            </label>
            <label for="">
                <span class='icon'><i class="fas fa-unlock-alt"></i></span>
                <input type="password" placeholder="Mật khẩu">
                <span class="error"></span>
            </label>
            <label for="">
                <select name="" id="0">
                    <option value="">Mức quyền</option>
                    <option value="">website 1</option>
                    <option value="">website 2</option>
                </select>
                <span class="error"></span>
            </label>
            <label for="">
                <a href="" class='link-login'>Giành cho sinh viên</a>
            </label>
            <label for="">
                <button type='submit' class='btn-register'>Đăng nhập</button>
            </label>
        </form>
    </div>

</div>

<div id="logout-form">
    <!-- Modal content -->
    <div class="logout-form-content">
        <div class="test">
            <span class="closeLogout"><i class="fas fa-times-circle"></i></span>
            <ul>
                <li> <a href="#" class="far fa-user-circle"> Trang cá nhân</a> </li>
                <li> <a href="#" class="fas fa-sign-out-alt"> Đăng xuất</a> </li>
            </ul>
        </div>

    </div>
</div>

<header class="header">
    <div class="header-banner">
        <img src="assets/user/images/bannerDHSP.gif" alt="">
    </div>
    <div class="header-login" hidden><i class="fas fa-user"></i></div>
    <div class="header-logout">
        <i onclick="clickLogout()" class="fas fa-user-tie"></i>
    </div>
</header> <!-- END HEADER -->
<div class="bar-menu"><i class="fas fa-bars"></i></div>
<nav class="nav">
    <div class="close"><i class="fas fa-times-circle"></i></div>
    <ul>
        <li><a href=""><i class="fas fa-home"></i></a></li>
        <li><a href="">Giới thiệu</a></li>
        <li>
            <a href="">Thông báo</a>
            <ul class='submenu'>
                <li><a href="">Tin tức 1</a></li>
                <li><a href="">Tin tức 2</a></li>
                <li><a href="">Tin tức 4</a></li>
                <li><a href="">Tin tức 5</a></li>
            </ul>
        </li>
        <li>
            <a href="">Tin tức</a>
        </li>
        <li>
            <a href="">Tuyển sinh</a>
            <ul class='submenu'>
                <li><a href="">Đại học</a></li>
                <li><a href="">Sau đại học</a></li>
            </ul>
        </li>
        <li><a href="">Chương trình đào tạo</a></li>
        <li>
            <a href="">Danh sách</a>
            <ul class='submenu'>
                <li><a href="">Giảng viên</a></li>
                <li><a href="">Sinh viên</a></li>
            </ul>
        </li>
        <!-- <li><a href=""></a></li> -->
        <li><a href="">Tài liệu tham khảo</a></li>
        <li><a href="">Liên hệ chúng tôi</a></li>
    </ul>
</nav> <!-- END MENU -->

<div class="search">
    <div id="clocktop"></div>
    <div class="form-search">
        <form action="" method='get'>
            <input type="text" placeholder="Tìm kiếm..." name='search'>
            <button><i class="fas fa-search"></i></button>
        </form>
    </div>
</div> <!-- END SEARCH -->