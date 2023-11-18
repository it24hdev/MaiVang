<!DOCTYPE html>
<html class="no-js" lang="vi">
<head>
    <!-- META -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content=""/>
    <meta name="author" content=""/>
    <meta name="robots" content=""/>
    <meta name="description" content=""/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Anh Thợ IT</title>
    <!-- FAVICONS ICON -->
    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('favicon.ico')}}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- BOOTSTRAP STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/web/bootstrap.min.css')}}">
    <!-- Bootstrap toggle -->
    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/web/font.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/web/feather.css')}}"/>
    <!-- Fontawesome -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/web/font-awesome.min.css')}}"/>
    <!-- Owl Carousel -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/web/owl.carousel.min.css')}}">
    <!-- Slick Carousel -->
    <!-- Main STyle Sheet -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/web/style.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('css/web/custommodal.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('css/web/home_mobile.css')}}">
</head>

<body>

<header class="site-header header-style-2 mobile-sider-drawer-menu header-full-width">
    <div class="sticky-wrapper" style="height: 50px;">
        <div class="sticky-header main-bar-wraper navbar-expand-lg is-fixed">
            <div class="main-bar">
                <div class="container clearfix">
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{route('home')}}"><img src="{{asset('favicon.ico')}}" alt="logo" width="34px" height="34px" ></a>
                        <!-- Header Right Section-->
                        <div class="d-flex justify-content-end align-items-center">
                            <div class="d-flex align-items-center position-relative">
                                <a id="btn-open-search"><i class="fa fa-search btn-search" aria-hidden="true"></i></a>
                            </div>

                            <div class="box-search-mobile">
                                <form class="search-wrapper" action="{{route('list_product')}}" method="get"
                                      enctype="multipart/form-data">
                                    <a href="javascript:void(0);" class="btn-back-search"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                                    <input id="search" type="search" aria-label="search" name="search" class="input-wrapper-search"
                                           placeholder="Tìm kiếm..." autocomplete="off">
                                    <button type="submit" class="btn-submit-search"><i class="fa fa-search"
                                                                                       aria-hidden="true"></i></button>
                                </form>
                                <div class="ajax-search-result py-1 position-absolute w-100" id="result-search"></div>
                                <div class="search-info">
                                    <div class="search-info-wrapper">
                                        <a href="javascript:void(0);" class="recent-search">Gợi ý</a>
                                        <a href="javascript:void(0);" class="view-all">Xem tất cả</a>
                                    </div>
                                </div>
                                <div class="search-result">
                                    <div class="result-item flex-wrap" id="load-suggest">
                                    </div>
                                </div>
                            </div>

                            <button id="mobile-side-drawer" data-target=".header-nav" data-toggle="collapse"
                                    type="button"
                                    class="navbar-toggler collapsed mt-0" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar icon-bar-first"></span>
                                <span class="icon-bar icon-bar-two"></span>
                                <span class="icon-bar icon-bar-three"></span>
                            </button>

                            <!-- MAIN Vav -->
                            <div class="nav-animation header-nav navbar-collapse d-flex justify-content-start collapse">
                                <ul class=" nav navbar-nav">
                                    @foreach($menu as $item)
                                        @if($item->Position && $item->Position->pluck('code')->first() == 'menu_header')
                                            @foreach($item->MenuItems as $menuItem)
                                                @if($menuItem->parent == 0)
                                                    <li @if($menuItem->redirect == url()->current()) class="current-menu-item" @endif>
                                                        <a href="{{$menuItem->redirect}}">{{$menuItem->name}}</a>
                                                        @if($menuItem->Children->count()>0)
                                                            <ul class="sub-menu">
                                                                @include('web.template.menu_item', ['child' => $menuItem->Children])
                                                            </ul>
                                                        @endif
                                                    </li>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- SLIDER -->
<section>
    <div class="home_top">
        <div class="banner_top">
            <div class="border_slider">
                <div class="owl-carousel owl-theme owl-loaded owl-drag" id="slider-show">
                    @foreach($slider as $item)
                        @if($item->code == 'banner')
                            @foreach($item->Sliders as $sliderItem)
                                <div class="banner-image">
                                    <img src="{{asset('media/sliders/mobile/'.$sliderItem->image_mobile)}}" alt="banner"
                                         width="auto" height="100%">
                                </div>
                            @endforeach
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END SLIDER -->

<!-- CATEGORY -->
<section>
    <div class="cate-box my-3">
        <div class="container">

            <div class="heading-area">
                <h4>Danh mục dịch vụ</h4>
            </div>
            <div class="row bg-white">
                @foreach($categoryProduct as $item)
                    <div class="col-3 p-0">
                        <a href="{{route('redirect',$item->slug)}}" class="ct-item-a ct-transition">
                            <div class="cate-item text-center">
                                <picture class="picture margin-6">
                                    <img data-src="{{asset('media/category_products/'.$item->icon)}}" class="lazy-load" alt="{{$item->name}}" width="auto" height="auto">
                                </picture>
                                <div class="cate-item-name f14-normal">
                                    {{$item->name}}
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- END CATEGORY -->

