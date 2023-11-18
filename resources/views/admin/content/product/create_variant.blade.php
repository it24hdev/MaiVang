@can('create', \App\Admin\Models\Product::class)
    <div id="modal-create" class="modal" tabindex="-1" aria-modal="true" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm mới biến thể</h5>
                    <button type="button" class="close m-0 p-0" data-dismiss="modal" aria-label="Close">
                        <i class="las la-times pointer las la-times pointer d-flex justify-content-end m-0"
                           data-dismiss="modal"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="create-variant" enctype="multipart/form-data">
                        <div class="add-company-box">
                            <div class="add-company-content general-info">
                                <div class="row info">
                                    <div class="col-md-12">
                                        <div class="form-group mt-4">
                                            <label>Tên biến thể</label>
                                            <input type="text" class="form-control" name="name">
                                        </div>
                                        <div class="form-group mt-4">
                                            <label>Giá bán</label>
                                            <input type="text" class="form-control currency" name="price">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-sm btn-primary btn-store" value="Thêm mới">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endcan
