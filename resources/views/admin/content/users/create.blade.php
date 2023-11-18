@extends('admin.layouts.base')
@section('body')
    @can('create', \App\Admin\Models\User::class)
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
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Quản lý người dùng</a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">
                                            <a href="{{route('admin.users.index')}}">Người dùng</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            <a href="javascript:void(0);">Thêm mới</a>
                                        </li>
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
            <form method="post" action="{{route('admin.users.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row layout-spacing pt-4">
                    <div class="col-xl-3 col-lg-4 col-md-4 mb-4">
                        <div class="profile-left">
                            <div class="image-area">
                                <img class="user-image" id="view-image"
                                     src="{{asset('media/common/'.\App\Admin\Http\Helpers\Common::noImage)}}"
                                     data-src="{{asset('media/common/'.\App\Admin\Http\Helpers\Common::noImage)}}">
                                <div class="btn-change-image">
                                    <i class="las la-camera" for="btn-image-user"></i>
                                    <input id="btn-image-user" name='image' type="file">
                                </div>
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
                                </div>
                            </div>
                            <div class="highlight-info">
                                <img src="{{asset('media/common/company-1.jpg')}}">
                                <div class="highlight-desc">
                                    <p>WS Retailer</p>
                                    <p>Top seller of the month</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8 col-md-8">
                        <div class="statbox widget box box-shadow mb-4 py-2">
                            <div class="tab-content general-info box-info-profile">
                                <div class="tab-pane fade show active" id="tab-general-infomation" role="tabpanel">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12 justify-content-between d-flex">
                                                <h4>Hồ sơ</h4>
                                                    <div class="navbar align-items-center contact-options">
                                                        <a href="javascript:void(0);" class="pointer s-o mr-2 bs-tooltip" title="reload" onclick="window.location.reload()"><i class="las la-sync-alt"></i></a>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content d-flex flex-wrap">
                                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 info">
                                            <div class="form-group">
                                                <label>Họ tên <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="name"
                                                       value="{{old('name')}}">
                                                @error('name')
                                                <div class="invalid-feedback d-block"> {{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Email <span class="text-danger">*</span></label>
                                                <input type="email" class="form-control" name="email"
                                                       value="{{old('email')}}">
                                                @error('email')
                                                <div class="invalid-feedback d-block"> {{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Số điện thoại</label>
                                                <input type="text" class="form-control" name="phone"
                                                       value="{{old('phone')}}">
                                                @error('phone')
                                                <div class="invalid-feedback d-block"> {{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Địa chỉ</label>
                                                <textarea type="text" class="form-control"
                                                          name="address">{{old('address')}}</textarea>
                                                @error('address')
                                                <div class="invalid-feedback d-block"> {{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="dob-input spl-left">Ngày sinh</label>
                                                <div class="d-sm-flex d-block">
                                                    <div class="form-group mr-1">
                                                        <select class="form-control" name="daybirthday">
                                                            <option value="" selected>Ngày</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="11">11</option>
                                                            <option value="10">10</option>
                                                            <option value="12">12</option>
                                                            <option value="13">13</option>
                                                            <option value="14">14</option>
                                                            <option value="15">15</option>
                                                            <option value="16">16</option>
                                                            <option value="17">17</option>
                                                            <option value="18">18</option>
                                                            <option value="19">19</option>
                                                            <option value="20">20</option>
                                                            <option value="21">21</option>
                                                            <option value="22">22</option>
                                                            <option value="23">23</option>
                                                            <option value="24">24</option>
                                                            <option value="25">25</option>
                                                            <option value="26">26</option>
                                                            <option value="27">27</option>
                                                            <option value="28">28</option>
                                                            <option value="29">29</option>
                                                            <option value="30">30</option>
                                                            <option value="31">31</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group mr-1">
                                                        <select class="form-control" name="monthbirthday">
                                                            <option value="" selected>Tháng</option>
                                                            <option value="1"> 1</option>
                                                            <option value="2"> 2</option>
                                                            <option value="3"> 3</option>
                                                            <option value="4"> 4</option>
                                                            <option value="5"> 5</option>
                                                            <option value="6"> 6</option>
                                                            <option value="7"> 7</option>
                                                            <option value="8"> 8</option>
                                                            <option value="9"> 9</option>
                                                            <option value="10">10</option>
                                                            <option value="11">11</option>
                                                            <option value="12">12</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group mr-1">
                                                        <select class="form-control" name="yearbirthday">
                                                            <option value="" selected>Năm</option>
                                                            <option value="2022">2022</option>
                                                            <option value="2021">2021</option>
                                                            <option value="2020">2020</option>
                                                            <option value="2019">2019</option>
                                                            <option value="2018">2018</option>
                                                            <option value="2017">2017</option>
                                                            <option value="2016">2016</option>
                                                            <option value="2015">2015</option>
                                                            <option value="2014">2014</option>
                                                            <option value="2013">2013</option>
                                                            <option value="2012">2012</option>
                                                            <option value="2011">2011</option>
                                                            <option value="2010">2010</option>
                                                            <option value="2009">2009</option>
                                                            <option value="2008">2008</option>
                                                            <option value="2007">2007</option>
                                                            <option value="2006">2006</option>
                                                            <option value="2005">2005</option>
                                                            <option value="2004">2004</option>
                                                            <option value="2003">2003</option>
                                                            <option value="2002">2002</option>
                                                            <option value="2001">2001</option>
                                                            <option value="2000">2000</option>
                                                            <option value="1999">1999</option>
                                                            <option value="1998">1998</option>
                                                            <option value="1997">1997</option>
                                                            <option value="1996">1996</option>
                                                            <option value="1995">1995</option>
                                                            <option value="1994">1994</option>
                                                            <option value="1993">1993</option>
                                                            <option value="1992">1992</option>
                                                            <option value="1991">1991</option>
                                                            <option value="1990">1990</option>
                                                            <option value="1989">1989</option>
                                                            <option value="1988">1988</option>
                                                            <option value="1987">1987</option>
                                                            <option value="1986">1986</option>
                                                            <option value="1985">1985</option>
                                                            <option value="1984">1984</option>
                                                            <option value="1983">1983</option>
                                                            <option value="1982">1982</option>
                                                            <option value="1981">1981</option>
                                                            <option value="1981">1981</option>
                                                            <option value="1980">1980</option>
                                                            <option value="1979">1979</option>
                                                            <option value="1978">1978</option>
                                                            <option value="1977">1977</option>
                                                            <option value="1976">1976</option>
                                                            <option value="1975">1975</option>
                                                            <option value="1974">1974</option>
                                                            <option value="1973">1973</option>
                                                            <option value="1972">1972</option>
                                                            <option value="1971">1971</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 py-2">
                                            <div class="d-flex align-center form-group">
                                                <div class="d-flex align-center mr-4">
                                                    <label for="male" class="mb-0 mr-2 text-black">Nam</label>
                                                    <input type="radio" id="male" name="gender" value="0" checked>
                                                </div>
                                                <div class="d-flex align-center">
                                                    <label for="female" class="mb-0 mr-2 text-black">Nữ</label>
                                                    <input type="radio" id="female" name="gender" value="1">
                                                </div>
                                            </div>
                                        </div>
                                        @if(\Illuminate\Support\Facades\Auth::user()->is_admin == 1)
                                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 p-4">
                                                <div class="form-group p-0 m-0 info">
                                                    <label class="disabled-label">Vai trò</label>
                                                    <select class="form-control multiple" name="roles"
                                                            multiple="multiple">
                                                        @foreach($roles as $item)
                                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-check pl-0 form-group">
                                                    <div class="custom-control custom-checkbox checkbox-success">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="is_admin" name="is_admin" value="1">
                                                        <label class="custom-control-label" for="is_admin">Quản trị
                                                            viên</label>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-about" role="tabpanel">
                                </div>
                                <div class="tab-pane fade" id="tab-domain-experties" role="tabpanel">
                                </div>
                                <div class="tab-pane fade" id="tab-contact" role="tabpanel">
                                </div>
                            </div>
                            <div class="widget-footer text-right p-3 box-update">
                                <button type="submit" class="btn btn-primary mr-2 btn-store">Thêm mới</button>
                                <a href="{{route('admin.users.index')}}" class="btn btn-outline-primary">Trở lại</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- Main Body Ends -->
    @endcan
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
            /** Thay ảnh*/
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
        });
    </script>
@endsection
