@can('create', \App\Admin\Models\TransportFee::class)
    <div id="modal-create" class="modal" tabindex="-1" aria-modal="true" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm mới phí vận chuyển</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-create-transport-fee" class="general-info">
                        <div class="col-12 layout-spacing p-0">
                            <div class="statbox">
                                <div class="info d-flex">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Giá trị đơn hàng dưới mức</label>
                                            <input type="text" name="order_value" class="form-control currency">
                                        </div>
                                        <div class="form-group">
                                            <label>Phí thu hộ (VNĐ)</label>
                                            <input type="text" name="fee" class="form-control currency">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="widget-footer text-right p-3">
                    <input type="button" class="btn btn-primary mr-2 btn-store" value="Thêm mới">
                </div>
            </div>
        </div>
    </div>
@endcan
