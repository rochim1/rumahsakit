@extends('rumahsakit.index')
@section('title',"Layanan - Rs. Harapan Bersama")

@section('section')
{{-- <style>
    #list a {
        color : #57595c;
    }
</style> --}}
<!-- ***** Breadcumb Area Start ***** -->
<section class="breadcumb-area bg-img gradient-background-overlay"
    style="background-image: url({{asset('rs/img/bg-img/breadcumb2.jpg')}});">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcumb-content">
                    <h3 class="breadcumb-title">Layanan</h3>
                    <p>Rumah Sakit Harapan Bersama memiliki layanan yang unggul dan berkualitas. Kami juga memiliki
                        beberapa Penghargaan <a href="#">nasional</a> </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Breadcumb Area End ***** -->

<!-- ***** Services Area Start ***** -->
<div class="medilife-services-area section-padding-100-20">
    <div class="container">
        <div class="row">
            <!-- Single Service Area -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-service-area d-flex">
                    <div class="service-icon">
                        <i class="icon-doctor"></i>
                    </div>
                    <div class="service-content">
                        <h5>Rawat Jalan</h5>
                        <p>Kami menyediakan fasilias Rawat jalan Lengkap untuk memenuhi kebutuhan masyarakat</p>
                        <button type="button" class="btn btn-primary m-3" data-toggle="modal"
                            data-target="#exampleModal">
                            Lihat Daftar Poli
                        </button>

                        <!-- Modal -->
                        <div style="z-index: 99999" class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Daftar Klinik & Poli</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <ul class="list-group" id="list">
                                            <li class="list-group-item">
                                                <p><a href="#">Klinik Vaksin</a></p>
                                            </li>
                                            <li class="list-group-item">
                                                <p><a href="">Poli Akupuntur Medic</a></p>
                                            </li>
                                            <li class="list-group-item">
                                                <p><a href="">Poli Anak</a></p>
                                            </li>
                                            <li class="list-group-item">
                                                <p><a href="">Poli Bedah</a></p>
                                            </li>
                                            <li class="list-group-item">
                                                <p><a href="">Poli Gigi</a></p>
                                            </li>
                                            <li class="list-group-item">
                                                <p><a href="">Poli Gigi Anak</a></p>
                                            </li>
                                            <li class="list-group-item">
                                                <p><a href="">Poli Gizi</a></p>
                                            </li>
                                            <li class="list-group-item">
                                                <p><a href="">Poli Jantung</a></p>
                                            </li>
                                            <li class="list-group-item">
                                                <p><a href="">Poli Kandungan</a></p>
                                            </li>
                                            <li class="list-group-item">
                                                <p><a href="">Poli Kedokteran Olahraga</a></p>
                                            </li>
                                            <li class="list-group-item">
                                                <p><a href="">Poli Klinik Morula</a></p>
                                            </li>
                                            <li class="list-group-item">
                                                <p><a href="">Poli Klinik Kulit dan Kelamin</a></p>
                                            </li>
                                            <li class="list-group-item">
                                                <p><a href="">Poli Laktasi</a></p>
                                            </li>
                                            <li class="list-group-item">
                                                <p><a href="">Poli Mata</a></p>
                                            </li>
                                            <li class="list-group-item">
                                                <p><a href="">Poli Paru</a></p>
                                            </li>
                                            <li class="list-group-item">
                                                <p><a href="">Poli Penyakit Dalam</a></p>
                                            </li>
                                            <li class="list-group-item">
                                                <p><a href="">Poli Psikiater</a></p>
                                            </li>
                                            <li class="list-group-item">
                                                <p><a href="">Poli Psikologi</a></p>
                                            </li>
                                            <li class="list-group-item">
                                                <p><a href="">Poli Syaraf</a></p>
                                            </li>
                                            <li class="list-group-item">
                                                <p><a href="">Poli Telinga Hidung Tenggorokan</a></p>
                                            </li>
                                            <li class="list-group-item">
                                                <p><a href="">Poli Tumbuh Kembang</a></p>
                                            </li>
                                            <li class="list-group-item">
                                                <p><a href="">Poli Umum</a></p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Single Service Area -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-service-area d-flex">
                    <div class="service-icon">
                        <i class="icon-blood-donation-1"></i>
                    </div>
                    <div class="service-content">
                        <h5>Rawat Inap</h5>
                        <p>Layanan inap yang kami sediakan antara lain </p>
                        <button type="button" class="btn btn-primary m-3" data-toggle="modal" data-target="#exampleModal1">
                            Lihat Rawat Inap
                        </button>

                        <!-- Modal -->
                        <div style="z-index: 99999" class="modal fade" id="exampleModal1" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Rawat Inap</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <ul class="list-group m-3">
                                            <li class="list-group-item"><a href="">Ketersediaan Kamar</a></li>
                                            <li class="list-group-item"><a href="">Paket Persalinan</a></li>
                                            <li class="list-group-item"><a href="">Tipe Kamar Rawat Inap</a></li>
                                        </ul>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Single Service Area -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-service-area d-flex">
                    <div class="service-icon">
                        <i class="icon-helicopter"></i>
                    </div>
                    <div class="service-content">
                        <h5>Helicopters</h5>
                        <p>Lorem ipsum dolor sit amet, consecte tuer adipiscing elit, sed diam nonummy nibh euismod
                            tincidunt ut.</p>
                    </div>
                </div>
            </div>
            <!-- Single Service Area -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-service-area d-flex">
                    <div class="service-icon">
                        <i class="icon-flask"></i>
                    </div>
                    <div class="service-content">
                        <h5>Laboratory</h5>
                        <p>Dolor sit amet, consecte tuer elit, sed diam nonummy nibh euismod tincidunt ut ldolore magna.
                        </p>
                    </div>
                </div>
            </div>
            <!-- Single Service Area -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-service-area d-flex">
                    <div class="service-icon">
                        <i class="icon-emergency-call-1"></i>
                    </div>
                    <div class="service-content">
                        <h5>Emergency Room</h5>
                        <p>Dolor sit amet, consecte tuer elit, sed diam nonummy nibh euismod tincidunt ut ldolore magna.
                        </p>
                    </div>
                </div>
            </div>
            <!-- Single Service Area -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-service-area d-flex">
                    <div class="service-icon">
                        <i class="icon-blood-donation-2"></i>
                    </div>
                    <div class="service-content">
                        <h5>Cardiology</h5>
                        <p>Dolor sit amet, consecte tuer elit, sed diam nonummy nibh euismod tincidunt ut ldolore magna.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-service-area d-flex">
                    <div class="service-icon">
                        <i class="icon-blood-donation-2"></i>
                    </div>
                    <div class="service-content">
                        <h5>Konsultasii Online</h5>
                        <p>Dolor sit amet, consecte tuer elit, sed diam nonummy nibh euismod tincidunt ut ldolore magna.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-service-area d-flex">
                    <div class="service-icon">
                        <i class="icon-blood-donation-2"></i>
                    </div>
                    <div class="service-content">
                        <h5>Ambulan</h5>
                        <p>Dolor sit amet, consecte tuer elit, sed diam nonummy nibh euismod tincidunt ut ldolore magna.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-service-area d-flex">
                    <div class="service-icon">
                        <i class="icon-blood-donation-2"></i>
                    </div>
                    <div class="service-content">
                        <h5>Rontgen</h5>
                        <p>Dolor sit amet, consecte tuer elit, sed diam nonummy nibh euismod tincidunt ut ldolore magna.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Services Area End ***** -->

