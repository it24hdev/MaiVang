@can('update', \App\Admin\Models\Attribute::class)
    <div id="modal-edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title m-0" id="exampleModalScrollableTitle">Cập nhật thuộc tính</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <div class="modal-body general-info">
                    <form id="update-attribute">
                        <div class="card-box add-product">
                            <h6 class="mb-4">Cơ bản</h6>
                            <div class="d-flex flex-wrap">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 info">
                                    <div class="form-group">
                                        <label>Tên thuộc tính (<span class="text-danger">*</span>)</label>
                                        <input type="text" name="name" class="form-control">
                                        <input type="text" name="id" class="form-control d-none">
                                    </div>
                                    <div class="form-group">
                                        <label>Mã thuộc tính (<span class="text-danger">*</span>)</label>
                                        <input type="text" name="code" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 info">
                                    <div class="form-group">
                                        <label>Diễn giải</label>
                                        <textarea class="form-control" name="description" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="card-box add-product">
                        <div class="d-flex justify-content-between">
                            <h6>Quản lý giá trị</h6>
                            <div class="dropdown custom-dropdown-icon">
                                <div class="d-flex justify-content-sm-end justify-content-center contact-options">
                                    <a href="javascript:void(0);" title="" data-toggle="modal" data-target="#modal-create-child" class="pointer font-25 s-o mr-1 bs-tooltip btn-create-child" data-original-title="Thêm mới giá trị">
                                        <i class="las la-plus-circle"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive date-table-container ecommerce-table">
                            <table class="table table-hover" id="AttributeChild">
                                <thead>
                                <th class="text-center">STT</th>
                                <th class="text-center">Mã</th>
                                <th class="text-center">Giá trị</th>
                                <th class="text-center">Diễn giải</th>
                                <th class="text-center">Thứ tự</th>
                                <th class="text-center">Chức năng</th>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-update">Cập nhật</button>
                </div>
            </div>
        </div>
    </div>
@endcan
