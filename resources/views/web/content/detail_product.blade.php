@extends('web.layouts.base')
@section('title')
    <title>{{$product->ProductDetail->meta_title ?? $product->name}}</title>
    <meta name="keyword" content="{{$product->ProductDetail->meta_keyword ?? $product->name}}">
    <meta name="description" content="{{$product->ProductDetail->meta_description ?? $product->name}}">
@endsection
@section('body')
    <div class="page-wraper">
    @include('web.layouts.header')

    <!-- Content -->
        <div class="page-content bg-white">

            <div class="sf-job-benner sf-overlay-wrapper">
                <div class="banner-job-row">
                    <div class="sf-overlay-main" style="opacity:0;"></div>
                    <div class="sf-banner-job-heading-wrap">
                        <div class="sf-banner-job-heading-area">
                            <div class="sf-banner-job-logo-pic">
                                <img src="{{asset('media/products/medium/'.$product->image)}}" alt="{{$product->name}}" width="auto" height="auto">
                            </div>
                            <div class="sf-banner-job-heading-large">{{$product->name}}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section-content ">
                <!-- Left & right section start -->
                <div class="container">
                    <!--Job Information Start-->
                    <div class="sf-job-details-fileds sf-job-details-fileds-two">
                        <ul class="job-listing-meta meta">
                            <li class="location">
                                <span class="job-meta-icon"><img src="{{asset('media/common/location.png')}}" alt="Địa chỉ" width="auto" height="auto"></span>
                                <div class="sf-job-meta-info">
                                    <h5 class="job-meta-title">Địa chỉ:</h5>
                                    <span class="job-meta-text">
                                        <a class="google_map_link"  href="http://maps.google.com/" target="_blank">Hải Phòng</a>
                                    </span>
                                </div>
                            </li>
                            <li>
                                <span class="job-meta-icon"><img src="{{asset('media/common/cash.png')}}" alt="Giá tiền" width="auto" height="auto"></span>
                                <div class="sf-job-meta-info">
                                    <h5 class="job-meta-title">Giá:</h5>
                                    <span class="job-meta-text text-red">{{$product->price_range}}</span>
                                </div>
                            </li>
                            <li class="job-type hourly">
                                <span class="job-meta-icon"><img src="{{asset('media/common/brifcase.png')}}" alt="Loại sản phẩm" width="auto" height="auto"></span>
                                <div class="sf-job-meta-info">
                                    <h5 class="job-meta-title">Loại sản phẩm:</h5>
                                    <span class="job-meta-text">Dịch vụ</span>
                                </div>
                            </li>
                            <li class="location">
                                <span class="job-meta-icon"><img src="{{asset('media/common/tag.png')}}" alt="tag" width="auto" height="auto"></span>
                                <div class="sf-job-meta-info">
                                    <h5 class="job-meta-title">Danh mục:</h5>
                                    <span
                                        class="job-meta-text">{{ $product->CategoryProducts()->pluck('name')->implode(', ')}}</span>
                                </div>
                            </li>
                            <li>
                                <span class="job-meta-icon"><img src="{{asset('media/common/clock.png')}}"></span>
                                <div class="sf-job-meta-info">
                                    <h5 class="job-meta-title">Khuyến mại:</h5>
                                    <span class="job-meta-text"></span>
                                </div>
                            </li>
                            <li class="date-posted">
                                <span class="job-meta-icon"><img src="{{asset('media/common/user.png')}}"></span>
                                <div class="sf-job-meta-info">
                                    <h5 class="job-meta-title">Bảo hành:</h5>
                                    <span class="job-meta-text">{{$product->warranty}}</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!--Job Information End-->
                    <div class="d-flex flex-wrap">
                        <!-- Left part start -->
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <!--Job Description Start-->
                            <div class="container">
                                @if($product->ProductDetail)
                                    {!! $product->ProductDetail->description !!}
                                @endif
                            </div>
                            <div class="aon-job-gallery">
                                <h3 class="m-b30">Ảnh</h3>
                                <ul class="job-gallery clearfix mfp-gallery">
                                    <li>
                                        <div class="job-gallery-pic"
                                             style="background-image:url({{asset('media/products/'.$product->image)}}); background-repeat: no-repeat; background-size: cover;">
                                            <a href="{{asset('media/products/'.$product->image)}}"
                                               class="mfp-link job-gallery-link"></a>
                                        </div>
                                    </li>
                                    @if($product->ProductAlbum->count()>3)
                                        @foreach($product->ProductAlbum as $key => $item)
                                            @if($key<2)
                                                <li>
                                                    <div class="job-gallery-pic"
                                                         style="background-image:url({{asset('media/products/'.$item->name)}}); background-repeat: no-repeat; background-size: cover;">
                                                        <a href="{{asset('media/products/'.$item->name)}}"
                                                           class="mfp-link job-gallery-link"></a>
                                                    </div>
                                                </li>
                                            @endif
                                            @if($key==3)
                                                <li>
                                                    <div class="job-gallery-pic"
                                                         style="background-image:url({{asset('media/products/'.$item->name)}}); background-repeat: no-repeat; background-size: cover;">
                                                        <a href="javascript:void(0);"
                                                           class="job-gallery-link">{{$product->ProductAlbum->count()-3}}
                                                            +</a>
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach
                                    @else
                                        @foreach($product->ProductAlbum as $key => $item)
                                            <li>
                                                <div class="job-gallery-pic"
                                                     style="background-image:url({{asset('media/products/'.$item->name)}}); background-repeat: no-repeat; background-size: cover;">
                                                    <a href="{{asset('media/products/'.$item->name)}}"
                                                       class="mfp-link job-gallery-link"></a>
                                                </div>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                            <!--Job Description End-->
                        </div>
                        <!-- Left part END -->

                        <!-- Side bar start -->
                        <div class="col-lg-4 col-md-12 d-none d-lg-block">
                            <aside class="sf-jobdetail-sidebar">
                                <div class="sf-jobdetail-blocks">
                                    <a class="sf-btn-large2" href="#">Đặt ngay <i class="fa fa-send"></i></a>
                                </div>
                                <!--Share this post-->
                                <div class="sf-jobdetail-blocks">
                                    <h4 class="sf-title">Chia sẻ</h4>
                                    <ul class="sf-con-social">
                                        <li><a href="javascript:void(0);" class="sf-fb"><img
                                                    src="{{asset('media/common/facebook.png')}}">Facebook</a>
                                        </li>
                                        <li><a href="javascript:void(0);" class="sf-twitter"><img
                                                    src="{{asset('media/common/twitter.png')}}">Twitter</a>
                                        </li>
                                        <li><a href="javascript:void(0);" class="sf-pinterest"><img
                                                    src="{{asset('media/common/pinterest.png')}}">Pinterest</a>
                                        </li>
                                    </ul>
                                </div>
                                <!--Job Post-->
                                <div class="sf-jobdetail-blocks">
                                    <div class="sf-related-jobs">
                                        <div class="sf-related-job-pic">
                                            <img src="{{asset('media/products/'.$product->image)}}" alt="">
                                        </div>
                                        <div class="sf-related-job-location">
                                            <i class="feather-map-pin"></i> Hải Phòng
                                        </div>
                                        <div class="sf-related-job-name"> ANH THỢ IT <span class="feather-check"></span>
                                        </div>
                                        <div class="sf-related-job-rating">
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star text-gray"></span>
                                            <span class="sf-rating-lable"> 5 Đánh giá </span>
                                        </div>
                                    </div>
                                </div>
                                <!--Location-->
                                <div class="sf-jobdetail-blocks">
                                    <h4 class="sf-title">Địa chỉ</h4>
                                    <a class="sf-btn-large2" href="#">Chỉ đường <i class="feather-map-pin"></i></a>
                                </div>
                                <!--Related Jobs-->
                                <div class="sf-jobdetail-blocks">
                                    <h4 class="sf-title">Sản phẩm liên quan</h4>
                                    <div
                                        class="owl-carousel sf-jobrelated-carousel aon-jobrelated-carousel aon-owl-arrow">
                                    @foreach($recentProducts as $item)
                                        <!-- COLUMNS 1 -->
                                            <div class="item">
                                                <div class="sf-jobs-section">
                                                    <div class="sf-jobs-head">
                                                        <a href="{{route('redirect',$item->slug)}}" class="sf-jobs-media">
                                                            @if($item->image!= 'no-image.jpg')
                                                                <img src="{{asset('media/products/'.$item->image)}}">
                                                            @else
                                                                <img src="{{asset('media/common/no-image.jpg')}}">
                                                            @endif
                                                        </a>
                                                        @if($item->CategoryProducts) <span
                                                            class="sf-jobs-position">{{$item->CategoryProducts->pluck('name')->first()}}</span> @endif
                                                    </div>
                                                    <div class="sf-jobs-info">
                                                        <div class="sf-job-company">{{$item->model}}</div>
                                                        <h4 class="sf-title"><a
                                                                href="{{route('redirect',$item->slug)}}">{{$item->name}}</a></h4>
                                                        @if($item->ProductDetail)
                                                            {!! $item->ProductDetail->meta_title !!}
                                                        @endif
                                                    </div>
                                                    <div class="sf-jobs-footer">
                                                        <div class="sf-job-location"><i class="fa fa-map-marker"></i>Hải
                                                            Phòng
                                                        </div>
                                                        <div class="sf-jobs-cost">
                                                            <i class="fa fa-usd" aria-hidden="true"></i>
                                                            <span>{{$item->price_range}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </aside>
                        </div>
                        <!-- Side bar END -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Content END-->
        @include('web.layouts.footer')

    </div>
@endsection
