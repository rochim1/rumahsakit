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

    <div class="container-fluid">
        <div class="row" id="vueField">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 id="judul" class="card-title pb-2">Buat Jadwal Dokter</h4>
                        <form>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Filter Poli</label>
                                <div class="col-sm-10">
                                    <select v-model="form.poli" v-on:click="ready" v-on:blur="poli" class="form-control" name="poli" id="poli">
                                        <option value="">--Select Filter Poli--</option>
                                        @foreach ($dataSpesialis as $item)
                                        <option value="{{$item->spesialis}}">{{$item->spesialis}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Cari Dokter</label>
                                <div class="col-sm-4">
                                    <select v-model="form.berdasarkan" v-on:blur="berdasarkan" class="form-control" name="berdasarkan"
                                        id="berdasarkan">
                                        <option value="">Cari berdasarkan</option>
                                        <option value="Nama">Nama</option>
                                        <option value="Id_dokter">id_dokter</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <input v-on:focus="search" v-on:keyup="searchOn" v-model="form.search" type="text" class="form-control" id="search"
                                        placeholder="Search">
                                    <ul id="listdata" class="list-group collapse" v-for="item in dataDokter">
                                    <li class="list-group-item" v-on:click="selected(item.id_dokter, item.nama_dokter)" >@{{item.nama_dokter}}</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label class="col-sm-2 col-form-label">Hari</label>
                                <div class="col-sm-10">
                                    <div class="form-check form-check-inline">
                                        <input v-model="form.senin" class="form-check-input" type="checkbox" id="senin" value="senin">
                                        <label class="form-check-label" for="senin">Senin</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input v-model="form.selasa" class="form-check-input" type="checkbox" id="selasa" value="selasa">
                                        <label class="form-check-label" for="selasa">Selasa</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input v-model="form.rabu" class="form-check-input" type="checkbox" id="rabu" value="rabu">
                                        <label class="form-check-label" for="rabu">Rabu</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input v-model="form.kamis" class="form-check-input" type="checkbox" id="kamis" value="kamis">
                                        <label class="form-check-label" for="kamis">Kamis</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input v-model="form.jumat" class="form-check-input" type="checkbox" id="jumat" value="jumat">
                                        <label class="form-check-label" for="jumat">Jumat</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input v-model="form.sabtu" class="form-check-input" type="checkbox" id="sabtu" value="sabtu">
                                        <label class="form-check-label" for="sabtu">Sabtu</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input v-model="form.minggu" class="form-check-input is-invalid" type="checkbox" id="minggu"
                                            value="minggu">
                                        <label class="form-check-label" for="minggu">Minggu (UGD)</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2">Jam</label>
                                <div class="col-sm-10">
                                    <select class="form-control" v-model="form.jam" name="jam" id="jam">
                                        <option value="">pilih jam</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Buat Jadwal</button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 id="judul" class="card-title pb-2">Data Jadwal Dokter</h4>
                        <div class="table-responsive">
                            <table id="table_jadwal" class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <td>NO</td>
                                        <td>Id Dokter</td>
                                        <td>Nama Dokter</td>
                                        <td>Spesialis</td>
                                        <td>Hari</td>
                                        <td>Jam</td>
                                        <td>Aksi</td>
                                    </tr>
                                </thead>
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
                        <li class="list-group-item">{{$item->jam_mulai}} sampai dengan {{$item->jam_selesai}}</li>
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
                        @{{dataDokter}}
                    </div>
                </div>
            </div>

        </div>
        <script>
            var vue = new Vue({
                el: "#vueField",
                data: {
                    form:{
                        poli: '',
                        berdasarkan: '',
                        search: '',
                        senin: '',
                        selasa: '',
                        rabu: '',
                        kamis: '',
                        jumat: '',
                        sabtu: '',
                        minggu: '',
                        jam: '',
                    },
                    dataDokter: [],
                    panjang: '' ,
                },
                methods:{
                    search: function () {
                        const vm = this;
                        if ((!this.form.poli || !this.form.berdasarkan) || (!this.form.poli && !this.form.berdasarkan)) {
                            if (!vm.form.poli) {
                                $('#poli').focus();
                                $('#poli').addClass("is-invalid");
                            return;
                            }
                            if(!vm.form.berdasarkan){
                                $('#berdasarkan').focus();
                                $('#berdasarkan').addClass("is-invalid");
                            return;
                            }
                        }else{
                            $('#poli').removeClass("is-invalid");
                            $('#berdasarkan').removeClass("is-invalid");
                        }
                    },
                    searchOn: function () {
                        const vm = this;
                        pencarian = this.form.search;
                        if (pencarian) {
                        $('#listdata').removeClass('collapse');
                        }else{
                        $('#listdata').addClass('collapse');
                        }
                        var form_data = new FormData();
                        form_data.append("pencarian", pencarian);
                        form_data.append("poli", this.form.poli);
                        form_data.append("berdasarkan", this.form.berdasarkan);
                        axios.post('/caridokter', form_data).then(Resp=>{
                            // alert(Resp.data.message);
                            vm.dataDokter = Resp.data.message;
                            // console.log();
                        });
                    },
                    poli: function () {
                        if (this.form.poli) {
                            $('#poli').removeClass("is-invalid");
                        }else{
                            $('#poli').addClass("is-invalid");
                        }
                    },
                    berdasarkan: function () {
                        if (this.form.berdasarkan) {
                            $('#berdasarkan').removeClass("is-invalid");
                        }else{
                            $('#berdasarkan').addClass("is-invalid");
                        }
                    },
                    selected: function (id_dokter, nama_dokter) {
                        this.form.search = nama_dokter;
                        $('#listdata').addClass('collapse');
                    },
                    ready: function () {
                        this.form.search = '';
                        this.dataDokter = '';
                    }
                }
            })
        </script>
    </div>
    <!-- #/ container -->
</div>
@endsection
@section('script')
<script src="{{asset('Componentadmin/plugins/moment/moment.js')}}"></script>
<script
    src="{{asset('Componentadmin/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}">
</script>
<script src="{{asset('Componentadmin/js/plugins-init/form-pickers-init.js')}}"></script>
@endsection
