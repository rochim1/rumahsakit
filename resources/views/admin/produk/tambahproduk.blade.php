@extends('admin.index')
@section('title','admin-tambah produk')
@section('style')
<link href="{{asset('css/styleupload.css')}}" rel="stylesheet">
@endsection
@section('content')

<div class="content-body p-3">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Produk</h4>
                    <div class="basic-form">

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>nama produk</label>
                                <input type="text" name="nama_produk" class="form-control" placeholder="nama produk">
                            </div>
                            <div class="form-group col-md-6">
                                <label>jumlah</label>
                                <input type="number" name="jumlah" class="form-control" placeholder="jumlah stock">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>harga beli</label>
                                <input type="text" name="harga beli" class="form-control" placeholder="harga beli">
                            </div>
                            <div class="form-group col-md-6">
                                <label>harga jual</label>
                                <input type="text" name="harga jual" class="form-control" placeholder="harga jual">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>deskripsi</label>
                            <input type="text" class="form-control" placeholder="deskripsi produk">
                        </div>

                        <button type="submit" class="btn btn-dark">Sign in</button>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Foto Produk</h4>
                    <div class="basic-form">
                        <form id="file-upload-form" class="uploader">
                            <input id="file-upload" type="file" name="fileUpload" accept="image/*" />

                            <label for="file-upload" id="file-drag">
                                <img id="file-image" src="#" alt="Preview" class="hidden">
                                <div id="start">
                                    <i class="fa fa-download" aria-hidden="true"></i>
                                    <div>Select a file or drag here</div>
                                    <div id="notimage" class="hidden">Please select an image</div>
                                    <span id="file-upload-btn" class="btn btn-primary">Select a file</span>
                                </div>
                                <div id="response" class="hidden">
                                    <div id="messages"></div>
                                    <progress class="progress" id="file-progress" value="0">
                                        <span>0</span>%
                                    </progress>
                                </div>
                            </label>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('Componentadmin/js/uploadimage.js')}}"></script>
    @endsection
