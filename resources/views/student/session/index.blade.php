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
                            <h4 class="page-title">{{$session->subject->name}} - {{$session->chapeter->name}}</h4>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xxl-8 col-lg-8">
                        <!-- project card -->
                        <div class="card d-block">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h3 class="mt-0">{{$session->name}}</h3>

                                    <!-- project title-->
                                </div>
                                <div>
                                    <div class="card p-4 d-flex justify-content-center">
                                        <div>
                                              {!! json_decode($session->detail,true)  !!}
                                        </div>
                                    </div>
                                </div>





                            </div> <!-- end card-body-->

                        </div> <!-- end card-->

                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 mb-3">Bình luận (258)</h4>

                                <textarea class="form-control form-control-light mb-2" placeholder="Write message" id="example-textarea" rows="3"></textarea>
                                <div class="text-end w-100 d-flex justify-content-end" style="">
                                    <div class="btn-group mb-2 ms-2">
                                        <button type="button" class="btn btn-primary btn-sm">Gửi bình luận</button>
                                    </div>
                                </div>

                                <div class="d-flex align-items-start mt-2 flex-column">

                                    <div class="w-100 overflow-hidden mt-2">
                                        <h5 class="mt-0">Lê Thị A</h5>
                                       Bài học rất bổ ích, phù hợp

                                    </div>

                                    <div class="w-100 overflow-hidden mt-2">
                                        <h5 class="mt-0">Lê Thị B</h5>
                                        Bài học dễ hiểu , phù hợp

                                    </div>
                                </div>

                                <div class="text-center mt-2">
                                    <a href="javascript:void(0);" class="text-danger">Load more </a>
                                </div>
                            </div> <!-- end card-body-->
                        </div>
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
                                                                Bài 2
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
                                                                Bài 2
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
                                                                Bài 2
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

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Links</h5>

                                @foreach(json_decode($session->links,true) as $index => $link)
                                    @if($link != null)
                                        <div class="card mb-1 shadow-none border">
                                            <div class="p-2">
                                                <div class="row align-items-center">
                                                    <div class="col-auto">
                                                        <div class="avatar-sm">
                                                            <span class="avatar-title rounded">
                                                                Link
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col ps-0">
                                                        <a href="{{$link}}" target="_blank" class="text-muted fw-bold">Tài liệu {{$index+1}}</a>
                                                    </div>
                                                    <div class="col-auto">
                                                        <!-- Button -->
                                                        <a href="javascript:void(0);" class="btn btn-link btn-lg text-muted">
                                                            <i class="ri-download-2-line"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach



                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row-->


            </div> <!-- container -->

        </div> <!-- content -->



    </div>
@endsection()
