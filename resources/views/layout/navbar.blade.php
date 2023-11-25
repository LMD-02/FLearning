<!-- NAVBAR START -->
<nav class="navbar navbar-expand-lg py-lg-3 navbar-dark bg-dark" style="padding:0 10%;">
    <div class="container" style="">

        <!-- logo -->
        <a href="{{route('student.welcome')}}" class="navbar-brand me-lg-5">
            <img src="/images/logo/logo.png" alt="logo" class="logo-dark" height="22"/>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <i class="mdi mdi-menu"></i>
        </button>

        <!-- menus -->
        <div class="collapse navbar-collapse" style="justify-content: space-between" id="navbarNavDropdown">

            <!-- left menu -->
            <ul class="navbar-nav me-auto align-items-center" style="flex:3">
                <li class="nav-item mx-lg-1">
                    <a class="nav-link active" href="/">Home</a>
                </li>
                @foreach($subject as $key => $value)
                    @if($key >=5 )
                        @break
                    @endif
                    <li class="nav-item mx-lg-1">
                        <a class="nav-link"
                           href="{{route('student.subject',['id' => $value->id])}}">{{$value->name}}</a>
                    </li>
                @endforeach



            </ul>
            <ul class="navbar-nav me-auto align-items-center justify-content-end" style="flex:1">
                @if(auth()->user())
                <li class="nav-item mx-lg-1">
                    <a class="nav-link " href="{{route('student.exam')}}">
                        <i class="mdi mdi-text-box-check"></i>
                        Bài test</a>
                </li>
                @endif
                <li class="nav-item mx-lg-1">
                    <a class="nav-link " href="{{route('student.video')}}">
                        <i class="mdi mdi-video-outline"></i>
                        Video bài học</a>
                </li>

            </ul>


            <!-- right menu -->
            @if(auth()->user() != null)
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="dropdown bg-dark">
                        <a class="nav-link dropdown-toggle arrow-none nav-user px-2 bg-dark border-0"
                            href="#" role="button" id="profile-user-login" >
                                    <span class="account-user-avatar">
                                        <img src="{{asset('images/upload/'.auth()->user()->avatar)}}" alt="user-image" width="32"
                                             class="rounded-circle">
                                    </span>
                                    <span class="d-lg-flex flex-column gap-1 d-none">
                                        <h5 class="my-0">{{auth()->user()->name}}</h5>
                                        <h6 class="my-0 fw-normal">Học viên</h6>
                                    </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown" id="drop-down-user">

                            <a href="{{route('student.profile')}}" class="dropdown-item">
                                <i class="mdi mdi-account-circle me-1"></i>
                                <span>Tài khoản</span>
                            </a>

                            <a href="{{route('student.favorites')}}" class="dropdown-item">
                                <i class="mdi mdi-heart me-1"></i>
                                <span>Danh sách yêu thích</span>
                            </a>

                            <a href="{{route('logout')}}" class="dropdown-item">
                                <i class="mdi mdi-logout me-1"></i>
                                <span>Đăng xuất</span>
                            </a>
                        </div>
                    </li>
                </ul>
            @else
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item me-0">
                        <a href="{{route('register')}}" class="btn btn-sm btn-light rounded-pill d-none d-lg-inline-flex">
                            Đăng ký
                        </a> <a href="{{route('login')}}" class="btn btn-sm btn-success rounded-pill d-none d-lg-inline-flex">
                            Đăng nhập
                        </a>
                    </li>
                </ul>
            @endif

        </div>
    </div>
</nav>
<!-- NAVBAR END -->
