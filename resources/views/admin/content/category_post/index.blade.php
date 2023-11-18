@extends('admin.layouts.base')
@section('body')
    @can('viewAny',\App\Admin\Models\CategoryProduct::class)
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
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Bài viết</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <a href="{{route('admin.category_products.index')}}">Danh mục bài viết</a>
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
                    <div class="overflow-auto">
                        <div class="widget-content searchable-container grid">
                            <div class="widget ecommerce-table">
                                <div class="widget-heading flex-wrap m-0">
                                    <h5 class="">Danh mục bài viết</h5>
                                    <div class="dropdown custom-dropdown-icon">
                                        <div class="d-flex justify-content-sm-end justify-content-center align-center contact-options">
                                            @can('viewAny',\App\Admin\Models\CategoryPost::class)
                                                <a href="javascript:void(0);" title="Thêm mới"
                                                   data-toggle="modal" data-target="#modal-create"
                                                   class="pointer font-25 s-o mr-2 btn-create">
                                                    <i class="las la-plus-circle"></i>
                                                </a>
                                            @endcan
                                            <a href="javascript:void(0);" title="Thu/Phóng"
                                               class="pointer nav-link full-screen-mode font-25 s-o mr-1">
                                                <i class="las la-compress" id="fullScreenIcon"></i>
                                            </a>
                                            <a href="javascript:void(0);" onClick="window.location.reload();"
                                               title="Tải lại trang" class="pointer font-25 s-o mr-1">
                                                <i class="las la-sync-alt"></i>
                                            </a>
                                                <a class="pointer font-25 s-o " title="Tác vụ">
                                                    <i class="las la-cog"></i>
                                                </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content tab-horizontal-line d-flex flex-wrap">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <ul id="dragRoot">
                                            <li id="li_ui_0" data-value="0"><i class="icon-building"></i> <span
                                                    class="node-facility">Danh mục gốc</span>
                                                <ul id="ul_ui_0">
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <div class="widget-content date-table-container table-responsive">
                                            <table id="category-posts" class="table table-hover dataTable">
                                                <thead>
                                                <tr>
                                                    <th class="text-center">Danh mục</th>
                                                    <th class="text-center">Bài viết</th>
                                                    <th class="text-center">Chức năng</th>
                                                    <th class="text-center"></th>
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
        @include('admin.content.category_post.template_ui')
        @include('admin.content.category_post.create')
        @include('admin.content.category_post.edit')
        @include('admin.content.category_post.delete')
        @include('admin.content.category_post.delete_with_child')
    @endcan
@endsection
@section('css')
    <!-- Page Level Plugin/Style Starts -->
    <link href="{{asset('css/admin/tables.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/custom-switch.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/jquery_ui.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/dropzone.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/file-upload.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/checkbox-theme.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/dt-global_style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('library/datatable/datatables.css')}}" rel="stylesheet" type="text/css">
    <!-- Page Level Plugin/Style Ends -->
