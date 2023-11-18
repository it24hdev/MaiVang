@can('view', \App\Admin\Models\Product::class)
<div id="modal-show" class="modal" tabindex="-1" aria-modal="true" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
        <div class="modal-content" id="show-product">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="las la-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-12 layout-spacing">
                    <div class="card-box product-details">
                        <div class="row">
                            <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12">
                                <div class="tab-content pt-0" id="show-template-image">
                                </div>
                                <div class="col-12 p-3">
                                <ul class="nav nav-pills nav-justified float-left" id="item-template-image">
                                </ul>
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12">
                                <div class="mt-3 mt-xl-0 d-flex">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <p><strong>Loại SP: </strong><span class="product-type"></span></p>
                                    <p><strong>Mã SP: </strong><span class="product-code"></span></p>
                                    <p><strong>Giá nhập: </strong><span class="product-cost"></span></p>
                                    <p><strong>Giá bán: </strong><span class="product-price"></span></p>
                                    <p><strong>ĐVT: </strong><span class="product-unit"></span></p>
                                    <p><strong>Trọng lượng: </strong><span class="product-weight"></span></p>
                                    <p><strong>Thương hiệu: </strong><span class="product-brand"></span></p>
                                    <p><strong>Bảo hành: </strong><span class="product-warranty"></span></p>
                                    <p><strong>Thuế: </strong><span class="product-tax"></span></p>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <p><strong>Khuyến mại: </strong><span class="product-promotion"></span></p>
                                        <p><strong>Giá khuyến mại: </strong><span class="product-price-promotion"></span></p>
                                        <p><strong>Khuyến mại đặc biệt: </strong></p>
                                        <p class="product-special-promotion"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="w-100 animated-underline-content mt-2 details-tab-area">
                            <ul class="nav nav-tabs  mb-3" id="lineTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="underline-specification-tab" data-toggle="tab"
                                       href="#underline-specification" role="tab"
                                       aria-controls="underline-specification" aria-selected="false">Danh mục</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="underline-reviews-tab" data-toggle="tab"
                                       href="#underline-reviews" role="tab" aria-controls="underline-reviews"
                                       aria-selected="false">SEO</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="underline-faqs-tab" data-toggle="tab" href="#underline-faqs"
                                       role="tab" aria-controls="underline-faqs" aria-selected="true">Thông số</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="lineTabContent-3">
                                <!-- SPECIFICATION -->
                                <div class="tab-pane fade show active" id="underline-specification" role="tabpanel"
                                     aria-labelledby="underline-specification-tab">
                                </div>
                                <!-- REVIEWS -->
                                <div class="tab-pane fade" id="underline-reviews" role="tabpanel"
                                     aria-labelledby="underline-reviews-tab">
                                </div>
                                <!-- FAQS -->
                                <div class="tab-pane fade" id="underline-faqs" role="tabpanel"
                                     aria-labelledby="underline-faqs-tab">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endcan

