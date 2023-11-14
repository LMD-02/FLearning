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
                                <label for="select-course">Tìm kiếm</label>
                                <select class="custom-select select-filter-course" id="select-course" name="course">
                                    <option selected>All...</option>
                                    <option>
                                        Cơ sở dữ liệu
                                    </option>
                                </select>
                            </div>
                            <div class="float-right col">
                                <a href="{{route('admin.exam.create')}}" id="btn-create-classe" class="btn btn-success float-right">
                                    Tạo bài test
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-centered mb-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên bài thi</th>
                            <th>Số câu hỏi</th>
                            <th style="width:10%">#</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($exams as $key => $item)
                            <tr>
                                <td style="color:black">
                                    <a href="">
                                        {{$key+1 }}
                                    </a>
                                </td>
                                <td style="color:green">
                                    {{\GuzzleHttp\json_decode($item->details,true)['title']}}
                                </td>
                                <td >
                                    {{\GuzzleHttp\json_decode($item->details,true)['count']}} câu
                                </td>

                                <td>
                                    <a href="{{route('admin.exam.edit',['id' => $item->id])}}" id="btn-edit-course" class="btn btn-primary">
                                        <i>Sửa </i>
                                    </a>
                                    <a   href="{{route('admin.exam.delete',['id' => $item->id])}}" id="btn-edit-course" class="btn btn-danger btn-delete">
                                        <i>Xóa </i>
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                                        <nav>
                                            <ul class="pagination pagination-rounded mb-0">
                                                {{ $exams->links() }}
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

            // $(document).ready(async function() {
            //     $('.select-filter-course, .select-filter-student,.select-filter-major').change(function(){
            //         $('#form-filter').submit();
            //     });
            // });
        </script>
    @endpush
@endsection()
