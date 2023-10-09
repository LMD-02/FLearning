@extends('layout.master')
@push('css')
    <style>
        .side-nav-second-level::-webkit-scrollbar {
            width: 6px; !important;
        }

        .side-nav-second-level::-webkit-scrollbar-track {
            box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3); !important;
        }

        .side-nav-second-level::-webkit-scrollbar-thumb {
            background-color: rgba(93, 125, 250, 0.8); !important;
            outline: 1px solid #2e8cec; !important;
            border-radius: 8px;
        }
    </style>
@endpush
@section('content')
    <div class="content-page" style="margin:0 10%;padding:0">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Cơ sở dữ liệu</h4>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-4 col-xxl-3">
                        <!-- project card -->
                        <div class="card d-block">
                            <div class="card-body">
                                <div class="dropdown card-widgets">
                                    <div class="dropdown-menu dropdown-menu-end">

                                    </div>
                                </div>
                                <!-- project title-->
                                <h4 class="mt-0">
                                    <a href="apps-projects-details.html" class="text-title">Chương 1: Giới thiệu tổng quan về
                                        CSDL
                                    </a>
                                </h4>

                                <p class="text-muted font-13 my-3">Chương này sẽ giới thiệu cơ bản cho các bạn hiểu thế nào là một cơ sở dữ liệu, hệ cơ sở dữ liệu, hệ quản trị cơ sở dữ liệu ...
                                </p>
                                    <ul class="site-menu side-nav" style="background: #313a46; border-radius:8px;padding:8px">
                                        <li class="side-nav-item">
                                            <a href="javascript: void(0);" class="side-nav-link active" style="padding:8px 0 !important">
                                                <i class="mdi mdi-format-list-bulleted-type text-muted"></i>
                                                <span> 4 Bài học </span>
                                                <span class="menu-arrow"></span>
                                            </a>
                                            <ul class="side-nav-second-level mm-collapse" aria-expanded="true" style="max-height: 300px;overflow:auto">
                                                <li>
                                                    <a href="" class="p-2">Bài 1: Giới thiệu cơ sở dữ liệu</a>
                                                </li>
                                                <li>
                                                    <a href="" class="p-2">Bài 2: Giới thiệu hệ cơ sở dữ liệu</a>
                                                </li>
                                                <li>
                                                    <a href="" class="p-2">Bài 3: Giới thiệu hệ cơ sở dữ liệu</a>
                                                </li>
                                                <li>
                                                    <a href="" class="p-2">Bài 4: Giới thiệu hệ cơ sở dữ liệu</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>

                            </div> <!-- end card-body-->

                        </div> <!-- end card-->
                    </div>

                </div>
                <!-- end row-->


            </div> <!-- container -->

        </div> <!-- content -->



    </div>
@endsection()
