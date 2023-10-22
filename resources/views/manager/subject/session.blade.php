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
                        <div class="form-group d-flex align-items-start">
                            <div class="float-right col w-25">
                                <a href="{{route('admin.session.create',['id' => $chapter->id])}}" id="btn-create-classe" class="btn btn-success float-right">
                                    Tạo buổi học
                                </a>
                            </div>
                        </div>
                        <div class="input-group mb-3 w-35 mr-3">
                            <div class="font-weight-bold">
                                Môn học: {{$chapter->subjectname}} <br>
                                Chương học: {{$chapter->name}}
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-centered mb-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Buổi học</th>
                            <th style="width:10%">#</th>
                            <th style="width:10%">#</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $key=>$item)
                            <tr>
                                <td style="color:black">
                                    <a href="">
                                        {{$key+1 }}
                                    </a>
                                </td>
                                <td style="color:green">
                                    {{$item->name}}
                                </td>
                                <td>
                                    <a href='' id="btn-edit-course" class="btn btn-info">
                                        <i>Xem </i>
                                    </a>
                                </td>
                                <td>
                                    <a href='{{route('admin.session.edit',['id' => $item->id])}}' id="btn-edit-course" class="btn btn-primary">
                                        <i>Sửa </i>
                                    </a>
                                    <a href='' id="" class="btn btn-danger">
                                        <i>Xóa </i>
                                    </a>
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

            // $(document).ready(async function() {
            //     $('.select-filter-course, .select-filter-student,.select-filter-major').change(function(){
            //         $('#form-filter').submit();
            //     });
            // });
        </script>
    @endpush
@endsection()
