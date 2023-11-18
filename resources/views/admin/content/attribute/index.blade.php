@extends('admin.layouts.base')
@section('body')
    @can('viewAny', \App\Admin\Models\Attribute::class)
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
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Sản phẩm</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <a href="{{route('admin.attributes.index')}}">Danh sách thuộc tính</a>
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
            <div class="row layout-spacing layout-top-spacing">
                <div class="col-lg-12">
                    <div class="widget-content searchable-container grid">
                        <div class="widget ecommerce-table">
                            <div class="widget-heading flex-wrap m-0">
                                <h5 class="">Danh sách thuộc tính</h5>
                                <div class="dropdown custom-dropdown-icon">
                                    <div class="d-flex justify-content-sm-end justify-content-center contact-options">
                                        <a href="javascript:void(0);" title="Thêm mới" data-toggle="modal"
                                           data-target="#modal-create"
                                           class="pointer font-25 s-o mr-1 bs-tooltip btn-create">
                                            <i class="las la-plus-circle"></i>
                                        </a>
                                        <a class="pointer nav-link full-screen-mode font-25 s-o bs-tooltip mr-1"
                                           href="javascript:void(0);">
                                            <i class="las la-compress" id="fullScreenIcon"></i>
                                        </a>
                                        <a title="Tải lại" class="pointer font-25 s-o bs-tooltip mr-1" onclick="window.location.reload()">
                                            <i class="las la-sync-alt"></i>
                                        </a>
                                        <a class="pointer font-25 s-o">
                                            <i class="las la-cog"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content tab-horizontal-line">
                                <div class="table-responsive date-table-container">
                                    <table class="table table-hover" id="Attribute">
                                        <thead>
                                        <tr class="tbl_head">
                                            <th class="th-content">STT</th>
                                            <th class="th-content">Mã</th>
                                            <th class="th-content">Tên hiển thị</th>
                                            <th class="th-content">Danh mục</th>
                                            <th class="th-content">Chức năng</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Body Ends -->
        @include('admin.content.attribute.edit')
        @include('admin.content.attribute.create')
        @include('admin.content.attribute.delete')
        @include('admin.content.attribute.create_child')
        @include('admin.content.attribute.edit_child')
    @endcan