<!-- ABOUT US -->
<section class="about-us-section">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-center">
            <div class="col-lg-6 col-12 box-left">
                <div class="heading-area">
                    <h4>Giới thiệu</h4>
                    <h2>Chuyên gia IT 24/7</h2>
                </div>
                <div class="description-area">
                    <p> Anh Thợ IT tự hào là đơn vị tiên phong hàng đầu trong lĩnh vực kỹ thuật và công nghệ. Với hơn 20 năm kinh nghiệm là đối tác cùng các doanh nghiệp chúng tôi chuyên cung cấp các giải pháp IT, triển khai cơ sở hạ tầng thiết bị CNTT, vận hành và tối ưu toàn bộ hệ thống 24/7.</p>                </div>
                <div class="select-box-area">
                    <div class="d-flex">
                        <div class="col-6 col-left">
                            <ul>
                                <li>
                                    <span class="icon"><i class="fa fa-check-square" aria-hidden="true"></i></span>
                                    <span class="text">Phòng IT thuê ngoài</span>
                                </li>
                                <li>
                                    <span class="icon"><i class="fa fa-check-square" aria-hidden="true"></i></span>
                                    <span class="text">Quản trị hệ thống</span>
                                </li>
                                <li>
                                    <span class="icon"><i class="fa fa-check-square" aria-hidden="true"></i></span>
                                    <span class="text">Thi công, lắp đặt</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul>
                                <li>
                                    <span class="icon"><i class="fa fa-check-square" aria-hidden="true"></i></span>
                                    <span class="text">Chuyển đổi số DN</span>
                                </li>
                                <li>
                                    <span class="icon"><i class="fa fa-check-square" aria-hidden="true"></i></span>
                                    <span class="text">TB văn phòng</span>
                                </li>
                                <li>
                                    <span class="icon"><i class="fa fa-check-square" aria-hidden="true"></i></span>
                                    <span class="text">Hỗ trợ IT 24/7</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="footer-area">
                    <div class="ihbox-box">
                        <div class="ihbox-box-content">
                            <h2>
                                Chúng tôi là đối tác CNTT tốt nhất cho doanh nghiệp của bạn.
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12 box-right mt-4">
                <div class="youtube-area">
                    <div class="content-wrapper">
                        <div class="align-center">
                            <a class="icon-wrapper" href="javascript:void(0);"><i class="fa fa-play" aria-hidden="true"></i> </a>
                        </div>
                    </div>
                </div>
                <div class="image-area-top">
                    <div class="image-area-content-top">
                        <img data-src="{{asset('media/common/network-repair.jpg')}}" alt="repair" class="lazy-load" width="auto" height="auto">
                    </div>
                </div>
                <div class="image-area-bottom">
                    <div class="image-area-content-bottom">
                        <img data-src="{{asset('media/common/it-support.jpg')}}" class="lazy-load" alt="it-sopport" width="auto" height="auto">
                    </div>
                </div>
                <div class="experience-area">
                    <div class="experience-area-content">
                        <div class="experience-wrapper">
                            <div class="d-flex align-items-center">
                                <h4>20</h4>
                                <div class="experience-title">
                                    <span>Năm</span><br>
                                    <span>Kinh Nghiệm</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END ABOUT US -->

<!-- SERVICE START-->
<section class="section-full aon-latest-blog-area3">
    <div class="container">
        <!--Title Section Start-->
        <div class="section-head">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <span class="aon-sub-title">DỊCH VỤ</span>
                    <div class="m-0 d-flex justify-content-between">
                        <h2 class="sf-title">Dịch Vụ Của Chúng Tôi</h2>
                        <a href="{{route('news')}}">Xem tất cả</a>
                    </div>
                </div>
            </div>
        </div>
        <section class="section-content">
            <div class="service-carousels d-flex overflow-auto" id="load-solution">
            </div>
        </section>
    </div>
</section>
<!-- SERVICE END-->

<!-- PRODUCT START-->
<section class="product-m-section">
    <div class="container">
        <div class="section-head">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <span class="aon-sub-title">Báo giá</span>
                    <div class="m-0 d-flex justify-content-between">
                        <h2 class="sf-title">Báo Giá Dịch Vụ</h2>
                        <a href="{{route('list_product')}}">Xem tất cả</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-3">
            <div class="item_tag">
                <div class="list-related-tag" id="load-category-product">
                </div>
            </div>
        </div>
        <section class="section-content overflow-hidden w-100">
            <div class="overflow-auto product-wrapper-box">
                <div class="d-flex" id="product-slider">
                </div>
            </div>
        </section>
    </div>
</section>
<!-- PRODUCT END-->

