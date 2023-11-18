<div id="modal-change-password" class="modal" tabindex="-1" aria-modal="true" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Đổi mật khẩu</h5>
                <button type="button" class="close m-0 p-0" data-dismiss="modal" aria-label="Close">
                    <i class="las la-times pointer las la-times pointer d-flex justify-content-end m-0"
                       data-dismiss="modal"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="change-password" enctype="multipart/form-data">
                    <div class="general-info">
                        <div class="col-md-12 info">
                            <div class="form-group form-password">
                                <label>Mật khẩu cũ (<span class="text-danger">*</span>)</label>
                                <input type="password" class="form-control" name="current_password">
                                <i class="lar la-eye-slash"></i>
                            </div>
                            <div class="form-group form-password mt-4">
                                <label>Mật khẩu mới (<span class="text-danger">*</span>)</label>
                                <input type="password" class="form-control" name="password">
                                <i class="lar la-eye-slash"></i>
                            </div>
                            <div class="form-group form-password mt-4">
                                <label>Xác nhận mật khẩu mới (<span class="text-danger">*</span>)</label>
                                <input type="password" class="form-control" name="password_confirmation">
                                <i class="lar la-eye-slash"></i>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary btn-update-password">Xác nhận</button>
            </div>
        </div>
    </div>
</div>
