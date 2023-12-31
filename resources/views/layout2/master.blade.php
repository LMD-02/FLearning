<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>{{ $title ?? '' }} - {{config('app.name')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('images/logo/logo_sm.png')}}">
    <link href="{{asset('/css/checkbox.css')}}" rel="stylesheet" type="text/css"/>
    <!-- third party css -->
    <link href="{{asset('/css/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('/css/app-creative.min.css')}}" rel="stylesheet" type="text/css" id="light-style"/>
    <link href="{{asset('/css/app-creative-dark.min.css')}}" rel="stylesheet" type="text/css" id="dark-style"/>
    @stack('css2')
</head>

<body class="loading"
      data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
<!-- Begin page -->
<div class="wrapper">
    <!-- ========== Left Sidebar Start ========== -->
    @include('layout2.sidebar');)
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">
            <!-- Topbar Start -->
            @include('layout2.header')
            <!-- end Topbar -->

            <!-- Start Content-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">{{ $title ?? '' }}</h4>
                        </div>
                    </div>
                </div>
                @yield('content2')
            </div>
            <!-- container -->

        </div>
        <!-- content -->

        <!-- Footer Start -->
        @include('layout2.footer')
        <!-- end Footer -->
    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->

<!-- Right Sidebar -->
<div class="right-bar">

    <div class="rightbar-title">
        <a href="javascript:void(0);" class="right-bar-toggle float-right">
            <i class="dripicons-cross noti-icon"></i>
        </a>
        <h5 class="m-0">Cài đặt</h5>
    </div>

    <div class="rightbar-content h-100" data-simplebar>

        <div class="p-3">
            <div class="alert alert-warning" role="alert">
                <strong>Chỉnh sửa </strong> các cài đặt hiển thị tại đây
            </div>

            <!-- Settings -->
            <h5 class="mt-3">Màu sắc </h5>
            <hr class="mt-1"/>

            <div class="custom-control custom-switch mb-1">
                <input type="radio" class="custom-control-input" name="color-scheme-mode" value="light"
                       id="light-mode-check"
                       checked/>
                <label class="custom-control-label" for="light-mode-check">Light Mode</label>
            </div>

            <div class="custom-control custom-switch mb-1">
                <input type="radio" class="custom-control-input" name="color-scheme-mode" value="dark"
                       id="dark-mode-check"/>
                <label class="custom-control-label" for="dark-mode-check">Dark Mode</label>
            </div>

            <!-- Width -->
            <h5 class="mt-4">Chế độ</h5>
            <hr class="mt-1"/>
            <div class="custom-control custom-switch mb-1">
                <input type="radio" class="custom-control-input" name="width" value="fluid" id="fluid-check" checked/>
                <label class="custom-control-label" for="fluid-check">Fluid</label>
            </div>
            <div class="custom-control custom-switch mb-1">
                <input type="radio" class="custom-control-input" name="width" value="boxed" id="boxed-check"/>
                <label class="custom-control-label" for="boxed-check">Boxed</label>
            </div>


            <button class="btn btn-primary btn-block mt-4" id="resetBtn">Mặc định</button>


        </div> <!-- end padding-->

    </div>
</div>

<div class="rightbar-overlay"></div>
<!-- /Right-bar -->

<!-- bundle -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{asset('/js/vendor.min.js')}}"></script>
<script src="{{asset('/js/app.min.js')}}"></script>
<script src="{{asset('/js/vendor/apexcharts.min.js')}}"></script>
<script src="{{asset('/js/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('/js/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('/js/helper.js')}}"></script>
<script>
    $('.btn-delete').click(function (e) {
        e.preventDefault();
        var result = confirm("Bạn có chắc chắn muốn thực hiện hành động này không?");

        if (result == true) {
            document.location.href = $(this).attr('href');
        } else {

        }
    });
</script>
<!-- third party js ends -->

<!-- demo app -->
@stack('js2')
<script src="assets/js/pages/demo.dashboard.js"></script>

<!-- end demo js-->
</body>
</html>
