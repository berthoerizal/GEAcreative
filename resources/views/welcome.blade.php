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
  <link href="{{asset('assets/landingpage/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/landingpage/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/landingpage/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/landingpage/assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/landingpage/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/landingpage/assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
  <link href="{{asset('assets/landingpage/assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/landingpage/assets/css/style.css')}}" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="index.html">{{ $konfigurasi->namaweb }}</a></h1>
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="{{ route('home') }}">Home</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#portfolio">Gallery</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#team">Team</a></li>
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
          <h2>{{$konfigurasi->desc1}}</h2>
          <div class="d-flex">
            <a href="#services" class="btn-get-started scrollto">Get Started</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img">
          <img src="{{asset('assets/landingpage/assets/img/hero-img.png')}}" class="img-fluid animated" alt="">
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
            @foreach ($layanan as $layanan)
                <div class="col-lg-4 col-md-6">
                <div class="icon-box">
                    <div class="icon"><i class="icofont-computer"></i></div>
                    <h4 class="title"><a href="">{{$layanan->nama_layanan}}</a></h4>
                    <p class="description"><?php echo html_entity_decode($layanan->keterangan); ?></p>
                </div>
                </div>
            @endforeach
          </div>
        </div>
      </div>
    </section><!-- End Featured Services Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <img src="{{asset('assets/landingpage/assets/img/about.png')}}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content">
            <?php echo html_entity_decode($konfigurasi->desc2); ?>
          </div>
        </div>
      </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="" class="services section-bg">
      <div class="container">
        <div class="row">
        @foreach ($detail as $detail)
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
            <div class="icon-box">
                <div class="icon"><i class="bx bxl-dribbble"></i></div>
                <h4><a href="">{{$detail->keterangan}}</a></h4>
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
              <li data-filter=".filter-app">Website</li>
              <li data-filter=".filter-web">Gambar</li>
              <li data-filter=".filter-card">Video</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">

          @foreach ($galeri_website as $galeri_website)
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="{{ asset('assets/images/'.$galeri_website->gambar) }}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>{{$galeri_website->judul}}</h4>
              <p>Undangan Website</p>
              <a href="{{ asset('assets/images/'.$galeri_website->gambar) }}" data-gall="portfolioGallery" class="venobox preview-link" title="{{$galeri_website->judul}}"><i class="bx bx-plus"></i></a>
              <a href="" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>
          @endforeach

          @foreach ($galeri_gambar as $galeri_gambar)
          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="{{ asset('assets/images/'.$galeri_gambar->gambar) }}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>{{$galeri_gambar->judul}}</h4>
              <p>Undangan Gambar</p>
              <a href="{{ asset('assets/images/'.$galeri_gambar->gambar) }}" data-gall="portfolioGallery" class="venobox preview-link" title="{{$galeri_gambar->judul}}"><i class="bx bx-plus"></i></a>
              <a href="" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>
          @endforeach

          @foreach ($galeri_video as $galeri_video)
          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="embed-responsive embed-responsive-1by1">
              <iframe src="https://www.youtube.com/embed/{{$galeri_video->link_video}}" class="img-fluid" frameborder="0" allowfullscreen></iframe>
            </div>
          </div>
          @endforeach

        </div>
      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Team</h2>
        </div>
        <div class="row">
          @foreach ($users as $users)
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              @if (!$users->gambar)
                <img src="{{ asset('assets/images/profiledefault.PNG') }}">
              @else
                <img src="{{ asset('assets/images/'.$users->gambar) }}" alt="">
              @endif
              <h4>{{$users->name}}</h4>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Lokasi:</h4>
                <p>{{$konfigurasi->alamat}}</p>
              </div>

              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p>{{$konfigurasi->email}}</p>
              </div>

              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>Nomor Hp:</h4>
                <p>+62{{$konfigurasi->nomor_hp}}</p>
              </div>

              <div class="phone">
                <i class="bx bxl-instagram"></i>
                <h4>Instagram: </h4>
                <p><a href="{{$konfigurasi->instagram}}">{{$konfigurasi->namaweb}}</a></p>
              </div>

            </div>
          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <iframe src="{{ $konfigurasi->lokasi_googlemaps }}" frameborder="0" style="border:0; width: 100%; height: 100%;" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </section><!-- End Contact Section -->
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container footer-bottom clearfix text-center">
      <div class="copyright">
        &copy; Copyright <strong><span>{{$konfigurasi->namaweb}} | 2020</span></strong>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/landingpage/assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('assets/landingpage/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/landingpage/assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('assets/landingpage/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('assets/landingpage/assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('assets/landingpage/assets/vendor/counterup/counterup.min.js')}}"></script>
  <script src="{{asset('assets/landingpage/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/landingpage/assets/vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{asset('assets/landingpage/assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/landingpage/assets/js/main.js')}}"></script>

</body>

</html>