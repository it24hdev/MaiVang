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
                            <a class="nav-link active" href="javascript:void(0);">Ảnh</a>
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
                        <div class="tab-pane fade show active pt-0" id="tab-image"
                             role="tabpanel" aria-labelledby="tab-image">
                            <div class="d-flex">
                            <h6><strong>Thêm ảnh cho sản phẩm</strong></h6>
                            <a class="pointer s-o mr-2 bs-tooltip ml-4 text-primary" title="reload"
                               onClick="window.location.reload();">
                                <i class="las la-sync-alt"></i>
                            </a>
                            </div>
                            <div id="productImage" class="d-flex overflow-auto w-100">
                            </div>
                            <div class="mt-4 ml-4 d-flex justify-content-start">
                                <div class="form-group">
                                    <p class="text-primary font-weight-bold">Upload ảnh từ Album</p>
                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#album" class="btn btn-primary btn-album">Chọn tệp</a>
                                </div>
                            </div>
                            <div class="mt-4 ml-4 d-flex justify-content-start">
                                <div class="form-group">
                                    <p class="text-primary font-weight-bold">Upload ảnh từ thiết bị</p>
                                     <label for="upload" class="btn btn-primary mr-2 mb-0">Chọn tệp</label>
                                        <input type="file" name="upload" class="d-none" id="upload" accept="image/*"
                                               multiple>
                                    <button class="btn btn-primary btn-update">Cập nhật</button>
                                </div>
                            </div>
                            <div class="box-update">
                                <ul class="fileList"></ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.content.product.template_image')
        @include('admin.content.product.album')
        @include('admin.content.product.template_album')
        @include('admin.content.product.template_paginate')
    @endcan
