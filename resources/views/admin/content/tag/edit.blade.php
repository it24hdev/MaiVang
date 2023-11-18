@can('update', \App\Admin\Models\Tag::class)
    <div id="modal-edit" class="modal" tabindex="-1" aria-modal="true" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cập nhật Tag</h5>
                    <button type="button" class="close m-0 p-0" data-dismiss="modal" aria-label="Close">
                        <i class="las la-times pointer las la-times pointer d-flex justify-content-end m-0"
                           data-dismiss="modal"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit-tag">
                        <div class="row col-12 general-info m-0 px-0">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 info">
                                <div class="form-group">
                                    <label>Tên </label>
                                    <input type="text" class="form-control typingInput" name="name">
                                    <input type="text" class="d-none" name="id">
                                </div>
                                <div class="form-group">
                                    <label>Đường dẫn</label>
                                    <input type="text" class="form-control slugChanged" name="slug">
                                </div>
                            </div>
                            <div class="form-group col-12 editor-box px-3">
                                <label class="text-primary">Mô tả</label>
                                <textarea name="description" id="description-edit" class="form-control"></textarea>
                            </div>
                            <div class="col-12 info">
                                <div class="form-group">
                                    <label>Meta title</label>
                                    <input type="text" name="meta_title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Meta description</label>
                                    <textarea name="meta_description" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-sm btn-primary btn-update" value="Cập nhật">
                </div>
            </div>
        </div>
    </div>
@endcan
