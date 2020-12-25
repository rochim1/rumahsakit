@extends('admin.index')
@section('title','jadwal dokter')
@section('style')
<style>
    /* Base for label styling */
    [type="checkbox"]:not(:checked),
    [type="checkbox"]:checked {
        position: absolute;
        left: -9999px;
    }

    [type="checkbox"]:not(:checked)+label,
    [type="checkbox"]:checked+label {
        position: relative;
        padding-left: 1.95em;
        cursor: pointer;
    }

    /* checkbox aspect */
    [type="checkbox"]:not(:checked)+label:before,
    [type="checkbox"]:checked+label:before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        width: 1.25em;
        height: 1.25em;
        border: 2px solid #ccc;
        background: #fff;
        border-radius: 4px;
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, .1);
    }

    /* checked mark aspect */
    [type="checkbox"]:not(:checked)+label:after,
    [type="checkbox"]:checked+label:after {
        content: '\2713\0020';
        position: absolute;
        top: .15em;
        left: .22em;
        font-size: 1.3em;
        line-height: 0.8;
        color: #09ad7e;
        transition: all .2s;
        font-family: 'Lucida Sans Unicode', 'Arial Unicode MS', Arial;
    }

    /* checked mark aspect changes */
    [type="checkbox"]:not(:checked)+label:after {
        opacity: 0;
        transform: scale(0);
    }

    [type="checkbox"]:checked+label:after {
        opacity: 1;
        transform: scale(1);
    }

    /* disabled checkbox */
    [type="checkbox"]:disabled:not(:checked)+label:before,
    [type="checkbox"]:disabled:checked+label:before {
        box-shadow: none;
        border-color: #bbb;
        background-color: #ddd;
    }

    [type="checkbox"]:disabled:checked+label:after {
        color: #999;
    }

    [type="checkbox"]:disabled+label {
        color: #aaa;
    }

    /* accessibility */
    [type="checkbox"]:checked:focus+label:before,
    [type="checkbox"]:not(:checked):focus+label:before {
        border: 2px dotted blue;
    }

    .form-check {
        margin: 5px;
    }

