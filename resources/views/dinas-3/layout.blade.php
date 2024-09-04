<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO Meta Tags -->
    <meta name="description" content="Description">
    <meta name="author" content="Author">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on Facebook, Twitter, LinkedIn -->
    <meta property="og:site_name" content="" /> <!-- website name -->
    <meta property="og:site" content="" /> <!-- website link -->
    <meta property="og:title" content="" /> <!-- title shown in the actual shared post -->
    <meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
    <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
    <meta name="twitter:card" content="summary_large_image"> <!-- to have large image post format in Twitter -->

    <!-- Webpage Title -->
    <title>{{ $identitas->nama_website }}</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <link href="{{ url('template/revo/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('template/revo/css/fontawesome-all.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('template/revo/css/swiper.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('template/revo/css/magnific-popup.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('template/revo/css/styles.css') }}" rel="stylesheet" type="text/css">
    <!-- <link href="{{ url('assets/css/bootstrap/bootstrap.min.css') }}" rel="stylesheet" type="text/css"> -->

    <!-- Favicon  -->
    <link rel="icon" href="{{ asset('foto_identitas/' . $identitas->favicon)}}" type="image/x-icon">
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark"> <!-- Menambahkan padding untuk memperbesar ukuran navbar -->
        <div class="container">

            <!-- Text Logo - Use this if you don't have a graphic logo -->
            <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Revo</a> -->

            <!-- Image Logo -->
            <a href="#" class="navbar-brand logo-image"><img src="{{ asset('logo/' . $logo->gambar) }}" class="d-flex" style="margin: auto; display: block;" /></a>

            <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#header">HOME <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#registration">TRIAL</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#features">FEATURES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#details">DETAILS</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">DROP</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item page-scroll" href="article.html">ARTICLE DETAILS</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item page-scroll" href="terms.html">TERMS CONDITIONS</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item page-scroll" href="privacy.html">PRIVACY POLICY</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#purchase">PURCHASE</a>
                    </li>
                </ul>
                <span class="nav-item social-icons">
                    <span class="fa-stack">
                        <a href="#your-link">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-facebook-f fa-stack-1x"></i>
                        </a>
                    </span>
                    <span class="fa-stack">
                        <a href="#your-link">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-twitter fa-stack-1x"></i>
                        </a>
                    </span>
                </span>
            </div> <!-- end of navbar-collapse -->
        </div> <!-- end of container -->
    </nav> <!-- end of navbar -->

    @yield('content')

    <!-- Footer -->
    <div class="footer ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-col first">
                        <h6>Location</h6>
                        <iframe width="100%" height="305" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="{{ $identitas->maps }}"></iframe>
                    </div> <!-- end of footer-col -->
                    <div class="footer-col second">
                        <h6>Links</h6>
                        <div class="fb-page" data-href="https://www.facebook.com/dppkbkarawang/" data-tabs="timeline" data-width="300" data-height="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                            <blockquote cite="https://www.facebook.com/dppkbkarawang/" class="fb-xfbml-parse-ignore">
                                <a href="https://www.facebook.com/dppkbkarawang/">DPPKB Karawang</a>
                            </blockquote>
                        </div>
                    </div> <!-- end of footer-col -->
                    <div class="footer-col third">
                        <h6 class="text-left">Links</h6>
                        <span class="phone">{{ $identitas->no_telp }}</span>
                        <div class="text-white">
                            {!! $alamat->alamat !!}
                        </div>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-facebook-f fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-twitter fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-youtube fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-instagram fa-stack-1x"></i>
                            </a>
                        </span>
                    </div>
                </div>
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of footer -->

    <div class="copyright ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="p-small">Copyright © {{ date('Y') }} Powered GMT Company</p>
                </div>
                <!-- end of col -->
            </div> <!-- enf of row -->
        </div> <!-- end of container -->
    </div>


    <!-- Scripts -->


    <script src="{{ url('template/revo/js/jquery.min.js') }}"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="{{ url('template/revo/js/bootstrap.min.js') }}"></script> <!-- Bootstrap framework -->
    <script src="{{ url('template/revo/js/jquery.easing.min.js') }}"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="{{ url('template/revo/js/swiper.min.js') }}"></script> <!-- Swiper for image and text sliders -->
    <script src="{{ url('template/revo/js/jquery.magnific-popup.js') }}"></script> <!-- Magnific Popup for lightboxes -->
    <script src="{{ url('template/revo/js/scripts.js') }}"></script> <!-- Custom scripts -->
</body>

</html>