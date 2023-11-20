@extends('layout2.master')
@section('content2')
    <div class="row">
        <div class="col-xl-5 col-lg-6 d-flex flex-column justify-content-between">

            <div class="row">
                <div class="col-sm-6">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-account-multiple widget-icon bg-success-lighten text-success"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-2" title="Number of Customers">Số lượng người dùng</h5>
                            <h3 class="mt-1 mb-3">{{$userCount}} người</h3>

                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <div class="col-sm-6">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-ab-testing widget-icon bg-danger-lighten text-danger"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-2" title="Number of Orders">Số bài Test</h5>
                            <h3 class="mt-2 mb-3">{{$test}} bài test</h3>

                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div> <!-- end row -->

            <div class="row">
                <div class="col-sm-6">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-book-open widget-icon bg-info-lighten text-info"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-2" title="Average Revenue">Số môn học giảng dậy</h5>
                            <h3 class="mt-2 mb-3">{{$subject}} môn</h3>

                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <div class="col-sm-6">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-video-vintage widget-icon bg-warning-lighten text-warning"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-2" title="Growth">Số video bài giảng</h5>
                            <h3 class="mt-2 mb-3">{{$video}} video</h3>

                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div> <!-- end row -->

        </div> <!-- end col -->
        <div class="col-xl-7 col-lg-12 order-lg-2 order-xl-1">
            <div class="card">
                <div class="d-flex card-header justify-content-between align-items-center">
                    <h4 class="header-title">Bài test gần đây</h4>

                </div>

                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap table-hover mb-0">
                            <tbody>
                            @foreach($point as $key => $item)
                                @if($item->exam != null)
                                <tr>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">{{$item->user->name}}</h5>
                                        <span class="text-muted font-13"> Người dùng</span>
                                    </td>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">{{$item->user->email}}</h5>
                                        <span class="text-muted font-13">Email</span>
                                    </td>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">{{$item->exam['title']}}</h5>
                                        <span class="text-muted font-13">Bài test</span>
                                    </td>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">{{$item->point}} / 10</h5>
                                        <span class="text-muted font-13">Số điểm</span>
                                    </td>
                                </tr>
                                @endif
                            @endforeach

                            </tbody>
                        </table>
                    </div> <!-- end table-responsive-->
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
    </div>


    @push('js2')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"
                integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA=="
                crossorigin="anonymous" referrerpolicy="no-referrer">

        </script>
        <script>
            let ctx2 = document.getElementById('canvas-total-month');

            let dataExample = [123.2, 215.2, 186.3, 123.2, 215.2, 186.3, 123.2, 215.2, 186.3, 75.2, 0, 0]
            const myChart2 = new Chart(ctx2, {
                type: 'line',
                data: {
                    labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', "Tháng 12"],
                    datasets: [
                        {
                            label: 'Doanh số (tr)',
                            data: dataExample,
                            borderColor: '#ff6384',
                            backgroundColor: 'rgba(255,99,132,0.43)',
                            pointRadius: 10,
                            pointHoverRadius: 15
                        }
                    ]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                        }
                    }
                }
            });


            let ctx = document.getElementById('ChartPoint');
            const myChart = new Chart(ctx, {
                type: 'polarArea',
                data: {
                    labels: ['Đơn hủy', 'Đơn đã thanh toán','Đơn chưa thanh toán'],
                    datasets: [{
                        label: 'Tỷ lệ đơn hàng',
                        data: [12, 78, 83],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(255, 206, 86, 0.2)',

                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(255, 206, 86, 1)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    @endpush
@endsection()
