@can('create', \App\Admin\Models\Attribute::class)
    <div id="modal-create" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title m-0" id="exampleModalScrollableTitle">Thêm mới thuộc tính</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <div class="modal-body general-info">
                    <form id="create-attribute">
                        <div class="d-flex flex-wrap">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 info">
                                    <div class="form-group">
                                        <label>Tên thuộc tính (<span class="text-danger">*</span>)</label>
                                        <input type="text" name="name" class="form-control typingInput" value="{{old('name')}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Mã thuộc tính (<span class="text-danger">*</span>)</label>
                                        <input type="text" name="code" class="form-control slugChanged" value="{{old('code')}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Diễn giải</label>
                                        <textarea class="form-control" name="description" rows="3">{{old('description')}}</textarea>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-store">Thêm mới</button>
                </div>
            </div>
        </div>
    </div>
@endcan
