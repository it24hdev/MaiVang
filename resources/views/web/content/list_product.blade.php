@extends('web.layouts.base')
@section('title')
    <title>Sản phẩm - Dịch vụ</title>
@endsection
@section('body')
    <div class="page-wraper">
        @include('web.layouts.header')
        <!-- Content -->
        <div class="page-content">

            <!-- Banner Area -->
            <div class="aon-page-benner-area">
                <div class="aon-page-banner-row"
                     style="background-image: url({{asset('media/common/job-banner.jpg')}})">
                    <div class="sf-overlay-main" style="opacity:0.8; background-color:#022279;"></div>
                    <div class="sf-banner-heading-wrap">
                        <div class="sf-banner-heading-area">
                            <div class="sf-banner-heading-large">Sản phẩm</div>
                            <div class="sf-banner-breadcrumbs-nav">
                                <ul class="list-inline">
                                    <li><a href="{{route('home')}}">Trang chủ</a></li>
                                    <li class="active"><a href="{{route('list_product')}}">Sản phẩm</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Banner Area End -->

            <!-- Left & right section -->
            <div class="aon-page-jobs-wrap">
                <div class="container">
                    <div class="d-flex flex-wrap">
                        <!-- Side bar start -->
                        <div class="col-lg-4 col-md-12 px-0 d-none d-lg-block">
                            <aside class="side-bar sf-rounded-sidebar">
                                <!--Category-->
                                <div class="sf-job-sidebar-blocks widget_services ">
                                    <h4 class="sf-title">Danh mục</h4>
                                    <ul>
                                        @foreach($category as $item)
                                            <li class="{{$thisCategory && $thisCategory->slug == $item->slug?'active':''}}">
                                                <a href="{{route('redirect',$item->slug)}}">{{$item->name}}</a>
                                                <span class="badge">({{$item->Products ? $item->Products->count():0}})</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </aside>
                        </div>
                        <!-- Side bar END -->

                        <!-- Right part start -->
                        <div class="col-lg-8 col-md-12 px-0">
                            <!--Showing results topbar Start-->
                            <div class="aon-search-result-top flex-wrap d-flex justify-content-between">
                                <div class="aon-search-result-title">
                                    <h5><span>({{$products->total()}})</span>Sản phẩm</h5>
                                </div>
                                <div class="aon-search-result-option">
                                    <form method="get" enctype="multipart/form-data" action="{{route('list_product')}}">
                                        <ul class="aon-search-sortby">
                                            <li>
                                                <input name="search" type="search" placeholder="Tìm kiếm.." value="{{request()->input('search')}}" class="form-control" autocomplete="off">
                                            </li>
                                            <li class="aon-select-sort-by">
                                                <select class="sf-select-box form-control sf-form-control">
                                                    <option class="bs-title-option" value="">Sắp xếp</option>
                                                    <option class="bs-title-option" value="gia-tang-dan">Giá tăng dần</option>
                                                    <option class="bs-title-option" value="gia-giam-dan">Giá giảm dần</option>
                                                </select>
                                            </li>
                                        </ul>
                                    </form>
                                </div>
                                <!--Showing results topbar End-->
                            </div>

                            <ul class="job_listings job_listings-two">
                            @foreach($products as $item)
                                <!-- COLUMNS 1 -->
                                    <li class="job_listing type-job_listing job-type-hourly">
                                        <a class="job-clickable-box"
                                           href="{{route('redirect', $item->slug)}}"></a>
                                        <div class="job-comapny-logo">
                                            <img class="company_logo" src="{{asset('media/products/small/'.$item->image)}}" width="auto" height="auto" alt="{{$item->name}}">
                                        </div>
                                        <div class="job-comapny-info">
                                            <div class="position">
                                                <h3>{{$item->name}}</h3>
                                                <div class="company"><strong>{{$item->model}}</strong></div>
                                            </div>

                                            <ul class="meta">
                                                <li class="job-type hourly">
                                                    <i class="fa fa-circle"></i>{{$item->CategoryProducts ? $item->CategoryProducts->first()->name:''}}
                                                </li>
                                                <li class="date">
                                                    <span>{{$item->warranty}}</span>
                                                </li>
                                            </ul>
                                            <div class="job-amount"><i class="fa fa-money"></i>
                                                <span>{{$item->price_range}}</span></div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>

                            <!-- Pagination Start-->
                        {!! $products->links('web.layouts.pagination') !!}
                        <!-- Pagination End-->

                        </div>
                        <!-- Right part END -->
                    </div>
                </div>
            </div>
            <!-- Left & right section  END -->
        </div>
        <!-- Content END-->

        <!-- FOOTER START -->
        @include('web.layouts.footer')
        <!-- FOOTER END -->
    </div>
@endsection
