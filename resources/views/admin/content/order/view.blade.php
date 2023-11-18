@can('view', \App\Admin\Models\Order::class)
    <div id="modal-view" class="modal" tabindex="-1" aria-modal="true" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close m-0 p-0" data-dismiss="modal" aria-label="Close">
                        <i class="las la-times pointer las la-times pointer d-flex justify-content-end m-0"
                           data-dismiss="modal"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="layout-px-spacing">
                        <div class="row layout-spacing layout-top-spacing">
                            <div class="col-lg-12">
                                <div class="">
                                    <div class="widget-content searchable-container grid">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="card-box">
                                                    <h5 class="header-title mb-3">Theo dõi đơn hàng</h5>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-4">
                                                                <h6 class="mt-0">Mã đơn hàng:</h6>
                                                                <p class="order-code"></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-4">
                                                                <h6 class="mt-0">Tình trạng đơn hàng</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="track-order-list d-flex flex-wrap">
                                                        <ul class="list-unstyled col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                                            <li class="completed">
                                                                <h6 class="mt-0 mb-1 font-13">Ngày đặt</h6>
                                                                <p class="text-muted font-12 created-at">
                                                                    <small class="text-muted created-time"></small>
                                                                </p>
                                                            </li>
                                                            <li class="completed">
                                                                <h6 class="mt-0 mb-1 font-13">Đóng gói</h6>
                                                                <p class="text-muted font-12">
                                                                    <small class="text-muted"></small>
                                                                </p>
                                                            </li>
                                                            <li>
                                                                <span class="active-dot dot"></span>
                                                                <h6 class="mt-0 mb-1 font-13">Vận chuyển</h6>
                                                                <p class="text-muted font-12">
                                                                    <small class="text-muted"></small>
                                                                </p>
                                                            </li>
                                                            <li>
                                                                <h6 class="mt-0 mb-1 font-13"> Đã giao hàng</h6>
                                                                <p class="text-muted font-12">Dự kiến giao hàng trong
                                                                    vòng 1
                                                                    ngày</p>
                                                            </li>
                                                        </ul>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                                            <p class="mb-2 font-weight-bold">NV bán hàng:<span
                                                                    class="font-weight-normal mr-2 staff-sale"></span>
                                                            </p>
                                                            <p class="mb-2 font-weight-bold">Đơn hàng<span
                                                                    class="font-weight-normal mr-2"></span></p>
                                                            <p class="mb-2 font-weight-bold">Thanh toán:<span
                                                                    class="font-weight-normal mr-2"></span></p>
                                                            <p class="mb-2 font-weight-bold">Vận chuyển:<span
                                                                    class="font-weight-normal mr-2"></span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="card-box order-detail-table">

                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="card-box order-details-box">
                                                    <h5 class="header-title mb-3">Thông tin khách hàng</h5>
                                                    <h6 class="font-family-primary font-weight-semibold customer"></h6>
                                                    <p class="mb-2 font-13"><span
                                                            class="font-weight-semibold mr-2 phone"></span></p>
                                                    <p class="mb-2 font-13"><span
                                                            class="font-weight-semibold mr-2 email"></span></p>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="card-box order-details-box">
                                                    <h5 class="header-title mb-3">Thông tin hóa đơn</h5>
                                                    <ul class="list-unstyled mb-0">
                                                        <li>
                                                            <p class="mb-2 font-13"><span
                                                                    class="font-weight-semibold mr-2 order-date">Ngày đặt hàng:</span>
                                                            </p>
                                                            <p class="mb-2 font-13">
                                                                <span class="font-weight-semibold mr-2 area">Địa chỉ giao hàng:</span>
                                                                <small class="address"></small>
                                                            </p>
                                                            <p class="mb-2 font-13"><span
                                                                    class="font-weight-semibold mr-2 payment-method">Phương thức thanh toán:</span>
                                                            </p>
                                                            <p class="mb-0 font-13"><span
                                                                    class="font-weight-semibold mr-2 shipping-method">Phương thức vận chuyển:</span>
                                                            </p>
                                                            <p class="mb-0 font-13"><span
                                                                    class="font-weight-semibold mr-2 note">Ghi chú:</span>
                                                            </p>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
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
