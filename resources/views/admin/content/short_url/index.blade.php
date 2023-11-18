@extends('admin.layouts.base')
@section('body')
    @can('viewAny', \App\Admin\Models\ShortUrl::class)
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
                                        <a href="{{route('admin.short_url.index')}}">Danh sách đường dẫn</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </li>
                </ul>
            </header>
        </div>
        <div class="layout-px-spacing">
            <div class="row layout-spacing layout-top-spacing">
                <div class="col-lg-12">
                    <div class="statbox widget box box-shadow mb-4 py-2">
                        <div class="general-info box-info-profile ecommerce-table">
                            <div class="widget-heading m-0 d-flex justify-content-between align-center">
                                <h5>Danh sách đường dẫn</h5>
                                <div class="d-flex justify-content-sm-end justify-content-center contact-options">
                                    @can('create', \App\Admin\Models\ShortUrl::class)
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
                            @include('admin.content.alerts.message')
                            <div class="row mt-2">
                                <form method="get" action="{{route('admin.short_url.index')}}"
                                      enctype="multipart/form-data"
                                      class="col-12 d-flex justify-content-between flex-wrap align-center">
                                    <div
                                        class="col-xl-4 col-lg-4 col-md-6 col-sm-12 filtered-list-search align-self-center p-0">
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
                                            class="d-flex justify-content-sm-end justify-content-center align-center contact-options">
                                            <div class="form-inline my-2 my-lg-0">
                                                <select name="limit"
                                                        class="btn btn-outline-primary btn-sm h-auto p-2 mr-2 text-left"
                                                        onchange="this.form.submit()">
                                                    <option
                                                        value="{{\App\Admin\Http\Helpers\Common::page_limit()}}" {{request()->input('limit') == \App\Admin\Http\Helpers\Common::page_limit() ? 'selected':''}}>
                                                        {{\App\Admin\Http\Helpers\Common::page_limit()?\App\Admin\Http\Helpers\Common::page_limit():10}}
                                                    </option>
                                                    <option
                                                        value="30" {{request()->input('limit') == 30?'selected':''}}>
                                                        30
                                                    </option>
                                                    <option
                                                        value="50" {{request()->input('limit') == 50?'selected':''}}>
                                                        50
                                                    </option>
                                                    <option
                                                        value="100" {{request()->input('limit') == 100?'selected':''}}>
                                                        100
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-inline my-2 my-lg-0">
                                                <select name="type"
                                                        class="btn btn-outline-primary btn-sm h-auto p-2 mr-2 text-left"
                                                        onchange="this.form.submit()">
                                                    <option value="">Tất cả</option>
                                                    @foreach(\App\Admin\Models\ShortUrl::type as $key => $name)
                                                        <option value="{{$key}}">{{$name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="widget-content date-table-container mt-1 table-responsive">
                                <table id="customers" class="table table-hover dataTable">
                                    <thead>
                                    <tr>
                                        <th class="text-center">STT</th>
                                        <th class="text-center">URL KEY</th>
                                        <th class="text-center">URL DEFAULT</th>
                                        <th class="text-center">REDIRECT</th>
                                        <th class="text-center">LOẠI</th>
                                        <th class="text-center">TRẠNG THÁI</th>
                                        <th class="text-center">CHỨC NĂNG</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($short_url as $item)
                                        <tr id="row_{{$item->id}}">
                                            <td class="text-center">{{ ($short_url->currentPage() - 1) * $short_url->perPage() + $loop->iteration }}</td>
                                            <td class="text-left">
                                                <p class="m-0 font-weight-bold">
                                                    {{ ($item->Product && $item->type == 1 ? $item->Product->name : '') . ($item->Post && $item->type == 2 ? $item->Post->name : '') }}
                                                </p>
                                                <p class="m-0">{{$item->url_key}}</p>
                                            </td>
                                            <td class="text-left">
                                                <p class="m-0 font-weight-bold">{{$item->default_short_url}}</p>
                                            </td>
                                            <td class="text-left">
                                                <p class="m-0 font-weight-bold">{{$item->redirect_url}}</p>
                                            </td>
                                            <td class="text-center">
                                                @foreach(\App\Admin\Models\ShortUrl::type as $key => $name)
                                                    @if($key == $item->type){{$name}}@endif
                                                @endforeach
                                            </td>
                                            <td class="text-left">
                                                <p class="m-0">Bắt đầu: {{$item->activated_at ? date('d-m-Y h:s A', strtotime($item->activated_at)):''}}</p>
                                                <p class="m-0">Kết thúc: {{$item->deactivated_at ? date('d-m-Y h:s A', strtotime($item->deactivated_at)):''}}</p>
                                            </td>
                                            <td class="text-center">
                                                @can('update', \App\Admin\Models\ShortUrl::class)
                                                    <a href="{{route('admin.short_url.edit',['id' => $item->id])}}" title="Sửa" class="bs-tooltip font-20 text-primary mr-2">
                                                        <i class="las la-edit"></i>
                                                    </a>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {!! $short_url->links('admin.layouts.pagination') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.content.short_url.delete')
    @endcan
@endsection
@section('css')
    <!-- Page Level Plugin/Style Starts -->
    <link href="{{asset('css/admin/dt-global_style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/select2.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/custom-switch.css')}}" rel="stylesheet" type="text/css">
    <!-- Page Level Plugin/Style Ends -->
@endsection
@section('js')
    <script src="{{asset('js/admin/select2.min.js')}}"></script>
    <script src="{{asset('js/admin/custom-select2.js')}}"></script>
@endsection
