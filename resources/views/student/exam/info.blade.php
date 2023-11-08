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
                            <h4 class="page-title">Kết quả bài test: {{$exam['title']}}</h4>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12 ">
                        <!-- project card -->
                        <div class="card card-body  d-flex justify-content-center w-100"
                             style="justify-content: center !important;">
                            <div class="text-center">
                                <strong>Bạn đã hoàn thành bài test.</strong> <br><br>

                                <strong>Kết quả của bạn:</strong><br>
                                {{$info}}
                                <br>

                            </div> <!-- end card-body-->
                            <div class="d-flex justify-content-center mt-3">
                                <a class="btn btn-primary" style="margin-right:10px"
                                   href="{{route('student.exam.detail')}}">Thử lại</a>
                                <a class="btn btn-info" href="{{route('student.exam')}}">Làm bài khác</a>

                            </div>

                        </div> <!-- end card-->
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12 ">
                        <!-- project card -->
                        <div class="card card-body  d-flex justify-content-center w-100"
                             style="justify-content: center !important;">
                            <div class="text-center">
                                <strong>Top xếp hạng bài làm.</strong> <br><br>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên</th>
                                        <th>Điểm</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($i = 0)

                                    @foreach($topStudents as $key => $item)
                                        @php($i++)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$item->user->name}}</td>
                                            <td>{{$item->point}} / 10</td>
                                        </tr>
                                    @endforeach
                                    </tbody>


                            </table>
                            </div> <!-- end card-body-->

                        </div> <!-- end card-->
                    </div>

                </div>
                <!-- end row-->


            </div> <!-- container -->

        </div> <!-- content -->


    </div>
@endsection()
