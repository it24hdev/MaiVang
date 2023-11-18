@extends('web.layouts.base')
@section('title')
    <title>{{$topic->meta_title ?? $topic->name}}</title>
    <meta name="keyword" content="{{$topic->meta_keyword ?? $topic->name}}">
    <meta name="description" content="{{$topic->meta_description ?? $topic->name}}">
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
                                <li><a href="{{route('home')}}">Trang chủ</a></li>
                                <li class="active"><a href="{{route('redirect',$topic->slug)}}">{{$topic->name}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner Area End -->

        <!-- Left & right section -->
        <div class="aon-blog-page-wrap">
            <div class="container">
                <div class="d-flex flex-wrap">
                    <!-- Left part start -->
                    <div class="col-lg-8 col-md-12">
                        <div id="grid">
                            <!--Block 1 -->
                            @foreach($posts as $item)
                                <div class="aon-blog-list3">
                                    <div class="post-bx">

                                        <div class="post-thum">
                                            @if($item->image != \App\Admin\Http\Helpers\Common::noImage)
                                                <img title="title" src="{{asset('media/posts/large/'.$item->image)}}" alt="{{$item->name}}" width="auto" height="auto">
                                            @else
                                                <img title="title" src="{{asset('media/common/'.\App\Admin\Http\Helpers\Common::noImage)}}" alt="{{$item->name}}" width="auto" height="auto" style="opacity: 0">
                                            @endif
                                        </div>
                                        <div class="post-date-position">
                                            <div class="post-share">
                                                <a href="javascript:void(0);" class="post-share-icon feather-share-2"></a>
                                            </div>
                                            <div class="post-date">
                                                <span>{{date('d/y/m',$item->pulished_at)}}</span>
                                            </div>
                                        </div>
                                        <div class="post-info">
                                            <div class="post-meta1">
                                                <ul>
                                                    <li class="post-author"><i class="feather-user"></i>Đăng bởi
                                                        <a rel="author">{{$item->User ? $item->User->name:''}}</a>
                                                    </li>
                                                    <li class="post-comment"><span>
                                                            <i class="feather-message-square"></i>Bình luận</span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="post-text">
                                                <h4 class="post-title">
                                                    <a href="{{route('redirect',$item->slug)}}">{{$item->name}}</a>
                                                </h4>
                                                <p>{{$item->summary}}</p>
                                            </div>
                                            <div class="post-categories">
                                                @if($item->Tags)
                                                    @foreach($item->Tags as $item)
                                                        <a href="javascript:void(0);">{{$item->name}}</a>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        {!! $posts->links('web.layouts.pagination') !!}
                    </div>
                    <!-- Left part END -->
                    <!-- Side bar start -->
                    <div class="col-lg-4 col-md-12 d-none d-lg-block">
                        <aside class="side-bar ">
                            <!-- SEARCH -->
                            <div class="widget rounded-sidebar-widget">
                                <div class="widget_search_bx">
                                    <div class="text-left m-b30">
                                        <h3 class="widget-title">Tìm kiếm</h3>
                                    </div>
                                    <form role="search" method="get">
                                        <div class="input-group">
                                            <input name="search" type="search" value="{{request()->input('search')}}" class="form-control"
                                                   placeholder="Nhập nội dung..">
                                            <span class="input-group-btn"><button type="submit" class="btn"><i class="fa fa-search"></i></button>
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
                                            <span class="badge"> ({{$item->Posts ? $item->Posts->count():0}})</span></li>
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
                                                    <h5 class="post-title">
                                                        <a href="{{route('redirect',$item->slug)}}">{{$item->name}}</a>
                                                    </h5>
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
                    <!-- Side bar END -->
                </div>
            </div>
        </div>
        <!-- Left & right section  END -->

    </div>
    <!-- Content END-->

    @include('web.layouts.footer')

</div>
@endsection
