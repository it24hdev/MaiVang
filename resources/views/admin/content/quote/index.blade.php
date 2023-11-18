@extends('admin.layouts.base')
@section('body')
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
                                    <a href="{{route('admin.quote.index')}}">Báo giá</a>
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
                                <h5 class="">Báo giá</h5>
                                <div class="dropdown custom-dropdown-icon">
                                    <div
                                        class="d-flex justify-content-sm-end justify-content-center align-center contact-options">
                                        <a href="javascript:void(0);" title="Thêm mới"
                                           data-toggle="modal" data-target="#modal-create"
                                           class="pointer font-25 s-o mr-2 btn-create">
                                            <i class="las la-plus-circle"></i>
                                        </a>
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
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <ul id="dragRoot">
                                        <li id="li_ui_0" data-value="0"><i class="icon-building"></i> <span
                                                class="node-facility">Danh mục gốc</span>
                                            <ul id="ul_ui_0">
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
                                    <div class="widget-content date-table-container table-responsive">
                                        <table id="quote-table" class="table table-hover dataTable">
                                            <thead>
                                            <tr>
                                                <th class="text-center">Tên</th>
                                                <th class="text-center">Khoảng giá</th>
                                                <th class="text-center">Bảo hành</th>
                                                <th class="text-center">Chức năng</th>
                                                <th class="text-center">Cha</th>
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
    @include('admin.content.quote.create')
    @include('admin.content.quote.template_ui')
    @include('admin.content.quote.edit')
    @include('admin.content.quote.delete')
    @include('admin.content.quote.delete_with_child')
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
    <script src="{{asset('library/datatable/datatables.js')}}"></script>
    <script src="{{asset('library/datatable/datatables.buttons.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            load();
            sortable();

            function load() {
                $.ajax({
                    async: false,
                    url: "{{ route('admin.quote.load') }}",
                    method: "POST",
                    dataType: "json",
                    success: function (output) {
                        $('#dragRoot li ul').html('');
                        if (output.quotes.length > 0) {
                            $('select[name="parent"]').html('');
                            $('select[name="parent"]').append($('<option>', {value: 0, text: 'Chọn danh mục gốc'}));
                            var template_ui = $('#template_ui').html();
                            $.each(output.quotes, function (k, v) {
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
                        }
                        $('#quote-table').DataTable().destroy();
                        $('#quote-table').DataTable({
                            data: output.quotes,
                            columns: [
                                {
                                    data: {name: 'name', level: 'level'},
                                    render: function (data) {
                                        var str = "━━";
                                        return str.repeat(data.level) + data.name;
                                    },
                                },
                                {data: 'price_range'},
                                {data: 'warranty'},
                                {
                                    data: 'id',
                                    render: function (data) {
                                        return '<div class="d-flex justify-content-center">' +
                                            '<a href="javascript:void(0);" class="bs-tooltip font-20 text-primary btn-edit" title="Cập nhật" data-value="' + data + '">' +
                                            '<i class="las la-edit"></i></a></div>';
                                    },
                                },
                                {data: 'parent'}
                            ],
                            language: {
                                "paginate": {
                                    "previous": "<i class='las la-angle-left'></i>",
                                    "next": "<i class='las la-angle-right'></i>"
                                }
                            },
                            ordering: false,
                            columnDefs: [
                                {className: 'text-center', targets: [3]},
                                {className: 'text-left', targets: [0, 1, 2, 4]},
                                {visible: false, targets: [4]},
                                {width: "50%", targets: 0}
                            ],
                        });
                    }
                });
            };

            function reloadQuote() {
                $.ajax({
                    async: false,
                    url: "{{ route('admin.quote.load') }}",
                    method: "POST",
                    dataType: "json",
                    success: function (output) {
                        $('select[name="parent"]').html('');
                        $('select[name="parent"]').append($('<option>', {value: 0, text: 'Chọn danh mục gốc'}));
                        if (output.quotes.length > 0) {
                            $.each(output.quotes, function (k, v) {
                                $('select[name="parent"]').append($('<option>', {
                                    value: v.id,
                                    text: '━ '.repeat(v.level) + v.name
                                }));
                            });
                        }
                    }
                });
            };

            $(document).on('click', '.extends .la-plus-square,.extends .la-minus-square', function () {
                if ($(this).hasClass('la-plus-square')) {
                    $(this).removeClass('la-plus-square');
                    $(this).addClass('la-minus-square');
                    var $parent = $(this).closest('li');
                    $parent.find('ul').first().removeClass('d-none');
                } else {
                    $(this).addClass('la-plus-square');
                    $(this).removeClass('la-minus-square');
                    var $parent = $(this).closest('li');
                    $parent.find('ul').first().addClass('d-none');
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
                    url: "{{ route('admin.quote.update_location') }}",
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

            $(document).on('click', 'th div i', function (e) {
                $('th div i').not(this).each(function () {
                    $(this).removeClass("la-sort-up");
                    $(this).removeClass("la-sort-down");
                    $(this).addClass("la-sort");
                });
                if ($(this).hasClass("la-sort")) {
                    $(this).removeClass("la-sort");
                    $(this).addClass("la-sort-up");
                } else if ($(this).hasClass("la-sort-up")) {
                    $(this).removeClass("la-sort-up");
                    $(this).addClass("la-sort-down");
                } else if ($(this).hasClass("la-sort-down")) {
                    $(this).removeClass("la-sort-down");
                    $(this).addClass("la-sort-up");
                }
            })

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
                if ($dstUL.length == 0) {
                    $dstUL = $("<ul></ul>");
                    $target.append($dstUL);
                }

                $item.slideUp(50, function () {

                    $dstUL.append($item);

                    if ($srcUL.children("li").length == 0) {
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
                $('form#create-quote')[0].reset();
                $('form#create-quote .text-error').remove();
                reloadQuote();
                $('.btn-store').attr('disabled', false);
            });

            /** Thêm mới */
            $(document).on('click', '.btn-store', function () {
                $('form#create-quote .text-error').remove();
                $('.btn-store').attr('disabled', true);
                var name = $('form#create-quote input[name="name"]');
                var parent = $('form#create-quote select[name="parent"]');
                var price_range = $('form#create-quote input[name="price_range"]');
                var type = $('form#create-quote select[name="type"]');
                var warranty = $('form#create-quote input[name="warranty"]');

                var input = {
                    name: name.val(),
                    parent: parent.val(),
                    price_range: price_range.val(),
                    warranty: warranty.val(),
                    type: type.val(),
                }

                $.ajax({
                    url: "{{route('admin.quote.store')}}",
                    method: "post",
                    data: input,
                    dataType: "json",
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
                        $('.btn-store').attr('disabled', false);
                        var message = output.responseJSON.errors;
                        if (message.name) {
                            name.after(error(message.name));
                        }
                        if (message.price_range) {
                            price_range.after(error(message.price_range));
                        }
                        if (message.warranty) {
                            warranty.after(error(message.warranty));
                        }
                    }
                });
            });

            /** reset form cập nhật */
            $(document).on('click', '.btn-edit', function () {
                $('form#update-quote')[0].reset()
                $('form#update-quote .text-error').remove();
                $('#modal-edit .btn-update').attr('disabled', false);
                var id = $(this).attr('data-value');
                var input = {
                    id: id
                };
                $.ajax({
                    url: "{{ route('admin.quote.edit') }}",
                    method: "POST",
                    data: input,
                    dataType: "json",
                    success: function (output) {
                        if (output.success) {
                            $('#modal-edit').modal('show');
                            reloadQuote();
                            quoteData(output.quote);
                        } else {
                            Snackbar.show({
                                text: 'Có lỗi xảy ra',
                                pos: 'top-center'
                            });
                        }
                    }
                });
            });

            function quoteData(data) {
                $('form#update-quote input[name="name"]').val(data.name);
                $('form#update-quote input[name="id"]').val(data.id);
                $('form#update-quote input[name="price_range"]').val(data.price_range);
                $('form#update-quote input[name="warranty"]').val(data.warranty);
                $('form#update-quote select[name="type"]').val(data.type);
                $('form#update-quote select[name="parent"]').val(data.parent);

                $('#modal-edit .btn-delete').attr('data-value', data.id);
                $('#modal-edit .btn-delete-with-child').attr('data-value', data.id);
                $('#modal-edit .btn-create-attribute').attr('data-value', data.id);
            }

            /** Cập nhật */
            $(document).on('click', '#modal-edit .btn-update', function () {
                $('form#update-quote .text-error').remove();
                $('#modal-edit .btn-update').attr('disabled', true);
                var name = $('form#update-quote input[name="name"]');
                var id = $('form#update-quote input[name="id"]');
                var parent = $('form#update-quote select[name="parent"]');
                var price_range = $('form#update-quote input[name="price_range"]');
                var type = $('form#update-quote select[name="type"]');
                var warranty = $('form#update-quote input[name="warranty"]');

                var input = {
                    name: name.val(),
                    id: id.val(),
                    parent: parent.val(),
                    price_range: price_range.val(),
                    warranty: warranty.val(),
                    type: type.val(),
                }

                $.ajax({
                    url: "{{route('admin.quote.update')}}",
                    method: "post",
                    data: input,
                    dataType: "json",
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
                        $('.btn-update').attr('disabled', false);
                        var message = output.responseJSON.errors;
                        if (message.name) {
                            name.after(error(message.name));
                        }
                        if (message.price_range) {
                            price_range.after(error(message.price_range));
                        }
                        if (message.warranty) {
                            warranty.after(error(message.warranty));
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
                    url: "{{route('admin.quote.destroy')}}",
                    method: "POST",
                    data: input,
                    dataType: "json",
                    success: function (output) {
                        $('#modal-edit').modal('hide');
                        if (output.success) {
                            load();
                            sortable();
                            $('form#update-quote')[0].reset()
                            $('form#update-quote .text-error').remove();
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


            $(document).on('click', '#update-quote li', function () {
                if ($(this).find('a').attr('href') != '#basic') {
                    $('#modal-edit .modal-footer').hide();
                } else {
                    $('#modal-edit .modal-footer').show();
                }
            });

        });
    </script>
@endsection
