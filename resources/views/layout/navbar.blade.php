<!-- NAVBAR START -->
<nav class="navbar navbar-expand-lg py-lg-3 navbar-dark bg-dark" style="padding:0 10%;">
    <div class="container" style="">

        <!-- logo -->
        <a href="index.html" class="navbar-brand me-lg-5">
            <img src="/images/logo/logo.png" alt="logo" class="logo-dark" height="22" />
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <i class="mdi mdi-menu"></i>
        </button>

        <!-- menus -->
        <div class="collapse navbar-collapse" style="justify-content: space-between" id="navbarNavDropdown">

            <!-- left menu -->
            <ul class="navbar-nav me-auto align-items-center">
                <li class="nav-item mx-lg-1">
                    <a class="nav-link active" href="">Home</a>
                </li>
                @foreach($subject as $key => $value)
                    @if($key >=5 )
                        @break
                    @endif
                    <li class="nav-item mx-lg-1">
                        <a class="nav-link" href="{{route('student.subject',['id' => $value->id])}}">{{$value->name}}</a>
                    </li>
                @endforeach


            </ul>

            <!-- right menu -->
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item me-0">
                    <a href=""  class="btn btn-sm btn-light rounded-pill d-none d-lg-inline-flex">
                        Đăng ký
                    </a>                    <a href=""  class="btn btn-sm btn-success rounded-pill d-none d-lg-inline-flex">
                        Đăng nhập
                    </a>
                </li>
            </ul>

        </div>
    </div>
</nav>
<!-- NAVBAR END -->
