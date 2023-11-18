@extends('admin.layouts.base')
@section('body')
    @can('viewAny', \App\Admin\Models\Brand::class)
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
                                        <a href="{{route('admin.brands.index')}}">Quản lý thương hiệu</a>
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
                            <div class="widget-heading m-0 d-flex justify-content-between align-center">
                                <h5>Quản lý thương hiệu</h5>
                                <div class="d-flex justify-content-sm-end justify-content-center contact-options">
                                    @can('create', \App\Admin\Models\Brand::class)
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
                                <table id="listBrands" class="table table-hover dataTable">
                                    <thead>
                                    <tr>
                                        <th class="text-center">STT</th>
                                        <th class="text-center">Thương hiệu</th>
                                        <th class="text-center">Logo</th>
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
        @include('admin.content.brand.create')
        @include('admin.content.brand.delete')
        @include('admin.content.brand.edit')
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
                    url: "{{route('admin.brands.load')}}",
                    method: "post",
                    dataType: "json",
                    success: function (output) {
                        $('#listBrands').DataTable().destroy();
                        $('#listBrands').DataTable({
                            data: output.brands,
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
                                    data: 'logo',
                                    render: function (data) {
                                        var src_url = "{{asset('media/common/no-image.jpg')}}";
                                        if(data != "{{\App\Admin\Models\Brand::noImage}}") {
                                            src_url = "{{asset('media/brands/img_logo')}}";
                                            src_url = src_url.replace('img_logo', data);
                                        }
                                        return '<img width="90" src="'+src_url+'">';
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
                                {className: 'text-center', targets: [0,2,3]},
                                {className: 'text-left', targets: [1]},
                            ],
                            lengthMenu: [10, 25, 50, 100],
                            pageLength: 10,
                        });
                    }
                });
            }

            /** Thay ảnh form thêm mới*/
            $(document).on('change', '#upload-image', function () {
                $('form#upload-brand .text-error').remove();
                var default_src = $("#view-image").attr('data-src');
                const file = this.files[0];
                const acceptedImageTypes = ['image/gif', 'image/jpeg', 'image/png', 'image/webp'];
                if (typeof (file) != "undefined" && acceptedImageTypes.includes(file['type'])) {
                    let reader = new FileReader();
                    reader.onload = function (event) {
                        $("#view-image").attr("src", event.target.result);
                    };
                    reader.readAsDataURL(file);
                } else {
                    $("#view-image").attr("src", default_src);
                }
            });

            /** Thay ảnh form sửa*/
            $(document).on('change', '#upload-image-edit', function () {
                $('form#edit-brand .text-error').remove();
                var default_src = $("#view-image-edit").attr('data-src');
                const file = this.files[0];
                const acceptedImageTypes = ['image/gif', 'image/jpeg', 'image/png', 'image/webp'];
                if (typeof (file) != "undefined" && acceptedImageTypes.includes(file['type'])) {
                    let reader = new FileReader();
                    reader.onload = function (event) {
                        $("#view-image-edit").attr("src", event.target.result);
                    };
                    reader.readAsDataURL(file);
                } else {
                    $("#view-image-edit").attr("src", default_src);
                }
            });

            /** reset form thêm mới */
            $(document).on('click', '.btn-create', function () {
                $('#upload-brand')[0].reset();
                $('form#upload-brand .text-error').remove();
                var default_src = $("#view-image").attr('data-src');
                $("#view-image").attr("src", default_src);
                $('.btn-store').attr('disabled', false);
            });

            /** Thêm mới */
            $(document).on('click', '.btn-store', function () {
                $('form#upload-brand .text-error').remove();
                $('.btn-store').attr('disabled', true);
                var logo = $('form#upload-brand input[name="image"]');
                var name = $('form#upload-brand input[name="name"]');
                var meta_title = $('form#upload-brand input[name="meta_title"]');
                var meta_keyword = $('form#upload-brand input[name="meta_keyword"]');
                var meta_description = $('form#upload-brand textarea[name="meta_description"]');
                //khởi tạo đối tượng form data
                var file_data = $("#upload-image").prop("files")[0];
                var form_data = new FormData();
                //thêm files vào trong form data
                form_data.append("logo", file_data);
                form_data.append("name", name.val());
                form_data.append("meta_title", meta_title.val());
                form_data.append("meta_keyword", meta_keyword.val());
                form_data.append("meta_description", meta_description.val());

                $.ajax({
                    url: "{{route('admin.brands.store')}}",
                    method: "post",
                    data: form_data,
                    processData: false,
                    contentType: false,
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
                        $('.btn-store').attr('disabled', false);
                        var message = output.responseJSON.errors;
                        if (message.logo) {
                            logo.after(error(message.logo));
                        }
                        if (message.name) {
                            name.after(error(message.name));
                        }
                        if (message.meta_title) {
                            meta_title.after(error(message.meta_title));
                        }
                        if (message.meta_keyword) {
                            meta_keyword.after(error(message.meta_keyword));
                        }
                        if (message.meta_description) {
                            meta_description.after(error(message.meta_description));
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
                    url: "{{route('admin.brands.destroy')}}",
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
            $(document).on('click', '.btn-edit', function () {
                $('form#edit-brand .text-error').remove();
                $('form#edit-brand #view-image-edit').attr('src', $('form#edit-brand #view-image-edit').attr('data-src'));
                $('.btn-update').attr('disabled', false);
                var id = $(this).attr('data-value');
                var input = {
                    id: id,
                }
                $.ajax({
                    url: "{{route('admin.brands.edit')}}",
                    method: "POST",
                    data: input,
                    dataType: "json",
                    success: function (output) {
                        if (output.success) {
                            $('#modal-edit').modal('show');
                            $('form#edit-brand input[name="name"]').val(output.brand.name);
                            var src_img = "{{asset('media/common/150x150.png')}}";
                            if(output.brand.logo !== "{{\App\Admin\Models\Brand::noImage}}"){
                                src_img = "{{asset('media/brands/img_brand')}}";
                                src_img = src_img.replace('img_brand', output.brand.logo);
                            }
                            $('form#edit-brand #view-image-edit').attr('src',src_img);
                            $('form#edit-brand input[name="id"]').val(output.brand.id);
                            $('form#edit-brand input[name="meta_title"]').val(output.brand.meta_title);
                            $('form#edit-brand input[name="meta_keyword"]').val(output.brand.meta_keyword);
                            $('form#edit-brand textarea[name="meta_description"]').val(output.brand.meta_description);
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
                $('form#edit-brand .text-error').remove();
                $('.btn-update').attr('disabled', true);
                var logo = $('form#edit-brand input[name="image"]');
                var name = $('form#edit-brand input[name="name"]');
                var id = $('form#edit-brand input[name="id"]');
                var meta_title = $('form#edit-brand input[name="meta_title"]');
                var meta_keyword = $('form#edit-brand input[name="meta_keyword"]');
                var meta_description = $('form#edit-brand textarea[name="meta_description"]');
                //khởi tạo đối tượng form data
                var file_data = $("#upload-image-edit").prop("files")[0];
                var form_data = new FormData();
                //thêm files vào trong form data
                form_data.append("logo", file_data);
                form_data.append("name", name.val());
                form_data.append("id", id.val());
                form_data.append("meta_title", meta_title.val());
                form_data.append("meta_keyword", meta_keyword.val());
                form_data.append("meta_description", meta_description.val());

                $.ajax({
                    url: "{{route('admin.brands.update')}}",
                    method: "post",
                    data: form_data,
                    processData: false,
                    contentType: false,
                    success: function (output) {
                        $('#modal-edit').modal('hide');
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
                    },
                    error: function (output) {
                        $('.btn-update').attr('disabled', false);
                        var message = output.responseJSON.errors;
                        if (message.logo) {
                            logo.after(error(message.logo));
                        }
                        if (message.name) {
                            name.after(error(message.name));
                        }
                        if (message.meta_title) {
                            meta_title.after(error(message.meta_title));
                        }
                        if (message.meta_keyword) {
                            meta_keyword.after(error(message.meta_keyword));
                        }
                        if (message.meta_description) {
                            meta_description.after(error(message.meta_description));
                        }
                    }
                });
            });
        });
    </script>
@endsection
