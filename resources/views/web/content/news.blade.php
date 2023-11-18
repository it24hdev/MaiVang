@extends('web.layouts.base')
@section('title')
    <title>Tin Tức</title>
@endsection
@section('body')
    <!-- LOADING AREA  END ====== -->
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
                    <div class="sf-banner-heading-large">Tin Tức</div>
                    <div class="sf-banner-breadcrumbs-nav">
                        <ul class="list-inline">
                            <li><a href="{{route('home')}}"> Trang chủ </a></li>
                            <li>Tin tức</li>
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
                <!-- Left part start -->
                <div class="col-lg-8 col-md-12 px-0">
                    <div class="d-flex flex-wrap">
                    @if($posts)
                        @foreach($posts as $item)
                            <!-- COLUMNS 1 -->
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="aon-blog-style-1">
                                        <div class="post-bx">
                                            <!-- Content section for blogs start -->
                                            <div class="post-thum">
                                                @if($item->image != \App\Admin\Http\Helpers\Common::noImage)
                                                    <img src="{{asset('media/posts/medium/'.$item->image)}}" alt="{{$item->name}}" width="auto" height="auto">
                                                @else
                                                    <img src="{{asset('media/common/'.\App\Admin\Http\Helpers\Common::noImage)}}" alt="{{$item->name}}" width="auto" height="auto" style="opacity: 0">
                                                @endif
                                            </div>
                                            <div class="post-info">
                                                <div class="post-categories">
                                                    @if($item->CategoryPosts->count() >0)
                                                        <a href="{{route('redirect',$item->CategoryPosts->first()->slug)}}">{{$item->CategoryPosts->first()->name}}</a>
                                                    @else
                                                        <a href="javascript:void(0);">Tin tức</a>
                                                    @endif
                                                </div>
                                                <div class="post-meta">
                                                    <ul>
                                                        <li class="post-date"><span>{{date('d-m-y',$item->pulished_at)}}</span></li>
                                                        <li class="post-author"><a href="javascript:void(0);" rel="author">{{$item->User ? $item->User->name:''}}</a></li>
                                                    </ul>
                                                </div>

                                                <div class="post-text">
                                                    <h4 class="post-title">
                                                        <a href="{{route('redirect',$item->slug)}}">{{$item->name}}</a>
                                                    </h4>
                                                </div>
                                            </div>
                                            <!-- Content section for blogs end -->
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        {!! $posts->links('web.layouts.pagination') !!}
                    </div>
                    <!-- Left part END -->
                </div>
                <div class="col-lg-4 col-md-12 px-0 d-none d-lg-block">
                    <aside class="side-bar ">
                        <!-- SEARCH -->
                        <div class="widget rounded-sidebar-widget">
                            <div class="widget_search_bx">
                                <div class="text-left m-b30">
                                    <h3 class="widget-title">Tìm kiếm</h3>
                                </div>
                                <form role="search" method="get">
                                    <div class="input-group">
                                        <input name="search" value="{{request()->input('search')}}" type="search"
                                               class="form-control" placeholder="Nhập nội dung..">
                                        <span class="input-group-btn"><button type="submit" class="btn"><i
                                                    class="fa fa-search"></i></button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Social -->
                        <div class="widget rounded-sidebar-widget">
                            <div class="text-left m-b30">
                                <h3 class="widget-title">Theo dõi chúng tôi</h3>
                            </div>
                            <div class="widget_social_inks">
                                <ul class="social-icons social-square social-darkest social-md">
                                    <li>
                                        <a href="javascript:void(0);" class="fb-1">
                                            <img src="{{asset('media/common/fb-1.png')}}" alt="facebook" width="auto" height="auto">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="tw-1">
                                            <img src="{{asset('media/common/tw-1.png')}}" alt="twitter" width="auto" height="auto">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="pint-1">
                                            <img src="{{asset('media/common/pint-1.png')}}" alt="pinterest" width="auto" height="auto">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="in-1">
                                            <img src="{{asset('media/common/in-1.png')}}" alt="in" width="auto" height="auto">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- CATEGORY -->
                        <div class="widget widget_services rounded-sidebar-widget">
                            <div class="text-left m-b30">
                                <h3 class="widget-title">Danh mục</h3>
                            </div>
                            <ul>
                                @foreach($categoryPost as $item)
                                    <li>
                                        <a href="{{route('redirect',$item->slug)}}">{{$item->name}}</a>
                                        <span class="badge">({{$item->Posts ? $item->Posts->count():0}})</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- RECENT POSTS -->
                        <div class="widget recent-posts-entry rounded-sidebar-widget">
                            <div class="text-left m-b30">
                                <h3 class="widget-title">Bài viết mới nhất</h3>
                            </div>

                            <div class="widget-post-bx">
                                @foreach($recentPosts as $item)
                                    <div class="widget-post clearfix">
                                        <div class="wt-post-media">
                                            @if($item->image != \App\Admin\Http\Helpers\Common::noImage)
                                                <img src="{{asset('media/posts/small/'.$item->image)}}" alt="{{$item->name}}" width="auto" height="auto">
                                            @else
                                                <img src="{{asset('media/common/'.\App\Admin\Http\Helpers\Common::noImage)}}" alt="{{$item->name}}" width="auto" height="auto" style="opacity: 0">
                                            @endif
                                        </div>
                                        <div class="wt-post-info">
                                            <div class="wt-post-header">
                                                <h5 class="post-title"><a
                                                        href="{{route('redirect',$item->slug)}}">{{$item->name}}</a></h5>
                                            </div>
                                            <div class="wt-post-meta">
                                                <ul>
                                                    <li class="post-date">{{date('d-m-y',$item->pulished_at)}}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- TAGS -->
                        <div class="widget  widget_tag_cloud rounded-sidebar-widget">
                            <div class="text-left m-b30">
                                <h3 class="widget-title">Tags</h3>
                            </div>
                            <div class="tagcloud">
                                @foreach($tags as $item)
                                    <a href="javascript:void(0);">{{$item->name}}</a>
                                @endforeach
                            </div>
                        </div>

                    </aside>
                </div>
            </div>
        </div>
        <!-- Left & right section  END -->

    </div>
        <!-- Content END-->
    </div>
    <!-- FOOTER START -->
    @include('web.layouts.footer')
    <!-- FOOTER END -->
    </div>
@endsection
