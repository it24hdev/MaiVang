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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Hệ Thống</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="{{route('admin.sliders.index')}}">QL
                                        Sliders</a>
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
                            <h5>Danh sách Slider</h5>
                            <div class="d-flex justify-content-sm-end justify-content-center contact-options">
                                <a class="pointer s-o mr-1 bs-tooltip btn-create" href="javascript:void(0);"
                                   title="Thêm mới" data-toggle="modal" data-target="#modal-create">
                                    <i class="las la-plus-circle"></i>
                                </a>
                                <a class="pointer s-o mr-1 bs-tooltip" title="reload"
                                   onClick="window.location.reload();">
                                    <i class="las la-sync-alt"></i>
                                </a>
                            </div>
                        </div>
                        <div class="widget-content date-table-container overflow-auto mt-2 ecommerce-table">
                            <table id="sliders" class="table table-hover dataTable">
                                <thead>
                                <tr>
                                    <th class="text-center">STT</th>
                                    <th class="text-center">Ảnh mobile</th>
                                    <th class="text-center">Ảnh web</th>
                                    <th class="text-center">Tiêu đề</th>
                                    <th class="text-center">Thứ tự</th>
                                    <th class="text-center">Vị trí</th>
                                    <th class="text-center">Trạng thái</th>
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
    @include('admin.content.slider.create')
    @include('admin.content.slider.edit')
    @include('admin.content.slider.delete')
