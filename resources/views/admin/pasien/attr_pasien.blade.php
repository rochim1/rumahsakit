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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
                            <div class="form-row" id="rekamMedis">
                                <label class="col-sm-2 col-form-label">No. Rekam Medik</label>
                                <div class="col-sm-8">
                                    <input v-on:click.prevent id="rekammedis" v-model=" data_form.rekamMedis"
                                        type="text" class="form-control" readonly value="">
                                </div>
                                <div class="col-sm-2">
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
                                    {{-- <label for="jenis_kelamin">Jeis Kel.</label> --}}
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
                                        <option value="Pekerja">Pekerja</option>
                                        <option value="siswa/Mahasiswa">siswa/Mahasiswa</option>
                                        <option value="lain-lain">lain</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <label class="col-sm-2 form-group col-form-label">No Telp</label>
                                <div class="form-group col-md-5">
                                    <input v-model="data_form.telp" type="text" class="form-control" name="telp">
                                </div>
                                <div class="form-group col-md-5">
                                    <input v-model="data_form.email" type="email" placeholder="email"
                                        class="form-control">
                                </div>
                            </div>

                            <div class="form-row">
                                <label class="col-sm-2 form-group col-form-label">Alamat</label>

                                <div class="form-group col-md-5">
                                    {{-- <input v-model="data_form.kelurahan" type="text" placeholder="kelurahan"
                                        name="kelurahan" class="form-control"> --}}
                                    <select class="form-control" v-model="data_form.kelurahan" id="kelurahan">
                                        <option value="">--Kelurahan--</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-5">
                                    {{-- <input v-model="data_form.kecamatan" type="text" placeholder="kecamatan"
                                        name="kecamatan" class="form-control"> --}}
                                    <select v-on:blur="apiKelurahan" v-model="data_form.kecamatan" class="form-control"
                                        id="kecamatan">
                                        <option value="">--Kecamatan--</option>
                                    </select>
                                </div>
                                <div class="form-group offset-md-2  col-md-5">
                                    {{-- <input v-model="data_form.kabupaten" type="text" placeholder="kabupaten"
                                        name="kabupaten" class="form-control"> --}}
                                    <select v-on:blur="apiKecamatan" v-model="data_form.kabupaten" class="form-control"
                                        id="kabupaten">
                                        <option value="">--Kabupaten--</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-5">
                                    {{-- <input v-model="data_form.kota" type="text" placeholder="kota/provinsi" name="kota"
                                        class="form-control"> --}}
                                    <select v-on:blur="apiKabupaten" v-model="data_form.kota" class="form-control"
                                        id="kota">
                                        <option value="">--Kota--</option>
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
                                    <button type="button" v-on:click="simpanpasien" class="btn btn-primary gradient-1">Daftar</button>
                                    <button type="reset" v-on:click="clear" class="btn btn-whatsapp">Clear</button>
                                    <button type="button"v-on:click="printFormMedis" class="btn btn-danger gradient-2">Cancel</button>
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
                        <form v-on:submit.prevent="test" id="form_tambah">
                            <div class="form-group">
                                <img v-bind:src="fotoData" v-on:click="browsefile" alt=""
                                    class="img-thumbnail mx-auto d-block img img-circle mt-3" width="200px"
                                    style="height: 200px">
                                <input style="display: none" type="file" id="pilihprofil" v-on:change="onImageChange">
                            </div>

                            <div class="form-group ">
                                <label for="">cara pembayaran</label>
                                <select v-model="data_form.asuransi" class="form-control" name="asuransi" id="jk">
                                    <option value="non-asuransi">--- Non-asuransi ---</option>
                                    <option value="BPJS">--- BPJS ---</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>nomor id asuransi</label>
                                <input name="idasuransi" type="text" class="form-control"
                                    v-model="data_form.idasuransi">
                            </div>
                            <div class="form-group">
                                <label>cacat fisik</label>
                                <input name="cacatfisik" type="text" class="form-control"
                                    v-model="data_form.cacatfisik">
                            </div>
                            <div class="form-group">
                                <label>bahasa</label>
                                <input name="bahasa" type="text" class="form-control" v-model="data_form.bahasa">
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">tambahakan informasi keluarga</h4>
                        <div class="row">
                            <div class="col-md-8">
                                <select name="infokeluarga" v-model="data_form.infokeluarga" class="form-control" id="">
                                    <option value="1">ayah</option>
                                    <option value="2">ibu</option>
                                    <option value="3">anak</option>
                                    <option value="4">keluarga</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary gradient-1" data-toggle="modal"
                                    data-target="#exampleModalCenter">
                                    tambah
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                ...
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary gradient-1">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            new Vue({
                el: '#vuetemp',
                data: {
                    fotoData: "{{asset('/images/index.png')}}",

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
                        cacatfisik: '',
                        bahasa: '',
                        infokeluarga: '',
                    }
                },
                mounted() {
                    this.apiKota()
                },
                methods: {
                    test() {
                        // alert(this.data_form);
                        // this.data_form.serialize();
                        // data = JSON.stringify(this.data_form);
                        // var form_data = new FormData();
                        // form_data.append("content", data);

                        // console.log(this.data_form);
                        // console.log(JSON.stringify(this.data_form));
                        // console.log(form_data);
                        // console.log($("#form_tambah").serialize());

                        axios.post("{{route('test')}}", this.data_form).then(Resp => {
                                alert(Resp.data);
                            })
                            .catch(error => {
                                if (error.response.status == 422) {
                                    this.errors = error.response.data;
                                }
                            });

                    },
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
                    apiKota: function () {
                        axios.get("{{url('/daftarkota')}}").then(function (hasil) {
                            console.log(JSON.parse(hasil.data));
                            daftarKota = JSON.parse(hasil.data);
                            this.kota = daftarKota.provinsi;
                            // seharusnya cara menampilkannya memakai data vue, namun karena kendala variabel yang telat fill belum tahu cara nya
                            id = $('#kota');
                            id = $('#kota').html(
                                '<option value="">--provinsi--</option>');
                            for (let index = 0; index < this.kota.length; index++) {
                                id.append("<option value='" + this.kota[index].id +
                                    "'>" + this.kota[index].nama + '</option>');
                            }
                        });
                        this.apiKabupaten();
                        this.apiKecamatan();
                        this.apiKelurahan();
                    },
                    apiKabupaten: function () {

                        id = $('#kota');
                        idkota = id.val();
                        axios.get("/daftarkabupaten/" + idkota).then(
                            function (hasil) {
                                console.log(JSON.parse(hasil.data));
                                daftarKota = JSON.parse(hasil.data);
                                this.kabupaten = daftarKota.kota_kabupaten;
                                objkabupaten = $('#kabupaten');
                                objkabupaten.html(
                                    '<option value="">--Kabupaten--</option>');
                                for (let index = 0; index < this.kabupaten
                                    .length; index++) {
                                    objkabupaten.append("<option value='" + this
                                        .kabupaten[index].id + "'>" + this
                                        .kabupaten[index].nama + "</option>")
                                }
                            });
                        this.apiKecamatan();
                        this.apiKelurahan();
                    },
                    apiKecamatan: function () {

                        id = $('#kabupaten');
                        idkabupaten = id.val();
                        axios.get("/daftarkecamatan/" + idkabupaten).then(
                            function (hasil) {
                                console.log(JSON.parse(hasil.data));
                                daftarKota = JSON.parse(hasil.data);
                                this.kecamatan = daftarKota.kecamatan;
                                objkecamatan = $('#kecamatan');
                                objkecamatan.html(
                                    '<option value="">--Kecamatan--</option>');
                                for (let index = 0; index < this.kecamatan
                                    .length; index++) {
                                    objkecamatan.append("<option value='" + this
                                        .kecamatan[index].id + "'>" + this
                                        .kecamatan[index].nama + "</option>")
                                }
                            });
                        this.apiKelurahan();
                    },
                    apiKelurahan: function () {

                        id = $('#kecamatan');
                        idkelurahan = id.val();
                        axios.get("/daftarkelurahan/" + idkelurahan).then(
                            function (hasil) {
                                console.log(JSON.parse(hasil.data));
                                daftarKota = JSON.parse(hasil.data);
                                this.kelurahan = daftarKota.kelurahan;
                                objkelurahan = $('#kelurahan');
                                objkelurahan.html(
                                    '<option value="">--Kelurahan--</option>');
                                for (let index = 0; index < this.kelurahan
                                    .length; index++) {
                                    objkelurahan.append("<option value='" + this
                                        .kelurahan[index].id + "'>" + this
                                        .kelurahan[index].nama + "</option>")
                                }
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
                    },
                    simpanpasien: function () {
                        if (this.data_form.rekamMedis) {
                            const self = this;
                            var data = new FormData();
                            $.each(this.data_form, function (index, value) {
                                data.append(index, value);
                            });
                                axios.post("{{route('daftarPasien')}}", data)
                                    .then(Respon => {
                                        console.log(Respon.data.message.nama);
                                        swal("Berhasil Input Pasien!",
                                            Respon.data.message.nama +
                                            " dengan No.RM : " +
                                            Respon.data.message.rekam, "success");
                                            this.clear();
                                            this.generate();
                                    })
                                    .catch(err => {
                                        swal("Gagal Input Pasien!",
                                            "periksa form atau segera hubungi administrator",
                                            "error");
                                    });
                        } else {
                            swal("Gagal Input Pasien!", "generate no rekam medis", "error");
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
                            swal("isikan tanggal lahir", "", "warning");
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
