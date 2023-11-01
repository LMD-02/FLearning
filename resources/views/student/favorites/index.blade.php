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
                            <h4 class="page-title">Danh sách bài học yêu thích</h4>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div dir="ltr" class="row d-flex justify-content-between">
                                    @if($favorites->count() == 0)
                                        <div class="col-12">
                                            <div class="alert alert-danger" role="alert">
                                                <strong>Chưa có bài học nào trong danh sách yêu thích</strong>
                                            </div>
                                        </div>
                                    @endif
                                    @foreach($favorites as $key => $item)
                                        <div class="card col-4 mb-1 shadow-none border">
                                            <div class="p-2">
                                                <div class="row ">
                                                    <div class="col-auto">
                                                        <div class="avatar-sm d-flex justify-content-center align-items-center" style="border:1px solid #ccc; width:60px; height:60px" >
                                                            <img style="width: 56px;height: 56px; object-fit:contain" src="{{asset( 'images/upload/'.$item->subject->image)}}">
                                                        </div>
                                                    </div>
                                                    <div class="col ps-0">
                                                        <a href="javascript:void(0);" class="text-muted fw-bold">Môn học: <strong>
                                                                {{$item->subject->name}}
                                                            </strong></a>
                                                        <div>
                                                            <a href="javascript:void(0);" class="text-muted fw-bold">Chương: <strong>
                                                                    {{$item->chapeter->name}}
                                                                </strong></a>
                                                        </div>

                                                        <div>
                                                            <a href="javascript:void(0);" class="text-muted fw-bold">Bài học: <strong>
                                                                    {{$item->name}}
                                                                </strong></a>
                                                        </div>
                                                        <div class="d-flex">
                                                            <a href="{{route('student.session',['id' => $item->id])}}" class="btn btn-info mt-2" style="margin-right:8px;">
                                                                <i class="mdi mdi-book-open-outline"></i>
                                                                Xem bài học
                                                            </a>
                                                            <a href="{{route('favourite.save',['id' => $item->id,'type' => -1])}}" class="btn btn-danger mt-2">
                                                                <i class="mdi mdi-heart-off"></i>
                                                                Bỏ yêu thích
                                                            </a>
                                                        </div>

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
