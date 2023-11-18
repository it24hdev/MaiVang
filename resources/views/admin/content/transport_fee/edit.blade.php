@can('update', \App\Admin\Models\TransportFee::class)
<div id="modal-edit" class="modal" tabindex="-1" aria-modal="true" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cập nhật phí vận chuyển</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="las la-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="update-transport-fee" class="general-info">
                    <div class="col-12 layout-spacing p-0">
                        <div class="statbox">
                            <div class="info">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Giá trị đơn hàng dưới mức</label>
                                        <input type="text" name="order_value" class="form-control currency">
                                        <input type="text" name="id" class="form-control d-none">
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
            <div class="modal-footer">
                <input type="button" class="btn btn-primary btn-update" value="Cập nhật">
            </div>
        </div>
    </div>
</div>
@endcan