<!-- Pricing Plan -->
<section class="section-full aon-pricing-area2">
    <div class="container">
        <!--Title Section Start-->
        <div class="section-head">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <span class="aon-sub-title">Giải Pháp</span>
                    <h2 class="sf-title">Phòng IT Thuê Ngoài</h2>
                </div>
            </div>
        </div>
        <div class="section-content">

            <div class="sf-pricing-section-outer">
                <!-- COLUMNS 1 -->
                <div class="col-6 px-1 my-3">
                    <div class="sf-pricing-section">
                        <div class="sf-price-tb-info">
                            <div class="sf-price-plan-name">Cá nhân</div>
                            <div class="sf-price-plan-discount">Save 20%</div>
                        </div>

                        <div class="sf-price-tb-list">
                            <ul>
                                <li><i class="fa fa-check"></i>  Hỗ trợ 24/7</li>
                                <li><i class="fa fa-check"></i>  Quản trị thiết bị</li>
                                <li><i class="fa fa-check"></i>   Quản trị mạng</li>
                                <li class="disable"><i class="fa fa-check"></i>  Quản lý máy chủ</li>
                                <li class="disable"><i class="fa fa-check"></i>  Quản lý Lưu trữ</li>
                                <li class="disable"><i class="fa fa-check"></i>  Bảo trì hệ thống</li>
                                <li class="disable"><i class="fa fa-check"></i>  Đào tạo</li>
                                <li class="disable"><i class="fa fa-check"></i>  Giải quyết sự cố</li>
                            </ul>
                        </div>

                        <div class="sf-price-tb-plan">
                            <div class="sf-price-plan-cost"><span>2.000.000đ</span></div>
                        </div>
                        <a href="{{asset('/lien-he')}}" class="sf-choose-plan-btn">Đăng ký</a>
                    </div>
                </div>
                <!-- COLUMNS 2 -->
                <div class="col-6 px-1 my-3">
                    <div class="sf-pricing-section">

                        <div class="sf-price-tb-info">
                            <div class="sf-price-plan-name">Cơ Bản</div>
                            <div class="sf-price-plan-discount">Save 20%</div>
                        </div>

                        <div class="sf-price-tb-list">
                            <ul>
                                <li><i class="fa fa-check"></i>  Hỗ trợ 24/7</li>
                                <li><i class="fa fa-check"></i>  Quản trị thiết bị</li>
                                <li><i class="fa fa-check"></i>   Quản trị mạng</li>
                                <li><i class="fa fa-check"></i>  Quản lý máy chủ</li>
                                <li><i class="fa fa-check"></i>  Quản lý Lưu trữ</li>
                                <li class="disable"><i class="fa fa-check"></i>  Bảo trì hệ thống</li>
                                <li class="disable"><i class="fa fa-check"></i>  Đào tạo</li>
                                <li class="disable"><i class="fa fa-check"></i>  Giải quyết sự cố</li>
                            </ul>
                        </div>

                        <div class="sf-price-tb-plan">
                            <div class="sf-price-plan-cost"><span>4.000.000đ</span></div>
                        </div>
                        <a href="{{asset('/lien-he')}}" class="sf-choose-plan-btn">Đăng ký</a>
                    </div>
                </div>
                <!-- COLUMNS 1 -->
                <div class="col-6 px-1 my-3">
                    <div class="sf-pricing-section sf-pricing-active">
                        <div class="sf-price-tb-info">
                            <div class="sf-price-plan-name">Chuyên Nghiệp</div>
                            <div class="sf-price-plan-discount">Save 20%</div>
                        </div>

                        <div class="sf-price-tb-list">
                            <ul>
                                <li><i class="fa fa-check"></i>  Hỗ trợ 24/7</li>
                                <li><i class="fa fa-check"></i>  Quản trị thiết bị</li>
                                <li><i class="fa fa-check"></i>   Quản trị mạng</li>
                                <li><i class="fa fa-check"></i>  Quản lý máy chủ</li>
                                <li><i class="fa fa-check"></i>  Quản lý Lưu trữ</li>
                                <li><i class="fa fa-check"></i>  Bảo trì hệ thống</li>
                                <li><i class="fa fa-check"></i>  Đào tạo</li>
                                <li class="disable"><i class="fa fa-times"></i>  Giải quyết sự cố</li>
                            </ul>
                        </div>

                        <div class="sf-price-tb-plan">
                            <div class="sf-price-plan-cost"><span>5.000.000đ</span></div>
                        </div>
                        <a href="{{asset('/lien-he')}}" class="sf-choose-plan-btn">Đăng ký</a>
                    </div>
                </div>
                <!-- COLUMNS 2 -->
                <div class="col-6 px-1 my-3">
                    <div class="sf-pricing-section">

                        <div class="sf-price-tb-info">
                            <div class="sf-price-plan-name">Cao Cấp</div>
                            <div class="sf-price-plan-discount">Save 20%</div>
                        </div>

                        <div class="sf-price-tb-list">
                            <ul>
                                <li><i class="fa fa-check"></i>  Hỗ trợ 24/7</li>
                                <li><i class="fa fa-check"></i>  Quản trị thiết bị</li>
                                <li><i class="fa fa-check"></i>   Quản trị mạng</li>
                                <li><i class="fa fa-check"></i>  Quản lý máy chủ</li>
                                <li><i class="fa fa-check"></i>  Quản lý Lưu trữ</li>
                                <li><i class="fa fa-check"></i>  Bảo trì hệ thống</li>
                                <li><i class="fa fa-check"></i>  Đào tạo</li>
                                <li><i class="fa fa-check"></i>  Giải quyết sự cố</li>
                            </ul>
                        </div>

                        <div class="sf-price-tb-plan">
                            <div class="sf-price-plan-cost"><span>8.000.000đ</span></div>
                        </div>
                        <a href="javascript:void(0);" class="sf-choose-plan-btn">Đăng ký</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Pricing Plan END -->

<!-- Image -->
<section class="gallery-section">
    <div class="container">
        <div class="section-head">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <span class="aon-sub-title">Hình ảnh</span>
                    <div class="m-0 d-flex justify-content-between">
                        <h2 class="sf-title">Dịch vụ tiêu biểu</h2>
                        <a href="{{route('news')}}">Xem tất cả</a>
                    </div>
                </div>
            </div>
        </div>
        <nav>
            <div class="nav nav-tabs justify-content-start flex-nowrap" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav_cat_all" data-toggle="tab" data-target="#tab_cat_all"
                        type="button"
                        role="tab" aria-controls="nav-home" aria-selected="true">Tất cả
                </button>
            </div>
        </nav>
        <div class="tab-content mt-4" id="nav-tabContent">
            <div class="tab-pane fade show active" id="tab_cat_all" role="tabpanel" aria-labelledby="all-tab">
                <div class="gallery-block">
                    <div class="overflow-hidden w-100">
                        <div class="overflow-auto wrapper-image-tab">
                            <div class="d-flex">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Image END -->

<!-- VIDEO -->
<section class="box-video">
    <div class="container">
        <div class="section-head">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <span class="aon-sub-title">Video</span>
                    <div class="m-0 d-flex justify-content-between">
                        <h2 class="sf-title">Video nổi bật</h2>
                        <a href="{{route('news')}}">Xem tất cả</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-content overflow-hide w-100">
            <div class="video-wrapper">
                <div class="d-flex" id="load-video">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END VIDEO -->

