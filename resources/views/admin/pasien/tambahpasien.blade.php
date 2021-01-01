@extends('admin.index')
@section('title','tambah pasien')
@section('style')

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css"
    rel="stylesheet" />
<link
    href="{{asset('Componentadmin/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}"
    rel="stylesheet">
{{-- <link href="./plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet"> --}}
@endsection
@section('uper_script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endsection
@section('content')
<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">tambah pasien</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row" id="vuetemp">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title pb-2">Pendaftaran Pasien Baru</h4>
                        <form v-on:submit.prevent id="form_register">

                            <div class="form-row">
                                <label class="form-group col-sm-2  col-form-label">No. Rekam Medik</label>
                                <div class=" form-group col-sm-8">
                                    <input v-on:click.prevent id="rekammedis" v-model=" data_form.rekamMedis"
                                        type="text" class="form-control" readonly value="">
                                </div>
                                <div class=" form-group col-sm-2">
                                    <button type="button" v-on:click="generate"
                                        class="btn btn-primary gradient-1">refresh</button>
                                </div>
                            </div>

                            <h5 class="card-title pt-3 pb-2">Biodata Pasien</h5>

                            <div class="form-row ">
                                <label class="col-sm-2 form-group col-form-label">nama</label>
                                <div class="col-sm-6 form-group">
                                    <input v-model="data_form.nama_baru" type="text" name="nama" class="form-control"
                                        id="nama" placeholder="Nama">
                                </div>

                                <div class="form-group col-sm-4">
                                    <select v-model="data_form.jenis_kelamin" class="form-control" name="jenis_kelamin"
                                        id="jk">
                                        <option value="">--- Jenis Kelamin ---</option>
                                        <option value="L">laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <label class="col-sm-2 form-group col-form-label">NIK</label>
                                <div class="form-group col-sm-4">
                                    <input v-model="data_form.NIK" type="text" name="nik" class="form-control" id="nama"
                                        placeholder="NIK">
                                </div>
                                <div class="form-group col-sm-2">
                                    <select v-model="data_form.warganegara" class="form-control" name="warga_negara"
                                        id="warga_negara">
                                        <option value="">--- warga negara ---</option>
                                        <option value="WNI">--- WNI ---</option>
                                        <option value="WNA">--- WNA ---</option>
                                    </select>
                                </div>

                                <div class="form-group col-sm-4">
                                    <select v-model="data_form.agama" class="form-control" name="jenis_kelamin" id="jk">
                                        <option value="">--- Agama ---</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Konghucu">Konghucu</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <label class="col-sm-2 form-group col-form-label">tanggal lahir</label>
                                <div class="col-md-4 form-group">
                                    <input v-on:change="umur" v-model="data_form.tgl_lahir" type="date"
                                        class="form-control" placeholder="2017-06-04" id="mdate" name="tanggal_lahir">
                                </div>
                                <div class="col-md-3 form-group">
                                    <input readonly v-model="data_form.umur" type="text" class="form-control"
                                        name="umur" placeholder="umur">
                                </div>
                                <div class="col-md-3 form-group">
                                    <input readonly v-model="data_form.bulan" type="text" class="form-control"
                                        placeholder="lebih bulan">
                                </div>
                            </div>

                            <div class="form-row">
                                <label class="col-sm-2 form-group col-form-label">nama ibu kandung</label>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" v-model="data_form.namaibu">
                                </div>

                                <div class="form-group col-md-4">
                                    <select v-model="data_form.pekerjaan" class="form-control" name="pekerjaan" id="jk">
                                        <option value="">--- pekerjaan pasien---</option>
                                        @foreach ($pekerjaanPasien as $item)
                                        <option value="{{$item->id}}">{{$item->pekerjaan_pasien}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <label class="col-sm-2 form-group col-form-label">No Telp</label>
                                <div class="form-group col-md-5">
                                    <input v-model="data_form.telp" type="number" class="form-control" name="telp">
                                </div>
                                <div class="form-group col-md-5">
                                    <input v-model="data_form.email" type="email" placeholder="email"
                                        class="form-control">
                                </div>
                            </div>

                            <div class="form-row">
                                <label class="col-sm-2 form-group col-form-label">Alamat</label>

                                <div class="form-group col-md-5">
                                    <select class="form-control" v-model="data_form.kelurahan" id="kelurahan">
                                        <option value="">--Kelurahan--</option>
                                        <option v-for="item in kelurahan" :value="item.id">@{{item.nama}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-5">
                                    <select v-model="data_form.kecamatan" class="form-control" id="kecamatan">
                                        <option value="">--Kecamatan--</option>
                                        <option v-on:click="apiKelurahan(item.id,1)" v-for="item in kecamatan"
                                            :value="item.id">@{{item.nama}}</option>
                                    </select>
                                </div>
                                <div class="form-group offset-md-2  col-md-5">
                                    <select v-model="data_form.kabupaten" class="form-control" id="kabupaten">
                                        <option value="">--Kabupaten--</option>
                                        <option v-on:click="apiKecamatan(item.id,1)" v-for="item in kabupaten"
                                            :value="item.id">@{{item.nama}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-5">
                                    <select v-on:click="apiKota(1)" v-model="data_form.kota" class="form-control"
                                        id="kota">
                                        <option value="">--Kota--</option>
                                        <option v-on:click="apiKabupaten(item.id, 1)" v-for="item in kota"
                                            :value="item.id">@{{item.nama}}</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="offset-md-2 col-md-10 form-group">
                                    <textarea style="height: 120px" v-model="data_form.alamat" name="alamat"
                                        class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-row mt-2">
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="button" v-on:click="simpanpasien"
                                        class="btn form-group btn-primary gradient-1">Daftar</button>
                                    <button type="reset" v-on:click="clear"
                                        class="btn form-group btn-whatsapp">Clear</button>
                                    {{-- <button type="button" v-on:click="printFormMedis"
                                        class="btn form-group btn-danger gradient-2">Cancel</button> --}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Informasi tambahan</h4>
                        <form v-on:submit.prevent id="form_tambah">
                            <div class="form-group">
                                <img v-bind:src="fotoData" v-on:click="browsefile" alt=""
                                    class="img-thumbnail mx-auto d-block img img-circle mt-3" width="200px"
                                    style="height: 200px">
                                <input style="display: none" type="file" id="pilihprofil" v-on:change="onImageChange">
                            </div>

                            <div class="form-group ">
                                <label for="">asuransi</label>
                                <select v-on:change="asuransiCtrl" v-model="data_form.asuransi" class="form-control"
                                    name="asuransi" id="jk">
                                    <option value="">--- pilih asuransi ---</option>
                                    @foreach ($asuransi as $item){
                                    <option value="{{$item->id}}">{{$item->nama_asuransi}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div id="formIdAsuransi" class="form-group collapse">
                                <label>nomor id asuransi</label>
                                <input name="idasuransi" type="number" class="form-control"
                                    v-model="data_form.idasuransi">
                            </div>
                            <div class="form-group">
                                <label>bahasa</label>
                                <select name="bahasa" type="text" class="form-control" v-model="data_form.bahasa">
                                    <option value="">pilih bahasa</option>
                                    @foreach ($bahasa as $item)
                                    <option value="{{$item->id}}">{{$item->nama_bahasa}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>cacat fisik</label>
                                <select name="cacatfisik" class="form-control" v-model="data_form.cacatfisik">
                                    <option value="">cacat fisik</option>
                                    @foreach ($cacat as $item)
                                    <option value="{{$item->id_cacatfisik}}">{{$item->nama_cacat}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>ciri fisik</label>
                                <textarea v-model="data_form.cirifisik" placeholder="ciri2 fisik"
                                    class="form-control"></textarea>
                            </div>

                            <div class="row form-row">
                                <div class="form-group col-md-8">
                                    <select v-model="infotambahan.hubungan_kel" class="form-control" id="hubkeluarga">
                                        <option value="">--tambah info keluarga--</option>
                                        <option value="1">ayah</option>
                                        <option value="2">ibu</option>
                                        <option value="3">anak</option>
                                        <option value="4">keluarga</option>
                                    </select>
                                    <small id="errHubkel" class="invalid-tooltip collapse">masukkan hubungan keluarga
                                        terebih dahulu</small>
                                </div>
                                <div class="form-group col-md-4">
                                    <!-- Button trigger modal -->
                                    <button v-on:click="tambahkel" type="button" class=" m-0 btn btn-primary gradient-1"
                                        data-toggle="modal">
                                        tambah
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modalTambahinfokel" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Informasi
                                                        Keluarga Pasien</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form v-on:submit.prevent>
                                                        <h4 class="mt-2">Biodata keluarga pasien</h4>
                                                        <div class="form-row">
                                                            <div class="col-sm-8 form-group">
                                                                <label>Nama Keluarga</label>
                                                                <input type="email" class="form-control" id="nama_kel"
                                                                    v-model="infotambahan.nama_kel">
                                                            </div>

                                                            <div class="col-sm-4 form-group">
                                                                <label>Jenis Kelamin</label>
                                                                <select v-model="infotambahan.jenis_kel"
                                                                    class="form-control" name="jenis_kelamin" id="jk">
                                                                    <option value="">--- Jenis Kelamin ---</option>
                                                                    <option value="L">laki-laki</option>
                                                                    <option value="P">Perempuan</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-row">
                                                            <div class="col-sm-4 form-group">
                                                                <label>Pekerjaan</label>
                                                                <select v-model="infotambahan.pekerjaan_kel"
                                                                    class="form-control" name="pekerjaan" id="jk">
                                                                    <option value="">--- pekerjaan ---</option>
                                                                    @foreach ($pekerjaanPasien as $item)
                                                                    <option value="{{$item->id}}">
                                                                        {{$item->pekerjaan_pasien}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="col-sm-8 form-group">
                                                                <label>Telpon</label>
                                                                <input v-model="infotambahan.telp_kel" type="number"
                                                                    class="form-control" name="telp">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>email</label>
                                                            <input v-model="infotambahan.email" type="email"
                                                                class="form-control" name="email">
                                                        </div>

                                                        <h4 class="mt-2">Alamat</h4>
                                                        <div class="border p-3 form-row">
                                                            <div class="col-sm-6 form-group">
                                                                <label>kelurahan</label>
                                                                <select class="form-control"
                                                                    v-model="infotambahan.kelurahan_kel">
                                                                    <option value="">--Kelurahan--</option>
                                                                    <option v-for="item in kelurahan_kel"
                                                                        :value="item.id">@{{item.nama}}</option>
                                                                </select>
                                                            </div>

                                                            <div class="col-sm-6 form-group">
                                                                <label>kecamatan</label>
                                                                <select v-model="infotambahan.kecamatan_kel"
                                                                    class="form-control" id="kecamatan">
                                                                    <option value="">--Kecamatan--</option>
                                                                    <option v-on:click="apiKelurahan(item.id,2)"
                                                                        v-for="item in kecamatan_kel" :value="item.id">
                                                                        @{{item.nama}}</option>
                                                                </select>
                                                            </div>

                                                            <div class="col-sm-6 form-group">
                                                                <label>kabupaten</label>
                                                                <select class="form-control"
                                                                    v-model="infotambahan.kabupaten_kel">
                                                                    <option value="">-- Kabupaten --</option>
                                                                    <option v-on:click="apiKecamatan(item.id,2)"
                                                                        v-for="item in kabupaten_kel" :value="item.id">
                                                                        @{{item.nama}}</option>
                                                                </select>
                                                            </div>

                                                            <div class="col-sm-6 form-group">
                                                                <label>kota / provinsi</label>
                                                                <select v-on:click="apiKota(2)"
                                                                    v-model="infotambahan.kota_kel"
                                                                    class="form-control">
                                                                    <option value="">--Kota--</option>
                                                                    <option v-on:click="apiKabupaten(item.id,2)"
                                                                        v-for="item in kota_kel" :value="item.id">
                                                                        @{{item.nama}}</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" v-on:click="cancel" class="btn gradient-2"
                                                        data-dismiss="modal">Cancel</button>
                                                    <button type="button" class="btn btn-primary gradient-1"
                                                        data-dismiss="modal">Save
                                                        changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                Launch static backdrop modal
            </button>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">lanjutkan ke-Pemeriksaan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">poli</label>
                                        <select v-model="periksa.poli" class="form-control" name="pemeriksaan"
                                            id="spesialisPeriksa">
                                            <option value="">--- pilih poli ---</option>
                                            @foreach ($dataSpesialis as $item)
                                            <option value="{{$item->id_spesialis}}">{{$item->spesialis}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">laboratori</label>
                                        <select class="form-control" name="pemeriksaan_lab" id="lab_periksa">
                                            <option value="">--- pilih lab ---</option>
                                            @foreach ($dataSpesialis as $item)
                                            <option value="{{$item->id_spesialis}}">{{$item->spesialis}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label class="col-form-label">pilih hari</label>
                                                <select class="form-control" v-model="periksa.hari" name="pemeriksaan_lab"
                                                    id="lab_periksa">
                                                    <option value="">--- pilih hari ---</option>
                                                    <option value="Senin">senin</option>
                                                    <option value="Selasa">selasa</option>
                                                    <option value="Rabu">rabu</option>
                                                    <option value="Kamis">kamis</option>
                                                    <option value="Jumat">jumat</option>
                                                    <option value="Sabtu">sabtu</option>
                                                    <option value="Minggu">minggu</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">pilih jam</label>
                                                <input type="time" v-model="periksa.jam" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="col-form-label">buat sekarang</label>
                                            {{-- <div class="form-control none-border"> --}}
                                            <button type="button" v-on:click="sekarang"
                                                class="btn gradient-1">sekarang</button>
                                            {{-- </div> --}}
                                        </div>

                                        <div class="alert alert-warning alert-dismissible fade show">
                                            Todo : seharusnya lebih baik menggunakan javascript untuk fungsi tombol
                                            "buat sekarang" karena untuk jam tidak realtime resiko pada saat mendekati
                                            perubahan jadwal dokter
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-form-label">pilih dokter</label>
                                        <select v-model="dokter" v-on:click="tampildokter" class="form-control" name="pemeriksaan_lab" id="lab_periksa">
                                            <option value="">--- pilih dokter ---</option>
                                            <option v-for="item in dataDokter" :value="item.id_dokter">@{{item.nama_dokter}}</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-form-label">keluhan</label>
                                        <textarea class="form-control" name="" id="" cols="30" rows="10"></textarea>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary gradient-2"
                                data-dismiss="modal">Close</button>
                            <a href="" class="btn btn-primary gradient-4">Advance</a>
                            <button type="button" class="btn btn-primary gradient-1">Understood</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            new Vue({
                el: '#vuetemp',
                data: {
                    periksa: {
                        poli: '',
                        hari: '',
                        jam: '',
                    },
                    dokter:'',
                    dataDokter: [],
                    fotoData: "{{asset('/images/index.png')}}",
                    kota: [],
                    kabupaten: [],
                    kecamatan: [],
                    kelurahan: [],
                    kota_kel: [],
                    kabupaten_kel: [],
                    kecamatan_kel: [],
                    kelurahan_kel: [],
                    data_form: {
                        rekamMedis: '{{$id_pasien}}',
                        nama_baru: '',
                        jenis_kelamin: '',
                        NIK: '',
                        warganegara: '',
                        agama: '',
                        tgl_lahir: '',
                        umur: '',
                        bulan: '',
                        namaibu: '',
                        pekerjaan: '',
                        telp: '',
                        email: '',

                        kelurahan: '',
                        kecamatan: '',
                        kabupaten: '',
                        kota: '',
                        alamat: '',

                        foto: '',

                        asuransi: '',
                        idasuransi: '',

                        bahasa: '',
                        cacatfisik: '',
                        cirifisik: '',
                    },
                    infotambahan: {
                        hubungan_kel: '',
                        nama_kel: '',
                        jenis_kel: '',
                        pekerjaan_kel: '',
                        telp_kel: '',
                        email_kel: '',

                        kelurahan_kel: '',
                        kecamatan_kel: '',
                        kabupaten_kel: '',
                        kota_kel: '',
                        alamat_kel: '',
                    }
                },
                methods: {
                    browsefile: function () {
                        $('#pilihprofil').click();
                    },
                    onImageChange(e) {
                        let files = e.target.files || e.dataTransfer.files;
                        if (!files.length) //jika tidak terisi
                            return;
                        this.createImage(files[0]);
                        // karena data berupa array maka file[0]
                    },
                    createImage(file) {

                        let reader = new FileReader();
                        let vm = this;
                        reader.onload = (e) => {
                            vm.fotoData = e.target.result;
                            vm.data_form.foto = file;
                        };
                        reader.readAsDataURL(file);
                    },
                    apiKota: function (urutan) {
                        const vm = this;
                        axios.get("/daftarkota").then(hasil => {
                            if (urutan == 1) {
                                vm.kota = JSON.parse(hasil.data).provinsi;
                            } else {
                                vm.kota_kel = JSON.parse(hasil.data).provinsi;
                            }
                        }).catch(error => {
                            vm.kota = [];
                            vm.kota_kel = [];
                        });
                    },
                    apiKabupaten: function (idkota, urutan) {
                        axios.get("/daftarkabupaten/" + idkota).then(hasil => {
                            if (urutan == 1) {
                                this.kabupaten = JSON.parse(hasil.data).kota_kabupaten;
                            } else {
                                this.kabupaten_kel = JSON.parse(hasil.data).kota_kabupaten;
                            }
                        }).catch(error => {
                            this.kabupaten = [];
                            this.kabupaten_kel = [];
                        });
                    },
                    apiKecamatan: function (idkabupaten, urutan) {
                        axios.get("/daftarkecamatan/" + idkabupaten).then(
                            hasil => {
                                if (urutan == 1) {
                                    this.kecamatan = JSON.parse(hasil.data).kecamatan;
                                } else {
                                    this.kecamatan_kel = JSON.parse(hasil.data).kecamatan;
                                }
                            }).catch(error => {
                            this.kecamatan = [];
                            this.kecamatan_kel = [];
                        });
                    },
                    apiKelurahan: function (idkelurahan, urutan) {
                        axios.get("/daftarkelurahan/" + idkelurahan).then(
                            hasil => {
                                if (urutan == 1) {
                                    this.kelurahan = JSON.parse(hasil.data).kelurahan;
                                } else {
                                    this.kelurahan_kel = JSON.parse(hasil.data).kelurahan;
                                }
                            }).catch(error => {
                            this.kelurahan = [];
                            this.kelurahan_kel = [];
                        });
                    },
                    generate: function () {
                        axios.get("{{route('rekammedis')}}").then(
                            Respons => {
                                this.data_form.rekamMedis = Respons.data;
                            }
                        )
                        // kedepan nomor RM akan dirapikan dan berurutan
                    },
                    clear: function () {
                        const vm = this;
                        $.each(this.data_form, function (index, value) {
                            vm.data_form[index] = '';
                        });
                        $.each(this.infotambahan, function (index, value) {
                            vm.infotambahan[index] = '';
                        });
                        vm.fotoData = "{{asset('/images/index.png')}}";
                    },
                    simpanpasien: function () {
                        if (this.data_form.rekamMedis) {
                            const self = this;
                            var data = new FormData();
                            $.each(this.data_form, function (index, value) {
                                data.append(index, value);
                            });

                            if (this.infotambahan.hubungan_kel) {
                                $.each(this.infotambahan, function (index, value) {
                                    data.append(index, value);
                                });
                            }

                            axios.post("{{route('daftarPasien')}}", data)
                                .then(Respon => {
                                    console.log(Respon.data.message.nama);
                                    Swal.fire("Berhasil Input Pasien!",
                                        Respon.data.message.nama +
                                        " dengan No.RM : " +
                                        Respon.data.message.rekam, "success");
                                    this.clear();
                                    this.generate();
                                })
                                .catch(err => {
                                    Swal.fire("Gagal Input Pasien!",
                                        "periksa form atau segera hubungi administrator",
                                        "error");
                                });
                        } else {
                            Swal.fire("Gagal Input Pasien!", "generate no rekam medis", "error");
                        }
                    },
                    umur: function () {
                        this.data_form.tgl_lahir = $("#mdate").val();
                        if (this.data_form.tgl_lahir) {
                            bulan = this.data_form.tgl_lahir.substr(5, 2).toString();
                            tanggal = this.data_form.tgl_lahir.substr(8, 2).toString();
                            tahun = this.data_form.tgl_lahir.substr(0, 4).toString();
                            this.getAge(bulan + "/" + tanggal + "/" + tahun);
                        } else {
                            Swal.fire("isikan tanggal lahir", "", "warning");
                        }
                    },
                    getAge: function (dateString) {
                        {
                            var now = new Date();
                            var today = new Date(now.getYear(), now.getMonth(), now
                                .getDate());

                            var yearNow = now.getYear();
                            var monthNow = now.getMonth();
                            var dateNow = now.getDate();

                            var dob = new Date(dateString.substring(6, 10),
                                dateString.substring(0, 2) - 1,
                                dateString.substring(3, 5)
                            );

                            var yearDob = dob.getYear();
                            var monthDob = dob.getMonth();
                            var dateDob = dob.getDate();
                            var age = {};
                            var ageString = "";
                            var yearString = "";
                            var monthString = "";
                            var dayString = "";


                            yearAge = yearNow - yearDob;

                            if (monthNow >= monthDob)
                                var monthAge = monthNow - monthDob;
                            else {
                                yearAge--;
                                var monthAge = 12 + monthNow - monthDob;
                            }

                            if (dateNow >= dateDob)
                                var dateAge = dateNow - dateDob;
                            else {
                                monthAge--;
                                var dateAge = 31 + dateNow - dateDob;

                                if (monthAge < 0) {
                                    monthAge = 11;
                                    yearAge--;
                                }
                            }

                            age = {
                                years: yearAge,
                                months: monthAge,
                                days: dateAge
                            };

                            if (age.years > 1) yearString = " tahun";
                            else yearString = " tahun";
                            if (age.months > 1) monthString = " bulan";
                            else monthString = " bulan";
                            if (age.days > 1) dayString = " hari";
                            else dayString = " hari";


                            if ((age.years > 0) && (age.months > 0) && (age.days > 0)) {
                                this.data_form.umur = age.years + yearString;
                                this.data_form.bulan = age.months + monthString;
                                days = age.days + dayString;
                            } else if ((age.years == 0) && (age.months == 0) && (age.days >
                                    0)) {
                                this.data_form.umur = 0;
                                this.data_form.bulan = 0;
                                days = age.days + dayString;
                            } else if ((age.years > 0) && (age.months == 0) && (age.days ==
                                    0)) {
                                this.data_form.umur = age.years + yearString;
                                this.data_form.bulan = 0;
                                days = "HBD";
                            } else if ((age.years > 0) && (age.months > 0) && (age.days ==
                                    0)) {
                                this.data_form.umur = age.years + yearString;
                                this.data_form.bulan = age.months + monthString;
                                days = 0;
                            } else if ((age.years == 0) && (age.months > 0) && (age.days >
                                    0)) {
                                this.data_form.umur = 0;
                                this.data_form.bulan = age.months + monthString;
                                days = age.days + dayString;
                            } else if ((age.years > 0) && (age.months == 0) && (age.days >
                                    0)) {
                                this.data_form.umur = age.years + yearString;
                                this.data_form.bulan = 0;
                                days = age.days;
                            } else if ((age.years == 0) && (age.months > 0) && (age.days ==
                                    0)) {
                                this.data_form.umur = 0;
                                this.data_form.bulan = age.months + monthString;
                                days = 0;
                            } else ageString = "Oops! Could not calculate age!";
                        }
                    },
                    printFormMedis: function () {
                        var prtContent = document.getElementById("form_register");
                        var WinPrint = window.open();
                        WinPrint.document.write(prtContent.innerHTML);
                        WinPrint.document.close();
                        WinPrint.focus();
                        WinPrint.print();
                        WinPrint.close();
                    },
                    tambahkel: function () {
                        if (this.infotambahan.hubungan_kel) {
                            $('#hubkeluarga').removeClass('is-invalid');
                            $('#modalTambahinfokel').modal('show');
                            $('#errHubkel').addClass('collapse');
                        } else
                            $('#hubkeluarga').addClass('is-invalid');
                        $('#errHubkel').removeClass('collapse');
                        $('#hubkeluarga').click();
                    },
                    cancel: function () {
                        const vm = this;
                        $.each(this.infotambahan, function (index, value) {
                            vm.infotambahan[index] = '';
                        });
                    },
                    asuransiCtrl: function () {
                        if (this.data_form.asuransi) {
                            $('#formIdAsuransi').removeClass('collapse');
                        } else {
                            $('#formIdAsuransi').addClass('collapse');
                        }
                    },
                    tampildokter: function () {
                        if (this.periksa.jam && this.periksa.hari) {
                            var data = new FormData();

                            $.each(this.periksa, function (index, value) {
                                data.append(index, value);
                            });

                            axios.post('/listdoktersekarang', data).then(respon => {
                                this.dataDokter = respon.data;
                            }).catch(error => {

                            });
                        }
                    },
                    sekarang: function () {
                        //alert("masih menggunakan php agar lebih cepat menggunakan jscript seharusnya");
                        axios.get('/jadwalsekarang').then(respon => {
                            this.periksa.jam = respon.data.jam;
                            this.periksa.hari = respon.data.hari;
                        }).catch(error => {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal
                                        .resumeTimer)
                                }
                            })

                            Toast.fire({
                                icon: 'error',
                                title: 'jadwal dokter kosong'
                            })
                        })
                    }
                },

            })

        </script>
        <!-- #/ container -->
    </div>
</div>
@endsection
@section('script')
<script src="{{asset('Componentadmin/plugins/moment/moment.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
{{-- <script src="{{asset('Componentadmin/js/plugins-init/form-pickers-init.js')}}"></script> --}}
@endsection
