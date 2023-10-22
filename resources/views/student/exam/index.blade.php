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
                                    <a href="apps-projects-details.html" class="text-title">Bài test môn Cơ sở dữ liệu
                                    </a>
                                </h4>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted font-13 my-3">20 câu trắc nghiệm
                                    </p>
                                    <a class="btn btn-primary" href="{{route('student.exam.detail')}}">Làm bài thi</a>
                                </div>

                            </div> <!-- end card-body-->

                        </div> <!-- end card-->
                    </div>

                </div>
                <!-- end row-->


            </div> <!-- container -->

        </div> <!-- content -->



    </div>
@endsection()
