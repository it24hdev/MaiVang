@can('restore', \App\Admin\Models\Branch::class)
<div id="modal-restore" class="modal" tabindex="-1" aria-modal="true" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <i class="las la-sync text-success font-65"></i>
                <h6 class="modal-text">Bạn muốn khôi phục mục này</h6>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Hủy</button>
                <button type="button" data-dismiss="modal" class="btn btn-primary" id="restore">Khôi phục</button>
            </div>
        </div>
    </div>
</div>
@endcan
