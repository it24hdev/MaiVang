@can('delete', \App\Admin\Models\CategoryProduct::class)
<div id="modal-delete-with-child" class="modal" tabindex="-1" aria-modal="true" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <i class="las la-times-circle text-danger font-65"></i>
                <h6 class="modal-text">Bạn muốn xóa danh mục này + danh mục con?</h6>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Hủy</button>
                <button type="button" data-dismiss="modal" class="btn btn-primary" id="destroy-with-child">Xóa</button>
            </div>
        </div>
    </div>
</div>
@endcan
