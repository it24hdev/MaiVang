@can('create', \App\Admin\Models\Branch::class)
    <div id="modal-create" class="modal" tabindex="-1" aria-modal="true" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm mới chi nhánh cửa hàng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-create-branch" class="general-info">
                        <div class="col-12 layout-spacing p-0">
                            <div class="statbox">
                                <div class="info d-flex flex-wrap">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Tên chi nhánh</label>
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Mã kho</label>
                                            <input type="text" name="code" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Điện thoại</label>
                                            <input type="number" name="phone" min="0" max="12" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <lable class="text-primary">Đây là một cửa hàng khách có thể tới</lable>
                                            <label class="switch switch-primary m-0 d-block position-sticky">
                                                <input type="checkbox" checked="checked" name="is_store"><span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Địa chỉ</label>
                                            <textarea name="address" class="form-control" rows="4"></textarea>
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
