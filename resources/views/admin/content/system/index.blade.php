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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Hệ thống</a></li>
                                <li class="breadcrumb-item active"><a href="javascript:void(0);">Cài đặt chung</a></li>
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
            <div class="col-xl-3 col-lg-4 col-md-4 mb-4">
                <div class="profile-left mb-4">
                    <div>
                        <h5>Hệ thống</h5>
                        <div class="profile-tabs tab-options-list pb-4">
                            <div class="nav flex-column nav-pills mb-sm-0 mb-3 mx-auto"
                                 role="tablist" aria-orientation="vertical">
                                <div class="nav flex-column nav-pills mb-sm-0 mb-3 mx-0">
                                    <a class="nav-link d-flex" href=""><i class="las la-globe-africa font-20 mr-2"></i>Cài
                                        đặt Chung</a>
                                    <a class="nav-link d-flex active" href=""><i
                                            class="las la-photo-video font-20 mr-2"></i>Cấu hình ảnh</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-8">
                <div class="statbox widget box box-shadow mb-4">
                    <div class="general-info box-info-profile">
                        <div id="tab-display-settings" role="tabpanel">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-12 widget-heading m-0 d-flex justify-content-between align-center">
                                        <h4 class="p-0">Cấu hình ảnh</h4>
                                        <div
                                            class="d-flex justify-content-sm-end justify-content-center contact-options">
                                            <a class="pointer s-o mr-2 bs-tooltip" title=""
                                               onclick="window.location.reload();" data-original-title="reload">
                                                <i class="las la-sync-alt"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content d-flex flex-wrap">
                                <div class="col-12 normal-tab px-0">
                                    <ul class="nav nav-tabs mb-2 mt-2" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#config-product-image"
                                               role="tab" aria-controls="tab-config-product-image" aria-selected="true">Ảnh
                                                sản phẩm</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#config-post-image"
                                               role="tab" aria-controls="tab-config-post-image" aria-selected="false">Ảnh
                                                bài viết</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade pt-0 show active" id="config-product-image"
                                             role="tabpanel"
                                             aria-labelledby="tab-config-product-image">
                                            <form id="product-image-size">
                                                <div class="d-flex">
                                                    <div class="col-4 pt-3">
                                                        <div class="info p-0">
                                                            <h6 class="mb-2">Ghi chữ bản quyền lên ảnh</h6>
                                                        </div>
                                                        <div class="form-check pl-0 mb-2 form-group">
                                                            <div
                                                                class="custom-control custom-checkbox checkbox-success">
                                                                <input type="checkbox" class="custom-control-input"
                                                                       id="product_image_license" name="product_image_license"
                                                                    {{ isset($systems->product_image_license) && $systems->product_image_license == 1 ? 'checked':''}}>
                                                                <label class="custom-control-label"
                                                                       for="product_image_license">Ghi bản quyền (Tên miền
                                                                    website sẽ được ghi lên ảnh bài viết)</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="info p-0">
                                                                <h6 class="mb-2">Loại khung hình</h6>
                                                            </div>
                                                            <div class="radio-inline">
                                                                <label class="radio">
                                                                    <input type="radio" name="product_image_type"
                                                                           value="0" {{isset($systems->product_image_type) && $systems->product_image_type == 0 ? 'checked':''}}>
                                                                    <span></span>Theo kích thước
                                                                </label>
                                                                <label class="radio">
                                                                    <input type="radio" name="product_image_type"
                                                                           value="1" {{isset($systems->product_image_type) && $systems->product_image_type == 1 ? 'checked':''}}>
                                                                    <span></span>Theo tỉ lệ
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-8 info">
                                                        <h6 class="m-0">Kích thước ảnh sản phẩm</h6>
                                                        <p>Điều chỉnh kích thước ảnh cho phù hợp với giao diện
                                                            website</p>
                                                        <h6 class="mb-3">Ảnh Mobile</h6>
                                                        <div class="d-flex flex-wrap align-items-baseline">
                                                            <div class="d-flex flex-wrap mr-2">
                                                                <div class="form-group mr-2">
                                                                    <label>Chiều rộng (pixel)</label>
                                                                    <input type="number" class="form-control" min="0"
                                                                           name="product_image_sm_h" required
                                                                           value="{{ isset($systems->product_image_sm) && is_array(json_decode($systems->product_image_sm)) ? json_decode($systems->product_image_sm)[0] : 0 }}">
                                                                </div>
                                                                <div class="form-group product-height-box">
                                                                    <label>Chiều cao (pixel)</label>
                                                                    <input type="number" class="form-control" min="0"
                                                                           name="product_image_sm_w" required
                                                                           value="{{ isset($systems->product_image_sm) && is_array(json_decode($systems->product_image_sm)) ? json_decode($systems->product_image_sm)[1] : 0 }}">
                                                                </div>
                                                            </div>
                                                            <span>(Mặc định 150x150)</span>
                                                        </div>
                                                        <h6 class="mb-3">Ảnh Tablet</h6>
                                                        <div class="d-flex flex-wrap align-items-baseline">
                                                            <div class="d-flex flex-wrap mr-2">
                                                                <div class="form-group mr-2">
                                                                    <label>Chiều rộng (pixel)</label>
                                                                    <input type="number" class="form-control" min="0"
                                                                           name="product_image_md_w" required
                                                                           value="{{ isset($systems->product_image_md) && is_array(json_decode($systems->product_image_md)) ? json_decode($systems->product_image_md)[0] : 0 }}">
                                                                </div>
                                                                <div class="form-group product-height-box">
                                                                    <label>Chiều cao (pixel)</label>
                                                                    <input type="number" class="form-control" min="0"
                                                                           name="product_image_md_h" required
                                                                           value="{{ isset($systems->product_image_md) && is_array(json_decode($systems->product_image_md)) ? json_decode($systems->product_image_md)[1] : 0 }}">
                                                                </div>
                                                            </div>
                                                            <span>(Mặc định 300x300)</span>
                                                        </div>
                                                        <h6 class="mb-3">Ảnh Desktop</h6>
                                                        <div class="d-flex flex-wrap align-items-baseline">
                                                            <div class="d-flex flex-wrap mr-2">
                                                                <div class="form-group mr-2">
                                                                    <label>Chiều rộng (pixel)</label>
                                                                    <input type="number" class="form-control" min="0"
                                                                           name="product_image_lg_h" required
                                                                           value="{{ isset($systems->product_image_lg) && is_array(json_decode($systems->product_image_lg)) ? json_decode($systems->product_image_lg)[0] : 0 }}">
                                                                </div>
                                                                <div class="form-group product-height-box">
                                                                    <label>Chiều cao (pixel)</label>
                                                                    <input type="number" class="form-control" min="0"
                                                                           name="product_image_lg_w" required
                                                                           value="{{ isset($systems->product_image_lg) && is_array(json_decode($systems->product_image_lg)) ? json_decode($systems->product_image_lg)[1] : 0 }}">
                                                                </div>
                                                            </div>
                                                            <span>(Mặc định 600x600)</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="widget-footer text-right p-3">
                                                    <input type="button" class="btn btn-primary mr-2 update-product-image"
                                                           value="Cập nhật">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade pt-0" id="config-post-image"
                                             role="tabpanel" aria-labelledby="tab-config-post-image">
                                            <form id="post-image-size">
                                                <div class="d-flex">
                                                    <div class="col-4 pt-3">
                                                        <div class="info p-0">
                                                        <h6 class="mb-2">Ghi chữ bản quyền lên ảnh</h6>
                                                        </div>
                                                        <div class="form-check pl-0 mb-2 form-group">
                                                            <div
                                                                class="custom-control custom-checkbox checkbox-success">
                                                                <input type="checkbox" class="custom-control-input"
                                                                       id="post_image_license" name="post_image_license"
                                                                    {{ isset($systems->post_image_license) && $systems->post_image_license == 1 ? 'checked':''}}>
                                                                <label class="custom-control-label"
                                                                       for="post_image_license">Ghi bản quyền (Tên miền
                                                                    website sẽ được ghi lên ảnh bài viết)</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="info p-0">
                                                                <h6 class="mb-2">Loại khung hình</h6>
                                                            </div>
                                                            <div class="radio-inline">
                                                                <label class="radio">
                                                                    <input type="radio" name="post_image_type"
                                                                           value="0" {{isset($systems->post_image_license) && $systems->post_image_type == 0 ? 'checked':''}}>
                                                                    <span></span>Theo kích thước</label>
                                                                <label class="radio">
                                                                    <input type="radio" name="post_image_type"
                                                                           value="1" {{isset($systems->post_image_license) && $systems->post_image_type == 1 ? 'checked':''}}>
                                                                    <span></span>Theo tỉ lệ
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-8 info">
                                                        <h6 class="m-0">Kích thước ảnh bài viết</h6>
                                                        <p>Điều chỉnh kích thước ảnh cho phù hợp với giao diện
                                                            website</p>
                                                        <h6 class="mb-3">Ảnh Mobile</h6>
                                                        <div class="d-flex flex-wrap align-items-baseline">
                                                            <div class="d-flex flex-wrap mr-2">
                                                                <div class="form-group mr-2">
                                                                    <label>Chiều rộng (pixel)</label>
                                                                    <input type="number" class="form-control" min="0"
                                                                           name="post_image_sm_h" required
                                                                           value="{{ isset($systems->post_image_sm) && is_array(json_decode($systems->post_image_sm)) ? json_decode($systems->post_image_sm)[0] : 0 }}">
                                                                </div>
                                                                <div class="form-group post-height-box">
                                                                    <label>Chiều cao (pixel)</label>
                                                                    <input type="number" class="form-control" min="0"
                                                                           name="post_image_sm_w" required
                                                                           value="{{ isset($systems->post_image_sm) && is_array(json_decode($systems->post_image_sm)) ? json_decode($systems->post_image_sm)[1] : 0 }}">
                                                                </div>
                                                            </div>
                                                            <span>(Mặc định 150x150)</span>
                                                        </div>
                                                        <h6 class="mb-3">Ảnh Tablet</h6>
                                                        <div class="d-flex flex-wrap align-items-baseline">
                                                            <div class="d-flex flex-wrap mr-2">
                                                                <div class="form-group mr-2">
                                                                    <label>Chiều rộng (pixel)</label>
                                                                    <input type="number" class="form-control" min="0"
                                                                           name="post_image_md_w" required
                                                                           value="{{ isset($systems->post_image_md) && is_array(json_decode($systems->post_image_md)) ? json_decode($systems->post_image_md)[0] : 0 }}">
                                                                </div>
                                                                <div class="form-group post-height-box">
                                                                    <label>Chiều cao (pixel)</label>
                                                                    <input type="number" class="form-control" min="0"
                                                                           name="post_image_md_h" required
                                                                           value="{{ isset($systems->post_image_md) && is_array(json_decode($systems->post_image_md)) ? json_decode($systems->post_image_md)[1] : 0 }}">
                                                                </div>
                                                            </div>
                                                            <span>(Mặc định 300x300)</span>
                                                        </div>
                                                        <h6 class="mb-3">Ảnh Desktop</h6>
                                                        <div class="d-flex flex-wrap align-items-baseline">
                                                            <div class="d-flex flex-wrap mr-2">
                                                                <div class="form-group mr-2">
                                                                    <label>Chiều rộng (pixel)</label>
                                                                    <input type="number" class="form-control" min="0"
                                                                           name="post_image_lg_h" required
                                                                           value="{{ isset($systems->post_image_lg) && is_array(json_decode($systems->post_image_lg)) ? json_decode($systems->post_image_lg)[0] : 0 }}">
                                                                </div>
                                                                <div class="form-group post-height-box">
                                                                    <label>Chiều cao (pixel)</label>
                                                                    <input type="number" class="form-control" min="0"
                                                                           name="post_image_lg_w" required
                                                                           value="{{ isset($systems->post_image_lg) && is_array(json_decode($systems->post_image_lg)) ? json_decode($systems->post_image_lg)[1] : 0 }}">
                                                                </div>
                                                            </div>
                                                            <span>(Mặc định 600x600)</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="widget-footer text-right p-3">
                                                    <input type="button" class="btn btn-primary mr-2 update-post-image"
                                                           value="Cập nhật">
                                                </div>
                                            </form>
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
    <!-- Main Body Ends -->
