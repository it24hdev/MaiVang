<div class="modal modal-order d-none">
    <div class="modal-background"></div>
    <div class="modal-content-content">
        <div class="close_modal"><i class="fa fa-times" id="close-order"></i></div>
        <div class="px-4">
            <div class="d-flex justify-content-center pb-4">
                <img width="150px" height="auto" alt="Logo" src="{{asset('media/common/logo/logo_header.png')}}">
            </div>
        </div>
        <div class="px-4 pb-4">
            <form id="form_order">
                <div class="mb-2">
                    <input type="text" name="name" placeholder="Họ tên(*)" class="input input__file my-2" autocomplete="off">
                </div>
                <div class="mb-2">
                    <input type="number" name="phone" placeholder="Số điện thoại(*)"
                           class="input input__file my-2">
                </div>
                <div class="mb-2 location">
                    <input type="text" name="address" class="input input__file my-2" autocomplete="off" placeholder="Địa chỉ">
                </div>
                <div class="mb-2">
                    <input type="datetime-local" name="booking_date" placeholder="Thời gian hẹn" class="input  input__file my-2">
                </div>
                <div class="mb-2">
                    <textarea rows="3" placeholder="Nhập yêu cầu.." class="input__file h-auto" name="note"></textarea>
                </div>
                <button type="button" class="btn-order submit-form mt-4">ĐẶT LỊCH</button>
            </form>
        </div>
    </div>
</div>