</style>
@endsection
@section('uper_script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection
@section('content')
<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">tambah dokter</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid" id="vueField">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 id="judul" class="card-title pb-2">Buat Jadwal Dokter</h4>
                        <form @submit.prevent>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Filter Poli</label>
                                <div class="col-sm-6">
                                    <select v-model="form.poli" v-on:click="ready" v-on:blur="poli" class="form-control"
                                        name="poli" id="poli">
                                        <option value="">--Select Filter Poli--</option>
                                        @foreach ($dataSpesialis as $item)
                                        <option value="{{$item->id_spesialis}}">{{$item->spesialis}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <a id="tableDokter" href="javascript();" data-placement="top" title="tambah kamar"
                                        class="tambah btn-primary gradient-1 btn" data-toggle="modal"
                                        data-target="#exampleModal">list dokter
                                    </a>

                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header d-flex flex-column">
                                                    <div class="w-100 d-flex justify-content-between">
                                                        <h5 class="modal-title" id="exampleModalLabel">table dokter</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div>
                                                        <small>pilih dokter untuk atur jadwal</small>
                                                    </div>

                                                </div>
                                                <div class="modal-body">
                                                    <div class="alert alert-warning">the table isnt syncronous (realtime), refresh if not find the data</div>
                                                    <div class="table-responsive">
                                                        <table id="tabledokterlist"
                                                            class="w-100 table table-hover table-bordered zero-configuration">
                                                            <thead>
                                                                <tr>
                                                                    <td>nama dokter</td>
                                                                    <td>spesialis</td>
                                                                    <td>status</td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                @foreach ($datadokter as $item)
                                                                <tr
                                                                    v-on:click="selectedrow('{{$item->id_dokter}}','{{$item->nama_dokter}}','{{$item->spesialis}}')">
                                                                    <td>{{$item->nama_dokter}}</td>
                                                                    <td>
                                                                        @foreach ($dataSpesialis->where('id_spesialis',
                                                                        $item->spesialis) as $data)
                                                                        {{$data->spesialis}}
                                                                        @endforeach
                                                                    </td>
                                                                    <td>
                                                                        <span
                                                                            class="label gradient-1 rounded">scheduled</span>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>

                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Cari Dokter</label>
                                <div class="col-sm-4">
                                    <select v-model="form.berdasarkan" v-on:blur="berdasarkan" class="form-control"
                                        name="berdasarkan" id="berdasarkan">
                                        <option value="">Cari berdasarkan</option>
                                        <option value="Nama">Nama</option>
                                        <option value="Id_dokter">id_dokter</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <input v-on:focus="search" v-on:keyup="searchOn" v-model="form.search" type="text"
                                        class="form-control" id="search" placeholder="Search">
                                    <ul id="listdata" class="list-group collapse" v-for="item in dataDokter">
                                        <li class="list-group-item"
                                            v-on:click="selected(item.id_dokter, item.nama_dokter)">
                                            @{{item.nama_dokter}}</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="border p-3">
                                <div class="form-group row mb-3">
                                    <label class="col-sm-2 col-form-label">Hari</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-check-inline">
                                            <input v-model="jadwaljam.senin" class="form-check-input" type="checkbox"
                                                id="senin" value="senin">
                                            <label class="form-check-label" for="senin">Senin</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input v-model="jadwaljam.selasa" class="form-check-input" type="checkbox"
                                                id="selasa" value="selasa">
                                            <label class="form-check-label" for="selasa">Selasa</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input v-model="jadwaljam.rabu" class="form-check-input" type="checkbox"
                                                id="rabu" value="rabu">
                                            <label class="form-check-label" for="rabu">Rabu</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input v-model="jadwaljam.kamis" class="form-check-input" type="checkbox"
                                                id="kamis" value="kamis">
                                            <label class="form-check-label" for="kamis">Kamis</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input v-model="jadwaljam.jumat" class="form-check-input" type="checkbox"
                                                id="jumat" value="jumat">
                                            <label class="form-check-label" for="jumat">Jumat</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input v-model="jadwaljam.sabtu" class="form-check-input" type="checkbox"
                                                id="sabtu" value="sabtu">
                                            <label class="form-check-label" for="sabtu">Sabtu</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input v-model="jadwaljam.minggu" class="form-check-input is-invalid"
                                                type="checkbox" id="minggu" value="minggu">
                                            <label class="form-check-label" for="minggu">Minggu (UGD)</label>
                                        </div>
                                        <br>
                                        <small class="">pilih hari dengan jadwal jam yang sama, jika jam pada hari
                                            tertentu berbeda maka dapat diisikan lagi berikutnya</small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-2">Jam</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" v-model="jadwaljam.jam" name="jam" id="jam">
                                            <option value="">pilih jam</option>
                                            @foreach ($datajam as $item)
                                            <option value="{{$item->id}}">{{$item->jam_mulai}} s/d
                                                {{$item->jam_selesai}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" v-on:click="buatjadwal" class="btn btn-primary gradient-1">Buat
                                            Jadwal</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Pie chart</h4>
                                <canvas id="pieChart" width="400" height="250"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">jadwal terisi</h4>
                                <div class="table-responsive">
                                    <table id="tbljadwal_terisi"
                                        class="w-100 table table-hover table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <td>No</td>
                                                <td>Hari</td>
                                                <td>Jam Mulai</td>
                                                <td>Jam Selesai</td>
                                                <td>Aksi</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(item, index) in jadwalterisi" v-bind:key="item.id">
                                                <td>@{{index+1}}</td>
                                                <td>@{{item.hari}}</td>
                                                <td>@{{item.jam_mulai}}</td>
                                                <td>@{{item.jam_selesai}}</td>
                                                <td>aksi</td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card" id="daftar_recent">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4>foto dokter</h4>
                            id: <span class="text-danger">@{{id_dokter}}</span>
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
                                    <span>spesialis :</span> <span class="text-danger">@{{spesialis}}</span>
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

            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 id="judul" class="card-title pb-2">Data Jadwal Dokter</h4>
                        <div class="table-responsive w-100">
                            <table id="table_jadwal" class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <td>NO</td>
                                        <td>Id Dokter</td>
                                        <td>Nama Dokter</td>
                                        <td>Spesialis</td>
                                        <td>Hari</td>
                                        <td>Jam Mulai</td>
                                        <td>Jam Selesai</td>
                                        <td>Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in data_jadwal" v-bind:key="item.id">
                                        <td>@{{index+1}}</td>
                                        <td>@{{item.id_dokter}}</td>
                                        <td>@{{item.nama_dokter}}</td>
                                        <td>@{{item.nama_spesialis}}</td>
                                        <td>@{{item.hari}}</td>
                                        <td>@{{item.jam_mulai}}</td>
                                        <td>@{{item.jam_selesai}}</td>
                                        <td>aksi</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card" id="daftar_recent">
                    <div class="card-body">
                        <h4>jam sift kerja</h4>
                        <ul class="list-group">
                            @foreach ($datajam as $item)
                            <li class="list-group-item">{{$item->jam_mulai}} sampai dengan {{$item->jam_selesai}}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="card" id="daftar_update">
                    <div class="card-body">
                        <h4>Hari kerja </h4>
                        <ul class="list-group">
                            <li class="list-group-item">Senin</li>
                            <li class="list-group-item">Selasa</li>
                            <li class="list-group-item">Rabu</li>
                            <li class="list-group-item">Kamis</li>
                            <li class="list-group-item">Jumat</li>
                            <li class="list-group-item">Sabtu</li>
                            <li class="list-group-item">Minggu</li>
                        </ul>
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
{{-- <script src="{{asset('Componentadmin/plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script> --}}

{{-- <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script> --}}
{{-- <script src="{{asset('Componentadmin/plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script> --}}
<script>
    var vue = new Vue({
        el: "#vueField",
        data: {
            form: {
                poli: '',
                berdasarkan: '',
                search: '',
            },
            jadwaljam: {
                senin: '',
                selasa: '',
                rabu: '',
                kamis: '',
                jumat: '',
                sabtu: '',
                minggu: '',
                jam: '',
            },
            foto: "{{asset('/images/index.png')}}",
            dataDokter: [],
            panjang: '',

            id_dokter: '',
            nama: '',
            jenis_kelamin: '',
            email: '',
            telpon: '',
            spesialis: '',
            jabatan: '',
            agama: '',
            alamat: '',
            jadwalterisi: [],
            data_jadwal: [],
            dataTableJadwal: '',

        },
        mounted: function () {
            this.prepareTable();
        },
        methods: {
            prepareTable: function () {
                this.tampil_tablejadwal();
                $('#tabledokterlist').DataTable();
            },
            tampil_tablejadwal: function () {
                 const self = this;
                if (self.dataTableJadwal) {
                    self.data_jadwal = '';
                    self.dataTableJadwal.destroy(); //digunakan agar bisa reinit table
                }
                axios.get('/ambiljadwaldokter').then(response => {
                        self.isFirstDataLoaded = true;
                        if (response) {
                            self.data_jadwal = response.data;

                            Vue.nextTick(function () {
                                // save a reference to the dataTableJadwal
                                self.dataTableJadwal = $('#table_jadwal').DataTable({
                                    "paging": true,
                                    "info": false,
                                    // etc
                                });
                            });
                        } else {
                            alert(response);
                        }
                    })
                    .catch(err => {
                        swal("gagal", err.message, "error");
                    });
            },
            search: function () {
                const vm = this;
                if ((!this.form.poli || !this.form.berdasarkan) || (!this.form.poli && !this.form
                        .berdasarkan)) {
                    if (!vm.form.poli) {
                        $('#poli').focus();
                        $('#poli').addClass("is-invalid");
                        return;
                    }
                    if (!vm.form.berdasarkan) {
                        $('#berdasarkan').focus();
                        $('#berdasarkan').addClass("is-invalid");
                        return;
                    }
                } else {
                    $('#poli').removeClass("is-invalid");
                    $('#berdasarkan').removeClass("is-invalid");
                }
            },
            searchOn: function () {
                const vm = this;
                pencarian = this.form.search;
                this.id_dokter = '';
                this.nama = '';
                this.jenis_kelamin = '';
                this.email = '';
                this.telpon = '';
                this.spesialis = '';
                this.jabatan = '';
                this.agama = '';
                this.alamat = '';
                if (pencarian) {
                    $('#listdata').removeClass('collapse');
                } else {
                    $('#listdata').addClass('collapse');
                }
                var form_data = new FormData();

                form_data.append("pencarian", pencarian);
                form_data.append("poli", this.form.poli);
                form_data.append("berdasarkan", this.form.berdasarkan);

                axios.post('/caridokter', form_data).then(Resp => {
                    // alert(Resp.data.message);
                    vm.dataDokter = Resp.data.message;
                    console.log();
                });
            },
            poli: function () {
                if (this.form.poli) {
                    $('#poli').removeClass("is-invalid");
                } else {
                    $('#poli').addClass("is-invalid");
                }
            },
            berdasarkan: function () {
                if (this.form.berdasarkan) {
                    $('#berdasarkan').removeClass("is-invalid");
                } else {
                    $('#berdasarkan').addClass("is-invalid");
                }
            },
            selected: function (id_dokter, nama_dokter) {
                // this.id_dokter = id_dokter; //sudah ada di selectedrow
                this.form.search = nama_dokter;
                $('#listdata').addClass('collapse');
                this.selectedrow(id_dokter, nama_dokter, this.form.poli);
            },
            selectedrow: function (id_dokter, nama_dokter, spesialis) {
                $('#poli').removeClass("is-invalid");
                $('#berdasarkan').removeClass("is-invalid");

                axios.get('/ambil_dokter/' + id_dokter).then(Resp => {

                    this.id_dokter = id_dokter;
                    this.nama = Resp.data.nama_dokter;
                    if (Resp.data.jenis_kelamin == 'L') {
                        this.jenis_kelamin = "laki-laki";
                    } else {
                        this.jenis_kelamin = "perempuan";
                    };
                    this.email = Resp.data.email;
                    this.telpon = Resp.data.telpon;
                    this.spesialis = Resp.data.spesialis;
                    this.jabatan = Resp.data.jabatan;
                    this.agama = Resp.data.agama;
                    this.alamat = Resp.data.alamat;
                    if (Resp.data.foto) {
                    this.foto = "storage/fotoDokter/" + this.nama + "-" + Resp.data.NIK + "/" +
                        Resp.data.foto;
                    }else{
                        this.foto = "{{asset('/images/index.png')}}";
                    }
                    this.jadwal();
                }).catch(error => {
                    swal("Gagal ambil data detail Dokter!", "hub administrator", "error");
                })

                this.form.berdasarkan = "Nama";
                this.form.poli = spesialis;
                this.form.search = nama_dokter;
                $('#exampleModal').modal('hide');
                $('.modal-backdrop').remove();
            },
            ready: function () {
                this.form.search = '';
                this.dataDokter = '';
            },
            buatjadwal: function () {
                var form_data = new FormData();
                $.each(this.form, function (index, value) {
                    form_data.append(index, value);
                });
                $.each(this.jadwaljam, function (index, value) {
                    form_data.append(index, value);
                });

                axios.post('/buatjadwal/' + this.id_dokter, form_data).then(resp => {
                    swal("berhasil membuat jadwal",
                        resp.data.message,
                        "success");
                    this.jadwaljam.senin = "";
                    this.jadwaljam.selasa = "";
                    this.jadwaljam.rabu = "";
                    this.jadwaljam.kamis = "";
                    this.jadwaljam.jumat = "";
                    this.jadwaljam.sabtu = "";
                    this.jadwaljam.minggu = "";
                    this.jadwaljam.jam = "";
                    this.jadwal();
                }).catch(error => {
                    swal("gagal", "gagal buat jadwal dokter",
                        "error");
                });
            },
            jadwal: function () {
                const self = this;
                if (this.id_dokter) {
                    axios.get('/ambil_jadwal/' + this.id_dokter).then(response => {
                            if (response) {
                                self.jadwalterisi = response.data;

                            } else {
                                alert(response);
                            }
                        })
                        .catch(err => {
                            swal("gagal", err.message, "error");
                        });
                }


            }
        }
    });

</script>
@endsection
