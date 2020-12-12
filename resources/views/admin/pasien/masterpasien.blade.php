@extends('admin.index')
@section('title','admin-harapan bersama')
@section('style')
<link href="{{asset('Componentadmin/plugins/tables/css/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection
@section('content')
<div class="content-body">

    <div class="container-fluid mt-3">
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
                        <span class="float-right display-5 opacity-5"><span class="iconify" data-icon="bx:bx-shield-x"
                                data-inline="false"></span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Daftar Pasien</h4>
                        <div class="table-responsive" id="listPasien">
                            <table class="table table-striped table-bordered zero-configuration">
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
                                            <td style="width: 150px; font-size: 16px" class="text-center"><a href="{{url('edit_pasien/'.$item->id_pasien)}}"><span class="icon-pencil"></span> edit</a> | <a href="#"><span class="icon-trash text-danger"></span> hapus</a></td></td>
                                            </tr>
                                           @endforeach
                                </tbody>
                            </table>

                        </div>
                        <script>
                            new Vue({
                                el: "#listPasien",
                                data : {

                                },
                                methods : {
                                    tampilPasien: function (params) {
                                        axios.get("daftarPasien").then()
                                    }
                                }
                            })
                        </script>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Pasien Rawat Inap</div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
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
                    <div class="card-body px-0">
                        <h4 class="card-title px-4 mb-3">Todo</h4>
                        <div class="todo-list">
                            <div class="tdl-holder">
                                <div class="tdl-content">
                                    <ul v-if="!datalist.length">
                                        <li class="justify-content-md-center row text-danger">Data Masih Kosong</li>
                                        {{-- <li>
                                            <label>
                                                <input type="checkbox"><i></i>
                                                <span>Get up</span>
                                                <a href='#' class="ti-trash"></a>
                                            </label>
                                        </li> --}}
                                    </ul>

                                    <ul v-for="item in datalist">
                                        <li>
                                            <label>
                                                <input type="checkbox"><i></i>
                                                <span>@{{item.content}}</span>
                                                <a href='#' class="ti-trash"></a>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                                <div class="px-4">
                                    <input v-on:keyup.enter="submit" v-model="content" type="text"
                                        class="tdl-new form-control" placeholder="Write new item and hit 'Enter'...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                new Vue({
                    el: '#appTodo',
                    data: {
                        content: "",
                        datalist: []
                    },
                    methods: {
                        submit: function () {
                            var form_data = new FormData();
                            form_data.append("content", this.content);
                            axios.post("{{url('/todolist/create')}}", form_data)
                                .then(Respon => {
                                    alert(Respon.data.message);
                                })
                                .catch(err => {
                                    alert("sistem failure");
                                })
                        }
                    }

                });

            </script>
        </div>
    </div>
    <!-- #/ container -->
</div>
@endsection
@section('script')
<script src="{{asset('Componentadmin/plugins/tables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('Componentadmin/plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('Componentadmin/plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script>
@endsection

