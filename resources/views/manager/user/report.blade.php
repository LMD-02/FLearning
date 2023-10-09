@extends('layout2.master')
@push('css2')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content2')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header " >
                    <form id="form-filter">
                        <div class="form-group d-flex">
                            <div class="input-group mb-3 w-15 mr-3">
                                <label for="select-course">Tìm kiếm</label>
                                <select class="custom-select select-filter-course" id="select-course" name="course" >
                                    <option selected>All...</option>
                                    <option>
                                        Nguyễn Văn A
                                    </option>
                                </select>
                            </div>
                            {{--                            <div class="float-right col">--}}
                            {{--                                <a href="" id="btn-create-classe" class="btn btn-success float-right">--}}
                            {{--                                    Tạo sinh viên--}}
                            {{--                                </a>--}}
                            {{--                            </div>--}}
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-centered mb-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Thông tin người phản hồi</th>
                            <th>Lý do phản hồi</th>
                            <th>Thời gian</th>
                            <th>Trạng thái</th>
                            <th style="">#</th>
                        </tr>
                        </thead>
                        <tbody>
                        @for($i = 1; $i < 10 ; $i++)
                            <tr>
                                <td style="color:black">
                                    <a href="">
                                        {{$i }}
                                    </a>
                                </td>
                                <td style="">
                                    Tên:
                                    <span style="color:black">Nguyễn Văn A {{$i}}</span>
                                    <br>
                                    Email:
                                    <span style="color:black">taikhoan{{$i}}@gmail.com</span>
                                </td>
                                <td>
                                    Vấn đề về chức năng làm bài test
                                </td>
                                <td>
                                    2{{$i}} phút trước
                                </td>
                                <td>
                                    @if($i > 3)
                                        <p style="color:green">Đã trả lời</p>
                                        @else
                                        <p style="color:#168ee5">Mới</p>
                                    @endif
                                </td>
                                <td>
                                    <a href='' id="btn-edit-course" class="btn btn-info">
                                        Xem chi tiết
                                    </a>
                                </td>
                            </tr>
                        @endfor
                        </tbody>
                    </table>
                    {{--                    <nav>--}}
                    {{--                        <ul class="pagination pagination-rounded mb-0">--}}
                    {{--                            {{ $data->links() }}--}}
                    {{--                        </ul>--}}
                    {{--                    </nav>--}}
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
