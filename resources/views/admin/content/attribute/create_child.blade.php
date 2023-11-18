@can('create', \App\Admin\Models\Attribute::class)
    <div id="modal-create-child" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title m-0" id="exampleModalScrollableTitle">Thêm mới giá trị thuộc tính</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <div class="modal-body general-info">
                    <form id="create-attribute-child">
                        <div class="card-box add-product">
                            <div class="d-flex flex-wrap">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 info">
                                    <div class="form-group">
                                        <label>Giá trị(<span class="text-danger">*</span>)</label>
                                        <input type="text" name="name" class="form-control typingInput" value="{{old('name')}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Mã (<span class="text-danger">*</span>)</label>
                                        <input type="text" name="code" class="form-control slugChanged" value="{{old('code')}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Thứ tự</label>
                                        <input type="number" name="number_order" min="0" class="form-control" value="{{old('number_order')}}">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 info">
                                    <div class="form-group">
                                        <label>Diễn giải</label>
                                        <textarea class="form-control" name="description" rows="3">{{old('description')}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-store-child">Thêm mới</button>
                </div>
            </div>
        </div>
    </div>
@endcan
