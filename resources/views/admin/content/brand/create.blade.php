@can('create', \App\Admin\Models\Brand::class)
    <div id="modal-create" class="modal" tabindex="-1" aria-modal="true" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm mới thương hiệu</h5>
                    <button type="button" class="close m-0 p-0" data-dismiss="modal" aria-label="Close">
                        <i class="las la-times pointer las la-times pointer d-flex justify-content-end m-0"
                           data-dismiss="modal"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="upload-brand" enctype="multipart/form-data">
                        <div class="add-company-box">
                            <div class="add-company-content general-info">
                                <div class="row info">
                                    <div class="col-md-12">
                                        <div class="text-center">
                                            <input type="file" id="upload-image" name="image" accept="image/*">
                                            <img id="view-image" width="150" height="auto" class="background-white"
                                                 src="{{asset('media/common/150x150.png')}}"
                                             data-src="{{asset('media/common/150x150.png')}}">
                                    </div>
                                    <div class="form-group mt-4">
                                        <label>Tên thương hiệu</label>
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label>Meta Title</label>
                                        <input type="text" class="form-control" name="meta_title">
                                    </div>
                                    <div class="form-group">
                                        <label>Meta Keyword</label>
                                        <input type="text" class="form-control" name="meta_keyword">
                                    </div>
                                        <div class="form-group">
                                            <label>Meta Description</label>
                                            <textarea name="meta_description" class="form-control" rows="2"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-sm btn-primary btn-store" value="Thêm mới">
                </div>
            </div>
        </div>
    </div>
@endcan
