@extends('layout2.master')
@push('css2')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
@endpush
@section('content2')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header ">
                    <form id="form-filter">
                        <div class="form-group d-flex">
                            <div class="input-group mb-3 w-15 mr-3">
                                <label for="select-course">Theo buổi học</label>
                                <select class="custom-select select-filter-course" id="select-course" name="data" >
                                    <option value="0" selected>All...</option>
                                    @foreach($sessionData as $item)
                                        <option value="{{$item->id}}" {{request()->get('data') == $item->id ? 'selected' : ''}}>
                                            {{$item->name}}
                                        </option>
                                    @endforeach


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
                            <th>Thông tin người bình luận</th>
                            <th>Nội dung bình luận</th>
                            <th>Bài học bình luận</th>
                            <th>Thời gian</th>
                            <th style="">#</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $key => $item)
                            <tr>
                                <td style="color:black">
                                    <a href="">
                                        {{$key + 1 }}
                                    </a>
                                </td>
                                <td style="">
                                    Tên:
                                    <span style="color:black">{{$item->user->name}}</span>
                                    <br>
                                    Email:
                                    <span style="color:black">{{$item->user->email}}</span>
                                </td>
                                <td>
                                    {{$item->content}}
                                </td>
                                <td> {{$item->session->name}} -  {{$item->chapter->name}} - {{$item->subject->name}}</td>
                                <td>
                                    {{$item->created_at}}
                                </td>
                                {{--                                <td>--}}
                                {{--                                    @if($i <=3 )--}}
                                {{--                                        <p style="color:#168ee5">Mới</p>--}}
                                {{--                                    @elseif($i <= 6)--}}
                                {{--                                        <p style="color:green">Đã duyệt</p>--}}
                                {{--                                        @else--}}
                                {{--                                        <p style="color:#efa71b">Đã ẩn</p>--}}
                                {{--                                    @endif--}}
                                {{--                                </td>--}}
                                <td>
                                        <a class="btn btn-danger btn-delete" href="{{route('admin.command.delete',['id' => $item->id])}}" style="color:white">Xóa bình luận</a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                                        <nav>
                                            <ul class="pagination pagination-rounded mb-0">
                                                {{ $data->links() }}
                                            </ul>
                                        </nav>
                </div>
            </div>
        </div>
    </div>
    @push('js2')
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $('#select-course').select2();

            $(document).ready(async function() {
                $('.select-filter-course, .select-filter-student,.select-filter-major').change(function(){
                    $('#form-filter').submit();
                });
            });
        </script>
    @endpush
@endsection()
