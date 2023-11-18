@extends('admin.layouts.iframe')
@section('body')
    @can('update', \App\Admin\Models\Product::class)
        <div class="layout-px-spacing">
            <div>
            @include('admin.content.alerts.message')
            </div>
            <div class="row layout-spacing layout-top-spacing m-0">
                <div class="col-12 normal-tab">
                    <ul class="nav nav-tabs mb-2 mt-2" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="javascript:void(0);">Cơ bản</a>
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
                            <a class="nav-link" href="{{route('admin.product.edit_variant',['id' => $product->id])}}">Biến thể</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active pt-0" id="tab-basic"
                             role="tabpanel" aria-labelledby="tab-basic">
                            <form id="form-update" enctype="multipart/form-data">
                                @csrf
                                <div class="w-100 position-relative">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="productCode" class="strong">Mã sản phẩm (<span
                                                        class="text-danger">*</span>) </label>
                                                <div class="input-group">
                                                    <input id="productCode" name="code" type="text"
                                                           class="form-control form-control" value="{{old('code') ?? $product->code}}">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="las la-random font-17 btn-rand"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                @error('code')
                                                <span class="invalid-feedback d-block text-error">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input name="id" type="text" class="d-none" value="{{$product->id}}">
                                                <label for="name" class="strong">Tên sản phẩm (<span
                                                        class="text-danger">*</span>)</label>
                                                <input id="name" name="name" type="text"
                                                       class="form-control form-control typingInput" value="{{old('name')  ?? $product->name}}">
                                                @error('name')
                                                <span class="invalid-feedback d-block text-error">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="slug" class="strong">Đường dẫn (<span
                                                        class="text-danger">*</span>)</label>
                                                <input id="slug" name="slug" type="text" value="{{old('slug') ?? $product->slug}}"
                                                       class="form-control form-control slugChanged">
                                                @error('slug')
                                                <span class="invalid-feedback d-block text-error">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group px-2">
                                                <p>Hiển thị</p>
                                                <label class="switch switch-primary mr-2">
                                                    <input type="checkbox" checked="checked" name="show" {{$product->show == 1?'checked':''}}>
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Giá bán</label>
                                                <input name="price" type="text" class="form-control currency" value="{{old('price') ?? $product->price}}"
                                                       min="0">
                                            </div>
                                            <div class="form-group">
                                                <label>Giá thị trường</label>
                                                <input name="price_market" type="text" class="form-control currency"
                                                       value="{{old('price_market') ?? $product->price_market}}" min="0">
                                            </div>
                                            <div class="form-group">
                                                <label>Khoảng giá</label>
                                                <input name="price_range" type="text" class="form-control" value="{{old('price_range') ?? $product->price_range}}">
                                            </div>
                                            <div class="form-group">
                                                <label>Giá nhập</label>
                                                <input name="cost" type="text" class="form-control currency" value="{{old('cost') ?? $product->cost}}"
                                                       min="0">
                                            </div>
                                            <div class="form-group">
                                                <label>Bảo hành</label>
                                                <input name="warranty" type="text" class="form-control"
                                                       value="{{old('warranty') ?? $product->warranty}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Ảnh đại diện</label>
                                                <div class="form-group align-items-center d-flex justify-content-center">
                                                    <label for="product-image">
                                                        @if($product->image != \App\Admin\Http\Helpers\Common::noImage)
                                                            <img src="{{asset('media/product/large/'.$product->image)}}"
                                                                 width="150" height="150" id="view-image" class="object-cover"
                                                                 data-src="{{asset('media/product/large/'.$product->image)}}">
                                                        @else
                                                            <img src="{{asset('media/common/'.\App\Admin\Http\Helpers\Common::noImage)}}"
                                                                 width="150" height="150" id="view-image" class="object-cover"
                                                                 data-src="{{asset('media/common/'.\App\Admin\Http\Helpers\Common::noImage)}}">
                                                            @endif

                                                    </label>
                                                    <input type="file" accept="image/*" name="image" id="product-image"
                                                           class="d-none">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="mx-2 btn btn-sm btn-primary float-right btn-update"
                                               value="Cập nhật">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endcan
