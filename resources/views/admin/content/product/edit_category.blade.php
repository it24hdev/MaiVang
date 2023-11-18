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
                            <a class="nav-link active" href="javascript:void(0);">Danh mục</a>
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
                        <div class="tab-pane fade show active pt-0" id="tab-category"
                             role="tabpanel" aria-labelledby="tab-category">
                            <h6><strong>Chọn danh mục cho sản phẩm</strong></h6>
                            <div id="category">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.content.product.template_category')
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
            load('{{$product->id}}');

            function load(id) {
                var input = {
                    id: id,
                }
                $.ajax({
                    url: "{{ route('admin.category_products.loadCategory') }}",
                    method: "POST",
                    data: input,
                    dataType: "json",
                    success: function (output) {
                        var template_category = $('#template_category').html();
                        $.each(output.categoryProducts, function (k, v) {
                            var tmp = $(template_category).clone();
                            if (v.parent == 0) {
                                if ($.inArray(v.id, output.hasChild) !== -1) {
                                    $(tmp).find('.icon-extend').removeClass('d-none');
                                    $(tmp).find('.btn-child').addClass('text-primary font-weight-bold')
                                }
                                if ($.inArray(v.id, output.added) !== -1) {
                                    $(tmp).find('input[name="category_product_id"]').attr('checked',true);
                                }
                                $(tmp).find('.btn-child').html(v.name);
                                $(tmp).find('.btn-child').attr('data-value',v.id);
                                $(tmp).find('.box-info').addClass('box_info_'+v.id);
                                $(tmp).find('input[name="category_product_id"]').val(v.id);
                                $(tmp).find('.level').html('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.repeat(v.level));
                                $(tmp).find('.box-child').addClass('row_'+v.id);
                                $('#category').append(tmp);
                            } else {
                                if ($.inArray(v.id, output.hasChild) !== -1) {
                                    $(tmp).find('.icon-extend').removeClass('d-none');
                                    $(tmp).find('.btn-child').addClass('text-primary font-weight-bold')
                                }
                                if ($.inArray(v.id, output.added) !== -1) {
                                    $(tmp).find('input[name="category_product_id"]').attr('checked',true);
                                }
                                $(tmp).find('.btn-child').html(v.name);
                                $(tmp).find('.btn-child').attr('data-value',v.id);
                                $(tmp).find('.box-info').addClass('box_info_'+v.id);
                                $(tmp).find('input[name="category_product_id"]').val(v.id);
                                $(tmp).find('.level').html('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.repeat(v.level));
                                $(tmp).find('.box-child').addClass('row_'+v.id);
                                $('.row_'+v.parent).append(tmp);
                            }
                        });
                    }
                });
            };

            $(document).on('click', '.btn-child', function () {
                var id = $(this).attr('data-value');
                var box_category = $('.box_info_'+id);
                if(box_category.find('i').hasClass('la-plus-square')){
                    box_category.find('i').removeClass('la-plus-square');
                    box_category.find('i').addClass('la-minus-square');
                    box_category.next('.box-child').removeClass('d-none');
                }
                else{
                    box_category.find('i').addClass('la-plus-square');
                    box_category.find('i').removeClass('la-minus-square');
                    box_category.next('.box-child').addClass('d-none');
                }
            });

            $(document).on('click', 'input[name="category_product_id"]', function () {
                var category_product_id = $(this).val();
                var product_id = '{{$product->id}}';
                var status = $(this).is(':checked')?1:0;
                var input = {
                    category_product_id:category_product_id,
                    product_id:product_id,
                    status:status,
                };
                $.ajax({
                    async: false,
                    url: "{{ route('admin.category_products.updateCategory') }}",
                    method: "POST",
                    data:input,
                    dataType: "json",
                    success: function (output) {
                        if(output.success){
                            Snackbar.show({
                                text: 'Cập nhật thành công',
                                pos: 'top-center'
                            });
                        }
                    }
                });
            });
        });
    </script>
@endsection
