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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title pb-2">Edit Pasien</h4>
                        @foreach($dataPasien as $data)

                        <form v-on:submit="submit" id="form_register">

                            <div class="form-row" id="rekamMedis">
                                <label class="col-sm-2 col-form-label">No. Rekam Medik</label>
                                <div class="col-sm-10">
                                    <input v-on:click.prevent id="rekammedis" v-model=" data_form.rekamMedis"
                                        type="text" class="form-control" value="{{$data['rekam_medis']}}" readonly>
                                </div>
                            </div>

                            <h5 class="card-title pt-3 pb-2">Biodata Pasien</h5>

                            <div class="form-row ">
                                <label class="col-sm-2 form-group col-form-label">nama</label>
                                <div class="col-sm-6 form-group">
                                    <input v-model="data_form.nama_baru" type="text" name="nama" class="form-control"
                                        id="nama" placeholder="Nama" value="{{$data['nama']}}">
                                </div>

                                <div class="form-group col-sm-4">
                                    {{-- <label for="jenis_kelamin">Jeis Kel.</label> --}}
                                    <select v-model="data_form.jenis_kelamin" class="form-control" name="jenis_kelamin"
                                        id="jk">
                                        <option value="{{$data['jenisKelamin']}}">{{$data['jenisKelamin']}} </option>
                                        <option value="L">laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <label class="col-sm-2 form-group col-form-label">NIK</label>
                                <div class="form-group col-sm-4">
                                    <input v-model="data_form.NIK" type="text" name="nik" class="form-control" id="nama"
                                        placeholder="NIK" value="{{$data['NIK']}}">
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
                                        <option value="{{$data['nama']}}">{{$data['agama']}}</option>
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
                                    <input v-model="data_form.tgl_lahir" type="text" class="form-control"
                                        placeholder="2017-06-04" id="mdate" name="tanggal_lahir">
                                </div>
                                <div class="col-md-3 form-group">
                                    <input readonly v-on:click="umur" v-model="data_form.umur" type="text"
                                        class="form-control" name="umur" placeholder="umur"
                                        value="{{$data['tanggal_lahir']}}">
                                </div>
                                <div class="col-md-3 form-group">
                                    <input readonly v-model="data_form.bulan" type="text" class="form-control"
                                        placeholder="lebih bulan">
                                </div>
                            </div>

                            <div class="form-row">
                                <label class="col-sm-2 form-group col-form-label">pemilik asuransi</label>
                                <div class="form-group col-md-6">
                                    <select v-model="data_form.asuransi" class="form-control" name="asuransi" id="jk">
                                        <option value="non-asuransi">--- Non-asuransi ---</option>
                                        <option value="BPJS">--- BPJS ---</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <select v-model="data_form.pekerjaan" class="form-control" name="pekerjaan" id="jk">
                                        <option value="">--- pekerjaan ---</option>
                                        <option value="Pekerja">Pekerja</option>
                                        <option value="siswa/Mahasiswa">siswa/Mahasiswa</option>
                                        <option value="lain-lain">lain</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <label class="col-sm-2 form-group col-form-label">No Telp</label>
                                <div class="form-group col-md-5">
                                    <input v-model="data_form.telp" type="text" class="form-control"
                                        value="{{$data['telpon']}}" name="telp">
                                </div>
                                <div class="form-group col-md-5">
                                    <input value="{{$data['email']}}" v-model="data_form.email" type="email"
                                        placeholder="email" class="form-control">
                                </div>
                            </div>

                            <div class="form-row">
                                <label class="col-sm-2 form-group col-form-label">Alamat</label>

                                <div class="form-group col-md-5">
                                    {{-- <input v-model="data_form.kelurahan" type="text" placeholder="kelurahan"
                                        name="kelurahan" class="form-control"> --}}
                                    <select class="form-control" id="kelurahan">
                                        <option value="null">--Kelurahan--</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-5">
                                    {{-- <input v-model="data_form.kecamatan" type="text" placeholder="kecamatan"
                                        name="kecamatan" class="form-control"> --}}
                                    <select v-on:blur="apiKelurahan" class="form-control" id="kecamatan">
                                        <option value="null">--Kecamatan--</option>
                                    </select>
                                </div>
                                <div class="form-group offset-md-2  col-md-5">
                                    {{-- <input v-model="data_form.kabupaten" type="text" placeholder="kabupaten"
                                        name="kabupaten" class="form-control"> --}}
                                    <select v-on:blur="apiKecamatan" class="form-control" id="kabupaten">
                                        <option value="null">--Kabupaten--</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-5">
                                    {{-- <input v-model="data_form.kota" type="text" placeholder="kota/provinsi" name="kota"
                                        class="form-control"> --}}
                                    <select v-on:blur="apiKabupaten" v-model="data_form.kota" class="form-control"
                                        id="kota">
                                        <option value="null">--Kota--</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="offset-md-2 col-md-10 form-group">
                                    <textarea v-model="data_form.alamat" name="alamat"
                                        class="form-control">{{$data['alamat']}}</textarea>
                                </div>
                            </div>

                            <div class="form-row mt-2">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary gradient-1">Daftar</button>
                                    <button v-on:click="clear" type="reset" class="btn btn-whatsapp">Clear</button>
                                    <button v-on:click="apiKota" class="btn btn-danger">Cancel</button>
                                </div>
                            </div>
                        </form>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Foto Pasien</h4>
                        <img src="" width="100%" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Riwayat Medis</h4>
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
    </div>
    <!-- #/ container -->
</div>
@endsection

@section('script')
<script src="{{asset('Componentadmin/plugins/moment/moment.js')}}"></script>
<script
    src="{{asset('Componentadmin/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
<script src="{{asset('Componentadmin/js/plugins-init/form-pickers-init.js')}}"></script>
<script src="{{asset('Componentadmin/plugins/tables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('Componentadmin/plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('Componentadmin/plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script>
@endsection
