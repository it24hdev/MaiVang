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
                            <a class="nav-link" href="{{route('admin.product.edit',['id' => $product->id])}}">Cơ
                                bản</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.product.edit_category',['id' => $product->id])}}">Danh
                                mục</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                               href="{{route('admin.product.edit_image',['id' => $product->id])}}">Ảnh</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                               href="{{route('admin.product.edit_attribute',['id' => $product->id])}}">Thông số</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="javascript:void(0);">Chi tiết</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                               href="{{route('admin.product.edit_tag',['id' => $product->id])}}">Tags</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.product.edit_variant',['id' => $product->id])}}">Biến
                                thể</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active pt-0" id="tab-basic"
                             role="tabpanel" aria-labelledby="tab-basic">
                            <h6><strong>Chi tiết sản phẩm</strong></h6>
                            <form id="form-detail">
                                <label class="font-weight-bold font-15 text-dark mt-2 mx-2">Seo</label>
                                <div class="col-12 general-info mt-2">
                                    <div class="form-group info col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                        <label>Meta title</label>
                                        <input type="text" name="meta_title" class="form-control"
                                               value="@if($productDetail){{$productDetail->meta_title}}@endif">
                                    </div>
                                    <div class="form-group info col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                        <label>Meta keyword</label>
                                        <input type="text" name="meta_keyword" class="form-control"
                                               value="@if($productDetail){{$productDetail->meta_keyword}}@endif">
                                    </div>
                                    <div class="form-group info col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                        <label>Meta description</label>
                                        <textarea name="meta_description" class="form-control"
                                                  rows="2">@if($productDetail){{$productDetail->meta_description}}@endif</textarea>
                                    </div>
                                </div>
                                <div class="col-12 editor-box">
                                    <label class="font-weight-bold font-15 text-dark">Mô tả</label>
                                    <textarea id="description" class="form-control"
                                              name="description">@if($productDetail){{$productDetail->description}}@endif</textarea>
                                </div>
                            </form>
                            <div class="form-group mt-4">
                                <input type="button" class="mx-3 btn btn-sm btn-primary float-right btn-update"
                                       value="Cập nhật">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endcan
@endsection
@section('css')
    <link href="{{asset('css/admin/tabs.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('js')
    <script src="{{ asset('library/tinymce/tinymce.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            /** Soạn thảo văn bản tinyMce*/
            tinymce.init({
                selector: '.editor-box textarea',
                relative_urls: false,
                height: 400,
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

            $(document).on('click', '.btn-update', function () {
                $('#form-detail .text-error').remove();
                $('.btn-update').attr('disabled',true);
                var meta_title = $('#form-detail input[name="meta_title"]');
                var meta_keyword = $('#form-detail input[name="meta_keyword"]');
                var meta_description = $('#form-detail textarea[name="meta_description"]');
                var description = tinymce.get('description').getContent();
                var input = {
                    product_id: "{{$product->id}}",
                    meta_title: meta_title.val(),
                    meta_keyword: meta_keyword.val(),
                    meta_description: meta_description.val(),
                    description: description,
                }
                $.ajax({
                    url: "{{route('admin.product.update_detail')}}",
                    method: "post",
                    data: input,
                    dataType: "json",
                    success: function (output) {
                        $('.btn-update').attr('disabled',false);
                        if (output.success) {
                            Snackbar.show({
                                text: 'Cập nhật thành công',
                                pos: 'top-center'
                            });
                        } else {
                            Snackbar.show({
                                text: 'Lỗi',
                                pos: 'top-center'
                            });
                        }
                    },
                    error: function (output) {
                        $('.btn-update').attr('disabled',false);
                        var message = output.responseJSON.errors;
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
                })
            });
        });
    </script>
@endsection