@endsection
@section('css')
    <link href="{{asset('css/admin/form-widgets.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/checkbox-theme.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/tabs.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            load('{{$product->id}}');
            function load(id) {
                var input = {
                    id: id,
                };
                $.ajax({
                    url: "{{route('admin.product.load_image')}}",
                    method: "post",
                    data: input,
                    dataType: "json",
                    success: function (output) {
                        if (output.success) {
                            var template_image = $('#template_image').html();
                            $('#productImage').html('');
                            if (output.product.image != "{{\App\Admin\Http\Helpers\Common::noImage}}") {
                                var tmp = $(template_image).clone();
                                var src_img = "{{asset('media/products/medium/product_img')}}";
                                src_img = src_img.replace('product_img', output.product.image)
                                $(tmp).find('img').attr('src', src_img);
                                $(tmp).find('.btn-delete').attr('data-value', output.product.image);
                                $(tmp).find('.btn-avatar ins').html('Ảnh chính');
                                $(tmp).find('.btn-avatar ins').addClass('text-danger');
                                $('#productImage').append(tmp);
                            }
                            if(output.productAlbum.length>0){
                                $.each(output.productAlbum, function () {
                                    var tmp = $(template_image).clone();
                                    var src_img = "{{asset('media/products/medium/product_img')}}";
                                    src_img = src_img.replace('product_img', this.name)
                                    $(tmp).find('img').attr('src', src_img);
                                    $(tmp).find('.btn-delete').attr('data-value', this.name);
                                    $(tmp).find('.btn-avatar').attr('data-value', this.name);
                                    $(tmp).find('.btn-avatar ins').html('Chọn ảnh chính');
                                    $('#productImage').append(tmp);
                                })
                            }
                        }
                    }
                });
            };

            /** Thay ảnh */
            $(document).on('change', '#upload', function () {
                $($(this)[0].files).each(function () {
                    var file = $(this)[0].name;
                    $('.fileList').append('<li>' + file + '</li>');
                });
            });

            /** Upload ảnh */
            $(document).on('click', '.btn-update', function () {
                $(this).attr('disabled',true);
                var this_update = $(this);
                var id = "{{$product->id}}";
                var form_data = new FormData();
                var ins = document.getElementById('upload').files.length;
                if(ins>0){
                    for (var x = 0; x < ins; x++) {
                        form_data.append("album[]", document.getElementById('upload').files[x]);
                    }
                    form_data.append('id', id);
                    $.ajax({
                        url: "{{route('admin.product.upload_image')}}",
                        method: "post",
                        data: form_data,
                        processData: false,
                        contentType: false,
                        success: function (output) {
                            this_update.attr('disabled',false);
                            if (output.success) {
                                $('.fileList').html('');
                                $('input[name="upload"]').val('');
                                load(id);
                            }
                            else{
                                Snackbar.show({
                                    text: 'Có lỗi xảy ra',
                                    pos: 'top-center'
                                });
                            }
                        }
                    });
                }
                else{
                    this_update.attr('disabled',false);
                }
            });

            /** Xóa ảnh */
            $(document).on('click', '.btn-delete', function () {
                var image = $(this).attr('data-value');
                var id = '{{$product->id}}';
                var this_img = $(this);
                var input = {
                    image:image,
                    id:id,
                }
                $.ajax({
                    url: "{{route('admin.product.delete_image')}}",
                    method: "post",
                    data: input,
                    dataType: "json",
                    success: function (output) {
                        if(output.success){
                            load(id);
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

            /** Cập nhật ảnh chính */
            $(document).on('click', '.btn-avatar', function () {
                var image = $(this).attr('data-value');
                var id = '{{$product->id}}';
                var input = {
                    image:image,
                    id:id,
                }
                if(typeof image != "undefined"){
                    $.ajax({
                        url: "{{route('admin.product.update_image')}}",
                        method: "post",
                        data: input,
                        dataType: "json",
                        success: function (output) {
                            if(output.success){
                                load(id);
                            }
                            else{
                                Snackbar.show({
                                    text: 'Có lỗi xảy ra',
                                    pos: 'top-center'
                                });
                            }
                        }
                    });
                }
            });

            /** Mở Album ảnh*/
            $(document).on('click', '.btn-album', function () {
                loadAlbum('product');
            })

            function loadAlbum(sortby) {
                var page = 1;
                var page_active = $('.box-collection-' + sortby + ' .pagination ul a.is-active').attr('data-target');
                if (page_active != null) {
                    page = page_active;
                }
                var product_id = '{{$product->id}}';
                var input = {
                    sortby: sortby,
                    page: page,
                    product_id: product_id,
                };
                $.ajax({
                    async: true,
                    url: "{{route('admin.product.load_album')}}",
                    method: "post",
                    data: input,
                    dataType: "json",
                    success: function (output) {
                        var append_data = $('#collection-' + sortby);
                        append_data.html('');
                        var append_paginate = $('.box-collection-' + sortby + ' .pagination ul');
                        append_paginate.html('');
                        var template_album = $('#template_album').html();
                        if (output.fileManagers.data.length > 0) {
                            $.each(output.fileManagers.data, function () {
                                var tmp = $(template_album).clone();
                                var src = "{{asset('media/products/medium/image')}}";
                                    src = src.replace('image',this.name);
                                $(tmp).find('img').attr('src', src);
                                $(tmp).find('img').attr('data-value', this.name);
                                $(tmp).find('span').html(this.name);
                                if ($.inArray(this.name, output.used) !== -1) {
                                    $(tmp).find('.btn-add-image-album').html('Đã dùng');
                                    $(tmp).find('.btn-add-image-album').removeClass('text-primary');
                                }
                                else{
                                    $(tmp).find('.btn-add-image-album').attr('data-value',this.name);
                                    $(tmp).find('.btn-add-image-album ins').html('Sử dụng');
                                }
                                append_data.append(tmp);
                            });
                            /** phân trang */
                            var current_page = output.fileManagers.current_page;
                            var last_page = output.fileManagers.last_page;
                            pagination(output.fileManagers.links, current_page, last_page, append_paginate);
                        }
                    }
                })
            };

            /** template phân trang */
            function pagination(data, current_page, last_page, append_class) {
                var template_pagination = $('#template_paginate').html();
                append_class.html('');
                if (data.length > 0) {
                    $.each(data, function (k, v) {
                        if (last_page !== 1) {
                            var tmp = $(template_pagination).clone();
                            if (v.label.includes('Previous') && current_page !== 1) {
                                $(tmp).find("li").html('Trước');
                                $(tmp).attr('data-target', 'previous');
                                $(tmp).addClass('prev');
                                append_class.append(tmp);
                            } else if (v.label.includes('Next')  && current_page != last_page) {
                                $(tmp).find("li").html('Sau');
                                $(tmp).attr('data-target', 'next');
                                $(tmp).addClass('next');
                                append_class.append(tmp);
                            } else if (v.label == "...") {
                                $(tmp).find("li").html(v.label);
                                append_class.append(tmp);
                            } else {
                                if (Number.isFinite(parseInt(v.label))) {
                                    $(tmp).find("li").html(v.label);
                                    $(tmp).attr('data-target', v.label);
                                    append_class.append(tmp);
                                }
                            }
                            if (v.active == true) {
                                $(tmp).addClass('is-active');
                            }
                        }
                    });
                }
            }

            /** chọn trang product */
            $(document).on('click', '.box-collection-product .pagination ul a', function () {
                changePagination('.box-collection-product .pagination ul', $(this), 'product');
            });

            function changePagination(pagination, this_chose, type_media) {
                if (Number.isFinite(parseInt(this_chose.attr('data-target')))) {
                    $(pagination + ' a').removeClass('is-active');
                    this_chose.addClass('is-active');
                    loadAlbum(type_media);
                } else {
                    if (this_chose.attr('data-target') == 'next') {
                        var a_active = $(pagination + ' a.is-active').attr('data-target');
                        let new_active = parseInt(a_active) + 1;
                        $(pagination + ' a').removeClass('is-active');
                        $(pagination).find('[data-target="' + new_active + '"]').addClass('is-active');
                        load(type_media);
                    } else if (this_chose.attr('data-target') == 'previous') {
                        var a_active = $(pagination + ' a.is-active').attr('data-target');
                        let new_active = parseInt(a_active) - 1;
                        $(pagination + ' li').removeClass('is-active');
                        $(pagination).find('[data-target="' + new_active + '"]').addClass('is-active');
                        loadAlbum(type_media);
                    }
                }
            }

            /** Thêm mới ảnh từ album */
            $(document).on('click','.btn-add-image-album', function () {
                var this_image = $(this);
                var image  = $(this).attr('data-value');
                var id = '{{$product->id}}';
                if(typeof image != "undefined"){
                    var input = {
                        image:image,
                        id:id,
                    };
                    $.ajax({
                        url: "{{route('admin.product.upload_from_album')}}",
                        method: "post",
                        data: input,
                        dataType: "json",
                        success: function (output) {
                            if (output.success) {
                                load(id);
                                this_image.html('Đã dùng');
                                this_image.removeAttr('data-value');
                                this_image.removeClass('text-primary');
                            }
                            else{
                                Snackbar.show({
                                    text: 'Có lỗi xảy ra',
                                    pos: 'top-center'
                                });
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection
