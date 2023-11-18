@extends('admin.layouts.base')
@section('body')
    @can('update', \App\Admin\Models\User::class)
        <div class="sub-header-container">
            <header class="d-flex justify-content-between">
                <div class="navbar navbar-expand-sm">
                    <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
                        <i class="las la-bars"></i>
                    </a>
                    <ul class="navbar-nav flex-row">
                        <li>
                            <div class="page-header">
                                <nav class="breadcrumb-one" aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        @if(\Illuminate\Support\Facades\Auth::user()->is_admin==1)
                                            <li class="breadcrumb-item"><a href="javascript:void(0);">Quản lý người
                                                    dùng</a></li>
                                            <li class="breadcrumb-item" aria-current="page">
                                                <a href="{{route('admin.users.index')}}">Người dùng</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">
                                                <a href="javascript:void(0);">Cập nhật</a>
                                            </li>
                                        @else
                                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Hồ sơ</a>
                                            </li>
                                        @endif
                                    </ol>
                                </nav>
                            </div>
                        </li>
                    </ul>
                </div>
            </header>
        </div>
        <!-- Main Body Starts -->
        <div class="layout-px-spacing">
            @include('admin.content.alerts.message')
            <form method="post" action="{{route('admin.users.update')}}" enctype="multipart/form-data">
                @csrf
                <div class="row layout-spacing pt-4">
                    <div class="col-xl-3 col-lg-4 col-md-4 mb-4">
                        <div class="profile-left">
                            <div class="image-area">
                                <img class="user-image" id="view-image"
                                     src="@if($user->image!=\App\Admin\Http\Helpers\Common::noImage){{asset('media/users/'.$user->image)}}@else{{asset('media/common/'.\App\Admin\Http\Helpers\Common::noImage)}}@endif"
                                     data-src="@if($user->image!=\App\Admin\Http\Helpers\Common::noImage){{asset('media/users/'.$user->image)}}@else{{asset('media/common/'.\App\Admin\Http\Helpers\Common::noImage)}}@endif">
                                <div class="btn-change-image d-none">
                                    <i class="las la-camera" for="btn-image-user"></i>
                                    <input id="btn-image-user" name='image' type="file">
                                </div>
                                @can('update', \App\Admin\Models\User::class)
                                    <a class="follow-area btn-edit-profile">
                                        <i class="las la-pen"></i>
                                    </a>
                                @endcan
                            </div>
                            <div class="info-area mb-2">
                                <h6>{{ucwords($user->name)}}</h6>
                                <p>Phòng Ban</p>
                                <button>Giám đốc</button>
                            </div>
                            <div class="profile-tabs tab-options-list">
                                <div class="nav flex-column nav-pills mb-sm-0 mb-3 mx-auto" role="tablist"
                                     aria-orientation="vertical">
                                    <a class="nav-link active" data-toggle="pill" href="#tab-general-infomation"
                                       role="tab"
                                       aria-selected="true"><i class="las la-info mr-2"></i>Thông tin chung</a>
                                    <a class="nav-link" data-toggle="pill" href="#tab-about" role="tab"
                                       aria-selected="false">
                                        <i class="lar la-user mr-2"></i>Giới thiệu</a>
                                    <a class="nav-link" data-toggle="pill" href="#tab-domain-experties" role="tab"
                                       aria-selected="false"><i class="las la-graduation-cap mr-2"></i>Chuyên môn</a>
                                    <a class="nav-link" data-toggle="pill" href="#tab-contact" role="tab"
                                       aria-selected="false">
                                        <i class="las la-phone mr-2"></i>Liên hệ</a>
                                    <a class="nav-link btn-change-password" role="tab"
                                       aria-selected="false" data-toggle="modal" data-target="#modal-change-password">
                                        <i class="las la-key mr-2"></i>Đổi mật khấu</a>
                                    <a class="nav-link" href="#tab-setting" role="tab" data-toggle="pill" aria-selected="false">
                                        <i class="las la-cog mr-2"></i>Cài đặt</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8 col-md-8">
                        <div class="statbox widget box box-shadow mb-4 py-2">
                            <div class="tab-content general-info box-info-profile">
                                <div class="tab-pane fade show active" id="tab-general-infomation" role="tabpanel">
                                    <div class="widget-header">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 justify-content-between d-flex">
                                            <h4>Hồ sơ</h4>
                                            <div class="navbar align-items-center contact-options">
                                                <a href="javascript:void(0);" class="pointer s-o mr-2 bs-tooltip" title="reload" onclick="window.location.reload()"><i class="las la-sync-alt"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content d-flex flex-wrap">
                                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 info">
                                            <input name="id" value="{{$user->id}}" class="d-none">
                                            <div class="form-group">
                                                <label class="disabled-label">Họ tên <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control"
                                                       value="{{old('name') ?? $user->name}}" name="name" readonly>
                                                @error('name')
                                                <div class="invalid-feedback d-block"> {{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="disabled-label">Email <span
                                                        class="text-danger">*</span></label>
                                                <input type="email" class="form-control"
                                                       value="{{$user->email}}" name="email" readonly>
                                                @error('email')
                                                <div class="invalid-feedback d-block"> {{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="disabled-label">Số điện thoại</label>
                                                <input type="text" class="form-control"
                                                       value="{{old('phone') ?? $user->phone}}" name="phone" readonly>
                                                @error('phone')
                                                <div class="invalid-feedback d-block"> {{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="disabled-label">Địa chỉ</label>
                                                <textarea type="text" class="form-control" name="address"
                                                          readonly>{{old('address') ?? $user->address}}</textarea>
                                                @error('address')
                                                <div class="invalid-feedback d-block"> {{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="dob-input spl-left disabled-label">Ngày sinh</label>
                                                <div class="d-sm-flex d-block">
                                                    <div class="form-group mr-1">
                                                        <select class="form-control" name="daybirthday" disabled>
                                                            <option value="" selected>Ngày</option>
                                                            <option
                                                                value="1" {{(date("d", strtotime($user->birthday)) == '1' & date("Y", strtotime($user->birthday)) != '1970')  ? 'selected' : ''}}>
                                                                1
                                                            </option>
                                                            <option
                                                                value="2" {{(date("d", strtotime($user->birthday)) == '2' & date("Y", strtotime($user->birthday)) != '1970')  ? 'selected' : ''}}>
                                                                2
                                                            </option>
                                                            <option
                                                                value="3" {{(date("d", strtotime($user->birthday)) == '3' & date("Y", strtotime($user->birthday)) != '1970')  ? 'selected' : ''}}>
                                                                3
                                                            </option>
                                                            <option
                                                                value="4" {{(date("d", strtotime($user->birthday)) == '4' & date("Y", strtotime($user->birthday)) != '1970')  ? 'selected' : ''}}>
                                                                4
                                                            </option>
                                                            <option
                                                                value="5" {{(date("d", strtotime($user->birthday)) == '5' & date("Y", strtotime($user->birthday)) != '1970')  ? 'selected' : ''}}>
                                                                5
                                                            </option>
                                                            <option
                                                                value="6" {{(date("d", strtotime($user->birthday)) == '6' & date("Y", strtotime($user->birthday)) != '1970')  ? 'selected' : ''}}>
                                                                6
                                                            </option>
                                                            <option
                                                                value="7" {{(date("d", strtotime($user->birthday)) == '7' & date("Y", strtotime($user->birthday)) != '1970')  ? 'selected' : ''}}>
                                                                7
                                                            </option>
                                                            <option
                                                                value="8" {{(date("d", strtotime($user->birthday)) == '8' & date("Y", strtotime($user->birthday)) != '1970')  ? 'selected' : ''}}>
                                                                8
                                                            </option>
                                                            <option
                                                                value="9" {{(date("d", strtotime($user->birthday)) == '9' & date("Y", strtotime($user->birthday)) != '1970')  ? 'selected' : ''}}>
                                                                9
                                                            </option>
                                                            <option
                                                                value="10" {{(date("d", strtotime($user->birthday)) == '10' & date("Y", strtotime($user->birthday)) != '1970')  ? 'selected' : ''}}>
                                                                10
                                                            </option>
                                                            <option
                                                                value="11" {{(date("d", strtotime($user->birthday)) == '11' & date("Y", strtotime($user->birthday)) != '1970')  ? 'selected' : ''}}>
                                                                11
                                                            </option>
                                                            <option
                                                                value="12" {{(date("d", strtotime($user->birthday)) == '12' & date("Y", strtotime($user->birthday)) != '1970')  ? 'selected' : ''}}>
                                                                12
                                                            </option>
                                                            <option
                                                                value="13" {{(date("d", strtotime($user->birthday)) == '13' & date("Y", strtotime($user->birthday)) != '1970')  ? 'selected' : ''}}>
                                                                13
                                                            </option>
                                                            <option
                                                                value="14" {{(date("d", strtotime($user->birthday)) == '14' & date("Y", strtotime($user->birthday)) != '1970')  ? 'selected' : ''}}>
                                                                14
                                                            </option>
                                                            <option
                                                                value="15" {{(date("d", strtotime($user->birthday)) == '15' & date("Y", strtotime($user->birthday)) != '1970')  ? 'selected' : ''}}>
                                                                15
                                                            </option>
                                                            <option
                                                                value="16" {{(date("d", strtotime($user->birthday)) == '16' & date("Y", strtotime($user->birthday)) != '1970')  ? 'selected' : ''}}>
                                                                16
                                                            </option>
                                                            <option
                                                                value="17" {{(date("d", strtotime($user->birthday)) == '17' & date("Y", strtotime($user->birthday)) != '1970')  ? 'selected' : ''}}>
                                                                17
                                                            </option>
                                                            <option
                                                                value="18" {{(date("d", strtotime($user->birthday)) == '18' & date("Y", strtotime($user->birthday)) != '1970')  ? 'selected' : ''}}>
                                                                18
                                                            </option>
                                                            <option
                                                                value="19" {{(date("d", strtotime($user->birthday)) == '19' & date("Y", strtotime($user->birthday)) != '1970')  ? 'selected' : ''}}>
                                                                19
                                                            </option>
                                                            <option
                                                                value="20" {{(date("d", strtotime($user->birthday)) == '20' & date("Y", strtotime($user->birthday)) != '1970')  ? 'selected' : ''}}>
                                                                20
                                                            </option>
                                                            <option
                                                                value="21" {{(date("d", strtotime($user->birthday)) == '21' & date("Y", strtotime($user->birthday)) != '1970')  ? 'selected' : ''}}>
                                                                21
                                                            </option>
                                                            <option
                                                                value="22" {{(date("d", strtotime($user->birthday)) == '22' & date("Y", strtotime($user->birthday)) != '1970')  ? 'selected' : ''}}>
                                                                22
                                                            </option>
                                                            <option
                                                                value="23" {{(date("d", strtotime($user->birthday)) == '23' & date("Y", strtotime($user->birthday)) != '1970')  ? 'selected' : ''}}>
                                                                23
                                                            </option>
                                                            <option
                                                                value="24" {{(date("d", strtotime($user->birthday)) == '24' & date("Y", strtotime($user->birthday)) != '1970')  ? 'selected' : ''}}>
                                                                24
                                                            </option>
                                                            <option
                                                                value="25" {{(date("d", strtotime($user->birthday)) == '25' & date("Y", strtotime($user->birthday)) != '1970')  ? 'selected' : ''}}>
                                                                25
                                                            </option>
                                                            <option
                                                                value="26" {{(date("d", strtotime($user->birthday)) == '26' & date("Y", strtotime($user->birthday)) != '1970')  ? 'selected' : ''}}>
                                                                26
                                                            </option>
                                                            <option
                                                                value="27" {{(date("d", strtotime($user->birthday)) == '27' & date("Y", strtotime($user->birthday)) != '1970')  ? 'selected' : ''}}>
                                                                27
                                                            </option>
                                                            <option
                                                                value="28" {{(date("d", strtotime($user->birthday)) == '28' & date("Y", strtotime($user->birthday)) != '1970')  ? 'selected' : ''}}>
                                                                28
                                                            </option>
                                                            <option
                                                                value="29" {{(date("d", strtotime($user->birthday)) == '29' & date("Y", strtotime($user->birthday)) != '1970')  ? 'selected' : ''}}>
                                                                29
                                                            </option>
                                                            <option
                                                                value="30" {{(date("d", strtotime($user->birthday)) == '30' & date("Y", strtotime($user->birthday)) != '1970')  ? 'selected' : ''}}>
                                                                30
                                                            </option>
                                                            <option
                                                                value="31" {{(date("d", strtotime($user->birthday)) == '31' & date("Y", strtotime($user->birthday)) != '1970')  ? 'selected' : ''}}>
                                                                31
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group mr-1">
                                                        <select class="form-control" name="monthbirthday" disabled>
                                                            <option value="" selected>Tháng</option>
                                                            <option
                                                                value="1" {{(date("m", strtotime($user->birthday)) == '1' & date("Y", strtotime($user->birthday)) != '1970')  ? 'selected' : ''}}>
                                                                1
                                                            </option>
                                                            <option
                                                                value="2" {{(date("m", strtotime($user->birthday)) == '2' & date("Y", strtotime($user->birthday)) != '1970')  ? 'selected' : ''}}>
                                                                2
                                                            </option>
                                                            <option
                                                                value="3" {{(date("m", strtotime($user->birthday)) == '3' & date("Y", strtotime($user->birthday)) != '1970')  ? 'selected' : ''}}>
                                                                3
                                                            </option>
                                                            <option
                                                                value="4" {{(date("m", strtotime($user->birthday)) == '4' & date("Y", strtotime($user->birthday)) != '1970')  ? 'selected' : ''}}>
                                                                4
                                                            </option>
                                                            <option
                                                                value="5" {{(date("m", strtotime($user->birthday)) == '5' & date("Y", strtotime($user->birthday)) != '1970')  ? 'selected' : ''}}>
                                                                5
                                                            </option>
                                                            <option
                                                                value="6" {{(date("m", strtotime($user->birthday)) == '6' & date("Y", strtotime($user->birthday)) != '1970')  ? 'selected' : ''}}>
                                                                6
                                                            </option>
                                                            <option
                                                                value="7" {{(date("m", strtotime($user->birthday)) == '7' & date("Y", strtotime($user->birthday)) != '1970')  ? 'selected' : ''}}>
                                                                7
                                                            </option>
                                                            <option
                                                                value="8" {{(date("m", strtotime($user->birthday)) == '8' & date("Y", strtotime($user->birthday)) != '1970')  ? 'selected' : ''}}>
                                                                8
                                                            </option>
                                                            <option
                                                                value="9" {{(date("m", strtotime($user->birthday)) == '9' & date("Y", strtotime($user->birthday)) != '1970')  ? 'selected' : ''}}>
                                                                9
                                                            </option>
                                                            <option
                                                                value="10" {{(date("m", strtotime($user->birthday)) == '10' & date("Y", strtotime($user->birthday)) != '1970')  ? 'selected' : ''}}>
                                                                10
                                                            </option>
                                                            <option
                                                                value="11" {{(date("m", strtotime($user->birthday)) == '11' & date("Y", strtotime($user->birthday)) != '1970')  ? 'selected' : ''}}>
                                                                11
                                                            </option>
                                                            <option
                                                                value="12" {{(date("m", strtotime($user->birthday)) == '12' & date("Y", strtotime($user->birthday)) != '1970')  ? 'selected' : ''}}>
                                                                12
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group mr-1">
                                                        <select class="form-control" name="yearbirthday" disabled>
                                                            <option value="" selected>Năm</option>
                                                            <option
                                                                value="2022" {{date("Y", strtotime($user->birthday)) == '2022' ? 'selected' : ''}}>
                                                                2022
                                                            </option>
                                                            <option
                                                                value="2021" {{date("Y", strtotime($user->birthday)) == '2021' ? 'selected' : ''}}>
                                                                2021
                                                            </option>
                                                            <option
                                                                value="2020" {{date("Y", strtotime($user->birthday)) == '2020' ? 'selected' : ''}}>
                                                                2020
                                                            </option>
                                                            <option
                                                                value="2019" {{date("Y", strtotime($user->birthday)) == '2019' ? 'selected' : ''}}>
                                                                2019
                                                            </option>
                                                            <option
                                                                value="2018" {{date("Y", strtotime($user->birthday)) == '2018' ? 'selected' : ''}}>
                                                                2018
                                                            </option>
                                                            <option
                                                                value="2017" {{date("Y", strtotime($user->birthday)) == '2017' ? 'selected' : ''}}>
                                                                2017
                                                            </option>
                                                            <option
                                                                value="2016" {{date("Y", strtotime($user->birthday)) == '2016' ? 'selected' : ''}}>
                                                                2016
                                                            </option>
                                                            <option
                                                                value="2015" {{date("Y", strtotime($user->birthday)) == '2015' ? 'selected' : ''}}>
                                                                2015
                                                            </option>
                                                            <option
                                                                value="2014" {{date("Y", strtotime($user->birthday)) == '2014' ? 'selected' : ''}}>
                                                                2014
                                                            </option>
                                                            <option
                                                                value="2013" {{date("Y", strtotime($user->birthday)) == '2013' ? 'selected' : ''}}>
                                                                2013
                                                            </option>
                                                            <option
                                                                value="2012" {{date("Y", strtotime($user->birthday)) == '2012' ? 'selected' : ''}}>
                                                                2012
                                                            </option>
                                                            <option
                                                                value="2011" {{date("Y", strtotime($user->birthday)) == '2011' ? 'selected' : ''}}>
                                                                2011
                                                            </option>
                                                            <option
                                                                value="2010" {{date("Y", strtotime($user->birthday)) == '2010' ? 'selected' : ''}}>
                                                                2010
                                                            </option>
                                                            <option
                                                                value="2009" {{date("Y", strtotime($user->birthday)) == '2009' ? 'selected' : ''}}>
                                                                2009
                                                            </option>
                                                            <option
                                                                value="2008" {{date("Y", strtotime($user->birthday)) == '2008' ? 'selected' : ''}}>
                                                                2008
                                                            </option>
                                                            <option
                                                                value="2007" {{date("Y", strtotime($user->birthday)) == '2007' ? 'selected' : ''}}>
                                                                2007
                                                            </option>
                                                            <option
                                                                value="2006" {{date("Y", strtotime($user->birthday)) == '2006' ? 'selected' : ''}}>
                                                                2006
                                                            </option>
                                                            <option
                                                                value="2005" {{date("Y", strtotime($user->birthday)) == '2005' ? 'selected' : ''}}>
                                                                2005
                                                            </option>
                                                            <option
                                                                value="2004" {{date("Y", strtotime($user->birthday)) == '2004' ? 'selected' : ''}}>
                                                                2004
                                                            </option>
                                                            <option
                                                                value="2003" {{date("Y", strtotime($user->birthday)) == '2003' ? 'selected' : ''}}>
                                                                2003
                                                            </option>
                                                            <option
                                                                value="2002" {{date("Y", strtotime($user->birthday)) == '2002' ? 'selected' : ''}}>
                                                                2002
                                                            </option>
                                                            <option
                                                                value="2001" {{date("Y", strtotime($user->birthday)) == '2001' ? 'selected' : ''}}>
                                                                2001
                                                            </option>
                                                            <option
                                                                value="2000" {{date("Y", strtotime($user->birthday)) == '2000' ? 'selected' : ''}}>
                                                                2000
                                                            </option>
                                                            <option
                                                                value="1999" {{date("Y", strtotime($user->birthday)) == '1999' ? 'selected' : ''}}>
                                                                1999
                                                            </option>
                                                            <option
                                                                value="1998" {{date("Y", strtotime($user->birthday)) == '1998' ? 'selected' : ''}}>
                                                                1998
                                                            </option>
                                                            <option
                                                                value="1997" {{date("Y", strtotime($user->birthday)) == '1997' ? 'selected' : ''}}>
                                                                1997
                                                            </option>
                                                            <option
                                                                value="1996" {{date("Y", strtotime($user->birthday)) == '1996' ? 'selected' : ''}}>
                                                                1996
                                                            </option>
                                                            <option
                                                                value="1995" {{date("Y", strtotime($user->birthday)) == '1995' ? 'selected' : ''}}>
                                                                1995
                                                            </option>
                                                            <option
                                                                value="1994" {{date("Y", strtotime($user->birthday)) == '1994' ? 'selected' : ''}}>
                                                                1994
                                                            </option>
                                                            <option
                                                                value="1993" {{date("Y", strtotime($user->birthday)) == '1993' ? 'selected' : ''}}>
                                                                1993
                                                            </option>
                                                            <option
                                                                value="1992" {{date("Y", strtotime($user->birthday)) == '1992' ? 'selected' : ''}}>
                                                                1992
                                                            </option>
                                                            <option
                                                                value="1991" {{date("Y", strtotime($user->birthday)) == '1991' ? 'selected' : ''}}>
                                                                1991
                                                            </option>
                                                            <option
                                                                value="1990" {{date("Y", strtotime($user->birthday)) == '1990' ? 'selected' : ''}}>
                                                                1990
                                                            </option>
                                                            <option
                                                                value="1989" {{date("Y", strtotime($user->birthday)) == '1989' ? 'selected' : ''}}>
                                                                1989
                                                            </option>
                                                            <option
                                                                value="1988" {{date("Y", strtotime($user->birthday)) == '1988' ? 'selected' : ''}}>
                                                                1988
                                                            </option>
                                                            <option
                                                                value="1987" {{date("Y", strtotime($user->birthday)) == '1987' ? 'selected' : ''}}>
                                                                1987
                                                            </option>
                                                            <option
                                                                value="1986" {{date("Y", strtotime($user->birthday)) == '1986' ? 'selected' : ''}}>
                                                                1986
                                                            </option>
                                                            <option
                                                                value="1985" {{date("Y", strtotime($user->birthday)) == '1985' ? 'selected' : ''}}>
                                                                1985
                                                            </option>
                                                            <option
                                                                value="1984" {{date("Y", strtotime($user->birthday)) == '1984' ? 'selected' : ''}}>
                                                                1984
                                                            </option>
                                                            <option
                                                                value="1983" {{date("Y", strtotime($user->birthday)) == '1983' ? 'selected' : ''}}>
                                                                1983
                                                            </option>
                                                            <option
                                                                value="1982" {{date("Y", strtotime($user->birthday)) == '1982' ? 'selected' : ''}}>
                                                                1982
                                                            </option>
                                                            <option
                                                                value="1981" {{date("Y", strtotime($user->birthday)) == '1981' ? 'selected' : ''}}>
                                                                1981
                                                            </option>
                                                            <option
                                                                value="1981" {{date("Y", strtotime($user->birthday)) == '1981' ? 'selected' : ''}}>
                                                                1981
                                                            </option>
                                                            <option
                                                                value="1980" {{date("Y", strtotime($user->birthday)) == '1980' ? 'selected' : ''}}>
                                                                1980
                                                            </option>
                                                            <option
                                                                value="1979" {{date("Y", strtotime($user->birthday)) == '1979' ? 'selected' : ''}}>
                                                                1979
                                                            </option>
                                                            <option
                                                                value="1978" {{date("Y", strtotime($user->birthday)) == '1978' ? 'selected' : ''}}>
                                                                1978
                                                            </option>
                                                            <option
                                                                value="1977" {{date("Y", strtotime($user->birthday)) == '1977' ? 'selected' : ''}}>
                                                                1977
                                                            </option>
                                                            <option
                                                                value="1976" {{date("Y", strtotime($user->birthday)) == '1976' ? 'selected' : ''}}>
                                                                1976
                                                            </option>
                                                            <option
                                                                value="1975" {{date("Y", strtotime($user->birthday)) == '1975' ? 'selected' : ''}}>
                                                                1975
                                                            </option>
                                                            <option
                                                                value="1974" {{date("Y", strtotime($user->birthday)) == '1974' ? 'selected' : ''}}>
                                                                1974
                                                            </option>
                                                            <option
                                                                value="1973" {{date("Y", strtotime($user->birthday)) == '1973' ? 'selected' : ''}}>
                                                                1973
                                                            </option>
                                                            <option
                                                                value="1972" {{date("Y", strtotime($user->birthday)) == '1972' ? 'selected' : ''}}>
                                                                1972
                                                            </option>
                                                            <option
                                                                value="1971" {{date("Y", strtotime($user->birthday)) == '1971' ? 'selected' : ''}}>
                                                                1971
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 py-4">
                                            <div class="d-flex align-center form-group">
                                                <div class="d-flex align-center mr-4">
                                                    <label for="male"
                                                           class="mb-0 mr-2 text-black position-relative">Nam</label>
                                                    <input type="radio" id="male" name="gender" value="0"
                                                           {{ $user->gender == 0 ? 'checked' : ''}} readonly disabled>
                                                </div>
                                                <div class="d-flex align-center">
                                                    <label for="female" class="mb-0 mr-2 text-black position-relative">Nữ</label>
                                                    <input type="radio" id="female" name="gender" value="1"
                                                           {{ $user->gender == 1 ? 'checked' : ''}} readonly disabled>
                                                </div>
                                            </div>
                                        </div>
                                        @if(\Illuminate\Support\Facades\Auth::user()->is_admin == 1)
                                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 p-4">
                                                <div class="form-group p-0 m-0 info">
                                                    <label class="disabled-label">Vai trò</label>
                                                    <select class="form-control multiple" name="roles"
                                                            multiple="multiple"
                                                            disabled>
                                                        @foreach($roles as $item)
                                                            <option
                                                                value="{{$item->id}}" {{in_array($item->id, $UserRoleRelationships) ? 'selected':false}}>{{$item->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-check pl-0 form-group">
                                                    <div class="custom-control custom-checkbox checkbox-success">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="is_admin" name="is_admin" value="1"
                                                               {{ $user->is_admin == 1 ? 'checked' : ''}} readonly
                                                               disabled>
                                                        <label class="custom-control-label" for="is_admin">Quản trị
                                                            viên</label>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="widget-footer text-right p-3 box-update d-none">
                                        <button type="submit" class="btn btn-primary mr-2">Cập nhật</button>
                                        <a onClick="window.location.reload();" class="btn btn-outline-primary">Hủy</a>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-about" role="tabpanel">
                                </div>
                                <div class="tab-pane fade" id="tab-domain-experties" role="tabpanel">
                                </div>
                                <div class="tab-pane fade" id="tab-contact" role="tabpanel">
                                </div>
                                <div class="tab-pane fade" id="tab-setting" role="tabpanel">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>Cài đặt</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content d-flex flex-wrap">
                                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <input type="button" class="btn btn-primary" value="Đổi mật khẩu">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </form>
        </div>
        @include('admin.content.users.change_password')
    @endcan
    <!-- Main Body Ends -->
@endsection
@section('css')
    <!-- Page Level Plugin/Style Starts -->
    <link href="{{asset('css/admin/profile.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/profile_edit.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/select2.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/form-widgets.css')}}" rel="stylesheet" type="text/css">
    <!-- Page Level Plugin/Style Ends -->
@endsection
@section('js')
    <!-- Page Level Plugin/Script Starts -->
    <script src="{{asset('js/admin/select2.min.js')}}"></script>
    <script src="{{asset('js/admin/custom-select2.js')}}"></script>
    <!-- Page Level Plugin/Script Ends -->
    <script>
        $(document).ready(function () {
            /*kiểm tra validate mở khóa chỉnh sửa*/
            var errors = "{{Session::get('errors')}}";
            if (errors.length > 0) {
                edit();
            }
            /*nút mở khóa chỉnh sửa*/
            $(document).on('click', '.btn-edit-profile', function () {
                edit();
            });

            /* Mở khóa chỉnh sửa*/
            function edit() {
                $('.box-info-profile input').attr('readonly', false);
                $('.box-info-profile textarea').attr('readonly', false);
                $('.box-info-profile select').attr('disabled', false);
                $('.box-info-profile label').removeClass('disabled-label');
                if ($('.box-update').hasClass('d-none')) {
                    $('.box-update').removeClass('d-none');
                }
                if ($('.btn-change-image').hasClass('d-none')) {
                    $('.btn-change-image').removeClass('d-none');
                }
                $('.box-info-profile input[name="email"]').attr('readonly', true);
                $('.box-info-profile input[name="is_admin"]').attr('disabled', false);
                $('.box-info-profile input[name="gender"]').attr('disabled', false);
            }

            /* Thay ảnh*/
            $(document).on('change', '#btn-image-user', function () {
                var default_src = $("#view-image").attr('data-src');
                const file = this.files[0];
                if (typeof (file) != "undefined") {
                    let reader = new FileReader();
                    reader.onload = function (event) {
                        $("#view-image").attr("src", event.target.result);
                    };
                    reader.readAsDataURL(file);
                } else {
                    $("#view-image").attr("src", default_src);
                }
            });

            /* Đổi mật khẩu*/
            $(document).on('click','.btn-update-password', function () {
                $('form#change-password .text-error').remove();
                var current_password = $('form#change-password input[name="current_password"]');
                var password = $('form#change-password input[name="password"]');
                var password_confirmation = $('form#change-password input[name="password_confirmation"]');

                var input = {
                    current_password:current_password.val(),
                    password:password.val(),
                    password_confirmation:password_confirmation.val(),
                }

                $.ajax({
                    url: "{{route('admin.update_password')}}",
                    method: "post",
                    data:input,
                    dataType: "json",
                    success: function (output) {
                        $('#modal-change-password').modal('hide');
                        if (output.success) {
                            Snackbar.show({
                                text: 'Cập nhật thành công',
                                pos: 'top-center'
                            });
                        } else {
                            Snackbar.show({
                                text: 'Có lỗi xảy ra',
                                pos: 'top-center'
                            });
                        }
                    },
                    error: function (output) {
                        var message = output.responseJSON.errors;
                        if (message.current_password) {
                            current_password.after(error(message.current_password));
                        }
                        if (message.password) {
                            password.after(error(message.password));
                        }
                    }
                });
            });

            $(document).on('click','.btn-change-password', function () {
                $('form#change-password')[0].reset();
            });

            $(document).on('click','.form-password i',function (event) {
                event.preventDefault();
                if($(this).prev('input').attr('type') == 'text'){
                    $(this).prev('input').attr('type', 'password');
                    $(this).addClass( "la-eye-slash" );
                    $(this).removeClass( "la-eye" );
                }
                else {
                    $(this).prev('input').attr('type', 'text');
                    $(this).addClass( "la-eye" );
                    $(this).removeClass( "la-eye-slash" );
                }
            })
        })
    </script>
@endsection
