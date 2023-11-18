@extends('admin.layouts.base')
@section('body')
    @can('viewAny', \App\Admin\Models\Branch::class)
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
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Hệ thống</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a href="{{route('admin.systems.general')}}">Cài đặt</a>
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
                                    @can('viewAny', \App\Admin\Models\System::class)
                                        <a class="nav-link d-flex" href="{{route('admin.systems.general')}}"><i
                                                class="las la-globe-africa font-20 mr-2"></i>Cài đặt Chung</a>
                                    @endcan
                                    @can('viewAny', \App\Admin\Models\Branch::class)
                                        <a class="nav-link d-flex active" href="{{route('admin.systems.branch.index')}}"><i
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
                                    @can('viewAny', \App\Admin\Models\System::class)
                                        <a class="nav-link d-flex" href="{{route('admin.systems.meta_seo')}}"><i
                                                class="las la-passport font-20 mr-2"></i>Meta Seo trang chủ</a>
                                    @endcan
                                    @can('viewAny', \App\Admin\Models\TransportFee::class)
                                        <a class="nav-link d-flex" href="{{route('admin.systems.transport_fee.index')}}"><i
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
                        <div class=" general-info box-info-profile">
                            <div class="widget-heading m-0 d-flex justify-content-between align-center">
                                <h5>Cài đặt chi nhánh</h5>
                                <div class="d-flex justify-content-sm-end justify-content-center contact-options">
                                    @can('create', \App\Admin\Models\Branch::class)
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
                                <div class="col-12 normal-tab ecommerce-table overflow-auto">
                                    <ul class="nav nav-tabs mb-2 mt-2" role="tablist" id="change-tab-branch">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#tab-branch-list"
                                               role="tab" aria-controls="tab-branch-list" aria-selected="true">Sử
                                                dụng</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#tab-branch-list-trashed"
                                               role="tab" aria-controls="tab-branch-list-trashed" aria-selected="true">Không
                                                sử dụng</a>
                                            </li>
                                    </ul>
                                        <div class="tab-content date-table-container switch-outer-container">
                                            <div class="tab-pane fade show active pt-0" id="tab-branch-list"
                                                 role="tabpanel" aria-labelledby="tab-branch-list">
                                                <table id="listBranch" class="table table-hover dataTable">
                                                    <thead>
                                                    <tr>
                                                        <th class="text-center">STT</th>
                                                        <th class="text-center">Tên chi nhánh</th>
                                                        <th class="text-center">Mã kho</th>
                                                        <th class="text-center">Điện thoại</th>
                                                        <th class="text-center">Địa chỉ</th>
                                                        <th class="text-center">Là cửa hàng</th>
                                                        <th class="text-center">Chức năng</th>
                                                    </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade pt-0" id="tab-branch-list-trashed"
                                                 role="tabpanel" aria-labelledby="tab-branch-list-trashed">
                                                <table id="listBranchTrashed" class="table table-hover dataTable">
                                                    <thead>
                                                    <tr>
                                                        <th class="text-center">STT</th>
                                                        <th class="text-center">Tên chi nhánh</th>
                                                        <th class="text-center">Mã kho</th>
                                                        <th class="text-center">Điện thoại</th>
                                                        <th class="text-center">Địa chỉ</th>
                                                        <th class="text-center">Là cửa hàng</th>
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
        @include('admin.content.branch.delete')
        @include('admin.content.branch.edit')
        @include('admin.content.branch.restore')
        @include('admin.content.branch.create')
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
            /** Danh sách chi nhánh */
            function load() {
                $('.tooltip').hide();
                $.ajax({
                    url: "{{route('admin.systems.branch.load')}}",
                    method: "post",
                    dataType: "json",
                    success: function (output) {
                        $('#listBranch').DataTable().destroy();
                        $('#listBranch').DataTable({
                            data: output.branches,
                            columns: [
                                {
                                    data: 'id',
                                    render: function (data, type, row, meta) {
                                        return meta.row + meta.settings._iDisplayStart + 1;
                                    }
                                },
                                {data: 'name'},
                                {data: 'code'},
                                {data: 'phone'},
                                {data: 'address'},
                                {
                                    data: {is_store:"is_store", id:"id"},
                                    render: function (data) {
                                        if(data.is_store == 1){
                                              return '<label class="switch switch-primary  m-auto d-block"><input type="checkbox" class="btn-status" checked="checked" name="is_store" value="1" data-value="'+data.id+'"><span class="slider round"></span></label>';
                                        }else{
                                            return '<label class="switch switch-primary  m-auto d-block"><input type="checkbox" class="btn-status" name="is_store" value="0" data-value="'+data.id+'"><span class="slider round"></span></label>';
                                        }
                                    },
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
                                {className: 'text-center', targets: [0, 2, 4, 5]},
                                {className: 'text-left', targets: [1,3]},
                            ],
                            lengthMenu: [10, 25, 50, 100],
                            pageLength: 10,
                        });
                        $('#listBranchTrashed').DataTable().destroy();
                        $('#listBranchTrashed').DataTable({
                            data: output.branchesTrashed,
                            columns: [
                                {
                                    data: 'id',
                                    render: function (data, type, row, meta) {
                                        return meta.row + meta.settings._iDisplayStart + 1;
                                    }
                                },
                                {data: 'name'},
                                {data: 'code'},
                                {data: 'phone'},
                                {data: 'address'},
                                {
                                    data: 'is_store',
                                    render: function (data) {
                                        if(data == 1){
                                            return '<label class="switch switch-primary m-auto d-block"><input type="checkbox" class="btn-status" checked="checked" name="is_store" value="1" data-value="'+data.id+'" disabled><span class="slider round"></span></label>';
                                        }else{
                                            return '<label class="switch switch-primary m-auto d-block"><input type="checkbox" class="btn-status" name="is_store" value="0" data-value="'+data.id+'" disabled><span class="slider round"></span></label>';
                                        }
                                    },
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
                            columnDefs: [
                                {type: "num"},
                                {className: 'text-center', targets: [0, 2, 4, 5]},
                                {className: 'text-left', targets: [1, 3]},
                            ],
                            lengthMenu: [10, 25, 50, 100],
                            pageLength: 10,
                        });
                    }
                });
            }

            /** reset form thêm mới*/
            $(document).on('click', '.btn-create', function () {
                $('#modal-create form#form-create-branch')[0].reset();
                $('#modal-create form#form-create-branch').find(':checkbox').prop('checked', true);
                $('#modal-create form#form-create-branch .text-error').remove();
                $('.btn-store').attr('disabled',false);
            });

            /** Thêm mới chi nhánh */
            $(document).on('click', '.btn-store', function () {
                $('#modal-create form#form-create-branch .text-error').remove();
                $('.btn-store').attr('disabled',true);
                var name = $('#form-create-branch input[name="name"]');
                var code = $('#form-create-branch input[name="code"]');
                var phone = $('#form-create-branch input[name="phone"]');
                var address = $('#form-create-branch textarea[name="address"]');
                var is_store = $('#form-create-branch input[name="is_store"]');
                var input = {
                    name: name.val(),
                    code: code.val(),
                    phone: phone.val(),
                    address: address.val(),
                    is_store: is_store.is(':checked') ? 1:0,
                };
                $.ajax({
                    url: "{{route('admin.systems.branch.store')}}",
                    method: "post",
                    data: input,
                    dataType: "json",
                    success: function (output) {
                        if (output.success) {
                            Snackbar.show({
                                text: 'Thêm mới thành công',
                                pos: 'top-center'
                            });
                            load();
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
                        if (message.code) {
                            code.after(error(message.code));
                        }
                        if (message.address) {
                            address.after(error(message.address));
                        }
                        if (message.phone) {
                            phone.after(error(message.phone));
                        }
                    }
                });
            });

            /** Form cập nhật chi nhánh */
            $(document).on('click', '.btn-edit', function () {
                $('form#update-branch')[0].reset();
                $('form#update-branch .text-error').remove();
                $('.btn-update').attr('disabled',false);
                var id = $(this).attr('data-value');
                var input = {
                    id: id,
                }
                $.ajax({
                    url: "{{route('admin.systems.branch.edit')}}",
                    method: "POST",
                    data: input,
                    dataType: "json",
                    success: function (output) {
                        $('#update-branch input[name="name"]').val(output.branch.name);
                        $('#update-branch input[name="phone"]').val(output.branch.phone);
                        $('#update-branch input[name="code"]').val(output.branch.code);
                        $('#update-branch textarea[name="address"]').val(output.branch.address);
                        if (output.branch.is_store === 1) {
                            $('#update-branch input[name="is_store"]')[0].checked = true;
                        }
                        else{
                            $('#update-branch input[name="is_store"]')[0].checked = false;
                        }
                        $('#update-branch input[name="id"]').val(output.branch.id);
                    }
                })
            });

            /** Cập nhật chi nhánh */
            $(document).on('click', '#modal-edit input[type="button"]', function () {
                $('form#update-branch .text-error').remove();
                $('.btn-update').attr('disabled',true);
                var id = $('#update-branch input[name="id"]')
                var name = $('#update-branch input[name="name"]');
                var code = $('#update-branch input[name="code"]');
                var phone = $('#update-branch input[name="phone"]');
                var address = $('#update-branch textarea[name="address"]');
                var is_store = $('#update-branch input[name="is_store"]');
                var input = {
                    id: id.val(),
                    name: name.val(),
                    code: code.val(),
                    phone: phone.val(),
                    address: address.val(),
                    is_store: is_store.is(':checked') ? 1 : 0,
                }
                $.ajax({
                    url: "{{route('admin.systems.branch.update')}}",
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
                        if (message.code) {
                            code.after(error(message.code));
                        }
                        if (message.address) {
                            address.after(error(message.address));
                        }
                        if (message.phone) {
                            phone.after(error(message.phone));
                        }
                    }
                });
            });

            /** Xác nhận xóa */
            $(document).on('click', '#destroy', function () {
                var id = $(this).attr('data-value');
                var url = "{{route('admin.systems.branch.destroy')}}";
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
                var url = "{{route('admin.systems.branch.restore')}}";
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
                var url = "{{route('admin.systems.branch.change_status')}}";
                changeStatus(status,id,url);
            });
        })
    </script>
@endsection
