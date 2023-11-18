@extends('admin.layouts.base')
@section('body')
    @can('viewAny', \App\Admin\Models\Role::class)
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
                                        <a href="{{route('admin.roles.index')}}">Quyền quản trị</a></li>
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
                                <div class="widget ecommerce-table">
                                    <div class="widget-heading mb-2 d-flex flex-wrap">
                                        <h5>Danh sách vai trò người dùng</h5>
                                        <div
                                            class="d-flex justify-content-sm-end justify-content-center contact-options">
                                            @can('create', \App\Admin\Models\Role::class)
                                                <a class="pointer s-o mr-2 bs-tooltip"
                                                   href="{{route('admin.roles.create')}}" title="Thêm mới">
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
                                    <div class="statbox col-12 px-0">
                                        <div class="widget-content normal-tab pt-0">
                                            <ul class="nav nav-tabs mb-2 mt-2" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#active-tab"
                                                   role="tab" aria-controls="active" aria-selected="true">Sử
                                                    dụng</a>
                                            </li>
                                            <li class="nav-item ">
                                                <a class="nav-link" data-toggle="tab" href="#disable-tab"
                                                   role="tab" aria-controls="disable" aria-selected="false">Không sử
                                                    dụng</a>
                                            </li>
                                        </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane fade show active pt-0" id="active-tab"
                                                     role="tabpanel" aria-labelledby="active-tab">
                                                    <div
                                                        class="col-12 filtered-list-search align-self-center mb-2 p-0 d-flex justify-content-start align-items-center">
                                                        <div class="d-flex justify-content-sm-end justify-content-center contact-options">
                                                            @can('delete', \App\Admin\Models\Role::class)
                                                                <a class="pointer s-o ml-4 font-25 text-danger bs-tooltip btn-multiple-delete multiple-destroy d-none" href="javascript:void(0);" title="Xóa nhiều"
                                                                   data-toggle="modal" data-target="#modal-multipledelete">
                                                                    <i class="las la-trash-alt"></i>
                                                                </a>
                                                            @endcan
                                                        </div>
                                                        <form method="get"
                                                              action="{{route('admin.roles.index')}}"
                                                              class="form-inline my-2 my-lg-0 justify-content-end col-xl-4 col-lg-4 col-md-6 col-sm-6 px-0 mx-3">
                                                            <i class="las la-search toggle-search"></i>
                                                            <input
                                                                class="form-control search-form-control ml-lg-auto pr-3"
                                                                type="search" placeholder="Tìm kiếm"
                                                                name="search"
                                                                value="{{request()->input('search')}}">
                                                        </form>
                                                    </div>
                                                    <div class="widget-content">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover" id="table-role">
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
                                                                        <div class="th-content text-center">Tên Vai
                                                                            Trò
                                                                        </div>
                                                                    </th>
                                                                    <th>
                                                                        <div class="th-content text-center">Mô Tả
                                                                        </div>
                                                                    </th>
                                                                    <th>
                                                                        <div class="th-content text-center">Thông
                                                                            tin
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
                                                                @foreach($roles as $item)
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
                                                                        </td>
                                                                        <td class="text-left py-2">
                                                                            {{$item->describe}}
                                                                        </td>
                                                                        <td class="text-left py-2">
                                                                            <p class="m-0">Ngày
                                                                                tạo: {{date_format($item->created_at,"d-m-Y H:i A")}}</p>
                                                                            <p class="m-0">Cập nhật lần
                                                                                cuối: {{date_format($item->updated_at,"d-m-Y H:i A")}}</p>
                                                                        </td>
                                                                        <td class="text-center py-2">
                                                                            <div
                                                                                class="d-flex justify-content-center">
                                                                                @can('view', \App\Admin\Models\Role::class)
                                                                                    <a href="javascript:void(0);"
                                                                                       class="bs-tooltip font-20 text-primary btn-show"
                                                                                       title="Chi tiết"
                                                                                       data-toggle="modal"
                                                                                       data-target="#modal-show"
                                                                                       data-value="{{$item->id}}">
                                                                                        <i class="lar la-eye"></i>
                                                                                    </a>
                                                                                @endcan
                                                                                @can('update', \App\Admin\Models\Role::class)
                                                                                    <a href="{{route('admin.roles.edit',['id' => $item->id])}}"
                                                                                       class="bs-tooltip font-20 text-primary ml-2"
                                                                                       title="Sửa">
                                                                                        <i class="las la-edit"></i>
                                                                                    </a>
                                                                                @endcan
                                                                                @can('delete', \App\Admin\Models\Role::class)
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
                                                        {!! $roles->links('admin.layouts.pagination') !!}
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade pt-0" id="disable-tab" role="tabpanel"
                                                     aria-labelledby="disable-tab">
                                                    <div class="widget-content">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover" id="table-role-trashed">
                                                                <thead>
                                                                <tr>
                                                                    <th>
                                                                        <div class="th-content text-center">Tên Vai
                                                                            Trò
                                                                        </div>
                                                                    </th>
                                                                    <th>
                                                                        <div class="th-content text-center">Mô Tả
                                                                        </div>
                                                                    </th>
                                                                    <th>
                                                                        <div class="th-content text-center">Thông
                                                                            tin
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
                                                                @foreach($rolesTrashed as $item)
                                                                    <tr id="row_{{$item->id}}">
                                                                        <td class="text-left">
                                                                            {{$item->name}}
                                                                        </td>
                                                                        <td class="text-left">
                                                                            {{$item->describe}}
                                                                        </td>
                                                                        <td class="text-left">
                                                                            <p class="m-0">Ngày
                                                                                tạo: {{date_format($item->created_at,"d-m-Y H:i A")}}</p>
                                                                            <p class="m-0">Cập nhật lần cuối: {{date_format($item->updated_at,"d-m-Y H:i A")}}</p>
                                                                        </td>
                                                                        <td>
                                                                            <div
                                                                                class="d-flex justify-content-center">
                                                                                @can('view', \App\Admin\Models\Role::class)
                                                                                    <a href="javascript:void(0);"
                                                                                       class="bs-tooltip font-20 text-primary btn-show"
                                                                                       title="Chi tiết"
                                                                                       data-toggle="modal"
                                                                                       data-target="#modal-show"
                                                                                       data-value="{{$item->id}}">
                                                                                        <i class="lar la-eye"></i>
                                                                                    </a>
                                                                                @endcan
                                                                                @can('restore', \App\Admin\Models\Role::class)
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
                                                        {!! $rolesTrashed->links('admin.layouts.pagination') !!}
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
        @include('admin.content.role.delete')
        @include('admin.content.role.delete_multiple')
        @include('admin.content.role.restore')
        @include('admin.content.role.show')
        @include('admin.content.role.template_trashed')
        @include('admin.content.role.template_restore')
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
                    async:false,
                    url: "{{ route('admin.roles.destroy') }}",
                    method: "POST",
                    data: input,
                    dataType: "json",
                    success: function (output) {
                        if (output.success) {
                            $('#row_' + id).remove();
                            $('.tooltip').hide();
                            var template_trashed = $('#template_trashed').html();
                            var tmp = $(template_trashed).clone();
                            $(tmp).attr('id', 'row_' + output.role.id);
                            $(tmp).find('.role-name').html(output.role.name);
                            $(tmp).find('.role-email').html(output.role.email);
                            var created_at = new Date(output.role.created_at);
                            $(tmp).find('.role-created-at').html('Ngày tạo: '+created_at.toLocaleString());
                            var updated_at = new Date(output.role.updated_at);
                            $(tmp).find('.role-updated-at').html('Cập nhật lần cuối: '+updated_at.toLocaleString());
                            $(tmp).find('.btn-show').attr('data-value', output.role.id);
                            $(tmp).find('.btn-restore').attr('data-value', output.role.id);
                            $('#table-role-trashed tbody').append(tmp);
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
                if(arr.length > 0){
                    var input = {
                        arr: arr,
                    }
                    $.ajax({
                        async:false,
                        url: "{{ route('admin.roles.destroys') }}",
                        method: "POST",
                        data: input,
                        dataType: "json",
                        success: function (output) {
                            if (output.success) {
                                arr.forEach(function (id) {
                                    $('#row_' + id).remove();
                                });
                                if($('#cbxall').is(':checked')){
                                    $('#cbxall')[0].checked = false;
                                };
                                if(!$('.multiple-destroy').hasClass('d-none')){
                                    $('.multiple-destroy').addClass('d-none');
                                }
                                $('.tooltip').hide();
                                var template_trashed = $('#template_trashed').html();
                                $.each(output.roles, function () {
                                    var tmp = $(template_trashed).clone();
                                    $(tmp).attr('id', 'row_' + this.id);
                                    $(tmp).find('.role-name').html(this.name);
                                    $(tmp).find('.role-email').html(this.email);
                                    var created_at = new Date(this.created_at);
                                    $(tmp).find('.role-created-at').html('Ngày tạo: '+created_at.toLocaleString());
                                    var updated_at = new Date(this.updated_at);
                                    $(tmp).find('.role-updated-at').html('Cập nhật lần cuối: '+updated_at.toLocaleString());
                                    $(tmp).find('.btn-show').attr('data-value', this.id);
                                    $(tmp).find('.btn-restore').attr('data-value', this.id);
                                    $('#table-role-trashed tbody').append(tmp);
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
                var url = "{{ route('admin.roles.restore') }}";
                var input = {
                    id: id,
                }
                $.ajax({
                    async:false,
                    url: url,
                    method: "POST",
                    data: input,
                    dataType: "json",
                    success: function (output) {
                        if (output.success) {
                            $('#row_' + id).remove();
                            $('.tooltip').hide();
                            var template_restore = $('#template_restore').html();
                            var tmp = $(template_restore).clone();
                            $(tmp).attr('id', 'row_' + output.role.id);
                            $(tmp).find('input[name="cbx[]"]').val(output.role.id);
                            $(tmp).find('input[name="cbx[]"]').attr('id', 'cbx' + output.role.id);
                            $(tmp).find('label .cbx').attr('for', 'cbx' + output.role.id);
                            $(tmp).find('.role-name').html(output.role.name);
                            $(tmp).find('.role-describe').html(output.role.describe);
                            var created_at = new Date(output.role.created_at);
                            $(tmp).find('.role-created-at').html('Ngày tạo: '+created_at.toLocaleString());
                            var updated_at = new Date(output.role.updated_at);
                            $(tmp).find('.role-updated-at').html('Cập nhật lần cuối: '+updated_at.toLocaleString());
                            $(tmp).find('.btn-show').attr('data-value', output.role.id);
                            $(tmp).find('.btn-delete').attr('data-value', output.role.id);
                            var url_edit = "{{route('admin.roles.edit',['id' => 'id_edit'])}}";
                            url_edit = url_edit.replace('id_edit', output.role.id);
                            $(tmp).find('.btn-edit').attr('href', url_edit);
                            $('#table-role tbody').append(tmp);
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
                if(selected.length >0){
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

            /** Xem */
            $(document).on('click','.btn-show', function () {
                $('input[name="permissions[]"]').each(function () {
                    this.checked = false;
                });
                var id = $(this).attr('data-value');
                var data = {
                    id:id,
                }
                $.ajax({
                    url: "{{route('admin.roles.show')}}",
                    method: "POST",
                    data: data,
                    dataType: "json",
                    success: function (data) {
                        if(data.success){
                            $('input[name="permissions[]"]').each(function () {
                                var arr = data.PermissionRoleRelationships;
                                var id = parseInt($(this).val());
                                if($.inArray(id,arr) !== -1){
                                    this.checked = true;
                                }
                            })
                        }
                    }
                })
            })
        });
    </script>
@endsection
