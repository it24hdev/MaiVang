@extends('admin.layouts.base')
@section('body')
    @can('viewAny', \App\Admin\Models\Tag::class)
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
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <a href="{{route('admin.tags.index')}}">Quản lý tag</a>
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
                                <h5>Quản lý Tag</h5>
                                <div class="d-flex justify-content-sm-end justify-content-center contact-options">
                                    @can('create', \App\Admin\Models\Tag::class)
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
                                <table id="tags" class="table table-hover dataTable px-0">
                                    <thead>
                                    <tr>
                                        <th class="text-center">STT</th>
                                        <th class="text-center">Tag</th>
                                        <th class="text-center">Đường dẫn</th>
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
        @include('admin.content.tag.create')
        @include('admin.content.tag.delete')
        @include('admin.content.tag.edit')
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
    <script src="{{ asset('library/tinymce/tinymce.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            load();
            /** Hiển thị danh sách*/
            function load() {
                $('.tooltip').hide();
                $.ajax({
                    async: true,
                    url: "{{route('admin.tags.load')}}",
                    method: "post",
                    dataType: "json",
                    success: function (output) {
                        $('#tags').DataTable().destroy();
                        $('#tags').DataTable({
                            data: output.tags,
                            columns: [
                                {
                                    data: 'id',
                                    render: function (data, type, row, meta) {
                                        return meta.row + meta.settings._iDisplayStart + 1;
                                    }
                                },
                                {data: 'name'},
                                {data: 'slug'},
                                {
                                    data: 'id',
                                    render: function (data) {
                                        return '<div class="d-flex justify-content-center">' +
                                            '<a href="javascript:void(0);" class="bs-tooltip font-20 text-primary btn-edit" title="Cập nhật" data-value="' + data + '">' +
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
                                {className: 'text-center', targets: [0,3]},
                                {className: 'text-left', targets: [1,2]},
                            ],
                            lengthMenu: [10, 25, 50, 100],
                            pageLength: 10,
                        });
                    }
                });
            }

            /** reset form thêm mới */
            $(document).on('click', '.btn-create', function () {
                $('#create-tag')[0].reset();
                $('form#create-tag .text-error').remove();
                $('.tooltip').hide();
                $('.btn-store').attr('disabled',false);
            });

            /** Thêm mới */
            $(document).on('click', '.btn-store', function (e) {
                e.preventDefault();
                $(this).attr('disabled',true);
                $('form#create-tag .text-error').remove();;
                var name = $('form#create-tag input[name="name"]');
                var slug = $('form#create-tag input[name="slug"]');
                var description = tinymce.get('description').getContent();
                var meta_title = $('form#create-tag input[name="meta_title"]');
                var meta_description = $('form#create-tag textarea[name="meta_description"]');
                var input = {
                    name:name.val(),
                    slug:slug.val(),
                    description:description,
                    meta_title:meta_title.val(),
                    meta_description:meta_description.val(),
                }
                $.ajax({
                    url: "{{route('admin.tags.store')}}",
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
                        if (message.slug) {
                            slug.after(error(message.slug));
                        }
                        if (message.meta_title) {
                            meta_title.after(error(message.meta_title));
                        }
                        if (message.meta_description) {
                            meta_description.after(error(message.meta_description));
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
                    url: "{{route('admin.tags.destroy')}}",
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
                $('form#edit-tag .text-error').remove();
                $('.btn-update').attr('disabled',false);
                var id  =  $(this).attr('data-value');
                var input = {
                    id: id,
                }
                $.ajax({
                    url: "{{route('admin.tags.edit')}}",
                    method: "POST",
                    data: input,
                    dataType: "json",
                    success: function (output) {
                        if (output.success) {
                            $('#modal-edit').modal('show');
                            $('form#edit-tag input[name="name"]').val(output.tag.name);
                            $('form#edit-tag input[name="id"]').val(output.tag.id);
                            $('form#edit-tag input[name="slug"]').val(output.tag.slug);
                            if(output.tag.description){
                                tinymce.get("description-edit").setContent(output.tag.description);
                            }
                            $('form#edit-tag input[name="meta_title"]').val(output.tag.meta_title);
                            $('form#edit-tag textarea[name="meta_description"]').val(output.tag.meta_description);
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
                $('form#edit-tag .text-error').remove();
                var id = $('form#edit-tag input[name="id"]');
                var name = $('form#edit-tag input[name="name"]');
                var slug = $('form#edit-tag input[name="slug"]');
                var description = tinymce.get('description-edit').getContent();
                var meta_title = $('form#edit-tag input[name="meta_title"]');
                var meta_description = $('form#edit-tag textarea[name="meta_description"]');
                var input = {
                    id:id.val(),
                    name:name.val(),
                    slug:slug.val(),
                    description:description,
                    meta_title:meta_title.val(),
                    meta_description:meta_description.val(),
                };
                $.ajax({
                    url: "{{route('admin.tags.update')}}",
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
                        if (message.slug) {
                            slug.after(error(message.slug));
                        }
                        if (message.meta_title) {
                            meta_title.after(error(message.meta_title));
                        }
                        if (message.meta_description) {
                            meta_description.after(error(message.meta_description));
                        }
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            /** Soạn thảo văn bản tinyMce*/
            tinymce.init({
                selector: '.editor-box textarea',
                relative_urls: false,
                height: 300,
                plugins: [
                    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table directionality",
                    "emoticons template paste textpattern"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            });
        });
    </script>
@endsection