<!-- Latest Blog -->
<section class="section-full aon-latest-blog-area2">
    <div class="container">
        <!--Title Section Start-->
        <div class="section-head">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <span class="aon-sub-title">Tin Tức</span>
                    <div class="m-0 d-flex justify-content-between">
                        <h2 class="sf-title">Tin mới nhất</h2>
                        <a href="{{route('news')}}">Xem tất cả</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-content overflow-hide w-100">
            <div class="aon-l-blog-area2-section news-wrapper">
                <div class="d-flex" id="load-news">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Latest Blog END -->

<section class="box-panel">
    <div class="container">
        <div class="box-bottom-panel">
            <div class="panel-contact panel-box d-flex">
                <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                <a href="tel:0886776286">088 677 6286</a>
            </div>
            <div class="panel-booking panel-box d-flex">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <a href="javascript:void(0);" class="order_icon btn-modal-order">Đặt lịch</a>
            </div>
            <div class="panel-offer panel-box d-flex">
                <i class="fa fa-commenting-o" aria-hidden="true"></i>
                <a href="javascript:void(0);" class="btn-offer">Báo giá</a>
            </div>
        </div>
    </div>
</section>

@include('web.layouts.footer')
@include('web.template.template_modal_order_service')
@include('web.template.template_modal_offer')
@include('web.template.template_search')
@include('web.template.template_product_two_rows')
@include('web.template.template_product_mobile')
@include('web.template.template_product_suggest_mobile')
@include('web.template.template_solution_mobile')
@include('web.template.template_category_product')
@include('web.template.template_video_mobile')
@include('web.template.template_news_mobile')
@include('web.template.template_category_image_mobile')
@include('web.template.template_category_image_mobile_tab_pane')
@include('web.template.template_post_image_mobile')
<!-- JAVASCRIPT  FILES ========================================= -->
<script src="{{asset('js/web/jquery-3.6.0.min.js')}}"></script><!-- JQUERY.MIN JS -->
<script src="{{asset('js/web/bootstrap.min.js')}}"></script><!-- BOOTSTRAP.MIN JS -->
<script src="{{asset('js/web/owl.carousel.min.js')}}"></script><!-- OWL  SLIDER  -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var lazyImages = document.querySelectorAll(".lazy-load");
        var threshold = 300; // Khoảng cách mà bạn muốn tải ảnh trước khi hiển thị

        var lazyLoad = function() {
            var viewportTop = window.scrollY;
            var viewportBottom = viewportTop + window.innerHeight;

            lazyImages.forEach(function(img) {
                var imgTop = img.getBoundingClientRect().top + window.scrollY;
                var imgBottom = imgTop + img.clientHeight;

                if (imgBottom >= viewportTop - threshold && imgTop <= viewportBottom + threshold) {
                    img.src = img.getAttribute("data-src");
                    img.classList.remove("lazy-load");
                }
            });
        };

        var lazyBackgrounds = document.querySelectorAll(".lazy-background");
        var searchButton = document.getElementById("btn-open-search"); // Thay "search-button" bằng id của nút tìm kiếm

        var lazyLoadBackground = function(entries, observer) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    var element = entry.target;
                    var imageUrl = element.getAttribute("data-bg");
                    element.style.backgroundImage = "url(" + imageUrl + ")";
                    observer.unobserve(element);
                }
            });
        };

        var observer = new IntersectionObserver(lazyLoadBackground, { rootMargin: "500px 0px" });

        lazyBackgrounds.forEach(function(lazyBackground) {
            observer.observe(lazyBackground);
        });

        // Sự kiện click trên nút tìm kiếm
        searchButton.addEventListener("click", function() {
            // Duyệt qua các phần tử lazy background và gọi hàm lazy loading cho chúng
            lazyBackgrounds.forEach(function(lazyBackground) {
                if (!lazyBackground.style.backgroundImage) {
                    observer.observe(lazyBackground);
                }
            });
        });

        // Gọi hàm lazy load khi trang tải hoặc cuộn trang
        window.addEventListener("load", lazyLoad);
        window.addEventListener("scroll", lazyLoad);
    });
