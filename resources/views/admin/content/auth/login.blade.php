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
<body class="login-one">
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
<div class="container-fluid login-one-container">
    <div class="p-30 h-100">
        <div class="row main-login-one h-100">
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 p-0">
                <div class="login-one-start">
                    <form method="POST" action="{{route('admin.login_authentication')}}">
                        @csrf
                        <h6 class="mt-2 text-primary text-center font-20">Đăng nhập</h6>
                        <p class="text-center text-muted mt-3 mb-3 font-14">Vui lòng đăng nhập tài khoản của bạn</p>
                        @if (Session::get('error'))
                            <div class="text-danger d-block font-15 text-center">{{Session::get('error')}}</div>
                        @endif
                        <div class="login-one-inputs mt-5">
                            <input type="text" placeholder="Email" name="email" value="{{old('email')}}" autofocus autocomplete="on"/>
                            <i class="las la-user-alt"></i>
                            @error('email')
                            <div class="invalid-feedback d-block"> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="login-one-inputs mt-3">
                            <input type="password" placeholder="Mật khẩu" name="password"/>
                            <i class="las la-lock"></i>
                            @error('password')
                            <div class="invalid-feedback d-block"> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="login-one-inputs check mt-4">
                            <input class="inp-cbx d-none" name="remember_me" id="cbx" type="checkbox" {{ old('remember_me') ? 'checked' : '' }}>
                            <label class="cbx" for="cbx">
                                <span>
                                    <svg width="12px" height="10px" viewBox="0 0 12 10">
                                        <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                    </svg>
                                </span>
                                <span class="font-13 text-muted">Lưu mật khẩu?</span>
                            </label>
                        </div>
                        <div class="login-one-inputs mt-4">
                            <button class="ripple-button ripple-button-primary btn-lg btn-login" type="submit">
                                <div class="ripple-ripple js-ripple">
                                    <span class="ripple-ripple__circle"></span>
                                </div>
                                ĐĂNG NHẬP
                            </button>
                        </div>
                        <div class="login-one-inputs mt-4 text-center font-12 strong">
                            <a href="{{route('admin.forget_password')}}" class="text-primary">Quên mật khẩu?</a>
                        </div>
                        <div class="login-one-inputs social-logins mt-4">
                            <div class="social-btn"><a href="javascript:void(0);" class="fb-btn"><i class="lab la-facebook-f"></i></a>
                            </div>
                            <div class="social-btn"><a href="javascript:void(0);" class="twitter-btn"><i class="lab la-twitter"></i></a>
                            </div>
                            <div class="social-btn"><a href="javascript:void(0);" class="google-btn"><i
                                        class="lab la-google-plus"></i></a></div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-xl-8 col-lg-6 col-md-6 d-none d-md-block p-0">
                <div class="slider-half">
                    <div class="slide-content">
                        <div class="top-sign-up ">
                            <div class="about-comp text-white mt-2">IT24H</div>
                            <div class="for-sign-up">
                                <p class="text-white font-12 mt-2 font-weight-300">Bạn chưa có tài khoản?</p>
                                <a href="{{route('admin.register')}}">Đăng Kí</a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="owl-carousel owl-theme">
                            <div class="item">
                                <i class="lar la-grin-alt font-45 text-white"></i>
                                <h2 class="font-30 text-white mt-2">Start your journey</h2>
                                <p class="summary-count text-white font-12 mt-2 slide-text">Everyone has been made
                                    for some particular work, and the desire for that work has been put in every
                                    heart</p>
                            </div>
                            <div class="item">
                                <i class="lar la-clock font-45 text-white"></i>
                                <h2 class="font-30 text-white mt-2">Save your time</h2>
                                <p class="summary-count text-white font-12 mt-2 slide-text">Everyone has been made
                                    for some particular work, and the desire for that work has been put in every
                                    heart</p>
                            </div>
                            <div class="item">
                                <i class="las la-hand-holding-usd font-45 text-white"></i>
                                <h2 class="font-30 text-white mt-2">Save your money</h2>
                                <p class="summary-count text-white font-12 mt-2 slide-text">Everyone has been made
                                    for some particular work, and the desire for that work has been put in every
                                    heart</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main Body Ends -->
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