<div class="medilife-services-area clearfix">
    <!-- Single Services Area -->
    <div class="singleServiceArea equalize d-flex">
        <div class="singleServiceIcon">
            <i class="icon-hospital-4"></i>
        </div>
        <div class="singleServiceText">
            <h2>Kami Selalu Siap Melayani Anda</h2>
            <p>dengan pelayanan yang didukung oleh teknologi informasi yang modern membuat cara kerja yang biasa menjadi
                lebih efektif dan effisien, dengan feature daring pasien dapat mendaftarkan diri secara mandiri sehingga
                bisa direct melakukan tanya jawab dengan dokter kami, dapat mengatur janji dengan dokter tanpa harus
                antri dan mendapatkan layanan lebih cepat seperti ambulan,registrasi dll.</p>
        </div>
    </div>

    <!-- Single Services Area -->
    <div class="singleServiceArea equalize bg-img"
        style="background-image: url({{asset('rs/img/bg-img/about1.jpg')}});"></div>

    <!-- Single Services Area -->
    <div class="singleServiceArea equalize d-flex">
        <div class="singleServiceIcon">
            <i class="icon-clinic-history-2"></i>
        </div>
        <div class="singleServiceText">
            <h2>Semua Peralatan Adalah High Tech</h2>
            <p>kami berkomitmen untuk melayani sebaik mungkin oleh karena itu salah satunya kami menggunakan seluruh
                peralatan berstandar dan teknologi terkini sehingga tak diragukan untuk kemampuannya didukug oleh tenaga
                medis yang profesional siap menerima kepercayaan anda kepada kami</p>
        </div>
    </div>
