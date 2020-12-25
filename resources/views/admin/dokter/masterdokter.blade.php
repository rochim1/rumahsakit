@extends('admin.index')
@section('title','master dokter')
@section('style')
<link
    href="{{asset('Componentadmin/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}"
    rel="stylesheet">
<link href="./plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
@endsection
@section('uper_script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection
@section('content')
<div id="dokter" class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">dokter</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h3 class="card-title text-white">jumlah dokter</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">
                                {{$datadokter->count()}}
                            </h2>
                        </div>
                        <span class="float-right display-5 opacity-5"><span class="iconify"
                                data-icon="carbon:hospital-bed" data-inline="false"></span></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-2">
                    <div class="card-body">
                        <h3 class="card-title text-white">Dokter Umum</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">
                                {{$datadokter->where('spesialis', 2)->count()}}
                            </h2>
                            {{-- <span class="text-white mb-0">Jan - March 2019</span> --}}
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
                            <h2 class="text-white">4565</h2>
                            {{-- <span class="text-white mb-0">Jan - March 2019</span> --}}
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
                            <h2 class="text-white">99</h2>
                            {{-- <span class="text-white mb-0">Jan - March 2019</span> --}}
                        </div>
                        <span class="float-right display-5 opacity-5"><span class="iconify" data-icon="bx:bx-shield-x"
                                data-inline="false"></span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title pb-2">Daftar Dokter</h4>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>spesialis</th>
                                        <th>email</th>
                                        <th>telpon</th>
                                        <th>jabatan</th>
                                    </tr>
                                </thead>
                                @php
                                $no = 1;
                                @endphp
                                @foreach ($datadokter as $item)
                                @php
                                $id_spesialis = $item->spesialis;
                                @endphp
                                <tr v-on:click="detaildokter({{$item->id_dokter}})">
                                    <td>{{$no++}}</td>
                                    <td>{{$item->nama_dokter}}</td>
                                    <td>
                                        @foreach ($spesialis->where('id_spesialis', $item->spesialis) as $data)
                                        {{$data->spesialis}}
                                        @endforeach
                                    </td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->telpon}}</td>
                                    <td>{{$item->jabatan}}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title pb-2">Deleted Dokter</h4>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>spesialis</th>
                                        <th>email</th>
                                        <th>alasan</th>
                                    </tr>
                                </thead>
                                @php
                                $no = 1;
                                @endphp
                                @foreach ($datadokterdeleted as $item)
                                @php
                                $id_spesialis = $item->spesialis;
                                @endphp
                                <tr v-on:click="detaildokter({{$item->id_dokter}})">
                                    <td>{{$no++}}</td>
                                    <td>{{$item->nama_dokter}}</td>
                                    <td>
                                        @foreach ($spesialis->where('id_spesialis', $item->spesialis) as $data)
                                        {{$data->spesialis}}
                                        @endforeach
                                    </td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->telpon}}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Detail Dokter</h4>
                            id: <span class="text-danger">@{{id_dokter}}</span>
                            <span>
                                <a href="javascript:;"> <span class="icon-pencil"></span></a> |
                                <a href="javascript:;">
                                    <span class="icon-trash text-danger"></span>
                                </a>
                            </span>
                        </div>
                        <img v-bind:src="foto" class="mb-3 img-thumbnail mx-auto d-block img img-circle mt-3"
                            width="200px" style="height: 200px">
                        <div class="list-group">
                            <span class="row list-group-item list-group-item-action">
                                <span class="col-md-8">
                                    <span>nama dokter :</span> <span class="text-danger">@{{nama}}</span>
                                </span>
                            </span>
                            <span class="row list-group-item list-group-item-action">
                                <span class="col-md-8">
                                    <span>jenis kelamin :</span> <span class="text-danger">@{{jenis_kelamin}}</span>
                                </span>
                            </span>
                            <span class="row list-group-item list-group-item-action">
                                <span class="col-md-8">
                                    <span>NIK :</span> <span class="text-danger">@{{NIK}}</span>
                                </span>
                            </span>
                            <span class="row list-group-item list-group-item-action">
                                <span class="col-md-8">
                                    <span>nomor str :</span> <span class="text-danger">@{{nomor_str}}</span>
                                </span>
                            </span>
                            <span class="row list-group-item list-group-item-action">
                                <span class="col-md-8">
                                    <span>email :</span> <span class="text-danger">@{{email}}</span>
                                </span>
                            </span>
                            <span class="row list-group-item list-group-item-action">
                                <span class="col-md-8">
                                    <span>telpon :</span> <span class="text-danger">@{{telpon}}</span>
                                </span>
                            </span>
                            <span class="row list-group-item list-group-item-action">
                                <span class="col-md-8">
                                    <span>tgl lahir :</span> <span class="text-danger">@{{tanggal_lahir}}</span>
                                </span>
                            </span>
                            <span class="row list-group-item list-group-item-action">
                                <span class="col-md-8">
                                    <span>spesialis :</span> <span class="text-danger">@{{spesialis}}</span>
                                </span>
                            </span>
                            <span class="row list-group-item list-group-item-action">
                                <span class="col-md-8">
                                    <span>universitas :</span> <span class="text-danger">@{{universitas}}</span>
                                </span>
                            </span>
                            <span class="row list-group-item list-group-item-action">
                                <span class="col-md-8">
                                    <span>jabatan :</span> <span class="text-danger">@{{jabatan}}</span>
                                </span>
                            </span>
                            <span class="row list-group-item list-group-item-action">
                                <span class="col-md-8">
                                    <span>agama :</span> <span class="text-danger">@{{agama}}</span>
                                </span>
                            </span>
                            <span class="row list-group-item list-group-item-action">
                                <span class="col-md-8">
                                    <span>alamat :</span> <span class="text-danger">@{{alamat}}</span>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Jadwal Dokter</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>
