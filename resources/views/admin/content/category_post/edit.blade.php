@can('update', \App\Admin\Models\CategoryPost::class)
    <div id="modal-edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Cập nhật danh mục bài viết</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <div class="modal-body pt-0">
                    <form id="update-category-post">
                        <div class="card-box general-info">
                            <h6>Cơ bản</h6>
                            <div class="row col-xl-12 col-lg-12 col-md-12 p-2">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group info">
                                        <label>Tên danh mục(<span
                                                class="text-danger">*</span>)</label>
                                        <input type="text" class="form-control mb-2 typingInput" name="name" value="{{old('name')}}">
                                        <input type="text" class="d-none form-control" name="id">
                                    </div>
                                    <div class="form-group info">
                                        <label>Slug(<span class="text-danger">*</span>)</label>
                                        <input type="text" class="form-control mb-2 slugChanged"
                                               name="slug" value="{{old('slug')}}">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group info">
                                        <label>Redirect</label>
                                        <input type="text" class="form-control mb-2" name="redirect" value="{{old('redirect')}}">
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="form-group">
                                            <p> Hiển thị</p>
                                            <label
                                                class="switch switch-primary m-0 d-block position-sticky">
                                                <input type="checkbox" name="show"><span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-box">
                            <h5>Mô tả</h5>
                            <div class="editor-box">
                                <textarea id="description-edit" name="description" class="form-control">{{old('description')}}</textarea>
                            </div>
                        </div>
                        <div class="card-box">
                            <h5>Seo</h5>
                            <div class="statbox general-info">
                                <div class="col-xl-12 col-lg-12 col-md-12 info">
                                    <div class="form-group">
                                        <label>Meta title</label>
                                        <input type="text" class="form-control mb-2" name="meta_title"
                                               value="{{old('meta_title')}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Meta keyword</label>
                                        <input type="text" class="form-control mb-2" name="meta_keyword"
                                               value="{{old('meta_keyword')}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Meta description</label>
                                        <textarea name="meta_description"
                                                  class="form-control">{{old('meta_description')}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="dropdown show">
                        <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                            Xóa <i class="las la-angle-down"></i>
                        </button>
                        <div class="dropdown-menu show" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item btn-delete" data-toggle="modal" data-target="#modal-delete">Danh mục
                                này</a>
                            <a class="dropdown-item btn-delete-with-child" data-toggle="modal"
                               data-target="#modal-delete-with-child">Danh mục này + danh mục con</a>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary btn-update">Cập nhật</button>
                </div>
            </div>
        </div>
</div>
@endcan
