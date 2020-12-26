@extends('admin.index')
@section('title','tambah dokter')
@section('style')
<link
    href="{{asset('Componentadmin/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}"
    rel="stylesheet">

<link href="./plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
<style>
    /** https://loading.io/css/ **/
    .lds-ellipsis {
        display: inline-block;
        position: relative;
        left: 20px;
        top: -30px;
    }

    .lds-ellipsis div {
        position: absolute;
        top: 27px;
        width: 11px;
        height: 11px;
        border-radius: 50%;
        background: #ddd;
        animation-timing-function: cubic-bezier(0, 1, 1, 0);
    }

    .lds-ellipsis div:nth-child(1) {
        left: 6px;
        animation: lds-ellipsis1 0.6s infinite;
    }

    .lds-ellipsis div:nth-child(2) {
        left: 6px;
        animation: lds-ellipsis2 0.6s infinite;
    }

    .lds-ellipsis div:nth-child(3) {
        left: 26px;
        animation: lds-ellipsis2 0.6s infinite;
    }

    .lds-ellipsis div:nth-child(4) {
        left: 45px;
        animation: lds-ellipsis3 0.6s infinite;
    }

    @keyframes lds-ellipsis1 {
        0% {
            transform: scale(0);
        }

        100% {
            transform: scale(1);
        }
    }

    @keyframes lds-ellipsis3 {
        0% {
            transform: scale(1);
        }

        100% {
            transform: scale(0);
        }
    }

    @keyframes lds-ellipsis2 {
        0% {
            transform: translate(0, 0);
        }

        100% {
            transform: translate(19px, 0);
        }
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
            <div>

            </div>
            <div class="col-md-8">
                <div class="card position-relative">
                    <div v-if="isLoading" class="w-100 h-100 position-absolute"
                        style="background: rgb(255,255,255,0.7 );z-index: 10">
                        <div class="position-relative" style="height: 100px;
                        width: 100px; margin: auto; margin-top: 40%">
                            <svg class="circular" viewBox="25 25 50 50">
                                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3"
                                    stroke-miterlimit="10" />
                            </svg>
                        </div>
                    </div>

                    <div class="card-body">
                        <h4 id="judul" class="card-title pb-2">Data Dokter Baru</h4>
                        <form enctype="multipart/form-data" id="tambah_dokter" @submit="simpan_dokter">
                            @csrf
                            <div class="form-row ">
                                <label class="col-sm-2 form-group col-form-label">nama</label>
                                <div class="col-sm-6 form-group">
                                    <input v-bind:class="{'is-invalid': errors.get('nama') }" v-model="form.nama"
                                        type="text" name="nama" class="form-control" id="nama" placeholder="Nama">
                                    <small v-bind:class="{ collapse: isActive, 'text-danger': errors.get('nama') }">
                                        @{{errors.get('nama')}}
                                    </small>
                                </div>

                                <div class="form-group col-sm-4">
                                    {{-- <label for="jenis_kelamin">Jeis Kel.</label> --}}
                                    <select v-bind:class="{'is-invalid': errors.get('jenis_kelamin') }"
                                        v-model="form.jenis_kelamin" class="form-control" name="jenis_kelamin" id="jk">
                                        <option value="">--- Jenis Kelamin ---</option>
                                        <option value="L">laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                    <small
                                        v-bind:class="{ collapse: isActive, 'text-danger': errors.get('jenis_kelamin') }">
                                        @{{errors.get('jenis_kelamin')}}
                                    </small>
                                </div>
                            </div>

                            <div class="form-row">
                                <label class="col-sm-2 form-group col-form-label">NIK</label>
                                <div class="form-group col-sm-6">
                                    <input v-bind:class="{'is-invalid': errors.get('NIK') }" v-model="form.NIK"
                                        type="number" name="nik" class="form-control" id="NIK" placeholder="NIK">
                                    <small v-bind:class="{ collapse: isActive, 'text-danger': errors.get('NIK') }">
                                        @{{errors.get('NIK')}}
                                    </small>
                                </div>
                                <div class="col-md-4 form-group">
                                    <input v-bind:class="{'is-invalid': errors.get('tanggal_lahir') }"
                                        v-model="form.tanggal_lahir" class="form-control" placeholder="tanggal lahir"
                                        type="date" name="tanggal_lahir">
                                    <small
                                        v-bind:class="{ collapse: isActive, 'text-danger': errors.get('tanggal_lahir') }">
                                        @{{errors.get('tanggal_lahir')}}
                                    </small>
                                </div>
                            </div>

                            <div class="form-row">
                                <label class="col-sm-2 form-group col-form-label">nomor str</label>
                                <div class="form-group col-sm-5">
                                    <input v-bind:class="{'is-invalid': errors.get('nomor_str') }"
                                        v-model="form.nomor_str" type="number" name="nomor_Str" class="form-control"
                                        id="str" placeholder="nomor_str">
                                    <small
                                        v-bind:class="{ collapse: isActive, 'text-danger': errors.get('nomor_str') }">
                                        @{{errors.get('nomor_str')}}
                                    </small>
                                </div>
                                <div class="form-group col-sm-5">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend3">@</span>
                                        </div>
                                        <input v-bind:class="{'is-invalid': errors.get('email') }" v-model="form.email"
                                            type="email" name="email" class="form-control" id="email"
                                            placeholder="email">
                                    </div>
                                    <small v-bind:class="{ collapse: isActive, 'text-danger': errors.get('email') }">
                                        @{{errors.get('email')}}
                                    </small>
                                </div>
                            </div>

                            <div class="form-row">
                                <label class="col-sm-2 form-group col-form-label">nomor telpon</label>
                                <div class="form-group col-md-10">
                                    <input type="number" v-bind:class="{'is-invalid': errors.get('telpon') }"
                                        type="text" v-model="form.telpon" class="form-control" placeholder=""
                                        name="telpon">
                                    <small v-bind:class="{ collapse: isActive, 'text-danger': errors.get('telpon') }">
                                        @{{errors.get('telpon')}}
                                    </small>
                                </div>
                            </div>

                            <div class="form-row">
                                <label class="col-sm-2 form-group col-form-label">dokter spesialis</label>
                                <div class="form-group col-md-6">
                                    {{-- {{dd($dataSpesialis)}} --}}
                                    <select v-bind:class="{'is-invalid': errors.get('spesialis') }"
                                        v-model="form.spesialis" class="form-control" v-model="spesialis"
                                        name="spesialis" id="spesialis">
                                        @foreach ($dataSpesialis as $item)
                                        <option value="{{$item->id_spesialis}}">{{$item->spesialis}}</option>
                                        @endforeach
                                    </select>
                                    <small
                                        v-bind:class="{ collapse: isActive, 'text-danger': errors.get('spesialis') }">
                                        @{{errors.get('spesialis')}}
                                    </small>
                                </div>
                                <div class="form-group col-md-4">
                                    <input v-bind:class="{'is-invalid': errors.get('universitas') }" type="text"
                                        v-model="form.universitas" class="form-control" placeholder="lulusan univ"
                                        name="lulusan">
                                    <small
                                        v-bind:class="{ collapse: isActive, 'text-danger': errors.get('universitas') }">
                                        @{{errors.get('universitas')}}
                                    </small>
                                </div>
                            </div>

                            <div class="form-row">
                                <label class="col-sm-2 form-group col-form-label">Jabatan</label>
                                <div class="col-md-4 form-group">
                                    <select v-bind:class="{'is-invalid': errors.get('jabatan') }" v-model="form.jabatan"
                                        type="text" class="form-control" placeholder="jabatan" name="jabatan">
                                        <option value="">-- jabatan --</option>
                                        @foreach ($dataJabatan as $item)
                                        <option value="{{$item->id_jabatan}}">{{$item->jabatan}}</option>
                                        @endforeach
                                        <select>
                                            <small
                                                v-bind:class="{ collapse: isActive, 'text-danger': errors.get('jabatan') }">
                                                @{{errors.get('jabatan')}}
                                            </small>
                                </div>
                                <label class="col-sm-2 form-group col-form-label">Agama</label>
                                <div class="form-group col-sm-4">
                                    <select v-bind:class="{'is-invalid': errors.get('agama') }" v-model="form.agama"
                                        class="form-control" name="agama" id="agama">
                                        <option value="">--- Agama ---</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Konghucu">Konghucu</option>
                                    </select>
                                    <small v-bind:class="{ collapse: isActive, 'text-danger': errors.get('agama') }">
                                        @{{errors.get('agama')}}
                                    </small>
                                </div>
                            </div>
                            <div class="form-row">
                                <label class="col-sm-2 form-group col-form-label">Alamat</label>
                                <div class="col-md-10 form-group">
                                    <textarea v-bind:class="{'is-invalid': errors.get('alamat') }" v-model="form.alamat"
                                        name="alamat" class="form-control"></textarea>
                                    <small v-bind:class="{ collapse: isActive, 'text-danger': errors.get('alamat') }">
                                        @{{errors.get('alamat')}}
                                    </small>
                                </div>
                            </div>
                            <div class="form-row">
                                <label class="col-sm-2 form-group col-form-label">Foto</label>
                                <div class="col-md-10 form-group">
                                    <div v-if="fotoData">
                                        <img v-bind:src="fotoData" class="img-rounded img-thumbnail m-2"
                                            style="width: 150px; height:auto;">
                                    </div>
                                    <small v-bind:class="{ collapse: isActive, 'text-danger': errors.get('foto') }">
                                        @{{errors.get('foto')}}
                                    </small>
                                    <input v-on:change="onImageChange" type="file" name="foto" class="form-control">
                                    <div class="invalid-feedback">tidak harus diisi</div>
                                </div>
                            </div>



                            <div id="tombol" class="form-row mt-2">
                                <div class="col-sm-10 d-flex align-items-start">
                                    <button id="tombol_daftar" type="submit" class="btn btn-primary gradient-1">Daftar</button>
                                    <button id="tombol_update" v-on:click="update_dokter(id_dokter, $event)"
                                        class="collapse btn btn-primary gradient-1">Update</button>
                                    <button v-on:click="clear" id="tombol_clear" type="reset"
                                        class="btn btn-warning text-white ml-2 mr-3">Clear</button>
                                    <button type="reset" id="tombol_cencel" v-on:click="cencel"
                                        class="collapse btn btn-danger gradient-2 ml-5 mr-3">Cencel</button>
                                    <div v-if="isLoading">
                                        <div class="lds-ellipsis">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card" id="daftar_recent">
                    <div class="card-body">
                        <h4>Dokter Last Input</h4>
                        <div class="list-group" v-for="item in last_dokter">
                            <span style="display: flex" class="row list-group-item list-group-item-action">
                                <span class="col-md-8">
                                    @{{item.nama_dokter}}
                                </span>
                                <span class="col-md-4">
                                    <a href="javascript:;" v-on:click="get_dokter(item.id_dokter)"> <span
                                            class="icon-pencil"></span></a> |
                                    <a href="javascript:;" v-on:click="hapus_dokter(item.id_dokter)">
                                        <span class="icon-trash text-danger"></span>
                                    </a>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="card" id="daftar_update">
                    <div class="card-body">
                        <h4>Dokter Last update</h4>
                        <div class="list-group" v-for="item in last_update_dokter">
                            <span style="display: flex" class="row list-group-item list-group-item-action">
                                <span class="col-md-8">
                                    @{{item.nama_dokter}}
                                </span>
                                <span class="col-md-4">
                                    <a href="javascript:;" v-on:click="get_dokter(item.id_dokter)"> <span
                                            class="icon-pencil"></span></a> |
                                    <a href="" v-on:click="hapus_dokter(item.id_dokter, $event)">
                                        <span class="icon-trash text-danger"></span>
                                    </a>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>


                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <h4>todo :</h4>
                    <strong>developer notice!</strong>
                    <del>aplication has some bug; in error massage, when just have one error input message other
                        errors message is show too.
                    </del>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>
<script>
    class Errors {

        constructor() {
            this.errors = {};
        }

        get(field) {
            if (this.errors[field]) {
                return this.errors[field][0];
            }
        }

        destroy(errors) {
            this.errors = {};
        }

        record(errors) {
            this.errors = errors.errors;
        }
    }

    let vue = new Vue({
        el: "#vueField",
        data: {
            classObject: {
                collapse: true,
                'text-danger': true
            },
            isActive: false,
            hasError: true,
            id_dokter: '',
            form: {
                nama: '',
                jenis_kelamin: '',
                NIK: '',
                nomor_str: '',
                email: '',
                telpon: '',
                tanggal_lahir: '',
                spesialis: '',
                universitas: '',
                jabatan: '',
                agama: '',
                alamat: '',
                foto: '',
            },
            errors: new Errors(),
            fotoData: "",
            last_dokter: [],
            last_update_dokter: [],
            refCount: 0,
            isLoading: false
        },
        created() {
            axios.interceptors.request.use((config) => {
                // trigger 'loading=true' event here
                this.setLoading(true);
                return config;
            }, (error) => {
                // trigger 'loading=false' event here
                this.setLoading(false);
                return Promise.reject(error);
            });

            axios.interceptors.response.use((response) => {
                // trigger 'loading=false' event here
                this.setLoading(false);
                return response;
            }, (error) => {
                // trigger 'loading=false' event here
                this.setLoading(false);
                return Promise.reject(error);
            });

        },
        mounted: function () {
            this.last_save();
            this.last_update();
        },
        methods: {
            setLoading(isLoading) {
                if (isLoading) {
                    this.refCount++;
                    this.isLoading = true;
                } else if (this.refCount > 0) {
                    this.refCount--;
                    this.isLoading = (this.refCount > 0);
                }
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
                    // alert(e.target.result);
                    vm.form.foto = file;
                };
                reader.readAsDataURL(file);
            },
            setdate: function () {
                // ga bisa
                this.form.tanggal_lahir = $("#mdate").val();
            },
            // fungsi simpan fix
            simpan_dokter: function (e) {
                e.preventDefault();
                this.isActive = false;
                // this.form.tanggal_lahir = $("#mdate").val();

                var form_data = new FormData();

                $.each(this.form, function (index, value) {
                    form_data.append(index, value);
                });

                axios.post('/simpan_dokter', form_data, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }).then(Resp => {
                        this.isActive = true;
                        this.errors.destroy();
                        swal("berhasil input dokter, periksa email untuk konfirmasi",
                            Resp.data.message,
                            "success");
                        // Resp.response.data = false;
                        vue.last_save();
                        vue.cencel();
                    })
                    .catch(err => {
                        swal("Gagal Input Dokter!", "perhatikan field" + err.response.data.message,
                            "error");
                        // ini sepaket
                        this.errors.record(err.response.data);
                        // ini sepaket
                    });

            },
            last_save: function () {
                axios.get("{{route('recent_dokter')}}").then(Resp => {
                        panjang = Resp.data.length;
                        this.last_dokter = Resp.data;
                    })
                    .catch(err => {
                        swal("Gagal Menampilkan Data!",
                            err, "error");
                    });
            },
            last_update: function () {
                axios.get('/recentupdate_dokter').then(Resp => {
                        panjang = Resp.data.length;
                        console.log(Resp.data);
                        this.last_update_dokter = Resp.data;
                        console.log(this.last_update_dokter);
                    })
                    .catch(err => {
                        swal("Gagal Menampilkan Data!",
                            err, "error");
                    });
                this.last_save();
            },
            hapus_dokter: function (id) {
                swal("yakin anda akan menghapus", {
                        buttons: {
                            cancel: "batal",
                            hapus: true,
                        },
                    })
                    .then((value) => {
                        switch (value) {
                            case "hapus":
                                id_dokter = id;
                                axios.delete("/hapus_dokter/" + id).then(Respon => {
                                    swal("berhasil hapus",
                                        "dokter dengan id: " + id_dokter +
                                        ", berhasil di hapus", "success");
                                })
                                break;
                            default:
                                return 0;
                        }
                        this.cencel();
                        this.last_save();
                        this.last_update();
                    });
            },
            get_dokter: function (id) {
                // this.hasError = false;
                this.isActive = true;
                this.errors.destroy();
                const vm = this;
                axios.get("{{url('/tampil_dokter')}}/" + id).then(Respon => {
                    vm.id_dokter = Respon.data.id_dokter;
                    vm.form.nama = Respon.data.nama_dokter;
                    vm.form.jenis_kelamin = Respon.data.jenis_kelamin;
                    vm.form.NIK = Respon.data.NIK;
                    vm.form.nomor_str = Respon.data.nomor_str;
                    vm.form.email = Respon.data.email;
                    vm.form.telpon = Respon.data.telpon;
                    vm.form.tanggal_lahir = Respon.data.tanggal_lahir;
                    vm.form.spesialis = Respon.data.spesialis;
                    vm.form.universitas = Respon.data.universitas;
                    vm.form.jabatan = Respon.data.jabatan;
                    vm.form.agama = Respon.data.agama;
                    vm.form.alamat = Respon.data.alamat;
                    // vm.form.foto = Respon.data.foto; //membuat error validasi bila foto tak diisi

                    vm.fotoData = "storage/fotoDokter/" + vm.form.nama + "-" + vm.form.NIK + "/" +
                        Respon.data.foto;

                    $('#judul').html('Update Data Dokter <br> <small>dengan id: ' +
                        Respon.data.id_dokter + '</small>');
                    $('#tombol_daftar').addClass('collapse');
                    $('#tombol_update').removeClass('collapse');
                    $('#tombol_cencel').removeClass('collapse');
                });
            },
            cencel: function () {
                this.id_dokter = '';
                this.form.nama = '';
                this.form.jenis_kelamin = '';
                this.form.NIK = '';
                this.form.nomor_str = '';
                this.form.email = '';
                this.form.telpon = '';
                this.form.tanggal_lahir = '';
                this.form.spesialis = '';
                this.form.universitas = '';
                this.form.jabatan = '';
                this.form.agama = '';
                this.form.alamat = '';
                this.form.foto = '';
                this.fotoData = "";
                $('#judul').html('Data Dokter baru');
                $('#tombol_daftar').removeClass('collapse');
                $('#tombol_update').addClass('collapse');
                $('#tombol_cencel').addClass('collapse');
            },
            clear: function () {
                this.fotoData = "";
            },
            update_dokter: function (id, e) {
                this.isActive = false;
                const vm = this;
                e.preventDefault();
                // this.form.tanggal_lahir = $("#mdate").val();

                var form_data = new FormData();
                $.each(this.form, function (index, value) {
                    form_data.append(index, value);
                });
                axios.post('/update_dokter/' + id, form_data).then(Resp => {
                        swal("berhasil update dokter", Resp.data.message,
                            "success");
                        this.isActive = true;
                        this.errors.destroy();
                        vue.cencel();
                        vue.last_save();
                        vue.last_update();
                    })
                    .catch(err => {
                        // this.hasError = true;
                        // this.isActive = false;
                        swal("Gagal update Dokter!",
                            "perhatikan field", "error");
                        console.log(err.response.data);
                        vue.errors.record(err.response.data);
                    });


            }
        }
    });

</script>
@endsection
@section('script')
<script src="{{asset('Componentadmin/plugins/moment/moment.js')}}"></script>
{{-- <script
    src="{{asset('Componentadmin/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}">
</script> --}}
{{-- <script src="{{asset('Componentadmin/js/plugins-init/form-pickers-init.js')}}"></script> --}}
@endsection
