    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="description" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!-- Title  -->
        <title>@yield('title')</title>

        <!-- Favicon  -->
    <link rel="icon" href="{{asset('images/logo/logo.png')}}">

        <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('rs/style.css')}}">

    </head>

    <body>
        <!-- Preloader -->
        <div id="preloader">
            <div class="medilife-load"></div>
        </div>

        <header class="header-area">
            <!-- Top Header Area -->
            <div class="top-header-area">
                <div class="container h-100">
                    <div class="row h-100">
                        <div class="col-12 h-100">
                            <div class="h-100 d-md-flex justify-content-between align-items-center">
                                <p>Selamat datang di <span>Rs. Harapan Bersama</span> melayani setulus hati</p>
                                <p>UGD 24jam , ICU <span>+082154441119</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Header Area -->
            <div class="main-header-area" id="stickyHeader">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12 h-100">
                            <div class="main-menu h-100">
                                <nav class="navbar h-100 navbar-expand-lg">
                                    <!-- Logo Area  -->
                                <a class="navbar-brand" href="index.html"><img width="50px" src="{{asset('images/logo/logo.png')}}"
                                            alt="Logo"></a>
                                            <span class="text-white">RS. Harapan Bersama</span>

                                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#medilifeMenu" aria-controls="medilifeMenu" aria-expanded="false"
                                        aria-label="Toggle navigation"><span
                                            class="navbar-toggler-icon"></span></button>

                                    <div class="collapse navbar-collapse" id="medilifeMenu">
                                        <!-- Menu Area -->
                                        
                                        <ul class="navbar-nav ml-auto">
                                        <li class="nav-item @if(request()->segment(count(request()->segments())) == 'harapanbersama')
                                            active
                                        @endif">
                                            <a class="nav-link" href="{{route('halamanutama')}}">Home <span
                                                        class="sr-only">(current)</span></a>
                                            </li>
                                            <li class="nav-item @if(request()->segment(count(request()->segments())) == 'tentangkami')
                                            active
                                        @endif">
                                            <a class="nav-link" href="{{route('tentangkami')}}">Tentang Kami <span
                                                        class="sr-only">(current)</span></a>
                                            </li>
                                            {{-- <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                                    role="button" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">tentang kami</a>
                                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                    <a class="dropdown-item" href="index.html">mengapa Rs. harapan bersama</a>
                                                    <a class="dropdown-item" href="about-us.html">Profil</a>
                                                    <a class="dropdown-item" href="about-us.html">Visi Misi</a>
                                                </div>
                                            </li> --}}
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{route('layanan')}}">layanan</a>
                                            </li>
                                            <li class="nav-item">
                                            <a class="nav-link" href="{{route('contact')}}">Kontak</a>
                                            </li>
                                            <li class="nav-item">
                                            <a class="nav-link" href="{{route('login')}}">Login</a>
                                            </li>
                                        </ul>
                                        <!-- Appointment Button -->
                                        <a href="#" class="btn medilife-appoint-btn ml-30">panggilan <span>darurat</span>
                                            klik disini</a>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>