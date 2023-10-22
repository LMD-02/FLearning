@extends('layout.master')
@push('css')
    <style>
        .side-nav-second-level::-webkit-scrollbar {
            width: 6px;
        !important;
        }

        .side-nav-second-level::-webkit-scrollbar-track {
            box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        !important;
        }

        .side-nav-second-level::-webkit-scrollbar-thumb {
            background-color: rgba(93, 125, 250, 0.8);
        !important;
            outline: 1px solid #2e8cec;
        !important;
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
                            <h4 class="page-title">{{$subjectName}}</h4>
                        </div>
                    </div>
                </div>


                <div class="row">
                    @foreach($chapter as $key => $value)
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
                                        <a href="apps-projects-details.html" class="text-title">{{$value->name}}
                                        </a>
                                    </h4>

                                    <p class="text-muted font-13 my-3">{{$value->description}}
                                    </p>
                                    <ul class="site-menu side-nav"
                                        style="background: #313a46; border-radius:8px;padding:8px">
                                        <li class="side-nav-item">
                                            <a href="javascript: void(0);" class="side-nav-link active"
                                               style="padding:8px 0 !important">
                                                <i class="mdi mdi-format-list-bulleted-type text-muted"></i>
                                                <span> {{$value->countSession}} Bài học </span>
                                                <span class="menu-arrow"></span>
                                            </a>
                                            <ul class="side-nav-second-level mm-collapse" aria-expanded="true"
                                                style="max-height: 300px;overflow:auto">
                                                @foreach($value->listSession as $item)
                                                    <li>
                                                        <a href="{{route('student.session',['id' => $item->id])}}" class="p-2">{{$item->name}}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>

                                </div> <!-- end card-body-->

                            </div> <!-- end card-->
                        </div>

                    @endforeach


                </div>
                <!-- end row-->


            </div> <!-- container -->

        </div> <!-- content -->


    </div>
@endsection()
