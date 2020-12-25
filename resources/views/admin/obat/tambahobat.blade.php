@extends('admin.index')
@section('title','tambah obat')
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
<div id="obat" class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">tambah obat</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->
    <div class="container-fluid">

        <div class="row">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4>daftar obat</h4>
                            <a id="tambah_obat" v-on:click="tambah_obat" href="javascript();" data-placement="top"
                                title="tambah obat" class="tambah" data-toggle="modal" data-target="#exampleModal"><span
                                    style="font-size: 20px; font-weight: bold" class="icon-plus"></span></a>

                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="modalObat" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalObat">tambah obat</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form v-on:submit.prevent class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label>nama obat</label>
                                                        <input v-model="form_obat.nama_obat" id="inputobat"
                                                            class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>kategori</label>
                                                        <select v-model="form_obat.kategori" class="form-control">
                                                            @foreach ($dataKategori as $item)
                                                            <option value="{{$item->id_katObat}}">
                                                                {{$item->nama_kategori}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label>satuan</label>
                                                        <select v-model="form_obat.satuan" name="" class="form-control"
                                                            id="">
                                                            @foreach ($dataSatuan as $item)
                                                            <option value="{{$item->id_satuanObat}}">
                                                                {{$item->nama_satuan}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>kadaluarsa</label>
                                                        <input type="date" class="form-control"
                                                            v-model="form_obat.kadaluarsa">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>harga obat</label>
                                                        <input type="text" class="form-control"
                                                            v-model="form_obat.harga_obat">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>stock obat</label>
                                                        <input type="number" class="form-control"
                                                            v-model="form_obat.stock">
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>keterangan</label>
                                                        <textarea
                                                            class="form-control">@{{form_obat.deskripsi_obat}}</textarea>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button id="submit_obat" type="button" v-on:click="simpan_obat"
                                                class="btn btn-primary">tambah</button>
                                            <button id="hapus_obat" type="button" v-on:click="hapus_obat"
                                                class="collapse btn btn-danger"><span class="icon-trash"></span>
                                                hapus</button>
                                            <button id="edit_obat" type="button" v-on:click="edit_obat"
                                                class="collapse btn btn-primary"><span class="icon-pencil"></span>
                                                edit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="tableobat" class="table table-hover table-bordered zero-configuration">
                                <thead>
                                    <th>No</th>
                                    <th>nama</th>
                                    <th>satuan</th>
                                    <th>kategori</th>
                                    <th>harga</th>
                                    <th>kelola</th>
                                </thead>
                                <tbody>
                                    <tr v-on:click="editobat(item.id_obat)" :id="'row-'+item.id_obat"
                                        v-for="(item, index) in data_obat" :key="item.id_obat">
                                        <td>@{{index+1}}</td>
                                        <td>@{{item.nama_obat}}</td>
                                        <td>@{{item.satuan}}</td>
                                        <td>@{{item.kategori_obat}}</td>
                                        <td>@{{item.harga_obat}}</td>
                                        <td><button v-on:click.stop="" class="btn btn-sm btn-success">detail</button>
                                        </td>
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
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title pb-2">Daftar kategori</h4>
                            <a id="tambah_kategori" v-on:click="tambah_kategori" href="javascript();"
                                data-placement="top" title="tambah kategori" class="tambah" data-toggle="modal"
                                data-target="#olahkategori"><span style="font-size: 20px; font-weight: bold"
                                    class="icon-plus"></span></a>

                            <div class="modal fade" id="olahkategori" tabindex="-1" role="dialog"
                                aria-labelledby="olahkategoriLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="olahkategoriLabel">tambah kategori</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form v-on:submit.prevent>
                                                <div class="form-group">
                                                    <label>nama kategori obat</label>
                                                    <input id="inputkategori" v-model="form_kategori.kategori"
                                                        type="text" class="form-control" placeholder="">
                                                </div>

                                                <div class="form-group">
                                                    <label>keterangan kategori</label>
                                                    <textarea v-model="form_kategori.keterangan"
                                                        class="form-control"></textarea>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button id="submit_kategori" type="button" v-on:click="simpan_kategori"
                                                class="btn btn-primary">tambah</button>
                                            <button id="hapus_kategori" type="button" v-on:click="hapus_kategori"
                                                class="collapse btn btn-danger"><span class="icon-trash"></span>
                                                hapus</button>
                                            <button id="edit_kategori" type="button" v-on:click="edit_kategori"
                                                class="collapse btn btn-primary"><span class="icon-pencil"></span>
                                                edit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group" v-for="item in data_kategori">
                            <span style="display: flex" class="row list-group-item list-group-item-action">
                                <span class="col-md-8">
                                    @{{item.nama_kategori}}
                                </span>
                                <span class="col-md-4">
                                    <a href="javascript:;" v-on:click="editkategori(item.id_katObat)"> <span
                                            class="icon-pencil"></span></a> |
                                    <a href="javascript:;" v-on:click="hapus_kategori(item.id_katObat)">
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
                            <h4 class="card-title pb-2">Daftar satuan</h4>
                            <a id="tambah_satuan" v-on:click="tambah_satuan" href="javascript();"
                                data-placement="top" title="tambah satuan" class="tambah" data-toggle="modal"
                                data-target="#olahsatuan"><span style="font-size: 20px; font-weight: bold"
                                    class="icon-plus"></span></a>

                            <div class="modal fade" id="olahsatuan" tabindex="-1" role="dialog"
                                aria-labelledby="olahsatuanLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="olahsatuanLabel">tambah satuan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form v-on:submit.prevent>
                                                <div class="form-group">
                                                    <label>nama satuan obat</label>
                                                    <input id="inputsatuan" v-model="form_satuan.satuan"
                                                        type="text" class="form-control" placeholder="">
                                                </div>

                                                <div class="form-group">
                                                    <label>keterangan satuan</label>
                                                    <textarea v-model="form_satuan.keterangan"
                                                        class="form-control"></textarea>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button id="submit_satuan" type="button" v-on:click="simpan_satuan"
                                                class="btn btn-primary">tambah</button>
                                            <button id="hapus_satuan" type="button" v-on:click="hapus_satuan"
                                                class="collapse btn btn-danger"><span class="icon-trash"></span>
                                                hapus</button>
                                            <button id="edit_satuan" type="button" v-on:click="edit_satuan"
                                                class="collapse btn btn-primary"><span class="icon-pencil"></span>
                                                edit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group" v-for="item in data_satuan">
                            <span style="display: flex" class="row list-group-item list-group-item-action">
                                <span class="col-md-8">
                                    @{{item.nama_satuan}}
                                </span>
                                <span class="col-md-4">
                                    <a href="javascript:;" v-on:click="editsatuan(item.id_katObat)"> <span
                                            class="icon-pencil"></span></a> |
                                    <a href="javascript:;" v-on:click="hapus_satuan(item.id_katObat)">
                                        <span class="icon-trash text-danger"></span>
                                    </a>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
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
    $('#tableobat').DataTable();
} );
</script> --}}
<script>
    let vue = new Vue({
        el: "#obat",
        data: {
            isFirstDataLoaded: false,
            form_obat: {
                id_obat: '',
                nama_obat: '',
                kategori: '',
                kadaluarsa: '',
                satuan: '',
                harga_obat: '',
                deskripsi_obat: '',
                stock: '',
                add_at: '',
            },

            form_kategori: {
                id_kategori: '',
                kategori: '',
                keterangan: '',
            },

            form_satuan: {
                id_satuan: '',
                satuan: '',
                keterangan: '',
            },

            dataTable: null,
            data_obat: [],

            data_kategori: '',
            data_satuan: '',
        },
        mounted: function () {
            this.tampil_obat();
            this.tampil_kategori();
            this.tampil_satuan();
        },
        methods: {
            tampil_obat: function () {
                const self = this;
                if (self.dataTable) {
                    self.data_obat = '';
                    self.dataTable.destroy(); //digunakan agar bisa reinit table
                }
                axios.get('/tampil_obat').then(response => {
                        self.isFirstDataLoaded = true;
                        if (response) {
                            self.data_obat = response.data;

                            Vue.nextTick(function () {
                                // save a reference to the DataTable
                                self.dataTable = $('#tableobat').DataTable({
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
            tambah_obat: function () {
                const vm = this;
                $.each(vm.form_obat, function (index, value) {
                    vm.form_obat[index] = '';
                });
                $('#modalObat').html("tambah obat");
                $('#submit_obat').removeClass("collapse");
                $('#edit_obat').addClass("collapse");
                $('#hapus_obat').addClass("collapse");
            },
            simpan_obat: function () {
                const self = this;
                var data = new FormData();
                $.each(this.form_obat, function (index, value) {
                    data.append(index, value);
                });
                axios.post('/simpan_obat', data)
                    .then(resp => {
                        swal("sukses", resp.data.message, "success");
                        $('#exampleModal').modal('hide');
                        $('.modal-backdrop').remove();
                        this.tampil_obat();
                    })
                    .catch(err => {
                        console.log(err.response.data);
                        swal("gagal", err.response.data.message, "error");
                    });
            },
            editobat: function (id) {
                const vm = this;
                vm.form_obat.id_obat = id;
                $('#modalObat').html("kelola obat");
                $('#submit_obat').addClass("collapse");
                $('#edit_obat').removeClass("collapse");
                $('#hapus_obat').removeClass("collapse");
                $('#exampleModal').modal('show');
                axios.post('ambil_obat/' + id).then(
                        Respon => {
                            vm.form_obat.nama_obat = Respon.data.nama_obat;
                            vm.form_obat.kategori = Respon.data.kategori_obat;
                            vm.form_obat.kadaluarsa = Respon.data.kadaluarsa;
                            vm.form_obat.satuan = Respon.data.satuan;
                            vm.form_obat.harga_obat = Respon.data.harga_obat;
                            vm.form_obat.deskripsi_obat = Respon.data.deskripsi_obat;
                            vm.form_obat.stock = Respon.data.stock;
                        })
                    .catch(
                        err => {
                            swal("Gagal tampil detail obat!", "hub administrator", "error");
                        }
                    );

            },
            edit_obat: function () {
                var data = new FormData;

                $.each(this.form_obat, function (index, value) {
                    data.append(index, value);
                });

                axios.post('/edit_obat/' + this.form_obat.id_obat, data).then(Resp => {
                        swal("Sukses!",
                            Resp.data.message, "success");
                        $('#exampleModal').modal('hide');
                        this.tampil_obat();
                    })
                    .catch(
                        err => {
                            swal("Gagal!",
                                err.response.data.message, "error");
                        }
                    );

            },
            hapus_obat: function () {
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
                                axios.post('hapus_obat/' + this.form_obat.id_obat).then(
                                    Respon => {
                                        swal("Sukses!",
                                            Respon.data.message, "success");
                                        $('#exampleModal').modal('hide');
                                        this.tampil_obat();
                                    });
                                $('#exampleModal').modal('hide');
                                break;
                            default:
                                return 0;
                        }
                    });
            },
            // kategori
            tampil_kategori: function () {
                const self = this;
                axios.get('/tampil_kategoriobat').then(response => {
                        if (response) {
                            self.data_kategori = response.data;
                        } else {
                            alert(response);
                        }
                    })
                    .catch(err => {
                        swal("gagal", err.message, "error");
                    });
            },
            tambah_kategori: function () {
                const vm = this;
                $.each(vm.form_kategori, function (index, value) {
                    vm.form_kategori[index] = '';
                });
                $('#modalObat').html("tambah kategori");
                $('#submit_kategori').removeClass("collapse");
                $('#edit_kategori').addClass("collapse");
                $('#hapus_kategori').addClass("collapse");
            },
            simpan_kategori: function () {
                const self = this;
                var data = new FormData();
                $.each(this.form_kategori, function (index, value) {
                    data.append(index, value);
                });

                axios.post('/simpan_kategori', data)
                    .then(resp => {
                        swal("sukses", resp.data.message, "success");
                        $('#olahkategori').modal('hide');
                        $('.modal-backdrop').remove();
                        this.tampil_kategori();
                    })
                    .catch(err => {
                        console.log(err.response.data);
                        swal("gagal", err.response.data.message, "error");
                    });
            },
            editkategori: function (id) {

                const vm = this;
                vm.form_kategori.id_kategori = id;
                $('#modalObat').html("kelola kategori");
                $('#submit_kategori').addClass("collapse");
                $('#edit_kategori').removeClass("collapse");
                $('#hapus_kategori').removeClass("collapse");
                $('#olahkategori').modal('show');
                axios.post('ambil_kategori/' + id).then(
                        Respon => {
                            vm.form_kategori.id_kategori = Respon.data.id_katObat;
                            vm.form_kategori.kategori = Respon.data.nama_kategori;
                            vm.form_kategori.keterangan = Respon.data.keterangan;
                        })
                    .catch(
                        err => {
                            swal("Gagal tampil detail kategori!",
                                "hub administrator", "error");
                        }
                    );

            },
            edit_kategori: function () {
                var data = new FormData;

                $.each(this.form_kategori, function (index, value) {
                    data.append(index, value);
                });
                axios.post('/edit_kategori/' + this.form_kategori.id_kategori, data).then(Resp => {
                        swal("Sukses!",
                            Resp.data.message, "success");
                        $('#olahkategori').modal('hide');
                        this.tampil_kategori();
                    })
                    .catch(
                        err => {
                            swal("Gagal!",
                                err.response.data.message, "error");
                        }
                    );

            },
            hapus_kategori: function (id) {
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
                                axios.post('hapus_kategori/' + id).then(
                                    Respon => {
                                        swal("Sukses!",
                                            Respon.data.message, "success");
                                        $('#olahkategori').modal('hide');
                                        this.tampil_kategori();
                                    });
                                $('#olahkategori').modal('hide');
                                break;
                            default:
                                return 0;
                        }

                    });

            },
            // satuan obat
            tampil_satuan: function () {
                const self = this;
                axios.get('/tampil_satuanobat').then(response => {
                        if (response) {
                            self.data_satuan = response.data;
                        } else {
                            alert(response);
                        }
                    })
                    .catch(err => {
                        swal("gagal", err.message, "error");
                    });
            },
            tambah_satuan: function () {
                const vm = this;
                $.each(vm.form_satuan, function (index, value) {
                    vm.form_satuan[index] = '';
                });
                $('#modalObat').html("tambah satuan");
                $('#submit_satuan').removeClass("collapse");
                $('#edit_satuan').addClass("collapse");
                $('#hapus_satuan').addClass("collapse");
            },
            simpan_satuan: function () {
                const self = this;
                var data = new FormData();
                $.each(this.form_satuan, function (index, value) {
                    data.append(index, value);
                });

                axios.post('/simpan_satuan', data)
                    .then(resp => {
                        swal("sukses", resp.data.message, "success");
                        $('#olahsatuan').modal('hide');
                        $('.modal-backdrop').remove();
                        this.tampil_satuan();
                    })
                    .catch(err => {
                        console.log(err.response.data);
                        swal("gagal", err.response.data.message, "error");
                    });
            },
            editsatuan: function (id) {

                const vm = this;
                vm.form_satuan.id_satuan = id;
                $('#modalObat').html("kelola satuan");
                $('#submit_satuan').addClass("collapse");
                $('#edit_satuan').removeClass("collapse");
                $('#hapus_satuan').removeClass("collapse");
                $('#olahsatuan').modal('show');
                axios.post('ambil_satuan/' + id).then(
                        Respon => {
                            vm.form_satuan.id_satuan = Respon.data.id_katObat;
                            vm.form_satuan.satuan = Respon.data.nama_satuan;
                            vm.form_satuan.keterangan = Respon.data.keterangan;
                        })
                    .catch(
                        err => {
                            swal("Gagal tampil detail satuan!",
                                "hub administrator", "error");
                        }
                    );

            },
            edit_satuan: function () {
                var data = new FormData;

                $.each(this.form_satuan, function (index, value) {
                    data.append(index, value);
                });
                axios.post('/edit_satuan/' + this.form_satuan.id_satuan, data).then(Resp => {
                        swal("Sukses!",
                            Resp.data.message, "success");
                        $('#olahsatuan').modal('hide');
                        this.tampil_satuan();
                    })
                    .catch(
                        err => {
                            swal("Gagal!",
                                err.response.data.message, "error");
                        }
                    );

            },
            hapus_satuan: function (id) {
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
                                axios.post('hapus_satuan/' + id).then(
                                    Respon => {
                                        swal("Sukses!",
                                            Respon.data.message, "success");
                                        $('#olahsatuan').modal('hide');
                                        this.tampil_satuan();
                                    });
                                $('#olahsatuan').modal('hide');
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
