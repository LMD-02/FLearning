@extends('layout.master')
@push('css')
    <style>
        .side-nav-second-level::-webkit-scrollbar {
            width: 6px;
        !important;
        }

        .side-nav-second-level::-webkit-scrollbar-track {
            box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        !important;
        }

        .side-nav-second-level::-webkit-scrollbar-thumb {
            background-color: rgba(93, 125, 250, 0.8);
        !important;
            outline: 1px solid #2e8cec;
        !important;
            border-radius: 8px;
        }
    </style>
@endpush
@section('content')
    <div class="content-page" style="margin:0 10%;padding:0">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">


                <div class="row mt-3">
                    <div class="col-xl-4 col-lg-5">
                        <div class="card text-center">
                            <div class="card-body">
                                <img src="{{'images/upload/'.auth()->user()->avatar}}" class="rounded-circle avatar-lg img-thumbnail"
                                     alt="profile-image">

                                <h4 class="mb-0 mt-2">{{auth()->user()->name}}</h4>
                                <p class="text-muted font-14" style="color:purple !important">Người dùng</p>

                                <div class="text-start mt-3">
                                    <h4 class="font-13 text-uppercase">Thông tin:</h4>


                                    <p class="text-muted mb-2 font-13"><strong>Email : </strong> <span
                                            class="ms-2">{{auth()->user()->email}}</span></p>

                                    <p class="text-muted mb-2 font-13"><strong>Số điện thoại : </strong><span
                                            class="ms-2">{{auth()->user()->phone}}</span></p>

                                    <p class="text-muted mb-1 font-13"><strong>Ngày sinh : </strong> <span
                                            class="ms-2">{{auth()->user()->birthday}}</span></p>

                                    <p class="text-muted mb-1 font-13"><strong>Địa chỉ : </strong> <span
                                            class="ms-2">{{auth()->user()->address}}</span></p>
                                </div>

                            </div> <!-- end card-body -->
                        </div> <!-- end card -->

                    </div>
                    <div class="col-xl-8 col-lg-7">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="header-title mb-3">Chỉnh sửa thông tin</h4>

                                    <div id="basicwizard">

                                        <ul class="nav nav-pills nav-justified form-wizard-header mb-4" role="tablist">

                                            <li class="nav-item active" role="presentation">
                                                <a href="#basictab2" data-bs-toggle="tab" data-toggle="tab"
                                                   class="nav-link rounded-0 py-2 active" aria-selected="false"
                                                   role="tab" tabindex="-1">
                                                    <i class="mdi mdi-face-man-profile font-18 align-middle me-1"></i>
                                                    <span class="d-none d-sm-inline">Profile</span>
                                                </a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a href="#basictab1" data-bs-toggle="tab" data-toggle="tab"
                                                   class="nav-link rounded-0 py-2 " aria-selected="true" role="tab">
                                                    <i class="mdi mdi-account-circle font-18 align-middle me-1"></i>
                                                    <span class="d-none d-sm-inline">Bảo mật</span>
                                                </a>
                                            </li>

                                        </ul>

                                        <div class="tab-content b-0 mb-0">

                                                <div class="tab-pane active" id="basictab2" role="tabpanel">
                                                    <form id="form-profile-edit" action="" method="">
                                                        @csrf
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="row mb-3">
                                                                <label class="col-md-3 col-form-label" for="name">
                                                                    Tên</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" id="name" name="name"
                                                                           class="form-control" value="{{auth()->user()->name}}">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label class="col-md-3 col-form-label" for="surname">
                                                                    Email</label>
                                                                <div class="col-md-9">
                                                                    <input type="email" id="surname" name="email"
                                                                           class="form-control"
                                                                           value="{{auth()->user()->email}}">
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                <label class="col-md-3 col-form-label"
                                                                       for="email">Phone</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" id="email" name="phone"
                                                                           class="form-control"
                                                                           value="{{auth()->user()->phone}}">
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                <label class="col-md-3 col-form-label" for="email">Địa
                                                                    chỉ</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" id="email" name="address"
                                                                           class="form-control"
                                                                           value="{{auth()->user()->address}}">
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                <label class="col-md-3 col-form-label" for="email">Ngày
                                                                    sinh</label>
                                                                <div class="col-md-9">
                                                                    <input type="date" id="email" name="birthday"
                                                                           class="form-control"
                                                                           value="{{auth()->user()->birthday}}">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label class="col-md-3 col-form-label" for="gender">Chọn
                                                                    giới tính</label>
                                                                <div class="col-md-9">
                                                                    <select id="gender" name="gender"
                                                                            class="form-control">
                                                                        <option @if(auth()->user()->role == 1 ) selected
                                                                                @endif value="1">Nam
                                                                        </option>
                                                                        <option @if(auth()->user()->role == 2 ) selected
                                                                                @endif value="2">Nữ
                                                                        </option>
                                                                    </select></div>
                                                            </div>


                                                        </div> <!-- end col -->
                                                        <div class="row mb-3">
                                                            <label for="example-image" class="col-md-3 col-form-label">Ảnh đại diện</label>
                                                            <input type="file" alt="ảnh" accept="image/png, image/jpeg, image/gif"  class="col-md-9" name="image">
                                                        </div>
                                                    </div> <!-- end row -->

                                                    <ul class="pager wizard mb-0 list-inline">
                                                        <li class="next list-inline-item float-end">
                                                            <button type="button" class="js-profile-btn btn btn-info">
                                                                Cập nhật thông tin
                                                            </button>
                                                        </li>
                                                    </ul>
                                                    </form>
                                                </div>
                                                <div class="tab-pane " id="basictab1" role="tabpanel">
                                                    <form id="form-change-pass">
                                                        @csrf
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="row mb-3">
                                                                        <label class="col-md-3 col-form-label" for="userName">Mật
                                                                            khẩu cũ</label>
                                                                        <div class="col-md-9">
                                                                            <input type="password" class="form-control"
                                                                                   id="userName" name="old_password" value="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <label class="col-md-3 col-form-label" for="password"> Mật
                                                                            khẩu mới</label>
                                                                        <div class="col-md-9">
                                                                            <input type="password" id="password" name="password"
                                                                                   class="form-control">
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-3">
                                                                        <label class="col-md-3 col-form-label" for="confirm">Nhập
                                                                            lại mật khẩu mới</label>
                                                                        <div class="col-md-9">
                                                                            <input type="password" id="confirm" name="confirm"
                                                                                   class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div> <!-- end col -->
                                                            </div> <!-- end row -->

                                                            <ul class="list-inline wizard mb-0">
                                                                <li class="next list-inline-item float-end">
                                                                    <button class="btn btn-info js-submit-change-pass">Cập nhật mật khẩu
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                    </form>
                                                </div>

                                        </div> <!-- tab-content -->
                                    </div> <!-- end #basicwizard-->

                            </div> <!-- end card-body -->
                        </div>
                    </div>
                </div>


            </div> <!-- container -->

        </div> <!-- content -->


    </div>
    @push('js')
        <script>
            $('.js-profile-btn').click(function () {
                let $form = $('#form-profile-edit')[0];
                let $data = new FormData($form);
                let $url = "{{route('student.profile.update')}}";
                $.ajax({
                    url: $url,
                    type: 'POST',
                    data: $data,
                    processData: false,  // Important: Don't process the data
                    contentType: false,  // Important: Don't set content type
                    success: function ($res){
                        if($res.status == 1) {
                            $.toast({
                                heading: 'Thành công',
                                text: 'Đã cập nhật hồ sơ',
                                position: 'top-right',
                                loaderBg: '#ff6849',
                                icon: 'success',
                                hideAfter: 3500,
                                stack: 6
                            });
                        } else {
                        }
                    }
                })
            });
            $('.js-submit-change-pass').click(function (e) {
                e.preventDefault();
                let $newpass = $('input[name="password"]').val();
                let $confirm = $('input[name="confirm"]').val();
                console.log($newpass,$confirm);
                if($newpass != $confirm){
                    $.toast({
                        heading: 'Thất bại',
                        text: 'Mật khẩu mới không trùng khớp nhau',
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'error',
                        hideAfter: 3500,
                        stack: 6
                    });
                }
                let $data = $('#form-change-pass').serialize();
                let $url = "{{route('student.profile.pass')}}";
                $.ajax({
                    url: $url,
                    type: 'POST',
                    data: $data,
                    success: function ($res){
                        if($res.status == 1) {
                            $.toast({
                                heading: 'Thành công',
                                text: 'Đã cập nhật hồ sơ',
                                position: 'top-right',
                                loaderBg: '#ff6849',
                                icon: 'success',
                                hideAfter: 3500,
                                stack: 6
                            });
                        } else {
                            $.toast({
                                heading: 'Thất bại',
                                text: $res.message,
                                position: 'top-right',
                                loaderBg: '#ff6849',
                                icon: 'error',
                                hideAfter: 3500,
                                stack: 6
                            });
                        }
                    }
                })
            });

        </script>
    @endpush
@endsection()
