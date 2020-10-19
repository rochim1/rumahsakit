@extends('admin.index')
@section('title','admin-genteng sokka')
@section('content')
<div class="content-body">

    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h3 class="card-title text-white">Pasien Terdaftar</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">4565</h2>
                            {{-- <p class="text-white mb-0">Jan - March 2019</p> --}}
                        </div>
                        <span class="float-right display-5 opacity-5"><span class="iconify" data-icon="carbon:hospital-bed" data-inline="false"></span></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-2">
                    <div class="card-body">
                        <h3 class="card-title text-white">Pasien Rawat Inap</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">8541</h2>
                            {{-- <p class="text-white mb-0">Jan - March 2019</p> --}}
                        </div>
                        <span class="float-right display-5 opacity-5"><span class="iconify" data-icon="medical-icon:i-inpatient" data-inline="false"></span></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-3">
                    <div class="card-body">
                        <h3 class="card-title text-white">Pasien Berasuransi</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">4565</h2>
                            {{-- <p class="text-white mb-0">Jan - March 2019</p> --}}
                        </div>
                        <span class="float-right display-5 opacity-5"><span class="iconify" data-icon="bx:bx-shield-quarter" data-inline="false"></span></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-4">
                    <div class="card-body">
                        <h3 class="card-title text-white">Pasien Non-asuransi</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">99</h2>
                            {{-- <p class="text-white mb-0">Jan - March 2019</p> --}}
                        </div>
                        <span class="float-right display-5 opacity-5"><span class="iconify" data-icon="bx:bx-shield-x" data-inline="false"></span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Daftar Pasien</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>tgl daftar</th>
                                        <th>JK</th>
                                        <th>telepon</th>
                                        <th>alamat</th>
                                        <th>status</th> 
                                        {{-- rawat inap atau tidak --}}
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Pasien Rawat Inap</div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>tgl masuk</th>
                                        <th>kamar</th>
                                        <th>tgl keluar</th>
                                        <th>pembayaran</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-0">
                                    <h4 class="card-title px-4 mb-3">Todo</h4>
                                    <div class="todo-list">
                                        <div class="tdl-holder">
                                            <div class="tdl-content">
                                                <ul id="todo_list">
                                                    <li><label><input type="checkbox"><i></i><span>Get up</span><a href='#' class="ti-trash"></a></label></li>
                                                    <li><label><input type="checkbox" checked><i></i><span>Stand up</span><a href='#' class="ti-trash"></a></label></li>
                                                    <li><label><input type="checkbox"><i></i><span>Don't give up the fight.</span><a href='#' class="ti-trash"></a></label></li>
                                                    <li><label><input type="checkbox" checked><i></i><span>Do something else</span><a href='#' class="ti-trash"></a></label></li>
                                                </ul>
                                            </div>
                                            <div class="px-4">
                                                <input type="text" class="tdl-new form-control" placeholder="Write new item and hit 'Enter'...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        </div>
    </div>
    <!-- #/ container -->
</div>
@endsection
