@can('create', \App\Admin\Models\ShippingMethod::class)
    <div id="modal-import" class="modal" tabindex="-1" aria-modal="true" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nhập file excel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="import-product">
                        <div class="col-12 layout-spacing p-0">
                            <div class="statbox">
                                <input id="import" type="file" class="form-control" name="file">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer text-right p-3">
                    <input type="button" class="btn btn-primary mr-2 btn-import" value="Nhập">
                </div>
            </div>
        </div>
    </div>
@endcan
