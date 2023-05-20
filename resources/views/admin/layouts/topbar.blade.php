<!-- Top Bar Start -->
<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left">
        <a href="{{url('/')}}" class="logo">
            <img src="{{asset('images/page_logo_2.png')}}" alt="" style="max-width: 150px">
        </a>
    </div>

    <nav class="navbar-custom">
        <ul class="list-inline float-right mb-0">
            @if(session()->get('impersonated_by'))
                <li class="list-inline-item dropdown notification-list">
                    <a href="{{route('impersonate_leave')}}">
                        <i class="zmdi zmdi-long-arrow-return" style="font-size:20px;color:white"></i>
                    </a>
                </li>
            @endif
{{--            <li class="list-inline-item dropdown notification-list">--}}
{{--                <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#"--}}
{{--                    role="button" aria-haspopup="false" aria-expanded="false">--}}
{{--                    <i class="zmdi zmdi-notifications-none noti-icon"></i>--}}
{{--                    <span class="noti-icon-badge"></span>--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-lg" aria-labelledby="Preview">--}}
{{--                    <!-- item-->--}}
{{--                    <div class="dropdown-item noti-title">--}}
{{--                        <h5><small><span class="label label-danger pull-xs-right">7</span>Notification</small></h5>--}}
{{--                    </div>--}}

{{--                    <!-- item-->--}}
{{--                    <a href="javascript:void(0);" class="dropdown-item notify-item">--}}
{{--                        <div class="notify-icon bg-success"><i class="icon-bubble"></i></div>--}}
{{--                        <p class="notify-details">Robert S. Taylor commented on Admin<small class="text-muted">1min--}}
{{--                                ago</small></p>--}}
{{--                    </a>--}}

{{--                    <!-- item-->--}}
{{--                    <a href="javascript:void(0);" class="dropdown-item notify-item">--}}
{{--                        <div class="notify-icon bg-info"><i class="icon-user"></i></div>--}}
{{--                        <p class="notify-details">New user registered.<small class="text-muted">1min ago</small></p>--}}
{{--                    </a>--}}

{{--                    <!-- item-->--}}
{{--                    <a href="javascript:void(0);" class="dropdown-item notify-item">--}}
{{--                        <div class="notify-icon bg-danger"><i class="icon-like"></i></div>--}}
{{--                        <p class="notify-details">Carlos Crouch liked <b>Admin</b><small class="text-muted">1min--}}
{{--                                ago</small></p>--}}
{{--                    </a>--}}

{{--                    <!-- All-->--}}
{{--                    <a href="javascript:void(0);" class="dropdown-item notify-item notify-all">--}}
{{--                        View All--}}
{{--                    </a>--}}

{{--                </div>--}}
{{--            </li>--}}

{{--            <li class="list-inline-item dropdown notification-list">--}}
{{--                <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#"--}}
{{--                    role="button" aria-haspopup="false" aria-expanded="false">--}}
{{--                    <i class="zmdi zmdi-email noti-icon"></i>--}}
{{--                    <span class="noti-icon-badge"></span>--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-arrow-success dropdown-lg"--}}
{{--                    aria-labelledby="Preview">--}}
{{--                    <!-- item-->--}}
{{--                    <div class="dropdown-item noti-title bg-success">--}}
{{--                        <h5><small><span class="label label-danger pull-xs-right">7</span>Messages</small></h5>--}}
{{--                    </div>--}}

{{--                    <!-- item-->--}}
{{--                    <a href="javascript:void(0);" class="dropdown-item notify-item">--}}
{{--                        <div class="notify-icon bg-faded">--}}
{{--                            <img src="assets/images/users/avatar-2.jpg" alt="img" class="rounded-circle img-fluid">--}}
{{--                        </div>--}}
{{--                        <p class="notify-details">--}}
{{--                            <b>Robert Taylor</b>--}}
{{--                            <span>New tasks needs to be done</span>--}}
{{--                            <small class="text-muted">1min ago</small>--}}
{{--                        </p>--}}
{{--                    </a>--}}

{{--                    <!-- item-->--}}
{{--                    <a href="javascript:void(0);" class="dropdown-item notify-item">--}}
{{--                        <div class="notify-icon bg-faded">--}}
{{--                            <img src="assets/images/users/avatar-3.jpg" alt="img" class="rounded-circle img-fluid">--}}
{{--                        </div>--}}
{{--                        <p class="notify-details">--}}
{{--                            <b>Carlos Crouch</b>--}}
{{--                            <span>New tasks needs to be done</span>--}}
{{--                            <small class="text-muted">1min ago</small>--}}
{{--                        </p>--}}
{{--                    </a>--}}

{{--                    <!-- item-->--}}
{{--                    <a href="javascript:void(0);" class="dropdown-item notify-item">--}}
{{--                        <div class="notify-icon bg-faded">--}}
{{--                            <img src="assets/images/users/avatar-4.jpg" alt="img" class="rounded-circle img-fluid">--}}
{{--                        </div>--}}
{{--                        <p class="notify-details">--}}
{{--                            <b>Robert Taylor</b>--}}
{{--                            <span>New tasks needs to be done</span>--}}
{{--                            <small class="text-muted">1min ago</small>--}}
{{--                        </p>--}}
{{--                    </a>--}}

{{--                    <!-- All-->--}}
{{--                    <a href="javascript:void(0);" class="dropdown-item notify-item notify-all">--}}
{{--                        View All--}}
{{--                    </a>--}}

{{--                </div>--}}
{{--            </li>--}}

{{--            <li class="list-inline-item dropdown notification-list">--}}
{{--                <a class="nav-link waves-effect waves-light right-bar-toggle" href="javascript:void(0);">--}}
{{--                    <i class="zmdi zmdi-format-subject noti-icon"></i>--}}
{{--                </a>--}}
{{--            </li>--}}

            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="{{asset(Auth()->user()->avatar)}}" alt="user" class="rounded-circle" style="object-fit: cover">
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5 class="text-overflow"><small>{{$user = Auth::user()->name}}</small> </h5>
                    </div>

                    <!-- item-->
                    <a href="{{ route('logout') }}" class="dropdown-item notify-item">
                        <i class="zmdi zmdi-power"></i> <span>Đăng xuất</span>
                    </a>

                </div>
            </li>

        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left waves-light waves-effect">
                    <i class="zmdi zmdi-menu"></i>
                </button>
            </li>
{{--            <li class="hidden-mobile app-search">--}}
{{--                <form role="search" class="">--}}
{{--                    <input type="text" placeholder="Search..." class="form-control">--}}
{{--                    <a href=""><i class="fa fa-search"></i></a>--}}
{{--                </form>--}}
{{--            </li>--}}
        </ul>

    </nav>

</div>
<!-- Top Bar End -->
