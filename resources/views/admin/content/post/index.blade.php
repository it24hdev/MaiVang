@extends('admin.layouts.base')
@section('body')
    @can('viewAny', \App\Admin\Models\Post::class)
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
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Quản lý Bài viết</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page"><a
                                            href="{{route('admin.posts.index')}}">Danh sách Bài viết</a></li>
                                </ol>
                            </nav>
                        </div>
                    </li>
                </ul>
            </header>
        </div>
        <!-- Main Body Starts -->
        <div class="layout-px-spacing">
            <div class="row layout-spacing layout-top-spacing" id="cancel-row">
                <div class="widget-content searchable-container grid">
                    <div class="widget-heading mx-4 d-flex justify-content-between flex-wrap">
                        <h5 class="font-weight-bold m-0">Bài viết</h5>
                        <div class="dropdown custom-dropdown-icon">
                            <div class="d-flex justify-content-sm-end justify-content-center contact-options">
                                <a href="javascript:void(0);" title="Thêm mới bài viết" data-toggle="modal"
                                   data-target="#modal-create"
                                   class="pointer font-25 s-o mr-1 bs-tooltip btn-create">
                                    <i class="las la-plus-circle"></i>
                                </a>
                                <a class="pointer nav-link full-screen-mode font-25 s-o bs-tooltip mr-1"
                                   href="javascript:void(0);">
                                    <i class="las la-compress" id="fullScreenIcon"></i>
                                </a>
                                <a title="Tải lại" class="pointer font-25 s-o bs-tooltip mr-1"
                                   onclick="window.location.reload();">
                                    <i class="las la-sync-alt"></i>
                                </a>
                                <a class="pointer font-25 s-o">
                                    <i class="las la-cog"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="statbox">
                        <div class="widget-content widget-content-area normal-tab pt-0">
                            <ul class="nav nav-tabs " id="animateLine" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab"
                                       href="#active-tab" role="tab"
                                       aria-controls="animated-underline-home" aria-selected="true">Sử dụng</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab"
                                       href="#disable-tab" role="tab"
                                       aria-controls="animated-underline-about" aria-selected="false">Không sử
                                        dụng</a>
                                </li>
                            </ul>
                            <div class="tab-content ecommerce-table">
                                <div class="tab-pane fade show active p-0" id="active-tab" role="tabpanel"
                                     aria-labelledby="animated-underline-home-tab">
                                    <div class="row my-2">
                                        <form method="get" action="{{route('admin.posts.index')}}"
                                              enctype="multipart/form-data"
                                              class="col-12 d-flex justify-content-between flex-wrap align-center">
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 filtered-list-search align-self-center p-0">
                                                <div
                                                    class="box-search form-inline my-2 my-lg-0 justify-content-end col-12 px-0 m-0">
                                                    <i class="las la-search toggle-search"></i>
                                                    <input
                                                        class="form-control w-100 search-form-control ml-lg-auto pr-3"
                                                        type="search" placeholder="Tìm kiếm" name="search"
                                                        value="{{request()->input('search')}}">
                                                </div>
                                            </div>
                                            <div class="text-sm-right text-center align-self-center">
                                                <div
                                                    class="d-flex justify-content-sm-end justify-content-center align-center contact-options">
                                                    <div class="form-inline my-2 my-lg-0">
                                                        <select name="limit"
                                                                class="btn btn-outline-primary btn-sm h-auto p-2 mr-2 w-auto"
                                                                onchange="this.form.submit()">
                                                            <option
                                                                value="{{\App\Admin\Http\Helpers\Common::page_limit()}}">
                                                                {{\App\Admin\Http\Helpers\Common::page_limit()}}
                                                            </option>
                                                            <option value="25">
                                                                25
                                                            </option>
                                                            <option value="50">
                                                                50
                                                            </option>
                                                            <option value="100">
                                                                100
                                                            </option>
                                                        </select>
                                                        <select name="sort_by"
                                                                class="btn btn-outline-primary btn-sm h-auto p-2 mr-2 w-auto"
                                                                onchange="this.form.submit()">
                                                            <option value="">
                                                                Sắp xếp
                                                            </option>
                                                            <option
                                                                value="name" {{request()->input('sort_by') == 'name' ?'selected':''}}>
                                                                Tên bài viết
                                                            </option>
                                                            <option
                                                                value="published_at" {{request()->input('sort_by') == 'published_at' ?'selected':''}}>
                                                                Ngày đăng mới nhất
                                                            </option>
                                                            <option
                                                                value="status_1" {{request()->input('sort_by') == 'status_1' ?'selected':''}}>
                                                                Đã đăng
                                                            </option>
                                                            <option
                                                                value="status_2" {{request()->input('sort_by') == 'status_2' ?'selected':''}}>
                                                                Chưa đăng
                                                            </option>
                                                        </select>
                                                        <select name="type" onchange="this.form.submit()"
                                                                class="btn btn-outline-primary btn-sm h-auto p-2 mr-2 w-auto">
                                                            <option value="">Loại bài viết</option>
                                                            <option value="1" {{request()->input('type') == 1 ?'selected':''}}>Bài viết</option>
                                                            <option value="2" {{request()->input('type') == 2 ?'selected':''}}>Video</option>
                                                            <option value="3" {{request()->input('type') == 3 ?'selected':''}}>Giải pháp</option>
                                                            <option value="4" {{request()->input('type') == 4 ?'selected':''}}>Ảnh</option>
                                                        </select>
                                                        <select name="category_post" onchange="this.form.submit()"
                                                                class="btn btn-outline-primary btn-sm h-auto p-2 mr-2 w-auto">
                                                            <option value="">Danh mục</option>
                                                            @foreach($categoryPosts as $item)
                                                                <option value="{{$item->id}}" {{request()->input('category_post') == $item->id ?'selected':''}}>{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr class="tbl_head">
                                                <th class="th-content align-items-end">
                                                    <div class="th-content d-flex align-items-center">STT</div>
                                                </th>
                                                <th>
                                                    <div class="th-content d-flex align-items-center">Bài viết</div>
                                                </th>
                                                <th>
                                                    <div class="th-content d-flex align-items-center">Trạng thái
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="th-content d-flex align-items-center">Ngày đăng
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="th-content d-flex align-items-center">Người đăng
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="th-content">Chức năng</div>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($posts as $item)
                                                <tr id="row_{{$item->id}}">
                                                    <td>
                                                        {{$loop->iteration}}
                                                    </td>
                                                    <td>
                                                        <div class="media">
                                                            @if($item->image !=  \App\Admin\Models\Post::noImage)
                                                                <img class="rounded"
                                                                     src="{{asset('media/posts/small/'.$item->image)}}">
                                                            @else
                                                                <img class="rounded"
                                                                     src="{{asset('media/common/'.\App\Admin\Models\Post::noImage)}}">
                                                            @endif
                                                            <div class="media-body ml-2">
                                                                <h4 class="media-heading"><a href="{{route('redirect',$item->slug)}}" class="media-title"><ins>{{$item->name}}</ins></a>
                                                                </h4>
                                                                <p class="media-text">{{$item->summary}}</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        @if($item->status == 1)
                                                            <span
                                                                class="badge badge-success-teal light">Đã đăng</span>
                                                        @else
                                                            <span class="badge badge-danger light">Chưa đăng</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <p class="m-0">{{date('d-m-y', strtotime($item->published_at))}}</p>
                                                        <p class="m-0">{{date('h:s A', strtotime($item->published_at))}}</p>
                                                    </td>
                                                    <td>
                                                        @if($item->User) {{$item->User->name}} @endif</td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="javascript:void(0);"
                                                               class="bs-tooltip font-20 text-primary btn-edit"
                                                               title="Sửa" data-value="{{$item->id}}"
                                                               data-original-title="Sửa"><i class="las la-edit"></i></a>
                                                            <a href="javascript:void(0);"
                                                               class="bs-tooltip font-20 text-danger ml-2 btn-delete"
                                                               title="Xóa" data-original-title="Xóa"
                                                               data-value="{{$item->id}}" data-toggle="modal"
                                                               data-target="#modal-delete">
                                                                <i class="las la-trash"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    {!! $posts->links('admin.layouts.pagination') !!}
                                </div>
                                <div class="tab-pane fade" id="disable-tab" role="tabpanel"
                                     aria-labelledby="animated-underline-about-tab">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr class="tbl_head">
                                                <th class="th-content align-items-end">
                                                    <div class="th-content text-center">STT</div>
                                                </th>
                                                <th>
                                                    <div class="th-content text-center">Bài viết</div>
                                                </th>
                                                <th>
                                                    <div class="th-content text-center">Trạng thái</div>
                                                </th>
                                                <th>
                                                    <div class="th-content text-center">Ngày đăng</div>
                                                </th>
                                                <th>
                                                    <div class="th-content text-center">Người đăng</div>
                                                </th>
                                                <th>
                                                    <div class="th-content text-center">Chức năng</div>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($postsTrashed as $item)
                                                <tr id="row_{{$item->id}}">
                                                    <td>
                                                        {{$loop->iteration}}
                                                    </td>
                                                    <td>
                                                        <div class="media">
                                                            @if($item->image !=  \App\Admin\Models\Post::noImage)
                                                                <img class="rounded"
                                                                     src="{{asset('media/posts/small/'.$item->image)}}">
                                                            @else
                                                                <img class="rounded"
                                                                     src="{{asset('media/common/'.\App\Admin\Models\Post::noImage)}}">
                                                            @endif
                                                            <div class="media-body ml-2">
                                                                <h4 class="media-heading"><span
                                                                        class="media-title">{{$item->name}}</span>
                                                                </h4>
                                                                <p class="media-text">{{$item->summary}}</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        @if($item->status == 1)
                                                            <span
                                                                class="badge badge-success-teal light">Đã đăng</span>
                                                        @else
                                                            <span class="badge badge-danger light">Chưa đặt</span>
                                                        @endif

                                                    </td>
                                                    <td>
                                                        <p class="m-0">{{date('d-m-y', strtotime($item->created_at))}}</p>
                                                        <p class="m-0">{{date('m:h a', strtotime($item->created_at))}}</p>
                                                    </td>
                                                    <td>{{$item->User->name}}</td>
                                                    <td class="text-center">
                                                        @can('restore', \App\Admin\Models\Post::class)
                                                            <a href="javascript:void(0);"
                                                               class="bs-tooltip font-20 text-success ml-2 btn-restore"
                                                               title="Khôi phục"
                                                               data-toggle="modal"
                                                               data-target="#modal-restore"
                                                               data-value="{{$item->id}}">
                                                                <i class="las la-sync"></i>
                                                            </a>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    {!! $postsTrashed->links('admin.layouts.pagination') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.content.post.delete')
        @include('admin.content.post.create')
        @include('admin.content.post.restore')
        @include('admin.content.post.edit')
        <!-- Main Body Ends -->
    @endcan
@endsection
@section('css')
    <!-- Page Level Plugin/Style Starts -->
    <link href="{{asset('css/admin/tables.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/custom-switch.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/select2.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Page Level Plugin/Style Ends -->
@endsection
@section('js')
    <script src="{{ asset('library/tinymce/tinymce.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            /** Soạn thảo văn bản tinyMce*/
            tinymce.init({
                selector: '.editor-box textarea',
                relative_urls: false,
                height: 400,
                plugins: [
                    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table directionality",
                    "emoticons template paste textpattern"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
                file_picker_callback: function (callback, value, meta) {
                    let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                    let y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

                    let type = 'image' === meta.filetype ? 'Images' : 'Files',
                        url = '{{route('admin')}}' + '/laravel-file-manager?editor=tinymce5&type=' + type;

                    tinymce.activeEditor.windowManager.openUrl({
                        url: url,
                        title: 'Filemanager',
                        width: x * 0.8,
                        height: y * 0.8,
                        onMessage: (api, message) => {
                            callback(message.content);
                        }
                    });
                }
            });
        });
        $(document).on('focusin', function(e) {
            if ($(e.target).closest(".tox-dialog").length)
                e.stopImmediatePropagation();
        });
        $('.modal').on('shown.bs.modal', function() {
            $(document).off('focusin.modal');
        })
        $('.modal').on('hide.bs.modal', function() {
            $(".tox-toolbar__overflow").hide();
        })
    </script>
    <!-- Page Level Plugin/Script Starts -->
    <script src="{{asset('js/admin/select2.min.js')}}"></script>
    <script src="{{asset('js/admin/custom-select2.js')}}"></script>
    <script>
        $(document).ready(function () {
            $(document).on('click', '.btn-create', function () {
                $('form#create-post')[0].reset();
                $('form#create-post').find(':checkbox').prop('checked', true);
                $('form#create-post select[name="category_post[]"]').trigger("change");
                $('form#create-post .text-error').remove();
                $('#view-image').attr('src', $('#view-image').attr('data-src'));
                $('.btn-store').attr('disabled',false);
            });

            /** Thay ảnh form thêm mới*/
            $(document).on('change', '#post-image', function () {
                $('form#create-post .text-error').remove();
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
            $(document).on('change', '#post-image-edit', function () {
                $('form#edit-post .text-error').remove();
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

            /** Thêm mới */
            $(document).on('click', '.btn-store', function () {
                $('form#create-post .text-error').remove();
                $('.btn-store').attr('disabled',true);
                var image = $('form#create-post input[name="image"]');
                var name = $('form#create-post input[name="name"]');
                var slug = $('form#create-post input[name="slug"]');
                var published_at = $('form#create-post input[name="published_at"]');
                var number_order = $('form#create-post input[name="number_order"]');
                var summary = $('form#create-post textarea[name="summary"]');
                var description = tinymce.get('description').getContent();
                var meta_title = $('form#create-post input[name="meta_title"]');
                var meta_keyword = $('form#create-post input[name="meta_keyword"]');
                var meta_description = $('form#create-post textarea[name="meta_description"]');
                var status = $('form#create-post input[name="status"]');
                var type = $('form#create-post select[name="type"]');
                var video = $('form#create-post input[name="video"]');
                var category_post = $('form#create-post select[name="category_post[]"]');
                var tags = $('form#create-post select[name="tags[]"]');
                //khởi tạo đối tượng form data
                var file_data = $("#post-image").prop("files")[0];
                var form_data = new FormData();
                form_data.append("image", file_data);
                form_data.append("name", name.val());
                form_data.append("slug", slug.val());
                form_data.append("summary", summary.val());
                form_data.append("published_at", published_at.val());
                form_data.append("number_order", number_order.val());
                form_data.append("description", description);
                form_data.append("meta_title", meta_title.val());
                form_data.append("meta_keyword", meta_keyword.val());
                form_data.append("meta_description", meta_description.val());
                form_data.append("status", status.is(':checked') ? 1 : 0);
                form_data.append("type", type.val());
                form_data.append("video", video.val());
                form_data.append("category_post", JSON.stringify(category_post.val()));
                form_data.append("tags", JSON.stringify(tags.val()));
                $.ajax({
                    url: "{{route('admin.posts.store')}}",
                    method: "post",
                    data: form_data,
                    processData: false,
                    contentType: false,
                    success: function (output) {
                        if (output.success) {
                            $('#modal-create').modal('hide');
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
                        if (message.summary) {
                            summary.after(error(message.summary));
                        }
                        if (message.meta_title) {
                            meta_title.after(error(message.meta_title));
                        }
                        if (message.meta_keywords) {
                            meta_keywords.after(error(message.meta_keywords));
                        }
                        if (message.meta_description) {
                            meta_description.after(error(message.meta_description));
                        }
                    }
                });
            });

            /** Xóa */
            $(document).on('click', '#destroy', function () {
                var id = $(this).attr('data-value');
                var input = {
                    id: id,
                }
                $('.tooltip').hide();
                $.ajax({
                    async: false,
                    url: "{{ route('admin.posts.destroy') }}",
                    method: "POST",
                    data: input,
                    dataType: "json",
                    success: function (output) {
                        if (output.success) {
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
            });

            /** Khôi phục */
            $(document).on('click', '#restore', function () {
                var id = $(this).attr('data-value');
                var input = {
                    id: id,
                }
                $('.tooltip').hide();
                $.ajax({
                    url: "{{route('admin.posts.restore')}}",
                    method: "POST",
                    data: input,
                    dataType: "json",
                    success: function (output) {
                        if (output.success) {
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
            });

            /** from cập nhật*/
            $(document).on('click', '.btn-edit', function () {
                $('form#update-post')[0].reset();
                $('form#update-post .text-error').remove();
                $('form#update-post select[name="category_post[]"]').trigger("change");
                $('#view-image-edit').attr('src', $('#view-image-edit').attr('data-src'));
                $('.btn-update').attr('disabled',false);
                var id = $(this).attr('data-value');
                var input = {
                    id: id,
                }
                $.ajax({
                    url: "{{route('admin.posts.edit')}}",
                    method: "post",
                    data: input,
                    dataType: 'json',
                    success: function (output) {
                        if (output.success) {
                            $('#modal-edit').modal('show');
                            $('#modal-edit').modal({backdrop: 'static', keyboard: false});
                            $('form#update-post input[name="name"]').val(output.post.name);
                            $('form#update-post input[name="id"]').val(output.post.id);
                            $('form#update-post input[name="slug"]').val(output.post.slug);
                            $('form#update-post input[name="published_at"]').val(output.post.published_at);
                            $('form#update-post input[name="number_order"]').val(output.post.number_order);
                            $('form#update-post textarea[name="summary"]').val(output.post.summary);
                            $('form#update-post select[name="type"]').val(output.post.type);
                            $('form#update-post input[name="video"]').val(output.post.video);
                            if (output.post.status === 1) {
                                $('form#update-post input[name="status"]').attr('checked', true);
                            } else {
                                $('form#update-post input[name="status"]').attr('checked', false);
                            }
                            if (output.post.image !== "{{\App\Admin\Models\Post::noImage}}") {
                                var src = "{{asset('media/posts/large/post_image')}}";
                                src = src.replace('post_image',output.post.image );
                                $('#view-image-edit').attr('src', src);
                                $('#view-image-edit').attr('data-src', src);
                            }
                            else{
                                var src = "{{asset('media/common/'.\App\Admin\Models\Post::noImage)}}";
                                $('#view-image-edit').attr('src', src);
                                $('#view-image-edit').attr('data-src', src);
                            }
                            if(output.post.type === 2){
                                $('form#update-post .area-video').removeClass('d-none');
                            }else{
                                $('form#update-post .area-video').addClass('d-none');
                            }

                            $('form#update-post input[name="meta_title"]').val(output.post.meta_title);
                            $('form#update-post input[name="meta_keyword"]').val(output.post.meta_keyword);
                            $('form#update-post textarea[name="meta_description"]').val(output.post.meta_description);
                            if(output.post.description){
                                tinymce.get('description-edit').setContent(output.post.description);
                            }
                            $('#update-post select[name="category_post[]"]').val(output.categoryPosts).trigger('change');
                            $('#update-post select[name="tags[]"]').val(output.tags).trigger('change');
                        }
                    }
                });
            });

            /** Cập nhật */
            $(document).on('click', '.btn-update', function () {
                $('form#update-post .text-error').remove();
                $('.btn-update').attr('disabled',true);
                var image = $('form#update-post input[name="image"]');
                var name = $('form#update-post input[name="name"]');
                var id = $('form#update-post input[name="id"]');
                var slug = $('form#update-post input[name="slug"]');
                var published_at = $('form#update-post input[name="published_at"]');
                var number_order = $('form#update-post input[name="number_order"]');
                var summary = $('form#update-post textarea[name="summary"]');
                var description = tinymce.get('description-edit').getContent();
                var meta_title = $('form#update-post input[name="meta_title"]');
                var meta_keyword = $('form#update-post input[name="meta_keyword"]');
                var meta_description = $('form#update-post textarea[name="meta_description"]');
                var status = $('form#update-post input[name="status"]');
                var type = $('form#update-post select[name="type"]');
                var video = $('form#update-post input[name="video"]');
                var category_post = $('form#update-post select[name="category_post[]"]');
                var tags = $('form#update-post select[name="tags[]"]');
                //khởi tạo đối tượng form data
                var file_data = $("#post-image-edit").prop("files")[0];
                var form_data = new FormData();
                form_data.append("image", file_data);
                form_data.append("name", name.val());
                form_data.append("id", id.val());
                form_data.append("slug", slug.val());
                form_data.append("summary", summary.val());
                form_data.append("published_at", published_at.val());
                form_data.append("number_order", number_order.val());
                form_data.append("description", description);
                form_data.append("meta_title", meta_title.val());
                form_data.append("meta_keyword", meta_keyword.val());
                form_data.append("meta_description", meta_description.val());
                form_data.append("status", status.is(':checked') ? 1 : 0);
                form_data.append("type", type.val());
                form_data.append("video", video.val());
                form_data.append("category_post", JSON.stringify(category_post.val()));
                form_data.append("tags", JSON.stringify(tags.val()));
                $.ajax({
                    url: "{{route('admin.posts.update')}}",
                    method: "post",
                    data: form_data,
                    processData: false,
                    contentType: false,
                    success: function (output) {
                        if (output.success) {
                            $('#modal-edit').modal('hide');
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
                        if (message.summary) {
                            summary.after(error(message.summary));
                        }
                        if (message.meta_title) {
                            meta_title.after(error(message.meta_title));
                        }
                        if (message.meta_keywords) {
                            meta_keywords.after(error(message.meta_keywords));
                        }
                        if (message.meta_description) {
                            meta_description.after(error(message.meta_description));
                        }
                    }
                });
            });

            $('#create-post select[name="category_post[]"]').select2({
                width: '100%',
                dropdownParent: $("#modal-create"),
            });

            $('#update-post select[name="category_post[]"]').select2({
                width: '100%',
                dropdownParent: $("#modal-edit"),
            });

            $('#create-post select[name="tags[]"]').select2({
                width: '100%',
                dropdownParent: $("#modal-create"),
            });

            $('#update-post select[name="tags[]"]').select2({
                width: '100%',
                dropdownParent: $("#modal-edit"),
            });

            $(document).on('change','select[name="type"]', function () {
                var type = $(this).val();
                if(type == 2){
                    $('.area-video').removeClass('d-none');
                }
                else{
                    $('.area-video').addClass('d-none');
                }
            });
        });
    </script>
    <!-- Page Level Plugin/Script Ends -->
@endsection
