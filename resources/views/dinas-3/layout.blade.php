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
    <title>dfhwey</title>

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

    <style>
        /* Navbar Styles */
        .navbar {
            background-color: #FFFFFF; /* Mengubah warna navbar menjadi putih */
            backdrop-filter: none; /* Nonaktifkan efek blur jika ada */
            -webkit-backdrop-filter: none; /* Nonaktifkan efek blur untuk Safari */
            border-bottom: 1px solid rgba(0, 0, 0, 0.1); /* Ubah border-bottom untuk kontras yang lebih lembut */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Kurangi bayangan untuk navbar putih */
        }
    
        .navbar-dark .navbar-nav .nav-link {
            color: rgba(0, 0, 0, 0.7); /* Ubah warna teks link menjadi hitam */
        }
    
        .navbar-dark .navbar-nav .nav-link:hover,
        .navbar-dark .navbar-nav .nav-link:focus {
            color: rgba(0, 0, 0, 0.9); /* Ubah warna teks link saat hover */
        }
    
        .navbar-dark .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='30' height='30' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(0, 0, 0, 0.5)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }
    
        .navbar-dark .navbar-toggler {
            border-color: rgba(0, 0, 0, 0.1); /* Ubah border-color untuk tombol toggler */
        }
    
        /* Sembunyikan semua submenu pada awalnya */
        .dropdown-menu.d-none {
            display: none;
        }
    
        /* Tampilkan submenu level 22 saat induk level 33 di-hover */
        .dropdown:hover > .dropdown-menu.d-none {
            display: block;
        }
    
        /* Tampilkan submenu level 11 saat induk level 22 di-hover */
        .dropdown-menu > .dropdown:hover > .dropdown-menu {
            display: block;
        }
    </style>
    
    
</head>

<body>

    <!-- Navigation -->
    <br>
    @yield('content')
    <nav class="navbar navbar-expand-lg fixed-top" style="background-color: #7695FF;">
        <div class="container">
    
            <!-- Image Logo -->
            <a href="#" class="navbar-brand logo-image"><img src="{{ asset('logo/' . $logo->gambar) }}" style="margin: auto; display: block;" /></a>
    
            <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="{{ url('/') }}" style="color: white;">HOME <span class="sr-only">(current)</span></a>
                    </li>
                    @foreach($menus as $menu)
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle nav-link" href="{{ $menu->link }}" id="navbarDropdown{{ $menu->id_menu }}" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
                                {{ $menu->nama_menu }}
                            </a>
                            @if($menu->children->count() > 0)
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown{{ $menu->id_menu }}">
                                @foreach($menu->children as $child)
                                <li class="dropdown">
                                    <a href="{{ $child->link }}" class="dropdown-item page-scroll" id="navbarDropdownChild{{ $child->id_menu }}" role="button" aria-expanded="false">
                                        {{ $child->nama_menu }}
                                    </a>
                                    @if($child->children->count() > 0)
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownChild{{ $child->id_menu }}">
                                        @foreach($child->children as $subChild)
                                        <li class="dropdown">
                                            <a href="{{ $subChild->link }}" class="dropdown-item page-scroll" id="navbarDropdownSubChild{{ $subChild->id_menu }}" role="button" aria-expanded="false">
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
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#hubungi" style="color: white;">HUBUNGI KAMI</a>
                    </li>
                </ul>
            </div> <!-- end of navbar-collapse -->
        </div> <!-- end of container -->
    </nav> <!-- end of navbar -->
    


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

    <script>
        
    </script>


    <script src="{{ url('template/revo/js/jquery.min.js') }}"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="{{ url('template/revo/js/bootstrap.min.js') }}"></script> <!-- Bootstrap framework -->
    <script src="{{ url('template/revo/js/jquery.easing.min.js') }}"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="{{ url('template/revo/js/swiper.min.js') }}"></script> <!-- Swiper for image and text sliders -->
    <script src="{{ url('template/revo/js/jquery.magnific-popup.js') }}"></script> <!-- Magnific Popup for lightboxes -->
    <script src="{{ url('template/revo/js/scripts.js') }}"></script> <!-- Custom scripts -->
</body>

</html>