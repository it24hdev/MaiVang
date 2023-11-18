<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{asset('favicon.ico')}}"/>
    <!-- Common css -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="{{asset('library/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/main.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/structure.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/alert.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/loader.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/ecommerce.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/pagination.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/companies.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/snackbar.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Common css end -->
    <!-- Common icon -->
    <link rel="stylesheet" href="{{asset('library/line-awesome/line-awesome.min.css')}}">
    <!-- Common icon end -->
    @yield('css')
</head>
<body>
<div class="main-content">
    @yield('body')
</div>
</div>

<!-- Common Script Starts -->
<script src="{{asset('library/jquery/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('library/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('library/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/admin/snackbar.min.js')}}"></script>
{{--<script src="{{asset('js/admin/loader.js')}}"></script>--}}
<script src="{{asset('js/admin/common.js')}}"></script>
@yield('js')
<script src="{{asset('js/admin/custom.js')}}"></script>
<!-- Common Script Ends -->
</body>
</html>
