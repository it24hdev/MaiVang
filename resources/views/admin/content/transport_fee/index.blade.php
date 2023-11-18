@extends('admin.layouts.base')
@section('body')
    @can('viewAny', \App\Admin\Models\TransportFee::class)
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
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Hệ thống</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a href="{{route('admin.systems.transport_fee.index')}}">Phí vận chuyển</a>
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
                                    @can('viewAny', \App\Admin\Models\Branch::class)
                                        <a class="nav-link d-flex" href="{{route('admin.systems.branch.index')}}"><i
                                                class="las la-map-marked-alt font-20 mr-2"></i>Chi nhánh cửa hàng</a>
                                    @endcan
                                    @can('viewAny', \App\Admin\Models\PaymentMethod::class)
                                        <a class="nav-link d-flex"
                                           href="{{route('admin.systems.payment_methods.index')}}"><i
                                                class="las la-money-check font-20 mr-2"></i>Phương thức thanh toán</a>
                                    @endcan
                                    @can('viewAny', \App\Admin\Models\ShippingMethod::class)
                                        <a class="nav-link d-flex"
                                           href="{{route('admin.systems.shipping_methods.index')}}"><i
                                                class="las la-shipping-fast font-20 mr-2"></i>Phương thức vận chuyển</a>
                                    @endcan
                                    @can('viewAny', \App\Admin\Models\TransportFee::class)
                                        <a class="nav-link d-flex active" href="{{route('admin.systems.transport_fee.index')}}"><i
                                                class="las la-coins font-20 mr-2"></i>Phí vận chuyển</a>
                                    @endcan
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
                                <h5>Cài đặt phí vận chuyển</h5>
                                <div class="d-flex justify-content-sm-end justify-content-center contact-options">
                                    @can('create', \App\Admin\Models\TransportFee::class)
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
                            <div class="widget-content date-table-container mt-3 ecommerce-table overflow-auto">
                                <table id="transportFees" class="table table-hover dataTable text-center">
                                    <thead>
                                    <tr>
                                        <th class="text-center">STT</th>
                                        <th class="text-center">Giá trị đơn hàng dưới mức</th>
                                        <th class="text-center">Phí thu hộ (VNĐ)</th>
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
        <!-- Main Body Ends -->
        @include('admin.content.transport_fee.delete')
        @include('admin.content.transport_fee.edit')
        @include('admin.content.transport_fee.create')
    @endcan
@endsection
@section('css')
    <!-- Page Level Plugin/Style Starts -->
    <link href="{{asset('css/admin/profile.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/profile_edit.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/select2.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/form-widgets.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/dt-global_style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/custom-switch.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('library/datatable/datatables.css')}}" rel="stylesheet" type="text/css">
    <!-- Page Level Plugin/Style Ends -->
