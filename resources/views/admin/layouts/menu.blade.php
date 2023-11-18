<div class="menubar-wrapper menubar-theme">
    <nav id="sidebar">
        <ul class="list-unstyled menu-categories">
            <li class="menu main-single-menu {{ session('menu') == 'dashboard' ? 'active' : '' }}">
                <a href="{{route('admin')}}" class="box-function dropdown-toggle collapsed" aria-expanded="true">
                    <div class="">
                        <i class="las la-home"></i>
                        <span>Dashboards</span>
                    </div>
                </a>
            </li>
            <li class="menu main-single-menu {{ session('menu') == 'sell' ? 'active' : '' }}">
                <a href="#sell" aria-expanded="false" class="dropdown-toggle collapsed" data-toggle="collapse">
                    <div>
                        <i class="las la-coins"></i>
                        <span>Bán hàng</span>
                    </div>
                    <div>
                        <i class="las la-angle-right sidemenu-right-icon"></i>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="sell" data-parent="#accordionExample">
                    @can('viewAny', \App\Admin\Models\Order::class)
                        <li class="menu">
                            <a href="{{route('admin.orders.index')}}">
                                <span>DS đơn hàng</span>
                                <i class="las la-list-ol"></i>
                            </a>
                        </li>
                    @endcan
                    @can('viewAny', \App\Admin\Models\Customer::class)
                        <li class="menu">
                            <a href="{{route('admin.customers.index')}}">
                                <span>DS khách hàng</span>
                                <i class="las la-user-friends"></i>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
            <li class="menu main-single-menu {{ session('menu') == 'product' ? 'active' : '' }}">
                <a href="#product" aria-expanded="false" class="dropdown-toggle collapsed" data-toggle="collapse">
                    <div>
                        <i class="las la-box"></i>
                        <span>Sản phẩm</span>
                    </div>
                    <div>
                        <i class="las la-angle-right sidemenu-right-icon"></i>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="product" data-parent="#accordionExample">
                    @can('viewAny', \App\Admin\Models\Product::class)
                        <li class="menu">
                            <a href="{{route('admin.product.index')}}">
                                <span>DS sản phẩm</span>
                                <i class="las la-list-ul"></i>
                            </a>
                        </li>
                    @endcan
                    @can('viewAny', \App\Admin\Models\ProductCategory::class)
                        <li class="menu">
                            <a href="{{route('admin.category_products.index')}}">
                                <span>DM sản phẩm</span>
                                <i class="las la-list-ul"></i>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
            <li class="menu main-single-menu {{ session('menu') == 'post' ? 'active' : '' }}">
                <a href="#post" aria-expanded="false" class="dropdown-toggle collapsed" data-toggle="collapse">
                    <div class="">
                        <i class="las la-box"></i>
                        <span>Bài viết</span>
                    </div>
                    <div>
                        <i class="las la-angle-right sidemenu-right-icon"></i>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="post" data-parent="#accordionExample">
                    @can('viewAny', \App\Admin\Models\Post::class)
                        <li class="menu">
                            <a href="{{route('admin.posts.index')}}">
                                <span>Danh sách Bài viết</span>
                                <i class="las la-list-ul"></i>
                            </a>
                        </li>
                    @endcan
                    @can('viewAny', \App\Admin\Models\PostCategory::class)
                        <li class="menu">
                            <a href="{{route('admin.category_posts.index')}}">
                                <span>Danh mục Bài viết</span>
                                <i class="las la-list-ul"></i>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
                       <li class="menu main-single-menu {{ session('menu') == 'system' ? 'active' : '' }}">
                <a href="#system" aria-expanded="false" class="dropdown-toggle collapsed" data-toggle="collapse">
                    <div class="">
                        <i class="las la-user-cog"></i>
                        <span>Hệ thống</span>
                    </div>
                    <div>
                        <i class="las la-angle-right sidemenu-right-icon"></i>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="system" data-parent="#accordionExample">
                    <li class="menu">
                        <a href="{{route('admin.system.index')}}">
                            <span>Cài đặt chung</span>
                            <i class="las la-cog"></i>
                        </a>
                    </li>
                    @can('viewAny', \App\Admin\Models\User::class)
                        <li class="menu">
                            <a href="{{route('admin.users.index')}}">
                                <span>Người dùng</span>
                                <i class="las la-user"></i>
                            </a>
                        </li>
                    @endcan
                    @can('viewAny', \App\Admin\Models\Role::class)
                        <li class="menu">
                            <a href="{{route('admin.roles.index')}}">
                                <span>Quyền quản trị</span>
                                <i class="las la-street-view"></i>
                            </a>
                        </li>
                    @endcan
                        @can('viewAny', \App\Admin\Models\Menu::class)
                            <li class="menu">
                                <a href="{{route('admin.menu_managers.index')}}">
                                    <span>Danh sách menu</span>
                                    <i class="las la-stream"></i>
                                </a>
                            </li>
                        @endcan
                    @can('viewAny', \App\Admin\Models\ShortUrl::class)
                        <li class="menu">
                            <a href="{{route('admin.short_url.index')}}">
                                <span>Quản lý đường dẫn</span>
                                <i class="las la-link"></i>
                            </a>
                        </li>
                    @endcan
                            <li class="menu">
                                <a href="{{route('admin.sliders.index')}}">
                                    <span>Slider</span>
                                    <i class="las la-sliders-h"></i>
                                </a>
                            </li>
                        @can('viewAny', \App\Admin\Models\Page::class)
                            <li class="menu">
                                <a href="{{route('admin.pages.index')}}">
                                    <span>QL trang</span>
                                    <i class="lar la-list-alt"></i>
                                </a>
                            </li>
                        @endcan
                    @can('viewAny', \App\Admin\Models\Tag::class)
                        <li class="menu">
                            <a href="{{route('admin.tags.index')}}">
                                <span>Quản lý Tag</span>
                                <i class="las la-tags"></i>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        </ul>
    </nav>
</div>
