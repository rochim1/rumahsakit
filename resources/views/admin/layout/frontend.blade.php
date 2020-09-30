@extends('admin.index')
@section('title','admin-genteng sokka')
@section('style')
<link href="{{asset('css/styleupload.css')}}" rel="stylesheet">
<style>
    .uploader {
        display: block;
        clear: both;
        margin: 0;
        width: 100px;
        height: 100px;
    }

    .uploader label {
        padding: 0;
        overflow: hidden;
    }

    .uploader #file-image {
        height: 100px;
    }

    .uploader .btn {
        margin: none;
        position: relative;
    }

    #file-drag {
        height: 100px;
    }

</style>
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
                        <h4 class="card-title">Setting Landing Page</h4>

                        quick setting pada konten header :

                        <div class="basic-form pt-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Heading 1</label>
                                        <input type="text" name="heading1" class="form-control"
                                            placeholder="judul heading 1">
                                    </div>
                                    <div class="form-group">
                                        <label>Sub-Heading 1</label>
                                        <textarea name="sub_heading1" class="form-control" cols="30" rows="5"
                                            placeholder="keterangan heading 1"></textarea>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Heading 2</label>
                                        <input type="text" name="heading1" class="form-control"
                                            placeholder="judul heading 2">
                                    </div>
                                    <div class="form-group">
                                        <label>Sub-Heading 2</label>
                                        <textarea name="sub_heading1" class="form-control" cols="30" rows="5"
                                            placeholder="keterangan heading 2"></textarea>
                                    </div>
                                </div>

                                <div class="form-group m-2">
                                    <label>image header</label>
                                    <div id="file-upload-form" class="uploader">
                                        <input id="file-upload" type="file" name="fileUpload" accept="image/*" />

                                        <label for="file-upload" id="file-drag">
                                            <img id="file-image" src="#" alt="Preview" class="hidden">
                                            <div id="start">
                                                <i class="fa fa-download" aria-hidden="true"></i>
                                                <div id="notimage" class="hidden">Please select an image</div>
                                            </div>
                                            <div id="response" class="hidden">
                                                <div id="messages"></div>
                                                <progress class="progress" id="file-progress" value="0">
                                                    <span>0</span>%
                                                </progress>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group m-2">
                                    <label>image header 2</label>
                                    <div id="file-upload-form" class="uploader">
                                        <input id="file-upload" type="file" name="fileUpload" accept="image/*" />

                                        <label for="file-upload" id="file-drag">
                                            <img id="file-image" src="#" alt="Preview" class="hidden">
                                            <div id="start">
                                                <i class="fa fa-download" aria-hidden="true"></i>
                                                <div id="notimage" class="hidden">Please select an image</div>
                                            </div>
                                            <div id="response" class="hidden">
                                                <div id="messages"></div>
                                                <progress class="progress" id="file-progress" value="0">
                                                    <span>0</span>%
                                                </progress>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-dark">Change</button>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Konten Utama</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Heading 1</label>
                                    <input type="text" name="heading1" class="form-control"
                                        placeholder="judul heading 1">
                                </div>
                                <div class="form-group">
                                    <label>Sub-Heading 1</label>
                                    <textarea name="sub_heading1" class="form-control" cols="30" rows="5"
                                        placeholder="keterangan heading 1"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Heading 1</label>
                                    <input type="text" name="heading1" class="form-control"
                                        placeholder="judul heading 1">
                                </div>
                                <div class="form-group">
                                    <label>Sub-Heading 1</label>
                                    <textarea name="sub_heading1" class="form-control" cols="30" rows="5"
                                        placeholder="keterangan heading 1"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Recent Change</h4>
                    </div>
                </div>
            </div>
    
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">

                        <div class="card-title">Social Media</div>
                        <p class="text-muted"><code></code>
                        </p>
                        <div id="accordion-two" class="accordion">
                            <div class="card">
                                <div class="card-header">
                                    <div class="mb-0" data-toggle="collapse" data-target="#collapseOne1"
                                        aria-expanded="true" aria-controls="collapseOne1"><i class="fa"
                                            aria-hidden="true"></i>
                                        <ion-icon size="small" name="logo-facebook"></ion-icon> Facebook
                                    </div>
                                </div>
                                <div id="collapseOne1" class="collapse show" data-parent="#accordion-two">
                                    <div class="card-body">
                                        <form>
                                            <div class="form-group">
                                                <label>nama facebook</label>
                                                <input type="text" name="namafb" class="form-control"
                                                    aria-describedby="emailHelp" placeholder="nama">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">link facebook</label>
                                                <input type="text" nama="linkfb" class="form-control"
                                                    id="exampleInputPassword1" placeholder="link">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <div class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseTwo2"
                                        aria-expanded="false" aria-controls="collapseTwo2"><i class="fa"
                                            aria-hidden="true"></i>
                                        <ion-icon size="small" name="logo-instagram"></ion-icon> Instagram
                                    </div>
                                </div>
                                <div id="collapseTwo2" class="collapse" data-parent="#accordion-two">
                                    <div class="card-body">
                                        <form>
                                            <div class="form-group">
                                                <label>nama Instagram</label>
                                                <input type="text" name="namafb" class="form-control"
                                                    aria-describedby="emailHelp" placeholder="nama">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">link Instagram</label>
                                                <input type="text" nama="linkfb" class="form-control"
                                                    id="exampleInputPassword1" placeholder="link">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <div class="mb-0 collapsed" data-toggle="collapse" data-target="#collapse3"
                                        aria-expanded="false" aria-controls="collapse3"><i class="fa"
                                            aria-hidden="true"></i>
                                        <ion-icon size="small" name="logo-twitter"></ion-icon> Twitter
                                    </div>
                                </div>
                                <div id="collapse3" class="collapse" data-parent="#accordion-two">
                                    <div class="card-body">
                                        <form>
                                            <div class="form-group">
                                                <label>nama Twitter</label>
                                                <input type="text" name="namafb" class="form-control"
                                                    aria-describedby="emailHelp" placeholder="nama">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">link Twitter</label>
                                                <input type="text" nama="linkfb" class="form-control"
                                                    id="exampleInputPassword1" placeholder="link">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <div class="mb-0 collapsed" data-toggle="collapse" data-target="#collapse4"
                                        aria-expanded="false" aria-controls="collapse4"><i class="fa"
                                            aria-hidden="true"></i>
                                        <ion-icon size="small" name="mail-outline"></ion-icon> Email
                                    </div>
                                </div>
                                <div id="collapse4" class="collapse" data-parent="#accordion-two">
                                    <div class="card-body">
                                        <form>
                                            <div class="form-group">
                                                <label>nama email</label>
                                                <input type="text" name="namafb" class="form-control"
                                                    aria-describedby="emailHelp" placeholder="nama">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">link link</label>
                                                <input type="text" nama="linkfb" class="form-control"
                                                    id="exampleInputPassword1" placeholder="link">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Footer</div>
                        <form>
                            <div class="form-group">
                                <label>deskripsi rigkas</label>
                                <input type="text" name="namafb" class="form-control" aria-describedby="emailHelp"
                                    placeholder="nama">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">alamat produksi</label>
                                <input type="text" nama="linkfb" class="form-control" id="exampleInputPassword1"
                                    placeholder="link">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">alamat pemasaran</label>
                                <input type="text" nama="linkfb" class="form-control" id="exampleInputPassword1"
                                    placeholder="link">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
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
<script src="{{asset('Componentadmin/js/uploadimage.js')}}"></script>


{{-- //data tables --}}
{{-- <script src="{{asset('Componentadmin/plugins/tables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('Componentadmin/plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('Componentadmin/plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script> --}}
@endsection