@endsection
@section('js')
    <!-- Page Level Plugin/Script Starts -->
    <script src="{{asset('js/admin/select2.min.js')}}"></script>
    <script src="{{asset('js/admin/custom-select2.js')}}"></script>
    <script src="{{asset('library/datatable/datatables.js')}}"></script>
    <script src="{{asset('library/datatable/datatables.buttons.min.js')}}"></script>
    <!-- Page Level Plugin/Script Ends -->
    <script>
        $(document).ready(function () {
            load();
            /** Load danh sách */
            function load() {
                $('.tooltip').hide();
                $.ajax({
                    async: true,
                    url: "{{route('admin.systems.transport_fee.load')}}",
                    method: "post",
                    dataType: "json",
                    success: function (output) {
                        $('#transportFees').DataTable().destroy();
                        $('#transportFees').DataTable({
                            data: output.transportFees,
                            columns: [
                                {
                                    data: 'id',
                                    render: function (data, type, row, meta) {
                                        return meta.row + meta.settings._iDisplayStart + 1;
                                    }
                                },
                                {
                                    data: 'order_value',
                                    render: function (data) {
                                        return new Intl.NumberFormat('vi-VN').format(data);
                                    }
                                },
                                {
                                    data: 'fee',
                                    render: function (data) {
                                        return new Intl.NumberFormat('vi-VN').format(data);
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
                                {className: 'text-center', targets: [0, 1, 2, 3]},
                            ],
                            lengthMenu: [10, 25, 50, 100],
                            pageLength: 10,
                        });

                    }
                });
            }

            /** reset form thêm mới*/
            $(document).on('click', '.btn-create', function () {
                $('#modal-create form#form-create-transport-fee')[0].reset();
                $('#modal-create form#form-create-transport-fee .text-error').remove();
                $('.btn-store').attr('disabled',false);
            });

            /** Thêm mới phí vận chuyển */
            $(document).on('click', '.btn-store', function () {
                $('#form-create-transport-fee .text-error').remove();
                $('.btn-store').attr('disabled',true);
                var order_value = $('#form-create-transport-fee input[name="order_value"]');
                var fee = $('#form-create-transport-fee input[name="fee"]');
                const reFee =  fee.val().replace(/[^a-zA-Z0-9 ]/g, '');
                const reOrderValue =  order_value.val().replace(/[^a-zA-Z0-9 ]/g, '');
                var input = {
                    order_value: reOrderValue,
                    fee: reFee,
                };
                $.ajax({
                    url: "{{route('admin.systems.transport_fee.store')}}",
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
                        if (message.order_value) {
                            order_value.after(error(message.order_value));
                        }
                        if (message.fee) {
                            fee.after(error(message.fee));
                        }
                    }
                });
            });

            /** Xác nhận xóa */
            $(document).on('click', '#destroy', function () {
                var id = $(this).attr('data-value');
                var url = "{{route('admin.systems.transport_fee.destroy')}}";
                var data = {
                    id: id,
                    _token: _token
                }
                $.ajax({
                    url: url,
                    method: "POST",
                    data: data,
                    dataType: "json",
                    success: function (output) {
                        if (output.success) {
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

            /** Form cập nhật */
            $(document).on('click', '.btn-edit', function () {
                $('form#update-transport-fee')[0].reset();
                $('form#update-transport-fee .text-error').remove();
                $('.btn-update').attr('disabled',false);
                var id = $(this).attr('data-value');
                var input = {
                    id: id,
                }
                $.ajax({
                    url: "{{route('admin.systems.transport_fee.edit')}}",
                    method: "POST",
                    data: input,
                    dataType: "json",
                    success: function (output) {
                        $('#update-transport-fee input[name="order_value"]').val(new Intl.NumberFormat('vi-VN').format(output.transportFee.order_value));
                        $('#update-transport-fee input[name="fee"]').val(new Intl.NumberFormat('vi-VN').format(output.transportFee.fee));
                        $('#update-transport-fee input[name="id"]').val(id);
                    }
                })
            });

            /** Cập nhật */
            $(document).on('click', '.btn-update', function () {
                $('#update-transport-fee .text-error').remove();
                $('.btn-update').attr('disabled',true);
                var id = $('#update-transport-fee input[name="id"]');
                var order_value = $('#update-transport-fee input[name="order_value"]');
                var fee = $('#update-transport-fee-fee input[name="fee"]');
                var reFee = 0
                var reOrderValue = 0;
                if(fee.val() != undefined){
                    reFee =  fee.val().replace(/[^a-zA-Z0-9 ]/g, '');
                }
                if(order_value.val() != undefined){
                    reOrderValue =  order_value.val().replace(/[^a-zA-Z0-9 ]/g, '');
                }
                var input = {
                    id:id.val(),
                    order_value: reOrderValue,
                    fee: reFee,
                };
                $.ajax({
                    url: "{{route('admin.systems.transport_fee.update')}}",
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
                        if (message.order_value) {
                            order_value.after(error(message.order_value));
                        }
                        if (message.fee) {
                            fee.after(error(message.fee));
                        }
                    }
                });
            });
        })
    </script>
@endsection
