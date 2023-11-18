$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /** Nút xóa */
    $(document).on('click','.btn-delete',function (e) {
        e.preventDefault();
        $('#destroy').attr('data-value',$(this).attr('data-value'));
    });

    /** Nút xóa nhiều */
    $(document).on('click','.btn-multiple-delete',function (e) {
        e.preventDefault();
        $('#multiple-destroy').attr('data-value',$(this).attr('data-value'));
    });

    /** Nút Khôi phục */
    $(document).on('click','.btn-restore',function (e) {
        e.preventDefault();
        $('#restore').attr('data-value',$(this).attr('data-value'));
    });

    /** Nút chọn nhiều */
    $(document).on('click','#cbxall',function () {
        if($(this).is(':checked')){
            $('input[name="cbx[]"]').each(function() {
                this.checked = true;
            });
        }
        else{
            $('input[name="cbx[]"]').each(function() {
                this.checked = false;
            });
        }
    });

    /** Xóa */
    window.destroy =  function (id, url) {
        var data = {
            id: id,
        }
        $.ajax({
            async:false,
            url: url,
            method: "POST",
            data: data,
            dataType: "json",
            success: function (data) {
                if (data.success) {
                    $('#row_' + id).remove();
                    Snackbar.show({
                        text: 'Xóa thành công',
                        pos: 'top-center'
                    });
                } else {
                    Snackbar.show({
                        text: 'Có lỗi xảy ra',
                        pos: 'top-center'
                    });
                }
            }
        });
    };

    /** Xóa nhiều */
    window.destroys = function(arr, url){
        if(arr.length > 0){
            var data = {
                arr: arr,
            }
            $.ajax({
                async:false,
                url: url,
                method: "POST",
                data: data,
                dataType: "json",
                success: function (data) {
                    if (data.success) {
                        arr.forEach(function (id) {
                            $('#row_' + id).remove();
                        });
                        if($('#cbxall').is(':checked')){
                            $('#cbxall')[0].checked = false;
                        };
                        if(!$('.multiple-destroy').hasClass('d-none')){
                            $('.multiple-destroy').addClass('d-none');
                        }
                        Snackbar.show({
                            text: 'Xóa thành công',
                            pos: 'top-center'
                        });
                    } else {
                        Snackbar.show({
                            text: 'Có lỗi xảy ra',
                            pos: 'top-center'
                        });
                    }
                }
            });
        }
    };

    /** Khôi phục */
    window.restore = function (id, url) {
        var data = {
            id: id,
        }
        $.ajax({
            async:false,
            url: url,
            method: "POST",
            data: data,
            dataType: "json",
            success: function (data) {
                if (data.success) {
                    $('#row_' + id).remove();
                    Snackbar.show({
                        text: 'Khôi phục thành công',
                        pos: 'top-center'
                    });
                } else {
                    Snackbar.show({
                        text: 'Có lỗi xảy ra',
                        pos: 'top-center'
                    });
                }
            }
        })
    };

    /** Phản hồi lỗi */
    window.error = function (content) {
        return '<span class="invalid-feedback d-block text-error">'+content+'</span>'
    };

    /** Phản hồi hoàn thành */
    window.success = function (content) {
        return '<span class="valid-feedback d-block text-success">'+content+'</span>'
    };

    /** Thay đổi trạng thái */
    window.changeStatus = function (status, id , url) {
        var input = {
            status: status,
            id:id,
        }
        $.ajax({
            async:false,
            url: url,
            method: "POST",
            data: input,
            dataType: "json",
            success: function (data) {
                if (data.success) {
                    Snackbar.show({
                        text: 'Cập nhật thành công',
                        pos: 'top-center'
                    });
                } else {
                    Snackbar.show({
                        text: 'Có lỗi xảy ra',
                        pos: 'top-center'
                    });
                }
            }
        })
    };

    /** Xử lý định dạng tiền tệ */
    $(document).on('keyup', 'input.currency', function () {
        const number = this.value;
        const loaibokitudacbiet =  number.replace(/[^a-zA-Z0-9 ]/g, '');
        this.value = new Intl.NumberFormat('vi-VN').format(loaibokitudacbiet);
    });

    /** chuyển chữ đang nhập sang dạng slug */

    $(document).on('keyup','.typingInput',function(){
        $('.slugChanged').val(slug($(this).val()));
    });

    $('.slugChanged').on('change',  function(){
        $('.slugChanged').val(slug($(this).val()));
    });

    /** hàm chuyển chữ sang slug */
    function slug(str){
        // Chuyển hết sang chữ thường
        str = str.toLowerCase();
        // xóa dấu
        str = str.replace(/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/g, 'a');
        str = str.replace(/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/g, 'e');
        str = str.replace(/(ì|í|ị|ỉ|ĩ)/g, 'i');
        str = str.replace(/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/g, 'o');
        str = str.replace(/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/g, 'u');
        str = str.replace(/(ỳ|ý|ỵ|ỷ|ỹ)/g, 'y');
        str = str.replace(/(đ)/g, 'd');
        // Xóa ký tự đặc biệt
        str = str.replace(/([^0-9a-z-\s])/g, '');
        // Xóa khoảng trắng thay bằng ký tự -
        str = str.replace(/(\s+)/g, '-');
        // xóa phần dư - ở đầu
        str = str.replace(/^-+/g, '');
        // xóa phần dư - ở cuối
        str = str.replace(/-+$/g, '');
        return str;
    }

});
