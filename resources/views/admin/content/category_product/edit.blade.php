@can('update', \App\Admin\Models\CategoryProduct::class)
    <div id="modal-edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Cập nhật danh mục sản phẩm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <div class="modal-body pt-0">
                    <form id="update-category-product">
                        <div class="widget-content tab-horizontal-line">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab"
                                       href="#basic" role="tab"
                                       aria-controls="basic" aria-selected="true">Thông tin chính</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab"
                                       href="#attribute" role="tab"
                                       aria-controls="attribute" aria-selected="false">Quản lý thuộc tính</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active pt-0" id="basic" role="tabpanel"
                                     aria-labelledby="basic-tab">
                                    <div class="card-box general-info">
                                        <h6>Cơ bản</h6>
                                        <div class="statbox row col-xl-12 col-lg-12 col-md-12 p-2">
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                                <div class="form-group info">
                                                    <label>Tên danh mục(<span
                                                            class="text-danger">*</span>)</label>
                                                    <input type="text" class="form-control mb-2 typingInput"
                                                           name="name"
                                                           value="{{old('name')}}">
                                                    <input type="text" class="d-none form-control" name="id"
                                                           value="">
                                                </div>
                                                <div class="form-group info">
                                                    <label>Slug(<span class="text-danger">*</span>)</label>
                                                    <input type="text" class="form-control mb-2 slugChanged"
                                                           name="slug"
                                                           value="{{old('slug')}}">
                                                </div>
                                                <div class="form-group info">
                                                    <label>Redirect</label>
                                                    <input type="text" class="form-control mb-2" name="redirect"
                                                           value="{{old('redirect')}}">
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <div class="form-group">
                                                        <p> Hiển thị</p>
                                                        <label
                                                            class="switch switch-primary m-0 d-block position-sticky">
                                                            <input type="checkbox" name="show"><span
                                                                class="slider round"></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <p>Báo giá</p>
                                                        <label
                                                            class="switch switch-primary m-0 d-block position-sticky">
                                                            <input type="checkbox" name="offer"><span
                                                                class="slider round"></span>
                                                        </label>
                                                    </div>
                                                    <div class="form-group d-flex align-center m-0">
                                                        <label for="upload-icon-edit" class="position-relative">
                                                            <input type="file" id="upload-icon-edit"
                                                                   class="d-none" name="icon"
                                                                   accept="image/*">
                                                            <img class="view-icon" width="40" height="40"
                                                                 src="{{asset('media/common/150x150.png')}}"
                                                                 data-src="{{asset('media/common/150x150.png')}}">
                                                        </label>
                                                        <span class="ml-2">Icon</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 add-product">
                                                <div class="form-group">
                                                    <label class="text-primary">Ảnh đại diện</label>
                                                    <div>
                                                        <label class="dropzone needsclick dz-clickable w-100"
                                                               for="upload-edit">
                                                            <div class="dz-message needsclick my-0">
                                                                <span type="button"
                                                                      class="dz-button">Chọn ảnh upload</span>
                                                                <input type="file" id="upload-edit"
                                                                       class="d-none"
                                                                       name="image" accept="image/*"
                                                                       placeholder="Chọn ảnh upload">
                                                                <img class="view-image" data-src="" width="auto"
                                                                     height="170">
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-box">
                                        <h5>Mô tả</h5>
                                        <div class="editor-box">
                                            <textarea id="description-edit" name="description"
                                                      class="form-control">{{old('description')}}</textarea>
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
                                </div>
                                <div class="tab-pane fade pt-0" id="attribute" role="tabpanel"
                                     aria-labelledby="attribute-tab">
                                    <div class="d-flex justify-content-sm-end contact-options">
                                    <a href="javascript:void(0);" title="Thêm mới" class="pointer font-25 s-o mr-1 btn-create-attribute">
                                        <i class="las la-plus-circle"></i>
                                    </a>
                                    </div>
                                    <div class="table-responsive date-table-container ecommerce-table">
                                        <table class="table table-hover" id="attributeCategoryProduct">
                                            <thead>
                                            <tr class="tbl_head">
                                                <th class="th-content">STT</th>
                                                <th class="th-content">Mã</th>
                                                <th class="th-content">Thuộc tính</th>
                                                <th class="th-content">Giá trị</th>
                                                <th class="th-content">Chức năng</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
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