<script>
    let vue = new Vue({
        el: "#dokter",
        data: {
            id_dokter: '',
            nama: '',
            jenis_kelamin: '',
            NIK: '',
            nomor_str: '',
            email: '',
            telpon: '',
            tanggal_lahir: '',
            spesialis: '',
            universitas: '',
            jabatan: '',
            agama: '',
            alamat: '',

            foto: "{{asset('/images/index.png')}}",
        },
        methods: {
            detaildokter: function (id) {
                const vm = this;
                axios.get('/tampil_dokter/' + id).then(
                        Respon => {
                            vm.id_dokter = Respon.data.id_dokter;
                            vm.nama = Respon.data.nama_dokter;
                            // vm.jenis_kelamin = Respon.data.jenis_kelamin;
                            if (Respon.data.jenis_kelamin == 'L') {
                                vm.jenis_kelamin = "laki-laki";
                            } else {
                                vm.jenis_kelamin = "perempuan";
                            };
                            vm.NIK = Respon.data.NIK;
                            vm.nomor_str = Respon.data.nomor_str;
                            vm.email = Respon.data.email;
                            vm.telpon = Respon.data.telpon;
                            vm.tanggal_lahir = Respon.data.tanggal_lahir;
                            vm.spesialis = Respon.data.spesialis;
                            vm.universitas = Respon.data.universitas;
                            vm.jabatan = Respon.data.jabatan;
                            vm.agama = Respon.data.agama;
                            vm.alamat = Respon.data.alamat;
                            if (Respon.data.foto) {
                                vm.foto = "storage/fotoDokter/" + vm.nama + "-" + vm.NIK + "/" +
                                    Respon.data.foto;
                            } else {
                                vm.foto = "{{asset('/images/index.png')}}";
                            }
                        })
                    .catch(
                        err => {
                            swal("Gagal tampil detail Dokter!",
                                "hub administrator", "error");
                        }
                    )

            }
        }
    })

</script>
@endsection
@section('script')
{{-- model lama --}}
<script src="{{asset('Componentadmin/plugins/tables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('Componentadmin/plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('Componentadmin/plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script>
{{-- model lama --}}


{{-- <script src="{{asset('Componentadmin/plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.semanticui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script> --}}
@endsection