@endsection
@section('css')
    <!-- Page Level Plugin/Style Starts -->
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
    <!-- Page Level Plugin/Script Ends -->
    <script>
        $(document).ready(function () {
            load();

            /** Danh sách slider */
            function load() {
                $('.tooltip').hide();
                $.ajax({
                    url: "{{route('admin.sliders.load')}}",
                    method: "post",
                    dataType: "json",
                    success: function (output) {
                        $('#sliders').DataTable().destroy();
                        $('#sliders').DataTable({
                            data: output.sliders,
                            columns: [
                                {
                                    data: 'id',
                                    render: function (data, type, row, meta) {
                                        return meta.row + meta.settings._iDisplayStart + 1;
                                    }
                                },
                                {
                                    data: 'image_mobile',
                                    render: function (data) {
                                        var img_mobile = "{{asset('media/common/no-image.jpg')}}"
                                        if (data !== "{{\App\Admin\Models\Slider::noImage}}") {
                                            img_mobile = "{{asset('media/sliders/mobile/img_slider')}}";
                                            img_mobile = img_mobile.replace('img_slider', data);
                                        }
                                        return "<image src=" + img_mobile + " width='100px'>";
                                    }
                                },
                                {
                                    data: 'image_web',
                                    render: function (data) {
                                        var image_web = "{{asset('media/common/no-image.jpg')}}"
                                        if (data !== "{{\App\Admin\Models\Slider::noImage}}") {
                                            image_web = "{{asset('media/sliders/web/img_slider')}}";
                                            image_web = image_web.replace('img_slider', data);
                                        }
                                        return "<image src=" + image_web + " width='100px'>";
                                    }
                                },
                                {data: 'name'},
                                { data: 'order_number'},
                                { data: 'position'},
                                {
                                    data: 'status',
                                    render: function (data) {
                                        if(data == 1){
                                            return '<label class="switch switch-primary  m-auto d-block"><input type="checkbox" checked="checked"  disabled><span class="slider round"></span></label>';
                                        }else{
                                            return '<label class="switch switch-primary  m-auto d-block"><input type="checkbox" disabled><span class="slider round"></span></label>';
                                        }
                                    }
                                },
                                {
                                    data: 'id',
                                    render: function (data) {
                                        return '<div class="d-flex justify-content-center">' +
                                            '<a href="javascript:void(0);" class="bs-tooltip font-20 text-primary btn-edit" title="Cập nhật" data-toggle="modal" data-target="#modal-edit" data-value="' + data + '">' +
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
                                {className: 'text-center', targets: [0, 1, 2, 4, 5, 6]},
                                {className: 'text-left', targets: [3]},
                            ],
                            lengthMenu: [10, 25, 50, 100],
                            pageLength: 10,
                        });
                    }
                });
            }

            /** reset form thêm mới*/
            $(document).on('click', '.btn-create', function () {
                $('#modal-create form#create-slider')[0].reset();
                $('#modal-create form#create-slider').find(':checkbox').prop('checked', true);
                $('#modal-create form#create-slider .text-error').remove();
                $('#view_image_web').attr('src', $('#view_image_web').attr('data-src'));
                $('#view_image_mobile').attr('src', $('#view_image_mobile').attr('data-src'));
                $('.btn-store').attr('disabled', false);
            });

            changeImage('image_web','view_image_web');
            changeImage('image_mobile','view_image_mobile');

            changeImage('image_web_edit','view_image_web_edit');
            changeImage('image_mobile_edit','view_image_mobile_edit');

            function changeImage(inputId, viewId) {
                $(document).on('change', '#' + inputId, function () {
                    $('form#create-slider .text-error').remove();
                    var default_src = $('#' + viewId).attr('data-src');
                    const file = this.files[0];
                    const acceptedImageTypes = ['image/gif', 'image/jpeg', 'image/png', 'image/webp'];
                    if (typeof (file) != "undefined" && acceptedImageTypes.includes(file['type'])) {
                        let reader = new FileReader();
                        reader.onload = function (event) {
                            $('#' + viewId).attr("src", event.target.result);
                        };
                        reader.readAsDataURL(file);
                    } else {
                        $('#' + viewId).attr("src", default_src);
                    }
                });
            }

            /** thêm mới*/
            $(document).on('click', '.btn-store', function () {
                $('form#create-slider .text-error').remove();
                $('.btn-store').attr('disabled', true);
                var name = $('form#create-slider input[name="name"]');
                var slug = $('form#create-slider input[name="slug"]');
                var order_number = $('form#create-slider input[name="order_number"]');
                var position_id = $('form#create-slider select[name="position_id"]');
                var status = $('form#create-slider input[name="status"]');
                var image_web = $("#image_web").prop("files")[0];
                var image_mobile = $("#image_mobile").prop("files")[0];

                var form_data = new FormData();
                //thêm vào trong form data

                form_data.append("image_web", image_web);
                form_data.append("image_mobile", image_mobile);
                form_data.append("name", name.val());
                form_data.append("slug", slug.val());
                form_data.append("position_id", position_id.val());
                form_data.append("order_number", order_number.val());
                form_data.append("status", status.is(':checked') ? 1 : 0);

                $.ajax({
                    url: "{{route('admin.sliders.store')}}",
                    method: "post",
                    data: form_data,
                    processData: false,
                    contentType: false,
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
                        $('.btn-store').attr('disabled', false);
                        var message = output.responseJSON.errors;
                        if (message.name) {
                            name.after(error(message.name));
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
                    url: "{{route('admin.sliders.destroy')}}",
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
                $('#modal-edit form#update-slider')[0].reset();
                $('#modal-edit form#update-slider .text-error').remove();
                $('.btn-update').attr('disabled', false);
                var id = $(this).attr('data-value');
                var input = {
                    id: id,
                }
                $.ajax({
                    url: "{{route('admin.sliders.edit')}}",
                    method: "POST",
                    data: input,
                    dataType: "json",
                    success: function (output) {
                        if (output.success) {
                            $('#modal-edit').modal('show');
                            $('form#update-slider input[name="name"]').val(output.sliders.name);
                            $('form#update-slider input[name="id"]').val(output.sliders.id);
                            $('form#update-slider input[name="slug"]').val(output.sliders.slug);
                            $('form#update-slider select[name="position_id"]').val(output.sliders.position_id);
                            $('form#update-slider input[name="order_number"]').val(output.sliders.order_number);
                            if (output.sliders.status === 1) {
                                $('form#update-slider input[name="status"]')[0].checked = true;
                            }
                            else{
                                $('form#update-slider input[name="status"]')[0].checked = false;
                            }
                            var view_img_web = "{{asset('media/common/no-image.jpg')}}";
                            if(output.sliders.image_web !== "{{\App\Admin\Models\Slider::noImage}}"){
                                view_img_web = "{{asset('media/sliders/web/img_web')}}";
                                view_img_web = view_img_web.replace('img_web',output.sliders.image_web);
                            }
                            $('#view_image_web_edit').attr('src',view_img_web);
                            $('#view_image_web_edit').attr('data-src',view_img_web);

                            var view_img_mobile = "{{asset('media/common/no-image.jpg')}}";
                            if(output.sliders.image_mobile !== "{{\App\Admin\Models\Slider::noImage}}"){
                                view_img_mobile = "{{asset('media/sliders/mobile/img_mobile')}}";
                                view_img_mobile = view_img_mobile.replace('img_mobile',output.sliders.image_mobile);
                            }
                            $('#view_image_mobile_edit').attr('src',view_img_mobile);
                            $('#view_image_mobile_edit').attr('data-src',view_img_mobile);
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
                $('form#update-slider .text-error').remove();
                $('.btn-update').attr('disabled', true);
                var name = $('form#update-slider input[name="name"]');
                var slug = $('form#update-slider input[name="slug"]');
                var id = $('form#update-slider input[name="id"]');
                var order_number = $('form#update-slider input[name="order_number"]');
                var position_id = $('form#update-slider select[name="position_id"]');
                var status = $('form#update-slider input[name="status"]');
                var image_web = $("#image_web_edit").prop("files")[0];
                var image_mobile = $("#image_mobile_edit").prop("files")[0];

                var form_data = new FormData();
                //thêm vào trong form data

                form_data.append("image_web", image_web);
                form_data.append("image_mobile", image_mobile);
                form_data.append("name", name.val());
                form_data.append("id", id.val());
                form_data.append("slug", slug.val());
                form_data.append("position_id", position_id.val());
                form_data.append("order_number", order_number.val());
                form_data.append("status", status.is(':checked') ? 1 : 0);
                $.ajax({
                    url: "{{route('admin.sliders.update')}}",
                    method: "post",
                    data: form_data,
                    processData: false,
                    contentType: false,
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
                        $('.btn-update').attr('disabled', false);
                        var message = output.responseJSON.errors;
                        if (message.name) {
                            name.after(error(message.name));
                        }
                    }
                });
            });
        })
    </script>
@endsection
