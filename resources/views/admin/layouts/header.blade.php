<div class="header-container fixed-top">
    <header class="header navbar navbar-expand-sm">
        <ul class="navbar-item theme-brand flex-row  text-center">
            <li class="nav-item theme-text d-block">
                <a href="{{route('admin')}}" class="nav-link"> Anh THỢ IT </a>
            </li>
        </ul>
        <ul class="navbar-item flex-row ml-md-auto">
            <li class="nav-item dropdown user-profile-dropdown">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    @if(\Illuminate\Support\Facades\Auth::user()->image != \App\Admin\Http\Helpers\Common::noImage)
                        <img src="{{ asset('media/users/'.\Illuminate\Support\Facades\Auth::user()->image) }}" alt="avatar">
                    @else
                        <img src="{{ asset('media/common/'.\App\Admin\Http\Helpers\Common::noImage) }}" alt="avatar">
                    @endif
                </a>
                <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                    <div class="nav-drop is-account-dropdown">
                        <div class="inner">
                            <div class="nav-drop-header">
                                <span
                                    class="text-primary font-15">Xin chào {{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                            </div>
                            <div class="nav-drop-body account-items pb-0">
                                <a id="profile-link" class="account-item" href="{{route('admin.users.edit',['id' => \Illuminate\Support\Facades\Auth::id()])}}">
                                    <div class="media align-center">
                                        <div class="media-left">
                                            <div class="image">
                                                @if(\Illuminate\Support\Facades\Auth::user()->image != \App\Admin\Http\Helpers\Common::noImage)
                                                    <img class="rounded-circle avatar-xs" src="{{ asset('media/users/'.\Illuminate\Support\Facades\Auth::user()->image) }}"
                                                         alt="">
                                                @else
                                                    <img class="rounded-circle avatar-xs" src="{{ asset('media/common/'.\App\Admin\Http\Helpers\Common::noImage) }}"
                                                         alt="">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="media-content ml-3">
                                            <h6 class="font-13 mb-0 strong">{{\Illuminate\Support\Facades\Auth::user()->name}}</h6>
                                        </div>
                                        <div class="media-right">
                                            <i data-feather="check"></i>
                                        </div>
                                    </div>
                                </a>
                                <a class="account-item"
                                   href="{{route('admin.users.edit',['id' => \Illuminate\Support\Facades\Auth::id()])}}">
                                    <div class="media align-center">
                                        <div class="icon-wrap">
                                            <i class="las la-user font-20"></i>
                                        </div>
                                        <div class="media-content ml-3">
                                            <h6 class="font-13 mb-0 strong">Tài khoản</h6>
                                        </div>
                                    </div>
                                </a>
                                <hr class="account-divider">
                                <a class="account-item" href="{{route('admin.sign_out')}}">
                                    <div class="media align-center">
                                        <div class="icon-wrap">
                                            <i class="las la-sign-out-alt font-20"></i>
                                        </div>
                                        <div class="media-content ml-3">
                                            <h6 class="font-13 mb-0 strong ">Đăng Xuất</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </header>
</div>
