
<div id="modal-edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Cập nhật báo giá</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="las la-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="update-quote">
                    <div class="row">
                        <div class="col-md-6 col-12 general-info mt-3">
                            <div class="form-group info">
                                <label>Tên(<span class="text-danger">*</span>)</label>
                                <input type="text" class="form-control mb-2" name="name">
                                <input type="text" class="form-control mb-2 d-none" name="id">
                            </div>
                            <div class="form-group info">
                                <label>Khoảng giá</label>
                                <input type="text" class="form-control mb-2" name="price_range">
                            </div>
                            <div class="form-group info">
                                <label>Bảo hành</label>
                                <input type="text" class="form-control mb-2" name="warranty">
                            </div>
                        </div>
                        <div class="col-md-6 col-12 general-info mt-3">
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

