<div id="modal-create" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Thêm mới báo giá</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="las la-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="create-quote">
                    <div class="row">
                        <div class="col-md-6 col-12 general-info">
                            <div class="form-group info">
                                <label>Tên(<span class="text-danger">*</span>)</label>
                                <input type="text" class="form-control mb-2" name="name" value="{{old('name')}}">
                            </div>
                            <div class="form-group info">
                                <label>Khoảng giá</label>
                                <input type="text" class="form-control mb-2" name="price_range"
                                       value="{{old('price_range')}}">
                            </div>
                            <div class="form-group info">
                                <label>Bảo hành</label>
                                <input type="text" class="form-control mb-2" name="warranty"
                                       value="{{old('warranty')}}">
                            </div>
                        </div>
                        <div class="col-md-6 col-12 general-info">
                            <div class="form-group">
                                <select name="type" class="form-control">
                                    <option value="0" selected>Báo giá linh kiện</option>
                                    <option value="1">Báo giá dịch vụ</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="parent" class="form-control multiple">
                                    <option value="0">Chọn danh mục gốc</option>
                                </select>
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
