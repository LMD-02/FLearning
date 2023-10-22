@extends('layout.master')
@push('css')

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
                            <h4 class="page-title">Exam</h4>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xxl-8 col-lg-8">
                        <!-- project card -->
                        <div class="card d-block">
                            <form action="{{route('student.exam.check')}}" method="post">
                            <div class="card-body">
                                @csrf
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h3 class="mt-0">Bài thi: {{$exam['title']}}</h3>
                                    <span> {{$exam['count']}} câu</span>
                                    <!-- project title-->
                                </div>
                                <div>
                                    @foreach($exam['data'] as $key => $item)
                                        <div class="item mt-3">
                                            <div>Câu {{$key + 1}}: {{$item['q']}}</div>
                                            <div class="mt-1">
                                                <div class="form-check">
                                                    <input type="radio" name="q{{$key+1}}" value="a1" class="form-check-input">
                                                    <label class="form-check-label" >{{$item['a1']}}</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" id="" name="q{{$key+1}}" value="a2" class="form-check-input">
                                                    <label class="form-check-label" >{{$item['a2']}}</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" id="" name="q{{$key+1}}" value="a3" class="form-check-input">
                                                    <label class="form-check-label" >{{$item['a3']}}</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" id="" name="q{{$key+1}}" value="a4" class="form-check-input">
                                                    <label class="form-check-label" >{{$item['a4']}}</label>
                                                </div>
                                            </div>

                                        </div>
                                    @endforeach
                                    <div class="d-flex justify-content-center mt-5">
                                        <button class="btn btn-success">Nộp bài</button>

                                    </div>
                                </div>





                            </div> <!-- end card-body-->
                            </form>
                        </div> <!-- end card-->


                        <!-- end card-->
                    </div>

                    <div class="col-lg-4 col-xxl-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Các bài khác</h5>
                                <div dir="ltr">
                                    <div class="card mb-1 shadow-none border">
                                        <div class="p-2">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="avatar-sm">
                                                            <span class="avatar-title rounded" style="    background-color: rgb(66,210,157);">
                                                                Exam
                                                            </span>
                                                    </div>
                                                </div>
                                                <div class="col ps-0">
                                                    <a href="javascript:void(0);" class="text-muted fw-bold">Giới thiệu về hệ csdl</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-1 shadow-none border">
                                        <div class="p-2">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="avatar-sm">
                                                            <span class="avatar-title rounded" style="    background-color: rgb(66,210,157);">
                                                                Exam
                                                            </span>
                                                    </div>
                                                </div>
                                                <div class="col ps-0">
                                                    <a href="javascript:void(0);" class="text-muted fw-bold">Giới thiệu về hệ csdl</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-1 shadow-none border">
                                        <div class="p-2">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="avatar-sm">
                                                            <span class="avatar-title rounded" style="    background-color: rgb(66,210,157);">
                                                                Exam
                                                            </span>
                                                    </div>
                                                </div>
                                                <div class="col ps-0">
                                                    <a href="javascript:void(0);" class="text-muted fw-bold">Giới thiệu về hệ csdl</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end card-->


                    </div>
                </div>
                <!-- end row-->


            </div> <!-- container -->

        </div> <!-- content -->



    </div>
@endsection()
