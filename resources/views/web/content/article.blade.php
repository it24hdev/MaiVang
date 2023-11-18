@extends('web.layouts.base')
@section('title')
    <title>{{$posts->meta_title ?? $posts->name}}</title>
    <meta name="keyword" content="{{$posts->meta_keyword ?? $posts->name}}">
    <meta name="description" content="{{$posts->meta_description ?? $posts->name}}">
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
                                    <li class="active">{{$posts->name}}</li>
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
                        <div class="col-lg-8 col-md-12">
                            <div class="sf-post-detail">
                                <div class="post blog-post blog-detail sf-blog-style-1">
                                    <div class="post-bx">
                                        <!-- Content section for blogs start -->
                                        <div class="post-thum">
                                            @if($posts->type == 2 && $posts->video)
                                                <iframe width="560" height="315"
                                                        src="{{$posts->video}}"
                                                        title="{{$posts->name}}" frameborder="0"
                                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                        allowfullscreen></iframe>
                                            @elseif($posts->image != \App\Admin\Http\Helpers\Common::noImage)
                                                <img alt="{{$posts->name}}" src="{{asset('media/posts/'.$posts->image)}}"
                                                     width="100%" height="auto">
                                            @else
                                                <img alt="{{$posts->name}}" src="{{asset('media/common/'.\App\Admin\Http\Helpers\Common::noImage)}}"
                                                     width="100%" height="auto" style="opacity: 0">
                                            @endif
                                        </div>
                                        <div class="post-info">
                                            <div class="post-meta sf-icon-post-meta">
                                                <ul>
                                                    <li class="post-author"><i class="feather-user"></i>Đăng bởi
                                                        <a href="javascript:void(0);"
                                                           rel="">{{$posts->User ? $posts->User->name:''}}</a>
                                                    </li>
                                                    <li class="post-comment">
                                                        <a href="javascript:void(0);" title="" rel=""><i
                                                                class="feather-message-square"></i>Bình luận</a>
                                                    </li>
                                                    <li class="post-views">
                                                        <a href="javascript:void(0);" title="" rel=""><i
                                                                class="feather-eye"></i>85 Lượt xem</a>
                                                    </li>

                                                </ul>
                                            </div>

                                            <div class="post-text">
                                                <h4 class="post-title">
                                                    {{$posts->name}}
                                                </h4>
                                                @if(!empty($tableOfContent['index']))
                                                    <div class="table-of-contents p-2 my-2">
                                                        <h3>Mục lục</h3>
                                                        {!! $tableOfContent['index'] !!}
                                                    </div>
                                                @endif
                                                {!! $tableOfContent['html'] !!}
                                                <div class="sf-con-social-wrap d-none d-md-block">
                                                    <h4>Chia sẻ bài viết</h4>
                                                    <ul class="sf-con-social">
                                                        <li>
                                                            <a href="javascript:void(0);" class="sf-fb">
                                                                <img src="{{asset('media/common/facebook.png')}}" width="auto" height="auto" alt="Facebook">Facebook
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);" class="sf-twitter">
                                                                <img src="{{asset('media/common/twitter.png')}}" width="auto" height="auto" alt="Facebook">Twitter
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);" class="sf-pinterest">
                                                                <img src="{{asset('media/common/pinterest.png')}}" width="auto" height="auto" alt="Facebook">Pinterest
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                @if($posts->Tags->count() > 0)
                                                    <div class="sf-post-tags">
                                                        <h4>Tags</h4>
                                                        <ul>
                                                            @foreach($posts->Tags as $item)
                                                                <li><a href="javascript:void(0);">{{$item->name}}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                                <div class="sf-pd-sm-media d-none d-md-block">
                                                    <div class="row">
                                                        @foreach($randomPosts as $item)
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 m-b30">
                                                                <a href="{{route('redirect',$item->slug)}}"
                                                                   class="sf-pd-img">
                                                                    @if($item->image != \App\Admin\Http\Helpers\Common::noImage)
                                                                        <img src="{{asset('media/posts/medium/'.$item->image)}}"
                                                                            alt="{{$item->name}}" width="auto" height="auto">
                                                                    @else
                                                                        <img src="{{asset('media/common/'.\App\Admin\Http\Helpers\Common::noImage)}}" alt="{{$item->name}}" style="opacity: 0">
                                                                    @endif
                                                                </a>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <!-- Content section for blogs end -->
                                    </div>
                                </div>
                                <!-- Comment section for blogs start -->
                                <div class="clear sf-blog-comment-wrap d-none" id="comment-list">
                                    <div class="comments-area" id="comments">
                                        <h2 class="comments-title m-t0"><span>02</span> Bình luận</h2>
                                        <div>
                                            <!-- COMMENT LIST START -->
                                            <ol class="comment-list">
                                                <li class="comment">
                                                    <!-- COMMENT BLOCK -->
                                                    <div class="comment-body">
                                                        <div class="comment-author vcard">
                                                            <img class="avatar photo" src="{{asset('media/common/1.jpg')}}" alt="avatar">
                                                            <cite class="fn">Janice Brown</cite>
                                                            <span class="says">says:</span>
                                                        </div>
                                                        <div class="comment-meta">
                                                            <a href="javascript:void(0);">MAR 18,2022 AT 2:14pm</a>
                                                        </div>
                                                        <p>Qui officia deserunt mollit anim id est labrum. Duis aute
                                                            iruret
                                                            dolor in prehenderit in voludptate velit esse cillum toret
                                                            eu
                                                            giat enerit in volptate.</p>
                                                        <div class="reply">
                                                            <a href="javascript:void(0);" class="comment-reply-link">Trả
                                                                lời</a>
                                                        </div>
                                                    </div>

                                                </li>

                                                <li class="comment">
                                                    <!-- COMMENT BLOCK -->
                                                    <div class="comment-body">
                                                        <div class="comment-author vcard">
                                                            <img class="avatar photo"
                                                                 src="{{asset('media/common/2.jpg')}}" width="auto" height="auto"
                                                                 alt="avatar">
                                                            <cite class="fn">Janice Brown</cite>
                                                            <span class="says">says:</span>
                                                        </div>
                                                        <div class="comment-meta">
                                                            <a href="javascript:void(0);">MAR 18,2022 AT 2:14pm</a>
                                                        </div>
                                                        <p>Qui officia deserunt mollit anim id est labrum. Duis aute
                                                            iruret
                                                            dolor in prehenderit in voludptate velit esse cillum toret
                                                            eu
                                                            giat enerit in volptate.</p>
                                                        <div class="reply">
                                                            <a href="javscript:;" class="comment-reply-link">Trả lời</a>
                                                        </div>
                                                    </div>

                                                </li>
                                            </ol>
                                            <!-- COMMENT LIST END -->

                                            <!-- LEAVE A REPLY START -->
                                            <div class="comment-respond m-t30" id="respond">
                                                <form class="comment-form" id="commentform" method="post">

                                                    <p class="comment-form-author">
                                                        <label for="author">Họ tên <span
                                                                class="required">*</span></label>
                                                        <input class="form-control" type="text" value=""
                                                               name="user-comment"
                                                               placeholder="Họ tên" id="author">
                                                    </p>

                                                    <p class="comment-form-email">
                                                        <label>Email <span class="required">*</span></label>
                                                        <input class="form-control" type="text" value="" name="email"
                                                               placeholder="Email">
                                                    </p>

                                                    <p class="comment-form-url">
                                                        <label for="url">Website</label>
                                                        <input class="form-control" type="text" value="" name="url"
                                                               placeholder="Website" id="url">
                                                    </p>

                                                    <p class="comment-form-comment">
                                                        <label for="comment">Bình luận</label>
                                                        <textarea class="form-control" rows="8" name="comment"
                                                                  placeholder="Bình luận" id="comment"></textarea>
                                                    </p>

                                                    <p class="form-submit">
                                                        <button class="sf-btn-large" type="button">Gửi</button>
                                                    </p>

                                                </form>

                                            </div>
                                            <!-- LEAVE A REPLY END -->
                                        </div>
                                    </div>
                                </div>
                                <!-- Comment section for blogs start -->

                            </div>
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
                                        <form role="search" method="post">
                                            <div class="input-group">
                                                <input name="news-letter" type="text" class="form-control"
                                                       placeholder="Nhập nội dung..">
                                                <span class="input-group-btn">
                                                     <button type="submit" class="btn"><i
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
                                @if($posts->Tags)
                                    <div class="widget  widget_tag_cloud rounded-sidebar-widget">
                                        <div class="text-left m-b30">
                                            <h3 class="widget-title">Tags</h3>
                                        </div>
                                        <div class="tagcloud">
                                            @foreach($posts->Tags as $item)
                                                <a href="javascript:void(0);">{{$item->name}}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
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
