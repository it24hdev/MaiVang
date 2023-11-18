<!DOCTYPE html>
<html class="no-js" lang="vi">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('favicon.ico')}}"/>
    @yield('title')
    @yield('css')
</head>
<body>
@yield('body')
@yield('js')
</body>
</html>
