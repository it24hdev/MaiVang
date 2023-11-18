<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="/favicon.ico"/>
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
       <link href="{{asset('library/owl-carousel/owl.carousel.min.css')}}" rel="stylesheet">
       <link href="{{asset('library/owl-carousel/owl.theme.default.min.css')}}" rel="stylesheet">
       <link href="{{asset('css/admin/auth.css')}}" rel="stylesheet" type="text/css">
       <!-- Page Level Plugin/Style Ends -->
</head>
<body class="forget-one">
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
<div class="container-fluid login-one-container">
    <div class="p-30 h-100" >
        <div class="row main-login-one h-100">
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 p-0">
                <div class="login-one-start">
                    <h6 class="mt-2 text-primary text-center font-20">Quên Mật Khẩu?</h6>
                    <div class="form-1">
                        <p class="text-center text-muted mt-3 mb-3 font-14">Nhập địa chỉ Email của bạn bên dưới</p>
                        <div class="login-one-inputs mt-5">
                            <input type="text" placeholder="Email Address"/>
                            <i class="las la-envelope"></i>
                        </div>
                        <div class="login-one-inputs mt-4">
                            <button class="ripple-button ripple-button-primary btn-lg btn-login" type="button" id="getCodeButton">
                                <div class="ripple-ripple js-ripple">
                                    <span class="ripple-ripple__circle"></span>
                                </div>
                                Nhận Mã Xác Nhận
                            </button>
                        </div>
                    </div>
                    <div class="form-2">
                        <p class="text-center text-muted mt-3 mb-3 font-14">Mã xác nhận đã được gửi</p>
                        <form method="get" class="digit-group mt-5" data-group-name="digits" data-autosubmit="false" autocomplete="off">
                            <input type="text" id="digit-1" name="digit-1" data-next="digit-2" />
                            <input type="text" id="digit-2" name="digit-2" data-next="digit-3" data-previous="digit-1" />
                            <input type="text" id="digit-3" name="digit-3" data-next="digit-4" data-previous="digit-2" />
                            <span class="splitter">&ndash;</span>
                            <input type="text" id="digit-4" name="digit-4" data-next="digit-5" data-previous="digit-3" />
                            <input type="text" id="digit-5" name="digit-5" data-next="digit-6" data-previous="digit-4" />
                            <input type="text" id="digit-6" name="digit-6" data-previous="digit-5" />
                        </form>
                        <div class="login-one-inputs mt-4">
                            <input type="password" placeholder="Mật khẩu mới" required/>
                            <i class="las la-lock"></i>
                        </div>
                        <div class="login-one-inputs mt-3">
                            <input type="password" placeholder="Xác nhận mật khẩu" required/>
                            <i class="las la-lock"></i>
                        </div>
                        <div class="login-one-inputs mt-4">
                            <button class="ripple-button ripple-button-primary btn-lg btn-login" type="button">
                                <div class="ripple-ripple js-ripple">
                                    <span class="ripple-ripple__circle"></span>
                                </div>
                                Đổi Mật Khẩu
                            </button>
                        </div>
                        <div class="login-one-inputs mt-3 text-center font-12 strong">
                            <a href="javascript:void(0);" class="text-primary" id="changeEmailAddress">Thay đổi địa chỉ email của bạn</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-6 col-md-6 d-none d-md-block p-0">
                <div class="slider-half">
                    <div class="slide-content">
                        <div class="top-sign-up ">
                            <div class="about-comp text-white mt-2">IT24H</div>
                            <div class="for-sign-up">
                                <p class="text-white font-12 mt-2 font-weight-300">Bạn chưa có tài khoản?</p>
                                <a href="{{route('admin.register')}}">Đăng ký</a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="owl-carousel owl-theme">
                            <div class="item">
                                <i class="lar la-grin-alt font-45 text-white"></i>
                                <h2 class="font-30 text-white mt-2">Start your journey</h2>
                                <p class="summary-count text-white font-12 mt-2 slide-text" >Everyone has been made for some particular work, and the desire for that work has been put in every heart</p>
                            </div>
                            <div class="item">
                                <i class="lar la-clock font-45 text-white"></i>
                                <h2 class="font-30 text-white mt-2">Save your time</h2>
                                <p class="summary-count text-white font-12 mt-2 slide-text" >Everyone has been made for some particular work, and the desire for that work has been put in every heart</p>
                            </div>
                            <div class="item">
                                <i class="las la-hand-holding-usd font-45 text-white"></i>
                                <h2 class="font-30 text-white mt-2">Save your money</h2>
                                <p class="summary-count text-white font-12 mt-2 slide-text" >Everyone has been made for some particular work, and the desire for that work has been put in every heart</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Common Script Starts -->
<script src="{{asset('js/admin/loader.js')}}"></script>
<script src="{{asset('library/jquery/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('library/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('library/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('library/owl-carousel/owl.carousel.js')}}"></script>
<script src="{{asset('js/admin/auth.js')}}"></script>
<!-- Common Script Ends -->
</body>
</html>
