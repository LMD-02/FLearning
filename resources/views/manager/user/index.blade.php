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
                                                        <div class="float-right col">
                                                            <a href="{{route('admin.user.create')}}" id="btn-create-classe" class="btn btn-success float-right">
                                                                Tạo người dùng
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
                            <th>Thông tin người dùng</th>
                            <th>Email</th>
                            <th>Ngày tạo</th>
                            <th style="width:10%">Sửa</th>
                            <th style="width:10%">Xóa</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $key => $item)
                            <tr>
                                <td style="color:black">
                                    <a href="">
                                        {{$key+1 }}
                                    </a>
                                </td>
                                <td style="">
                                    Tên:
                                    <span style="color:black">{{$item->name}}</span>
                                    <br>
                                    Ngày sinh:
                                    <span style="color:black">{{$item->birthday}}</span>
                                    <br>
                                    <span >Địa chỉ:</span>
                                    <span style="color:black">{{$item->address}}</span>
                                    <br>
                                    @if($item->role == 2)
                                        <span >Vai trò:</span>
                                        <span style="color:#5f5fef">Giáo viên</span>
                                        @else
                                        <span >Vai trò:</span>
                                        <span style="color:#059927">Người dùng</span>
                                    @endif
                                </td>
                                <td style="color:green">
                                    {{$item->email}}}
                                </td>
                                <td>
                                    {{$item->created_at}}
                                <td>
                                    <a href="{{route('admin.user.edit',["id"=>$item->id])}}" id="btn-edit-course" class="btn btn-primary">
                                        <i>Sửa </i>
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-danger btn-delete" href="{{route('admin.user.delete',["id"=>$item->id])}}" >
                                        <i>Xóa</i>
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
