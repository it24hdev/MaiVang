<!DOCTYPE html>
<html>
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
<body class="sigup-one" onload="Captcha();">
<!-- Loader Starts -->
<div id="load_screen">
    <div class="boxes">
        <div class="box">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="box">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="box">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="box">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <p class="xato-loader-heading">Xato</p>
</div>
<div class="container-fluid login-one-container">
    <div class="p-30 h-100">
        <div class="row main-login-one h-100">
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 p-0">
                <div class="login-one-start">
                    <form action="{{route('admin.register_authentication')}}" method="POST">
                        @csrf
                        <h6 class="mt-2 text-primary text-center font-20">Đăng Ký</h6>
                        <p class="text-center text-muted mt-3 mb-3 font-14">Điền thông tin và tạo tài khoản</p>
                        <div class="login-one-inputs mt-5">
                            <input type="text" placeholder="Tên" id="name" name="name" {{old('name')}} autofocus/>
                            <i class="las la-user"></i>
                            @error('name')
                            <div class="invalid-feedback d-block"> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="login-one-inputs mt-3">
                            <input type="email" placeholder="Email" id="email_address" name="email" {{old('email')}} autofocus/>
                            <i class="las la-envelope"></i>
                            @error('email')
                            <div class="invalid-feedback d-block"> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="login-one-inputs mt-3">
                            <input type="password" placeholder="Mật khẩu" id="password" name="password" />
                            <i class="las la-lock"></i>
                            @error('password')
                            <div class="invalid-feedback d-block"> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="capt mt-3">
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="captcha">
                                    <h2 type="text" id="mainCaptcha"></h2>
                                </div>
                                <a class="text-primary font-25 ml-3 pointer" title="Change Captcha">
                                    <i class="las la-sync-alt" id="refresh" onclick="Captcha();"></i>
                                </a>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mt-3">
                                <div class="login-one-inputs mr-3">
                                    <input type="text" id="txtInputCaptcha" placeholder="Nhập Captcha"/>
                                    <i class="las la-robot"></i>
                                </div>
                                <input class="btn btn-sm btn-primary text-nowrap" id="Button1" type="button"
                                       value="Kiểm tra" onclick="ValidCaptcha();"/>

                                <i class="lar la-check-circle captcha-check text-success-teal font-25 "
                                   id="checkMark"></i>
                            </div>
                        </div>
                        <div class="login-one-inputs mt-5 check">
                            <input class="inp-cbx d-none" id="cbx" type="checkbox" name=termspolicies"/>
                            <label class="cbx d-flex" for="cbx"><span>
                                <svg width="12px" height="10px" viewbox="0 0 12 10">
                                  <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                </svg></span><span class="font-13">Tôi đồng ý với <a class="text-primary" href="" target="_blank"> Điều Khoản và Chính Sách</a></span></label>
                        </div>
                        <div class="login-one-inputs mt-4">
                            <input type="button" class="btn btn-primary ripple-button ripple-button-primary btn-lg btn-login" value="TẠO TÀI KHOẢN">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-xl-8 col-lg-6 col-md-6 d-none d-md-block p-0">
                <div class="slider-half">
                    <div class="slide-content">
                        <div class="top-sign-up ">
                            <div class="about-comp text-white mt-2">IT24h</div>
                            <div class="for-sign-up">
                                <p class="text-white font-12 mt-2 font-weight-300">Bạn đã có tài khoản?</p>
                                <a href="{{route('admin.login')}}">Đăng nhập</a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="owl-carousel owl-theme">
                            <div class="item">
                                <i class="lar la-grin-alt font-45 text-white"></i>
                                <h2 class="font-30 text-white mt-2">Start your journey</h2>
                                <p class="summary-count text-white font-12 mt-2 slide-text">Everyone has been
                                    made for some particular work, and the desire for that work has been put in
                                    every heart</p>
                            </div>
                            <div class="item">
                                <i class="lar la-clock font-45 text-white"></i>
                                <h2 class="font-30 text-white mt-2">Save your time</h2>
                                <p class="summary-count text-white font-12 mt-2 slide-text">Everyone has been
                                    made for some particular work, and the desire for that work has been put in
                                    every heart</p>
                            </div>
                            <div class="item">
                                <i class="las la-hand-holding-usd font-45 text-white"></i>
                                <h2 class="font-30 text-white mt-2">Save your money</h2>
                                <p class="summary-count text-white font-12 mt-2 slide-text">Everyone has been
                                    made for some particular work, and the desire for that work has been put in
                                    every heart</p>
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
