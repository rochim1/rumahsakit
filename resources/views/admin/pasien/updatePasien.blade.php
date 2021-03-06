@extends('admin.index')
@section('title','edit pasien')
@section('style')

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css"
    rel="stylesheet" />
<link
    href="{{asset('Componentadmin/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}"
    rel="stylesheet">
<link href="./plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
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
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit pasien</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid" id="editPasien">
        <div class="row">
            <div class="col-md-12 alert alert-info alert-dismissible fade show" role="alert">
                <h4>info</h4>
                untuk atribut pendukung yang memiliki foreign dengan table lain lebih ringkas jika tidak mengacu pada
                id(primary key) pada table foreign tapi langsung saja merujuk pada value nya dengan syarat on update
                cascade dan on delete cascade dan merupakan unique key juga
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-biodata-tab" data-toggle="pill" href="#pills-biodata"
                                role="tab" aria-controls="pills-biodata" aria-selected="true">Biodata</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-tambahan-tab" data-toggle="pill" href="#pills-tambahan"
                                role="tab" aria-controls="pills-tambahan" v-on:click="infotambahan"
                                aria-selected="false">Info tambahan</a>
                        </li>

                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-biodata" role="tabpanel"
                            aria-labelledby="pills-biodata-tab">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h4 class="card-title pb-2">Edit Pasien</h4>
                                    <a href="javascript();" class="tambah" data-toggle="modal">
                                        <span class="iconify" data-icon="fluent:print-20-regular"
                                            data-inline="false"></span>print</a>
                                </div>

                                <form v-on:submit.prevent id="form_update">
                                    <div class="form-row">
                                        <label class="form-group col-sm-2  col-form-label">No. Rekam Medik</label>
                                        <div class=" form-group col-sm-8">
                                            <input v-on:click.prevent id="rekammedis" v-model=" data_form.rekamMedis"
                                                type="text" class="form-control" readonly value="">
                                        </div>
                                    </div>

                                    <h5 class="card-title pt-3 pb-2">Biodata Pasien</h5>
                                    <div class="border-bottom-1 mb-2">
                                        <div class="form-row ">
                                            <label class="col-sm-2 form-group col-form-label">nama</label>
                                            <div class="col-sm-6 form-group">
                                                <input v-model="data_form.nama_baru" type="text" name="nama"
                                                    class="form-control" id="nama" placeholder="Nama">
                                            </div>

                                            <div class="form-group col-sm-4">
                                                <select v-model="data_form.jenis_kelamin" class="form-control"
                                                    name="jenis_kelamin" id="jk">
                                                    <option value="">--- Jenis Kelamin ---</option>
                                                    <option value="L">laki-laki</option>
                                                    <option value="P">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <label class="col-sm-2 form-group col-form-label">NIK</label>
                                            <div class="form-group col-sm-4">
                                                <input v-model="data_form.NIK" type="text" name="nik"
                                                    class="form-control" id="nama" placeholder="NIK">
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <select v-model="data_form.warganegara" class="form-control"
                                                    name="warga_negara" id="warga_negara">
                                                    <option value="">--- warga negara ---</option>
                                                    <option value="WNI">--- WNI ---</option>
                                                    <option value="WNA">--- WNA ---</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-sm-4">
                                                <select v-model="data_form.agama" class="form-control"
                                                    name="jenis_kelamin" id="jk">
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
                                                    class="form-control" placeholder="2017-06-04" id="mdate"
                                                    name="tanggal_lahir">
                                            </div>
                                            <div class="col-md-3 form-group">
                                                <input readonly v-model="data_form.umur" type="text"
                                                    class="form-control" name="umur" placeholder="umur">
                                            </div>
                                            <div class="col-md-3 form-group">
                                                <input readonly v-model="data_form.bulan" type="text"
                                                    class="form-control" placeholder="lebih bulan">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <label class="col-sm-2 form-group col-form-label">nama ibu kandung</label>
                                            <div class="form-group col-md-4">
                                                <input type="text" class="form-control" v-model="data_form.namaibu">
                                            </div>

                                            <div class="form-group col-md-3">
                                                <select v-model="data_form.pendidikan" class="form-control"
                                                    name="pekerjaan" id="jk">
                                                    <option value="">--- pendidikan terakhir ---</option>
                                                    @foreach ($pendidikan as $item)
                                                    <option value="{{$item->pendidikan}}">{{$item->pendidikan}}</option>
                                                    @endforeach


                                                </select>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <select v-model="data_form.pekerjaan" class="form-control"
                                                    name="pekerjaan" id="jk">
                                                    <option value="">--- pekerjaan pasien---</option>
                                                    @foreach ($pekerjaanPasien as $item)
                                                    <option value="{{$item->id}}">{{$item->pekerjaan_pasien}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                    <h4>Kontak Pasien</h4>
                                    <div class="form-row">
                                        <label class="col-sm-2 form-group col-form-label">No Telp</label>
                                        <div class="form-group col-md-5">
                                            <input v-model="data_form.telp" type="number" class="form-control"
                                                name="telp">
                                        </div>
                                        <div class="form-group col-md-5">
                                            <input v-model="data_form.email" type="email" placeholder="email"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <h4>Alamat Pasien</h4>
                                    <div class="form-row">
                                        <div class="border p-3 form-row">
                                            <div class="col-sm-6 form-group">
                                                <label>kelurahan</label>
                                                <select class="form-control" v-model="data_form.kelurahan">
                                                    <option value="">--Kelurahan--</option>
                                                    <option v-for="item in kelurahan" :value="item.id">@{{item.nama}}
                                                    </option>
                                                </select>
                                            </div>

                                            <div class="col-sm-6 form-group">
                                                <label>kecamatan</label>
                                                <select v-model="data_form.kecamatan" class="form-control"
                                                    id="kecamatan">
                                                    <option value="">--Kecamatan--</option>
                                                    <option v-on:click="apiKelurahan(item.id,1)"
                                                        v-for="item in kecamatan" :value="item.id">
                                                        @{{item.nama}}</option>
                                                </select>
                                            </div>

                                            <div class="col-sm-6 form-group">
                                                <label>kabupaten</label>
                                                <select class="form-control" v-model="data_form.kabupaten">
                                                    <option value="">-- Kabupaten --</option>
                                                    <option v-on:click="apiKecamatan(item.id,1)"
                                                        v-for="item in kabupaten" :value="item.id">
                                                        @{{item.nama}}</option>
                                                </select>
                                            </div>

                                            <div class="col-sm-6 form-group">
                                                <label>kota / provinsi</label>
                                                <select v-on:click="apiKota(2)" v-model="data_form.kota"
                                                    class="form-control">
                                                    <option value="">--Kota--</option>
                                                    <option v-on:click="apiKabupaten(item.id,1)" v-for="item in kota"
                                                        :value="item.id">
                                                        @{{item.nama}}</option>
                                                </select>
                                            </div>

                                            <div class="col-md-12 form-group">
                                                <textarea style="height: 120px" v-model="data_form.alamat" name="alamat"
                                                    class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-tambahan" role="tabpanel"
                            aria-labelledby="pills-tambahan-tab">
                            <div class="card-body">
                                <form v-on:submit.prevent>
                                    <h4 class="mt-2">Biodata keluarga pasien</h4>
                                    <div class="form-row">
                                        <div class="col-sm-2 form-group">
                                            <label>hub Keluarga</label>
                                            <select v-model="infotambahan.hubungan_kel" class="form-control"
                                                id="hubkeluarga">
                                                <option value="">--hubungan keluarga--</option>
                                                <option value="1">ayah</option>
                                                <option value="2">ibu</option>
                                                <option value="3">anak</option>
                                                <option value="4">keluarga</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label>Nama Keluarga</label>
                                            <input type="text" class="form-control" id="nama_kel"
                                                v-model="infotambahan.nama_kel">
                                        </div>

                                        <div class="col-sm-4 form-group">
                                            <label>Jenis Kelamin</label>
                                            <select v-model="infotambahan.jenis_kel" class="form-control"
                                                name="jenis_kelamin" id="jk">
                                                <option value="">--- Jenis Kelamin ---</option>
                                                <option value="L">laki-laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-sm-4 form-group">
                                            <label>Pekerjaan</label>
                                            <select v-model="infotambahan.pekerjaan_kel" class="form-control"
                                                name="pekerjaan" id="jk">
                                                <option value="">--- pekerjaan ---</option>
                                                @foreach ($pekerjaanPasien as $item)
                                                <option value="{{$item->id}}">
                                                    {{$item->pekerjaan_pasien}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-sm-8 form-group">
                                            <label>Telpon</label>
                                            <input v-model="infotambahan.telp_kel" type="number" class="form-control"
                                                name="telp">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>email</label>
                                        <input v-model="infotambahan.email" type="email" class="form-control"
                                            name="email">
                                    </div>

                                    <h4 class="mt-2">Alamat</h4>
                                    <div class="border p-3 form-row">
                                        <div class="col-sm-6 form-group">
                                            <label>kelurahan</label>
                                            <select class="form-control" v-model="infotambahan.kelurahan_kel">
                                                <option value="">--Kelurahan--</option>
                                                <option v-for="item in kelurahan_kel" :value="item.id">@{{item.nama}}
                                                </option>
                                            </select>
                                        </div>

                                        <div class="col-sm-6 form-group">
                                            <label>kecamatan</label>
                                            <select v-model="infotambahan.kecamatan_kel" class="form-control"
                                                id="kecamatan">
                                                <option value="">--Kecamatan--</option>
                                                <option v-on:click="apiKelurahan(item.id,2)"
                                                    v-for="item in kecamatan_kel" :value="item.id">
                                                    @{{item.nama}}</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-6 form-group">
                                            <label>kabupaten</label>
                                            <select class="form-control" v-model="infotambahan.kabupaten_kel">
                                                <option value="">-- Kabupaten --</option>
                                                <option v-on:click="apiKecamatan(item.id,2)"
                                                    v-for="item in kabupaten_kel" :value="item.id">
                                                    @{{item.nama}}</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-6 form-group">
                                            <label>kota / provinsi</label>
                                            <select v-on:click="apiKota(2)" v-model="infotambahan.kota_kel"
                                                class="form-control">
                                                <option value="">--Kota--</option>
                                                <option v-on:click="apiKabupaten(item.id,2)" v-for="item in kota_kel"
                                                    :value="item.id">
                                                    @{{item.nama}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="form-row mt-2">
                            <div class="col-sm-10 offset-sm-2 d-flex flex-row-reverse">
                                <button type="button" class="ml-3 btn form-group btn-primary gradient-1"
                                    v-on:click="updatePasien">Update</button>
                                <button type="button" class="ml-3 btn form-group btn-primary gradient-1"
                                    v-on:click="updatePasien">Cetak ulang kartu</button>
                                <button type="reset" v-on:click="clear"
                                    class="btn form-group ml-3 btn-whatsapp">Clear</button>
                                <button type="button" class="ml-3 btn form-group btn-google"
                                    v-on:click="updatePasien">kembali</button>


                                <button type="button" class="btn btn-danger form-group" v-on:click="updatePasien">ganti
                                    password</button>
                                {{-- <button type="button" v-on:click="printFormMedis"
                                        class="btn form-group btn-danger gradient-2">Cancel</button> --}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Foto Pasien</h4>
                        <div class="form-group">
                            <img v-bind:src="fotoData" v-on:click="browsefile" alt=""
                                class="img-thumbnail mx-auto d-block img img-circle mt-3" width="200px"
                                style="height: 200px">
                            <input style="display: none" type="file" id="pilihprofil" v-on:change="onImageChange">
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">

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
                            <input name="idasuransi" type="number" class="form-control" v-model="data_form.idasuransi">
                        </div>

                        <div class="form-group">
                            <label>status kawin</label>
                            <select name="kawin" type="text" class="form-control" v-model="data_form.kawin">
                                <option value="">-- status kawin --</option>
                                <option value="belum kawin">belum kawin</option>
                                <option value="kawin">kawin</option>
                                <option value="cerai hidup">cerai hidup</option>
                                <option value="cerai mati">cerai mati</option>
                            </select>
                        </div>

                        <h4>sekunder</h4>
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

                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4>Riwayat pengeditan biodata</h4>
                        <h6>Example heading <span class="badge badge-primary gradient-4">New</span></h6>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Riwayat Pemeriksaan</h4>
                        <div class="list-group">
                            <button type="button" class="list-group-item list-group-item-action active">
                                Cras justo odio
                            </button>
                            <button type="button" class="list-group-item list-group-item-action">Dapibus ac facilisis
                                in</button>
                            <button type="button" class="list-group-item list-group-item-action">Morbi leo
                                risus</button>
                            <button type="button" class="list-group-item list-group-item-action">Porta ac consectetur
                                ac</button>
                            <button type="button" class="list-group-item list-group-item-action" disabled>Vestibulum at
                                eros</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Riwayat Lab</h4>
                        <div class="list-group">
                            <button type="button" class="list-group-item list-group-item-action active">
                                Cras justo odio
                            </button>
                            <button type="button" class="list-group-item list-group-item-action">Dapibus ac facilisis
                                in</button>
                            <button type="button" class="list-group-item list-group-item-action">Morbi leo
                                risus</button>
                            <button type="button" class="list-group-item list-group-item-action">Porta ac consectetur
                                ac</button>
                            <button type="button" class="list-group-item list-group-item-action" disabled>Vestibulum at
                                eros</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Alergi Obat</h4>
                        <div class="list-group">
                            <button type="button" class="list-group-item list-group-item-action active">
                                Cras justo odio
                            </button>
                            <button type="button" class="list-group-item list-group-item-action">Dapibus ac facilisis
                                in</button>
                            <button type="button" class="list-group-item list-group-item-action">Morbi leo
                                risus</button>
                            <button type="button" class="list-group-item list-group-item-action">Porta ac consectetur
                                ac</button>
                            <button type="button" class="list-group-item list-group-item-action" disabled>Vestibulum at
                                eros</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            new Vue({
                el: '#editPasien',
                data: {
                    fotoData: "",
                    id_pasien: "{{$dataPasien->id_pasien}}",
                    kota: [],
                    kabupaten: [],
                    kecamatan: [],
                    kelurahan: [],

                    kota_kel: [],
                    kabupaten_kel: [],
                    kecamatan_kel: [],
                    kelurahan_kel: [],

                    data_form: {
                        rekamMedis: "{{$dataPasien->rekam_medis}}",
                        nama_baru: "{{$dataPasien->nama}}",
                        jenis_kelamin: "{{$dataPasien->jenisKelamin}}",
                        NIK: "{{$dataPasien->NIK}}",
                        warganegara: "{{$dataPasien->warga_negara}}",
                        agama: "{{$dataPasien->agama}}",
                        tgl_lahir: "{{$dataPasien->tanggal_lahir}}",
                        umur: "{{$dataPasien->umur_daftar}} tahun",
                        bulan: "{{$dataPasien->lebih_bulan}} bulan",
                        namaibu: "{{$dataPasien->nama_ibu}}",
                        pendidikan: "{{$dataPasien->pendidikan}}",
                        pekerjaan: "{{$dataPasien->pekerjaan}}",
                        telp: "{{$dataPasien->telpon}}",
                        email: "{{$dataPasien->email}}",

                        kelurahan: "{{$dataPasien->kelurahan}}",
                        kecamatan: "{{$dataPasien->kecamatan}}",
                        kabupaten: "{{$dataPasien->kabupaten}}",
                        kota: "{{$dataPasien->provinsi}}",
                        alamat: "{{$dataPasien->alamat}}",

                        foto: "{{$dataPasien->foto}}",

                        asuransi: "{{$dataPasien->asuransi}}",
                        idasuransi: "{{$dataPasien->id_asuransi}}",

                        bahasa: "{{$dataPasien->bahasa}}",
                        kawin: "{{$dataPasien->status_nikah}}",
                        cacatfisik: "{{$dataPasien->cacat_fisik }}",
                        cirifisik: "{{$dataPasien->ciri_fisik}}",
                    },
                    infotambahan: {
                        hubungan_kel: '{{$dataPasien->hubungan_keluarga}}',
                        nama_kel: '{{$dataPasien->nama_keluarga}}',
                        jenis_kel: '{{$dataPasien->jenis_kelamin_kel}}',
                        pekerjaan_kel: '{{$dataPasien->pekerjaan_keluarga}}',
                        telp_kel: '{{$dataPasien->telpon_kel}}',
                        email_kel: '{{$dataPasien->email_kel}}',

                        kelurahan_kel: '{{$dataPasien->kelurahan_kel}}',
                        kecamatan_kel: '{{$dataPasien->kecamatan_kel}}',
                        kabupaten_kel: '{{$dataPasien->kabupaten_kel}}',
                        kota_kel: '{{$dataPasien->provinsi_kel}}',
                        alamat_kel: '{{$dataPasien->alamat_kel}}',
                    }
                },
                created: function () {
                    const vm = this;
                    vm.apiKota(1);
                    vm.apiKabupaten(vm.data_form.kota, 1);
                    vm.apiKecamatan(vm.data_form.kabupaten, 1);
                    vm.apiKelurahan(vm.data_form.kecamatan, 1);
                },
                mounted: function () {
                    const vm = this;
                    if (vm.data_form.foto == "") {
                        vm.fotoData = "{{asset('/images/index.png')}}";
                    } else {
                        vm.fotoData = '../storage/fotoPasien/-' + vm.data_form.rekamMedis + '/' +
                            vm.data_form.foto;
                    };
                    vm.asuransiCtrl();
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
                    asuransiCtrl: function () {

                        if (this.data_form.asuransi) {
                            Vue.nextTick(function () {
                                $('#formIdAsuransi').removeClass('collapse');
                            });
                        } else {
                            Vue.nextTick(function () {
                                $('#formIdAsuransi').addClass('collapse');
                            });
                        }
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
                    umur: function () {
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
                    infotambahan: function () {
                        vm.apiKota(2);
                        vm.apiKabupaten(vm.infotambahan.kota_kel, 2);
                        vm.apiKecamatan(vm.infotambahan.kabupaten_kel, 2);
                        vm.apiKelurahan(vm.infotambahan.kecamatan_kel, 2);
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
                    updatePasien: function () {

                        const self = this;
                        var data = new FormData();
                        $.each(this.data_form, function (index, value) {
                            data.append(index, value);
                        });

                        if (this.infotambahan.hubungan_kel) {
                            $.each(this.infotambahan, function (index, value) {
                                data.append(index, value);
                            });
                        };

                        axios.post("/updatePasien/" + this.id_pasien, data)
                            .then(Respon => {
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal
                                            .stopTimer)
                                        toast.addEventListener('mouseleave', Swal
                                            .resumeTimer)
                                    }
                                })

                                Toast.fire({
                                    icon: 'success',
                                    title: "Berhasil Update Pasien! " + Respon.data.nama
                                });
                            })
                            .catch(err => {
                                Swal.fire("Gagal Update Pasien!",
                                    "periksa form atau segera hubungi administrator",
                                    "error");
                            });

                    }

                }
            });

        </script>
        <!-- #/ container -->
    </div>
    @endsection

    @section('script')
    <script src="{{asset('Componentadmin/plugins/moment/moment.js')}}"></script>
    @endsection
