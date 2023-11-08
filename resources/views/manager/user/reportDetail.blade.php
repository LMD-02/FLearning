@extends('layout2.master')
@push('css2')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content2')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header " >
                </div>
                <div class="card-body row">
                   <div class="col-5">
                       <div class="card text-center">
                           <div class="card-body">
{{--                               <img src="assets/images/users/avatar-1.jpg" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">--}}

                               <h4 class="mb-0 mt-2">{{$data->name}}</h4>
                               <p class="text-muted font-14">({{$data->email}})</p>

{{--                               <button type="button" class="btn btn-success btn-sm mb-2">Follow</button>--}}
{{--                               <button type="button" class="btn btn-danger btn-sm mb-2">Message</button>--}}

                               <div class="text-start mt-3">
                                   <h4 class="font-13 text-uppercase">Tiêu đề :</h4>
                                   <p class="text-muted font-13 mb-3">
                                     {{$data->title}}
                                   </p>
                               </div>
                               <div class="text-start mt-3">
                                   <h4 class="font-13 text-uppercase">Nội dung chi tiết :</h4>
                                   <p class="text-muted font-13 mb-3">
                                       {{$data->detail}}
                                   </p>
                               </div>
                               <div class="d-flex justify-content-between mt-5">
                                   <p class="text-muted font-13 mb-3">
                                       Trạng thái:  @if($data->status == 0)
                                           <span class="badge badge-danger">Chưa xử lý</span>
                                        @else
                                             <span class="badge badge-success">Đã xử lý</span>
                                                        @endif
                                   </p>
                                   <p class="text-muted font-13 mb-3">
                                       @if($data->status == 0)
                                       Thời gian gửi:
                                           <span class="badge badge-info">{{$data->created_at}}</span>
                                       @else
                                           Thời gian gửi:
                                               <span class="badge badge-info">{{$data->created_at}}</span> <br>

                                               Phản hồi vào:
                                                   <span class="badge badge-success">{{$data->updated_at}}</span>
                                       @endif
                                   </p>
                               </div>
                           </div> <!-- end card-body -->
                       </div>
                   </div>
                    <div class="col-7">

                            <div class="tab-content">
                                <!-- end about me section content -->

                                <div class="tab-pane show active" id="timeline" role="tabpanel">

                                    <!-- comment box -->
                                    <div class="border rounded mb-3">
                                        <form action="{{route('admin.report.send',['id' => $data->id])}}" method="post" class="comment-area-box">
                                            @csrf
                                            <textarea rows="3" class="form-control border-0 resize-none" name="mess" placeholder="Viết phản hồi ở đây...."></textarea>
                                            <div class="p-2 bg-light d-flex justify-content-between align-items-center">
                                                <div>
{{--                                                    <a href="#" class="btn btn-sm px-2 font-16 btn-light"><i class="mdi mdi-account-circle"></i></a>--}}
{{--                                                    <a href="#" class="btn btn-sm px-2 font-16 btn-light"><i class="mdi mdi-map-marker"></i></a>--}}
{{--                                                    <a href="#" class="btn btn-sm px-2 font-16 btn-light"><i class="mdi mdi-camera"></i></a>--}}
{{--                                                    <a href="#" class="btn btn-sm px-2 font-16 btn-light"><i class="mdi mdi-emoticon-outline"></i></a>--}}
                                                </div>
                                                <button type="submit" class="btn btn-sm btn-dark waves-effect">Gửi phàn hồi</button>
                                            </div>
                                        </form>
                                    </div> <!-- end .border-->


                                </div>
                                <!-- end timeline content-->

                                <!-- end settings content-->

                            </div> <!-- end tab-content -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('js2')
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $('#select-course').select2();

            // $(document).ready(async function() {
            //     $('.select-filter-course, .select-filter-student,.select-filter-major').change(function(){
            //         $('#form-filter').submit();
            //     });
            // });
        </script>
    @endpush
@endsection()