@endsection
@section('css')
    <!-- Page Level Plugin/Style Starts -->
    <link href="{{asset('css/admin/tables.css')}}" rel="stylesheet" type="text/css">
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
    <script>
        $(document).ready(function () {
            load();
            function load() {
                $('.tooltip').hide();
                $.ajax({
                    async: true,
                    url: "{{route('admin.attributes.load')}}",
                    method: "post",
                    dataType: "json",
                    success: function (output) {
                        $('#Attribute').DataTable().destroy();
                        $('#Attribute').DataTable({
                            data: output.attribute,
                            columns: [
                                {
                                    data: 'id',
                                    render: function (data, type, row, meta) {
                                        return meta.row + meta.settings._iDisplayStart + 1;
                                    }
                                },
                                {data: 'code'},
                                {data: 'name'},
                                {
                                    data: {id:'id',category_product:'category_product'},
                                    render: function (data) {
                                        var str = '';
                                        $.each(data.category_product, function () {
                                            str += '<a href="javascript:void(0)" class="text-primary mr-2"><ins>'+this+'</ins></a>';
                                        })
                                        return str;
                                    }
                                },
                                {
                                    data: 'id',
                                    render: function (data) {
                                        return '<div class="d-flex justify-content-center"><a href="javascript:void(0);" data-value="'+data+'" class="bs-tooltip font-20 text-primary btn-edit" title="Sửa" data-original-title="Sửa"><i class="las la-pen"></i></a>' +
                                            '<a href="javascript:void(0);" class="bs-tooltip font-20 text-danger ml-2 btn-delete" data-value="'+data+'" data-toggle="modal" data-target="#modal-delete" title="Xóa" data-original-title="Xóa"><i class="las la-trash"></i></a></div>';
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
                                {className: 'text-center', targets: [0, 4]},
                                {className: 'text-left', targets: [1, 2, 3]},
                            ],
                            lengthMenu: [10, 25, 50, 100],
                            pageLength: 10,
                        });
                    }
                });
            }

            /** reset form thêm mới */
            $(document).on('click','.btn-create',function () {
                $('form#create-attribute')[0].reset();
                $('form#create-attribute .text-error').remove();
                $('.btn-store').attr('disabled',false);
            });

            /** Thêm mới */
            $(document).on('click','.btn-store', function () {
                $('form#create-attribute .text-error').remove();
                $('.btn-store').attr('disabled',true);
                var name = $('form#create-attribute input[name="name"]');
                var code = $('form#create-attribute input[name="code"]');
                var description = $('form#create-attribute textarea[name="description"]');

                var input = {
                    name:name.val(),
                    code:code.val(),
                    description:description.val(),
                };

                $.ajax({
                    type: "POST",
                    url: "{{route('admin.attributes.store')}}",
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
                                text: 'Có lỗi xảy ra',
                                pos: 'top-center'
                            });
                        }
                        $('#modal-create').modal('hide');
                        $('.tooltip').hide();
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
                        if (message.description) {
                            description.after(error(message.description));
                        }
                    }
                });
            });

            /** Nút xóa */
            $(document).on('click','.btn-delete',function (e) {
                e.preventDefault();
                $('#destroy').attr('data-value',$(this).attr('data-value'));
                $('#destroy').attr('data-parent',$(this).attr('data-parent'));
            });

            /** Xóa */
            $(document).on('click', '#destroy', function () {
                var id = $(this).attr('data-value');
                var parent = $(this).attr('data-parent');
                var data = {
                    id: id,
                }
                $.ajax({
                    url: "{{route('admin.attributes.destroy')}}",
                    method: "POST",
                    data: data,
                    dataType: "json",
                    success: function (data) {
                        if (data.success) {
                            if(typeof parent != 'undefined') {
                                loadAttributeChild(parent);
                            }
                            else {
                                load();
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
                })
            });

            /** reset form cập nhật */
            $(document).on('click','.btn-edit',function () {
                $('form#update-attribute')[0].reset();
                $('form#update-attribute .text-error').remove();
                $('#modal-edit table tbody').html('');
                $('#modal-edit .btn-create-child').attr('data-value','');
                $('.btn-update').attr('disabled',false);
                var id = $(this).attr('data-value');
                var input = {
                    id:id
                };
                $.ajax({
                    url: "{{ route('admin.attributes.edit') }}",
                    method: "POST",
                    data: input,
                    dataType: "json",
                    success: function (output) {
                        if (output.success) {
                            $('#modal-edit').modal('show');
                            $('form#update-attribute input[name="name"]').val(output.attribute.name);
                            $('form#update-attribute input[name="id"]').val(output.attribute.id);
                            $('form#update-attribute input[name="code"]').val(output.attribute.code);
                            $('form#update-attribute textarea[name="description"]').val(output.attribute.description);
                            $('#modal-edit .btn-create-child').attr('data-value',output.attribute.id);
                            loadAttributeChild(id);
                        } else {
                            Snackbar.show({
                                text: 'Có lỗi xảy ra',
                                pos: 'top-center'
                            });
                        }
                    }
                });
            });

            /** Cập nhật */
            $(document).on('click','.btn-update', function () {
                $('form#update-attribute .text-error').remove();
                $('.btn-update').attr('disabled',true);
                var name = $('form#update-attribute input[name="name"]');
                var id = $('form#update-attribute input[name="id"]');
                var code = $('form#update-attribute input[name="code"]');
                var description = $('form#update-attribute textarea[name="description"]');
                var input = {
                    id:id.val(),
                    name:name.val(),
                    code:code.val(),
                    description:description.val()
                };
                $.ajax({
                    url: "{{ route('admin.attributes.update') }}",
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
                                text: 'Lỗi',
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
                        if (message.description) {
                            description.after(error(message.description));
                        }
                    }
                });
            });

            function loadAttributeChild(id) {
                $('.tooltip').hide();
                var input = {
                    id:id,
                }
                $.ajax({
                    async: true,
                    url: "{{route('admin.attributes.loadAttributeChild')}}",
                    data:input,
                    method: "post",
                    dataType: "json",
                    success: function (output) {
                        $('#AttributeChild').DataTable().destroy();
                        $('#AttributeChild').DataTable({
                            data: output.attributeChild,
                            columns: [
                                {
                                    data: 'id',
                                    render: function (data, type, row, meta) {
                                        return meta.row + meta.settings._iDisplayStart + 1;
                                    }
                                },
                                {data: 'code'},
                                {data: 'name'},
                                {data: 'description'},
                                {data: 'number_order'},
                                {
                                    data: 'id',
                                    render: function (data) {
                                        return '<div class="d-flex justify-content-center"><a href="javascript:void(0);" data-value="'+data+'" class="bs-tooltip font-20 text-primary btn-edit-child" title="Sửa" data-original-title="Sửa"><i class="las la-pen"></i></a>' +
                                            '<a href="javascript:void(0);" class="bs-tooltip font-20 text-danger ml-2 btn-delete" data-value="'+data+'" data-parent="'+id+'" data-toggle="modal" data-target="#modal-delete" title="Xóa" data-original-title="Xóa"><i class="las la-trash"></i></a></div>';
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
                                {className: 'text-center', targets: [0, 4, 5]},
                                {className: 'text-left', targets: [1, 2, 3]},
                            ],
                            lengthMenu: [10, 25, 50, 100],
                            pageLength: 10,
                        });
                    }
                });
            };

            /** reset form thêm mới chi tiết */
            $(document).on('click','.btn-create-child',function () {
                $('form#create-attribute-child')[0].reset();
                $('form#create-attribute-child .text-error').remove();
                var parent = $(this).attr('data-value');
                $('#modal-create-child .btn-store-child').attr('data-value',parent);
                $('.btn-store-child').attr('disabled',false);
            });

            /** Thêm mới */
            $(document).on('click','.btn-store-child', function () {
                $('form#create-attribute-child .text-error').remove();
                $('.btn-store-child').attr('disabled',true);
                $('.tooltip').hide();
                var name = $('form#create-attribute-child input[name="name"]');
                var code = $('form#create-attribute-child input[name="code"]');
                var number_order = $('form#create-attribute-child input[name="number_order"]');
                var description = $('form#create-attribute-child textarea[name="description"]');
                var parent = $(this).attr('data-value');
                var input = {
                    name:name.val(),
                    code:code.val(),
                    number_order:number_order.val(),
                    description:description.val(),
                    parent:parent,
                };

                $.ajax({
                    type: "POST",
                    url: "{{route('admin.attributes.storeChild')}}",
                    data: input,
                    dataType: "json",
                    success: function (output) {
                        if (output.success) {
                            loadAttributeChild(parent);
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
                        $('#modal-create-child').modal('hide');
                    },
                    error: function (output) {
                        $('.btn-store-child').attr('disabled',false);
                        var message = output.responseJSON.errors;
                        if(message.name) {
                            name.after(error(message.name));
                        }
                        if(message.code) {
                            code.after(error(message.code));
                        }
                        if(message.description) {
                            description.after(error(message.description));
                        }
                    }
                });
            });

            /** reset form cập nhật chi tiết*/
            $(document).on('click','.btn-edit-child',function () {
                $('form#update-attribute-child')[0].reset();
                $('form#update-attribute-child .text-error').remove();
                $('.btn-update-child').attr('disabled',false);
                var id = $(this).attr('data-value');
                var input = {
                    id:id
                };
                $.ajax({
                    url: "{{ route('admin.attributes.editChild') }}",
                    method: "POST",
                    data: input,
                    dataType: "json",
                    success: function (output) {
                        if (output.success) {
                            $('form#update-attribute-child input[name="name"]').val(output.attribute.name);
                            $('form#update-attribute-child input[name="id"]').val(output.attribute.id);
                            $('form#update-attribute-child input[name="parent"]').val(output.attribute.parent);
                            $('form#update-attribute-child input[name="code"]').val(output.attribute.code);
                            $('form#update-attribute-child input[name="number_order"]').val(output.attribute.number_order);
                            $('form#update-attribute-child textarea[name="description"]').val(output.attribute.description);
                            $('#modal-edit-child').modal('show');
                        } else {
                            Snackbar.show({
                                text: 'Có lỗi xảy ra',
                                pos: 'top-center'
                            });
                        }
                    }
                });
            });

            /** Cập nhật */
            $(document).on('click','.btn-update-child', function () {
                $('form#update-attribute-child .text-error').remove();
                $('.btn-update-child').attr('disabled',true);
                var name = $('form#update-attribute-child input[name="name"]');
                var id = $('form#update-attribute-child input[name="id"]');
                var code = $('form#update-attribute-child input[name="code"]');
                var parent = $('form#update-attribute-child input[name="parent"]');
                var number_order = $('form#update-attribute-child input[name="number_order"]');
                var description = $('form#update-attribute-child textarea[name="description"]');
                var input = {
                    id:id.val(),
                    name:name.val(),
                    code:code.val(),
                    number_order:number_order.val(),
                    description:description.val()
                };
                $.ajax({
                    url: "{{ route('admin.attributes.updateChild') }}",
                    method: "POST",
                    data: input,
                    dataType: "json",
                    success: function (output) {
                        if (output.success) {
                            loadAttributeChild(parent.val())
                            Snackbar.show({
                                text: 'Cập nhật thành công',
                                pos: 'top-center'
                            });
                        } else {
                            Snackbar.show({
                                text: 'Lỗi',
                                pos: 'top-center'
                            });
                        }
                        $('#modal-edit-child').modal('hide');
                    },
                    error: function (output) {
                        $('.btn-update-child').attr('disabled',false);
                        var message = output.responseJSON.errors;
                        if (message.name) {
                            name.after(error(message.name));
                        }
                        if (message.code) {
                            code.after(error(message.code));
                        }
                        if (message.description) {
                            description.after(error(message.description));
                        }
                    }
                });
            });
        });
    </script>
    <!-- Page Level Plugin/Script Ends -->
@endsection
