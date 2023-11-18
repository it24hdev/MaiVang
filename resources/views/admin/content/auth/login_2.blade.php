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
    <link href="{{asset('css/admin/auth_2.css')}}" rel="stylesheet" type="text/css">
    <!-- Page Level Plugin/Style Ends -->
</head>
<body class="login-two">
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
    <p class="xato-loader-heading">IT24H</p>
</div>
<!--  Loader Ends -->
<!-- Main Body Starts -->
<div class="container-fluid login-two-container">
    <div class="row main-login-two">
        <div class="col-xl-8 col-lg-7 col-md-7 d-none d-md-block p-0">
            <div class="login-bg">
                <div class="left-content-area">
                    <img src="{{asset('media/common/logo_white_transparent.png')}}" class="logo">
                    <div>
                        <h2>A few clicks away from creating your account</h2>
                        <p>Start your journey in minutes. Save your time and money.</p>
                        <a class="btn mt-4" href="javascript:void(0)" type="button">Tìm hiểu thêm</a>
                    </div>
                    <div class="d-flex align-items-center mt-4">
                        <a class="font-13 text-white mr-3">Find us: </a>
                        <a class="font-13 text-white mr-3" href="javascript:void(0)">Facebook</a>
                        <a class="font-13 text-white mr-3" href="javascript:void(0)">Twitter</a>
                        <a class="font-13 text-white mr-3" href="javascript:void(0)">Linked In</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-5 col-md-5 p-0">
            <div class="login-two-start">
                <h6 class="right-bar-heading px-3 mt-2 text-dark text-center font-30 text-uppercase">Đăng Nhập</h6>
                <p class="text-center text-muted mt-1 mb-3 font-14">Mời bạn đăng nhập tài khoản</p>
                <form method="post" action="{{route('admin.login_authentication')}}">
                    @csrf
                    <div class="login-two-inputs mt-5">
                        <input type="text" placeholder="Email" name="email">
                        <i class="las la-user-alt"></i>
                    </div>
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                    <div class="login-two-inputs mt-4">
                        <input type="password" placeholder="Mật khẩu" name="password">
                        <i class="las la-lock"></i>
                    </div>
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                    <div class="login-two-inputs  mt-4 check">
                        <div class="box">
                            <input id="one" type="checkbox">
                            <span class="check"></span>
                            <label for="one">Ghi nhớ</label>
                        </div>
                    </div>
                    <div class="login-two-inputs mt-5 text-center d-flex">
                        <button class="ripple-button ripple-button-primary w-100 btn-login ml-3 mr-3" type="submit">
                            <div class="ripple-ripple js-ripple">
                                <span class="ripple-ripple__circle"></span>
                            </div>
                            Đăng Nhập
                        </button>
                        <a class="btn btn-sm btn-outline-primary btn-login w-100 ml-3 mr-3"
                           href="{{route('admin.register')}}"
                           type="button">
                            Đăng Ký
                        </a>
                    </div>
                </form>
                <div class="mt-4 text-center font-12 strong">
                    <a href="{{route('admin.forget_password')}}" class="text-primary">Quên Mật Khẩu?</a>
                </div>
                <div class="login-two-inputs mt-4">
                    <div class="find-us-container">
                        <p class="find-us text-center">Tiếp tục với</p>
                    </div>
                </div>
                <div class="login-two-inputs social-logins mt-4">
                    <div class="social-btn"><a href="javascript:void(0)" class="fb-btn"><i
                                class="lab la-facebook-f"></i></a></div>
                    <div class="social-btn"><a href="javascript:void(0)" class="twitter-btn"><i
                                class="lab la-twitter"></i>
                        </a></div>
                    <div class="social-btn"><a href="javascript:void(0)" class="google-btn"><i
                                class="lab la-google-plus"></i>
                        </a></div>
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
<script src="{{asset('js/admin/auth_2.js')}}"></script>
<!-- Common Script Ends -->
</body>
</html>