@endsection
@section('css')
    <link href="{{asset('css/admin/custom-switch.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/select2.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/form-widgets.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/checkbox-theme.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/tabs.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('js')
    <script src="{{asset('js/admin/select2.min.js')}}"></script>
    <script src="{{asset('js/admin/custom-select2.js')}}"></script>
    <script>
        $(document).ready(function () {

            $(document).on('change', '#product-image', function () {
                $('.text-error').remove();
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

            {{--$(document).on('click','.btn-update', function () {--}}
            {{--    $('#form-update .text-error').remove();--}}
            {{--    var id  = $('#form-update input[name="id"]');--}}
            {{--    var types_id  = $('#form-update select[name="types_id"]');--}}
            {{--    var name = $('#form-update input[name="name"]');--}}
            {{--    var code = $('#form-update input[name="code"]');--}}
            {{--    var box_code = $('#form-update .input-group');--}}
            {{--    var slug = $('#form-update input[name="slug"]');--}}
            {{--    var status = $('#form-update input[name="status"]');--}}
            {{--    var show = $('#form-update input[name="show"]');--}}
            {{--    var model = $('#form-update input[name="model"]');--}}
            {{--    var weight = $('#form-update input[name="weight"]');--}}
            {{--    var units_id = $('#form-update select[name="units_id"]');--}}
            {{--    var taxes_id = $('#form-update select[name="taxes_id"]');--}}
            {{--    var brands_id = $('#form-update select[name="brands_id"]');--}}
            {{--    var cost = $('#form-update input[name="cost"]');--}}
            {{--    var price = $('#form-update input[name="price"]');--}}
            {{--    var quantity_alert = $('#form-update input[name="quantity_alert"]');--}}
            {{--    var barcode = $('#form-update input[name="barcode"]');--}}
            {{--    var serial_no = $('#form-update input[name="serial_no"]');--}}
            {{--    var start_promotion = $('#form-update input[name="start_promotion"]');--}}
            {{--    var end_promotion = $('#form-update input[name="end_promotion"]');--}}
            {{--    var price_promotion = $('#form-update input[name="price_promotion"]');--}}
            {{--    var special_promotion = $('#form-update textarea[name="special_promotion"]');--}}
            {{--    var currency = $('#form-update input[name="currency"]');--}}
            {{--    var branches_id = $('#form-update select[name="branches_id[]"]');--}}
            {{--    var warranty = $('#form-update input[name="warranty"]');--}}
            {{--    var price_range = $('#form-update input[name="price_range"]');--}}

            {{--    var input = {--}}
            {{--        id: id.val(),--}}
            {{--        types_id: types_id.val(),--}}
            {{--        name: name.val(),--}}
            {{--        code: code.val(),--}}
            {{--        slug: slug.val(),--}}
            {{--        status: status.is(':checked') ? 1 : 0,--}}
            {{--        show: show.is(':checked') ? 1 : 0,--}}
            {{--        model: model.val(),--}}
            {{--        weight:weight.val(),--}}
            {{--        units_id:units_id.val(),--}}
            {{--        taxes_id:taxes_id.val(),--}}
            {{--        brands_id: brands_id.val(),--}}
            {{--        cost: cost.val(),--}}
            {{--        price: price.val(),--}}
            {{--        quantity_alert: quantity_alert.val(),--}}
            {{--        barcode: barcode.val(),--}}
            {{--        serial_no: serial_no.val(),--}}
            {{--        start_promotion: start_promotion.val(),--}}
            {{--        end_promotion: end_promotion.val(),--}}
            {{--        price_promotion: price_promotion.val(),--}}
            {{--        special_promotion: special_promotion.val(),--}}
            {{--        currency: currency.val(),--}}
            {{--        branches_id: branches_id.val(),--}}
            {{--        warranty: warranty.val(),--}}
            {{--        price_range: price_range.val(),--}}
            {{--    };--}}
            {{--    $.ajax({--}}
            {{--        url: "{{ route('admin.product.update') }}",--}}
            {{--        method: "POST",--}}
            {{--        data: input,--}}
            {{--        dataType:'json',--}}
            {{--        success: function (output){--}}
            {{--            if (output.success) {--}}
            {{--                Snackbar.show({--}}
            {{--                    text: 'Cập nhật thành công',--}}
            {{--                    pos: 'top-center'--}}
            {{--                });--}}
            {{--            }--}}
            {{--            else{--}}
            {{--                Snackbar.show({--}}
            {{--                    text: 'Có lỗi xảy ra',--}}
            {{--                    pos: 'top-center'--}}
            {{--                });--}}
            {{--            }--}}
            {{--        },--}}
            {{--        error: function (output) {--}}
            {{--            var message = output.responseJSON.errors;--}}
            {{--            if (message.types_id) {--}}
            {{--                types_id.after(error(message.types_id));--}}
            {{--            }--}}
            {{--            if (message.units_id) {--}}
            {{--                units_id.after(error(message.units_id));--}}
            {{--            }--}}
            {{--            if (message.taxes_id) {--}}
            {{--                taxes_id.after(error(message.taxes_id));--}}
            {{--            }--}}
            {{--            if (message.brands_id) {--}}
            {{--                brands_id.after(error(message.brands_id));--}}
            {{--            }--}}
            {{--            if (message.branches_id) {--}}
            {{--                branches_id.after(error(message.branches_id));--}}
            {{--            }--}}
            {{--            if (message.name) {--}}
            {{--                name.after(error(message.name));--}}
            {{--            }--}}
            {{--            if (message.code) {--}}
            {{--                box_code.after(error(message.code));--}}
            {{--            }--}}
            {{--            if (message.slug) {--}}
            {{--                slug.after(error(message.slug));--}}
            {{--            }--}}
            {{--            if (message.model) {--}}
            {{--                model.after(error(message.model));--}}
            {{--            }--}}
            {{--            if (message.barcode) {--}}
            {{--                barcode.after(error(message.barcode));--}}
            {{--            }--}}
            {{--            if (message.serial_no) {--}}
            {{--                serial_no.after(error(message.serial_no));--}}
            {{--            }--}}
            {{--            if (message.special_promotion) {--}}
            {{--                special_promotion.after(error(message.special_promotion));--}}
            {{--            }--}}
            {{--            if (message.warranty) {--}}
            {{--                warranty.after(error(message.warranty));--}}
            {{--            }--}}
            {{--            if (message.price_promotion) {--}}
            {{--                price_promotion.after(error(message.price_promotion));--}}
            {{--            }--}}
            {{--            if (message.cost) {--}}
            {{--                cost.after(error(message.cost));--}}
            {{--            }--}}
            {{--            if (message.price) {--}}
            {{--                price.after(error(message.price));--}}
            {{--            }--}}
            {{--            if (message.weight) {--}}
            {{--                weight.after(error(message.weight));--}}
            {{--            }--}}
            {{--        }--}}
            {{--    });--}}
            {{--})--}}
        });
    </script>
@endsection
