@extends('admin.layouts.base')
@section('body')
    @can('viewAny', \App\Admin\Models\Unit::class)
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
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Sản phẩm</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <a href="{{route('admin.units.index')}}">Quản lý đơn vị tính</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </li>
                </ul>
            </header>
        </div>
        <div class="layout-px-spacing">
            <div class="row layout-spacing layout-top-spacing">
                <div class="col-lg-12">
                    <div class="statbox widget box box-shadow mb-4 py-2">
                        <div class="general-info box-info-profile">
                            <div class="widget-heading m-0 d-flex justify-content-between align-items-end">
                                <h5>Quản lý đơn vị tính</h5>
                                <div class="d-flex justify-content-sm-end justify-content-center contact-options">
                                    @can('create', \App\Admin\Models\Unit::class)
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
                            <div class="widget-content date-table-container mt-3 table-responsive ecommerce-table">
                                <table id="listUnits" class="table table-hover dataTable">
                                    <thead>
                                    <tr>
                                        <th class="text-center">STT</th>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Đơn vị tính</th>
                                        <th class="text-center">Mô tả</th>
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
        @include('admin.content.unit.create')
        @include('admin.content.unit.delete')
        @include('admin.content.unit.edit')
    @endcan
@endsection
@section('css')
    <!-- Page Level Plugin/Style Starts -->
    <link href="{{asset('css/admin/dt-global_style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('library/datatable/datatables.css')}}" rel="stylesheet" type="text/css">
    <!-- Page Level Plugin/Style Ends -->
@endsection
@section('js')
    <script src="{{asset('library/datatable/datatables.js')}}"></script>
    <script src="{{asset('library/datatable/datatables.buttons.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            load();
            /** Hiển thị danh sách*/
            function load() {
                $('.tooltip').hide();
                $.ajax({
                    async: true,
                    url: "{{route('admin.units.load')}}",
                    method: "post",
                    dataType: "json",
                    success: function (output) {
                        $('#listUnits').DataTable().destroy();
                        $('#listUnits').DataTable({
                            data: output.units,
                            columns: [
                                {
                                    data: 'id',
                                    render: function (data, type, row, meta) {
                                        return meta.row + meta.settings._iDisplayStart + 1;
                                    }
                                },
                                {data: 'id'},
                                {
                                    data: { name: "name", updated_at: "updated_at"},
                                    render: function(data){
                                        var date = new Date(data.updated_at);
                                        return  '<p class="m-0"><strong>'+data.name+'</strong></p>'+
                                        '<p class="m-0">'+date.toLocaleString()+'</p>';
                                    },
                                },
                                {
                                    data: 'description',
                                },
                                {
                                    data: 'id',
                                    render: function (data) {
                                        return '<div class="d-flex justify-content-center">' +
                                            '<a href="javascript:void(0);"class="bs-tooltip font-20 text-primary btn-edit" title="Cập nhật" data-value="' + data + '">' +
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
                                {className: 'text-center', targets: [0,1,4]},
                                {className: 'text-left', targets: [3,2]},
                            ],
                            lengthMenu: [10, 25, 50, 100],
                            pageLength: 10,
                        });
                    }
                });
            }


            /** reset form thêm mới */
            $(document).on('click', '.btn-create', function () {
                $('#create-unit')[0].reset();
                $('form#create-unit .text-error').remove();
                $('.btn-store').attr('disabled',false);
            });

            /** Thêm mới */
            $(document).on('click', '.btn-store', function () {
                $('form#create-unit .text-error').remove();;
                $('.btn-store').attr('disabled',true);
                var name = $('form#create-unit input[name="name"]');
                var description = $('form#create-unit textarea[name="description"]');
                var input = {
                    name:name.val(),
                    description:description.val(),
                }
                $.ajax({
                    url: "{{route('admin.units.store')}}",
                    method: "post",
                    data: input,
                    dataType: 'json',
                    success: function (output) {
                        load();
                        $('#modal-create').modal('hide');
                        if (output.success) {
                            Snackbar.show({
                                text: 'Thêm mới thành công',
                                pos: 'top-center'
                            });
                        } else {
                            Snackbar.show({
                                text: 'Có lỗi xảy ra',
                                pos: 'top-center'
                            });
                        }
                    },
                    error: function (output) {
                        $('.btn-store').attr('disabled',false);
                        var message = output.responseJSON.errors;
                        if (message.name) {
                            name.after(error(message.name));
                        }
                        if (message.description) {
                            description.after(error(message.description));
                        }
                    }
                });
            });

            /** xóa */
            $(document).on('click', '#destroy', function () {
                var id = $(this).attr('data-value');
                var data = {
                    id: id,
                }
                $.ajax({
                    url: "{{route('admin.units.destroy')}}",
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

            /** Form cập nhật */
            $(document).on('click','.btn-edit', function () {
                $('form#edit-unit .text-error').remove();
                $('.btn-update').attr('disabled',false);
                var id  =  $(this).attr('data-value');
                var input = {
                    id: id,
                }
                $.ajax({
                    url: "{{route('admin.units.edit')}}",
                    method: "POST",
                    data: input,
                    dataType: "json",
                    success: function (output) {
                        if (output.success) {
                            $('#modal-edit').modal('show');
                            $('form#edit-unit input[name="name"]').val(output.unit.name);
                            $('form#edit-unit input[name="id"]').val(output.unit.id);
                            $('form#edit-unit textarea[name="description"]').val(output.unit.description);
                        } else {
                            Snackbar.show({
                                text: 'Có lỗi xảy ra',
                                pos: 'top-center'
                            });
                        }
                    }
                })
            });

            /** Cập nhật */
            $(document).on('click', '.btn-update', function () {
                $('form#edit-unit .text-error').remove();
                $('.btn-update').attr('disabled',true);
                var name = $('form#edit-unit input[name="name"]');
                var id = $('form#edit-unit input[name="id"]');
                var description = $('form#edit-unit textarea[name="description"]');
                var input = {
                    name:name.val(),
                    id:id.val(),
                    description:description.val()
                };
                $.ajax({
                    url: "{{route('admin.units.update')}}",
                    method: "post",
                    data: input,
                    dataType:'json',
                    success: function (output) {
                        load();
                        $('#modal-edit').modal('hide');
                        if (output.success) {
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
                    },
                    error: function (output) {
                        $('.btn-update').attr('disabled',false);
                        var message = output.responseJSON.errors;
                        if (message.name) {
                            name.after(error(message.name));
                        }
                        if (message.description) {
                            description.after(error(message.description));
                        }
                    }
                });
            });
        });
    </script>
@endsection
