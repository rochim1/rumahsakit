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
                <li class="breadcrumb-item active"><a href="javascript:void(0)">tambah spesialis</a></li>
            </ol>
        </div>
    </div>

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
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title pb-2">Daftar Spesialis</h4>
                            <a id="tambah_spesialis" v-on:click="tambah_spesialis" href="javascript();"
                                data-placement="top" title="tambah spesialis" class="tambah" data-toggle="modal"
                                data-target="#exampleModal"><span style="font-size: 20px; font-weight: bold"
                                    class="icon-plus"></span></a>

                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">tambah spesialis</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form v-on:submit.prevent>
                                                <div class="form-group">
                                                    <label>nama spesialis</label>
                                                    <input id="inputSpesialis" v-model="spesialis" type="text"
                                                        class="form-control" placeholder="">
                                                    <small id="emailHelp" class="form-text text-muted">semoga dengan ini
                                                        layanan kesehatan dirumah sakit menjadi lebih baik.</small>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button id="submit_spesialis" type="button" v-on:click="simpan_spesialis"
                                                class="btn btn-primary gradient-1">tambah</button>
                                            <button id="hapus_spesialis" type="button" v-on:click="hapus_spesialis"
                                                class="collapse btn btn-danger"><span class="icon-trash"></span>
                                                hapus</button>
                                            <button id="edit_spesialis" type="button" v-on:click="edit_spesialis"
                                                class="collapse btn btn-primary gradient-1"><span class="icon-pencil"></span>
                                                edit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive" v-show="isFirstDataLoaded" style="display: none">
                            <table ref="table" id="tableSpesialis"
                                class="table table-hover table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>spesialis</th>
                                        <th>jumlah person</th>
                                    </tr>
                                </thead>
                                @php
                                $no = 1;
                                @endphp
                                <tr :id="'row-'+item.id_spesialis" v-for="(item, index) in data_spesialis"
                                    :key="item.id_spesialis" v-on:click="editSpesialis(item.id_spesialis)">
                                    <td>@{{ index+1 }}</td>
                                    <td>@{{item.spesialis}}</td>
                                    <td>null</td>
                                </tr>
                                {{-- @foreach ($dataSpesialis as $item)
                                <tr v-on:click="editSpesialis({{$item->id_spesialis}})">
                                <td>{{$no++}}</td>
                                <td>{{$item->spesialis}}</td>
                                </tr>
                                @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">

                            <h4 class="card-title pb-2">Daftar Jabatan</h4>

                            <a id="tambah_jabatan" v-on:click="tambah_jabatan" href="javascript();" data-placement="top" title="tambah jabatan" class="tambah"
                                data-toggle="modal" data-target="#exampleModal1"><span
                                    style="font-size: 20px; font-weight: bold" class="icon-plus"></span></a>

                            <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModal1Label" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModal1Label">tambah jabatan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form v-on:submit.prevent>
                                                <div class="form-group">
                                                    <label>nama jabatan</label>
                                                    <input id="inputjabatan" v-model="jabatan" type="text"
                                                        class="form-control" placeholder="">
                                                    <small id="emailHelp" class="form-text text-muted">semoga dengan ini
                                                        layanan kesehatan dirumah sakit menjadi lebih baik.</small>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button id="submit_jabatan" type="button" v-on:click="simpan_jabatan"
                                                class="btn btn-primary gradient-1">tambah</button>
                                            <button id="hapus_jabatan" type="button" v-on:click="hapus_jabatan"
                                                class="collapse btn btn-danger"><span class="icon-trash"></span>
                                                hapus</button>
                                            <button id="edit_jabatan" type="button" v-on:click="edit_jabatan"
                                                class="collapse btn btn-primary gradient-1"><span class="icon-pencil"></span>
                                                edit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-show="isFirstDataLoaded" style="display: none" class="table-responsive">
                            <table id="tablejabatan" class="table table-hover table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jabatan</th>

                                        <th>jumlah person</th>
                                    </tr>
                                </thead>
                                <tr :id="'row-'+item.id_spesialis" v-for="(item, index) in data_jabatan"
                                    :key="item.id_jabatan" v-on:click="editjabatan(item.id_jabatan)">
                                    <td>@{{ index+1 }}</td>
                                    <td>@{{item.jabatan}}</td>
                                    <td>null</td>
                                </tr>

                                {{-- @php
                                $no = 1;
                                @endphp
                                @foreach ($dataJabatan as $item)
                                <tr v-on:click="editJabatan({{$item->id_jabatan}})">
                                <td>{{$no++}}</td>
                                <td>{{$item->jabatan}}</td>
                                <td>null</td>
                                </tr>
                                @endforeach --}}
                                </tbody>
                            </table>
                        </div>
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
<script src="{{asset('Componentadmin/plugins/tables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('Componentadmin/plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>

{{-- <script src="{{asset('Componentadmin/plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script> --}}
{{-- model lama --}}
{{-- <script>
    $(document).ready( function () {
    $('#tableSpesialis').DataTable();
} );
</script> --}}
<script>
    let vue = new Vue({
        el: "#dokter",
        mounted: function () {
            this.tampil_jabatan();
            this.tampil_spesialis();
        }
        ,
        created: function () {
            // non-observable vars can go here



            // this.init();
        },
        data: {
            id_spesialis: '',
            spesialis: '',
            id_jabatan: '',
            jabatan: '',
            isFirstDataLoaded: false,
            dataTable: null,
            data_spesialis: [],

            dataTable1: null,
            data_jabatan: [],
        },
        methods: {
            cek: function () {
                 this.jabatan = "mantap";
            },
            tampil_spesialis: function () {
                const self = this;
                if (self.dataTable) {
                    self.data_spesialis = '';
                    self.dataTable.destroy(); //digunakan agar bisa reinit table
                }
                axios.get('/tampil_spesialis').then(response => {
                        self.isFirstDataLoaded = true;
                        if (response) {
                            self.data_spesialis = response.data;

                            Vue.nextTick(function () {
                                // save a reference to the DataTable
                                self.dataTable = $('#tableSpesialis').DataTable({
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
            tambah_spesialis: function () {
                this.spesialis = '';
                $('#exampleModalLabel').html("tambah spesialis");
                $('#submit_spesialis').removeClass("collapse");
                $('#edit_spesialis').addClass("collapse");
                $('#hapus_spesialis').addClass("collapse");
            },
            simpan_spesialis: function () {
                const self = this;
                var data = new FormData();
                data.append('spesialis', this.spesialis);
                axios.post('/simpan_spesialis', data)
                    .then(resp => {
                        swal("sukses", resp.data.message, "success");
                        $('#exampleModal').modal('hide');
                        $('.modal-backdrop').remove();
                        this.tampil_spesialis();
                    })
                    .catch(err => {
                        swal("gagal", err.response.data, "error");
                    });
            },
            editSpesialis: function (id) {
                $('#exampleModalLabel').html("kelola spesialis");
                $('#submit_spesialis').addClass("collapse");
                $('#edit_spesialis').removeClass("collapse");
                $('#hapus_spesialis').removeClass("collapse");
                $('#exampleModal').modal('show');
                axios.post('ambil_spesialis/' + id).then(
                        Respon => {
                            this.spesialis = Respon.data[0].spesialis;
                            this.id_spesialis = Respon.data[0].id_spesialis;
                        })
                    .catch(
                        err => {
                            swal("Gagal tampil detail spesialis!",
                                "hub administrator", "error");
                        }
                    );

            },
            edit_spesialis: function () {
                var data = new FormData;
                data.append('spesialis', this.spesialis);
                axios.post('/edit_spesialis/' + this.id_spesialis, data).then(Resp => {
                        swal("Sukses!",
                            Resp.data.message, "success");
                            $('#exampleModal').modal('hide');
                            this.tampil_spesialis();
                    })
                    .catch(
                        err => {
                            swal("Gagal!",
                                err.response.data.message, "error");
                        }
                    );

            },
            hapus_spesialis: function () {
                const self = this;
                axios.post('hapus_spesialis/' + this.id_spesialis).then(
                    Respon => {
                        swal("Sukses!",
                            Respon.data.message, "success");
                            $('#exampleModal').modal('hide');
                            this.tampil_spesialis();
                        // self.dataTable.row('#row-' + this.id_spesialis).remove().draw('full-hold');
                        // now clean up our list
                        // self.data_spesialis.splice(index, 1);
                    });
                $('#exampleModal').modal('hide');
            },
            // ////
            tampil_jabatan: function () {
                const self = this;
                if (self.dataTable1) {
                    self.data_jabatan = '';
                    self.dataTable1.destroy(); //digunakan agar bisa reinit table
                }
                axios.get('/tampil_jabatan').then(response => {
                        self.isFirstDataLoaded = true;
                        if (response) {
                            self.data_jabatan = response.data;

                            Vue.nextTick(function () {
                                // save a reference to the DataTable
                                self.dataTable1 = $('#tablejabatan').DataTable({
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
            tambah_jabatan: function () {
                // $('#inputjabatan').val('');
                this.jabatan = '';
                $('#exampleModalLabel1').html("tambah jabatan");
                $('#submit_jabatan').removeClass("collapse");
                $('#edit_jabatan').addClass("collapse");
                $('#hapus_jabatan').addClass("collapse");
            },
            simpan_jabatan: function () {
                const self = this;
                var data = new FormData();
                data.append('jabatan', this.jabatan);
                axios.post('/simpan_jabatan', data)
                    .then(resp => {
                        swal("sukses", resp.data.message, "success");
                        $('#exampleModal1').modal('hide');
                        $('.modal-backdrop').remove();
                        this.tampil_jabatan();
                    })
                    .catch(err => {
                        swal("gagal", err.response.data, "error");
                    });
            },
            editjabatan: function (id) {
                $('#exampleModalLabel1').html("kelola jabatan");
                $('#submit_jabatan').addClass("collapse");
                $('#edit_jabatan').removeClass("collapse");
                $('#hapus_jabatan').removeClass("collapse");
                $('#exampleModal1').modal('show');
                axios.post('ambil_jabatan/' + id).then(
                        Respon => {
                            this.jabatan = Respon.data[0].jabatan;
                            this.id_jabatan = Respon.data[0].id_jabatan;
                        })
                    .catch(
                        err => {
                            swal("Gagal tampil detail jabatan!",
                                "hub administrator", "error");
                        }
                    );

            },
            edit_jabatan: function () {
                var data = new FormData;
                data.append('jabatan', this.jabatan);
                axios.post('/edit_jabatan/' + this.id_jabatan, data).then(Resp => {
                        swal("Sukses!",
                            Resp.data.message, "success");
                        $('#exampleModal1').modal('hide');
                        this.tampil_jabatan();
                    })
                    .catch(
                        err => {
                            swal("Gagal!",
                                err.response.data.message, "error");
                        }
                    );

            },
            hapus_jabatan: function () {
                const self = this;
                axios.post('hapus_jabatan/' + this.id_jabatan).then(
                    Respon => {
                        swal("Sukses!",
                            Respon.data.message, "success");
                            $('#exampleModal1').modal('hide');
                            this.tampil_jabatan();

                        // self.dataTable1.row('#row-' + this.id_jabatan).remove().draw('full-hold');
                        // // now clean up our list
                        // self.data_jabatan.splice(index, 1);
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
