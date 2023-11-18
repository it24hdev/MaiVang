<footer>
    <section class="box-contact-footer">
        <div class="container">
            <div>
                <div class="d-flex box-wrapper-contact justify-content-center">
                    <div class="d-flex contact-wrapper-title">
                        <h2>Tiếp nhận yêu cầu và hỗ trợ 24/7</h2>
                    </div>
                    <div class="d-flex contact-wrapper-populated">
                        <div class="position-relative">
                            <a class="theme_btn">Theo dõi yêu cầu
                                <span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a>
                        </div>
                    </div>
                    <div class="d-flex contact-wrapper-icon">
                        <div class="icon-c">
                            <i class="fa fa-headphones" aria-hidden="true"></i>
                        </div>
                        <div class="content"><h6 class="tite">Hỗ trợ</h6>
                            <div class="title_20"><a href="tel:0825559973">082.555.9973</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="box-footer">
        <div class="d-flex flex-wrap position-relative m-auto w-100">
            <div class="footer-wrapper w-100">
                <div class="container d-flex flex-wrap position-relative m-auto">
                    <div class="box-footer-wrapper-1">
                        @foreach($menu as $item)
                            @if($item->Position && $item->Position->pluck('code')->first() == 'menu_footer_col_1')
                                @foreach($item->MenuItems as $menuItem)
                                    {!! $menuItem->html_field !!}
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                    <div class="box-footer-wrapper-2">
                        @foreach($menu as $item)
                            @if($item->Position && $item->Position->pluck('code')->first() == 'menu_footer_col_2')
                                @foreach($item->MenuItems as $menuItem)
                                    {!! $menuItem->html_field !!}
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                    <div class="box-footer-wrapper-3">
                        @foreach($menu as $item)
                            @if($item->Position && $item->Position->pluck('code')->first() == 'menu_footer_col_3')
                                @foreach($item->MenuItems as $menuItem)
                                    {!! $menuItem->html_field !!}
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                    <div class="box-footer-wrapper-4">
                        @foreach($menu as $item)
                            @if($item->Position && $item->Position->pluck('code')->first() == 'menu_footer_col_4')
                                @foreach($item->MenuItems as $menuItem)
                                    {!! $menuItem->html_field !!}
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</footer>
