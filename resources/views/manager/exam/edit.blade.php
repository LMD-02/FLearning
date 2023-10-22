@extends('layout2.master')
@push('css2')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
@endpush
@section('content2')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="{{route('admin.exam.update')}}" method="post">
                    @csrf
                    <div class="card-header ">
                        <div class="form-group d-flex justify-content-between w-100">
                            <div class="input-group mb-3 w-25 mr-3 d-flex flex-column">
                                <label class="" for="name-exam">Nhập tiêu đề bài thi
                                    <input type="text" name="exam_name" class="form-control" id="name-exam"
                                           value="{{$exam['title']}}"
                                           placeholder="Tiêu đề bài thi">
                                </label>
                                <label class="d-flex align-items-center" for="number-question">
                                    <input type="number" name="count"  class="form-control w-75" id="number-question"
                                           value="{{$exam['count']}}"
                                           placeholder="Số câu hỏi">
                                    <button type="button" class="btn btn-primary js-render" >Tạo mới </button>
                                </label>

                            </div>
                            <div>
                                <button type="submit" class="btn btn-success">Sửa bài thi</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="id" value="{{$id}}"
                        @foreach($exam['data'] as $key =>$item)
                            <strong style="font-size:20px"> Câu {{$key+1}}</strong>
                            <div class="item mb-5 p-2 border">
                                <div class="row mb-3">
                                    <label for="" class="col-3 col-form-label" style="font-weight: bold">Câu hỏi
                                        {{$key+1}}</label>
                                    <div class="col-9">
                                        <input type="text" name="{{$key+1}}_q" class="form-control" id=""
                                               value="{{$item['q']}}"
                                               placeholder="Điền câu hỏi">
                                    </div>
                                </div>
                                <div class="mt-2 mb-4" style="border:1px solid #e6e6e6;"></div>
                                <div class="row mb-3">
                                    <label for="" class="col-3 col-form-label">Lựa chọn 1</label>
                                    <div class="col-9">
                                        <input type="text" name="{{$key+1}}_a1" class="form-control" id=""
                                               value="{{$item['a1']}}"
                                               placeholder="điền nội dung cho lựa chọn">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-3 col-form-label">Lựa chọn 2</label>
                                    <div class="col-9">
                                        <input type="text" name="{{$key+1}}_a2" class="form-control" id=""
                                               value="{{$item['a2']}}"
                                               placeholder="điền nội dung cho lựa chọn">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-3 col-form-label">Lựa chọn 3</label>
                                    <div class="col-9">
                                        <input type="text" name="{{$key+1}}_a3" class="form-control" id=""
                                               value="{{$item['a3']}}"
                                               placeholder="điền nội dung cho lựa chọn">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-3 col-form-label">Lựa chọn 3</label>
                                    <div class="col-9">
                                        <input type="text" name="{{$key+1}}_a4" class="form-control" id=""
                                               value="{{$item['a4']}}"
                                               placeholder="điền nội dung cho lựa chọn">
                                    </div>
                                </div>
                                <div class="mt-2 mb-4" style="border:1px solid #e6e6e6;"></div>
                                <div class="row ">
                                    <label for="" class="col-3 col-form-label">Đáp án</label>
                                    <div class="col-9">
                                        <select name="{{$key+1}}_c" class="form-control">
                                            <option value="a1" @if($item['c'] == "a1") selected @endif> Đáp án 1
                                            </option>
                                            <option value="a2" @if($item['c'] == "a2") selected @endif> Đáp án 2
                                            </option>
                                            <option value="a3" @if($item['c'] == "a3") selected @endif> Đáp án 3
                                            </option>
                                            <option value="a4" @if($item['c'] == "a4") selected @endif> Đáp án 4
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('js2')
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>

            $('.js-render').click(function (e) {
                e.preventDefault();
                let $number = $('#number-question').val();
                if ($number > 0 && $number < 100) {
                    let $count = $('.card-body .item').length;
                    if ($count > 0) {
                        confirm('Bạn có chắc xóa những thứ đã điền không');
                        $('.card-body').html('');
                        for (let i = 1; i <= $number; i++) {
                            $('.card-body').append(
                                `
                                      <strong style="font-size:20px"> Câu ${i}</strong>
                                 <div class="item mb-5 p-2 border">
                                    <div class="row mb-3">
                                        <label for="" class="col-3 col-form-label" style="font-weight: bold">Câu hỏi ${i}</label>
                                        <div class="col-9">
                                            <input type="text" name="${i}_q" class="form-control" id="" placeholder="Điền câu hỏi">
                                        </div>
                                    </div>
                                    <div class="mt-2 mb-4" style="border:1px solid #e6e6e6;"></div>
                                    <div class="row mb-3">
                                        <label for="" class="col-3 col-form-label">Lựa chọn 1</label>
                                        <div class="col-9">
                                            <input type="text" name="${i}_a1" class="form-control" id="" placeholder="điền nội dung cho lựa chọn">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="" class="col-3 col-form-label">Lựa chọn 2</label>
                                        <div class="col-9">
                                            <input type="text" name="${i}_a2" class="form-control" id="" placeholder="điền nội dung cho lựa chọn">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="" class="col-3 col-form-label">Lựa chọn 3</label>
                                        <div class="col-9">
                                            <input type="text" name="${i}_a3" class="form-control" id="" placeholder="điền nội dung cho lựa chọn">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="" class="col-3 col-form-label">Lựa chọn 3</label>
                                        <div class="col-9">
                                            <input type="text" name="${i}_a4" class="form-control" id="" placeholder="điền nội dung cho lựa chọn">
                                        </div>
                                    </div>
                                    <div class="mt-2 mb-4" style="border:1px solid #e6e6e6;"></div>
                                    <div class="row ">
                                        <label for="" class="col-3 col-form-label">Đáp án</label>
                                        <div class="col-9">
                                            <select name="${i}_c" class="form-control">
                                                <option value="a1">Đáp án 1</option>
                                                <option value="a2">Đáp án 2</option>
                                                <option value="a3">Đáp án 3</option>
                                                <option value="a4">Đáp án 4</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            `
                            )
                        }
                    } else {
                        $('.card-body').html('');
                        for (let i = 1; i <= $number; i++) {
                            $('.card-body').append(
                                `
                                      <strong style="font-size:20px"> Câu ${i}</strong>
                                 <div class="item mb-5 p-2 border">
                                    <div class="row mb-3">
                                        <label for="" class="col-3 col-form-label" style="font-weight: bold">Câu hỏi ${i}</label>
                                        <div class="col-9">
                                            <input type="text" name="${i}_q" class="form-control" id="" placeholder="Điền câu hỏi">
                                        </div>
                                    </div>
                                    <div class="mt-2 mb-4" style="border:1px solid #e6e6e6;"></div>
                                    <div class="row mb-3">
                                        <label for="" class="col-3 col-form-label">Lựa chọn 1</label>
                                        <div class="col-9">
                                            <input type="text" name="${i}_a1" class="form-control" id="" placeholder="điền nội dung cho lựa chọn">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="" class="col-3 col-form-label">Lựa chọn 2</label>
                                        <div class="col-9">
                                            <input type="text" name="${i}_a2" class="form-control" id="" placeholder="điền nội dung cho lựa chọn">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="" class="col-3 col-form-label">Lựa chọn 3</label>
                                        <div class="col-9">
                                            <input type="text" name="${i}_a3" class="form-control" id="" placeholder="điền nội dung cho lựa chọn">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="" class="col-3 col-form-label">Lựa chọn 3</label>
                                        <div class="col-9">
                                            <input type="text" name="${i}_a4" class="form-control" id="" placeholder="điền nội dung cho lựa chọn">
                                        </div>
                                    </div>
                                    <div class="mt-2 mb-4" style="border:1px solid #e6e6e6;"></div>
                                    <div class="row ">
                                        <label for="" class="col-3 col-form-label">Đáp án</label>
                                        <div class="col-9">
                                            <select name="${i}_c" class="form-control">
                                                <option value="a1">Đáp án 1</option>
                                                <option value="a2">Đáp án 2</option>
                                                <option value="a3">Đáp án 3</option>
                                                <option value="a4">Đáp án 4</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            `
                            )
                        }
                    }

                } else {
                    alert(' Nhập sai số  lượng ');
                }
            });
            // $(document).ready(async function() {
            //     $('.select-filter-course, .select-filter-student,.select-filter-major').change(function(){
            //         $('#form-filter').submit();
            //     });
            // });
        </script>
    @endpush
@endsection()
