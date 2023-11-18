@extends('web.layouts.base')
@section('title')
    <title>Liên hệ</title>
@endsection
@section('body')
    <div class="page-wraper">
        @include('web.layouts.header')
        <!-- Content -->

        <div class="page-content">

            <!--Banner-->

            <div class="aon-page-benner-area">

                <div class="aon-page-banner-row" style="background-image: url({{asset('media/common/job-banner.jpg')}})">

                    <div class="sf-overlay-main" style="opacity:0.8; background-color:#022279;"></div>

                    <div class="sf-banner-heading-wrap">

                        <div class="sf-banner-heading-area">

                            <div class="sf-banner-heading-large">Liên Hệ</div>

                            <div class="sf-banner-breadcrumbs-nav">

                                <ul class="list-inline">

                                    <li><a href="{{route('home')}}"> Trang chủ </a></li>

                                    <li><a href="{{route('contact')}}"> Liên hệ </a></li>

                                </ul>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!--Banner-->


            <!-- Contact Us-->

            <div class="aon-contact-area">

                <div class="container">

                    <!--Title Section Start-->

                    <div class="section-head text-center">

                        <h2 class="sf-title">Thông tin liên hệ</h2>

                        <p>Chúng tôi rất mong muốn được nghe từ bạn! Nếu bạn cần bất kỳ hỗ trợ hoặc thông tin nào về dịch vụ của chúng tôi, hãy liên hệ với chúng tôi bằng cách điền vào mẫu liên hệ bên dưới. Chúng tôi sẽ cố gắng trả lời bạn trong thời gian sớm nhất có thể.</p>

                    </div>

                    <!--Title Section End-->


                    <div class="section-content">


                        <div class="sf-contact-info-wrap">

                            <div class="row">


                                <!-- COLUMNS 1 -->

                                <div class="col-lg-4 col-md-6">

                                    <div class="sf-contact-info-box">

                                        <div class="sf-contact-icon">

                                            <span><img src="{{asset('media/common/1.png')}}" alt="liên hệ" width="auto" height="auto"></span>

                                        </div>

                                        <div class="sf-contact-info">

                                            <h4 class="sf-title">Địa Chỉ</h4>

                                            <p>30/355 Tô Hiệu - Lê Chân - Hải Phòng</p>

                                        </div>

                                    </div>

                                </div>

                                <!-- COLUMNS 2 -->

                                <div class="col-lg-4 col-md-6">

                                    <div class="sf-contact-info-box">

                                        <div class="sf-contact-icon">

                                            <span><img src="{{asset('media/common/2.png')}}" alt="liên hệ" width="auto" height="auto"></span>

                                        </div>

                                        <div class="sf-contact-info">

                                            <h4 class="sf-title">Email</h4>

                                            <p>anhthoit@it24h.vn</p>

                                        </div>

                                    </div>

                                </div>

                                <!-- COLUMNS 3 -->

                                <div class="col-lg-4 col-md-6">

                                    <div class="sf-contact-info-box">

                                        <div class="sf-contact-icon">

                                            <span><img src="{{asset('media/common/3.png')}}" alt="liên hệ" width="auto" height="auto"></span>

                                        </div>

                                        <div class="sf-contact-info">

                                            <h4 class="sf-title">Điện Thoại</h4>

                                            <p>+088-677-6286 (Hỗ trợ 24/7)</p>

                                        </div>

                                    </div>

                                </div>


                            </div>

                        </div>


                        <div class="sf-contact-form-wrap">
                            <!--Contact Information-->
                            <div class="sf-contact-form">
                                <div class="sf-con-form-title text-center">
                                    <h2 class="m-b30">Liên Hệ Ngay</h2>
                                </div>

                                <form id="order-form" class="contact-form" enctype="multipart/form-data">
                                    <div class="row">
                                        <!-- COLUMNS 1 -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="name" placeholder="Họ tên" class="form-control" required>
                                            </div>
                                        </div>
                                        <!-- COLUMNS 2 -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="email" placeholder="Email" class="form-control" required>
                                            </div>
                                        </div>
                                        <!-- COLUMNS 3 -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="phone" placeholder="Điện thoại" class="form-control">
                                            </div>
                                        </div>
                                        <!-- COLUMNS 4 -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <select class="form-control" name="product_id">
                                                    @foreach($products as $item)
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <!-- COLUMNS 5 -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea name="note" placeholder="Lời nhắn" class="form-control"  required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sf-contact-submit-btn">
                                        <input class="site-button btn-contact-submit" value="Gửi" type="button">
                                    </div>
                                </form>
                            </div>
                            <!--Contact Information End-->
                        </div>
                    </div>
                </div>
            </div>


            <!-- Contact Us-->

            <div class="section-full sf-contact-map-area">

                <div class="container">


                    <div class="sf-map-social-block text-center">

                        <h2>Được hàng nghìn khách hàng tin dùng</h2>

                        <ul class="sf-con-social">

                            <li><a href="javascript:void(0);" class="sf-fb"><img src="{{asset('media/common/facebook.png')}}" alt="facebook" width="auto" height="auto">Facebook</a>
                            </li>

                            <li><a href="javascript:void(0);" class="sf-twitter"><img src="{{asset('media/common/twitter.png')}}" alt="twitter" width="auto" height="auto">Twitter</a></li>

                            <li><a href="javascript:void(0);" class="sf-pinterest"><img src="{{asset('media/common/pinterest.png')}}" alt="Pinterest" width="auto" height="auto">Pinterest</a>
                            </li>

                        </ul>


                        <div class="sf-con-social-pic">

                            <span class="img-pos-1"><img src="{{asset('media/common/img1.png')}}" alt="img1" width="auto" height="auto"></span>

                            <span class="img-pos-2"><img src="{{asset('media/common/img2.png')}}" alt="img2" width="auto" height="auto"></span>

                            <span class="img-pos-3"><img src="{{asset('media/common/img3.png')}}" alt="img3" width="auto" height="auto"></span>

                            <span class="img-pos-4"><img src="{{asset('media/common/r-img1.png')}}" alt="r-imag1" width="auto" height="auto"></span>

                            <span class="img-pos-5"><img src="{{asset('media/common/r-img2.png')}}" alt="r-img2" width="auto" height="auto"></span>

                            <span class="img-pos-6"><img src="{{asset('media/common/r-img3.png')}}" alt="r-img3" width="auto" height="auto"></span>

                        </div>

                    </div>


                </div>

                <div class="sf-map-wrap">

                    <div class="gmap-area">

                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1864.2836522414445!2d106.67184183840996!3d20.849172201770877!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a7a63ac0cf811%3A0x4e0ae21ac4d87f34!2zTmfDtSAzNTMgxJDGsOG7nW5nIFTDtCBIaeG7h3UsIEjhu5MgTmFtLCBMw6ogQ2jDom4sIEjhuqNpIFBow7JuZywgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1693821166286!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                    </div>

                </div>

            </div>


        </div>

        <!-- Content END-->
        @include('web.layouts.footer')

    </div>
@endsection
