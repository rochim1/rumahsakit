@extends('admin.index')
@section('title','admin-genteng sokka')
@section('style')
<link href="{{asset('Componentadmin/plugins/tables/css/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection
@section('content')
<div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Admin</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>tgl lahir</th>
                                                <th>alamat</th>
                                                <th>telepon</th>
                                                <th>email</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @php
                                              $no =1
                                          @endphp
                                          @foreach ($admin as $item)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$item->nama}}</td>
                                                <td>{{$item->tepon}}</td>
                                                <td>{{$item->alamat}}</td>
                                                <td>{{$item->telpon}}</td>
                                                <td>{{$item->email}}</td>
                                                <td><button class="btn btn-alert">edit</button> <button class="btn btn-danger gradient-2">delete</button></td></td>
                                            </tr>
                                           @endforeach
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Trash</h4>
                                deleted Admin
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Admin</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
@endsection
@section('script')
<script src="{{asset('Componentadmin/plugins/tables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('Componentadmin/plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('Componentadmin/plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script>
@endsection
