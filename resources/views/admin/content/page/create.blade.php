@can('create', \App\Admin\Models\Page::class)
    <div id="modal-create" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title m-0" id="exampleModalScrollableTitle">Thêm mới trang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <div class="modal-body general-info">
                    <form id="create-page">
                        <div class="card-box add-product">
                            <h6 class="m-0">Cơ bản</h6>
                            <div class="d-flex flex-wrap">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 info">
                                    <div class="form-group">
                                        <label>Tiêu đề (<span class="text-danger">*</span>)</label>
                                        <input type="text" name="name" class="form-control typingInput" value="{{old('name')}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Đường dẫn (<span class="text-danger">*</span>)</label>
                                        <input type="text" name="slug" class="form-control slugChanged" value="{{old('slug')}}">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 info">
                                    <div class="form-group">
                                        <label>Tóm tắt</label>
                                        <textarea class="form-control" name="summary"
                                                  rows="4">{{old('summary')}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group editor-box">
                                <label>Mô tả</label>
                                <textarea id="description" class="form-control"
                                          name="description">{{old('description')}}</textarea>
                            </div>
                        </div>
                        <div class="card-box add-product">
                            <h6 class="m-0">Seo</h6>
                            <div class="info">
                                <div class="form-group">
                                    <label>Meta title</label>
                                    <input type="text" name="meta_title" class="form-control"
                                           value="{{old('meta_title')}}">
                                </div>
                                <div class="form-group">
                                    <label>Meta keyword</label>
                                    <input type="text" name="meta_keyword" class="form-control"
                                           value="{{old('meta_keyword')}}">
                                </div>
                                <div class="form-group">
                                    <label>Meta description</label>
                                    <textarea class="form-control" name="meta_description"
                                              rows="2">{{old('meta_description')}}</textarea>
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
