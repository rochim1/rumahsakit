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
    <!-- row -->
    <div class="container-fluid">

        <div class="row">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4>daftar obat</h4>
                        <div class="table-responsive">
                            <table id="tableobat" class="table table-hover table-bordered zero-configuration">
                                <thead>
                                    <th>No</th>
                                    <th>nama</th>
                                    <th>satuan</th>
                                    <th>kategori</th>
                                    <th>harga</th>
                                    <th>keloa</th>
                                </thead>
                                <tbody>
                                    <tr :id="'row-'+item.id_obat" v-for="(item, index) in data_obat" :key="item.id_obat">
                                        <td>@{{index}}</td>
                                        <td>@{{item.nama_obat}}</td>
                                        <td>@{{item.satuan}}</td>
                                        <td>@{{item.kategori_obat}}</td>
                                        <td>@{{item.harga_obat}}</td>
                                        <td><button class="btn btn-sm btn-warning">edit</button></td>
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
                        <h4>tambah obat</h4>

                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4>tambah kategori</h4>

                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4>tambah satuan</h4>

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
    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
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
                    deskripsi_obat: '',
                    stock: '',
                    suplier: '',
                    add_at: '',
                },


                dataTable: null,
                data_obat: [],
            },
            mounted: function () {
                this.tampil_obat();
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
                    axios.get('/prever_namaobat').then(resp => {
                            console.log(resp.data);
                            this.form_obat.obat = resp.data;
                        })
                        .catch(err => {

                        })
                    this.form_obat.id_obat = '';
                    this.form_obat.obat = '';
                    this.form_obat.kelas = '';
                    this.form_obat.bangsal = '';
                    $('#exampleModalLabel').html("tambah obat");
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
                    namaobat = $('#inputobat').val();
                    data.append('nama_obat', namaobat);

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
                    $('#exampleModalLabel').html("kelola obat");
                    $('#submit_obat').addClass("collapse");
                    $('#edit_obat').removeClass("collapse");
                    $('#hapus_obat').removeClass("collapse");
                    $('#exampleModal').modal('show');
                    axios.post('ambil_obat/' + id).then(
                            Respon => {

                                vm.form_obat.id_obat = Respon.data.id_obat;
                                vm.form_obat.obat = Respon.data.nama_obat;
                                vm.form_obat.kelas = Respon.data.kelas; //berisi id kelas
                                vm.form_obat.bangsal = Respon.data.bangsal; //berisi id bangsal
                            })
                        .catch(
                            err => {
                                swal("Gagal tampil detail obat!",
                                    "hub administrator", "error");
                            }
                        );

                },
                edit_obat: function () {
                    var data = new FormData;

                    $.each(this.form_obat, function (index, value) {
                        data.append(index, value);
                    });
                    namaobat = $('#inputobat').val();
                    data.append('nama_obat', namaobat);

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
                    const self = this;
                    axios.post('hapus_obat/' + this.form_obat.id_obat).then(
                        Respon => {
                            swal("Sukses!",
                                Respon.data.message, "success");
                            $('#exampleModal').modal('hide');
                            this.tampil_obat();
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
