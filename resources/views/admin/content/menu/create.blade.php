@can('create', \App\Admin\Models\Menu::class)
    <div id="modal-create" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title m-0" id="exampleModalScrollableTitle">Thêm mới liên kết</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <div class="modal-body general-info">
                    <form id="create-menu-item">
                        <div class="info">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Tên</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-12 d-flex">
                                <div class="col-6 px-0 pr-1">
                                    <div class="form-group">
                                        <label>Liên kết</label>
                                        <select name="collection" class="form-control multiple">
                                            <option value="">Chọn</option>
                                            <option value="1">Trang chủ</option>
                                            <option value="2">Blog</option>
                                            <option value="3">Sản phẩm</option>
                                            <option value="7">Liên hệ</option>
                                            <option value="4">Danh mục bài viết</option>
                                            <option value="5">Danh mục sản phẩm</option>
                                            <option value="6">Địa chỉ web</option>
                                            <option value="8">HTML</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 px-0 pl-1">
                                    <div class="box-news d-none">
                                        <div class="form-group">
                                            <select name="category_post" class="form-control multiple">
                                                @foreach($categoryPost as $item)
                                                        <option value="{{$item->slug}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="box-product d-none">
                                        <div class="form-group">
                                            <select name="category_product" class="form-control multiple">
                                                @foreach($categoryProduct as $item)
                                                        <option value="{{$item->slug}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="box-redirect d-none">
                                        <div class="form-group">
                                            <input type="text" name="redirect_web" class="form-control">
                                        </div>
                                    </div>
                                    <div class="box-html d-none">
                                        <div class="form-group">
                                            <textarea name="html_field" rows="3" class="form-control"></textarea>
                                        </div>
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
