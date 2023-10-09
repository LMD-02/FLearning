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
                            <th>Thông tin người dùng</th>
                            <th>Email</th>
                            <th>Ngày tạo</th>
                            <th style="width:10%">Sửa</th>
                            <th style="width:10%">Xóa</th>
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
                                Ngày sinh:
                                <span style="color:black">0{{$i}}/0{{$i}}/200{{$i}}</span>
                                <br>
                                <span >Địa chỉ:</span>
                                <span style="color:black">số {{$i}} Thành phố Hà nội</span>
                            </td>
                            <td style="color:green">
                                taikhoan{{$i}}@gmail.com
                            </td>
                            <td>
                                1{{$i}} phút trước
                            <td>
                                <a href='' id="btn-edit-course" class="btn btn-primary">
                                    <i>Sửa </i>
                                </a>
                            </td>
                            <td>
                                <form method="post" action=''>
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" name="delete" class="btn btn-danger">
                                        <i>Xóa</i>
                                    </button>
                                </form>
                            </td>
                            <td>
                                <a href='' id="btn-edit-course" class="btn btn-info">
                                    Reset mật khẩu
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
