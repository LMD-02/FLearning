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
                                <select class="custom-select select-filter-course" id="select-course" name="data">
                                    <option value="0" selected>All...</option>
                                    @foreach($subjects as $item)
                                        <option value="{{$item->id}}" {{request()->get('data') == $item->id ? 'selected' : ''}}>
                                            {{$item->name}}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="float-right col">
                                <a href="{{route('admin.chapter.create')}}" id="btn-create-classe" class="btn btn-success float-right">
                                    Tạo chương học
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
                            <th>Môn học</th>
                            <th>Tên chương</th>
                            <th>Số bài trong chương</th>
                            <th style="width:10%">#</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $key => $item)
                            <tr>
                                <td style="color:black">
                                    <a href="">
                                        {{$key +1 }}
                                    </a>
                                </td>
                                <td>
                                    {{$item->subject->name}}
                                </td>
                                <td style="color:green">
                                    {{$item->name}}
                                </td>
                                <td >
                                    {{$item->count}} bài học
                                </td>

                                <td>
                                    <a href="{{route('admin.subject.session',['id'=> $item->id])}}" class="btn btn-info">Quản lý</a>
                                    <a href='{{route('admin.chapter.edit',['id'=> $item->id])}}' id="btn-edit-course" class="btn btn-primary">
                                        <i>Sửa </i>
                                    </a>
                                    <a href='{{route('admin.chapter.delete',['id'=> $item->id])}}' id="btn-edit-course" class="btn btn-danger btn-delete">
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

            $(document).ready(async function() {
                $('.select-filter-course, .select-filter-student,.select-filter-major').change(function(){
                    $('#form-filter').submit();
                });
            });
        </script>
    @endpush
@endsection()
