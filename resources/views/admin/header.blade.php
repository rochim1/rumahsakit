<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Favicon icon -->
    {{-- <link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/flaticon/flaticon.css')}}"> --}}
    {{-- <link rel="stylesheet" href="{{asset('css/icomoon.css')}}"> --}}
    <link rel="icon" type="Componentadmin/image/png" sizes="16x16" href="Componentadmin/images/favicon.png">
    <!-- Pignose Calender -->
    <link href="{{asset('Componentadmin/plugins/pg-calendar/css/pignose.calendar.min.css')}}" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="{{asset('Componentadmin/plugins/chartist/css/chartist.min.css')}}">
    <link rel="stylesheet"
        href="{{asset('Componentadmin/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css')}}">
    <!-- Custom Stylesheet -->
    <link href="{{asset('Componentadmin/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    {{-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.semanticui.min.css"> --}}
    <style>
        body, .form-control,input {
            /* color: black; */
            color: #212121;
        }
        .swal-text{
            text-align: center;
        }
        button, .btn{
            color: white;
        }
    </style>
    @yield('style')
    @yield('uper_script')
    <script src="{{asset('js/vue.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="{{route('admin')}}">
                    <b class="logo-abbr"><img src="Componentadmin/images/logo.png" alt=""> </b>
                    <span class="logo-compact"><img src="Componentadmin/images/logo-compact.png" alt=""></span>
                    <span class="brand-title text-white">
                        RS. Harapan Bersama
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content clearfix">

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    <div class="input-group icons">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i
                                    class="mdi mdi-magnify"></i></span>
                        </div>
                        <input type="search" class="form-control" placeholder="Search Dashboard"
                            aria-label="Search Dashboard">
                        <div class="drop-down animated flipInX d-md-none">
                            <form action="#">
                                <input type="text" class="form-control" placeholder="Search">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="header-right">

                    <ul class="clearfix">
                        <li class="icons dropdown">
                            <a href="javascript:void(0)" data-toggle="dropdown">
                                <i class="mdi mdi-email-outline"></i>
                                <span class="badge badge-pill gradient-1">3</span>
                            </a>
                            <div class="drop-down animated fadeIn dropdown-menu">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    <span class="">3 New Messages</span>
                                    <a href="javascript:void()" class="d-inline-block">
                                        <span class="badge badge-pill gradient-1">3</span>
                                    </a>
                                </div>
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li class="notification-unread">
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img"
                                                    src="Componentadmin/images/avatar/1.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Saiful Islam</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="notification-unread">
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img"
                                                    src="Componentadmin/images/avatar/2.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Adam Smith</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Can you do me a favour?</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img"
                                                    src="Componentadmin/images/avatar/3.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Barak Obama</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img"
                                                    src="Componentadmin/images/avatar/4.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Hilari Clinton</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Hello</div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </li>
                        <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                                <i class="mdi mdi-bell-outline"></i>
                                <span class="badge badge-pill gradient-2">3</span>
                            </a>
                            <div class="drop-down animated fadeIn dropdown-menu dropdown-notfication">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    <span class="">2 New Notifications</span>
                                    <a href="javascript:void()" class="d-inline-block">
                                        <span class="badge badge-pill gradient-2">5</span>
                                    </a>
                                </div>
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-success-lighten-2"><i
                                                        class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Events near you</h6>
                                                    <span class="notification-text">Within next 5 days</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-danger-lighten-2"><i
                                                        class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Event Started</h6>
                                                    <span class="notification-text">One hour ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-success-lighten-2"><i
                                                        class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Event Ended Successfully</h6>
                                                    <span class="notification-text">One hour ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-danger-lighten-2"><i
                                                        class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Events to Join</h6>
                                                    <span class="notification-text">After two days</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </li>
                        <li class="icons dropdown d-none d-md-flex">
                            {{Session()->get('credential')[0]['nama']}}

                            <div class="drop-down dropdown-language animated fadeIn  dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li><a href="javascript:void()">English</a></li>
                                        <li><a href="javascript:void()">Dutch</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="Componentadmin/images/user/1.png" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="app-profile.html"><i class="icon-user"></i>
                                                <span>Profile</span></a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <i class="icon-envelope-open"></i> <span>Inbox</span>
                                                <div class="badge gradient-3 badge-pill gradient-1">3</div>
                                            </a>
                                        </li>

                                        <hr class="my-2">
                                        <li>
                                            <a href="page-lock.html"><i class="icon-lock"></i> <span>Lock
                                                    Screen</span></a>
                                        </li>
                                        <li><a href="{{route('logoutadmin')}}"><i class="icon-key"></i>
                                                <span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Dashboard</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{url('/admin')}}">Home 1</a></li>
                        </ul>
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Konten Website</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('landingpage')}}">Quick Setup</a></li>
                            <li><a href="{{route('header')}}">header</a></li>
                            <li><a href="{{route('content')}}">content</a></li>
                            <li><a href="{{route('footer')}}">footer</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">Apps</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-envelope menu-icon"></i> <span class="nav-text">Email</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./email-inbox.html">Inbox</a></li>
                            <li><a href="./email-read.html">Read</a></li>
                            <li><a href="./email-compose.html">Compose</a></li>
                        </ul>
                    </li>

                    <li class="nav-label">Services</li>

                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <span class="iconify " data-icon="medical-icon:i-inpatient" data-inline="false"> </span>
                            <span class="nav-text">Pasien</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('masterpasien')}}">master pasien</a></li>
                            <li><a href="{{route('regpasien')}}">registrasi pasien</a></li>
                            <li><a href="#">appointment pasien</a></li>
                            <li><a href="{{route('pasienterhapus')}}">deleted pasien</a></li>
                            <li><a href="{{route('attr_pasien')}}">attribut pasien</a></li>
                        </ul>
                    </li>

                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <span class="iconify" data-icon="maki:doctor-15" data-inline="false"></span> <span
                                class="nav-text">Dokter</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('masterdokter')}}">Master Dokter</a></li>
                            <li><a href="{{route('tambahdokter')}}">tambah dokter</a></li>
                            <li><a href="{{route('jadwaldokter')}}">jadwal dokter</a></li>
                        </ul>
                    </li>

                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <span class="iconify" data-icon="bx:bxs-report" data-inline="false"></span> <span
                                class="nav-text">Data Rekam Medis</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('AllUsers')}}">seluruh pengguna</a></li>
                            <li><a href="{{route('konsumen')}}">Konsumen</a></li>
                            <li><a href="{{route('tampiladmin')}}">Admin</a></li>
                        </ul>
                    </li>

                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <span class="iconify" data-icon="bx:bxs-report" data-inline="false"></span> <span
                                class="nav-text">Kamar</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('kamar')}}">master kamar</a></li>
                            <li><a href="{{route('tambah_kamar')}}">tambah kamar</a></li>
                            <li><a href="{{route('tampiladmin')}}">Admin</a></li>
                        </ul>
                    </li>

                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <span class="iconify" data-icon="gg:pill" data-inline="false"></span> <span
                                class="nav-text">Obat dan Tindakan</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('obat')}}">master obat</a></li>
                            <li><a href="{{route('tambah_obat')}}">tambah obat</a></li>
                            <li><a href="{{route('tambah_tindakan')}}">tambah tindakan</a></li>
                        </ul>
                    </li>

                    {{-- <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-user menu-icon"></i> <span class="nav-text">Registrasi dan Pelayanan</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('AllUsers')}}">seluruh pengguna</a></li>
                    <li><a href="{{route('konsumen')}}">Konsumen</a></li>
                    <li><a href="{{route('tampiladmin')}}">Admin</a></li>
                </ul>
                </li> --}}

                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <span class="iconify" data-icon="cil:hospital" data-inline="false"></span> <span
                            class="nav-text">Rawat Inap</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('AllUsers')}}">seluruh pengguna</a></li>
                        <li><a href="{{route('konsumen')}}">Konsumen</a></li>
                        <li><a href="{{route('tampiladmin')}}">Admin</a></li>
                    </ul>
                </li>

                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <span class="iconify" data-icon="bx:bx-plus-medical" data-inline="false"></span>
                        <span class="nav-text">Poli</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('AllUsers')}}">master poli</a></li>
                    </ul>
                </li>

                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <span class="iconify" data-icon="medical-icon:i-care-staff-area" data-inline="false"></span>
                        <span class="nav-text">Pegawai</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('AllUsers')}}">pegawai medis</a></li>
                        <li><a href="{{route('konsumen')}}">pegawai non-medis</a></li>
                        <li><a href="{{route('tampiladmin')}}">Admin</a></li>
                    </ul>
                </li>

                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <span class="iconify" data-icon="medical-icon:i-care-staff-area" data-inline="false"></span>
                        <span class="nav-text">Suplier</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('AllUsers')}}">pegawai medis</a></li>
                        <li><a href="{{route('konsumen')}}">pegawai non-medis</a></li>
                        <li><a href="{{route('tampiladmin')}}">Admin</a></li>
                    </ul>
                </li>

                <li class="nav-label">Others</li>

                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="menu-icon icon-bag"></i> <span class="nav-text">Permintaan Barang</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('listproduk')}}">list Produk</a></li>
                        <li><a href="{{route('tambahproduk')}}">Tambah Produk</a></li>
                        <li><a href="{{route('produkjunk')}}">trash</a></li>
                    </ul>
                </li>

                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="menu-icon icon-bag"></i> <span class="nav-text">Attribute</span>
                    </a>
                    <ul aria-expanded="false">
                         <li><a href="{{route('spesialis')}}">Spesialis dan Jabatan</a></li>
                        <li><a href="{{route('tambahproduk')}}">Tambah Produk</a></li>
                        <li><a href="{{route('produkjunk')}}">trash</a></li>
                    </ul>
                </li>

                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-settings menu-icon"></i> <span class="nav-text">Pegaturan</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('AllUsers')}}">maintenace mode</a></li>
                        <li><a href="{{route('konsumen')}}">Konsumen</a></li>
                        <li><a href="{{route('tampiladmin')}}">Admin</a></li>
                        <li>
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Bahasa
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Indonesia</a>
                                <a class="dropdown-item" href="#">English</a>
                            </div>
                        </li>
                    </ul>
                </li>

                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
