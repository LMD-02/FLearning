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


                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="col-md-12 ">
                        <!-- project card -->
                        <div class="card card-body  d-flex justify-content-center w-100"
                             style="justify-content: center !important;">
                            <div class="text-center">
                                <strong>Top xếp hạng bài làm.</strong> <br><br>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên</th>
                                        <th>Điểm</th>
                                        <th>Thơi gian</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($i = 0)

                                    @foreach($topStudents as $key => $item)
                                        @php($i++)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$item->user->name}} <br> ({{$item->user->email}})</td>
                                            <td>{{$item->point}} / 10</td>
                                            <td>{{$item->created_at}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>


                                </table>
                            </div> <!-- end card-body-->

                        </div> <!-- end card-->
                    </div>

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
