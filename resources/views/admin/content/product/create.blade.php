<div id="modal-create" class="modal" aria-modal="true" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thêm mới sản phẩm</h5>
                <button type="button" class="close m-0 p-0" data-dismiss="modal" aria-label="Close">
                    <i class="las la-times pointer las la-times pointer d-flex justify-content-end m-0"
                       data-dismiss="modal"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="create-product">
                    <div class="row mt-3">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="productCode" class="strong">Mã sản phẩm (<span
                                        class="text-danger">*</span>) </label>
                                <div class="input-group">
                                    <input id="productCode" name="code" type="text"
                                           class="form-control form-control" value="{{old('code')}}">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="las la-random font-17 btn-rand"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="strong">Tên sản phẩm (<span
                                        class="text-danger">*</span>)</label>
                                <input id="name" name="name" type="text"
                                       class="form-control form-control typingInput" value="{{old('name')}}">
                            </div>
                            <div class="form-group">
                                <label for="slug" class="strong">Đường dẫn (<span
                                        class="text-danger">*</span>)</label>
                                <input id="slug" name="slug" type="text" value="{{old('slug')}}"
                                       class="form-control form-control slugChanged">
                            </div>
                            <div class="form-group">
                                <label>Danh mục</label>
                                <select name="category_id[]" class="form-control multiple" multiple>
                                    @foreach ($productCategory as $item)
                                        <option value="{{$item->id}}">
                                            {{str_repeat('━ ',$item->level).$item->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group px-2">
                                <p>Hiển thị</p>
                                <label class="switch switch-primary mr-2">
                                    <input type="checkbox" checked="checked"
                                           name="show">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Giá bán</label>
                                <input name="price" type="text" class="form-control currency" value="{{old('price')}}"
                                       min="0">
                            </div>
                            <div class="form-group">
                                <label>Giá thị trường</label>
                                <input name="price_market" type="text" class="form-control currency"
                                       value="{{old('price_market')}}" min="0">
                            </div>
                            <div class="form-group">
                                <label>Khoảng giá</label>
                                <input name="price_range" type="text" class="form-control" value="{{old('price_range')}}">
                            </div>
                            <div class="form-group">
                                <label>Giá nhập</label>
                                <input name="cost" type="text" class="form-control currency" value="{{old('cost')}}"
                                       min="0">
                            </div>
                            <div class="form-group">
                                <label>Bảo hành</label>
                                <input name="warranty" type="text" class="form-control"
                                       value="{{old('warranty')}}">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Ảnh đại diện</label>
                                <div class="form-group align-items-center d-flex justify-content-center">
                                    <label for="product-image">
                                        <img src="{{asset('media/common/'.\App\Admin\Http\Helpers\Common::noImage)}}"
                                             width="150" height="150" id="view-image" class="object-cover"
                                             data-src="{{asset('media/common/'.\App\Admin\Http\Helpers\Common::noImage)}}">
                                    </label>
                                    <input type="file" accept="image/*" name="image" id="product-image"
                                           class="d-none">
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
