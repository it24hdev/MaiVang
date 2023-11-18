@extends('admin.layouts.iframe')
@section('body')
    @can('update', \App\Admin\Models\Product::class)
        <div class="layout-px-spacing">
            <div class="row layout-spacing layout-top-spacing m-0">
                <div class="col-12 normal-tab">
                    <ul class="nav nav-tabs mb-2 mt-2" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.product.edit',['id' => $product->id])}}">Cơ
                                bản</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.product.edit_category',['id' => $product->id])}}">Danh
                                mục</a>
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
                            <a class="nav-link active" href="javascript:void(0);">Tags</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.product.edit_variant',['id' => $product->id])}}">Biến thể</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active pt-0" id="tab-image"
                             role="tabpanel" aria-labelledby="tab-image">
                            <h6><strong>Chọn tag cho sản phẩm</strong></h6>
                            <div class="form-group">
                                <select name="tags" class="form-control multiple" multiple>
                                    @foreach($tags as $item)
                                        <option value="{{$item->id}}" {{in_array($item->id,$tagsUsed) ? 'selected' : ''}}>{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="btn btn-primary btn-update">Cập nhật</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endcan
@endsection
@section('css')
    <link href="{{asset('css/admin/form-widgets.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/checkbox-theme.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/tabs.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/select2.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/form-widgets.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('js')
    <script src="{{asset('js/admin/select2.min.js')}}"></script>
    <script src="{{asset('js/admin/custom-select2.js')}}"></script>
    <script>
        $(document).ready(function () {
            $(document).on('click','.btn-update', function () {
                $(this).attr('disabled',true);
                var this_update = $(this);
                var tags = $('select[name="tags"]').val();
                var id = '{{$product->id}}';
                var input = {
                    id:id,
                    tags:tags
                }
                $.ajax({
                    url: "{{ route('admin.product.update_tag') }}",
                    method: "POST",
                    data: input,
                    dataType: "json",
                    success: function (output) {
                        this_update.attr('disabled',false);
                        if(output.success){
                            Snackbar.show({
                                text: 'Cập nhật thành công',
                                pos: 'top-center'
                            });
                        }
                        else{
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
