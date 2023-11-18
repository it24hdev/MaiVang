@can('create', \App\Admin\Models\ShippingMethod::class)
<div id="modal-create" class="modal" tabindex="-1" aria-modal="true" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thêm mới phương thức vận chuyển</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="las la-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-create-shipping-methods" class="general-info">
                    <div class="col-12 layout-spacing p-0">
                        <div class="statbox">
                            <div class="info d-flex flex-wrap">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Tên phương thức vận chuyển</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Phân loại</label>
                                        <select class="form-control m-0" name="type">
                                            <option value="pick_up_at_store">Nhận hàng tại cửa hàng</option>
                                            <option value="store_delivery">Giao hàng bởi cửa hàng</option>
                                            <option value="shipping_provider">Giao bởi bên vận chuyển</option>
                                            <option value="other">Hình thức khác</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Thứ tự xuất hiện</label>
                                        <input type="number" name="order_number" class="form-control" min="0">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Nội dung chi tiết</label>
                                        <textarea class="form-control" name="describe" rows="4"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <lable>Trạng thái</lable>
                                        <label class="switch switch-primary m-0 d-block position-sticky">
                                            <input type="checkbox" checked="checked" name="status"><span
                                                class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer text-right p-3">
                <input type="button" class="btn btn-primary mr-2 btn-store" value="Thêm mới">
            </div>
        </div>
    </div>
</div>
@endcan