@endsection
@section('js')
    <script src="{{asset('library/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('library/tinymce/tinymce.min.js') }}"></script>
    <script src="{{asset('library/datatable/datatables.js')}}"></script>
    <script>
        $(document).ready(function () {
            load();
            sortable();

            function load() {
                $.ajax({
                    async: false,
                    url: "{{ route('admin.category_posts.load') }}",
                    method: "POST",
                    dataType: "json",
                    success: function (output) {
                        $('#dragRoot li ul').html('');
                        if (output.categoryPosts.length > 0) {
                            $('select[name="parent"]').html('');
                            $('select[name="parent"]').append($('<option>', {value: 0, text: 'Chọn danh mục gốc'}));
                            var template_ui = $('#template_ui').html();
                            $.each(output.categoryPosts, function (k, v) {
                                var tmp = $(template_ui).clone();
                                if (v.parent == 0) {
                                    if ($.inArray(v.id, output.hasChild) !== -1) {
                                        $(tmp).find('.extends').removeClass('d-none');
                                    }
                                    $(tmp).attr('id', 'li_ui_' + v.id);
                                    $(tmp).attr('data-value', v.id);
                                    $(tmp).find('ul').attr('id', 'ul_ui_' + v.id);
                                    $(tmp).find('ul').attr('data-value', v.id);
                                    $(tmp).find('.node-cpe').html(v.name);
                                    $(tmp).find('.btn-edit').attr('data-value', v.id);
                                    $('#dragRoot li ul#ul_ui_0').append(tmp);
                                } else {
                                    if ($.inArray(v.id, output.hasChild) !== -1) {
                                        $(tmp).find('.extends').removeClass('d-none');
                                    }
                                    $(tmp).attr('id', 'li_ui_' + v.id);
                                    $(tmp).attr('data-value', v.id);
                                    $(tmp).find('ul').attr('id', 'ul_ui_' + v.id);
                                    $(tmp).find('ul').attr('data-value', v.id);
                                    $(tmp).find('.node-cpe').html(v.name);
                                    $(tmp).find('.btn-edit').attr('data-value', v.id);
                                    $('#ul_ui_' + v.parent).append(tmp);
                                }


                                $('select[name="parent"]').append($('<option>', {
                                    value: v.id,
                                    text: '━ '.repeat(v.level) + v.name
                                }));
                            });

                            $('#category-posts').DataTable().destroy();
                            $('#category-posts').DataTable({
                                data: output.categoryPosts,
                                columns: [
                                    {
                                        data: { name: 'name', level: 'level'},
                                        render: function(data){
                                            var str = "━━";
                                            return str.repeat(data.level)+data.name;
                                        },
                                    },
                                    {
                                        data: { id: 'id', count_post: 'count_post'},
                                        render:function (data) {
                                            var url = "{{route('admin.posts.index',['category_post' => 'category_post_id'])}}";
                                            url = url.replace('category_post_id',data.id);
                                            return '<a href="'+url+'">'+data.count_post+' <span class="text-primary">(Xem)</span></a>';
                                        }
                                    },
                                    {
                                        data: 'id',
                                        render: function (data) {
                                            return '<div class="d-flex justify-content-center">' +
                                                '<a href="javascript:void(0);" class="bs-tooltip font-20 text-primary btn-edit" title="Cập nhật" data-value="' + data + '">' +
                                                '<i class="las la-edit"></i></a></div>';
                                        },
                                    },
                                    {data:'parent'}
                                ],
                                language: {
                                    "paginate": {
                                        "previous": "<i class='las la-angle-left'></i>",
                                        "next": "<i class='las la-angle-right'></i>"
                                    }
                                },
                                ordering: false,
                                columnDefs: [
                                    {type: "num"},
                                    {className: 'text-center', targets: [1,2]},
                                    {className: 'text-left', targets: [0]},
                                    { visible: false, targets: [3] },
                                    { width: "50%", targets: 0 }
                                ],
                                lengthMenu: [10, 25, 50, 100],
                                pageLength: 10,
                            });
                        }
                    }
                });
            };

            function reloadSelectCategory() {
                $.ajax({
                    async: false,
                    url: "{{ route('admin.category_posts.load') }}",
                    method: "POST",
                    dataType: "json",
                    success: function (output) {
                        if (output.categoryPosts.length > 0) {
                            $('select[name="parent"]').html('');
                            $('select[name="parent"]').append($('<option>', {value: 0, text: 'Chọn danh mục gốc'}));
                            if (output.categoryPosts.length > 0) {
                                $.each(output.categoryPosts, function (k, v) {
                                    $('select[name="parent"]').append($('<option>', {
                                        value: v.id,
                                        text: '━ '.repeat(v.level) + v.name
                                    }));
                                });
                            }
                        }
                    }
                });
            };

            $(document).on('click', '.extends .la-plus-square,.extends .la-minus-square', function () {
                var parent = $(this).closest('li');
                if ($(this).hasClass('la-plus-square')) {
                    $(this).removeClass('la-plus-square');
                    $(this).addClass('la-minus-square');
                    parent.find('ul').first().removeClass('d-none');
                } else {
                    $(this).addClass('la-plus-square');
                    $(this).removeClass('la-minus-square');

                    parent.find('ul').first().addClass('d-none');
                }
            })

            /** update vị trí danh mục*/
            function updateLocation(item, target) {
                var this_id = item.attr('data-value');
                var parent = target.attr('data-value');
                var input = {
                    parent: parent,
                    id: this_id,
                };
                $.ajax({
                    url: "{{ route('admin.category_posts.update_location') }}",
                    method: "POST",
                    data: input,
                    dataType: "json",
                    success: function (output) {
                        if (output.success) {
                            console.log('Cập nhật thành công:' + item.find('.node-cpe').html());
                        }
                    }
                });
            }

            /** Jquery ui drop drag*/
            function shouldAcceptDrop(item) {
                var $target = $(this).closest("li");
                var $item = item.closest("li");
                if ($.contains($item[0], $target[0])) {
                    return false;
                }
                return true;
            }

            function itemDropped(event, ui) {

                var $target = $(this).closest("li");
                var $item = ui.draggable.closest("li");

                var $srcUL = $item.parent("ul");
                var $dstUL = $target.children("ul").first();

                // destination may not have a UL yet
                if ($dstUL.length === 0) {
                    $dstUL = $("<ul></ul>");
                    $target.append($dstUL);
                }

                $item.slideUp(50, function () {

                    $dstUL.append($item);

                    if ($srcUL.children("li").length === 0) {
                        $srcUL.remove();
                    }

                    $item.slideDown(50, function () {
                        $item.css('display', '');
                    });

                });
                updateLocation($item, $target);
            }

            function sortable() {
                $('#dragRoot').find(".node-cpe").draggable({
                    helper: "clone"
                });
                $('#dragRoot').find(".node-cpe, .node-facility").droppable({
                    activeClass: "active",
                    hoverClass: "hover",
                    accept: shouldAcceptDrop,
                    drop: itemDropped,
                    greedy: true,
                    tolerance: "pointer"
                });
            }

            /** reset form thêm mới */
            $(document).on('click', '.btn-create', function () {
                $('form#create-category-post')[0].reset();
                $('form#create-category-post').find(':checkbox').prop('checked', true);
                $('form#create-category-post .text-error').remove();
                reloadSelectCategory();
                $('.btn-store').attr('disabled',false);
            });

            /** Thêm mới */
            $(document).on('click', '.btn-store', function () {
                $('form#create-category-post .text-error').remove();
                $('.btn-store').attr('disabled',true);

                var name = $('form#create-category-post input[name="name"]');
                var parent = $('form#create-category-post select[name="parent"]');
                var slug = $('form#create-category-post input[name="slug"]');
                var redirect = $('form#create-category-post input[name="redirect"]');
                var show = $('form#create-category-post input[name="show"]');
                var description = tinymce.get('description').getContent();
                var meta_title = $('form#create-category-post input[name="meta_title"]');
                var meta_keyword = $('form#create-category-post input[name="meta_keyword"]');
                var meta_description = $('form#create-category-post textarea[name="meta_description"]');

                var form_data = new FormData();
                //thêm vào trong form data
                form_data.append("name", name.val());
                form_data.append("parent", parent.val());
                form_data.append("slug", slug.val());
                form_data.append("redirect", redirect.val());
                form_data.append("show", show.is(':checked') ? 1 : 0);
                form_data.append("description", description);
                form_data.append("meta_title", meta_title.val());
                form_data.append("meta_keyword", meta_keyword.val());
                form_data.append("meta_description", meta_description.val());

                $.ajax({
                    url: "{{route('admin.category_posts.store')}}",
                    method: "post",
                    data: form_data,
                    processData: false,
                    contentType: false,
                    success: function (output) {
                        $('#modal-create').modal('hide');
                        if (output.success) {
                            load();
                            sortable();
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
                        if (message.redirect) {
                            redirect.after(error(message.redirect));
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

            /** reset form cập nhật */
            $(document).on('click', '.btn-edit', function () {
                $('form#update-category-post')[0].reset()
                $('form#update-category-post .text-error').remove();
                $('#modal-edit .btn-update').attr('disabled',false);
                var id = $(this).attr('data-value');
                var input = {
                    id: id
                };
                $.ajax({
                    url: "{{ route('admin.category_posts.edit') }}",
                    method: "POST",
                    data: input,
                    dataType: "json",
                    success: function (output) {
                        if (output.success) {
                            $('#modal-edit').modal('show');
                            categoryPost(output.categoryPost);
                        } else {
                            Snackbar.show({
                                text: 'Có lỗi xảy ra',
                                pos: 'top-center'
                            });
                        }
                    }
                });
            });

            function categoryPost(data) {
                $('form#update-category-post input[name="name"]').val(data.name);
                $('form#update-category-post input[name="id"]').val(data.id);
                $('form#update-category-post input[name="slug"]').val(data.slug);
                $('form#update-category-post input[name="redirect"]').val(data.redirect);
                if (data.show === 1) {
                    $('form#update-category-post input[name="show"]').attr('checked', true);
                }
                else{
                    $('form#update-category-post input[name="show"]').attr('checked', false);
                }
                if (data.description) {
                    tinymce.get("description-edit").setContent(data.description);
                }
                $('form#update-category-post input[name="meta_title"]').val(data.meta_title);
                $('form#update-category-post input[name="meta_keyword"]').val(data.meta_keyword);
                $('form#update-category-post textarea[name="meta_description"]').val(data.meta_description);
                $('#modal-edit .btn-delete').attr('data-value', data.id);
                $('#modal-edit .btn-delete-with-child').attr('data-value', data.id);
            }

            /** Cập nhật */
            $(document).on('click', '#modal-edit .btn-update', function () {
                $('form#update-category-post .text-error').remove();
                $('#modal-edit .btn-update').attr('disabled',true);
                var name = $('form#update-category-post input[name="name"]');
                var id = $('form#update-category-post input[name="id"]');
                var slug = $('form#update-category-post input[name="slug"]');
                var redirect = $('form#update-category-post input[name="redirect"]');
                var show = $('form#update-category-post input[name="show"]');
                var description = tinymce.get('description-edit').getContent()
                var meta_title = $('form#update-category-post input[name="meta_title"]');
                var meta_keyword = $('form#update-category-post input[name="meta_keyword"]');
                var meta_description = $('form#update-category-post textarea[name="meta_description"]');

                console.log(meta_title.val(),meta_keyword.val(),meta_description.val());
                var form_data = new FormData();
                //thêm vào trong form data
                form_data.append("name", name.val());
                form_data.append("id", id.val());
                form_data.append("slug", slug.val());
                form_data.append("redirect", redirect.val());
                form_data.append("show", show.is(':checked') ? 1 : 0);
                form_data.append("description", description);
                form_data.append("meta_title", meta_title.val());
                form_data.append("meta_keyword", meta_keyword.val());
                form_data.append("meta_description", meta_description.val());

                $.ajax({
                    url: "{{route('admin.category_posts.update')}}",
                    method: "post",
                    data: form_data,
                    processData: false,
                    contentType: false,
                    success: function (output) {
                        $('#modal-edit').modal('hide');
                        if (output.success) {
                            load();
                            sortable();
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
                        $('#modal-edit .btn-update').attr('disabled',false);
                        var message = output.responseJSON.errors;
                        if (message.image) {
                            image.after(error(message.image));
                        }
                        if (message.icon) {
                            icon.after(error(message.icon));
                        }
                        if (message.name) {
                            name.after(error(message.name));
                        }
                        if (message.slug) {
                            slug.after(error(message.slug));
                        }
                        if (message.redirect) {
                            redirect.after(error(message.redirect));
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

            /** Nút xóa cả danh mục con*/
            $(document).on('click', '.btn-delete-with-child', function (e) {
                e.preventDefault();
                $('#destroy-with-child').attr('data-value', $(this).attr('data-value'));
                $('#destroy-with-child').attr('data-type', 1);
            });

            /** Xác nhận xóa*/
            $(document).on('click', '#destroy, #destroy-with-child', function () {
                var id = $(this).attr('data-value');
                var deleteChild = $(this).attr('data-type');
                var input = {
                    id: id,
                    deleteChild: deleteChild,
                }
                $.ajax({
                    async: false,
                    url: "{{route('admin.category_posts.destroy')}}",
                    method: "POST",
                    data: input,
                    dataType: "json",
                    success: function (output) {
                        $('#modal-edit').modal('hide');
                        if (output.success) {
                            load();
                            sortable();
                            $('form#update-category-post')[0].reset()
                            $('form#update-category-post .text-error').remove();
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
            })


            $(document).on('click','#update-category-product li', function () {
                if($(this).find('a').attr('href') != '#basic'){
                    $('#modal-edit .modal-footer').hide();
                }
                else{
                    $('#modal-edit .modal-footer').show();
                }
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
    </script>
    <!-- Page Level Plugin/Script Ends -->
@endsection
