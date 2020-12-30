@extends('admin.index')
@section('title','tambah tindakan')
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
<div id="tindakan" class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">tambah tindakan</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="tindakan_dokter" data-toggle="tab" href="#kedokteran" role="tab"
                    aria-controls="kedokteran" aria-selected="true">kedokteran</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tindakan_laborat" data-toggle="tab" href="#laboratorium" role="tab"
                    aria-controls="laboratorium" aria-selected="false">laboratorium</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tindakan_keperawatan" data-toggle="tab" href="#keperawatan" role="tab"
                    aria-controls="keperawatan" aria-selected="false">keperawatan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tindakan_darurat" data-toggle="tab" href="#darurat" role="tab"
                    aria-controls="darurat" aria-selected="false">darurat</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="kedokteran" role="tabpanel" aria-labelledby="tindakan_dokter">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h4>daftar tindakan kedokteran/medis</h4>
                                    <a id="tambah_tindakan" v-on:click="tambah_tindakan" href="javascript();"
                                        data-placement="top" title="tambah tindakan" class="tambah" data-toggle="modal"
                                        data-target="#exampleModal"><span style="font-size: 20px; font-weight: bold"
                                            class="icon-plus"></span></a>

                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                        aria-labelledby="modaltindakan" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modaltindakan">tambah tindakan</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form v-on:submit.prevent class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>nama tindakan</label>
                                                                <input v-model="form_tindakan.nama_tindakan"
                                                                    id="inputtindakan" class="form-control" type="text">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label>kategori tindakan</label>
                                                                <select v-model="form_tindakan.spesialis"
                                                                    id="kategori_tindakan" type="text"
                                                                    class="form-control" placeholder="">
                                                                    @foreach ($dataSpesialis as $item)
                                                                    <option value="{{$item->id_spesialis}}">
                                                                        {{$item->spesialis}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>harga tindakan</label>
                                                                <input type="number" class="form-control"
                                                                    v-model="form_tindakan.harga_tindakan">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>keterangan</label>
                                                                <textarea v-model="form_tindakan.deskripsi_tindakan"
                                                                    class="form-control">@{{form_tindakan.deskripsi_tindakan}}</textarea>
                                                            </div>
                                                        </div>

                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button id="submit_tindakan" type="button"
                                                        v-on:click="simpan_tindakan"
                                                        class="btn btn-primary gradient-1">tambah</button>
                                                    <button id="hapus_tindakan" type="button"
                                                        v-on:click="hapus_tindakan"
                                                        class="collapse btn btn-danger gradient-2"><span class="icon-trash"></span>
                                                        hapus</button>
                                                    <button id="edit_tindakan" type="button" v-on:click="edit_tindakan"
                                                        class="collapse btn btn-primary gradient-1"><span
                                                            class="icon-pencil"></span>
                                                        edit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="tabletindakan"
                                        class="w-100 table table-hover table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <td>no</td>
                                                <td>nama tindakan</td>
                                                <td>kategori spesialis</td>
                                                <td>harga tindakan</td>
                                                <td>add at</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-on:click="edittindakan(item.id_tinDokter)"
                                                :id="'row-'+item.id_tinDokter" v-for="(item, index) in data_tindakan"
                                                :key="item.id_tinDokter">
                                                <td>@{{index+1}}</td>
                                                <td>@{{item.nama_tindakan}}</td>
                                                <td>@{{item.nama_spesialis}}</td>
                                                <td>@{{item.harga_tindakan}}</td>
                                                <td>@{{item.created_at}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title pb-2">filter tindakan berdasarkan</h4>
                                <form v-on:submit.prevent>
                                    <div class="form-group">
                                        <label>kategori tindakan</label>
                                        <select v-model="filter_idSpesialis" v-on:change="filter_tindakan"
                                            id="kategori_tindakan" type="text" class="form-control" placeholder="">
                                            @foreach ($dataSpesialis as $item)
                                            <option value="{{$item->id_spesialis}}">{{$item->spesialis}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </form>


                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title pb-2">tindakan paling sering</h4>

                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title pb-2">terakhir diedit</h4>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="laboratorium" role="tabpanel" aria-labelledby="tindakan_laborat">...</div>
            <div class="tab-pane fade" id="keperawatan" role="tabpanel" aria-labelledby="tindakan_keperawatan">...</div>
            <div class="tab-pane fade" id="darurat" role="tabpanel" aria-labelledby="tindakan_darurat">...</div>
        </div>
        <!-- #/ container -->
    </div>
</div>
@endsection
@section('script')
{{-- model lama --}}
{{-- <script src="{{asset('Componentadmin/plugins/tables/js/jquery.dataTables.min.js')}}"></script> --}}
<script src="{{asset('Componentadmin/plugins/tables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('Componentadmin/plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
{{-- <script src="{{asset('Componentadmin/plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script>
--}}
{{-- model lama --}}
{{-- <script>
    $(document).ready( function () {
    $('#tabletindakan').DataTable();
} );
</script> --}}
<script>
    let vue = new Vue({
        el: "#tindakan",
        data: {
            isFirstDataLoaded: false,
            form_tindakan: {
                id_tindakan: '',
                nama_tindakan: '',
                spesialis: '',
                harga_tindakan: '',
                deskripsi_tindakan: '',
                add_at: '',
            },

            dataTable: null,
            data_tindakan: [],

            filter_idSpesialis: '',
        },
        mounted: function () {
            this.tampil_tindakan();
            // this.tampil_kategori();
            // this.tampil_satuan();
        },
        methods: {
            tampil_tindakan: function () {
                const self = this;
                if (self.dataTable) {
                    self.data_tindakan = '';
                    self.dataTable.destroy(); //digunakan agar bisa reinit table
                }
                axios.get('/tampil_tindakan').then(response => {
                        self.isFirstDataLoaded = true;
                        if (response) {
                            self.data_tindakan = response.data;

                            Vue.nextTick(function () {
                                // save a reference to the DataTable
                                self.dataTable = $('#tabletindakan').DataTable({
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
            filter_tindakan: function () {
                const self = this;
                if (self.dataTable) {
                    self.data_tindakan = '';
                    self.dataTable.destroy(); //digunakan agar bisa reinit table
                }
                axios.get('/filter_tindakan/' + self.filter_idSpesialis).then(response => {
                        self.isFirstDataLoaded = true;
                        if (response) {
                            self.data_tindakan = response.data;

                            Vue.nextTick(function () {
                                // save a reference to the DataTable
                                self.dataTable = $('#tabletindakan').DataTable({
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
            tambah_tindakan: function () {
                const vm = this;
                $.each(vm.form_tindakan, function (index, value) {
                    vm.form_tindakan[index] = '';
                });
                $('#modaltindakan').html("tambah tindakan");
                $('#submit_tindakan').removeClass("collapse");
                $('#edit_tindakan').addClass("collapse");
                $('#hapus_tindakan').addClass("collapse");
            },
            simpan_tindakan: function () {
                const self = this;
                var data = new FormData();
                $.each(this.form_tindakan, function (index, value) {
                    data.append(index, value);
                });
                axios.post('/simpan_tindakan', data)
                    .then(resp => {
                        swal("sukses", resp.data.message, "success");
                        $('#exampleModal').modal('hide');
                        $('.modal-backdrop').remove();
                        if (this.filter_idSpesialis) {
                            this.filter_tindakan();
                        } else {
                            this.tampil_tindakan();
                        }
                    })
                    .catch(err => {
                        console.log(err.response.data);
                        swal("gagal", err.response.data.message, "error");
                    });
            },
            edittindakan: function (id) {
                const vm = this;
                vm.form_tindakan.id_tindakan = id;
                $('#modaltindakan').html("kelola tindakan");
                $('#submit_tindakan').addClass("collapse");
                $('#edit_tindakan').removeClass("collapse");
                $('#hapus_tindakan').removeClass("collapse");
                $('#exampleModal').modal('show');
                axios.post('ambil_tindakan/' + id).then(
                        Respon => {
                            vm.form_tindakan.id_tindakan = Respon.data.id_tinDokter;
                            vm.form_tindakan.spesialis = Respon.data.id_spesialis;
                            vm.form_tindakan.nama_tindakan = Respon.data.nama_tindakan;
                            vm.form_tindakan.harga_tindakan = Respon.data.harga_tindakan;
                            vm.form_tindakan.deskripsi_tindakan = Respon.data.keterangan_tindakan;
                        })
                    .catch(
                        err => {
                            swal("Gagal tampil detail tindakan!", "hub administrator", "error");
                        }
                    );

            },
            edit_tindakan: function () {
                var data = new FormData;

                $.each(this.form_tindakan, function (index, value) {
                    data.append(index, value);
                });

                axios.post('/edit_tindakan/' + this.form_tindakan.id_tindakan, data).then(Resp => {
                        swal("Sukses!",
                            Resp.data.message, "success");
                        $('#exampleModal').modal('hide');
                        if (this.filter_idSpesialis) {
                            this.filter_tindakan();
                        } else {
                            this.tampil_tindakan();
                        }
                    })
                    .catch(
                        err => {
                            swal("Gagal!",
                                err.response.data.message, "error");
                        }
                    );

            },
            hapus_tindakan: function () {
                swal("yakin anda akan menghapus", {
                        buttons: {
                            cancel: "batal",
                            hapus: true,
                        },
                    })
                    .then((value) => {
                        switch (value) {
                            case "hapus":
                                const self = this;
                                axios.post('hapus_tindakan/' + this.form_tindakan.id_tindakan).then(
                                    Respon => {
                                        swal("Sukses!",
                                            Respon.data.message, "success");
                                        $('#exampleModal').modal('hide');
                                        if (this.filter_idSpesialis) {
                                             this.filter_tindakan();
                                        } else {
                                            this.tampil_tindakan();
                                        }
                                    });
                                $('#exampleModal').modal('hide');
                                break;
                            default:
                                return 0;
                        }
                    });
            },
        }
    })

</script>
{{-- <script src="{{asset('Componentadmin/plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.semanticui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script> --}}
@endsection
