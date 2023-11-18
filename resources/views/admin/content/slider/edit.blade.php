<div id="modal-edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title m-0" id="exampleModalScrollableTitle">Cập nhật slider</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="las la-times"></i>
                </button>
            </div>
            <div class="modal-body general-info">
                <form id="update-slider">
                    <div class="d-flex flex-wrap">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Tên</label>
                                <input type="text" name="name" class="form-control">
                                <input type="text" name="id" class="d-none">
                            </div>
                            <div class="form-group">
                                <label>Redirect</label>
                                <input type="text" name="slug" class="form-control" placeholder="https://">
                            </div>
                            <div class="form-group">
                                <label>Vị trí</label>
                                <select class="form-control" name="position_id">
                                    <option value="" selected></option>
                                    @foreach($positions as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group w-50">
                                <label>Thứ tự</label>
                                <input type="number" name="order_number" min="0" value="0" class="form-control">
                            </div>

                            <div class="form-group w-50">
                                <p> Trạng thái</p>
                                <label
                                    class="switch switch-primary m-0 d-block position-sticky">
                                    <input type="checkbox" name="status"><span
                                        class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group text-center">
                                <label>
                                    Ảnh trên Web
                                </label>
                                <br>
                                <label for="image_web_edit">
                                    <img src="{{asset('media/common/'.\App\Admin\Models\Slider::noImage)}}"
                                         width="150" height="150" id="view_image_web_edit" class="object-scale-down"
                                         data-src="{{asset('media/common/'.\App\Admin\Models\Slider::noImage)}}">
                                </label>
                                <input type="file" accept="image/*" name="image_web" id="image_web_edit"
                                       class="d-none">
                            </div>

                            <div class="form-group text-center">
                                <label>
                                    Ảnh trên mobile
                                </label>
                                <br>
                                <label for="image_mobile_edit">
                                    <img src="{{asset('media/common/'.\App\Admin\Models\Slider::noImage)}}"
                                         width="150" height="150" id="view_image_mobile_edit" class="object-scale-down"
                                         data-src="{{asset('media/common/'.\App\Admin\Models\Slider::noImage)}}">
                                </label>
                                <input type="file" accept="image/*" name="image_mobile" id="image_mobile_edit"
                                       class="d-none">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-update">Cập nhật</button>
            </div>
        </div>
    </div>
</div>
