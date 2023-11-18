@can('create', \App\Admin\Models\Customer::class)
    <div id="modal-create" class="modal" aria-modal="true" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm mới khách hàng</h5>
                    <button type="button" class="close m-0 p-0" data-dismiss="modal" aria-label="Close">
                        <i class="las la-times pointer las la-times pointer d-flex justify-content-end m-0"
                           data-dismiss="modal"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="create-customer">
                        <div class="statbox">
                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="row general-info">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 info">
                                        <div class="form-group">
                                            <label>Tên </label>
                                            <input type="text" class="form-control" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label>SĐT</label>
                                            <input type="number" min="0" max="12" class="form-control" name="phone">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group text-center">
                                            <label>
                                                Ảnh đại diện
                                            </label>
                                            <br>
                                            <label for="image">
                                                <img
                                                    src="{{asset('media/common/'.\App\Admin\Http\Helpers\Common::noImage)}}"
                                                    width="150" height="150" id="view-image" class="object-scale-down"
                                                    data-src="{{asset('media/common/'.\App\Admin\Http\Helpers\Common::noImage)}}">
                                            </label>
                                            <input type="file" accept="image/*" name="image" id="image" class="d-none">
                                        </div>
                                    </div>
                                    <div class="d-flex flex-wrap w-100">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group mt-3 mb-3">
                                                <div class="d-flex justify-content-between form-group">
                                                    <div class="d-flex align-center">
                                                        <div class="d-flex align-center mr-4">
                                                            <label for="male"
                                                                   class="mb-0 mr-2 text-black position-relative">Nam</label>
                                                            <input type="radio" id="male" name="gender" value="0"
                                                                   checked>
                                                        </div>
                                                        <div class="d-flex align-center">
                                                            <label for="female"
                                                                   class="mb-0 mr-2 text-black position-relative">Nữ</label>
                                                            <input type="radio" id="female" name="gender" value="1">
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-center">
                                                        <p class="m-0 mr-2"> Hiển thị trên trang chủ</p>
                                                        <label
                                                            class="switch switch-primary m-0 d-block position-sticky">
                                                            <input type="checkbox" name="show" checked><span
                                                                class="slider round"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group info mt-4">
                                                <label>Sinh nhật </label>
                                                <input type="date" class="form-control" name="birthday">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 info">
                                            <div class="form-group">
                                                <label>Tỉnh/TP</label>
                                                <select name="cities_id" class="form-control" id="targetId">
                                                    <option value="">Chọn</option>
                                                    @foreach($cities as $item)
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Quận/huyện</label>
                                                <select name="districts_id" class="form-control">
                                                    <option value="">Chọn</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group info col-12">
                                        <label class="text-primary">Địa chỉ</label>
                                        <textarea name="address" class="form-control" rows="1"></textarea>
                                    </div>
                                    <div class="d-flex flex-wrap info w-100">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Tên công ty</label>
                                                <input type="text" name="company_name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group info">
                                                <label>Mã số thuế</label>
                                                <input type="text" name="company_tax_code" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group info col-12">
                                        <label class="text-primary">Ghi chú</label>
                                        <textarea name="note" class="form-control" rows="1"></textarea>
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
@endcan
