<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>
    <link href="{{asset('css/admin/loader.css')}}" rel="stylesheet" type="text/css">
    <!-- Common css -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&amp;display=swap"
          rel="stylesheet">
    <link href="{{asset('library/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/main.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/structure.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/perfect-scrollbar.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/monokai-sublime.css')}}" rel="stylesheet" type="text/css">
    <!-- Common css end -->
    <!-- Common icon -->
    <link rel="stylesheet" href="{{asset('library/line-awesome/line-awesome.min.css')}}">
    <!-- Common icon end -->
    <!-- Page Level Plugin/Style Starts -->
    <link href="{{asset('css/admin/auth_2.css')}}" rel="stylesheet" type="text/css">
    <!-- Page Level Plugin/Style Ends -->
</head>
<body class="login-two">
<!-- Loader Starts -->
<div id="load_screen">
    <div class="boxes">
        <div class="box">
            <div></div><div></div><div></div><div></div>
        </div>
        <div class="box">
            <div></div><div></div><div></div><div></div>
        </div>
        <div class="box">
            <div></div><div></div><div></div><div></div>
        </div>
        <div class="box">
            <div></div><div></div><div></div><div></div>
        </div>
    </div>
    <p class="xato-loader-heading">IT24H</p>
</div>
<!--  Loader Ends -->
<!-- Main Body Starts -->
<div class="container-fluid login-two-container">
    <div class="row main-login-two">
        <div class="col-md-12 p-0 ">
            <div class="login-bg">
                <div class="center-two-start">
                    <h6 class="right-bar-heading px-3 mt-2 text-dark text-center font-30 text-uppercase">Quên Mật Khẩu?</h6>
                    <div class="form-1">
                        <p class="text-center text-muted mt-3 mb-3 font-14">Nhập Email của bạn bên dưới</p>
                        <div class="login-two-inputs mt-5">
                            <input type="text" placeholder="Email Address"/>
                            <i class="las la-envelope"></i>
                        </div>
                        <div class="login-two-inputs mt-5 text-center d-flex">
                            <button class="ripple-button ripple-button-primary w-100 btn-login ml-3 mr-3" type="button" id="getCodeButton">
                                <div class="ripple-ripple js-ripple">
                                    <span class="ripple-ripple__circle"></span>
                                </div>
                                Nhận mã xác thực
                            </button>
                        </div>
                    </div>
                    <div class="form-2">
                        <p class="text-center text-muted mt-3 mb-3 font-14">Mã xác thực đã được gửi</p>
                        <form method="get" class="digit-group mt-5" data-group-name="digits" data-autosubmit="false" autocomplete="off">
                            <input type="text" id="digit-1" name="digit-1" data-next="digit-2" />
                            <input type="text" id="digit-2" name="digit-2" data-next="digit-3" data-previous="digit-1" />
                            <input type="text" id="digit-3" name="digit-3" data-next="digit-4" data-previous="digit-2" />
                            <span class="splitter">&ndash;</span>
                            <input type="text" id="digit-4" name="digit-4" data-next="digit-5" data-previous="digit-3" />
                            <input type="text" id="digit-5" name="digit-5" data-next="digit-6" data-previous="digit-4" />
                            <input type="text" id="digit-6" name="digit-6" data-previous="digit-5" />
                        </form>
                        <div class="login-two-inputs mt-4">
                            <input type="password" placeholder="Mật khẩu mới" required/>
                            <i class="las la-lock"></i>
                        </div>
                        <div class="login-two-inputs mt-3">
                            <input type="password" placeholder="Xác nhận mật khẩu" required/>
                            <i class="las la-lock"></i>
                        </div>
                        <div class="login-two-inputs text-center mt-4">
                            <button class="ripple-button ripple-button-primary btn-lg btn-login" type="button">
                                <div class="ripple-ripple js-ripple">
                                    <span class="ripple-ripple__circle"></span>
                                </div>
                                Đổi Mật Khẩu
                            </button>
                        </div>
                        <div class="login-two-inputs mt-3 text-center font-12 strong">
                            <a href="javascript:void(0)" class="text-primary" id="changeEmailAddress">Thay đổi Email của bạn</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main Body Ends -->
<!-- Page Level Plugin/Script Starts -->
<script src="{{asset('js/admin/loader.js')}}"></script>
<script src="{{asset('library/jquery/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('library/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/admin/auth_2.js')}}"></script>
<!-- Page Level Plugin/Script Ends -->
</body>
</html>
