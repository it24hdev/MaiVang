@extends('admin.layouts.base')
@section('body')
    @can('viewAny', \App\Admin\Models\Page::class)
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
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Menu</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a href="{{route('admin.pages.index')}}">Quản lý trang</a>
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
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="statbox widget box box-shadow mb-4 py-2">
                        <div class=" general-info box-info-profile">
                            <div class="widget-heading m-0 d-flex justify-content-between align-items-end">
                                <h5>Danh sách trang</h5>
                                <div class="d-flex justify-content-sm-end justify-content-center contact-options">
                                    @can('create', \App\Admin\Models\Page::class)
                                        <a class="pointer s-o mr-1 bs-tooltip btn-create" href="javascript:void(0);"
                                           title="Thêm mới" data-toggle="modal" data-target="#modal-create">
                                            <i class="las la-plus-circle"></i>
                                        </a>
                                    @endcan
                                    <a class="pointer s-o mr-1 bs-tooltip" title="reload"
                                       onClick="window.location.reload();">
                                        <i class="las la-sync-alt"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="widget-content date-table-container overflow-auto mt-2 ecommerce-table">
                                <table id="page" class="table table-hover dataTable">
                                    <thead>
                                    <tr>
                                        <th class="text-center">STT</th>
                                        <th class="text-center">Tên tiêu đề</th>
                                        <th class="text-center">Đường dẫn</th>
                                        <th class="text-center">Thông tin khác</th>
                                        <th class="text-center">chức năng</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Body Ends -->
        @include('admin.content.page.create')
        @include('admin.content.page.delete')
        @include('admin.content.page.edit')
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
    <script src="{{ asset('library/tinymce/tinymce.min.js') }}"></script>
    <!-- Page Level Plugin/Script Ends -->
    <script>
        $(document).ready(function () {
            load();
            /** Danh sách nội dung cố định */
            function load() {
                $('.tooltip').hide();
                $.ajax({
                    url: "{{route('admin.pages.load')}}",
                    method: "post",
                    dataType: "json",
                    success: function (output) {
                        $('#page').DataTable().destroy();
                        $('#page').DataTable({
                            data: output.pages,
                            columns: [
                                {
                                    data: 'id',
                                    render: function (data, type, row, meta) {
                                        return meta.row + meta.settings._iDisplayStart + 1;
                                    }
                                },
                                {
                                    data: 'name',
                                    render: function (data) {
                                        return '<p>'+data+'</p>';
                                    }
                                },
                                {
                                    data: 'slug',
                                    render: function (data) {
                                        return '<a href="javascript:void(0);">'+data+'</a>';
                                    }
                                },
                                {
                                    data: "updated_at",
                                    render: function (data) {
                                        var date = new Date(data);
                                        return '<p>Cập nhật: '+date.toLocaleString()+'</p>'
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
                                {className: 'text-center', targets: [0, 4]},
                                {className: 'text-left', targets: [1, 2, 3]},
                            ],
                            lengthMenu: [10, 25, 50, 100],
                            pageLength: 10,
                        });
                    }
                });
            }

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
                file_picker_callback: function (callback, value, meta) {
                    let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                    let y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                    let type = 'image' === meta.filetype ? 'Images' : 'Files',
                        url  = '{{route('admin')}}'+'/laravel-file-manager?editor=tinymce5&type=' + type;

                    tinymce.activeEditor.windowManager.openUrl({
                        url : url,
                        title: 'Filemanager',
                        width: x * 0.8,
                        height: y * 0.8,
                        onMessage: (api, message) => {
                            callback(message.content);
                        }
                    });
                }
            });

            /** mở source code tinymce*/
            $(document).on('focusin', function(e) {
                if ($(e.target).closest(".tox-dialog").length) {
                    e.stopImmediatePropagation();
                }
            });

            /** reset form thêm mới*/
            $(document).on('click', '.btn-create', function () {
                $('#modal-create form#create-page')[0].reset();
                $('#modal-create form#create-page .text-error').remove();
                $('.btn-store').attr('disabled',false);
            });

            /** thêm mới*/
            $(document).on('click','.btn-store', function () {
                $('form#create-page .text-error').remove();
                $('.btn-store').attr('disabled',true);
                var name = $('form#create-page input[name="name"]');
                var slug = $('form#create-page input[name="slug"]');
                var summary = $('form#create-page textarea[name="summary"]');
                var description = tinymce.get('description').getContent();
                var meta_title = $('form#create-page input[name="meta_title"]');
                var meta_keyword = $('form#create-page input[name="meta_keyword"]');
                var meta_description = $('form#create-page textarea[name="meta_description"]');

                var input = {
                    name:name.val(),
                    slug:slug.val(),
                    summary:summary.val(),
                    description:description,
                    meta_title:meta_title.val(),
                    meta_keyword:meta_keyword.val(),
                    meta_description:meta_description.val(),
                }

                $.ajax({
                    url: "{{route('admin.pages.store')}}",
                    method: "post",
                    data: input,
                    dataType:'json',
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
                        if (message.summary) {
                            summary.after(error(message.summary));
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
                    url: "{{route('admin.pages.destroy')}}",
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

            /** reset form cập nhật*/
            $(document).on('click', '.btn-edit', function () {
                $('#modal-edit form#update-page')[0].reset();
                $('#modal-edit form#update-page .text-error').remove();
                $('.btn-update').attr('disabled',false);
                var id  =  $(this).attr('data-value');
                var input = {
                    id: id,
                }
                $.ajax({
                    url: "{{route('admin.pages.edit')}}",
                    method: "POST",
                    data: input,
                    dataType: "json",
                    success: function (output) {
                        if (output.success) {
                            $('#modal-edit').modal('show');
                            $('form#update-page input[name="name"]').val(output.page.name);
                            $('form#update-page input[name="id"]').val(output.page.id);
                            $('form#update-page input[name="slug"]').val(output.page.slug);
                            $('form#update-page textarea[name="summary"]').val(output.page.summary);
                            if (output.page.description) {
                                tinymce.get("description-edit").setContent(output.page.description);
                            }
                            $('form#update-page input[name="meta_title"]').val(output.page.meta_title);
                            $('form#update-page input[name="meta_keyword"]').val(output.page.meta_keyword);
                            $('form#update-page textarea[name="meta_description"]').val(output.page.meta_description);
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
            $(document).on('click', '.btn-update', function () {
                $('form#update-page .text-error').remove();
                $('.btn-update').attr('disabled',true);
                var name = $('form#update-page input[name="name"]');
                var id = $('form#update-page input[name="id"]');
                var slug = $('form#update-page input[name="slug"]');
                var summary = $('form#update-page textarea[name="summary"]');
                var description = tinymce.get("description-edit").getContent();
                var meta_title = $('form#update-page input[name="meta_title"]');
                var meta_keyword = $('form#update-page input[name="meta_keyword"]');
                var meta_description = $('form#update-page textarea[name="meta_description"]');
                var input = {
                    name:name.val(),
                    id:id.val(),
                    slug:slug.val(),
                    summary:summary.val(),
                    description:description,
                    meta_title:meta_title.val(),
                    meta_keyword:meta_keyword.val(),
                    meta_description:meta_description.val(),
                };
                $.ajax({
                    url: "{{route('admin.pages.update')}}",
                    method: "post",
                    data: input,
                    dataType:'json',
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
                        if (message.slug) {
                            slug.after(error(message.slug));
                        }
                        if (message.summary) {
                            summary.after(error(message.summary));
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
        })
    </script>
@endsection
