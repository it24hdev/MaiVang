@extends('admin.layouts.base')
@section('body')
    @can('viewAny', \App\Admin\Models\Tax::class)
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
                                        <a href="{{route('admin.taxes.index')}}">Quản lý thuế</a>
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
                <div class="col-lg-12 ecommerce-table">
                    <div class="statbox widget box box-shadow mb-4 py-2">
                        <div class="general-info box-info-profile">
                            <div class="widget-heading m-0 d-flex justify-content-between align-items-end">
                                <h5>Quản lý thuế</h5>
                                <div class="d-flex justify-content-sm-end justify-content-center contact-options">
                                    @can('create', \App\Admin\Models\Tax::class)
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
                            <div class="widget-content date-table-container mt-3 table-responsive">
                                <table id="taxes" class="table table-hover dataTable">
                                    <thead>
                                    <tr>
                                        <th class="text-center">STT</th>
                                        <th class="text-center">Tên thuế</th>
                                        <th class="text-center">Giá trị</th>
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
        @include('admin.content.tax.create')
        @include('admin.content.tax.delete')
        @include('admin.content.tax.edit')
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
    <script>
        $(document).ready(function () {
            load();
            /** Hiển thị danh sách*/
            function load() {
                $('.tooltip').hide();
                $.ajax({
                    async: true,
                    url: "{{route('admin.taxes.load')}}",
                    method: "post",
                    dataType: "json",
                    success: function (output) {
                        $('#taxes').DataTable().destroy();
                        $('#taxes').DataTable({
                            data: output.taxes,
                            columns: [
                                {
                                    data: 'id',
                                    render: function (data, type, row, meta) {
                                        return meta.row + meta.settings._iDisplayStart + 1;
                                    }
                                },
                                {
                                    data: { name: "name", updated_at: "updated_at"},
                                    render: function(data){
                                        var date = new Date(data.updated_at);
                                        return  '<p class="m-0"><strong>'+data.name+'</strong></p>'+
                                        '<p class="m-0">'+date.toLocaleString()+'</p>';
                                    },
                                },
                                {
                                    data: 'vat',
                                    render: function (data) {
                                        return '<p class="">'+new Intl.NumberFormat('vi-VN').format(data)+'</p>';
                                    }
                                },
                                {
                                    data: 'description',
                                    render: function (data) {
                                        return '<p class="">'+data+'</p>';
                                    }
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
                                {className: 'text-center', targets: [0,4]},
                                {className: 'text-left', targets: [1,3]},
                                {className: 'text-right', targets: [2]},
                            ],
                            lengthMenu: [10, 25, 50, 100],
                            pageLength: 10,
                        });
                    }
                });
            }

            /** reset form thêm mới */
            $(document).on('click', '.btn-create', function () {
                $('.tooltip').hide();
                $('#create-tax')[0].reset();
                $('form#create-tax .text-error').remove();
                $('.btn-store').attr('disabled',false);
            });

            /** Thêm mới */
            $(document).on('click', '.btn-store', function (e) {
                e.preventDefault();
                $(this).attr('disabled',true);
                $('form#create-tax .text-error').remove();
                var name = $('form#create-tax input[name="name"]');
                var vat = $('form#create-tax input[name="vat"]');
                var description = $('form#create-tax textarea[name="description"]');
                var input = {
                    name:name.val(),
                    vat:vat.val(),
                    description:description.val(),
                }
                $.ajax({
                    url: "{{route('admin.taxes.store')}}",
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
                $('.tooltip').hide();
                var id = $(this).attr('data-value');
                var data = {
                    id: id,
                }
                $.ajax({
                    url: "{{route('admin.taxes.destroy')}}",
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
                $('.tooltip').hide();
                $('form#edit-tax .text-error').remove();
                $('.btn-update').attr('disabled', false);
                var id  =  $(this).attr('data-value');
                var input = {
                    id: id,
                }
                $.ajax({
                    url: "{{route('admin.taxes.edit')}}",
                    method: "POST",
                    data: input,
                    dataType: "json",
                    success: function (output) {
                        if (output.success) {
                            $('#modal-edit').modal('show');
                            $('form#edit-tax input[name="name"]').val(output.tax.name);
                            $('form#edit-tax input[name="id"]').val(output.tax.id);
                            $('form#edit-tax input[name="vat"]').val(output.tax.vat);
                            $('form#edit-tax textarea[name="description"]').val(output.tax.description);
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
            $(document).on('click', '.btn-update', function (e) {
                e.preventDefault();
                $(this).attr('disabled',true);
                $('form#edit-tax .text-error').remove();
                var name = $('form#edit-tax input[name="name"]');
                var id = $('form#edit-tax input[name="id"]');
                var description = $('form#edit-tax textarea[name="description"]');
                var vat = $('form#edit-tax input[name="vat"]');
                var input = {
                    name:name.val(),
                    id:id.val(),
                    vat:vat.val(),
                    description:description.val()
                };
                $.ajax({
                    url: "{{route('admin.taxes.update')}}",
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
                        $('.btn-update').attr('disabled', false);
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
