@extends('admin.layouts.iframe')
@section('body')
    @can('update', \App\Admin\Models\Product::class)
        <div class="layout-px-spacing">
            <div class="row layout-spacing layout-top-spacing m-0">
                <div class="col-12 normal-tab">
                    <ul class="nav nav-tabs mb-2 mt-2" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.product.edit',['id' => $product->id])}}">Cơ bản</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.product.edit_category',['id' => $product->id])}}">Danh mục</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.product.edit_image',['id' => $product->id])}}">Ảnh</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.product.edit_attribute',['id' => $product->id])}}">Thông số</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.product.edit_detail',['id' => $product->id])}}">Chi tiết</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.product.edit_tag',['id' => $product->id])}}">Tags</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="javascript:void(0);">Biến thể</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active pt-0" id="tab-category"
                             role="tabpanel" aria-labelledby="tab-category">
                            <div class="layout-px-spacing">
                                <div class="row layout-spacing layout-top-spacing">
                                    <div class="col-lg-12">
                                        <div class="statbox mb-4 py-2">
                                            <div class="general-info box-info-profile">
                                                <div class="widget-heading m-0 d-flex justify-content-between align-items-end">
                                                    <h5>Biến thể sản phẩm</h5>
                                                    <div class="d-flex justify-content-sm-end justify-content-center contact-options">
                                                        @can('update', \App\Admin\Models\Product::class)
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
                                                    <table id="variants" class="table table-hover dataTable">
                                                        <thead>
                                                        <tr>
                                                            <th class="text-center">STT</th>
                                                            <th class="text-center">Tên biến thể</th>
                                                            <th class="text-center">Giá trị</th>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.content.product.delete')
        @include('admin.content.product.create_variant')
    @endcan
@endsection
@section('css')
    <link href="{{asset('css/admin/dt-global_style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('library/datatable/datatables.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('js')
    <script src="{{asset('library/datatable/datatables.js')}}"></script>
    <script>
        $(document).ready(function () {
            load("{{$product->id}}");
            /** Hiển thị danh sách*/
            function load(id) {
                $('.tooltip').hide();
                var input = {
                    id:id,
                }
                $.ajax({
                    async: true,
                    url: "{{route('admin.product.load_variant')}}",
                    method: "post",
                    data:input,
                    dataType: "json",
                    success: function (output) {
                        $('#variants').DataTable().destroy();
                        $('#variants').DataTable({
                            data: output.variants,
                            columns: [
                                {
                                    data: 'id',
                                    render: function (data, type, row, meta) {
                                        return meta.row + meta.settings._iDisplayStart + 1;
                                    }
                                },
                                {data: 'name'},
                                {
                                    data: 'price',
                                    render: function (data) {
                                        return '<p class="">'+new Intl.NumberFormat('vi-VN').format(data)+'</p>';
                                    }
                                },
                                {
                                    data: 'id',
                                    render: function (data) {
                                        return '<div class="d-flex justify-content-center">'+
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
                                {className: 'text-center', targets: [0,1,3]},
                                {className: 'text-left', targets: [1]},
                                {className: 'text-right', targets: [2]},
                            ],
                            lengthMenu: [10, 25, 50, 100],
                            pageLength: 10,
                        });
                    }
                });
            };

            $(document).on('click','.btn-create', function () {
                $('form#create-variant')[0].reset();
                $('form#create-variant .text-error').remove();
                $('.btn-store').attr('disabled',false);
            });

            /** thêm mới */
            $(document).on('click','.btn-store', function () {
                $('form#create-variant .text-error').remove();
                $('.btn-store').attr('disabled',true);
                var name = $('form#create-variant input[name="name"]');
                var price = $('form#create-variant input[name="price"]');
                var id = "{{$product->id}}";
                var price_val = 0;
                if(price.val().replace(/[^0-9]/g, '') != ''){
                    price_val = price.val().replace(/[^0-9]/g, '');
                }
                var input = {
                    name:name.val(),
                    price:price_val,
                    id:id,
                }
                $.ajax({
                    url: "{{route('admin.product.update_variant')}}",
                    method: "post",
                    data: input,
                    dataType: "json",
                    success: function (output) {
                        if(output.success){
                            load(id);
                            Snackbar.show({
                                text: 'Thêm mới thành công',
                                pos: 'top-center'
                            });
                        }
                        else{
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
                    url: "{{route('admin.product.destroy_variant')}}",
                    method: "POST",
                    data: input,
                    dataType: "json",
                    success: function (output) {
                        if (output.success) {
                            load("{{$product->id}}")
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
        });
    </script>
@endsection
