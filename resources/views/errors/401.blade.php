<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="/favicon.ico"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&amp;display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('library/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/structure.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{asset('css/admin/loader.css')}}">
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
<div class="layout-px-spacing">
    <div class="layout-top-spacing mb-5 mt-5">
        <div class="col-md-12">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <h1 class="mb-3">Oops!</h1>
                    <p class="font-25 mb-4">Xin lỗi, bạn không có quyền truy cập vào trang web này.</p>
                    <a onclick="history.back()" class="btn bg-gradient-primary text-white">Trở lại</a>
                </div>
                <div class="col-md-5 pr-5 mt-5">
                    <img src="{{asset('media/common/error-401-1.jpg')}}" width="100%">
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/admin/loader.js')}}"></script>
<script src="{{asset('library/jquery/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('library/bootstrap/js/bootstrap.min.js')}}"></script>
</body>
</html>
