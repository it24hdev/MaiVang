@extends('admin.layouts.base')
@section('body')
    @can('viewAny', \App\Admin\Models\PaymentMethod::class)
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
                <i class="las la-bars"></i>
            </a>
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Hệ thống</a></li>
                                <li class="breadcrumb-item active"><a href="{{route('admin.systems.payment_methods.index')}}">Phương thức thanh toán</a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!-- Main Body Starts -->
    <div class="layout-px-spacing">
        <div class="row layout-spacing pt-4">
            <div class="col-xl-3 col-lg-4 col-md-4 mb-4">
                <div class="profile-left mb-4">
                    <div>
                        <h5>Hệ Thống</h5>
                        <div class="profile-tabs tab-options-list pb-4">
                            <div class="nav flex-column nav-pills mb-sm-0 mb-3 mx-auto">
                                <a class="nav-link d-flex" href="{{route('admin.systems.branch.index')}}"><i
                                        class="las la-map-marked-alt font-20 mr-2"></i>Chi nhánh cửa hàng</a>
                                <a class="nav-link active d-flex"
                                   href="{{route('admin.systems.payment_methods.index')}}"><i
                                        class="las la-money-check font-20 mr-2"></i>Phương thức thanh toán</a>
                                <a class="nav-link d-flex" href="{{route('admin.systems.shipping_methods.index')}}"><i
                                        class="las la-shipping-fast font-20 mr-2"></i>Phương thức vận chuyển</a>
                                <a class="nav-link d-flex" href="{{route('admin.systems.transport_fee.index')}}"><i
                                        class="las la-coins font-20 mr-2"></i>Phí vận chuyển</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="profile-left">
                    <div>
                        <h5>Giao diện người dùng</h5>
                        <div class="profile-tabs tab-options-list">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-8">
                <div class="statbox widget box box-shadow mb-4 py-2">
                    <div class="general-info box-info-profile">
                        <div class="widget-heading m-0 d-flex flex-wrap justify-content-between align-center">
                            <h5>Cài đặt phương thức thanh toán</h5>
                            <div class="d-flex justify-content-sm-end justify-content-center contact-options">
                                @can('create', \App\Admin\Models\PaymentMethod::class)
                                    <a class="pointer s-o mr-2 bs-tooltip btn-create" href="javascript:void(0);"
                                       title="Thêm mới" data-toggle="modal" data-target="#modal-create">
                                        <i class="las la-plus-circle"></i>
                                    </a>
                                @endcan
                                <a class="pointer s-o mr-2 bs-tooltip" title="reload"
                                   onClick="window.location.reload();">
                                    <i class="las la-sync-alt"></i>
                                </a>
                            </div>
                        </div>
                        <div class="widget-content d-flex flex-wrap">
                            <div class="col-12 normal-tab">
                                <ul class="nav nav-tabs mb-2 mt-2" role="tablist" id="change-tab-payment-methods">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#tab-list-payment-methods"
                                           role="tab" aria-controls="tab-list-payment-methods" aria-selected="true">Sử
                                            dụng</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tab-list-payment-methods-trashed"
                                           role="tab" aria-controls="tab-list-payment-methods-trashed"
                                           aria-selected="true">Không sử dụng</a>
                                    </li>
                                </ul>
                                <div class="tab-content date-table-container switch-outer-container ecommerce-table overflow-auto">
                                    <div class="tab-pane fade show active pt-0" id="tab-list-payment-methods"
                                     role="tabpanel" aria-labelledby="tab-list-payment-methods">
                                        <table id="listPaymentMethods" class="table table-hover dataTable">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">STT</th>
                                                    <th class="text-center">Phân loại</th>
                                                    <th class="text-center">Phương thức</th>
                                                    <th class="text-center">Cập nhật</th>
                                                    <th class="text-center">Thứ tự</th>
                                                    <th class="text-center">Trạng thái</th>
                                                    <th class="text-center">Chức năng</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade pt-0" id="tab-list-payment-methods-trashed"
                                         role="tabpanel" aria-labelledby="tab-list-payment-methods-trashed">
                                        <table id="listPaymentMethodsTrashed" class="table table-hover dataTable">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">STT</th>
                                                    <th class="text-center">Phân loại</th>
                                                    <th class="text-center">Phương thức</th>
                                                    <th class="text-center">Cập nhật</th>
                                                    <th class="text-center">Thứ tự</th>
                                                    <th class="text-center">Trạng thái</th>
                                                    <th class="text-center">Chức năng</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Body Ends -->
    @include('admin.content.payment_method.delete')
    @include('admin.content.payment_method.edit')
    @include('admin.content.payment_method.restore')
    @include('admin.content.payment_method.create')
    @endcan
