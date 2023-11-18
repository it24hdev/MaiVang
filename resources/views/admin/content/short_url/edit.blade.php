@extends('admin.layouts.base')
@section('body')
    @can('viewAny', \App\Admin\Models\ShortUrl::class)
        <script>
            function enableSelect() {
                document.querySelector('select[name="type"]').removeAttribute('disabled');
                // Gửi biểu mẫu sau khi enable select
                document.getElementById('myForm').submit();
            }
        </script>
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
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Hệ thống</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <a href="javascript:void(0);">Cập nhật đường dẫn</a>
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
            <div class="row layout-spacing layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="card-box general-info">
                        <form id="myForm" action="{{route('admin.short_url.update')}}" method="post">
                            @csrf
                            <h5 class="header-title mb-3">Cập nhật đường dẫn</h5>
                            <div class="d-flex flex-wrap col-12">
                                <div class="info col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                    <div class="form-group mt-3 mb-0">
                                        <input name="id" class="d-none" value="{{$short_url->id}}">
                                        <label class="text-primary">LOẠI</label>
                                        <select name="type" class="form-control" disabled id="type">
                                            @foreach(\App\Admin\Models\ShortUrl::type as $key => $item)
                                                <option
                                                    value="{{$key}}" {{$short_url->type == $key ? 'selected':''}}>{{$item}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mt-3 mb-0">
                                        <label>URL KEY</label>
                                        <input type="text" name="url_key" class="form-control" value="{{$short_url->url_key}}">
                                        @error('url_key')
                                        <span class="invalid-feedback d-block text-error">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="info col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                    <div class="form-group mt-3 mb-0">
                                        <label>REDIRECT</label>
                                        <input type="text" name="redirect_url" class="form-control"
                                               value="{{$short_url->redirect_url}}">
                                    </div>
                                    <div class="form-group mt-3 mb-0">
                                        <label>URL DEFAULT</label>
                                        <input type="text" name="default_short_url" class="form-control" readonly
                                               value="{{$short_url->default_short_url}}">
                                    </div>
                                </div>
                                <div class="info col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                    <div class="form-group mt-3 mb-0">
                                        <label>ACTIVATED AT</label>
                                        <input type="datetime-local" name="activated_at" class="form-control"
                                               value="{{$short_url->activated_at}}">
                                    </div>
                                    <div class="form-group mt-3 mb-0">
                                        <label>DEACTIVATED AT</label>
                                        <input type="datetime-local" name="deactivated_at" class="form-control"
                                               value="{{$short_url->deactivated_at}}">
                                    </div>
                                </div>
                            </div>
                            <div class="widget-footer text-right mr-4 mt-4">
                                <button class="btn btn-primary btn-update mr-2" type="submit" onclick="enableSelect()">Cập nhật</button>
                                <a href="{{route('admin.short_url.index')}}" type="button"
                                   class="btn btn-outline-primary">Quay lại</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Body Ends -->
    @endcan
@endsection
@section('css')
    <link href="{{asset('css/admin/select2.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/form-widgets.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('js')
    <script src="{{asset('js/admin/select2.min.js')}}"></script>
    <script src="{{asset('js/admin/custom-select2.js')}}"></script>
    <script>
        $(document).ready(function () {
            $(document).on('keydown','input[name="url_key"]',function(){
                var slug_url = slug($(this).val());
                $('input[name="url_key"]').val(slug_url);
                var route = "{{route('home')}}"+'/'+slug_url;
                $('input[name="default_short_url"]').val(route);
            });

            /** hàm chuyển chữ sang slug */
            function slug(str){
                // Chuyển hết sang chữ thường
                str = str.toLowerCase();
                // xóa dấu
                str = str.replace(/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/g, 'a');
                str = str.replace(/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/g, 'e');
                str = str.replace(/(ì|í|ị|ỉ|ĩ)/g, 'i');
                str = str.replace(/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/g, 'o');
                str = str.replace(/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/g, 'u');
                str = str.replace(/(ỳ|ý|ỵ|ỷ|ỹ)/g, 'y');
                str = str.replace(/(đ)/g, 'd');
                // Xóa khoảng trắng thay bằng ký tự -
                str = str.replace(/(\s+)/g, '-');
                return str;
            }
        })
    </script>
@endsection
