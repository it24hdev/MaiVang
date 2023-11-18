@can('create', \App\Admin\Models\Menu::class)
    <div id="modal-create-menu" class="modal fade" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalScrollableTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title m-0" id="exampleModalScrollableTitle">Thêm mới menu</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <div class="modal-body general-info">
                    <form id="create-menu">
                        <div class="form-group info">
                            <label>Tên menu</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-store-menu">Thêm mới</button>
                </div>
            </div>
        </div>
    </div>
@endcan
