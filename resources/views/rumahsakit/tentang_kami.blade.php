@extends('rumahsakit.index')
@section('title',"tentang kami - Rs. Harapan Bersama")
@section('section')



    <!-- ***** Breadcumb Area Start ***** -->
    <section class="breadcumb-area bg-img gradient-background-overlay" style="background-image: url({{asset('rs/img/bg-img/breadcumb1.jpg')}});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h3 class="breadcumb-title">Tentang Kami</h3>
                        <p>Rumah Sakit Harapan Bersama dibangun pada tahun 2020 untuk memenuhi kebutuhan masyarakat akan kesehatan, rumah sakit ini didirikan dibawah yayasan al insan</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Breadcumb Area End ***** -->

    <!-- ***** Features Area Start ***** -->
    <div class="medilife-features-area section-padding-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6">
                    <div class="features-content">
                        <h2>Visi Misi</h2>
                        <p>Visi 
                            <br>
Menjadi rumah sakit yang memiliki loyalitas tinggi dan memiliki kualitas Prima terhadap pelayanan kesehatan
<br>
Misi
<br> 
Berkomitmen untuk mengoptimalkan kesehatan pelanggan dengan penuh kasih sayang dan rasa kekeluargaan
<br>
Motto
<br> 
Kesembuhan anda menjadi kepuasan kami</p>
                        <a href="#" class="btn medilife-btn mt-50">View the services <span>+</span></a>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="features-thumbnail">
                        <img src="img/bg-img/about1.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Features Area End ***** -->

    <!-- ***** Video Area Start ***** -->
    <section class="medilife-video-area section-padding-100 bg-overlay bg-img" style="background-image: url({{asset('rs/img/bg-img/video.jpg')}});">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-8">
                    <div class="video-box bg-overlay-black">
                        <img src="{{asset('rs/img/bg-img/video2.jpg')}}" alt="">
                        <div class="play-btn">
                            <a class="popup-video" href="http://www.youtube.com/watch?v=0O2aH4XLbto"><img src="{{asset('rs/img/core-img/play.png')}}" alt=""></a>
                            <h6>A day at Medilife-Video</h6>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="video-content">
                        <h2>Profil RS. Harapan Bersama -Video</h2>
                        <p>kami mengedepankan kepentingan pasien untuk memenuhi hak-haknya secara adil dalam layanan kesehatan di RS. Harapan Bersama dengan didukung oleh sistem yang modern  </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Video Area End ***** -->

    {{-- <!-- ***** Skilss Area Start ***** -->
    <section class="our-skills-area text-center section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3 col-lg-2">
                    <div class="single-pie-bar" data-percent="90">
                        <canvas class="bar-circle" width="100" height="100"></canvas>
                        <h5>Donations</h5>
                        <p>Dolor sit amet</p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 col-lg-2">
                    <div class="single-pie-bar" data-percent="65">
                        <canvas class="bar-circle" width="100" height="100"></canvas>
                        <h5>Ambition</h5>
                        <p>Dolor sit amet</p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 col-lg-2">
                    <div class="single-pie-bar" data-percent="25">
                        <canvas class="bar-circle" width="100" height="100"></canvas>
                        <h5>Good Luck</h5>
                        <p>Dolor sit amet</p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 col-lg-2">
                    <div class="single-pie-bar" data-percent="69">
                        <canvas class="bar-circle" width="100" height="100"></canvas>
                        <h5>High Tech</h5>
                        <p>Dolor sit amet</p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 col-lg-2">
                    <div class="single-pie-bar" data-percent="83">
                        <canvas class="bar-circle" width="100" height="100"></canvas>
                        <h5>Science</h5>
                        <p>Dolor sit amet</p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 col-lg-2">
                    <div class="single-pie-bar" data-percent="38">
                        <canvas class="bar-circle" width="100" height="100"></canvas>
                        <h5>Creativity</h5>
                        <p>Dolor sit amet</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Skills Area End ***** --> --}}

    <!-- ***** Tabs Area Start ***** -->
    <section class="medilife-tabs-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="medilife-tabs-content">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" id="institution-tab" data-toggle="tab" href="#institution" role="tab" aria-controls="institution" aria-selected="false">Institution</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="faq-tab" data-toggle="tab" href="#faq" role="tab" aria-controls="faq" aria-selected="false">FAQ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" id="specialities-tab" data-toggle="tab" href="#specialities" role="tab" aria-controls="specialities" aria-selected="true">Specialities</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="laboratory-tab" data-toggle="tab" href="#laboratory" role="tab" aria-controls="laboratory" aria-selected="false">Laboratory</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="emergencies-tab" data-toggle="tab" href="#emergencies" role="tab" aria-controls="emergencies" aria-selected="false">Emergencies</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="scolarship-tab" data-toggle="tab" href="#scolarship" role="tab" aria-controls="scolarship" aria-selected="false">Scolarship Programs</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade" id="institution" role="tabpanel" aria-labelledby="institution-tab">
                                <div class="medilife-tab-content d-md-flex align-items-center">
                                    <!-- Medilife Tab Text  -->
                                    <div class="medilife-tab-text">
                                        <h2>Take a look at this</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing eli. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing eli sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing eli.</p>
                                    </div>
                                    <!-- Medilife Tab Img  -->
                                    <div class="medilife-tab-img">
                                        <img src="img/bg-img/about1.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="faq" role="tabpanel" aria-labelledby="faq-tab">
                                <div class="medilife-tab-content d-md-flex align-items-center">
                                    <!-- Medilife Tab Text  -->
                                    <div class="medilife-tab-text">
                                        <h2>Take a look at this</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing eli. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing eli sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing eli.</p>
                                    </div>
                                    <!-- Medilife Tab Img  -->
                                    <div class="medilife-tab-img">
                                        <img src="img/bg-img/medical1.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="specialities" role="tabpanel" aria-labelledby="specialities-tab">
                                <div class="medilife-tab-content d-md-flex align-items-center">
                                    <!-- Medilife Tab Text  -->
                                    <div class="medilife-tab-text">
                                        <h2>Take a look at this</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing eli. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing eli sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing eli.</p>
                                    </div>
                                    <!-- Medilife Tab Img  -->
                                    <div class="medilife-tab-img">
                                        <img src="img/bg-img/tab.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="laboratory" role="tabpanel" aria-labelledby="laboratory-tab">
                                <div class="medilife-tab-content d-md-flex align-items-center">
                                    <!-- Medilife Tab Text  -->
                                    <div class="medilife-tab-text">
                                        <h2>Take a look at this</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing eli. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing eli sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing eli.</p>
                                    </div>
                                    <!-- Medilife Tab Img  -->
                                    <div class="medilife-tab-img">
                                        <img src="img/bg-img/medical1.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="emergencies" role="tabpanel" aria-labelledby="emergencies-tab">
                                <div class="medilife-tab-content d-md-flex align-items-center">
                                    <!-- Medilife Tab Text  -->
                                    <div class="medilife-tab-text">
                                        <h2>Take a look at this</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing eli. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing eli sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing eli.</p>
                                    </div>
                                    <!-- Medilife Tab Img  -->
                                    <div class="medilife-tab-img">
                                        <img src="img/bg-img/about1.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="scolarship" role="tabpanel" aria-labelledby="scolarship-tab">
                                <div class="medilife-tab-content d-md-flex align-items-center">
                                    <!-- Medilife Tab Text  -->
                                    <div class="medilife-tab-text">
                                        <h2>Take a look at this</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing eli. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing eli sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing eli.</p>
                                    </div>
                                    <!-- Medilife Tab Img  -->
                                    <div class="medilife-tab-img">
                                        <img src="img/bg-img/medical1.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Tabs Area End ***** -->
    @endsection
