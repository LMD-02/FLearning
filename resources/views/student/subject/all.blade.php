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
                            <h4 class="page-title">Danh sách môn học</h4>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div dir="ltr" class="row d-flex justify-content-between">
                                    @if($subject->count() == 0)
                                        <div class="col-12">
                                            <div class="alert alert-danger" role="alert">
                                                <strong>Chưa có môn học nào </strong>
                                            </div>
                                        </div>
                                    @endif
                                        <div class="d-flex flex-column w-100">
                                            <div class="row p-2">
                                                @foreach($subject as $key => $item)
                                                    <div class="card col-3 mb-1 shadow-none border">
                                                        <div class="p-2">
                                                            <div class="row ">
                                                                <div class="col-auto">
                                                                    <img src="{{asset('images/upload/'.$item->image)}}"
                                                                         alt="user-image" width="70px" height="70px"  style="object-fit:cover" class="rounded-circle">

                                                                </div>
                                                                <div class="col ps-0">
                                                                    <a href="javascript:void(0);"
                                                                       class="text-muted fw-bold">Tên môn học
                                                                        <br><strong>
                                                                            {{$item->name}}
                                                                        </strong></a>

                                                                    <div class="d-flex">
                                                                        <a href="{{route('student.subject',['id' => $item->id])}}"
                                                                           class="btn btn-success mt-2"
                                                                           style="margin-right:8px;">
                                                                            <i class="mdi mdi-book-open-outline"></i>
                                                                            Xem môn học
                                                                        </a>
                                                                    </div>

                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            @if($subject->count() > 0)
                                                <nav>
                                                    <ul class="pagination pagination-rounded mb-0">
                                                        {{ $subject->links() }}
                                                    </ul>
                                                </nav>
                                            @endif
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
