@extends('web.layouts.base')
@section('title')
    <title>Anh Thợ IT</title>
@endsection
@section('js')
    <script src="{{asset('js/web/mixitup.js')}}"></script>
    <script>

        $('#banner').owlCarousel({
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

        $('.testimonial-carousel').owlCarousel({
            autoplay: true,
            autoplayHoverPause: true,
            loop: true,
            margin: 10,
            stagePadding: true,
            nav: true,
            dots: false,
            mouseDrag: true,
            touchDrag: true,
            lazyLoad: true,
            navText: ['<span class="ar-left"></span>', '<span class="ar-right"></span>'],
            responsive: {
                0: {
                    items: 1
                },
                767: {
                    items: 2
                },
                1000: {
                    items: 3
                },
                1200: {
                    items: 4
                }
            }
        });

        $('.product-owl-chuck').owlCarousel({
            loop: true,
            margin: 20,
            nav: true,
            dots: false,
            navText: ['<span class="ar-left"></span>', '<span class="ar-right"></span>'],
            responsive: {
                0: {
                    items: 1
                },
                767: {
                    items: 2
                },
                1000: {
                    items: 3
                },
                1200: {
                    items: 4
                }
            }
        });

        $('.product-owl').owlCarousel({
            loop: true,
            margin: 20,
            nav: false,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                767: {
                    items: 2
                },
                1000: {
                    items: 3
                },
                1200: {
                    items: 4
                }
            }
        });

        $('.brand-owl').owlCarousel({
            autoplay: true,
            autoplayHoverPause: true,
            loop: true,
            margin: 20,
            stagePadding: true,
            nav: true,
            dots: false,
            mouseDrag: true,
            touchDrag: true,
            lazyLoad: true,
            navText: ['<span class="ar-left"></span>', '<span class="ar-right"></span>'],
            responsive: {
                0: {
                    items: 3
                },
                767: {
                    items: 4
                },
                1000: {
                    items: 5
                },
                1200: {
                    items: 6
                }
            }
        });

        $('#MixItUpImage').mixItUp();
    </script>
@endsection
@section('body')
    <!-- LOADING AREA  END ====== -->
    <div class="page-wraper">
        <!-- HEADER START -->
    @include('web.layouts.header')
    <!-- HEADER END -->

        <!-- CONTENT START -->
        <div class="page-content">

            <!-- BANNER -->
            <section>
                <div id="banner" class="owl-carousel">
                    <a>
                        <figure class="m-0">
                            <picture>
                                <source media="(min-width:992px)"
                                        srcset="{{asset('media/slider/20230809144024_top-banner-khi-vao-trang-tong.png')}}">
                                <img src="{{asset('media/slider/20230809144039_banner-kich-thuoc-mobile.png')}}">
                            </picture>
                        </figure>
                    </a>
                    <a>
                        <figure class="m-0">
                            <picture>
                                <source media="(min-width:992px)"
                                        srcset="{{asset('media/slider/20230908172318_uu-dai-o-lotop-banner-1920x640.jpg')}}">
                                <img
                                    src="{{asset('media/slider/20230908172241_uu-dai-o-lobanner-kich-thuoc-mobie-500x500.jpg')}}">
                            </picture>
                        </figure>
                    </a>
                </div>
            </section>
            <!-- END BANNER -->

            <!-- SEARCH -->
            <section>
                <div class="grid-search">
                    <div class="container">
                        <div class="d-flex grid-search-wrapper">
                            <div class="box-grid-search">
                                <form>
                                    <div class="box-field-grid field-grid-search">
                                        <table>
                                            <tr>
                                                <td>
                                                    <label>Tìm kiếm</label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="position-relative">
                                                        <input name="search" id="search2" type="search"
                                                               class="form-control">
                                                        <i class="fa fa-search icon-submit-search"
                                                           aria-hidden="true"></i>
                                                    </div>
                                                    <div class="ajax-search-result2 py-1 position-absolute"
                                                         id="result-search2"></div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="box-field-grid">
                                        <table>
                                            <tr>
                                                <td><label>Họ tên</label></td>
                                                <td>
                                                    <div class="position-relative">
                                                        <input name="name" type="text" class="form-control"
                                                               placeholder="Nhập họ tên..">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label>Điện thoại</label></td>
                                                <td>
                                                    <div class="position-relative">
                                                        <input name="phone" type="text" class="form-control"
                                                               placeholder="Số điện thoại..">
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="box-field-grid">
                                        <table>
                                            <tr>
                                                <td><label>Lịch hẹn</label></td>
                                                <td>
                                                    <div class="position-relative">
                                                        <input name="date" type="datetime-local" class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label>Yêu cầu</label></td>
                                                <td>
                                                    <div class="position-relative">
                                                        <input name="note" type="text" class="form-control"
                                                               placeholder="Mô tả yêu cầu..">
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="box-field-grid box-field-submit">
                                        <input type="submit" value="Đặt lịch">
                                        <div class="box-filed-submit-content">
                                            <span><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                            <span>Đặt lịch ngay</span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END SEARCH -->

            <!-- CATEGORY -->
            <section class=" aon-categories-area2">
                <div class="container">
                    <!--Title Section Start-->
                    <div class="section-head">
                        <div class="row">
                            <!-- COLUMNS LEFT -->
                            <div class="col-lg-6 col-md-12">
                                <span class="aon-sub-title">Danh mục</span>
                                <h2 class="sf-title">Danh mục phổ biến</h2>
                            </div>
                            <!-- COLUMNS RIGHT -->
                            <div class="col-lg-6 col-md-12">
                                <p>Dịch vụ Hỗ trợ IT tận Nơi 24/7 - một giải pháp tin cậy cho mọi vấn đề kỹ thuật bạn có
                                    thể
                                    gặp phải. Chúng tôi cam kết mang đến cho bạn sự chất lượng, hiệu quả và tiện lợi,
                                    giúp
                                    doanh nghiệp của bạn hoạt động suôn sẻ mọi lúc, mọi nơi.</p>
                            </div>
                        </div>
                    </div>
                    <!--Title Section End-->

                    <div class="section-content">
                        <div class="owl-carousel categories-carousel-owl aon-owl-arrow owl-loaded owl-drag">
                            @foreach($categoryProduct as $item)
                                <div class="item">
                                    <div class="aon-cat-item">
                                        <div class="aon-cat-pic media-bg-animate shine-hover">
                                            <a class="shine-box" href="{{route('redirect',$item->slug)}}"><img
                                                    src="{{asset('media/category_products/'.$item->icon)}}" alt=""></a>
                                        </div>
                                        <h4 class="aon-cat-title">{{$item->name}}</h4>
                                    </div>
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
                    <div class="d-flex flex-wrap">
                        <div class="col-lg-6 col-12 box-left">
                            <div class="heading-area">
                                <h4>Introduction repain center</h4>
                                <h2>Because good driving is everything we need</h2>
                            </div>
                            <div class="description-area">
                                <p>Can you carvax dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            </div>
                            <div class="select-box-area">
                                <div class="d-flex">
                                    <div class="col-6 col-left">
                                        <ul>
                                            <li>
                                                <span class="icon"><i class="fa fa-check-square" aria-hidden="true"></i></span>
                                                <span class="text">Praesent feugiat sem.</span>
                                            </li>
                                            <li>
                                                <span class="icon"><i class="fa fa-check-square" aria-hidden="true"></i></span>
                                                <span class="text">Praesent feugiat sem.</span>
                                            </li>
                                            <li>
                                                <span class="icon"><i class="fa fa-check-square" aria-hidden="true"></i></span>
                                                <span class="text">Praesent feugiat sem.</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-6">
                                        <ul>
                                            <li>
                                                <span class="icon"><i class="fa fa-check-square" aria-hidden="true"></i></span>
                                                <span class="text">Praesent feugiat sem.</span>
                                            </li>
                                            <li>
                                                <span class="icon"><i class="fa fa-check-square" aria-hidden="true"></i></span>
                                                <span class="text">Praesent feugiat sem.</span>
                                            </li>
                                            <li>
                                                <span class="icon"><i class="fa fa-check-square" aria-hidden="true"></i></span>
                                                <span class="text">Praesent feugiat sem.</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="footer-area">
                                <div class="ihbox-box">
                                    <div class="ihbox-box-content">
                                        <h2>
                                            We Provide Best Consulting & IT Solutions Since 2002 for business.
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12 box-right">
                            <div class="youtube-area">
                                <div class="content-wrapper">
                                    <div class="align-center">
                                        <a class="icon-wrapper">
                                            <i class="fa fa-play" aria-hidden="true"></i> </a>
                                    </div>
                                </div>
                            </div>
                            <div class="image-area-top">
                                <div class="image-area-content-top">
                                    <img src="{{asset('media/common/car-new.jpg')}}">
                                </div>
                            </div>
                            <div class="image-area-bottom">
                                <div class="image-area-content-bottom">
                                    <img src="{{asset('media/common/car-new-1.jpg')}}">
                                </div>
                            </div>
                            <div class="experience-area">
                                <div class="experience-area-content">
                                    <div class="experience-wrapper">
                                        <div class="d-flex align-items-center">
                                            <h4>20</h4>
                                            <div class="experience-title">
                                                <span>Years of</span><br>
                                                <span>experience</span>
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
                                <h2 class="sf-title">Dịch Vụ HOT</h2>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <p>Anh Thợ IT cung cấp các dịch vụ sửa chữa thiết bị.</p>
                            </div>
                        </div>
                    </div>
                    <section class="section-content">
                        <div class="owl-carousel service-carousel aon-owl-arrow owl-loaded owl-drag">
                            @foreach($news as $item)
                                <div class="item">
                                    <div class="aon-ow-provider-wrap">
                                        <div class="aon-ow-provider shine-hover">
                                            <div class="aon-ow-top">
                                                <div class="aon-pro-check"><span><i class="fa fa-check"></i></span>
                                                </div>
                                                <div class="aon-pro-favorite"><a href="#"><i
                                                            class="fa fa-heart-o"></i></a>
                                                </div>
                                                <div class="aon-ow-info">
                                                    <h4 class="aon-title"><a href=""> Dịch vụ</a></h4>
                                                    <span>{{$item->name}}</span>
                                                </div>
                                            </div>
                                            <div class="aon-ow-mid">
                                                <div class="aon-ow-media media-bg-animate">
                                                    <a href="javascript:void(0);" class="shine-box"><img src="{{asset('media/posts/medium/'.$item->image)}}" alt=""></a>
                                                </div>
                                                <p>{{$item->summary}}</p>
                                                <div class="aon-ow-pro-rating">
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star text-gray"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="aon-ow-bottom">
                                            <a href="">Xem thêm</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>
            </section>
            <!-- SERVICE END-->

            <!-- PRODUCT START-->
            <section class="aon-recent-post-area">
                <div class="container">
                    <!--Title Section Start-->
                    <div class="section-head">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <span class="aon-sub-title">Sản phẩm</span>
                                <h2 class="sf-title">Dịch vụ mới nhất</h2>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do usmod tempor
                                    incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                    </div>
                    <!--Title Section End-->
                    <div class="section-content">
                        <div class="sf-blog-section-1-wrap">
                            <div class="owl-carousel product-owl-chuck aon-owl-arrow owl-loaded owl-drag">
                                @foreach($products->chunk(2) as $chunk)
                                    <div class="row item">
                                        @foreach($chunk as $item)
                                            <div class="col-12">
                                                <div class="media-bg-animate">
                                                    <div class="sf-jobs-section">
                                                        <div class="sf-jobs-head">
                                                            <a href="" class="sf-jobs-media"><img
                                                                    src="https://demoblutube.themesawesome.com/wp-content/uploads/2021/04/Podcast5-6-535x355.jpg"
                                                                    alt=""></a>
                                                            <span class="sf-jobs-position">Freelance</span>
                                                        </div>
                                                        <div class="sf-jobs-info">
                                                            <div class="sf-job-company">Dịch vụ</div>
                                                            <h4 class="sf-title"><a href="">{{$item->name}}</a></h4>
                                                        </div>
                                                        <div class="sf-jobs-footer">
                                                            <div class="sf-job-location"><i class="fa fa-usd"
                                                                                            aria-hidden="true"></i> {{$item->price_range}}
                                                            </div>
                                                            <div class="sf-jobs-cost"><i class="fa fa-calendar"
                                                                                         aria-hidden="true"></i> Đặt
                                                                lịch
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- PRODUCT END-->

            <section class="box-product-section">
                <div class="container">
                    <!--Title Section Start-->
                    <div class="section-head">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <span class="aon-sub-title">Sản phẩm</span>
                                <h2 class="sf-title">Dịch vụ mới nhất</h2>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do usmod tempor
                                    incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                    </div>
                    <div class="section-content d-flex flex-wrap">
                        <div class="owl-carousel product-owl aon-owl-arrow owl-loaded owl-drag">
                            @foreach($products->chunk(3) as $chunk)
                                <div class="row item">
                                    @foreach($chunk as $item)
                                        <div class="col-12">
                                            <div class="item-product">
                                    <div class="item-logo d-flex flex-wrap">
                                        <div class="d-flex">
                                        <div class="image-left">
                                            @if($item->image!=\App\Admin\Http\Helpers\Common::noImage)
                                            <img decoding="async"
                                                 src="{{asset('media/products/medium/'.$item->image)}}"
                                                 width="52" alt="Logo">
                                            @else
                                                <img decoding="async"
                                                     src="{{asset('media/common/no-image.jpg')}}"
                                                     width="52" alt="Logo">
                                            @endif
                                        </div>
                                        <div class="text-info-right">
                                            <h4>{{$item->name}}</h4>
                                            <div class="d-flex">
                                                <div class="aon-ow-pro-rating">
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star text-gray"></span>
                                                </div>
                                                <span>(</span><span>38</span><span>)</span></span>
                                            </div>
                                        </div>
                                        </div>
                                        <div
                                            class="text-info-bottom d-flex justify-content-between align-items-center mt-3">

                                            <span class="font-xs color-text-mutted icon-location"><i class="fa fa-usd" aria-hidden="true"></i>{{$item->price_range}}</span>

                                            <span class="font-xs color-text-mutted float-end"><i class="fa fa-calendar mx-1" aria-hidden="true"></i>Đặt lịch<span>

                            </span></span></div>
                                    </div>
                                </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>

            <!-- Why Choose us -->
            <section class="aon-why-choose2-area">
                <div class="container">
                    <div class="aon-why-choose2-box">
                        <div class="row">
                            <!-- COLUMNS LEFT -->
                            <div class="col-lg-6 col-md-12">
                                <div class="aon-why-choose-info">
                                    <!--Title Section Start-->
                                    <div class="section-head">
                                        <span class="aon-sub-title">Lựa chọn</span>
                                        <h2 class="aon-title">Lý do khách hàng chọn chúng tôi</h2>
                                        <p> Anh Thợ IT trở thành lựa chọn hàng đầu của khách hàng khi họ cần sửa chữa
                                            máy
                                            tính tận nơi với chất lượng, hiệu suất và sự chuyên nghiệp đáng tin cậy.</p>
                                    </div>
                                    <!--Title Section Start End-->

                                    <ul class="aon-why-choose-steps list-unstyled">
                                        <!-- COLUMNS 1 -->
                                        <li class="d-flex">
                                            <div class="aon-w-choose-left aon-icon-effect">
                                                <div class="aon-w-choose-icon"><i class="aon-icon"><img
                                                            src="{{asset('media/images/whychoose/1.png')}}" alt=""></i>
                                                </div>
                                            </div>
                                            <div class="aon-w-choose-right">
                                                <h4 class="aon-title">Kinh Nghiệm và Chuyên Nghiệp</h4>
                                                <p>Chúng tôi có một đội ngũ được đào tạo chất lượng, có nền tảng vững
                                                    chắc
                                                    về công nghệ và hiểu rõ những khía cạnh phức tạp của máy tính.</p>
                                            </div>
                                        </li>
                                        <!-- COLUMNS 2 -->
                                        <li class="d-flex">
                                            <div class="aon-w-choose-left aon-icon-effect">
                                                <div class="aon-w-choose-icon"><i class="aon-icon"><img
                                                            src="{{asset('media/images/whychoose/2.png')}}" alt=""></i>
                                                </div>
                                            </div>
                                            <div class="aon-w-choose-right">
                                                <h4 class="aon-title">Dịch Vụ Tận Nơi 24/7</h4>
                                                <p>Chúng tôi hiểu rằng máy tính có thể gặp sự cố bất kỳ lúc nào, do đó,
                                                    chúng tôi luôn sẵn sàng đáp ứng mọi yêu cầu sửa chữa và hỗ trợ kỹ
                                                    thuật
                                                    của khách hàng, dù là trong buổi sáng sớm hay đêm khuya.</p>
                                            </div>
                                        </li>
                                        <!-- COLUMNS 3 -->
                                        <li class="d-flex">
                                            <div class="aon-w-choose-left aon-icon-effect">
                                                <div class="aon-w-choose-icon"><i class="aon-icon"><img
                                                            src="{{asset('media/images/whychoose/3.png')}}" alt=""></i>
                                                </div>
                                            </div>
                                            <div class="aon-w-choose-right">
                                                <h4 class="aon-title">Cam Kết Chất Lượng và Hiệu Suất</h4>
                                                <p>Chúng tôi không chỉ tập trung vào việc sửa chữa vấn đề hiện tại, mà
                                                    còn
                                                    đảm bảo rằng máy tính của khách hàng hoạt động mượt mà và ổn định
                                                    trong
                                                    tương lai. </p>
                                            </div>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                            <!-- COLUMNS RIGHT -->
                            <div class="col-lg-6 col-md-12">
                                <div class="aon-why-choose2-line">
                                    <div class="aon-why-choose2-pic"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
            <!-- Why Choose us END -->

            <!-- Pricing Plan -->
            <div class="section-full aon-pricing-area2">
                <div class="container">
                    <!--Title Section Start-->
                    <div class="section-head">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <span class="aon-sub-title">Chi phí</span>
                                <h2 class="sf-title">Phòng IT Thuê Ngoài</h2>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <p>Nếu bạn đang tìm kiếm giải pháp đáng tin cậy để quản lý công nghệ thông tin một cách
                                    hiệu
                                    quả, Dịch Vụ Phòng IT Thuê Ngoài của chúng tôi là lựa chọn hoàn hảo cho mọi doanh
                                    nghiệp.</p>
                            </div>
                        </div>
                    </div>

                    <div class="section-content">
                        <div class="aon-priceing-tb-control">
                            <span>Giá tháng</span>
                            <label class="switch">
                                <input type="checkbox">
                                <span class="slider round"></span>
                            </label>
                            <span>Giá năm</span>
                        </div>
                        <div class="sf-pricing-section-outer">
                            <div class="row no-gutter">
                                <!-- COLUMNS 1 -->
                                <div class="col-md-3">
                                    <div class="sf-pricing-section">

                                        <div class="sf-price-tb-info">
                                            <div class="sf-price-plan-name">Cá nhân</div>
                                            <div class="sf-price-plan-discount">Save 20%</div>
                                        </div>

                                        <div class="sf-price-tb-list">
                                            <ul>
                                                <li><i class="fa fa-check"></i> Booking</li>
                                                <li><i class="fa fa-check"></i> Own Cover Image</li>
                                                <li class="disable"><i class="fa fa-check"></i> Multiple Categories</li>
                                                <li class="disable"><i class="fa fa-check"></i> Apply for Job</li>
                                                <li class="disable"><i class="fa fa-check"></i> Job Alerts</li>
                                                <li class="disable"><i class="fa fa-check"></i> Google Calendar</li>
                                                <li class="disable"><i class="fa fa-check"></i> Crop Profile Image</li>
                                            </ul>
                                        </div>

                                        <div class="sf-price-tb-plan">
                                            <div class="sf-price-plan-cost"><span>100.000đ</span>/tháng</div>
                                        </div>
                                        <a href="contact-us.html" class="sf-choose-plan-btn">Đăng ký tư vấn</a>
                                    </div>
                                </div>
                                <!-- COLUMNS 2 -->
                                <div class="col-md-3">
                                    <div class="sf-pricing-section">

                                        <div class="sf-price-tb-info">
                                            <div class="sf-price-plan-name">Cơ Bản</div>
                                            <div class="sf-price-plan-discount">Save 20%</div>
                                        </div>

                                        <div class="sf-price-tb-list">
                                            <ul>
                                                <li><i class="fa fa-check"></i> Booking</li>
                                                <li><i class="fa fa-check"></i> Own Cover Image</li>
                                                <li><i class="fa fa-check"></i> Multiple Categories</li>
                                                <li><i class="fa fa-check"></i> Apply for Job</li>
                                                <li><i class="fa fa-check"></i> Job Alerts</li>
                                                <li class="disable"><i class="fa fa-check"></i> Google Calendar</li>
                                                <li class="disable"><i class="fa fa-check"></i> Crop Profile Image</li>
                                            </ul>
                                        </div>

                                        <div class="sf-price-tb-plan">
                                            <div class="sf-price-plan-cost"><span>200.000đ</span>/tháng</div>
                                        </div>
                                        <a href="#" class="sf-choose-plan-btn">Đăng ký tư vấn</a>
                                    </div>
                                </div>
                                <!-- COLUMNS 3 -->
                                <div class="col-md-3">
                                    <div class="sf-pricing-section sf-pricing-active">

                                        <div class="sf-price-tb-info">
                                            <div class="sf-price-plan-name">Chuyên Nghiệp</div>
                                            <div class="sf-price-plan-discount">Save 20%</div>
                                        </div>

                                        <div class="sf-price-tb-list">
                                            <ul>
                                                <li><i class="fa fa-check"></i> Booking</li>
                                                <li><i class="fa fa-check"></i> Own Cover Image</li>
                                                <li><i class="fa fa-check"></i> Multiple Categories</li>
                                                <li><i class="fa fa-check"></i> Apply for Job</li>
                                                <li><i class="fa fa-check"></i> Job Alerts</li>
                                                <li><i class="fa fa-check"></i> Google Calendar</li>
                                                <li><i class="fa fa-check"></i> Crop Profile Image</li>
                                            </ul>
                                        </div>

                                        <div class="sf-price-tb-plan">
                                            <div class="sf-price-plan-cost"><span>300.000đ</span>/tháng</div>
                                        </div>
                                        <a href="contact-us.html" class="sf-choose-plan-btn">Đăng ký tư vấn</a>
                                    </div>
                                </div>
                                <!-- COLUMNS 4 -->
                                <div class="col-md-3">
                                    <div class="sf-pricing-section">

                                        <div class="sf-price-tb-info">
                                            <div class="sf-price-plan-name">Cao Cấp</div>
                                            <div class="sf-price-plan-discount">Save 20%</div>
                                        </div>

                                        <div class="sf-price-tb-list">
                                            <ul>
                                                <li><i class="fa fa-check"></i> Booking</li>
                                                <li><i class="fa fa-check"></i> Own Cover Image</li>
                                                <li><i class="fa fa-check"></i> Multiple Categories</li>
                                                <li><i class="fa fa-check"></i> Apply for Job</li>
                                                <li><i class="fa fa-check"></i> Job Alerts</li>
                                                <li><i class="fa fa-check"></i> Google Calendar</li>
                                                <li><i class="fa fa-check"></i> Crop Profile Image</li>
                                            </ul>
                                        </div>

                                        <div class="sf-price-tb-plan">
                                            <div class="sf-price-plan-cost"><span>500.000đ</span>/tháng</div>
                                        </div>
                                        <a href="contact-us.html" class="sf-choose-plan-btn">Đăng ký tư vấn</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Pricing Plan END -->

            <!-- CLIENT SAY -->
            <section>
                <div class="testimonial-section">
                    <div class="container">
                        <div class="testimonial-background aon-statics-area2-section">
                            <!-- Sec Title -->
                            <div class="sec-title light">
                                <div class="section-head">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <span class="aon-sub-title">Chi phí</span>
                                            <h2 class="sf-title">Phòng IT Thuê Ngoài</h2>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <p>Nếu bạn đang tìm kiếm giải pháp đáng tin cậy để quản lý công nghệ thông
                                                tin một cách
                                                hiệu
                                                quả, Dịch Vụ Phòng IT Thuê Ngoài của chúng tôi là lựa chọn hoàn hảo cho
                                                mọi doanh
                                                nghiệp.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-carousel owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                                <div class="testimonial-block">
                                    <div class="inner-box center aon-test2-item">
                                        <div class="quote-icon flaticon-quote-4"></div>
                                        <div class="rating">
                                            <span class="fa fa-star"></span><span class="fa fa-star"></span><span
                                                class="fa fa-star"></span><span class="fa fa-star-o"></span><span
                                                class="fa fa-star-o"></span></div>
                                        <div class="text">“Makin their way the only way they know how that’s just a
                                            little
                                            bit
                                            more than the law will allow these happy days are you. leads a rag tag
                                            fugitive
                                            fleet on a lonely”
                                        </div>
                                        <h6>Malika Morla</h6>
                                        <div class="author-image aon-test2-pic">
                                            <img width="100" height="100"
                                                 src="https://wp1.yogsthemes.com/wp/manzil/wp-content/uploads/2020/07/author-1-100x100.jpg"
                                                 class="attachment-manzil_100x100 size-manzil_100x100 wp-post-image"
                                                 decoding="async"></div>
                                    </div>
                                </div>
                                <div class="testimonial-block">
                                    <div class="inner-box center aon-test2-item">
                                        <div class="quote-icon flaticon-quote-4"></div>
                                        <div class="rating">
                                            <span class="fa fa-star"></span><span class="fa fa-star"></span><span
                                                class="fa fa-star"></span><span class="fa fa-star-o"></span><span
                                                class="fa fa-star-o"></span></div>
                                        <div class="text">“Makin their way the only way they know how that’s just a
                                            little
                                            bit
                                            more than the law will allow these happy days are you. leads a rag tag
                                            fugitive
                                            fleet on a lonely”
                                        </div>
                                        <h6>Malika Morla</h6>
                                        <div class="author-image aon-test2-pic">
                                            <img width="100" height="100"
                                                 src="https://wp1.yogsthemes.com/wp/manzil/wp-content/uploads/2020/07/author-1-100x100.jpg"
                                                 class="attachment-manzil_100x100 size-manzil_100x100 wp-post-image"
                                                 decoding="async"></div>
                                    </div>
                                </div>
                                <div class="testimonial-block">
                                    <div class="inner-box center aon-test2-item">
                                        <div class="quote-icon flaticon-quote-4"></div>
                                        <div class="rating">
                                            <span class="fa fa-star"></span><span class="fa fa-star"></span><span
                                                class="fa fa-star"></span><span class="fa fa-star-o"></span><span
                                                class="fa fa-star-o"></span></div>
                                        <div class="text">“Makin their way the only way they know how that’s just a
                                            little
                                            bit
                                            more than the law will allow these happy days are you. leads a rag tag
                                            fugitive
                                            fleet on a lonely”
                                        </div>
                                        <h6>Malika Morla</h6>
                                        <div class="author-image aon-test2-pic">
                                            <img width="100" height="100"
                                                 src="https://wp1.yogsthemes.com/wp/manzil/wp-content/uploads/2020/07/author-1-100x100.jpg"
                                                 class="attachment-manzil_100x100 size-manzil_100x100 wp-post-image"
                                                 decoding="async"></div>
                                    </div>
                                </div>
                                <div class="testimonial-block">
                                    <div class="inner-box center aon-test2-item">
                                        <div class="quote-icon flaticon-quote-4"></div>
                                        <div class="rating">
                                            <span class="fa fa-star"></span><span class="fa fa-star"></span><span
                                                class="fa fa-star"></span><span class="fa fa-star-o"></span><span
                                                class="fa fa-star-o"></span></div>
                                        <div class="text">“Makin their way the only way they know how that’s just a
                                            little
                                            bit
                                            more than the law will allow these happy days are you. leads a rag tag
                                            fugitive
                                            fleet on a lonely”
                                        </div>
                                        <h6>Malika Morla</h6>
                                        <div class="author-image aon-test2-pic">
                                            <img width="100" height="100"
                                                 src="https://wp1.yogsthemes.com/wp/manzil/wp-content/uploads/2020/07/author-1-100x100.jpg"
                                                 class="attachment-manzil_100x100 size-manzil_100x100 wp-post-image"
                                                 decoding="async"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END CLIENT SAY -->

            <!-- BRAND -->
            <section class="section-brand">
                <div class="container">
                    <div class="section-head">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <span class="aon-sub-title">Chi phí</span>
                                <h2 class="sf-title">Phòng IT Thuê Ngoài</h2>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <p>Nếu bạn đang tìm kiếm giải pháp đáng tin cậy để quản lý công nghệ thông tin một cách
                                    hiệu
                                    quả, Dịch Vụ Phòng IT Thuê Ngoài của chúng tôi là lựa chọn hoàn hảo cho mọi doanh
                                    nghiệp.</p>
                            </div>
                        </div>
                    </div>
                    <div class="section-content">
                        <div class="owl-carousel brand-owl aon-owl-arrow owl-loaded owl-drag">
                            <div class="item mb-4">
                                <div class="col-12 mb-5 media-bg-animate p-0">
                                    <div class="d-flex">
                                        <img
                                            src="https://mstarcorp.vn/wp-content/uploads/elementor/thumbs/Logo-VNPay-qb3q47qk1xxozwsde0wc49x81k1hzi67lld3i3e7ow.png">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex media-bg-animate p-0">
                                        <img
                                            src="https://mstarcorp.vn/wp-content/uploads/elementor/thumbs/Logo-VNPay-qb3q47qk1xxozwsde0wc49x81k1hzi67lld3i3e7ow.png">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- BRAND END -->

            <!-- IMAGE -->
            <section class="gallery-section">
                <div class="container">
                    <!-- Sec Title -->
                    <div class="section-head">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <span class="aon-sub-title">Giải pháp</span>
                                <h2 class="sf-title">Giải pháp công nghệ</h2>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <p>Chúng tôi cung cấp dịch vụ hoàn hảo cho mọi doanh nghiệp.</p>
                            </div>
                        </div>
                    </div>
                    <!--MixitUp Galery-->
                    <div class="mixitup-gallery">

                        <!--Filter-->
                        <div class="filters clearfix">
                            <ul class="filter-tabs filter-btns text-center clearfix">
                                <li class="filter" data-role="button" data-filter="all">All Cases</li>
                                <li class="filter" data-role="button" data-filter=".houses">Houses</li>
                                <li class="filter" data-role="button" data-filter=".interiors">Interiors</li>
                                <li class="filter" data-role="button" data-filter=".our-project">Our Project</li>
                                <li class="filter" data-role="button" data-filter=".modern-bridge">Modern Bridge</li>
                            </ul>

                        </div>

                        <div class="filter-list row clearfix" id="MixItUpImage">
                            <!-- Gallery Block -->
                            <div class="gallery-block mix all houses interiors  col-lg-3 col-md-4 col-sm-12">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img decoding="async" fetchpriority="high" width="370" height="370"
                                             src="https://wp1.yogsthemes.com/wp/manzil/wp-content/uploads/2020/07/10a-370x370.jpg"
                                             class="attachment-manzil_370x370 size-manzil_370x370 wp-post-image" alt="">
                                        <!-- Overlay Box -->
                                        <div class="overlay-box">
                                            <div class="overlay-inner">
                                                <div class="content">
                                                    <h6><a href="">Construction Build</a></h6>
                                                    <div class="category">Houses, Interiors</div>
                                                </div>
                                            </div>
                                        </div>
                                    </figure>
                                </div>
                            </div>

                            <!-- Gallery Block -->
                            <div class="gallery-block mix all houses interiors  col-lg-3 col-md-4 col-sm-12">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img decoding="async" width="370" height="370"
                                             src="https://wp1.yogsthemes.com/wp/manzil/wp-content/uploads/2020/07/9a-370x370.jpg"
                                             class="attachment-manzil_370x370 size-manzil_370x370 wp-post-image" alt="">
                                        <!-- Overlay Box -->
                                        <div class="overlay-box">
                                            <div class="overlay-inner">
                                                <div class="content">
                                                    <h6><a href="">Construction Build</a></h6>
                                                    <div class="category">Houses, Interiors</div>
                                                </div>
                                            </div>
                                        </div>
                                    </figure>
                                </div>
                            </div>

                            <!-- Gallery Block -->
                            <div class="gallery-block mix all our-project  col-lg-3 col-md-4 col-sm-12">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img decoding="async" width="370" height="370"
                                             src="https://wp1.yogsthemes.com/wp/manzil/wp-content/uploads/2020/07/project-1-370x370.jpg"
                                             class="attachment-manzil_370x370 size-manzil_370x370 wp-post-image" alt="">
                                        <!-- Overlay Box -->
                                        <div class="overlay-box">
                                            <div class="overlay-inner">
                                                <div class="content">
                                                    <h6><a href="">Skeptic Cambridge</a></h6>
                                                    <div class="category">Our Project</div>
                                                </div>
                                            </div>
                                        </div>
                                    </figure>
                                </div>
                            </div>

                            <!-- Gallery Block -->
                            <div class="gallery-block mix all our-project  col-lg-3 col-md-4 col-sm-12">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img decoding="async" width="370" height="370"
                                             src="https://wp1.yogsthemes.com/wp/manzil/wp-content/uploads/2020/07/project-1-370x370.jpg"
                                             class="attachment-manzil_370x370 size-manzil_370x370 wp-post-image" alt="">
                                        <!-- Overlay Box -->
                                        <div class="overlay-box">
                                            <div class="overlay-inner">
                                                <div class="content">
                                                    <h6><a href="">Skeptic Cambridge</a></h6>
                                                    <div class="category">Our Project</div>
                                                </div>
                                            </div>
                                        </div>
                                    </figure>
                                </div>
                            </div>

                            <!-- Gallery Block -->
                            <div class="gallery-block mix all our-project  col-lg-3 col-md-4 col-sm-12">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img decoding="async" width="370" height="370"
                                             src="https://wp1.yogsthemes.com/wp/manzil/wp-content/uploads/2020/07/project-1-370x370.jpg"
                                             class="attachment-manzil_370x370 size-manzil_370x370 wp-post-image" alt="">
                                        <!-- Overlay Box -->
                                        <div class="overlay-box">
                                            <div class="overlay-inner">
                                                <div class="content">
                                                    <h6><a href="">Skeptic Cambridge</a></h6>
                                                    <div class="category">Our Project</div>
                                                </div>
                                            </div>
                                        </div>
                                    </figure>
                                </div>
                            </div>

                            <!-- Gallery Block -->
                            <div class="gallery-block mix all interiors modern-bridge  col-lg-3 col-md-4 col-sm-12">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img decoding="async" loading="lazy" width="370" height="370"
                                             src="https://wp1.yogsthemes.com/wp/manzil/wp-content/uploads/2020/07/8a-370x370.jpg"
                                             class="attachment-manzil_370x370 size-manzil_370x370 wp-post-image" alt="">
                                        <!-- Overlay Box -->
                                        <div class="overlay-box">
                                            <div class="overlay-inner">
                                                <div class="content">
                                                    <h6><a href="">Construction Build</a></h6>
                                                    <div class="category">Interiors, Modern Bridge</div>
                                                </div>
                                            </div>
                                        </div>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="rv-more-btn">Xem thêm</a>
                </div>
            </section>
            <!-- END IMAGE -->

            <!-- VIDEO -->
            <section class="box-video">
                <div class="container">
                    <div class="section-head">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <span class="aon-sub-title">Video</span>
                                <h2 class="sf-title">Phòng IT Thuê Ngoài</h2>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <p>Nếu bạn đang tìm kiếm giải pháp đáng tin cậy để quản lý công nghệ thông tin một cách
                                    hiệu
                                    quả, Dịch Vụ Phòng IT Thuê Ngoài của chúng tôi là lựa chọn hoàn hảo cho mọi doanh
                                    nghiệp.</p>
                            </div>
                        </div>
                    </div>
                    <div class="section-content">
                        <div class="owl-carousel aon-featurd-provider-carousel aon-owl-arrow owl-loaded owl-drag">
                            <div class="item d-flex flex-wrap">
                                <div class="col-12 mb-4 mt-1 aon-video-style media-bg-animate mba-bdr-20 p-0">
                                    <div class="video-item">
                                        <div class="video-thumb">
                                            <a>
                                                <img
                                                    src="https://demoblutube.themesawesome.com/wp-content/uploads/2021/04/Podcast5-6-535x355.jpg">
                                                <div class="play-button-hover">
                                                    <i class="fa fa-play" aria-hidden="true"></i>
                                                </div>
                                                <div class="overlay-video"></div>
                                            </a>
                                        </div>
                                        <div class="post-meta1">
                                            <ul>
                                                <li class="post-author"><i class="feather-user"></i>By
                                                    <a href="#" title="Posts by admin" rel="author">Nina Brown</a>
                                                </li>
                                                <li class="post-view"><span><i class="feather-eye"></i>85 Views</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <h4 class="video-title">
                                            <a>Tên video</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END VIDEO -->

            <!-- Latest Blog -->
            <div class="section-full aon-latest-blog-area2">
                <div class="container">
                    <!--Title Section Start-->
                    <div class="section-head">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <span class="aon-sub-title">Tin Tức</span>
                                <h2 class="sf-title">Tin mới nhất</h2>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <p>Hãy cùng Anh Thợ IT cập nhật các tin tức mới nhất về công nghệ và các lỗi thường gặp
                                    của
                                    thiết bị máy tính văn phòng.</p>
                            </div>
                        </div>
                    </div>

                    <div class="section-content">
                        <div class="aon-l-blog-area2-section">
                            <div class="owl-carousel aon-featurd-provider-carousel aon-owl-arrow owl-loaded owl-drag">
                            @foreach($news as $item)
                                <!-- COLUMNS 1 -->
                                    <div class="shine-hover">
                                        <div class="aon-blog-style-1 media-bg-animate mba-bdr-20">
                                            <div class="post-bx">
                                                <!-- Content section for blogs start -->
                                                <div class="post-thum shine-box">
                                                    @if($item->image != \App\Admin\Models\Post::noImage)
                                                        <img src="{{asset('media/posts/medium/'.$item->image)}}" alt="">
                                                    @else
                                                        <img src="{{asset('media/common/no-image.jpg')}}" alt="">
                                                    @endif
                                                </div>
                                                <div class="post-info">
                                                    <div class="post-categories">@if($item->CategoryPosts->count() >0 )
                                                            <a
                                                                href="{{route('redirect',['slug' => $item->CategoryPosts->first()->slug])}}">{{$item->CategoryPosts->first()->name}}</a>@endif
                                                    </div>
                                                    <div class="post-meta">
                                                        <ul>
                                                            <li class="post-date">
                                                                <span>{{date('d-m-y',$item->pulished_at)}}</span></li>
                                                            <li class="post-author">Đăng bởi
                                                                <a href="javascript:void(0);"
                                                                   title="{{$item->User->name}}"
                                                                   rel="author">{{$item->User->name}}</a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="post-text">
                                                        <h4 class="post-title">
                                                            <a href="{{route('redirect',['slug' => $item->slug])}}">{{$item->name}}</a>
                                                        </h4>
                                                    </div>
                                                    <div class="aon-post-text">
                                                        <p>{{$item->summary}}</p>
                                                    </div>
                                                </div>
                                                <!-- Content section for blogs end -->
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Latest Blog END -->

        </div>
        <!-- CONTENT END -->

        <!-- FOOTER START -->
    @include('web.layouts.footer')
    <!-- FOOTER END -->
    </div>
@endsection
