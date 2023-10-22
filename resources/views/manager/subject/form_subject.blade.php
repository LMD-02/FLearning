@extends('layout2.master')
@push('css2')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
@endpush
@section('content2')
    <div class="row">
        <div class="col-12">
            <div class="card p-4">
                <div class="card-body">
                    <form action="" id="" method="post" class="d-flex flex-column">
                        @csrf
                        <div class="form-group d-flex mb-3">
                            <div class="col-md-4  ">
                                <label for="name">Tên môn học</label>
                                <input type="text" value="{{$data->name ?? ''}}" name="name" value="" id="name" class="form-control"/>
                            </div>
                                <div class="col-md-4 mb-3">
                                    <label for="example-fileinput" class="form-label">Ảnh đại diện môn học</label>
                                    <input type="file" id="example-fileinput" class="form-control">
                                </div>
                        </div>
                        <button class="mt-2 btn btn-primary w-15" id="btn-update-course" >Tạo</button>
                    </form>
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
