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
                            <a class="nav-link" href="{{route('admin.product.edit',['id' => $product->id])}}">Cơ bản</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.product.edit_category',['id' => $product->id])}}">Danh mục</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.product.edit_image',['id' => $product->id])}}">Ảnh</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="javascript:void(0);">Thông số</a>
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
                            <div class="table-responsive">
                                <table class="table table-bordered mb-4">
                                    <thead>
                                    <tr>
                                        <th class="text-center"><h6>Thuộc tính</h6></th>
                                        <th class="text-center"><h6>Giá trị</h6></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($attribute as $itemParent)
                                        <tr>
                                            <td>
                                                <p class="inline-block"><h6>{{ $itemParent->name }}</h6></p>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-wrap align-items-center">
                                                    @foreach ($itemParent->children as $item)
                                                        <div class="form-check my-1">
                                                            <input class="inp-cbx d-none" type="checkbox" name="attributes[]" id="cbx{{ $item->id }}"
                                                                   {{in_array($item->id,$attribute_has) ? 'checked' : ''}}
                                                                   value="{{$item->id}}">
                                                            <label class="cbx" for="cbx{{$item->id}}">
                                                                <span>
                                                                    <svg width="12px" height="10px" viewBox="0 0 12 10">
                                                                       <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                                    </svg>
                                                                </span>
                                                                <span class="text-dark">{{ $item->name }}</span>
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
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
            $(document).on('click', 'input[name="attributes[]"]', function () {
                var attribute_id =  $(this).val();
                var product_id =  '{{$product->id}}';
                var input = {
                    product_id: product_id,
                    attribute_id: attribute_id,
                    status:$(this).is(':checked')?1:0,
                }
                $.ajax({
                    url: "{{ route('admin.product.update_attribute') }}",
                    method: "POST",
                    data: input,
                    dataType: "json",
                    success: function (output) {
                        if(output.success){
                            console.log('Cập nhật thành công.');
                        }
                        else{
                            console.log('Có lỗi xảy ra.');
                        }
                    }
                });
            })
        });
    </script>
@endsection
