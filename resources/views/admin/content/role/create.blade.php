@extends('admin.layouts.base')
@section('body')
    @can('create', \App\Admin\Models\Role::class)
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
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Quản lý người dừng</a></li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        <a href="{{route('admin.roles.index')}}">Quyền quản trị</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <a href="{{route('admin.roles.create')}}">Thêm mới</a>
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
                    <div class="">
                        <div class="widget-content searchable-container grid">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing layout-spacing">
                                    <div class="widget ecommerce-table">
                                        <div class="widget-heading">
                                            <h5 class="">Thêm vai trò người dùng</h5>
                                            <div class="align-items-center contact-options">
                                                <a href="javascript:void(0);" class="pointer s-o mr-2 bs-tooltip" title="reload" onclick="window.location.reload()"><i class="las la-sync-alt"></i></a>
                                            </div>
                                        </div>
                                        <div class="layout-spacing">
                                            <form action="{{route('admin.roles.store')}}" method="post">
                                                @csrf
                                            <div class="statbox general-info">
                                                <div class="widget-content">
                                                    <div class="info col-xl-4 col-lg-4 col-md-4 col-sm-12 px-0">
                                                        <div class="form-group">
                                                            <label class="text-dark">Tên vai trò (<span
                                                                    class="text-danger">*</span>)</label>
                                                            <input type="search" class="form-control mb-2" name="name"
                                                                   value="{{old('name')}}">
                                                            @error('name')
                                                            <div class="invalid-feedback d-block"> {{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="text-dark">Mô tả</label>
                                                            <textarea class="form-control mb-2" name="describe" rows="1">{{old('describe')}}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 px-0">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered mb-4">
                                                            <thead>
                                                            <tr>
                                                                <th class="text-center"><h6>Tính năng</h6></th>
                                                                <th class="text-center"><h6>Quyền</h6></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach ($permissionParents as $itemParent)
                                                                <tr>
                                                                    <td>
                                                                        <p class="inline-block"><h6>{{ $itemParent->name }}</h6></p>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex flex-wrap align-items-center">
                                                                        @foreach ($itemParent->permissionChilds as $item)
                                                                            <div class="form-check my-1 text-nowrap">
                                                                                <input class="inp-cbx d-none" type="checkbox" name="permissions[]"
                                                                                       id="cbx{{ $item->id }}" value="{{$item->id}}">
                                                                                <label class="cbx" for="cbx{{$item->id}}">
                                                                                        <span>
                                                                                            <svg width="12px" height="10px"
                                                                                                 viewBox="0 0 12 10">
                                                                                               <polyline
                                                                                                   points="1.5 6 4.5 9 10.5 1"></polyline>
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
                                                <div class="widget-footer text-right mr-4">
                                                    <button type="submit" class="btn btn-primary mr-2">Thêm mới</button>
                                                    <a href="{{route('admin.roles.index')}}" type="button" class="btn btn-outline-primary">Hủy</a>
                                                </div>
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
    @endcan
@endsection
