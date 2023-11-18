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
    <link href="{{asset('css/admin/perfect-scrollbar.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/monokai-sublime.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/alert.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/snackbar.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/loader.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/tabs.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/pagination.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/companies.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/ecommerce.css')}}" rel="stylesheet" type="text/css">

    <!-- Common css end -->
    <!-- Common icon -->
    <link rel="stylesheet" href="{{asset('library/line-awesome/line-awesome.min.css')}}">
    <!-- Common icon end -->
    @yield('css')
</head>
<body>
<!--  Navbar Starts  -->
@include('admin.layouts.header')
<!--  Navbar Ends  -->
<div class="main-container" id="container">
    <div class="overlay"></div>
    <div class="search-overlay"></div>
    <div class="rightbar-overlay"></div>
    <!--  Top Menu Bar Starts  -->
    @include('admin.layouts.menu')
    <!--  Top Menu Bar Ends  -->
    <div id="content" class="main-content">
        @yield('body')
        <div class="responsive-msg-component">
            <p>
                <a class="close-msg-component"><i class="las la-times"></i></a>
                Vui lòng tải lại trang để chức năng phù hợp với thiết bị
            </p>
        </div>
       @include('admin.layouts.footer')
        <!-- Arrow Starts -->
        <div class="scroll-top-arrow" style="display: none;">
            <i class="las la-angle-up"></i>
        </div>
        <!-- Arrow Ends -->
    </div>
    @include('admin.layouts.right_bar')
</div>

<!-- Common Script Starts -->
<script src="{{asset('library/jquery/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('library/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('library/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/admin/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('js/admin/app.js')}}"></script>
{{--<script src="{{asset('js/admin/loader.js')}}"></script>--}}
<script src="{{asset('js/admin/common.js')}}"></script>
<script src="{{asset('js/admin/snackbar.min.js')}}"></script>
@yield('js')
<script>
    $(document).ready(function () {
        App.init();
    });
</script>
<script src="{{asset('js/admin/custom.js')}}"></script>
<!-- Common Script Ends -->

</body>
</html>