@endsection
@section('css')
    <!-- Page Level Plugin/Style Starts -->
    <link href="{{asset('css/admin/profile.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/profile_edit.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/select2.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/form-widgets.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/dt-global_style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/switch-theme.css')}}" rel="stylesheet" type="text/css">

    <!-- Page Level Plugin/Style Ends -->
@endsection
@section('js')
    <!-- Page Level Plugin/Script Starts -->
    <script src="{{asset('js/admin/select2.min.js')}}"></script>
    <script src="{{asset('js/admin/custom-select2.js')}}"></script>
    <!-- Page Level Plugin/Script Ends -->
    <script>
        $(document).ready(function () {
            /** Cập nhật Ảnh sản phẩm */
            $(document).on('click', '.update-product-image', function () {
                $('.text-error').remove();
                var product_image_sm_h = $('#product-image-size input[name="product_image_sm_h"]');
                var product_image_sm_w = $('#product-image-size input[name="product_image_sm_w"]');
                var product_image_md_h = $('#product-image-size input[name="product_image_md_h"]');
                var product_image_md_w = $('#product-image-size input[name="product_image_md_w"]');
                var product_image_lg_h = $('#product-image-size input[name="product_image_lg_h"]');
                var product_image_lg_w = $('#product-image-size input[name="product_image_lg_w"]');
                var product_image_license = $('#product-image-size input[name="product_image_license"]');
                var product_image_type = $('#product-image-size input[name="product_image_type"]:checked');

                var product_image_sm = [parseInt(product_image_sm_w.val()) || 0, parseInt(product_image_sm_h.val()) || 0];
                var product_image_md = [parseInt(product_image_md_w.val()) || 0, parseInt(product_image_md_h.val()) || 0];
                var product_image_lg = [parseInt(product_image_lg_w.val()) || 0, parseInt(product_image_lg_h.val()) || 0];
                var input = {
                    product_image_sm: product_image_sm,
                    product_image_md: product_image_md,
                    product_image_lg: product_image_lg,
                    product_image_license: product_image_license.is(':checked') ? 1 : 0,
                    product_image_type: product_image_type.val(),
                };
                $.ajax({
                    url: "{{route('admin.system.product_image_size')}}",
                    method: "post",
                    data: input,
                    dataType: "json",
                    success: function (output) {
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
                    }
                })
            });

            /** Cập nhật Ảnh bài viết */
            $(document).on('click', '.update-post-image', function () {
                $('.text-error').remove();
                var post_image_sm_h = $('#post-image-size input[name="post_image_sm_h"]');
                var post_image_sm_w = $('#post-image-size input[name="post_image_sm_w"]');
                var post_image_md_h = $('#post-image-size input[name="post_image_md_h"]');
                var post_image_md_w = $('#post-image-size input[name="post_image_md_w"]');
                var post_image_lg_h = $('#post-image-size input[name="post_image_lg_h"]');
                var post_image_lg_w = $('#post-image-size input[name="post_image_lg_w"]');
                var post_image_license = $('#post-image-size input[name="post_image_license"]');
                var post_image_type = $('#post-image-size input[name="post_image_type"]:checked');

                var post_image_sm = [parseInt(post_image_sm_w.val()) || 0, parseInt(post_image_sm_h.val()) || 0];
                var post_image_md = [parseInt(post_image_md_w.val()) || 0, parseInt(post_image_md_h.val()) || 0];
                var post_image_lg = [parseInt(post_image_lg_w.val()) || 0, parseInt(post_image_lg_h.val()) || 0];
                var input = {
                    post_image_sm: post_image_sm,
                    post_image_md: post_image_md,
                    post_image_lg: post_image_lg,
                    post_image_license: post_image_license.is(':checked') ? 1 : 0,
                    post_image_type: post_image_type.val()
                };
                $.ajax({
                    url: "{{route('admin.system.post_image_size')}}",
                    method: "post",
                    data: input,
                    dataType: "json",
                    success: function (output) {
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
                    }
                })
            });

            $(document).on('change', 'input[name="product_image_type"]', function () {
                var selectedValue = $(this).val();

                if (selectedValue === '1') {
                    $('.product-height-box').addClass('d-none');
                } else {
                    $('.product-height-box').removeClass('d-none');
                }
            });

            $(document).on('change', 'input[name="post_image_type"]', function () {
                var selectedValue = $(this).val();

                if (selectedValue === '1') {
                    $('.post-height-box').addClass('d-none');
                } else {
                    $('.post-height-box').removeClass('d-none');
                }
            });

        })
    </script>
@endsection
