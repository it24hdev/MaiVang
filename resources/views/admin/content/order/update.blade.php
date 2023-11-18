@can('update', \App\Admin\Models\Tax::class)
    <div id="modal-edit" class="modal" tabindex="-1" aria-modal="true" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cập nhật đơn hàng</h5>
                    <button type="button" class="close m-0 p-0" data-dismiss="modal" aria-label="Close">
                        <i class="las la-times pointer las la-times pointer d-flex justify-content-end m-0"
                           data-dismiss="modal"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit-order" enctype="multipart/form-data">
                        <div class="d-flex">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <h6>Tình trạng đơn hàng</h6>
                                <div class="form-group">
                                    <label class="text-primary">Nhận sự xử lý đơn</label>
                                    <select name="users_id" class="form-control">
                                        <option value="0">Chọn</option>
                                        @foreach($users as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="text-primary">Trạng thái thanh toán</label>
                                    <select name="status_payment" class="form-control">
                                        <option value="0">Chưa thanh toán</option>
                                        <option value="1">Đã thanh toán</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="text-primary">Trạng thái vận chuyển</label>
                                    <select name="status_transport" class="form-control">
                                        <option value="0">Đóng gói</option>
                                        <option value="1">Vận chuyển</option>
                                        <option value="2">Đã giao hàng</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="text-primary">Tình trạng đơn hàng</label>
                                    <select name="status" class="form-control">
                                        <option value="0">Chưa xử lý</option>
                                        <option value="1">Đang xử lý</option>
                                        <option value="2">Hoàn thành</option>
                                        <option value="3">Hủy</option>
                                        <option value="4">Đóng lại</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <h6>Thông tin đơn hàng</h6>
                                <div class="form-group">
                                    <label class="text-primary">Phí vận chuyển</label>
                                    <select name="transport_fees_id" class="form-control">
                                        <option value="0">Chọn</option>
                                        @foreach($transportFee as $item)
                                            <option value="{{$item->id}}">{{number_format($item->fee)}} (Đơn hàng dưới {{number_format($item->order_value)}})</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="text-primary">Ghi chú</label>
                                    <textarea name="note" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-sm btn-primary btn-update" data-dismiss="modal" value="Cập nhật">
                </div>
            </div>
        </div>
    </div>
@endcan