</div>

<section class="medilife-benefits-area section-padding-100-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading">
                    <h2>We always put <br>our pacients first</h2>
                </div>
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-12 col-md-4">
                <div class="single-benefits-area mb-50 text-right">
                    <div class="single-benefits-title d-flex align-items-end row-reverse">
                        <i class="icon-teeth"></i>
                        <h5>Safe tests</h5>
                    </div>
                    <p>Ipsum dolor sit amet, consectetuer adipiscing eli. Lorem ipsum dolor sit amet, adip iscing.</p>
                </div>
                <div class="single-benefits-area mb-50 text-right">
                    <div class="single-benefits-title d-flex align-items-end row-reverse">
                        <i class="icon-hospital-bed-1"></i>
                        <h5>Online results</h5>
                    </div>
                    <p>Ipsum dolor sit amet, consectetuer adipiscing eli. Lorem ipsum dolor sit amet, adip iscing.</p>
                </div>
                <div class="single-benefits-area mb-50 text-right">
                    <div class="single-benefits-title d-flex align-items-end row-reverse">
                        <i class="icon-hospital-2"></i>
                        <h5>Imagistic tests</h5>
                    </div>
                    <p>Ipsum dolor sit amet, consectetuer adipiscing eli. Lorem ipsum dolor sit amet, adip iscing.</p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="single-benefits-thumb">
                    <img src="{{asset('rs/img/bg-img/benefits.png')}}" alt="">
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="single-benefits-area mb-50">
                    <div class="single-benefits-title d-flex align-items-end">
                        <i class="icon-flask-1"></i>
                        <h5>Safe tests</h5>
                    </div>
                    <p>Ipsum dolor sit amet, consectetuer adipiscing eli. Lorem ipsum dolor sit amet, adip iscing.</p>
                </div>
                <div class="single-benefits-area mb-50">
                    <div class="single-benefits-title d-flex align-items-end">
                        <i class="icon-smartphone-1"></i>
                        <h5>Online results</h5>
                    </div>
                    <p>Ipsum dolor sit amet, consectetuer adipiscing eli. Lorem ipsum dolor sit amet, adip iscing.</p>
                </div>
                <div class="single-benefits-area mb-50">
                    <div class="single-benefits-title d-flex align-items-end">
                        <i class="icon-nuclear"></i>
                        <h5>Imagistic tests</h5>
                    </div>
                    <p>Ipsum dolor sit amet, consectetuer adipiscing eli. Lorem ipsum dolor sit amet, adip iscing.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ***** CTA Area Start ***** -->
<div class="medilife-cta-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cta-content">
                    <i class="icon-smartphone"></i>
                    <h2>For Emergency calls</h2>
                    <h3>+12-823-611-8721</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** CTA Area End ***** -->
@endsection
