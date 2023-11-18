@extends('admin.layouts.base')
@section('body')
        <div class="sub-header-container">
            <header class="header navbar navbar-expand-sm">
                <a href="javascript:void(0);" class="sidebarCollapse"><i class="las la-bars"></i></a>
                <ul class="navbar-nav flex-row">
                    <li>
                        <div class="page-header">
                            <nav class="breadcrumb-one" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Sản phẩm</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <a href="{{route('admin.product.index')}}">Danh sách sản phẩm</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </li>
                </ul>
            </header>
        </div>
        <div class="layout-px-spacing">
            <div class="row layout-spacing layout-top-spacing" id="cancel-row">
                <div class="widget-content searchable-container grid">
                    <div class="widget-heading mx-4 d-flex justify-content-between flex-wrap">
                        <h5 class="font-weight-bold m-0">Danh sách sản phẩm</h5>
                        <div class="dropdown custom-dropdown-icon">
                            <div class="d-flex justify-content-sm-end justify-content-center contact-options">
                                @can('create', \App\Admin\Models\Product::class)
                                    <a href="javascript:void(0);" title="Thêm mới"
                                       class="pointer font-25 s-o mr-2 bs-tooltip btn-create">
                                        <i class="las la-plus-circle"></i>
                                    </a>
                                @endcan
                                <a href="javascript:void(0);" title="Nhập file"
                                   class="pointer font-25 s-o mr-2 bs-tooltip btn-upload-file">
                                    <i class="las la-cloud-upload-alt"></i>
                                </a>
                                <a href="javascript:void(0);" title="Xuất file"
                                   class="pointer font-25 s-o mr-2 bs-tooltip">
                                    <i class="las la-cloud-download-alt"></i>
                                </a>
                                <a class="pointer s-o mr-2 bs-tooltip" title="reload"
                                   onClick="window.location.reload();">
                                    <i class="las la-sync-alt"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="px-4">
                        <div class="row mb-2">
                            <form method="get" action="{{route('admin.product.index')}}"
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
                                        class="col-12 d-flex flex-wrap justify-content-sm-start align-center contact-options px-0">
                                        <div class="form-inline my-2 my-lg-0">
                                            <select name="limit"
                                                    class="btn btn-outline-primary btn-sm h-auto p-2 mr-2"
                                                    onchange="this.form.submit()">
                                                <option value="">10</option>
                                                <option
                                                    value="25" {{request()->input('limit') == 25 ? 'selected':''}}>
                                                    25
                                                </option>
                                                <option
                                                    value="50" {{request()->input('limit') == 50 ? 'selected':''}}>
                                                    50
                                                </option>
                                                <option
                                                    value="100" {{request()->input('limit') == 100 ? 'selected':''}}>
                                                    100
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-inline my-2 my-lg-0">
                                            <select name="orderBy"
                                                    class="btn btn-outline-primary btn-sm h-auto p-2 mr-2"
                                                    onchange="this.form.submit()">
                                                <option
                                                    value="" {{request()->input('orderBy') == '' ? 'selected':''}}>
                                                    Sắp xếp
                                                </option>
                                                <option
                                                    value="name" {{request()->input('orderBy') == 'name' ? 'selected':''}}>
                                                    Tên
                                                </option>
                                                <option
                                                    value="price" {{request()->input('orderBy') == 'price' ? 'selected':''}}>
                                                    Giá bán
                                                </option>
                                                <option
                                                    value="status" {{request()->input('orderBy') == 'status' ? 'selected':''}}>
                                                    Trạng thái
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-inline my-2 my-lg-0">
                                            <select name="category_id"
                                                    class="btn btn-outline-primary btn-sm h-auto p-2 mr-2 text-left"
                                                    onchange="this.form.submit()">
                                                <option value="">Danh mục</option>
                                                @foreach($productCategory as $item)
                                                    <option
                                                        value="{{$item->id}}" {{request()->input('category_id') == $item->id ? 'selected':''}}>{{str_repeat('━ ',$item->level).$item->name }}({{$item->Product ? $item->Product->count():0}})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="widget-content ecommerce-table">
                            <div class="table-responsive">
                                <table class="table table-hover" id="products">
                                    <thead>
                                    <tr class="tbl_head">
                                        <th>
                                            <div class="th-content text-center">STT</div>
                                        </th>
                                        <th>
                                            <div class="th-content text-center">Ảnh</div>
                                        </th>
                                        <th>
                                            <div class="th-content text-center">Sản phẩm</div>
                                        </th>
                                        <th>
                                            <div class="th-content text-center">Thông tin bán
                                                hàng
                                            </div>
                                        </th>
                                        <th>
                                            <div class="th-content text-center">Thông tin khác
                                            </div>
                                        </th>
                                        <th>
                                            <div class="th-content text-center">Hiển thị</div>
                                        </th>
                                        <th>
                                            <div class="th-content text-center">Chức năng</div>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($product as $item)
                                        <tr id="row_{{$item->id}}">
                                            <td class="text-center">
                                                <p class="m-0 product-text product-serial">
                                                    {{ ($product->currentPage() - 1) * $product->perPage() + $loop->iteration }}</p>
                                            </td>
                                            <td class="text-center product-images">
                                                @if($item->image!= \App\Admin\Http\Helpers\Common::noImage)
                                                    <img src="{{asset('media/products/small/'.$item->image)}}" width="100px" class="rounded">
                                                @else
                                                    <img src="{{asset('media/common/'.\App\Admin\Http\Helpers\Common::noImage)}}" width="100px" class="rounded invisible">
                                                @endif
                                            </td>
                                            <td class="text-left">
                                                <a href="javascript:void(0);" data-value="{{$item->id}}"
                                                   class="product-name product-text text-primary btn-show-info">
                                                    <ins>{{$item->name}}</ins>
                                                </a>
                                                <p class="product-code product-text m-0">
                                                    Mã SP:<span class="text-primary"><ins>{{$item->code}}</ins></span>
                                                </p>
                                                <p class="product-categories product-text m-0">
                                                    Danh mục: <a href="javascript:void(0)" class="text-primary">
                                                        <ins>{{$item->ProductCategory ? $item->ProductCategory->pluck('name')->implode(','):''}}</ins>
                                                    </a>
                                                </p>
                                            </td>
                                            <td class="text-left">
                                                <p class="m-0 product-text product-price">
                                                    Giá bán: {{number_format($item->price)}}</p>
                                                <p class="m-0 product-text product-market-price">
                                                    Giá thị trường: {{number_format($item->price_market)}}</p>
                                            </td>
                                            <td class="text-left">
                                                <p class="m-0 product-text product-warranty"> Bảo hành: {{$item->warranty}}</p>
                                            </td>
                                            <td class="text-center">
                                                <label
                                                    class="switch switch-primary  m-auto d-block">
                                                    <input type="checkbox" class="btn-show product-show"
                                                           {{$item->show == 1 ? 'checked':''}} name="show"
                                                           data-value="{{$item->id}}">
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                            <td class="text-center">
                                                @can('update', \App\Admin\Models\Product::class)
                                                    <a href="javascript:void(0);" title="Sửa"
                                                       data-value="{{route('admin.product.edit',['id' => $item->id])}}"
                                                       class="bs-tooltip font-20 text-primary mr-2 btn-edit">
                                                        <i class="las la-edit"></i>
                                                    </a>
                                                @endcan
                                                @can('delete', \App\Admin\Models\Product::class)
                                                    <a href="javascript:void(0);" title="Xóa"
                                                       class="bs-tooltip font-20 text-danger mr-2 btn-delete"
                                                       data-toggle="modal" data-target="#modal-delete"
                                                       data-value="{{$item->id}}">
                                                        <i class="las la-trash-alt"></i>
                                                    </a>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {!! $product->links('admin.layouts.pagination') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-iframe d-none">
            <div id="iframeHolder" class="content-iframe">
                <div class="d-flex justify-content-between m-2"><h5 class="title-iframe"></h5><a
                        class="btn-close-iframe"><i class="lar la-times-circle"></i></a></div>
                <iframe id="iframe"></iframe>
            </div>
        </div>
        @include('admin.content.product.create')
        @include('admin.content.product.template_product')
        @include('admin.content.product.delete')
        @include('admin.content.product.template_delete')
        @include('admin.content.product.show')
        @include('admin.content.product.template_show_image')
        @include('admin.content.product.template_item_image')
        @include('admin.content.product.import')
@endsection
@section('css')
    <!-- Page Level Plugin/Style Starts -->
    <link href="{{asset('css/admin/custom-switch.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/select2.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Page Level Plugin/Style Ends -->
@endsection
@section('js')
    <script src="{{asset('js/admin/select2.min.js')}}"></script>
    <script src="{{asset('js/admin/custom-select2.js')}}"></script>
    <script>
        $(document).ready(function () {
            /** Mở Iframe sửa */
            $(document).on('click', '.btn-edit', function () {
                if ($('.box-iframe').hasClass('d-none')) {
                    $('.box-iframe').removeClass('d-none');
                }
                var iframe = $("#iframe");
                var src = $(this).attr('data-value');
                iframe.attr("src", src);
                $('.title-iframe').html('Cập nhật sản phẩm');
            })

            /** Đóng Iframe */
            $(document).on('click', '.btn-close-iframe', function () {
                closeIframe();
                window.location.reload();
            });

            function closeIframe() {
                if (!$('.box-iframe').hasClass('d-none')) {
                    $('.box-iframe').addClass('d-none');
                }
                var iframe = $("#iframe");
                iframe.attr("src", '');
                iframe.html('');
            }

            /** Mở form tạo mới */
            $(document).on('click', '.btn-create', function () {
                $('#create-product')[0].reset()
                $('#create-product').find(':checkbox').prop('checked', true);
                $('#modal-create').modal('show');
                $('.tooltip').hide();
                $('#create-product select[name="category_id[]"]').val(null).trigger('change');
                let r = (Math.random() + 1).toString(36).substring(2);
                $('input[name="code"]').val(r.toUpperCase());
                $('#view-image').attr('src', $('#view-image').attr('data-src'));
            });

            /** Thay ảnh form thêm mới*/
            $(document).on('change', '#product-image', function () {
                $('form#create-product .text-error').remove();
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

            $(document).on('click', '.btn-store', function () {
                $('#modal-create form#create-product .text-error').remove();
                var name = $('#create-product input[name="name"]');
                var code = $('#create-product input[name="code"]');
                var box_code = $('#create-product .input-group');
                var slug = $('#create-product input[name="slug"]');
                var price = $('#create-product input[name="price"]');
                var warranty = $('#create-product input[name="warranty"]');
                var price_range = $('#create-product input[name="price_range"]');
                var cost = $('#create-product input[name="cost"]');
                var price_market = $('#create-product input[name="price_market"]');
                var show = $('#create-product input[name="show"]');
                var category_id = $('#create-product select[name="category_id[]"]');

                var image = $("#product-image").prop("files")[0];
                var form_data = new FormData();
                //thêm files vào trong form data
                form_data.append("image", image);
                form_data.append("name", name.val());
                form_data.append("code", code.val());
                form_data.append("slug", slug.val());
                form_data.append("price", price.val());
                form_data.append("warranty", warranty.val());
                form_data.append("price_range", price_range.val());
                form_data.append("cost", cost.val());
                form_data.append("price_market", price_market.val());
                form_data.append("show", show.is(':checked') ? 1 : 0);
                form_data.append("category_id", category_id.val());

                $.ajax({
                    url: "{{route('admin.product.store')}}",
                    method: "post",
                    data: form_data,
                    processData: false,
                    contentType: false,
                    success: function (output) {
                        if (output.success) {
                            Snackbar.show({
                                text: 'Thêm mới thành công',
                                pos: 'top-center'
                            });
                            var template_product = $('#template-product').html();
                            var tmp = $(template_product).clone();
                            $(tmp).attr('id', 'row_' + output.product.id);
                            $(tmp).find('.product-name').attr('data-value', output.product.id);
                            $(tmp).find('.product-name').html('<ins>' + output.product.name + '</ins>');
                            $(tmp).find('.product-code').html('<ins>' + output.product.code + '</ins>');
                            $(tmp).find('.product-price').html('Giá: ' + new Intl.NumberFormat('vi-VN').format(output.product.price));
                            $(tmp).find('.product-market-price').html('Giá thị trường: ' + new Intl.NumberFormat('vi-VN').format(output.product.price_market));
                            $(tmp).find('.product-warranty').html('Bảo hành: ' + output.product.warranty);
                            if (output.product.show === 1) {
                                $(tmp).find('.product-show').attr('checked', true);
                            }
                            else{
                                $(tmp).find('.product-show').attr('checked', false);
                            }
                            $(tmp).find('.product-show').attr('data-value', output.product.id);
                            var url_edit = "{{route('admin.product.edit',['id' => 'product_id'])}}";
                            url_edit = url_edit.replace('product_id', output.product.id);
                            $(tmp).find('.btn-edit').attr('data-value', url_edit);
                            $(tmp).find('.btn-delete').attr('data-value', output.product.id);
                            $('#products tbody').prepend(tmp);
                        } else {
                            Snackbar.show({
                                text: 'Lỗi',
                                pos: 'top-center'
                            });
                        }
                        $('#modal-create').modal('hide');
                    },
                    error: function (output) {
                        var message = output.responseJSON.errors;
                        if (message.name) {
                            name.after(error(message.name));
                        }
                        if (message.code) {
                            box_code.after(error(message.code));
                        }
                        if (message.slug) {
                            slug.after(error(message.slug));
                        }
                        if (message.price) {
                            price.after(error(message.price));
                        }
                        if (message.warranty) {
                            warranty.after(error(message.warranty));
                        }
                        if (message.cost) {
                            cost.after(error(message.cost));
                        }
                        if (message.price_market) {
                            price_market.after(error(message.price_market));
                        }
                    }
                });
            })

            /** Khôi phục */
            $(document).on('click', '#restore', function () {
                var id = $(this).attr('data-value');
                var input = {
                    id: id,
                }
                $.ajax({
                    url: "{{ route('admin.product.restore') }}",
                    method: "POST",
                    data: input,
                    dataType: "json",
                    success: function (output) {
                        if (output.success) {
                            $('#row_' + id).remove();
                            var template = $('#template_restore').html();
                            var tmp = $(template).clone();
                            tmp.attr('id','row_'+output.product.id);
                            tmp.find('.product-id').html('#'+output.product.id);
                            tmp.find('.product-name').html('<ins>'+output.product.name+'</ins>');
                            tmp.find('.product-name').attr('data-value', output.product.id);
                            tmp.find('.product-code').html('Mã SP:'+output.product.code);
                            var date = new Date(output.product.updated_at);
                            tmp.find('.product-updated-at').html('Cập nhật:'+date.toLocaleString());
                            tmp.find('.product-price').html('-Giá bán:'+new Intl.NumberFormat('vi-VN').format(output.product.price));
                            tmp.find('.product-promotion').html('-Khuyến mại:'+new Intl.NumberFormat('vi-VN').format(output.product.price_promotion));
                            if(output.product.status == 1){
                                tmp.find('.product-status').attr('checked',true);
                            }
                            tmp.find('.product-status').attr('data-value',output.product.id);
                            if(output.product.show == 1){
                                tmp.find('.product-show').attr('checked',true);
                            }
                            tmp.find('.product-show').attr('data-value',output.product.id);
                            tmp.find('.btn-delete').attr('data-value',output.product.id);
                            var url_edit = "{{route('admin.product.edit',['id' => 'product_id'])}}";
                            url_edit  = url_edit.replace('product_id',output.product.id);
                            tmp.find('.btn-edit').attr('data-value',url_edit);
                            $('#products tbody').append(tmp);
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

            /** Xóa */
            $(document).on('click', '#destroy', function () {
                var id = $(this).attr('data-value');
                var input = {
                    id: id,
                }
                $.ajax({
                    url: "{{ route('admin.product.destroy') }}",
                    method: "POST",
                    data: input,
                    dataType: "json",
                    success: function (output) {
                        if (output.success) {
                            $('#row_' + id).remove();
                            var template = $('#template_delete').html();
                            var tmp = $(template).clone();
                            tmp.attr('id','row_'+output.product.id);
                            tmp.find('.product-id').html('#'+output.product.id);
                            tmp.find('.product-name').html('<ins>'+output.product.name+'</ins>');
                            tmp.find('.product-name').attr('data-value', output.product.id);
                            tmp.find('.product-code').html('Mã SP:'+output.product.code);
                            var date = new Date(output.product.updated_at);
                            tmp.find('.product-updated-at').html('Cập nhật:'+date.toLocaleString());
                            tmp.find('.product-price').html('-Giá bán:'+new Intl.NumberFormat('vi-VN').format(output.product.price));
                            tmp.find('.product-promotion').html('-Khuyến mại:'+new Intl.NumberFormat('vi-VN').format(output.product.price_promotion));
                            if(output.product.status == 1){
                                tmp.find('.product-status').attr('checked',true);
                            }
                            tmp.find('.product-status').attr('data-value',output.product.id);
                            if(output.product.show == 1){
                                tmp.find('.product-show').attr('checked',true);
                            }
                            tmp.find('.product-show').attr('data-value',output.product.id);
                            tmp.find('.btn-restore').attr('data-value',output.product.id);
                            $('#productsTrashed tbody').append(tmp);
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

            /** Thay đổi trạng thái */
            $(document).on('click','.btn-status', function () {
                var status = $(this).is(':checked')?1:0;
                var id = $(this).attr('data-value');
                var url = "{{route('admin.product.change_status')}}";
                changeStatus(status,id,url);
            });

            /** Thay đổi trạng thái */
            $(document).on('click','.btn-show', function () {
                var status = $(this).is(':checked')?1:0;
                var id = $(this).attr('data-value');
                var url = "{{route('admin.product.change_show')}}";
                changeStatus(status,id,url);
            });

            /** Form show */
            $(document).on('click','.btn-show-info', function () {
                $('#modal-show .modal-title').html('');
                $('#modal-show .product-type').html('');
                $('#modal-show .product-code').html('');
                $('#modal-show .product-cost').html('');
                $('#modal-show .product-price').html('');
                $('#modal-show .product-unit').html('');
                $('#modal-show .product-weight').html('');
                $('#modal-show .product-quantity').html('');
                $('#modal-show .product-brand').html('');
                $('#modal-show .product-status').html('');
                $('#modal-show .product-promotion').html('');
                $('#modal-show .product-price-promotion').html('');
                $('#modal-show .product-special-promotion').html('');

                var id = $(this).attr('data-value');
                var input = {
                    id: id,
                }
                $.ajax({
                    async:false,
                    url: "{{ route('admin.product.show') }}",
                    method: "POST",
                    data: input,
                    dataType: "json",
                    success: function (output) {
                        if(output.success){
                            var productType = output.product.types_id;
                            if (productType == 1) {
                                productType = "Tiêu chuẩn";
                            }
                            if (productType == 2) {
                                productType = "Combo";
                            }
                            if (productType == 3) {
                                productType = "Dịch vụ";
                            }
                            if (productType == 4) {
                                productType = "Hóa đơn";
                            }
                            var start_date = new Date(output.product.start_promotion);
                            start_date = start_date.toLocaleDateString();
                            var end_date = new Date(output.product.end_promotion);
                            end_date = end_date.toLocaleDateString();
                            var promotion = 'Khuyến mại từ ' + start_date + ' đến ' + end_date;
                            if (output.product.end_promotion == null) {
                                promotion = "";
                            }
                            $('#modal-show .modal-title').html('Sản phẩm ' + output.product.name);
                            $('#modal-show .product-type').html(productType);
                            $('#modal-show .product-code').html('#' + output.product.code);
                            $('#modal-show .product-cost').html(new Intl.NumberFormat('vi-VN').format(output.product.cost));
                            $('#modal-show .product-price').html(new Intl.NumberFormat('vi-VN').format(output.product.price));
                            $('#modal-show .product-unit').html(output.product.unit);
                            $('#modal-show .product-weight').html(new Intl.NumberFormat('vi-VN').format(output.product.price) + ' gram');
                            $('#modal-show .product-brand').html(output.product.brand);
                            $('#modal-show .product-tax').html(output.product.tax);
                            $('#modal-show .product-warranty').html(output.product.warranty);
                            $('#modal-show .product-promotion').html(promotion);
                            $('#modal-show .product-price-promotion').html(new Intl.NumberFormat('vi-VN').format(output.product.price_promotion));
                            $('#modal-show .product-special-promotion').html(output.product.special_promotion);

                            var template_show_image = $('#template_show_image').html();
                            var template_item_image = $('#template_item_image').html();

                            var tmp_image = $(template_show_image).clone();
                            var id_img = output.product.image.replace(/[^a-zA-Z0-9]/g, '');
                            $('#show-template-image').html('');
                            $(tmp_image).addClass('show active');
                            $(tmp_image).attr('id', id_img);

                            var src_img = "{{asset('media/common/'.\App\Admin\Http\Helpers\Common::noImage)}}";
                            if (output.product.image != "{{\App\Admin\Http\Helpers\Common::noImage}}") {
                                src_img = "{{asset('media/products/medium/product_image')}}";
                                src_img = src_img.replace('product_image', output.product.image);
                            }
                            $(tmp_image).find('img').attr('src', src_img);
                            $('#show-template-image').append(tmp_image);

                            var tmp_item = $(template_item_image).clone();
                            $('#item-template-image').html('');
                            $(tmp_item).find('a').attr('href', '#' + id_img);
                            $(tmp_item).find('a').addClass('active');
                            $(tmp_item).find('img').attr('src', src_img);
                            $('#item-template-image').append(tmp_item);

                            if (output.album) {
                                $.each(output.album, function (k,v) {
                                    var tmp_album = $(template_show_image).clone();
                                    $(tmp_album).attr('id', 'album'+v.id);
                                    var src_album = "{{asset('media/products/medium/product_image')}}";
                                    src_album = src_album.replace('product_image', v.name);
                                    $(tmp_album).find('img').attr('src', src_album);
                                    $('#show-template-image').append(tmp_album);

                                    var tmp_item_album = $(template_item_image).clone();
                                    $(tmp_item_album).find('a').attr('href', '#album' + v.id);
                                    $(tmp_item_album).find('img').attr('src', src_album);
                                    $('#item-template-image').append(tmp_item_album);
                                });
                            }

                            $('#modal-show').modal('show');
                        } else {
                            Snackbar.show({
                                text: 'Có lỗi xảy ra',
                                pos: 'top-center'
                            });
                        }
                    }
                });
            });

            /** Reset form import */
            $(document).on('click', '.btn-upload-file', function () {
                $('#import-product')[0].reset()
                $('#modal-import').modal('show');
                $('.btn-import').attr('disabled', false);
            });

            /** Import excel */
            $(document).on('click', '.btn-import', function () {
                var file = $("#import").prop("files")[0];
                var form_data = new FormData();
                form_data.append("file", file);
                $(this).attr('disabled', true);
                $.ajax({
                    url: '{{ route('admin.product.import')}}',
                    method: "POST",
                    contentType: false,
                    processData: false,
                    data: form_data,
                    success: function (output) {
                        if(output.success){
                            $('#modal-import').modal('hide');
                            Snackbar.show({
                                text: 'Nhập file thành công',
                                pos: 'top-center'
                            });
                        } else {
                            $('.btn-import').attr('disabled', false);
                            Snackbar.show({
                                text: 'Có lỗi xảy ra',
                                pos: 'top-center'
                            });
                        }
                    }
                });
            });

            /** Đổi mã SP */
            $(document).on('click', '.btn-rand', function () {
                let r = (Math.random() + 1).toString(36).substring(2);
                $('input[name="code"]').val(r.toUpperCase());
            });

            $('#create-product select[name="branches_id[]"]').select2({
                width: '100%',
                dropdownParent: $("#modal-create"),
            });
            $('#create-product select[name="cat_id[]"]').select2({
                width: '100%',
                dropdownParent: $("#modal-create"),
            });
            $('#create-product select[name="taxes_id"]').select2({
                width: '100%',
                dropdownParent: $("#modal-create"),
            });
            $('#create-product select[name="units_id"]').select2({
                width: '100%',
                dropdownParent: $("#modal-create"),
            });
            $('#create-product select[name="brands_id"]').select2({
                width: '100%',
                dropdownParent: $("#modal-create"),
            });
        });
    </script>
@endsection