</script>
<script src="{{asset('js/web/mixitup.js')}}" defer></script>
<script>
    $(document).ready(function () {
        var _token = $('meta[name="csrf-token"]').attr('content');

        $(document).on('click', '.btn-offer', function () {
            $('.modal-offer').removeClass('d-none');
        });

        $(document).on('click', '#close-offer', function () {
            $('.modal-offer').addClass('d-none');
        });

        $(document).on('click', '.child', function () {
            // Nếu con đang ẩn
            if ($(this).siblings().children().children().hasClass('hide-child')) {
                if ($(this).hasClass('parents_offer')) {
                    if (!$(this).hasClass('active')) {
                        $(this).addClass('active');
                        // thì cha cùng cấp ẩn
                        $(this).parent().siblings().children().addClass('hide-child');
                        $(this).parent().siblings().children().removeClass('show-child');
                        // con hiện
                        $(this).siblings().children().children().removeClass('hide-child');
                        $(this).siblings().children().children().addClass('show-child');
                    } else {
                        $(this).removeClass('active');
                        $(this).siblings().find('.child').removeClass('show-child');
                        $(this).siblings().find('.child').addClass('hide-child');
                        $(this).parent().siblings().children().removeClass('hide-child');
                        $(this).parent().siblings().children().addClass('show-child');
                    }
                } else {
                    // thì cha cùng cấp ẩn
                    $(this).parent().siblings().children().addClass('hide-child');
                    $(this).parent().siblings().children().removeClass('show-child');
                    // con hiện
                    $(this).siblings().children().children().removeClass('hide-child');
                    $(this).siblings().children().children().addClass('show-child');
                }
            }
            // nếu con đang hiện
            else {
                if ($(this).hasClass('parents_offer')) {
                    if ($(this).hasClass('active')) {
                        $(this).removeClass('active');
                        $(this).removeClass('active');
                        $(this).siblings().find('.child').removeClass('show-child');
                        $(this).siblings().find('.child').addClass('hide-child');
                        $(this).parent().siblings().children().removeClass('hide-child');
                        $(this).parent().siblings().children().addClass('show-child');
                    }
                } else {
                    // thì ẩn con
                    $(this).siblings().find('.child').addClass('hide-child');
                    $(this).siblings().find('.child').removeClass('show-child');
                    // hiện cha cùng cấp
                    $(this).parent().siblings().children().removeClass('hide-child');
                    $(this).parent().siblings().children().addClass('show-child');
                }
            }
        });

        // Mở form đặt lịch
        $(document).on('click', '.btn-modal-order', function () {
            if ($('.modal-order').hasClass('d-none')) {
                $('#form_order')[0].reset();
                $('.text-error').remove();
                var today = new Date().toISOString().slice(0, 16);
                $('input[name="booking_date"]')[0].min = today;
                $('#form_order input[name="booking_date"]').val(today);
                $('#form_order textarea[name="note"]').val($(this).attr('data-value'));
                $('.btn-order').attr('data-id', '');
                $('.btn-order').attr('data-id', $(this).attr('data-id'));
                $('.modal-order').removeClass('d-none');
            } else {
                $('.modal-order').addClass('d-none');
            }
        });

        // Đóng form đặt lịch
        $(document).on('click', '#close-order', function () {
            $('#form_order')[0].reset();
            $('.modal-order').addClass('d-none');
        });

        // Đặt lịch
        $(document).on('click', '.btn-order', function () {
            var name = $('#form_order input[name="name"]');
            var phone = $('#form_order input[name="phone"]');
            var type = $('#form_order select[name="type"]');
            var address = $('#form_order input[name="address"]');
            var booking_date = $('#form_order input[name="booking_date"]');
            var note = $('#form_order textarea[name="note"]');
            $('.text-error').remove();
            var input = {
                name: name.val(),
                phone: phone.val(),
                type: type.val(),
                address: address.val(),
                note: note.val(),
                booking_date: booking_date.val(),
                _token: _token
            }
            $.ajax({
                url: "{{route('booking')}}",
                method: "POST",
                data: input,
                dataType: 'json',
                success: function (output) {
                    if (output.success) {
                        $('.modal-order').addClass('d-none');
                        alert('Đã đặt lịch hẹn');
                    }
                },
                error: function (output) {
                    var message = output.responseJSON.errors;
                    if (message.name) {
                        name.after(error(message.name));
                    }
                    if (message.phone) {
                        phone.after(error(message.phone));
                    }
                    if (message.note) {
                        note.after(error(message.note));
                    }
                    if (message.address) {
                        address.after(error(message.address));
                    }
                    if (message.booking_date) {
                        booking_date.after(error(message.booking_date));
                    }
                }
            });
        });

        $('#slider-show').owlCarousel({
            autoplay: true,
            autoplayHoverPause: true,
            loop: true,
            center: true,
            margin: 0,
            stagePadding: true,
            nav: false,
            dots: true,
            mouseDrag: true,
            touchDrag: true,
            lazyLoad: true,
            responsive: {
                0: {
                    items: 1
                },
            }
        });

        $('#service_slider').owlCarousel({
            autoplay: true,
            autoplayHoverPause: true,
            loop: true,
            margin: 5,
            stagePadding: true,
            nav: false,
            dots: true,
            mouseDrag: true,
            touchDrag: true,
            lazyLoad: true,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3
                },
            }
        });

        $('.product-owl-chuck').owlCarousel({
            loop: true,
            margin: 5,
            nav: false,
            dots: false,
            navText: ['<span class="ar-left"></span>', '<span class="ar-right"></span>'],
            responsive: {
                0: {
                    items: 3
                },
                767: {
                    items: 3
                },
                1000: {
                    items: 4
                },
            }
        });

        $(document).on('click', '#btn-open-search', function () {
            $('.box-search-mobile').addClass('active');
            $('body').addClass('disable_scroll');
        });

        $(document).on('click', '.btn-back-search', function () {
            $('.box-search-mobile').removeClass('active');
            $('body').removeClass('disable_scroll');
        });

        //ham delay go phim
        function delay(callback, ms) {
            var timer = 0;
            return function () {
                var context = this, args = arguments;
                clearTimeout(timer);
                timer = setTimeout(function () {
                    callback.apply(context, args);
                }, ms || 0);
            };
        }

        //tim kiem khi go thanh tim kiem
        $("#search").keyup(delay(function (e) {
            tmp_search('#search', '#result-search');
        }, 200));

        // template tim kiem
        function tmp_search(key_words, id_append) {
            var keyword = $(key_words).val();
            var input = {
                keyword: keyword,
                _token: _token
            }
            if (keyword !== "") {
                $.ajax({
                    url: "{{route('search_perfect')}}",
                    data: input,
                    type: "post",
                    dataType: "json",
                    success: function (output) {
                        if (output.products.length > 0) {
                            $(id_append).html('');
                            var template_search = $('#template-search').html();
                            $.each(output.products, function (k, v) {
                                var tmp = $(template_search).clone();
                                var url = "{{route('redirect','url_product')}}";
                                url = url.replace('url_product', v.slug);
                                $(tmp).find('a').attr('href', url);
                                $(tmp).find('a').html(v.name);
                                if(v.price_range !== "Liên hệ")
                                {
                                    $(tmp).find('span').html(v.price_range+' đ');
                                }
                                else{
                                    $(tmp).find('span').html(v.price_range);
                                }
                                $(id_append).append(tmp);
                            });
                            $(id_append).css('display', 'block');
                        } else {
                            $(id_append).html('');
                            $(id_append).css('display', 'none');
                        }
                    },
                })
            } else {
                $(id_append).html('');
                $(id_append).css('display', 'none');
            }
        }

        //clear box search
        $('input[type=search]').on('search', function () {
            $('#result-search').html('');
            $('#result-search').css('display', 'none');
        });

        function tmp_product_2(data, id_append) {
            var template_product_mobile = $('#template-product-mobile').html();
            var template_two_rows = $('#template-product-two-rows').html();
            var tmp_two_rows = "";
            $.each(data, function (k, v) {
                var tmp = $(template_product_mobile).clone();
                var url = '{{route('redirect', 'slug_detail')}}';
                url = url.replace('slug_detail', v.slug);
                $(tmp).find('a').attr('href', url);

                var product_image = "{{asset('media/common/'.\App\Admin\Http\Helpers\Common::noImage)}}";
                if (v.image !== "{{\App\Admin\Http\Helpers\Common::noImage}}") {
                    product_image = '{{asset('media/products/small/img_product')}}';
                    product_image = product_image.replace('img_product', v.image);
                }
                else{
                    $(tmp).find('img').css('opacity',0);
                }

                $(tmp).find('img').attr('src', product_image);
                $(tmp).find('img').attr('alt', v.name);

                $(tmp).find('.name-product span').html(v.name);
                $(tmp).find('.cate-product span').html(v.category_name);

                $(tmp).find('.price-product span').html(v.price_range);
                $(tmp).find('.btn-modal-order-product').attr('data-value', v.name);
                $(tmp).find('.btn-modal-order-product').attr('data-id', v.id);
                if ((k + 1) % 2 === 0) {
                    tmp_two_rows = $(template_two_rows).clone();
                    $(tmp_two_rows).append(tmp);
                } else {
                    $(tmp_two_rows).append(tmp);
                    $(id_append).append(tmp_two_rows);
                }
            });
        }

        $(document).on('click', '.cat-item', function () {
            var cat_id = $(this).attr('data-id');
            var input = {
                cat_id: cat_id,
                _token: _token
            }
            $('.cat-item').removeClass('active');
            $(this).addClass('active');

            $.ajax({
                url: "{{route('load_product_by_category')}}",
                type: "post",
                dataType: "json",
                data: input,
                success: function (output) {
                    $('#product-slider').html('');
                    tmp_product_2(output.products, '#product-slider');
                }
            })
        });

        $(document).on('click', '#btn-open-search', function () {
            if ($('#load-suggest').hasClass('loaded') === false) {
                $.ajax({
                    url: "{{route('get_product_all')}}",
                    type: "post",
                    dataType: "json",
                    data: {
                        _token: _token
                    },
                    success: function (output) {
                        var template = $('#template-product-suggest-mobile').html();
                        if (output.products.length > 0) {
                            $('#load-suggest').html('');
                            $.each(output.products, function (k, v) {
                                var tmp = $(template).clone();
                                var img = "{{asset('media/common/'.\App\Admin\Http\Helpers\Common::noImage)}}";
                                if (v.image !== "{{\App\Admin\Http\Helpers\Common::noImage}}") {
                                    img = "{{asset('media/products/small/image_product')}}";
                                    img = img.replace('image_product', v.image);
                                }

                                var url = "{{route('redirect','slug_suggest')}}";
                                url = url.replace('slug_suggest',v.slug);
                                $(tmp).attr('href', url);

                                $(tmp).find('.img-search').css({'background-image': 'url(' + img + ')'});
                                $(tmp).find('.product-name').html(v.name);
                                var price_range = "Liên hệ";
                                if (v.price_range !== "Liên hệ") {
                                    price_range = v.price_range + ' đ';
                                }
                                $(tmp).find('.product-price').html(price_range);
                                $('#load-suggest').append(tmp);
                            });
                        }
                    }
                });
                $('#load-suggest').addClass('loaded');
            }
        });

        //ham cai dat load khung hinh
        function isOnScreen(elem) {
            if (elem.length === 0) {
                return;
            }
            var $window = jQuery(window)
            var viewport_top = $window.scrollTop() //vị trí đang scroll
            var viewport_height = $window.height()  // chiều cao màn hình
            var viewport_bottom = viewport_top + viewport_height
            var $elem = jQuery(elem)
            var top = $elem.offset().top - 1000
            var height = $elem.height()
            var bottom = top + height + 1000

            return (top >= viewport_top && top < viewport_bottom) || (bottom > viewport_top && bottom <= viewport_bottom) ||
                (height > viewport_height && top <= viewport_top && bottom >= viewport_bottom)
        };

        function runOnScroll() {
            if (isOnScreen($("#load-solution")) && ($("#load-solution").hasClass("loaded") == false)) {
                solution();
                $("#load-solution").addClass("loaded");
            }

            if (isOnScreen($("#load-category-product")) && ($("#load-category-product").hasClass("loaded") == false)) {
                categoryProduct();
                $("#load-category-product").addClass("loaded");
            }

            if (isOnScreen($("#product-slider")) && ($("#product-slider").hasClass("loaded") == false)) {
                productChuck2();
                $("#product-slider").addClass("loaded");
            }

            if (isOnScreen($("#load-video")) && ($("#load-video").hasClass("loaded") == false)) {
                video();
                $("#load-video").addClass("loaded");
            }

            if (isOnScreen($("#load-news")) && ($("#load-news").hasClass("loaded") == false)) {
                news();
                $("#load-news").addClass("loaded");
            }

            if (isOnScreen($("#nav-tab")) && ($("#nav-tab").hasClass("loaded") == false)) {
                categoryImage();
                $("#nav-tab").addClass("loaded");
            }
        }

        $(window).scroll(runOnScroll);

        function solution() {
            var template = $('#template-solution-mobile').html();
            $.ajax({
                url: "{{route('get_solution')}}",
                type: "post",
                dataType: "json",
                data: {
                    _token: _token
                },
                success: function (output) {
                    if (output.solution.length > 0) {
                        $('#load-solution').html('');
                        $.each(output.solution, function (k, v) {
                            var tmp = $(template).clone();
                            var url = "{{route('redirect','slug_solution')}}";
                            url = url.replace('slug_solution',v.slug);
                            $(tmp).find('a').attr('href', url);
                            $(tmp).find('.aon-ow-info span').html(v.name);
                            var img = "{{asset('media/common/'.\App\Admin\Http\Helpers\Common::noImage)}}";
                            if(v.image !== "{{\App\Admin\Http\Helpers\Common::noImage}}"){
                                img = "{{asset('media/posts/small/image_solution')}}";
                                img = img.replace('image_solution',v.image);
                            }
                            else{
                                $(tmp).find('img').css('opacity', 0);
                            }
                            $(tmp).find('img').attr('src', img);
                            $(tmp).find('img').attr('alt', v.name);
                            $(tmp).find('.aon-ow-mid p').html(v.summary);
                            $('#load-solution').append(tmp);
                        });
                    }
                },
            })
        }

        function categoryProduct() {
            var template = $('#template-category-product').html();
            $.ajax({
                url: "{{route('get_category_product')}}",
                type: "post",
                dataType: "json",
                data: {
                    _token: _token
                },
                success: function (output) {
                    if (output.categoryProduct.length > 0) {
                        $('#load-category-product').html('');
                        $.each(output.categoryProduct, function (k, v) {
                            var tmp = $(template).clone();
                            $(tmp).attr('data-id',v.id);
                            $(tmp).html(v.name);
                            $('#load-category-product').append(tmp);
                        });
                    }
                },
            })
        };

        function productChuck2() {
            $.ajax({
                url: "{{route('get_product_all')}}",
                type: "post",
                dataType: "json",
                data: {
                    _token: _token
                },
                success: function (output) {
                    $('#product-slider').html('');
                    tmp_product_2(output.products, '#product-slider');
                }
            })
        }

        function video() {
            $.ajax({
                url: "{{route('get_video')}}",
                type: "post",
                dataType: "json",
                data: {
                    _token: _token
                },
                success: function (output) {
                    if (output.videos.length > 0) {
                        var template = $('#template-video-mobile').html();
                        var template_chuck = $('<div class="d-flex flex-wrap col-6 px-0 h-100 box-chuck"></div>');
                        var tmp_chuck = "";
                        $.each(output.videos, function (k, v) {
                            var tmp = $(template).clone();
                            var url = "{{route('redirect','slug_video')}}";
                            url = url.replace('slug_video',v.slug);
                            $(tmp).find('a').attr('href', url);
                            $(tmp).find('.video-title a').html(v.name);

                            var img = "{{asset('media/common/'.\App\Admin\Http\Helpers\Common::noImage)}}";
                            if(v.image !== "{{\App\Admin\Http\Helpers\Common::noImage}}"){
                                img = "{{asset('media/posts/small/image_video')}}";
                                img = img.replace('image_video',v.image);
                            }
                            else{
                                $(tmp).find('img').css('opacity', 0);
                            }
                            $(tmp).find('img').attr('src', img);
                            $(tmp).find('img').attr('alt', v.name);
                            $(tmp).find('.create-by a').html(v.user_name);
                            if (output.videos.length > 1) {
                                if (k === output.videos.length - 1 && (k + 1) % 2 !== 0) {
                                    tmp_chuck = $(template_chuck).clone();
                                    $(tmp_chuck).append(tmp);
                                    $('#load-video').append(tmp_chuck);
                                } else {
                                    if ((k+1) % 2 !== 0) {
                                        tmp_chuck = $(template_chuck).clone();
                                        $(tmp_chuck).append(tmp);
                                    } else {
                                        $(tmp_chuck).append(tmp);
                                        $('#load-video').append(tmp_chuck);
                                    }
                                }
                            } else {
                                tmp_chuck = $(template_chuck).clone();
                                $(tmp_chuck).append(tmp);
                                $('#load-video').append(tmp_chuck);
                            }

                        });
                    }
                },
            })
        };

        function news() {
            var template = $('#template-news-mobile').html();
            $.ajax({
                url: "{{route('get_news')}}",
                type: "post",
                dataType: "json",
                data: {
                    _token: _token
                },
                success: function (output) {
                    if (output.news.length > 0) {
                        $.each(output.news, function (k, v) {
                            var tmp = $(template).clone();
                            var url = "{{route('redirect','slug_news')}}";
                            url = url.replace('slug_news',v.slug);
                            $(tmp).find('.post-title a').attr('href', url);
                            $(tmp).find('.post-title a').html(v.name);
                            $(tmp).find('.aon-post-text p').html(v.summary);
                            var img = "{{asset('media/common/'.\App\Admin\Http\Helpers\Common::noImage)}}";
                            if(v.image !== "{{\App\Admin\Http\Helpers\Common::noImage}}"){
                                img = "{{asset('media/posts/small/image_news')}}";
                                img = img.replace('image_news',v.image);
                            }
                            else{
                                $(tmp).find('img').css('opacity', 0);
                            }
                            $(tmp).find('img').attr('src', img);
                            $(tmp).find('img').attr('alt', v.name);
                            var published_at = new Date(v.published_at);
                            $(tmp).find('.post-date span').html(published_at.toLocaleDateString());
                            $(tmp).find('.post-author a').html(v.user_name);
                            if(v.category_name){
                                $(tmp).find('.post-categories a').html(v.category_name);
                            }
                            else{
                                $(tmp).find('.post-categories a').html('TIN TỨC');
                            }

                            if(v.category_slug){
                                var url_category = "{{route('redirect','slug_category')}}";
                                url_category = url_category.replace('slug_category', v.category_slug);
                                $(tmp).find('.post-categories a').attr('href', url_category);
                            }

                            $('#load-news').append(tmp);
                        });
                    }
                },
            })
        }

        function categoryImage() {
            $.ajax({
                url: "{{route('get_category_image')}}",
                type: "post",
                dataType: "json",
                data: {
                    _token: _token
                },
                success: function (output) {
                    if (output.categoriesImage.length > 0) {
                        var template_category = $('#template-category-image-mobile').html();
                        var template_category_tab_pane = $('#template-category-image-mobile-tab-pane').html();
                        var template_chuck = $('<div class="d-flex flex-wrap col-6 px-0"></div>');
                        var template_post = $('#template-post-image-mobile').html();

                        var used = [];
                        var k = 0;
                        var tmp_chuck_all = "";
                        $.each(output.categoriesImage, function (k1, v1) {
                            var tmp_category = $(template_category).clone();
                            $(tmp_category).attr('id', 'nav_cat_' + v1.id);
                            $(tmp_category).attr('data-target', '#tab_cat_' + v1.id);
                            $(tmp_category).attr('aria-controls', 'nav_cat_' + v1.id);
                            $(tmp_category).html(v1.name);
                            $('#nav-tab').append(tmp_category);

                            var tmp_tab_pane = $(template_category_tab_pane).clone();
                            $(tmp_tab_pane).attr('id', 'tab_cat_' + v1.id);
                            var tmp_chuck = "";
                            if (typeof v1.post_data != "undefined") {
                                $.each(v1.post_data, function (k2, v2) {
                                    var tmp_post = $(template_post).clone();
                                    var tmp_post_all = $(template_post).clone();

                                    var img = "{{asset('media/common/'.\App\Admin\Http\Helpers\Common::noImage)}}";
                                    if (v2.image !== "{{\App\Admin\Http\Helpers\Common::noImage}}") {
                                        img = "{{asset('media/posts/small/post_image')}}";
                                        img = img.replace('post_image', v2.image);
                                    }else{
                                        $(tmp_post).find('img').css('opacity', 0);
                                    }
                                    $(tmp_post).find('img').attr('src', img);
                                    $(tmp_post).find('img').attr('alt', v2.name);

                                    var url = "{{route('redirect','slug_post')}}";
                                    url = url.replace('slug_post', v2.slug);
                                    $(tmp_post).find('a').attr('href', url);
                                    $(tmp_post).find('a').html(v1.name);
                                    $(tmp_post).find('.category').html(v2.name);

                                    $(tmp_post_all).find('img').attr('src', img);
                                    $(tmp_post_all).find('a').attr('href', url);
                                    $(tmp_post_all).find('a').html(v1.name);
                                    $(tmp_post_all).find('.category').html(v2.name);

                                    if (v1.post_data.length > 1) {
                                        if (k2 === v1.post_data.length - 1 && (k2 + 1) % 2 !== 0) {
                                            tmp_chuck = $(template_chuck).clone();
                                            $(tmp_chuck).append(tmp_post);
                                            $(tmp_tab_pane).find('.wrapper-image-tab>.d-flex').append(tmp_chuck);
                                        } else {
                                            if (k2 === 0 || (k2 + 1) % 2 !== 0) {
                                                tmp_chuck = $(template_chuck).clone();
                                                $(tmp_chuck).append(tmp_post);
                                            } else {
                                                $(tmp_chuck).append(tmp_post);
                                                $(tmp_tab_pane).find('.wrapper-image-tab>.d-flex').append(tmp_chuck);
                                            }
                                        }
                                    } else {
                                        tmp_chuck = $(template_chuck).clone();
                                        $(tmp_chuck).append(tmp_post);
                                        $(tmp_tab_pane).find('.wrapper-image-tab>.d-flex').append(tmp_chuck);
                                    }

                                    if ($.inArray(v2.slug, used) === -1) {
                                        if (k === 0 || (k + 1) % 2 !== 0) {
                                            tmp_chuck_all = $(template_chuck).clone();
                                            $(tmp_chuck_all).append(tmp_post_all);
                                        } else {
                                            $(tmp_chuck_all).append(tmp_post_all);
                                            $('#tab_cat_all .wrapper-image-tab>.d-flex').append(tmp_chuck_all);
                                        }
                                        k = k + 1;
                                        used.push(v2.slug);
                                    }
                                });
                            }
                            $('#nav-tabContent').append(tmp_tab_pane);

                        });
                        $('#MixItUpImage').mixItUp();
                    }
                },
            })
        };

        $('#mobile-side-drawer').on('click', function () {
            $('.mobile-sider-drawer-menu').toggleClass('active');
        });
    });
</script>

</body>

</html>
