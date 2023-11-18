@extends('admin.layouts.base')
@section('body')
    @can('viewAny', \App\Admin\Models\User::class)
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
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Quản lý người dùng</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <a href="{{route('admin.users.index')}}">Người dùng</a>
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
                    <div class="widget-content searchable-container grid">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                                <div class="widget ecommerce-table py-2">
                                    <div class="widget-heading d-flex flex-wrap m-0">
                                        <h5>Danh sách người dùng</h5>
                                        <div class="d-flex justify-content-sm-end justify-content-center contact-options">
                                            @can('create', \App\Admin\Models\User::class)
                                                <a class="pointer s-o mr-2 bs-tooltip" href="{{route('admin.users.create')}}" title="Thêm mới">
                                                    <i class="las la-plus-circle"></i>
                                                </a>
                                            @endcan
                                            <a class="pointer s-o mr-2 bs-tooltip"  title="reload" onClick="window.location.reload();">
                                                <i class="las la-sync-alt"></i>
                                            </a>
                                        </div>
                                    </div>
                                    @include('admin.content.alerts.message')
                                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing px-0">
                                        <div class="statbox">
                                            <div class="widget-content normal-tab pt-0 px-0">
                                                <ul class="nav nav-tabs mb-2 mt-2 px-0" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-toggle="tab" href="#active-tab"
                                                           role="tab" aria-controls="active" aria-selected="true">Sử
                                                            dụng</a>
                                                    </li>
                                                    <li class="nav-item ">
                                                        <a class="nav-link" data-toggle="tab" href="#disable-tab"
                                                           role="tab" aria-controls="disable" aria-selected="false">Không
                                                            sử
                                                            dụng</a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane fade show active pt-0" id="active-tab"
                                                         role="tabpanel" aria-labelledby="active-tab">
                                                        <div class="row mb-2">
                                                            <div class="d-flex justify-content-sm-end justify-content-center contact-options">
                                                                @can('delete', \App\Admin\Models\User::class)
                                                                    <a class="pointer s-o ml-2 font-25 text-danger bs-tooltip btn-multiple-delete multiple-destroy d-none" href="javascript:void(0);" title="Xóa nhiều"
                                                                       data-toggle="modal" data-target="#modal-multipledelete">
                                                                        <i class="las la-trash-alt"></i>
                                                                    </a>
                                                                @endcan
                                                            </div>
                                                            <form method="get" action="{{route('admin.users.index')}}"  enctype="multipart/form-data"
                                                                  class="col-12 d-flex justify-content-between flex-wrap align-center">
                                                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12  filtered-list-search align-self-center p-0">
                                                                    <div class="box-search form-inline my-2 my-lg-0 justify-content-end col-12 px-0 m-0">
                                                                        <i class="las la-search toggle-search"></i>
                                                                        <input class="form-control w-100 search-form-control ml-lg-auto pr-3"
                                                                            type="search" placeholder="Tìm kiếm" name="search"
                                                                            value="{{request()->input('search')}}">
                                                                    </div>
                                                                </div>
                                                                <div class="text-sm-right text-center align-self-center">
                                                                    <div
                                                                        class="d-flex justify-content-sm-end justify-content-center align-center contact-options">
                                                                        <div class="form-inline my-2 my-lg-0">
                                                                            <select name="role"
                                                                                    class="btn btn-outline-primary btn-sm h-auto p-2 mr-2 text-left"
                                                                                    onchange="this.form.submit()">
                                                                                <option
                                                                                    value="" {{request()->input('role') == '' ? 'selected':''}}>
                                                                                    Vai trò
                                                                                </option>
                                                                                @foreach($roles as $item)
                                                                                    <option
                                                                                        value="{{$item->id}}" {{request()->input('role') == $item->id ? 'selected':''}}>{{$item->name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-inline my-2 my-lg-0">
                                                                            <select name="sort_by"
                                                                                    class="btn btn-outline-primary btn-sm h-auto p-2 mr-2 text-left"
                                                                                    onchange="this.form.submit()">
                                                                                <option value="" {{request()->input('sort_by') == '' ? 'selected':''}}>Sắp xếp</option>
                                                                                    <option value="admin" {{request()->input('sort_by') == 'admin' ? 'selected':''}}>Quản trị viên</option>
                                                                                    <option value="user" {{request()->input('sort_by') == 'user' ? 'selected':''}}>Người dùng</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="widget-content">
                                                            <div class="table-responsive">
                                                                <table class="table table-hover" id="table-user">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>
                                                                            <div class="th-content text-center">
                                                                                <div class="login-one-inputs check">
                                                                                    <input class="inp-cbx d-none"
                                                                                           id="cbxall"
                                                                                           type="checkbox">
                                                                                    <label class="cbx" for="cbxall">
                                                                        <span>
                                                                            <svg width="12px" height="10px"
                                                                                 viewBox="0 0 12 10">
                                                                                <polyline
                                                                                    points="1.5 6 4.5 9 10.5 1"></polyline>
                                                                            </svg>
                                                                        </span>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </th>
                                                                        <th>
                                                                            <div class="th-content text-center">Tên
                                                                                người dùng
                                                                            </div>
                                                                        </th>
                                                                        <th>
                                                                            <div class="th-content text-center">Email
                                                                            </div>
                                                                        </th>
                                                                        <th>
                                                                            <div class="th-content text-center">Thời
                                                                                gian tạo
                                                                            </div>
                                                                        </th>
                                                                        <th>
                                                                            <div class="th-content text-center">Đăng
                                                                                nhập lần cuối
                                                                            </div>
                                                                        </th>
                                                                        <th>
                                                                            <div class="th-content text-center">IP đăng
                                                                                nhập
                                                                            </div>
                                                                        </th>
                                                                        <th>
                                                                            <div class="th-content text-center">Chức
                                                                                Năng
                                                                            </div>
                                                                        </th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @foreach($users as $item)
                                                                        <tr id="row_{{$item->id}}">
                                                                            <td class="text-center py-2">
                                                                                <div class="login-one-inputs check">
                                                                                    <input class="inp-cbx d-none"
                                                                                           id="cbx{{$item->id}}"
                                                                                           type="checkbox" name="cbx[]"
                                                                                           value="{{$item->id}}">
                                                                                    <label class="cbx"
                                                                                           for="cbx{{$item->id}}">
                                                                                        <span>
                                                                                            <svg width="12px"
                                                                                                 height="10px"
                                                                                                 viewBox="0 0 12 10">
                                                                                               <polyline
                                                                                                   points="1.5 6 4.5 9 10.5 1"></polyline>
                                                                                            </svg>
                                                                                        </span>
                                                                                    </label>
                                                                                </div>
                                                                            </td>
                                                                            <td class="text-left py-2">
                                                                                {{$item->name}}
                                                                                @if($item->is_admin == 1)<i class="las la-thumbtack"></i>@endif
                                                                            </td>
                                                                            <td class="text-left py-2">
                                                                                {{$item->email}}
                                                                            </td>
                                                                            <td class="text-left py-2">
                                                                                {{date("d-m-Y H:s A",strtotime($item->created_at))}}
                                                                            </td>
                                                                            <td class="text-left py-2">
                                                                                {{date("d-m-Y H:s A",strtotime($item->last_login_at))}}
                                                                            </td>
                                                                            <td class="text-left py-2">
                                                                                {{$item->last_login_ip}}
                                                                            </td>
                                                                            <td class="text-center py-2">
                                                                                <div
                                                                                    class="d-flex justify-content-center">
                                                                                    @can('update', \App\Admin\Models\User::class)
                                                                                        <a href="{{route('admin.users.edit',['id' => $item->id])}}"
                                                                                           class="bs-tooltip font-20 text-primary ml-2"
                                                                                           title="Sửa">
                                                                                            <i class="las la-edit"></i>
                                                                                        </a>
                                                                                    @endcan
                                                                                    @can('delete', \App\Admin\Models\User::class)
                                                                                        <a href="javascript:void(0);"
                                                                                           class="bs-tooltip font-20 text-danger ml-2 btn-delete"
                                                                                           title="Xóa"
                                                                                           data-toggle="modal"
                                                                                           data-target="#modal-delete"
                                                                                           data-value="{{$item->id}}">
                                                                                            <i class="las la-trash-alt"></i>
                                                                                        </a>
                                                                                    @endcan
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            {!! $users->links('admin.layouts.pagination') !!}
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade pt-0" id="disable-tab" role="tabpanel"
                                                         aria-labelledby="disable-tab">
                                                        <div class="widget-content">
                                                            <div class="table-responsive">
                                                                <table class="table table-hover" id="table-user-trashed">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>
                                                                            <div class="th-content text-center">Tên
                                                                                người dùng
                                                                            </div>
                                                                        </th>
                                                                        <th>
                                                                            <div class="th-content text-center">Email
                                                                            </div>
                                                                        </th>
                                                                        <th>
                                                                            <div class="th-content text-center">Thời
                                                                                gian tạo
                                                                            </div>
                                                                        </th>
                                                                        <th>
                                                                            <div class="th-content text-center">Đăng
                                                                                nhập lần cuối
                                                                            </div>
                                                                        </th>
                                                                        <th>
                                                                            <div class="th-content text-center">IP đăng
                                                                                nhập
                                                                            </div>
                                                                        </th>
                                                                        <th>
                                                                            <div class="th-content text-center">Chức
                                                                                Năng
                                                                            </div>
                                                                        </th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @foreach($usersTrashed as $item)
                                                                        <tr id="row_{{$item->id}}">
                                                                            <td class="text-left py-2">
                                                                                {{$item->name}}
                                                                            </td>
                                                                            <td class="text-left py-2">
                                                                                {{$item->email}}
                                                                            </td>
                                                                            <td class="text-left py-2">
                                                                                {{date("d-m-Y H:s A",strtotime($item->created_at))}}
                                                                            </td>
                                                                            <td class="text-left py-2">
                                                                                {{date("d-m-Y H:s A",strtotime($item->last_login_at))}}
                                                                            </td>
                                                                            <td class="text-left py-2">
                                                                                {{$item->last_login_ip}}
                                                                            </td>
                                                                            <td>
                                                                                <div
                                                                                    class="d-flex justify-content-center">
                                                                                    @can('restore', \App\Admin\Models\User::class)
                                                                                        <a href="javascript:void(0);"
                                                                                           class="bs-tooltip font-20 text-success ml-2 btn-restore"
                                                                                           title="Khôi phục"
                                                                                           data-toggle="modal"
                                                                                           data-target="#modal-restore"
                                                                                           data-value="{{$item->id}}">
                                                                                            <i class="las la-sync"></i>
                                                                                        </a>
                                                                                    @endcan
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            {!! $usersTrashed->links('admin.layouts.pagination') !!}
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
                </div>
            </div>
        </div>
        @include('admin.content.users.delete')
        @include('admin.content.users.deleteMultiple')
        @include('admin.content.users.restore')
        @include('admin.content.users.template_restore')
        @include('admin.content.users.template_trashed')
    @endcan
@endsection
@section('css')
    <!-- Page Level Plugin/Style Starts -->
    <!-- Page Level Plugin/Style Ends -->
@endsection
@section('js')
    <!-- Page Level Plugin/Script Starts -->
    <!-- Page Level Plugin/Script Ends -->
    <script>
        $(document).ready(function () {
            /** Xóa */
            $(document).on('click', '#destroy', function () {
                var id = $(this).attr('data-value');
                var input = {
                    id: id,
                }
                $.ajax({
                    async: false,
                    url: "{{ route('admin.users.destroy') }}",
                    method: "POST",
                    data: input,
                    dataType: "json",
                    success: function (output) {
                        if (output.success) {
                            $('#row_' + id).remove();
                            $('.tooltip').hide();
                            var template_trashed = $('#template_trashed').html();
                            var tmp = $(template_trashed).clone();
                            $(tmp).attr('id', 'row_' + output.user.id);
                            $(tmp).find('.user-name').html(output.user.name);
                            $(tmp).find('.user-email').html(output.user.email);
                            var created_at = new Date(output.user.created_at);
                            $(tmp).find('.user-created-at').html(created_at.toLocaleString());
                            var last_login_at = new Date(output.user.last_login_at);
                            $(tmp).find('.user-last-login-at').html(last_login_at.toLocaleString());
                            $(tmp).find('.user-login-ip').html(output.user.last_login_ip);
                            $(tmp).find('.btn-restore').attr('data-value', output.user.id);
                            $('#table-user-trashed tbody').append(tmp);
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
            /** Xóa nhiều*/
            $(document).on('click', '#multiple-destroy', function () {
                var selected = $(this).attr('data-value');
                var arr = selected.toString().split(",");
                var url = "{{ route('admin.users.destroys') }}";
                if (arr.length > 0) {
                    var input = {
                        arr: arr,
                    }
                    $.ajax({
                        async: false,
                        url: url,
                        method: "POST",
                        data: input,
                        dataType: "json",
                        success: function (output) {
                            if (output.success) {
                                arr.forEach(function (id) {
                                    if(id != "{{\Illuminate\Support\Facades\Auth::id()}}"){
                                        $('#row_' + id).remove();
                                    }
                                });
                                if ($('#cbxall').is(':checked')) {
                                    $('#cbxall')[0].checked = false;
                                }
                                ;
                                if (!$('.multiple-destroy').hasClass('d-none')) {
                                    $('.multiple-destroy').addClass('d-none');
                                }
                                $('.tooltip').hide();
                                var template_trashed = $('#template_trashed').html();
                                $.each(output.users, function () {
                                    var tmp = $(template_trashed).clone();
                                    $(tmp).attr('id', 'row_' + this.id);
                                    $(tmp).find('.user-name').html(this.name);
                                    $(tmp).find('.user-email').html(this.email);
                                    var created_at = new Date(this.created_at);
                                    $(tmp).find('.user-created-at').html(created_at.toLocaleString());
                                    var last_login_at = new Date(this.last_login_at);
                                    $(tmp).find('.user-last-login-at').html(last_login_at.toLocaleString());
                                    $(tmp).find('.user-login-ip').html(this.last_login_ip);
                                    $(tmp).find('.btn-restore').attr('data-value', this.id);
                                    $('#table-user-trashed tbody').append(tmp);
                                });

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
                }
            });
            /** Khôi phục */
            $(document).on('click', '#restore', function () {
                var id = $(this).attr('data-value');
                var input = {
                    id: id,
                }
                $.ajax({
                    async: false,
                    url: "{{ route('admin.users.restore') }}",
                    method: "POST",
                    data: input,
                    dataType: "json",
                    success: function (output) {
                        if (output.success) {
                            $('#row_' + id).remove();
                            $('.tooltip').hide();
                            var template_restore = $('#template_restore').html();
                            var tmp = $(template_restore).clone();
                            $(tmp).attr('id', 'row_' + output.user.id);
                            $(tmp).find('input[name="cbx[]"]').val(output.user.id);
                            $(tmp).find('input[name="cbx[]"]').attr('id', 'cbx' + output.user.id);
                            $(tmp).find('label .cbx').attr('for', 'cbx' + output.user.id);
                            $(tmp).find('.user-name').html(output.user.name);
                            $(tmp).find('.user-email').html(output.user.email);
                            var created_at = new Date(output.user.created_at);
                            $(tmp).find('.user-created-at').html(created_at.toLocaleString());
                            var last_login_at = new Date(output.user.last_login_at);
                            $(tmp).find('.user-last-login-at').html(last_login_at.toLocaleString());
                            $(tmp).find('.user-login-ip').html(output.user.last_login_ip);
                            $(tmp).find('.btn-delete').attr('data-value', output.user.id);
                            var url_edit = "{{route('admin.users.edit',['id' => 'id_edit'])}}";
                            url_edit = url_edit.replace('id_edit', output.user.id);
                            $(tmp).find('.btn-edit').attr('href', url_edit);
                            $('#table-user tbody').append(tmp);
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

            /** Đổ dữ liệu vào modal xóa nhiều*/
            $(document).on('click', 'input[name="cbx[]"] , #cbxall', function () {
                var selected = [];
                $('input[name="cbx[]"]').each(function () {
                    if ($(this).is(':checked')) {
                        selected.push($(this).val());
                    }
                });
                if (selected.length > 0) {
                    if($('.multiple-destroy').hasClass('d-none')){
                        $('.multiple-destroy').removeClass('d-none');
                    }
                    $('.multiple-destroy').attr('data-value', selected.toString());
                }
                else{
                    if(!$('.multiple-destroy').hasClass('d-none')){
                        $('.multiple-destroy').addClass('d-none');
                    }
                    $('.multiple-destroy').attr('data-value','');
                }
            });
        });
    </script>
@endsection
