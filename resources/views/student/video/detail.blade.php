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
                    <div class="col-12 d-flex justify-content-between">
                        <div class="page-title-box">
                            <h4 class="page-title">{{$video->name}}</h4>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xxl-8 col-lg-8">
                        <!-- project card -->
                        <div class="card d-block">
                            <div class="card-body w-100 d-flex; align-center">
{{--                                {!! $video->link !!}--}}
                                <iframe width="100%" height="600px" src="{{$video->link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </div> <!-- end card-body-->

                        </div> <!-- end card-->

                    </div>

                    <div class="col-lg-4 col-xxl-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Các video khác</h5>
                                <div dir="ltr">
                                    @foreach($more as $key => $value)
                                        <div class="card mb-1 shadow-none border">
                                            <div class="p-2">
                                                <div class="row align-items-center">
                                                    <div class="col-auto">
                                                        <div class="avatar-sm">
                                                            <span class="avatar-title rounded"
                                                                  style="    background-color: rgb(66,210,157);">
                                                                File
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col ps-0">
                                                        <a href="{{route('student.video.detail',['id' => $value->id])}}" class="text-muted fw-bold">{{$value->name}}</a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

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
