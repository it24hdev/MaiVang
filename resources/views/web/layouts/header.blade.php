<!-- NAVIGATION -->
<section class="box-navigation">
    <div class="navigation">
        <ul>
            <li class="social">
                <a href="javascript:void(0);"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            </li>
            <li class="social">
                <a href="javascript:void(0);"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
            </li>
            <li class="social">
                <a href="javascript:void(0);"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </li>
            <li>
                <a href="javascript:void(0);"><span>Khuyến mại</span></a>
            </li>
            <li class="no-divider">
                <a href="javascript:void(0);"><span>Tuyển dụng</span></a>
            </li>
        </ul>
        <ul>
            <li class="no-divider position-relative">
                <form method="get" enctype="multipart/form-data"
                      action="{{route('list_product')}}"
                      class="d-flex position-relative justify-content-between align-items-center">
                    <input type="search" id="search" name="search" autocomplete="off" placeholder="Bạn đang tìm gì?"
                           class="form-control input-wrapper-search">
                    <i class="fa fa-search icon-submit-search" aria-hidden="true"></i>
                </form>
                <div class="ajax-search-result py-1 position-absolute" id="result-search"></div>
            </li>
            <li>
                <a>Dịch vụ IT Support 24/7</a>
            </li>
            <li class="no-divider">
                <a>
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="https://www.w3.org/2000/svg">
                        <path
                            d="M13.35 6.66675C13.35 8.73882 12.0023 10.747 10.5281 12.303C9.80435 13.067 9.07837 13.6924 8.5326 14.127C8.32472 14.2925 8.14376 14.4298 8 14.5358C7.85624 14.4298 7.67528 14.2925 7.4674 14.127C6.92163 13.6924 6.19565 13.067 5.47187 12.303C3.99773 10.747 2.65 8.73882 2.65 6.66675C2.65 5.24784 3.21366 3.88705 4.21698 2.88373C5.2203 1.88041 6.58109 1.31675 8 1.31675C9.41891 1.31675 10.7797 1.88041 11.783 2.88373C12.7863 3.88705 13.35 5.24784 13.35 6.66675Z"
                            stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path
                            d="M9.35 6.66675C9.35 7.41233 8.74558 8.01675 8 8.01675C7.25442 8.01675 6.65 7.41233 6.65 6.66675C6.65 5.92116 7.25442 5.31675 8 5.31675C8.74558 5.31675 9.35 5.92116 9.35 6.66675Z"
                            stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    <span class="small-text ml-2">Địa chỉ cửa hàng</span>
                </a>
            </li>
            <li class="no-divider">
                <a class="switch-language">EN</a>
            </li>
        </ul>
    </div>
</section>
<!-- NAVIGATION END -->

<!-- HEADER START -->
<header class="site-header header-style-2 mobile-sider-drawer-menu">
    <div class="sticky-header main-bar-wraper  navbar-expand-lg">
        <div class="main-bar">

            <div class="container clearfix">
                <!--Logo section start-->
                <div class="logo-header">
                    <div class="logo-header-inner logo-header-one">
                        <a href="{{route('home')}}">
                            <img src="{{asset('media/common/logo/logo_header.png')}}" width="auto" height="auto" alt="Logo">
                        </a>
                    </div>
                </div>
                <!--Logo section End-->

                <button id="mobile-side-drawer" data-target=".header-nav" data-toggle="collapse" type="button"
                        class="navbar-toggler collapsed">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar icon-bar-first"></span>
                    <span class="icon-bar icon-bar-two"></span>
                    <span class="icon-bar icon-bar-three"></span>
                </button>

                <!-- MAIN Vav -->
                <div class="nav-animation header-nav navbar-collapse collapse d-flex justify-content-start">
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
                <!-- NAV Toggle Button -->

                <!-- Header Right Section-->
                <div class="extra-nav header-2-nav">
                    <div class="extra-cell">
                        <!--Login-->
                        <button type="button" class="site-button btn-modal-order aon-btn-login">
                            <i class="fa fa-calendar"></i> Đặt lịch
                        </button>
                        <!--Sign up-->
                        <a href="tel:0825559973" class="button-hotline aon-btn-signup m-l20 d-none d-md-block"
                           title="082-555-9973">
                            <div class="d-flex">
                                    <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                                <div class="ml-2 box-text-phone">
                                    <span>Liên hệ ngay 24/7</span>
                                    <div class="phone_number">082.555.9973</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- HEADER END -->
