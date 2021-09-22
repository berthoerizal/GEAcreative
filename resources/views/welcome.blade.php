<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ $konfigurasi->namaweb }}</title>
    <meta content="{{ $konfigurasi->desc1 }}" name="description">
    <meta content="{{ $konfigurasi->keywords }}" name="keywords">
    <meta content="{{ $konfigurasi->author }}" name="author">

    <!-- Favicons -->
    <link href="{{ asset('assets/landingpage/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/landingpage/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    {{--
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
    --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/landingpage/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/landingpage/assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/landingpage/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/landingpage/assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/landingpage/assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}"
        rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/landingpage/assets/css/style.css') }}" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <h1 class="logo mr-auto"><a href="{{ route('home') }}"><img
                        src="{{ asset('assets/landingpage/assets/img/logo_header.png') }}" alt="img-logo"
                        class="img-fluid" />
                    {{ substr($konfigurasi->namaweb, -8) }}</a></h1>
            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="active"><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#portfolio">Gallery</a></li>
                    <li><a href="#price">Pricing</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav><!-- .nav-menu -->
        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1>Undangan Pernikahan Online</h1>
                    <p>{{ $konfigurasi->desc1 }}</p>
                    <div class="d-flex">
                        <a href="#services" class="btn-get-started scrollto">Get Started</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img">
                    <img src="{{ asset('assets/landingpage/assets/img/hero-img.png') }}" class="img-fluid animated"
                        alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Featured Services Section ======= -->
        <section id="services" class="featured-services">
            <div class="container">
                <div class="section-title">
                    <h2>Services</h2>
                </div>
                <div class="row">
                    <?php
                    $x = 1;
                    foreach ($layanan as $layanan) { ?>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="box">
                            <span>0<?php echo $x; ?></span>
                            <h4>{{ $layanan->nama_layanan }}</h4>
                            <p><?php echo html_entity_decode($layanan->keterangan); ?>
                            </p>
                        </div>
                    </div>
                    <?php $x++;}
                    ?>
                </div>
            </div>
            </div>
        </section><!-- End Featured Services Section -->

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <img src="{{ asset('assets/landingpage/assets/img/about.png') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 col-md-6 pt-4 pt-lg-0 content">
                        <?php echo html_entity_decode($konfigurasi->desc2); ?>
                    </div>
                </div>
            </div>
        </section><!-- End About Section -->

        <!-- ======= Services Section ======= -->
        <section id="" class="services section-bg">
            <div class="container">
                <div class="section-title">
                    <h2>Features</h2>
                </div>
                <div class="row">
                    @foreach ($detail as $detail)
                        <div class="col-lg-4 col-md-6 col-sm-6 d-flex align-items-stretch mt-3">
                            <div class="icon-box">
                                <div class="icon"><i class="bx bxl-dribbble"></i></div>
                                <h4><a href="">{{ $detail->keterangan }}</a></h4>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section><!-- End Services Section -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container">

                <div class="section-title">
                    <h2>Gallery</h2>
                </div>

                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            <li data-filter=".filter-web">Website</li>
                            <li data-filter=".filter-image">Gambar</li>
                            <li data-filter=".filter-video">Video</li>
                        </ul>
                    </div>
                </div>

                <div class="row portfolio-container">
                    @foreach ($galeri_website as $galeri_website)
                        <div class="col-lg-4 col-md-6 col-sm-6 portfolio-item filter-web">
                            <div class="work-box">
                                <a href="{{ asset('assets/images/' . $galeri_website->gambar) }}"
                                    data-gall="portfolioGallery" class="venobox">
                                    <div class="work-img">
                                        <img src="{{ asset('assets/images/' . $galeri_website->gambar) }}" alt=""
                                            class="img-fluid">
                                    </div>
                                </a>
                                <div class="work-content">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h2 class="w-title">{{ $galeri_website->judul }}</h2>
                                            <div class="w-more">
                                                <span class="w-ctegory">Undangan Website</span> / <span
                                                    class="w-date">{{ date('d F Y', strtotime($galeri_website->created_at)) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    @foreach ($galeri_gambar as $galeri_gambar)
                        <div class="col-lg-4 col-md-6 col-sm-6 portfolio-item filter-image">
                            <div class="work-box">
                                <a href="{{ asset('assets/images/' . $galeri_gambar->gambar) }}"
                                    data-gall="portfolioGallery" class="venobox">
                                    <div class="work-img">
                                        <img src="{{ asset('assets/images/' . $galeri_gambar->gambar) }}" alt=""
                                            class="img-fluid">
                                    </div>
                                </a>
                                <div class="work-content">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h2 class="w-title">{{ $galeri_gambar->judul }}</h2>
                                            <div class="w-more">
                                                <span class="w-ctegory">Undangan Gambar</span> / <span
                                                    class="w-date">{{ date('d F Y', strtotime($galeri_gambar->created_at)) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    @foreach ($galeri_video as $galeri_video)
                        <div class="col-lg-4 col-md-6 col-sm-6 portfolio-item filter-video">
                            <div class="work-box">
                                <a href="{{ asset('assets/images/' . $galeri_video->gambar) }}"
                                    data-gall="portfolioGallery" class="venobox">
                                    <div class="work-img">
                                        <div class="embed-responsive embed-responsive-1by1">
                                            <iframe src="https://www.youtube.com/embed/{{ $galeri_video->link_video }}"
                                                class="img-fluid" frameborder="0" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </a>
                                <div class="work-content">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h2 class="w-title">{{ $galeri_video->judul }}</h2>
                                            <div class="w-more">
                                                <span class="w-ctegory">Undangan Video</span> / <span
                                                    class="w-date">{{ date('d F Y', strtotime($galeri_video->created_at)) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </section>
        <!-- End Portfolio Section -->

        <!-- ======= Portfolio Section ======= -->
        <section id="price" class="pricing section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Pricing</h2>
                </div>

                <div class="row">
                    @foreach ($paket as $paket)
                        <div class="col-lg-3 col-md-3 col-sm-6">
                            <!--PRICE CONTENT START-->
                            <div class="generic_content active clearfix">
                                <!--HEAD PRICE DETAIL START-->
                                <div class="generic_head_price clearfix">
                                    <!--HEAD CONTENT START-->
                                    <div class="generic_head_content clearfix">
                                        <!--HEAD START-->
                                        <div class="head_bg"></div>
                                        <div class="head">
                                            <h6>{{ $paket->nama_paket }}</h6>
                                        </div>
                                        <!--//HEAD END-->
                                    </div>
                                    <!--//HEAD CONTENT END-->
                                    <!--PRICE START-->
                                    <div class="generic_price_tag clearfix">
                                        <span class="price">
                                            <h6 class="cent mt-3">
                                                Rp.{{ number_format($paket->total_bayar, 0, ',', '.') }}</h6>
                                        </span>
                                    </div>
                                    <!--//PRICE END-->
                                </div>
                                <!--//HEAD PRICE DETAIL END-->
                                <!--FEATURE LIST START-->
                                <div class="generic_feature_list">
                                    <?php echo html_entity_decode($paket->keterangan); ?>
                                </div>
                                <!--//FEATURE LIST END-->
                                <!--BUTTON START-->
                                <div class="generic_price_btn clearfix">
                                    <a class="btn-pilih" href="">Pesan</a>
                                </div>
                                <!--//BUTTON END-->
                            </div>
                            <!--//PRICE CONTENT END-->
                        </div>
                    @endforeach
                </div>
            </div>
        </section><!-- End Pricing Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="section-title">
                    <h2>Contact</h2>
                </div>

                <div class="row">
                    <div class="col-lg-7 col-md-5 d-flex align-items-stretch mb-2">
                        <div class="info">
                            <iframe src="{{ $konfigurasi->lokasi_googlemaps }}" frameborder="0"
                                style="border:0; width: 100%; height: 100%;" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-7 d-flex align-items-stretch mb-2">
                        <div class="info">
                            <div class="address">
                                <i class="icofont-google-map"></i>
                                <h4>Lokasi:</h4>
                                <p>{{ $konfigurasi->alamat }}</p>
                            </div>

                            <div class="email">
                                <i class="icofont-envelope"></i>
                                <h4>Email:</h4>
                                <p>{{ $konfigurasi->email }}</p>
                            </div>

                            <div class="phone">
                                <i class="icofont-phone"></i>
                                <h4>Nomor Hp:</h4>
                                <p>+62{{ $konfigurasi->nomor_hp }}</p>
                            </div>

                            <div class="phone">
                                <i class="bx bxl-instagram"></i>
                                <h4>Instagram: </h4>
                                <p><a href="{{ $konfigurasi->instagram }}">{{ $konfigurasi->namaweb }}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Contact Section -->
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container footer-bottom clearfix text-center">
            <div class="copyright">
                &copy; Copyright <strong><span>{{ $konfigurasi->namaweb }} | 2020</span></strong>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/landingpage/assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/landingpage/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/landingpage/assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/landingpage/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/landingpage/assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/landingpage/assets/vendor/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/landingpage/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/landingpage/assets/vendor/venobox/venobox.min.js') }}"></script>
    <script src="{{ asset('assets/landingpage/assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/landingpage/assets/js/main.js') }}"></script>

</body>

</html>