@endsection
@section('css')
    <!-- Page Level Plugin/Style Starts -->
    <link href="{{asset('css/admin/profile.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/profile_edit.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/form-widgets.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/dt-global_style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/custom-switch.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('library/datatable/datatables.css')}}" rel="stylesheet" type="text/css">

    <!-- Page Level Plugin/Style Ends -->
@endsection
@section('js')
    <!-- Page Level Plugin/Script Starts -->
    <script src="{{asset('library/datatable/datatables.js')}}"></script>
    <!-- Page Level Plugin/Script Ends -->
    <script>
        $(document).ready(function () {
            load();
            /** Hiển thị danh sách*/
            function load() {
                $('.tooltip').hide();
                $.ajax({
                    async: true,
                    url: "{{route('admin.systems.payment_methods.load')}}",
                    method: "post",
                    dataType: "json",
                    success: function (output) {
                        $('#listPaymentMethods').DataTable().destroy();
                        $('#listPaymentMethods').DataTable({
                            data: output.paymentMethods,
                            columns: [
                                {
                                    data: 'id',
                                    render: function (data, type, row, meta) {
                                        return meta.row + meta.settings._iDisplayStart + 1;
                                    }
                                },
                                {
                                    data: 'type',
                                    render: function (data) {
                                        if(data === "cod"){
                                            return 'Tiền mặt khi nhận hàng (COD)';
                                        }
                                        if(data === "atm"){
                                            return 'Thẻ ATM/Chuyển khoản (Internet Banking)';
                                        }
                                        if(data === "credit_card"){
                                            return 'Thẻ tín dụng Visa/Master';
                                        }
                                        if(data === "paygate"){
                                            return 'Cổng thanh toán (VNPay, Payoo, ViettelPay ..)';
                                        }
                                        if(data === "wallet"){
                                            return 'Ví điện tử (Moca, Momo ..)';
                                        }
                                        if(data === "member_point"){
                                            return 'Điểm thành viên (trừ điểu tích lũy của thành viên)';
                                        }
                                        if(data === "other"){
                                            return 'Hình thức khác';
                                        }
                                    }
                                },
                                {data: 'name'},
                                {
                                    data: { created_at: "created_at", user_name: "user_name"},
                                    render: function(data){
                                        var date = new Date(data.created_at);
                                        return '<p>'+date.toLocaleDateString()+'</p>'+
                                            '<p>'+data.user_name+'</p>';
                                    },
                                },
                                {data: 'order_number'},
                                {
                                    data: {status:"status", id:"id"},
                                    render: function (data) {
                                        if(data.status === 1){
                                            return '<label class="switch switch-primary  m-auto d-block"><input type="checkbox" class="btn-status" checked="checked" name="status" value="1" data-value="'+data.id+'"><span class="slider round"></span></label>';
                                        }else{
                                            return '<label class="switch switch-primary  m-auto d-block"><input type="checkbox" class="btn-status" name="status" value="0" data-value="'+data.id+'"><span class="slider round"></span></label>';
                                        }
                                    }
                                },
                                {
                                    data: 'id',
                                    render: function (data) {
                                        return '<div class="d-flex justify-content-center">' +
                                            '<a href="javascript:void(0);"class="bs-tooltip font-20 text-primary btn-edit" title="Cập nhật" data-toggle="modal" data-target="#modal-edit" data-value="' + data + '">' +
                                            '<i class="las la-edit"></i></a>' +
                                            '<a href="javascript:void(0);" class="bs-tooltip font-20 text-danger ml-2 btn-delete" title="Xóa" data-toggle="modal" data-target="#modal-delete" data-value="' + data + '">' +
                                            '<i class="las la-trash-alt"></i></a>' +
                                            '</div>';
                                    },
                                },
                            ],
                            language: {
                                "paginate": {
                                    "previous": "<i class='las la-angle-left'></i>",
                                    "next": "<i class='las la-angle-right'></i>"
                                }
                            },
                            columnDefs: [
                                {type: "num"},
                                {className: 'text-center', targets: [0, 4, 5,6 ]},
                                {className: 'text-left', targets: [1,2,3]},
                            ],
                            lengthMenu: [10, 25, 50, 100],
                            pageLength: 10,
                        });

                        $('#listPaymentMethodsTrashed').DataTable().destroy();
                        $('#listPaymentMethodsTrashed').DataTable({
                            data: output.paymentMethodsTrashed,
                            columns: [
                                {data: 'id'},
                                {
                                    data: 'type',
                                    render: function (data) {
                                        if(data === "cod"){
                                            return 'Tiền mặt khi nhận hàng (COD)';
                                        }
                                        if(data === "atm"){
                                            return 'Thẻ ATM/Chuyển khoản (Internet Banking)';
                                        }
                                        if(data === "credit_card"){
                                            return 'Thẻ tín dụng Visa/Master';
                                        }
                                        if(data === "paygate"){
                                            return 'Cổng thanh toán (VNPay, Payoo, ViettelPay ..)';
                                        }
                                        if(data === "wallet"){
                                            return 'Ví điện tử (Moca, Momo ..)';
                                        }
                                        if(data === "member_point"){
                                            return 'Điểm thành viên (trừ điểu tích lũy của thành viên)';
                                        }
                                        if(data === "other"){
                                            return 'Hình thức khác';
                                        }
                                    }
                                },
                                {data: 'name'},
                                {
                                    data: { created_at: "created_at", user_name: "user_name"},
                                    render: function(data){
                                        var date = new Date(data.created_at);
                                        return '<p>'+date.toLocaleDateString()+'</p>'+
                                            '<p>'+data.user_name+'</p>';
                                    },
                                },
                                {data: 'order_number'},
                                {
                                    data: 'status',
                                    render: function (data) {
                                        if(data === 1){
                                            return '<label class="switch switch-primary  m-auto d-block"><input type="checkbox" checked="checked"  disabled><span class="slider round"></span></label>';
                                        }else{
                                            return '<label class="switch switch-primary  m-auto d-block"><input type="checkbox" disabled><span class="slider round"></span></label>';
                                        }
                                    }
                                },
                                {
                                    data: 'id',
                                    render: function (data) {
                                        return '<div class="d-flex justify-content-center">' +
                                            '<a href="javascript:void(0);"class="bs-tooltip font-20 text-success btn-restore" title="Khôi phục" data-toggle="modal" data-target="#modal-restore" data-value="' + data + '">' +
                                            '<i class="las la-sync"></i></a>'+
                                            '</div>';
                                    },
                                },
                            ],
                            language: {
                                "paginate": {
                                    "previous": "<i class='las la-angle-left'></i>",
                                    "next": "<i class='las la-angle-right'></i>"
                                }
                            },
                            lengthMenu: [10, 25, 50, 100],
                            pageLength: 10,
                        });
                    }
                });
            }

            /** reset form thêm mới*/
            $(document).on('click', '.btn-create', function () {
                $('#modal-create form#form-create-payment-methods')[0].reset();
                $('#modal-create form#form-create-payment-methods').find(':checkbox').prop('checked', true);
                $('#modal-create form#form-create-payment-methods .text-error').remove();
                $('.btn-store').attr('disabled',false);
            });

            /** Thêm mới mới phương thức thanh toán */
            $(document).on('click', '.btn-store', function () {
                $('form#form-create-payment-methods .text-error').remove();

                $('.btn-store').attr('disabled',true);
                var name = $('#form-create-payment-methods input[name="name"]');
                var type = $('#form-create-payment-methods select[name="type"]');
                var order_number = $('#form-create-payment-methods input[name="order_number"]');
                var describe = $('#form-create-payment-methods textarea[name="describe"]');
                var status = $('#form-create-payment-methods input[name="status"]');
                var input = {
                    name: name.val(),
                    type: type.val(),
                    order_number: order_number.val(),
                    describe: describe.val(),
                    status: status.is(':checked')?1:0,
                };
                $.ajax({
                    url: "{{route('admin.systems.payment_methods.store')}}",
                    method: "post",
                    data: input,
                    dataType: "json",
                    success: function (output) {
                        if (output.success) {
                            load();
                            Snackbar.show({
                                text: 'Thêm mới thành công',
                                pos: 'top-center'
                            });

                        } else {
                            Snackbar.show({
                                text: 'Lỗi',
                                pos: 'top-center'
                            });
                        }
                        $('#modal-create').modal('hide');
                    },
                    error: function (output) {
                        $('.btn-store').attr('disabled',false);
                        var message = output.responseJSON.errors;
                        if (message.name) {
                            name.after(error(message.name));
                        }
                        if (message.type) {
                            type.after(error(message.type));
                        }
                        if (message.describe) {
                            describe.after(error(message.describe));
                        }
                        if (message.order_number) {
                            order_number.after(error(message.order_number));
                        }
                    }
                });
            })

            /** Form cập nhật phương thức thanh toán */
            $(document).on('click', '.btn-edit', function () {
                $('form#update-payment-methods')[0].reset();
                $('form#update-payment-methods .text-error').remove();
                $('.btn-update').attr('disabled',false);
                var id = $(this).attr('data-value');
                var input = {
                    id: id,
                }
                $.ajax({
                    url: "{{route('admin.systems.payment_methods.edit')}}",
                    method: "POST",
                    data: input,
                    dataType: "json",
                    success: function (output) {
                        if(output.success){
                            $('#update-payment-methods input[name="name"]').val(output.paymentMethods.name);
                            $('#update-payment-methods input[name="id"]').val(output.paymentMethods.id);
                            $('#update-payment-methods select[name="type"]').find("option").each(function () {
                                if ($(this).val() === output.paymentMethods.type) {
                                    $(this).prop("selected", "selected");
                                }
                            });
                            $('#update-payment-methods input[name="order_number"]').val(output.paymentMethods.order_number);
                            $('#update-payment-methods textarea[name="describe"]').val(output.paymentMethods.describe);
                            if (output.paymentMethods.status === 1) {
                                $('#update-payment-methods input[name="status"]')[0].checked = true;
                            }
                            else{
                                $('#update-payment-methods input[name="status"]')[0].checked = false;
                            }
                            $('#update-payment-methods input[type="button"]').attr('data-value', id);
                        }
                        else{
                            Snackbar.show({
                                text: 'Lỗi',
                                pos: 'top-center'
                            });
                        }
                    }
                })
            });

            /** Cập nhật phương thức thanh toán */
            $(document).on('click', '.btn-update-1', function () {
                $('form#update-payment-methods .text-error').remove();
                $('.btn-update').attr('disabled',true);
                var id = $('#update-payment-methods input[name="id"]');
                var name = $('#update-payment-methods input[name="name"]');
                var type = $('#update-payment-methods select[name="type"]');
                var order_number = $('#update-payment-methods input[name="order_number"]');
                var describe = $('#update-payment-methods textarea[name="describe"]');
                var status = $('#update-payment-methods input[name="status"]');

                var input = {
                    id: id.val(),
                    name: name.val(),
                    type: type.val(),
                    order_number: order_number.val(),
                    describe: describe.val(),
                    status: status.is(':checked')?1:0,
                }

                $.ajax({
                    url: "{{route('admin.systems.payment_methods.update')}}",
                    method: "POST",
                    data: input,
                    dataType: "json",
                    success: function (output) {
                        if (output.success) {
                            load();
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
                        $('#modal-edit').modal('hide');
                    },
                    error: function (output) {
                        $('.btn-update').attr('disabled',false);
                        var message = output.responseJSON.errors;
                        if (message.name) {
                            name.after(error(message.name));
                        }
                        if (message.type) {
                            type.after(error(message.type));
                        }
                        if (message.describe) {
                            describe.after(error(message.describe));
                        }
                        if (message.order_number) {
                            order_number.after(error(message.order_number));
                        }
                    }
                });
            });

            /** Xác nhận xóa */
            $(document).on('click', '#destroy', function () {
                var id = $(this).attr('data-value');
                var url = "{{route('admin.systems.payment_methods.destroy')}}";
                var data = {
                    id: id,
                }
                $.ajax({
                    url: url,
                    method: "POST",
                    data: data,
                    dataType: "json",
                    success: function (data) {
                        if (data.success) {
                            load();
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
                })
            });

            /** Xác nhận khôi phục */
            $(document).on('click', '#restore', function () {
                var id = $(this).attr('data-value');
                var url = "{{route('admin.systems.payment_methods.restore')}}";
                var data = {
                    id: id,
                }
                $.ajax({
                    url: url,
                    method: "POST",
                    data: data,
                    dataType: "json",
                    success: function (data) {
                        if (data.success) {
                            Snackbar.show({
                                text: 'Khôi phục thành công',
                                pos: 'top-center'
                            });
                            load();
                        } else {
                            Snackbar.show({
                                text: 'Có lỗi xảy ra',
                                pos: 'top-center'
                            });
                        }
                    }
                })
            });

            /** Thay đổi trạng thái */
            $(document).on('click','.btn-status', function () {
                var status = $(this).is(':checked')?1:0;
                var id = $(this).attr('data-value');
                var url = "{{route('admin.systems.payment_methods.change_status')}}";
                changeStatus(status,id,url);
            });
        })
    </script>
@endsection
