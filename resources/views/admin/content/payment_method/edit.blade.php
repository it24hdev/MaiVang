@can('update', \App\Admin\Models\PaymentMethod::class)
<div id="modal-edit" class="modal" tabindex="-1" aria-modal="true" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cập nhật phương thức thanh toán</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="las la-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="update-payment-methods" class="general-info">
                    <div class="col-12 d-flex flex-wrap switch-outer-container">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Tên phương thức</label>
                                <input type="text" name="name" class="form-control">
                                <input type="text" name="id" class="form-control d-none">
                            </div>
                            <div class="form-group">
                                <label>Phân loại</label>
                                <select class="form-control m-0" name="type">
                                    <option value="cod">Tiền mặt khi nhận hàng (COD)</option>
                                    <option value="atm">Thẻ ATM/Chuyển khoản (Internet Banking)</option>
                                    <option value="credit_card">Thẻ tín dụng Visa/Master</option>
                                    <option value="paygate">Cổng thanh toán (VNPay, Payoo, ViettelPay ..)
                                    </option>
                                    <option value="wallet">Ví điện tử (Moca, Momo ..)</option>
                                    <option value="member_point">Điểm thành viên (trừ điểu tích lũy của
                                        thành viên)
                                    </option>
                                    <option value="other">Hình thức khác</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Thứ tự xuất hiện</label>
                                <input type="number" name="order_number" class="form-control" min="0">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Nội dung chi tiết</label>
                                <textarea class="form-control" name="describe" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <lable>Trạng thái</lable>
                                <label class="switch switch-primary m-0 d-block position-sticky">
                                    <input type="checkbox" checked="checked" name="status"><span
                                        class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-primary btn-update-1" value="Cập nhật">
            </div>
        </div>
    </div>
</div>
@endcan
