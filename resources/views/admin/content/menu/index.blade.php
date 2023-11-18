@extends('admin.layouts.base')
@section('body')
    @can('viewAny', \App\Admin\Models\Menu::class)
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
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Quản lý menu</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <a href="{{route('admin.menu_managers.index')}}">Danh sách menu</a>
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
                    <div class="">
                        <div class="widget-content searchable-container grid">
                            <div class="widget ecommerce-table">
                                <div class="widget-heading m-0">
                                    <h5 class="m-0">Menu</h5>
                                    <div class="dropdown custom-dropdown-icon">
                                        <div
                                            class="d-flex justify-content-sm-end justify-content-center contact-options">
                                            <a href="javascript:void(0);" title="Thu/Phóng"
                                               class="pointer nav-link full-screen-mode font-25 s-o mr-1">
                                                <i class="las la-compress" id="fullScreenIcon"></i>
                                            </a>
                                            <a title="Tải lại" class="pointer font-25 s-o mr-1"
                                               onclick="window.location.reload()">
                                                <i class="las la-sync-alt"></i>
                                            </a>
                                            <a class="pointer font-25 s-o " title="Tác vụ">
                                                <i class="las la-cog"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content">
                                    <div class="col-12 normal-tab">
                                        <ul class="nav nav-tabs mb-2 mt-2" role="tablist" id="menu-tab">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#tab-edit-menu"
                                                   role="tab" aria-controls="tab-edit-menu" aria-selected="true">Sửa
                                                    menu</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#tab-manager-menu"
                                                   role="tab" aria-controls="tab-manager-menu" aria-selected="false">Quản
                                                    lý menu</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content date-table-container switch-outer-container">
                                            <div class="tab-pane fade show active pt-0" id="tab-edit-menu"
                                                 role="tabpanel" aria-labelledby="tab-edit-menu">
                                                <div class="card-box col-12">
                                                    <form id="select-menu"
                                                          action="{{route('admin.menu_managers.index')}}"
                                                          method="get" enctype="multipart/form-data" class="d-flex justify-content-between">
                                                        <div class="row align-center">
                                                            <label class="m-0">Chọn menu:</label>
                                                            <select class="btn-sm w-auto mr-2 font-12" name="menu"
                                                                    onchange="this.form.submit()">
                                                                @foreach($menus as $key => $item)
                                                                    <option
                                                                        value="{{$item->id}}" {{(request()->input('menu') == '' && $key == 0) || request()->input('menu') == $item->id ?'selected':''}}>{{$item->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <a href="javascript:void(0);"
                                                           class="btn btn-sm btn-primary w-auto font-12 btn-create-menu">Tạo Menu</a>
                                                    </form>

                                                </div>
                                                <div class="col-12 d-flex flex-wrap px-0">
                                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 pl-0">
                                                        <h5 class="my-2">Thêm liên kết</h5>
                                                        <div class="statbox widget box box-shadow"></div>
                                                    </div>
                                                    <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12 pr-0">
                                                        <h5 class="my-2">Cấu trúc menu</h5>
                                                        <div class="statbox widget box box-shadow">
                                                            <form id="menuForm"
                                                                  action="{{route('admin.menu_managers.update')}}"
                                                                  enctype="multipart/form-data">
                                                                @csrf
                                                                @if($thisMenu)
                                                                    <input type="text" class="hidden" name="menus_id"
                                                                           value="{{$thisMenu->id}}">
                                                                    <div id="nav-menu-header"
                                                                         class="d-flex justify-content-between align-center">
                                                                        <div
                                                                            class="major-publishing-actions wp-clearfix">
                                                                            <label class="menu-name-label"
                                                                                   for="menu_name">Tên menu</label>
                                                                            <input name="menu_name" id="menu_name"
                                                                                   type="text"
                                                                                   class="menu-name regular-text menu-item-textbox form-required"
                                                                                   required="required"
                                                                                   value="{{$thisMenu->name}}">
                                                                        </div>
                                                                        @can('create', \App\Admin\Models\Menu::class)
                                                                            <div class="publishing-action wp-core-ui">
                                                                                <input type="button"
                                                                                       class="button btn-primary font-12 btn-create"
                                                                                       value="Thêm liên kết">
                                                                            </div>
                                                                        @endcan
                                                                    </div>
                                                                    <ul class="menu ui-sortable" id="menu-to-edit">
                                                                        @foreach($thisMenu->MenuItems as $item)
                                                                            <li id="menu-item-{{$item->id}}"
                                                                                class="menu-item menu-item-page menu-item-depth-{{$item->depth}} menu-item-edit-inactive">
                                                                                <div class="menu-item-bar">
                                                                                    <div
                                                                                        class="menu-item-handle ui-sortable-handle">
                                                                                        <label class="item-title">
                                                                                    <span
                                                                                        class="menu-item-title text-dark">{{$item->name}}</span>
                                                                                            @if($item->parent)
                                                                                                <span
                                                                                                    class="is-submenu">chỉ mục con</span>
                                                                                            @endif
                                                                                        </label>
                                                                                        <span class="item-controls">
                                                            <span class="item-order hide-if-js">
                                                                <a class="item-move-up" aria-label="Di chuyển lên">↑</a>|<a
                                                                    class="item-move-down" aria-label="Di chuyển xuống">↓</a>
                                                            </span>
                                                            <a class="item-edit" href="javascript:void(0);">
                                                                <span class="screen-reader-text">Chỉnh sửa</span>
                                                            </a>
                                                        </span>
                                                                                    </div>
                                                                                </div>

                                                                                <div
                                                                                    class="menu-item-settings wp-clearfix"
                                                                                    id="menu-item-settings-{{$item->id}}">
                                                                                    <div
                                                                                        class="description description-wide">
                                                                                        <p class="m-0">Tên liên kết</p>
                                                                                        <input type="text"
                                                                                               class="widefat edit-menu-item-name"
                                                                                               name="menu_item_name[{{$item->id}}]"
                                                                                               value="{{$item->name}}">
                                                                                    </div>
                                                                                    <div
                                                                                        class="menu-item-actions description-wide submitbox">
                                                                                        <div>
                                                                                            <p class="m-0">URL</p>
                                                                                            <input type="text"
                                                                                                   name="menu_item_redirect[{{$item->id}}]"
                                                                                                   class="widefat"
                                                                                                   placeholder="Http://"
                                                                                                   value="{{$item->redirect}}">
                                                                                        </div>
                                                                                        <div class="mt-2">
                                                                                            <p class="m-0">HTML</p>
                                                                                            <textarea class="widefat" name="menu_item_html_field[{{$item->id}}]">{{$item->html_field}}</textarea>
                                                                                        </div>
                                                                                        <div class="mt-2">
                                                                                            <a class="item-delete submitdelete deletion"
                                                                                               id="delete-{{$item->id}}"
                                                                                               href="javascript:void(0);">Xóa
                                                                                                bỏ</a>
                                                                                            <span
                                                                                                class="meta-sep hide-if-no-js"> | </span>
                                                                                            <a class="item-cancel submitcancel hide-if-no-js"
                                                                                               href="javascript:void(0);">Hủy</a>
                                                                                        </div>
                                                                                    </div>

                                                                                    <input class="menu-item-data-db-id"
                                                                                           type="hidden"
                                                                                           name="menu_item_db_id[]"
                                                                                           value="{{$item->id}}">
                                                                                    <input
                                                                                        class="menu-item-data-parent-id"
                                                                                        type="hidden"
                                                                                        name="menu_item_parent_id[{{$item->id}}]"
                                                                                        value="{{$item->parent}}">
                                                                                    <input
                                                                                        class="menu-item-data-position"
                                                                                        type="hidden"
                                                                                        name="menu_item_position[{{$item->id}}]"
                                                                                        value="{{$item->position}}">
                                                                                    <input class="menu_item_depth"
                                                                                           type="hidden"
                                                                                           name="menu_item_depth[{{$item->id}}]"
                                                                                           value="{{$item->depth}}">
                                                                                </div>
                                                                                <ul class="menu-item-transport"
                                                                                    style=""></ul>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                    <div id="nav-menu-footer" class="wp-core-ui mt-2">
                                                                        <div
                                                                            class="major-publishing-actions wp-clearfix">
                                                                             <span class="delete-action">
                                                                                <a href="javascript:void(0);" title="Tạo menu" data-toggle="modal"
                                                                                   data-target="#modal-delete"
                                                                                   data-value="{{$thisMenu->id}}"
                                                                                   class="submitdelete deletion menu-delete btn-delete"><ins>Xóa menu</ins>
                                                                                </a>
                                                                             </span>
                                                                            <div class="publishing-action">
                                                                                @can('update', \App\Admin\Models\Menu::class)
                                                                                    <input type="submit"
                                                                                           class="button btn-primary font-12 menu-save"
                                                                                           value="Lưu menu">
                                                                                @endcan
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade pt-0" id="tab-manager-menu" role="tabpanel"
                                                 aria-labelledby="tab-manager-menu">
                                                <div class="d-flex justify-content-between">
                                                    <div class="widget-content date-table-container mt-1 table-responsive col-md-6 col-12">
                                                        <table class="table table-hover dataTable">
                                                            <thead>
                                                            <th>Vị Trí</th>
                                                            <th>Menu</th>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($position as $itemPosition)
                                                                <tr id="{{$itemPosition->id}}">
                                                                    <td>{{$itemPosition->name}}</td>
                                                                    <td>
                                                                        <select name="object_id" class="form-control">
                                                                            <option value="0">Chọn</option>
                                                                            @foreach($menus as $item)
                                                                                <option value="{{$item->id}}" {{$itemPosition->object_id == $item->id?'selected':''}}>{{$item->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
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
                </div>
            </div>
        </div>
        <!-- Main Body Ends -->
        @include('admin.content.menu.create')
        @include('admin.content.menu.template_menu')
        @include('admin.content.menu.create_menu')
        @include('admin.content.menu.delete')
    @endcan
@endsection
@section('css')
    <!-- Page Level Plugin/Style Starts -->
    <link href="{{asset('css/admin/tables.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/custom-switch.css')}}" rel="stylesheet" type="text/css">
    <link rel='stylesheet' href='{{asset('css/admin/load-style.css')}}' type="text/css" media='all'/>
    <link rel='stylesheet' href='{{asset('css/admin/global-mn.css')}}' media='all'/>
@endsection
@section('js')
    <!-- Page Level Plugin/Script Starts -->
    <script src='{{asset('library/jquery-ui/core.js')}}'></script>
    <script src='{{asset('library/jquery-ui/mouse.min.js')}}'></script>
    <script src='{{asset('library/jquery-ui/sortable.js')}}'></script>
    <script src='{{asset('library/jquery-ui/draggable.js')}}'></script>
    <script src='{{asset('library/jquery-ui/droppable.js')}}'></script>
    <script src='{{asset('library/jquery-ui/underscore.js')}}'></script>
    <script src={{asset('library/jquery-ui/nav-menu.js')}}></script>
    <script id='nav-menu-js-extra'>
        var menus = {
            "oneThemeLocationNoMenus": "",
            "moveUp": "\u0110\u1ea9y l\u00ean m\u1ed9t n\u1ea5c",
            "moveDown": "\u0110\u1ea9y xu\u1ed1ng m\u1ed9t n\u1ea5c",
            "moveToTop": "\u0110\u01b0a l\u00ean \u0111\u1ea7u ti\u00ean",
            "moveUnder": "Chuy\u1ec3n xu\u1ed1ng d\u01b0\u1edbi %s",
            "moveOutFrom": "Chuy\u1ec3n ch\u1ec9 m\u1ee5c d\u01b0\u1edbi %s ra ngo\u00e0i",
            "under": "D\u01b0\u1edbi %s",
            "outFrom": "\u1ede ngo\u00e0i t\u1eeb d\u01b0\u1edbi %s",
            "menuFocus": "%1$s. Ch\u1ec9 m\u1ee5c th\u1ee9 %2$d trong %3$d.",
            "subMenuFocus": "%1$s. Ch\u1ec9 m\u1ee5c con s\u1ed1 %2$d d\u01b0\u1edbi %3$s.",
            "menuItemDeletion": "M\u1ee5c %s",
            "itemsDeleted": "\u0110\u00e3 xo\u00e1 m\u1ee5c %s kh\u1ecfi menu.",
            "itemAdded": "M\u1ee5c trong menu \u0111\u00e3 \u0111\u01b0\u1ee3c th\u00eam",
            "itemRemoved": "Menu item removed",
            "movedUp": "M\u1ee5c \u0111\u00e3 chuy\u1ec3n l\u00ean tr\u00ean",
            "movedDown": "M\u1ee5c \u0111\u00e3 chuy\u1ec3n xu\u1ed1ng d\u01b0\u1edbi",
            "movedTop": "Menu item moved to the top",
            "movedLeft": "M\u1ee5c tr\u00ecnh \u0111\u01a1n \u0111\u00e3 chuy\u1ec3n kh\u1ecfi tr\u00ecnh \u0111\u01a1n ph\u1ee5",
            "movedRight": "M\u1ee5c n\u00e0y \u0111\u00e3 \u0111\u01b0\u1ee3c chuy\u1ec3n th\u00e0nh m\u1ee5c con"
        };
    </script>
    <script>
        $(document).ready(function () {
            $('body').addClass('js');
            $('body').addClass('nav-menus-php');

            $('#menuForm').submit(function (e) {
                e.preventDefault();
                var form = $(this);
                var actionUrl = form.attr('action');
                var countErr = 0;
                $('#menuForm .text-error').remove();
                var menuName = $('input[name="menu_name"]');

                if (menuName.val() == '') {
                    menuName.after(err('Tên menu không được bỏ trống'));
                    countErr += 1;
                }

                $('.edit-menu-item-name').each(function () {
                    if ($(this).val() == '') {
                        $(this).closest('li').removeClass('menu-item-edit-inactive');
                        $(this).focus();
                        $(this).after(err('Tên menu item không được bỏ trống'));
                        countErr += 1;
                    }
                });
                if (countErr == 0) {
                    $.ajax({
                        type: "POST",
                        url: actionUrl,
                        data: form.serialize(),
                        dataType: "json",
                        success: function (output) {
                            if (output.success) {
                                $('#menuForm li').addClass('menu-item-edit-inactive');
                                Snackbar.show({
                                    text: 'Cập nhật thành công',
                                    pos: 'top-center'
                                });
                                window.location.reload();
                            } else {
                                Snackbar.show({
                                    text: 'Có lỗi xảy ra',
                                    pos: 'top-center'
                                });
                            }
                        }
                    });
                }
            });

            $(document).on('click', '.item-edit, .item-cancel', function () {
                if ($(this).closest('li').hasClass('menu-item-edit-inactive')) {
                    $(this).closest('li').removeClass('menu-item-edit-inactive');
                } else {
                    $(this).closest('li').addClass('menu-item-edit-inactive');
                }
            });

            $(document).on('click', '.btn-create', function () {
                $('#modal-create').modal('show');
                $('form#create-menu-item')[0].reset();
                $('#modal-create .text-error').remove();
                $('.btn-store').attr('disabled', false);
            });

            $(document).on('click', '.btn-store', function () {
                $('#modal-create .text-error').remove();
                $('.btn-store').attr('disabled', true);
                var name = $('form#create-menu-item input[name="name"]');
                var collection = $('form#create-menu-item select[name="collection"]').val();
                var redirect_web = $('form#create-menu-item input[name="redirect_web"]');
                var html_field = $('form#create-menu-item textarea[name="html_field"]');
                var redirect = "";
                if (collection == 1) {
                    redirect = "{{route('home')}}";
                }
                if (collection == 2) {
                    redirect = "{{route('news')}}";
                }
                if (collection == 3) {
                    redirect = "{{route('list_product')}}";
                }
                if (collection == 4) {
                    redirect = $('form#create-menu-item select[name="category_post"]').val();
                }
                if (collection == 5) {
                    redirect = $('form#create-menu-item select[name="category_product"]').val();
                }
                if (collection == 6) {
                    redirect = $('form#create-menu-item input[name="redirect_web"]').val();
                }
                if (collection == 7) {
                    redirect = "{{route('contact')}}";
                }
                var menus = $('#select-menu select[name="menu"]');
                var input = {
                    name: name.val(),
                    menus_id: menus.val(),
                    redirect: redirect,
                    html_field:html_field.val(),
                };
                $.ajax({
                    type: "POST",
                    url: "{{route('admin.menu_managers.store_item')}}",
                    data: input,
                    dataType: "json",
                    success: function (output) {
                        if (output.success) {
                            var template_menu = $('#template_menu').html();
                            var tmp = $(template_menu).clone();
                            $(tmp).attr('id', 'menu-item-' + output.menuItem.id);
                            $(tmp).addClass('menu-item-depth-' + output.menuItem.depth);
                            $(tmp).find('.menu-item-title').html(output.menuItem.name);
                            $(tmp).find('.menu-item-settings').attr('id', 'menu-item-settings-' + output.menuItem.id);
                            $(tmp).find('.edit-menu-item-name').attr('name', 'menu_item_name[' + output.menuItem.id + ']');
                            $(tmp).find('.edit-menu-item-name').val(output.menuItem.name);
                            $(tmp).find('.edit-menu-item-url').attr('name', 'menu_item_redirect[' + output.menuItem.id + ']');
                            $(tmp).find('.edit-menu-item-url').val(output.menuItem.redirect);
                            $(tmp).find('.edit-menu-item-html-field').attr('name', 'menu_item_html_field[' + output.menuItem.id + ']');
                            $(tmp).find('.edit-menu-item-html-field').val(output.menuItem.html_field);
                            $(tmp).find('.item-delete').attr('id', 'delete-' + output.menuItem.id);
                            $(tmp).find('input[name="menu_item_db_id[]"]').val(output.menuItem.id);
                            $(tmp).find('.menu-item-data-parent-id').attr('name', 'menu_item_parent_id[' + output.menuItem.id + ']');
                            $(tmp).find('.menu-item-data-parent-id').val(output.menuItem.parent);
                            $(tmp).find('.menu-item-data-position').attr('name', 'menu_item_position[' + output.menuItem.id + ']');
                            $(tmp).find('.menu-item-data-position').val(output.menuItem.position);
                            $(tmp).find('.menu_item_depth').attr('name', 'menu_item_depth[' + output.menuItem.id + ']');
                            $(tmp).find('.menu_item_depth').val(output.menuItem.depth);
                            if ($('#menuForm ul li').length >= 1) {
                                $('#menuForm ul li:last-child').after(tmp);
                            } else {
                                $('#menuForm ul').append(tmp);
                            }

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
                        $('.btn-store').attr('disabled', false);
                        var message = output.responseJSON.errors;
                        if (message.name) {
                            name.after(error(message.name));
                        }
                        if (message.redirect) {
                            redirect_web.after(error(message.redirect));
                        }
                    }
                });
            });

            $(document).on('click', '.btn-create-menu', function () {
                $('#modal-create-menu').modal('show');
                $('form#create-menu')[0].reset();
                $('#modal-create-menu .text-error').remove();
                $('.btn-store-menu').attr('disabled', false);
            });

            $(document).on('click', '.btn-store-menu', function () {
                $('#modal-create-menu .text-error').remove();
                $('.btn-store-menu').attr('disabled', true);
                var name = $('form#create-menu input[name="name"]');
                var input = {
                    name: name.val(),
                }
                $.ajax({
                    type: "POST",
                    url: "{{route('admin.menu_managers.store_menu')}}",
                    data: input,
                    dataType: "json",
                    success: function (output) {
                        if (output.success) {
                            var url = "{{route('admin.menu_managers.index',['menu' => 'menu_id'])}}";
                            url = url.replace('menu_id', output.menu.id);
                            window.location.href = url;
                        }
                    },
                    error: function (output) {
                        $('.btn-store-menu').attr('disabled', false);
                        var message = output.responseJSON.errors;
                        if (message.name) {
                            name.after(error(message.name));
                        }
                    }
                });
            });

            $(document).on('click', '#destroy', function () {
                var id = $(this).attr('data-value');
                var input = {
                    id: id,
                }
                $('.tooltip').hide();
                $.ajax({
                    url: "{{ route('admin.menu_managers.destroy_menu') }}",
                    method: "POST",
                    data: input,
                    dataType: "json",
                    success: function (output) {
                        if (output.success) {
                            Snackbar.show({
                                text: 'Đã xóa thành công.',
                                pos: 'top-center'
                            });
                            window.location.href = "{{route('admin.menu_managers.index')}}";
                        }
                    }
                });
            });

            $(document).on('change', 'select[name="collection"]', function () {
                var selectedValue = $(this).val();
                $('.box-news, .box-product, .box-redirect, .box-html').addClass('d-none'); // Ẩn tất cả các box trước khi hiển thị box tương ứng
                if (selectedValue == '4') {
                    $('.box-news').removeClass('d-none'); // Hiển thị box news
                }
                if (selectedValue == '5') {
                    $('.box-product').removeClass('d-none'); // Hiển thị box product
                }
                if (selectedValue == '6') {
                    $('.box-redirect').removeClass('d-none'); // Hiển thị box redirect
                }
                if (selectedValue == '8') {
                    $('.box-html').removeClass('d-none'); // Hiển thị box html
                }
            });

            $(document).on('change','select[name="object_id"]', function () {
                var object_id = $(this).val();
                var position = $(this).closest('tr').attr('id');
                var input = {
                    object_id:object_id,
                    position:position,
                }
                $.ajax({
                    url: "{{route('admin.menu_manager.position')}}",
                    method: "POST",
                    data:input,
                    dataType:"json",
                    success:function (output) {
                        if(output.success){
                            Snackbar.show({
                                text: 'Cập nhật thành công.',
                                pos: 'top-center'
                            });
                        }else{
                            Snackbar.show({
                                text: 'Có lỗi xảy ra.',
                                pos: 'top-center'
                            });
                        }
                    }
                })
            });
        });
    </script>
    <!-- Page Level Plugin/Script Ends -->
@endsection
