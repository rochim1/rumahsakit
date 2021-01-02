@extends('admin.index')
@section('title','master pasien')
@section('style')
<link href="{{asset('Componentadmin/plugins/tables/css/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection
@section('content')
<div class="content-body">

    <div class="container-fluid mt-3">
        <div id="masterpasien">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-1">
                        <div class="card-body">
                            <h3 class="card-title text-white">Pasien Terdaftar</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">{{$jumlahPasien}}</h2>
                                {{-- <p class="text-white mb-0">Jan - March 2019</p> --}}
                            </div>
                            <span class="float-right display-5 opacity-5"><span class="iconify"
                                    data-icon="carbon:hospital-bed" data-inline="false"></span></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-2">
                        <div class="card-body">
                            <h3 class="card-title text-white">Pasien Rawat Inap</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">{{ $jumlahRawatInap}}</h2>
                                {{-- <p class="text-white mb-0">Jan - March 2019</p> --}}
                            </div>
                            <span class="float-right display-5 opacity-5"><span class="iconify"
                                    data-icon="medical-icon:i-inpatient" data-inline="false"></span></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-3">
                        <div class="card-body">
                            <h3 class="card-title text-white">Pasien Berasuransi</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">{{ $jumlahAsuransi }}</h2>
                                {{-- <p class="text-white mb-0">Jan - March 2019</p> --}}
                            </div>
                            <span class="float-right display-5 opacity-5"><span class="iconify"
                                    data-icon="bx:bx-shield-quarter" data-inline="false"></span></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-4">
                        <div class="card-body">
                            <h3 class="card-title text-white">Pasien Non-asuransi</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">{{$jumlahTanpaAsuransi}}</h2>
                                {{-- <p class="text-white mb-0">Jan - March 2019</p> --}}
                            </div>
                            <span class="float-right display-5 opacity-5"><span class="iconify"
                                    data-icon="bx:bx-shield-x" data-inline="false"></span></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">kedatangan pasien</h4>
                            <canvas id="lineChart" width="500" height="250"></canvas>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Daftar Pasien</h4>
                            <div class="table-responsive">
                                <table id="listPasien"
                                    class="w-100 table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>No. Rekam Medis</th>
                                            <th>JK</th>
                                            <th>NIK</th>
                                            <th>telpon</th>
                                            <th>status</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no = 1;
                                        @endphp
                                        @foreach ($pasien as $item)
                                        <tr>
                                            <td style="width: 20px">{{$no++}}</td>
                                            <td>{{$item->nama}}</td>
                                            <td>{{$item->rekam_medis}}</td>
                                            <td>{{$item->jenisKelamin}}</td>
                                            <td>{{$item->NIK}}</td>
                                            <td>{{$item->telpon}}</td>
                                            <td>{{$item->status}}</td>
                                            <td style="width: 150px; font-size: 16px" class="text-center"><a
                                                    href="{{url('edit_pasien/'.$item->id_pasien)}}"><span
                                                        class="icon-pencil"></span> edit</a> | <a href="#"><span
                                                        class="icon-trash text-danger"></span> hapus</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Doughut chart</h4>
                            <canvas id="doughutChart" width="500" height="250"></canvas>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Single Bar Chart</h4>
                            <canvas id="singelBarChart" width="500" height="250"></canvas>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">

                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">Pasien Rawat Inap</div>
                            <div class="table-responsive">
                                <table class="display table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>tgl masuk</th>
                                            <th>kamar</th>
                                            <th>tgl keluar</th>
                                            <th>pembayaran</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" id="appTodo">
                    <div class="card">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- #/ container -->
</div>

@endsection
@section('script')
<script src="{{asset('Componentadmin/plugins/tables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('Componentadmin/plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>

<script src="{{asset('Componentadmin/plugins/chart.js/Chart.bundle.min.js')}}"></script>
{{-- todo : perlu dibenahi untuk inisialisasinya --}}
{{-- <script src="{{asset('Componentadmin/js/plugins-init/chartjs-init.js')}}"></script> --}}
<script>
    const vue = new Vue({
        el: '#masterpasien',
        data: {

        },
        mounted: function () {

            this.lineChart();
            this.doughutChart();
            this.singelBarChart();
            this.tampiltabelPasien();

        },
        methods: {
            tampiltabelPasien: function () {
                $('#listPasien').DataTable({
                    "lengthMenu": [
                        [5, 25, 50, -1],
                        [5, 25, 50, "All"]
                    ],
                    "autoWidth": false,
                    responsive: true,
                    fixedHeader: true,
                });
            },
            lineChart: function () {
                var ctx = $("#lineChart");
                ctx.height = 150;
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ["January", "February", "March", "April", "May", "June",
                            "July"
                        ],
                        datasets: [{
                                label: "My First dataset",
                                borderColor: "rgba(144,	104,	190,.9)",
                                borderWidth: "1",
                                backgroundColor: "rgba(144,	104,	190,.7)",
                                data: [22, 44, 67, 43, 76, 45, 12]
                            },
                            {
                                label: "My Second dataset",
                                borderColor: "rgba(117, 113, 249, 0.9)",
                                borderWidth: "1",
                                backgroundColor: "rgba(117, 113, 249, 0.5)",
                                pointHighlightStroke: "rgba(117, 113, 249,1)",
                                data: [16, 32, 18, 26, 42, 33, 44]
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        tooltips: {
                            mode: 'index',
                            intersect: false
                        },
                        hover: {
                            mode: 'nearest',
                            intersect: true
                        }

                    }
                });
            },
            doughutChart: function () {
                var ctx = document.getElementById("doughutChart");
                ctx.height = 400;
                var myChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        datasets: [{
                            data: [45, 25, 20, 10],
                            backgroundColor: [
                                "rgba(117, 113, 249,0.9)",
                                "rgba(117, 113, 249,0.7)",
                                "rgba(117, 113, 249,0.5)",
                                "rgba(144,	104,	190,0.07)"
                            ],
                            hoverBackgroundColor: [
                                "rgba(117, 113, 249,0.9)",
                                "rgba(117, 113, 249,0.7)",
                                "rgba(117, 113, 249,0.5)",
                                "rgba(144,	104,	190,0.7)"
                            ]

                        }],
                        labels: [
                            "green",
                            "green",
                            "green",
                            "green"
                        ]
                    },
                    options: {
                        responsive: true,
                    }
                });
            },
            singelBarChart: function () {
                var ctx = document.getElementById("singelBarChart");
                ctx.height = 400;
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ["Sun", "Mon", "Tu", "Wed", "Th", "Fri", "Sat"],
                        datasets: [{
                            label: "My First dataset",
                            data: [40, 55, 75, 81, 56, 55, 40],
                            borderColor: "rgba(117, 113, 249, 0.9)",
                            borderWidth: "0",
                            backgroundColor: "rgba(117, 113, 249, 0.5)"
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            }
        }

    });

</script>
@endsection
