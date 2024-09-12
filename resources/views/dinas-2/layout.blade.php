<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ $identitas->nama_website }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('foto_identitas/' . $identitas->favicon)}}" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ url('template/UpCons/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ url('template/UpCons/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ url('template/UpCons/assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ url('template/UpCons/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ url('template/UpCons/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ url('template/UpCons/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ url('template/UpCons/assets/css/main.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: UpConstruction - v1.3.0
  * Template URL: https://bootstrapmade.com/upconstruction-bootstrap-construction-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="{{ asset('logo/' . $logo->gambar) }}" alt="">
        <!-- <h1>UpConstruction<span>.</span></h1> -->
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul style="color:black;">
          <li><a href="{{ url('/')}}" class="active">Home</a></li>
          @foreach($menus as $menu)
          <li class="nav-item dropdown">
              <a class="dropdown-toggle nav-link" href="{{ $menu->link }}" id="navbarDropdown{{ $menu->id_menu }}" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration: none; color:black;">
                  {{ $menu->nama_menu }}
              </a>
              @if($menu->children->count() > 0)
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown{{ $menu->id_menu }}">
                  @foreach($menu->children as $child)
                  <li class="dropdown">
                      <a href="{{ $child->link }}" class="dropdown-item page-scroll dropdown-toggle" id="navbarDropdownChild{{ $child->id_menu }}" role="button" aria-expanded="false">
                          {{ $child->nama_menu }}
                      </a>
                      @if($child->children->count() > 0)
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdownChild{{ $child->id_menu }}">
                          @foreach($child->children as $subChild)
                          <li class="dropdown">
                              <a href="{{ $subChild->link }}" class="dropdown-item page-scroll dropdown-toggle" id="navbarDropdownSubChild{{ $subChild->id_menu }}" role="button" aria-expanded="false">
                                  <i class="fa fa-chevron-right justify-content-end"></i> {{ $subChild->nama_menu }}
                              </a>
                              @if($subChild->children->count() > 0)
                              <ul class="dropdown-menu" aria-labelledby="navbarDropdownSubChild{{ $subChild->id_menu }}">
                                  @foreach($subChild->children as $subSubChild)
                                  <li>
                                      <a href="{{ $subSubChild->link }}" class="dropdown-item page-scroll">
                                          {{ $subSubChild->nama_menu }}
                                      </a>
                                  </li>
                                  @endforeach
                              </ul>
                              @endif
                          </li>
                          @endforeach
                      </ul>
                      @endif
                  </li>
                  @endforeach
              </ul>
              @endif
          </li>
          @endforeach
          <li><a href="#contact" style="color:black;">Contact</a></li>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  @yield('content')

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-content position-relative">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3>{{ $identitas->nama_website }}</h3>
              <span class="phone">{{ $identitas->no_telp }}</span>
              <div class="text-white">
                {!! $alamat->alamat !!}
              </div>
              <div class="social-links d-flex mt-3">
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-twitter"></i></a>
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-facebook"></i></a>
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-instagram"></i></a>
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-youtube"></i></a>
              </div>
            </div>
          </div><!-- End footer info column-->
        </div>
      </div>
    </div>

    <div class="footer-legal text-center position-relative">
      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span>Pandai Digital</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/upconstruction-bootstrap-construction-website-template/ -->
        </div>
      </div>
    </div>

  </footer>
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ url('template/UpCons/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ url('template/UpCons/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ url('template/UpCons/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ url('template/UpCons/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ url('template/UpCons/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ url('template/UpCons/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ url('template/UpCons/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ url('template/UpCons/assets/js/main.js') }}"></script>

</body>

</html>