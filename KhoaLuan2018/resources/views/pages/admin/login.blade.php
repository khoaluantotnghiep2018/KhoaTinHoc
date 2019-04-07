<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="{{asset('')}}">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="assets/admin/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login - Admin page</title>
    <style>
        #loiPhanQuyenAd{
            display: none;
        }
        #loiLoginAd{
            display: none;
        }
    </style>
</head>

<body>
    <section class="material-half-bg">
        <div class="cover"></div>
    </section>
    <section class="login-content">
        <div class="logo">
            <h1>Admin Login</h1>
        </div>
        <div class="alert alert-dismissible alert-danger" id="loiPhanQuyenAd">
            <button class="close" type="button" data-dismiss="alert">×</button><strong>Lỗi!</strong><a
                class="alert-link" href="javascript:void(0)"> Tài khoản không thuộc quản trị viên</a>
        </div>
        <div class="alert alert-dismissible alert-danger" id="loiLoginAd">
            <button class="close" type="button" data-dismiss="alert">×</button><strong>Sai tên đăng nhập hoặc mật khẩu!</strong><a
                class="alert-link" href="javascript:void(0)"> Vui lòng kiểm tra lại</a>
        </div>
        <div class="login-box">
            <form class="login-form" method="post" id="postFormLoginAd">
                @csrf
                <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Đăng nhập</h3>
                <div class="form-group">
                    <label class="control-label">Tài khoản</label>
                    <input name="name" class="form-control" type="text" placeholder="Nhập vào tài khoản quản trị"
                        autofocus>
                </div>
                <div class="form-group">
                    <label class="control-label">Mật khẩu</label>
                    <input name="password" class="form-control" type="password" placeholder="Nhập vào mật khẩu">
                </div>
                <div class="form-group">
                    <div class="utility">
                        <div class="animated-checkbox">
                            <label>
                                <input type="checkbox" name="remember"><span class="label-text">Ghi nhớ</span>
                            </label>
                        </div>
                        <p class="semibold-text mb-2"><a href="#" data-toggle="flip"> Quên mật khẩu?</a></p>
                    </div>
                </div>
                <div class="form-group btn-container">
                    <button class="btn btn-primary btn-block" type="submit"><i
                            class="fa fa-sign-in fa-lg fa-fw"></i>ĐĂNG NHẬP</button>
                </div>
            </form>
            <form class="forget-form" action="index.html">
                <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>XÁC NHẬN EMAIL</h3>
                <div class="form-group">
                    <label class="control-label">EMAIL</label>
                    <input class="form-control" type="text" placeholder="Nhập vào email">
                </div>
                <div class="form-group btn-container">
                    <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>XÁC NHẬN</button>
                </div>
                <div class="form-group mt-3">
                    <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i>
                            Quay lại</a></p>
                </div>
            </form>
        </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="assets/admin/js/jquery-3.2.1.min.js"></script>
    <script src="assets/admin/js/popper.min.js"></script>
    <script src="assets/admin/js/bootstrap.min.js"></script>
    <script src="assets/admin/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="assets/admin/js/plugins/pace.min.js"></script>
    <script type="text/javascript">
        // Login Page Flipbox control
        $('.login-content [data-toggle="flip"]').click(function () {
            $('.login-box').toggleClass('flipped');
            return false;
        });


        var postFormLoginAd = $("#postFormLoginAd");
        postFormLoginAd.submit(function (e) {
            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                url: 'login/quantri',
                method: 'post',
                data: $('#postFormLoginAd').serialize(),
                success: function (response) {
                    if (response == "ok") {
                        location.href = 'quantri';
                        return false;
                    }
                    if (response == "loiphanquyen") {
                        $("#loiLoginAd").css("display", "none");
                        $("#loiPhanQuyenAd").css("display", "block");
                        postFormLoginSv.trigger("reset");
                        return false;
                    }
                    if (response == "loidangnhap") {
                        $("#loiPhanQuyenAd").css("display", "none");
                        $("#loiLoginAd").css("display", "block");
                        return false;
                    }
                }
            });
            return false;
        });

    </script>
</body>

</html>