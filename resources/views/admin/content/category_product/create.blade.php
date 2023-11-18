@can('create', \App\Admin\Models\CategoryProduct::class)
<div id="modal-create" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Thêm mới danh mục sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="las la-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="create-category-product">
                    <div class="card-box">
                        <h5>Cơ bản</h5>
                        <div class="statbox">
                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 general-info">
                                        <div class="form-group info">
                                            <label>Tên danh mục(<span class="text-danger">*</span>)</label>
                                            <input id="" type="text" class="form-control mb-2 typingInput" name="name" value="{{old('name')}}">
                                        </div>
                                        <div class="form-group">
                                            <select name="parent" class="form-control multiple">
                                                <option value="0">Chọn danh mục gốc</option>
                                            </select>
                                        </div>
                                        <div class="form-group info">
                                            <label>Slug(<span class="text-danger">*</span>)</label>
                                            <input type="text" class="form-control mb-2 slugChanged" name="slug" value="{{old('slug')}}">
                                        </div>
                                        <div class="form-group info">
                                            <label>Redirect</label>
                                            <input type="text" class="form-control mb-2" name="redirect"
                                                   value="{{old('redirect')}}">
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="form-group">
                                                <p> Hiển thị</p>
                                                <label class="switch switch-primary m-0 d-block position-sticky">
                                                    <input type="checkbox" name="show" checked>
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <p> Báo giá</p>
                                                <label class="switch switch-primary m-0 d-block position-sticky">
                                                    <input type="checkbox" name="offer">
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                            <div class="form-group d-flex align-center m-0">
                                                <label for="upload-icon" class="position-relative">
                                                    <input type="file" id="upload-icon" class="d-none" name="icon"
                                                           accept="image/*">
                                                    <img class="view-icon" width="30" height="30"
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
                                                <label class="dropzone needsclick dz-clickable w-100" for="upload">
                                                    <div class="dz-message needsclick my-0">
                                                        <span type="button" class="dz-button">Chọn ảnh upload</span>
                                                        <input type="file" id="upload" class="d-none"
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
                        </div>
                    </div>
                    <div class="card-box">
                        <h5>Mô tả</h5>
                        <div class="editor-box">
                            <textarea id="description" name="description" class="form-control">{{old('description')}}</textarea>
                        </div>
                    </div>
                    <div class="card-box">
                        <h5>Seo</h5>
                        <div class="statbox general-info">
                            <div class="col-xl-12 col-lg-12 col-md-12 info">
                                <div class="form-group">
                                    <label>Meta title</label>
                                    <input type="text" class="form-control mb-2" name="meta_title" value="{{old('meta_title')}}">
                                </div>
                                <div class="form-group">
                                    <label>Meta keyword</label>
                                    <input type="text" class="form-control mb-2" name="meta_keyword" value="{{old('meta_keyword')}}">
                                </div>
                                <div class="form-group">
                                    <label>Meta description</label>
                                    <textarea name="meta_description" class="form-control">{{old('meta_description')}}</textarea>
                                </div>
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
