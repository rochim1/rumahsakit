@extends('admin.index')
@section('title','tambah pasien')
@section('style')
<link
    href="{{asset('Componentadmin/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}"
    rel="stylesheet">
<link href="./plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
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
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title pb-2">Data Dokter Baru</h4>
                        <form>
                            <div class="form-row ">
                                <label class="col-sm-2 form-group col-form-label">nama</label>
                                <div class="col-sm-6 form-group">
                                    <input type="text" name="nama" class="form-control" id="nama"
                                        placeholder="Nama">
                                </div>
                                
                                <div class="form-group col-sm-4">
                                    {{-- <label for="jenis_kelamin">Jeis Kel.</label> --}}
                                    <select class="form-control" name="jenis_kelamin" id="jk">
                                        <option value="">--- Jenis Kelamin ---</option>
                                        <option value="L">laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <label class="col-sm-2 form-group col-form-label">NIK</label>
                                <div class="form-group col-sm-6">
                                    <input type="text" name="nik" class="form-control" id="nama"
                                        placeholder="NIK">
                                </div>
                                
                                <div class="form-group col-sm-4">
                                    <select class="form-control" name="jenis_kelamin" id="jk">
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
                                    <input type="text" class="form-control" placeholder="2017-06-04" id="mdate" name="tanggal_lahir">
                                </div>
                                
                            </div>
                            
                            <div class="form-row">
                                <label class="col-sm-2 form-group col-form-label">dokter spesialis</label>
                                <div class="form-group col-md-6">
                                    <select class="form-control" name="asuransi" id="jk">
                                        <option value="">--- Non-asuransi ---</option>
                                        <option value="">--- BPJS ---</option>
                                    </select>    
                                </div>
                                <div class="form-group col-md-4">
                                    <select class="form-control" name="pekerjaan" id="jk">
                                        <option value="">--- lulusan tahun ---</option>
                                        <option value="Islam">Pekerja</option>
                                        <option value="Kristen">siswa/Mahasiswa</option>
                                        <option value="Katolik">lain</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <label class="col-sm-2 form-group col-form-label">Alamat</label>
                                <div class="col-md-10 form-group">
                                   <textarea name="alamat" class="form-control" ></textarea>
                                </div>
                            </div>

                            
                            <div class="form-row mt-2">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Daftar</button>
                                    <button type="submit" class="btn btn-whatsapp">Clear</button>
                                    <button type="submit" class="btn btn-danger">Cancel</button>
                                </div>
                            </div>
                        </form>
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
<script src="{{asset('Componentadmin/js/plugins-init/form-pickers-init.js')}}"></script>
@endsection
