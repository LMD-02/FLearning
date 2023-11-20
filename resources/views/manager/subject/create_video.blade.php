@extends('layout2.master')
@push('css2')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
@endpush
@section('content2')
    <div class="row">
        <div class="col-12">
            <form id="form_create_post" method="post" action="{{route('admin.video.store')}}" enctype="multipart/form-data">
                <div class="card p-3">
                    @csrf
                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Tiêu đề video </label>
                        <input type="text" name="name" id="simpleinput" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Đường dẫn </label>
                        <input type="text" name="link" id="" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="example-image" class="form-label">Ảnh tiêu đề</label>
                        <input type="file" alt="ảnh" accept="image/png, image/jpeg, image/gif"
                               name="image">
                    </div>
                    <div class="mb-3">
                        <label for="example-image" class="form-label">Môn học</label>
                        <select name="subject" class="form-control">
                            @foreach($subject as $key => $value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                </div>
            </form>
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
