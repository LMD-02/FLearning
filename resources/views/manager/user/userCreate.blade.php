@extends('layout2.master')
@push('css2')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
@endpush
@section('content2')
    <div class="row">
        <div class="col-12">
            <form id="form_create_post" method="post" action="" enctype="multipart/form-data">
                <div class="card p-3">
                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Tên người dùng</label>
                        <input type="text" name="name" id="simpleinput" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="example-email" class="form-label">Email</label>
                        <input type="email" name="email" id="example-email" class="form-control" placeholder="Email">
                    </div>

                    <div class="mb-3">
                        <label for="example-palaceholder" class="form-label">Số điện thoại</label>
                        <input type="number" name="phone" id="example-palaceholder" class="form-control"
                               placeholder="placeholder">
                    </div>

                    <div class="mb-3">
                        <label for="example-palaceholder" class="form-label">Địa chỉ</label>
                        <input type="text" name="address" id="example-palaceholder" class="form-control"
                               placeholder="placeholder">
                    </div>


                    <div class="mb-3">
                        <label for="example-control" class="form-label">Vai trò</label>
                        <select name="role" class="form-control">
                            <option value="1">Sinh viên</option>
                            <option value="2">Giáo viên</option>

                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="example-control" class="form-label">Giới tính</label>
                        <select name="gender" class="form-control">
                            <option value="1">Nam</option>
                            <option value="2">Nữ</option>

                        </select>
                    </div>


                    <div class="mb-3">
                        <label for="example-date" class="form-label">Ngày sinh</label>
                        <input class="form-control" id="example-date" type="date" name="date">
                    </div>

                    <div class="mb-3">
                        <label for="example-image" class="form-label">Ảnh tiêu đề</label>
                        <input type="file" alt="ảnh" accept="image/png, image/jpeg, image/gif"
                               onchange="chooseImage(this)" class="form-control-file" id="image" name="image">
                    </div>
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
