@can('update', \App\Admin\Models\Branch::class)
<div id="modal-edit" class="modal" tabindex="-1" aria-modal="true" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cập nhật chi nhánh cửa hàng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="las la-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="update-branch" class="general-info">
                    <div class="col-12 layout-spacing p-0">
                        <div class="statbox">
                            <div class="info d-flex flex-wrap">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Tên chi nhánh</label>
                                        <input type="text" name="name" class="form-control">
                                        <input type="text" name="id" class="form-control d-none">
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
                                            <input type="checkbox" name="is_store"><span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label>Địa chỉ</label>
                                    <textarea name="address" class="form-control" rows="4"></textarea>
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
