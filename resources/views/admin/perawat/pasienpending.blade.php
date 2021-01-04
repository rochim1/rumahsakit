@extends('admin.index')
@section('title','master dokter')
@section('style')
<link
    href="{{asset('Componentadmin/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}"
    rel="stylesheet">
<link href="./plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
@endsection
@section('uper_script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endsection
@section('content')
<div id="dokter" class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">dokter</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h4>pasien pending</h4>
                    <table id="pasienpending" class="w-100 table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Nama</td>
                                <td>tujuan poli</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>
<script>
    let vue = new Vue({
        el: "#dokter",
        data: {
            id_dokter: '',
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

            foto: "{{asset('/images/index.png')}}",
        },
        methods: {
        }
    })

</script>
@endsection
@section('script')
{{-- model lama --}}
<script src="{{asset('Componentadmin/plugins/tables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('Componentadmin/plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('Componentadmin/plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script>
{{-- model lama --}}


{{-- <script src="{{asset('Componentadmin/plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.semanticui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script> --}}
@endsection
