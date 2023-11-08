<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <!-- LOGO -->
    <a href="{{route('admin.home')}}" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="{{asset('images/logo/logo.png')}}" alt="" height="64px">
                    </span>
        <span class="logo-sm">
                        <img src="{{asset('images/logo/logo_sm.png')}}" alt="" height="20">
                    </span>
    </a>


    @if(auth()->user()->role != 0)

    <div class="h-100" id="left-side-menu-container" data-simplebar>

        <!--- Sidemenu -->
        <ul class="metismenu side-nav">
            <li class="side-nav-item">
                <a href="{{route('admin.home')}}" class="side-nav-link">
                    <i class="mdi mdi-human-male-female"></i>
                    <span> Tổng quan </span>
                </a>
            </li>
            <li class="side-nav-title side-nav-item">Người dùng</li>
            @if(auth()->user()->role == 1)
            <li class="side-nav-item">
                <a href="{{route('admin.user')}}" class="side-nav-link" >
                    <i class="mdi mdi-human-male-female"></i>
                    <span>Quản lý người dùng</span>
                </a>
            </li>
            @endif
            <li class="side-nav-item">
                <a href="{{route('admin.report')}}" class="side-nav-link" >
                    <i class="mdi mdi-human-male-female"></i>
                    <span>Quản lý phản hồi </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{route('admin.user.command')}}" class="side-nav-link" >
                    <i class="mdi mdi-human-male-female"></i>
                    <span>Quản lý bình luận</span>
                </a>
            </li>
            <li class="side-nav-title side-nav-item">Chương trình học</li>
            <li class="side-nav-item">
                <a href="javascript: void(0);" class="side-nav-link">
                    <i class="mdi mdi-human-male-female"></i>
                    <span> Học tập </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="side-nav-second-level mm-collapse " aria-expanded="false" style="">
                    @if(auth()->user()->role == 1)

                    <li>
                        <a href="{{route('admin.subject')}}">Quản lý môn học</a>
                    </li>
                    @endif
                    <li>
                        <a href="{{route('admin.subject.chapter')}}">Quản lý chương</a>
                    </li>
{{--                    <li>--}}
{{--                        <a href="{{route('admin.subject.session')}}">Quản lý bài học</a>--}}
{{--                    </li>--}}
                    <li>
                        <a href="{{route('admin.subject.video')}}">Quản lý video</a>
                    </li>
                </ul>
            </li>
            @if(auth()->user()->role == 1)

            <li class="side-nav-item">
                <a href="javascript: void(0);" class="side-nav-link">
                    <i class="mdi mdi-human-male-female"></i>
                    <span> Kiểm tra </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="side-nav-second-level mm-collapse " aria-expanded="false" style="">
                    <li>
                        <a href="{{route('admin.exam')}}">Quản lý bài thi</a>
                    </li>
                    <li>
                        <a href="{{route('admin.statistic')}}">Thống kê</a>
                    </li>
                </ul>
            </li>
                @endif
        </ul>
    </div>
    <!-- Sidebar -left -->
    @endif
</div>
<!-- Left Sidebar End -->
