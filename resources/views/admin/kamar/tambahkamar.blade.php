@extends('admin.index')
@section('title','tambah kamar')
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
<div id="kamar" class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12 alert alert-warning alert-dismissible fade show" role="alert">
                <h4>todo :</h4>
                <strong>developer notice!</strong>
                aplication has some bug; in view list data on table after user update or insert new data the table was
                no reload data. sugest to learn php pageination to make own datatable using laravel and vue js
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title pb-2">Daftar kamar</h4>
                            <a id="tambah_kamar" v-on:click="tambah_kamar" href="javascript();" data-placement="top"
                                title="tambah kamar" class="tambah" data-toggle="modal"
                                data-target="#exampleModal"><span style="font-size: 20px; font-weight: bold"
                                    class="icon-plus"></span></a>

                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">tambah kamar</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form v-on:submit.prevent>
                                                <div class="form-group">
                                                    <label>nama kamar - kelas</label>
                                                    <div class="row">
                                                        <div class="col-md-4 input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"
                                                                    id="inputGroupPrepend3">KM-</span>
                                                            </div>
                                                            @php
                                                            $akhir = $dataKamar->nama_kamar;
                                                            $nmrKmr = substr($akhir, 3);
                                                            $nmrKmr = intval($nmrKmr)+1;
                                                            @endphp
                                                            <input v-model="form_kamar.kamar" id="inputkamar"
                                                                class="form-control" type="text"
                                                                placeholder="{{$nmrKmr}}" value="{{$nmrKmr}}">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <select v-model="form_kamar.kelas" class="form-control"
                                                                placeholder="">
                                                                @foreach ($dataKelas as $item)
                                                                <option value="{{$item->id_kelas}}">{{$item->kelas}}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>nama bangsal</label>
                                                    {{-- <input type="text" v-model="form_kamar.bangsal"> --}}
                                                    <select v-model="form_kamar.bangsal" class="form-control"
                                                        placeholder="">
                                                        @foreach ($dataBangsal as $item)
                                                        <option value="{{$item->id_bangsal}}">{{$item->bangsal}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button id="submit_kamar" type="button" v-on:click="simpan_kamar"
                                                class="btn btn-primary">tambah</button>
                                            <button id="hapus_kamar" type="button" v-on:click="hapus_kamar"
                                                class="collapse btn btn-danger"><span class="icon-trash"></span>
                                                hapus</button>
                                            <button id="edit_kamar" type="button" v-on:click="edit_kamar"
                                                class="collapse btn btn-primary"><span class="icon-pencil"></span>
                                                edit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive" v-show="isFirstDataLoaded" style="display: none">
                            <table ref="table" id="tableKamar"
                                class="table table-hover table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>kamar</th>
                                        <th>kelas</th>
                                        <th>bangsal</th>
                                        <th>status</th>
                                    </tr>
                                </thead>
                                @php
                                $no = 1;
                                @endphp
                                <tr :id="'row-'+item.id_kamar" v-for="(item, index) in data_kamar" :key="item.id_kamar"
                                    v-on:click="editKamar(item.id_kamar)">
                                    <td>@{{ index+1 }}</td>
                                    <td>@{{item.nama_kamar}}</td>
                                    <td>@{{item.kelas}}</td>
                                    <td>
                                        {{-- @php --}}
                                        {{-- echo   $dataBangsal->where('id_bangsal', 7)[0]->bangsal; --}}
                                        {{-- @endphp --}}
                                        @{{item.bangsal}}
                                    </td>

                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">enable</div>
                                        </div>
                                    </td>
                                </tr>
                                {{-- @foreach ($datakamar as $item)
                                <tr v-on:click="editKamar({{$item->id_kamar}})">
                                <td>{{$no++}}</td>
                                <td>{{$item->kamar}}</td>
                                </tr>
                                @endforeach --}}
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
                            <h4 class="card-title pb-2">Daftar Bangsal</h4>
                            <a id="tambah_bangsal" v-on:click="tambah_bangsal" href="javascript();" data-placement="top"
                                title="tambah bangsal" class="tambah" data-toggle="modal"
                                data-target="#olahBangsal"><span style="font-size: 20px; font-weight: bold"
                                    class="icon-plus"></span></a>

                            <div class="modal fade" id="olahBangsal" tabindex="-1" role="dialog"
                                aria-labelledby="olahBangsalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="olahBangsalLabel">tambah bangsal</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form v-on:submit.prevent class="row">
                                                <div class="col-md-8 form-group">
                                                    <label>nama bangsal</label>
                                                    <input id="inputbangsal" v-model="bangsal" type="text"
                                                        class="form-control" placeholder="">
                                                </div>

                                                <div class="col-md-4 form-group">
                                                    <label>lantai</label>
                                                    <input id="inputtingkat" v-model="tingkat" type="text"
                                                        class="form-control" placeholder="">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button id="submit_bangsal" type="button" v-on:click="simpan_bangsal"
                                                class="btn btn-primary">tambah</button>
                                            <button id="hapus_bangsal" type="button" v-on:click="hapus_bangsal"
                                                class="collapse btn btn-danger"><span class="icon-trash"></span>
                                                hapus</button>
                                            <button id="edit_bangsal" type="button" v-on:click="edit_bangsal"
                                                class="collapse btn btn-primary"><span class="icon-pencil"></span>
                                                edit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="list-group" v-for="item in dataBangsal">
                            <span style="display: flex" class="row list-group-item list-group-item-action">
                                <span class="col-md-8">
                                    @{{item.bangsal}}
                                </span>
                                <span class="col-md-4">
                                    <a href="javascript:;" v-on:click="editbangsal(item.id_bangsal)"> <span
                                            class="icon-pencil"></span></a> |
                                    <a href="" v-on:click="hapus_dokter(item.id_dokter, $event)">
                                        <span class="icon-trash text-danger"></span>
                                    </a>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title pb-2">Daftar Kelas</h4>
                            <a id="tambah_kelas" v-on:click="tambah_kelas" href="javascript();" data-placement="top"
                                title="tambah kelas" class="tambah" data-toggle="modal" data-target="#olahKelas"><span
                                    style="font-size: 20px; font-weight: bold" class="icon-plus"></span></a>

                            <div class="modal fade" id="olahKelas" tabindex="-1" role="dialog"
                                aria-labelledby="olahKelasLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="olahKelasLabel">tambah kamar</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form v-on:submit.prevent>
                                                <div class="form-group">
                                                    <label>nama kelas</label>
                                                    <input id="inputkelas" v-model="kelas" type="text"
                                                        class="form-control" placeholder="">
                                                    <small id="emailHelp" class="form-text text-muted">semoga dengan ini
                                                        layanan kesehatan dirumah sakit menjadi lebih baik.</small>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button id="submit_kelas" type="button" v-on:click="simpan_kelas"
                                                class="btn btn-primary">tambah</button>
                                            <button id="hapus_kelas" type="button" v-on:click="hapus_kelas"
                                                class="collapse btn btn-danger"><span class="icon-trash"></span>
                                                hapus</button>
                                            <button id="edit_kelas" type="button" v-on:click="edit_kelas"
                                                class="collapse btn btn-primary"><span class="icon-pencil"></span>
                                                edit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="list-group">

                            @foreach ($dataKelas as $item)
                            <span style="display: flex" class="row list-group-item list-group-item-action">
                                <span class="col-md-8">
                                    {{$item->kelas}}
                                </span>
                                <span class="col-md-4">
                                    <a href="javascript:;" v-on:click="get_dokter(item.id_dokter)"> <span
                                            class="icon-pencil"></span></a> |
                                    <a href="" v-on:click="hapus_dokter(item.id_dokter, $event)">
                                        <span class="icon-trash text-danger"></span>
                                    </a>
                                </span>
                            </span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>
    @endsection
    @section('script')
    {{-- model lama --}}
    {{-- <script src="{{asset('Componentadmin/plugins/tables/js/jquery.dataTables.min.js')}}"></script> --}}
    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('Componentadmin/plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
    {{-- <script src="{{asset('Componentadmin/plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script>
    --}}
    {{-- model lama --}}
    {{-- <script>
    $(document).ready( function () {
    $('#tableKamar').DataTable();
} );
</script> --}}
    <script>
        let vue = new Vue({
            el: "#kamar",
            data: {
                isFirstDataLoaded: false,
                form_kamar: {
                    id_kamar: '',
                    kamar: '',
                    kelas: '',
                    bangsal: '',
                },

                kelas: '',
                dataKelas: '',

                bangsal: '',
                tingkat: '',
                dataBangsal: '',

                dataTable: null,
                data_kamar: [],
            },
            mounted: function () {
                this.tampil_kamar();
                this.tampil_bangsal();
            },
            methods: {
                tampil_kamar: function () {
                    const self = this;
                    if (self.dataTable) {
                        self.data_kamar = '';
                        self.dataTable.destroy(); //digunakan agar bisa reinit table
                    }
                    axios.get('/tampil_kamar').then(response => {
                            self.isFirstDataLoaded = true;
                            if (response) {
                                self.data_kamar = response.data;

                                Vue.nextTick(function () {
                                    // save a reference to the DataTable
                                    self.dataTable = $('#tableKamar').DataTable({
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
                tambah_kamar: function () {
                    axios.get('/prever_namakamar').then(resp => {
                            console.log(resp.data);
                            this.form_kamar.kamar = resp.data;
                        })
                        .catch(err => {

                        })
                    $('#exampleModalLabel').html("tambah kamar");
                    $('#submit_kamar').removeClass("collapse");
                    $('#edit_kamar').addClass("collapse");
                    $('#hapus_kamar').addClass("collapse");
                },
                simpan_kamar: function () {
                    const self = this;
                    var data = new FormData();
                    $.each(this.form_kamar, function (index, value) {
                        data.append(index, value);
                    });
                    namakamar = $('#inputkamar').val();
                    data.append('nama_kamar', namakamar);

                    axios.post('/simpan_kamar', data)
                        .then(resp => {
                            swal("sukses", resp.data.message, "success");
                            $('#exampleModal').modal('hide');
                            $('.modal-backdrop').remove();
                            this.tampil_kamar();
                        })
                        .catch(err => {
                            console.log(err.response.data);
                            swal("gagal", err.response.data.message, "error");
                        });
                },
                editKamar: function (id) {

                    const vm = this;
                    vm.form_kamar.id_kamar = id;
                    $('#exampleModalLabel').html("kelola kamar");
                    $('#submit_kamar').addClass("collapse");
                    $('#edit_kamar').removeClass("collapse");
                    $('#hapus_kamar').removeClass("collapse");
                    $('#exampleModal').modal('show');
                    axios.post('ambil_kamar/' + id).then(
                            Respon => {

                                vm.form_kamar.id_kamar = Respon.data.id_kamar;
                                vm.form_kamar.kamar = Respon.data.nama_kamar;
                                vm.form_kamar.kelas = Respon.data.kelas; //berisi id kelas
                                vm.form_kamar.bangsal = Respon.data.bangsal; //berisi id bangsal
                            })
                        .catch(
                            err => {
                                swal("Gagal tampil detail kamar!",
                                    "hub administrator", "error");
                            }
                        );

                },
                edit_kamar: function () {
                    var data = new FormData;

                    $.each(this.form_kamar, function (index, value) {
                        data.append(index, value);
                    });
                    namakamar = $('#inputkamar').val();
                    data.append('nama_kamar', namakamar);

                    axios.post('/edit_kamar/' + this.form_kamar.id_kamar, data).then(Resp => {
                            swal("Sukses!",
                                Resp.data.message, "success");
                            $('#exampleModal').modal('hide');
                            this.tampil_kamar();
                        })
                        .catch(
                            err => {
                                swal("Gagal!",
                                    err.response.data.message, "error");
                            }
                        );

                },
                hapus_kamar: function () {
                    const self = this;
                    axios.post('hapus_kamar/' + this.form_kamar.id_kamar).then(
                        Respon => {
                            swal("Sukses!",
                                Respon.data.message, "success");
                            $('#exampleModal').modal('hide');
                            this.tampil_kamar();
                        });
                    $('#exampleModal').modal('hide');
                },

                // //// kelas

                tampil_kelas: function () {
                    const self = this;
                    if (self.dataTable) {
                        self.data_kelas = '';
                        self.dataTable.destroy(); //digunakan agar bisa reinit table
                    }
                    axios.get('/tampil_kelas').then(response => {
                            self.isFirstDataLoaded = true;
                            if (response) {
                                self.data_kelas = response.data;

                                Vue.nextTick(function () {
                                    // save a reference to the DataTable
                                    self.dataTable = $('#tablekelas').DataTable({
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
                tambah_kelas: function () {
                    $('#olahBangsalLabel').html("tambah kelas");
                    $('#submit_kelas').removeClass("collapse");
                    $('#edit_kelas').addClass("collapse");
                    $('#hapus_kelas').addClass("collapse");
                },
                simpan_kelas: function () {
                    const self = this;
                    var data = new FormData();
                    $.each(this.form_kelas, function (index, value) {
                        data.append(index, value);
                    });
                    namakelas = $('#inputkelas').val();
                    data.append('nama_kelas', namakelas);

                    axios.post('/simpan_kelas', data)
                        .then(resp => {
                            swal("sukses", resp.data.message, "success");
                            $('#exampleModal').modal('hide');
                            $('.modal-backdrop').remove();
                            this.tampil_kelas();
                        })
                        .catch(err => {
                            console.log(err.response.data);
                            swal("gagal", err.response.data.message, "error");
                        });
                },
                editkelas: function (id) {
                    const vm = this;
                    $('#olahBangsalLabel').html("kelola kelas");
                    $('#submit_kelas').addClass("collapse");
                    $('#edit_kelas').removeClass("collapse");
                    $('#hapus_kelas').removeClass("collapse");
                    $('#exampleModal').modal('show');
                    axios.post('ambil_kelas/' + id).then(
                            Respon => {
                                $('#inputkelas').val(Respon.data[0].nama_kelas);
                                vm.form_kelas.id_kelas = Respon.data[0].id_kelas;
                                vm.form_kelas.kelas = Respon.data[0].kelas;
                                vm.form_kelas.bangsal = Respon.data[0].kelas;
                            })
                        .catch(
                            err => {
                                swal("Gagal tampil detail kelas!",
                                    "hub administrator", "error");
                            }
                        );

                },
                edit_kelas: function () {
                    var data = new FormData;

                    $.each(this.form_kelas, function (index, value) {
                        data.append(index, value);
                    });
                    namakelas = $('#inputkelas').val();
                    data.append('nama_kelas', namakelas);

                    axios.post('/edit_kelas/' + this.id_kelas, data).then(Resp => {
                            swal("Sukses!",
                                Resp.data.message, "success");
                            $('#exampleModal').modal('hide');
                            this.tampil_kelas();
                        })
                        .catch(
                            err => {
                                swal("Gagal!",
                                    err.response.data.message, "error");
                            }
                        );

                },
                hapus_kelas: function () {
                    const self = this;
                    axios.post('hapus_kelas/' + this.form_kelas.id_kelas).then(
                        Respon => {
                            swal("Sukses!",
                                Respon.data.message, "success");
                            $('#exampleModal').modal('hide');
                            this.tampil_kelas();
                        });
                    $('#exampleModal').modal('hide');
                },
                // //// bagsal
                tampil_bangsal: function () {
                    const self = this;
                    if (self.dataTable) {
                        self.dataBangsal = '';
                        self.dataTable.destroy(); //digunakan agar bisa reinit table
                    }
                    axios.get('/dataBangsal').then(response => {
                            self.isFirstDataLoaded = true;
                            if (response) {
                                self.dataBangsal = response.data;
                            } else {
                                alert(response);
                            }
                        })
                        .catch(err => {
                            swal("gagal", err.message, "error");
                        });
                },
                tambah_bangsal: function () {
                    $('#olahBangsalLabel').html("tambah bangsal");
                    $('#submit_bangsal').removeClass("collapse");
                    $('#edit_bangsal').addClass("collapse");
                    $('#hapus_bangsal').addClass("collapse");
                },
                simpan_bangsal: function () {
                    const self = this;
                    var data = new FormData();
                    $.each(this.form_bangsal, function (index, value) {
                        data.append(index, value);
                    });
                    namabangsal = $('#inputbangsal').val();
                    data.append('nama_bangsal', namabangsal);

                    axios.post('/simpan_bangsal', data)
                        .then(resp => {
                            swal("sukses", resp.data.message, "success");
                            $('#exampleModal').modal('hide');
                            $('.modal-backdrop').remove();
                            this.tampil_bangsal();
                        })
                        .catch(err => {
                            console.log(err.response.data);
                            swal("gagal", err.response.data.message, "error");
                        });
                },
                editbangsal: function (id) {
                    const vm = this;
                    
                    $('#olahBangsalLabel').html("kelola bangsal");
                    $('#submit_bangsal').addClass("collapse");
                    $('#edit_bangsal').removeClass("collapse");
                    $('#hapus_bangsal').removeClass("collapse");
                    $('#olahBangsal').modal('show');
                    axios.get('ambil_bangsal/'+ id).then(
                            Respon => {
                                vm.bangsal = Respon.data.bangsal;
                            })
                        .catch(
                            err => {
                                swal("Gagal tampil detail bangsal!",
                                    err.response , "error");
                            }
                        );

                },
                edit_bangsal: function () {
                    var data = new FormData;

                    $.each(this.form_bangsal, function (index, value) {
                        data.append(index, value);
                    });
                    namabangsal = $('#inputbangsal').val();
                    data.append('nama_bangsal', namabangsal);

                    axios.post('/edit_bangsal/' + this.id_bangsal, data).then(Resp => {
                            swal("Sukses!",
                                Resp.data.message, "success");
                            $('#exampleModal').modal('hide');
                            this.tampil_bangsal();
                        })
                        .catch(
                            err => {
                                swal("Gagal!",
                                    err.response.data.message, "error");
                            }
                        );

                },
                hapus_bangsal: function () {
                    const self = this;
                    axios.post('hapus_bangsal/' + this.form_bangsal.id_bangsal).then(
                        Respon => {
                            swal("Sukses!",
                                Respon.data.message, "success");
                            $('#exampleModal').modal('hide');
                            this.tampil_bangsal();
                        });
                    $('#exampleModal').modal('hide');
                },



            }
        })

    </script>
    {{-- <script src="{{asset('Componentadmin/plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.semanticui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script> --}}
    @endsection
