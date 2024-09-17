<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Welcome Administrator-</title>
  <link rel="icon" href="{{ asset('foto_identitas/Website DPPKB Karawang 2_JUgtyyIC4x6eZLRfKWazW.png')}}" type="image/x-icon">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <link rel="stylesheet" href="{{ url('assets/css/sweetalert2.min.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ url('assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ url('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ url('assets/css/argon.css') }}" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">

  <!-- Flatpickr CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>

<!-- Flatpickr JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


</head>

<body>
    <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header d-flex align-items-center">
                <a class="navbar-brand" href="{{ url('administrator/dashboard') }}">
                    Administrator
                </a>
                <div class="ml-auto">
                    <!-- Sidenav toggler -->
                    <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin"
                        data-target="#sidenav-main">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ url('dashboard') }}">
                                <i class="ni ni-shop text-primary"></i>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#menu-utama" data-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="menu-utama">
                                <i class="ni ni-ungroup text-orange"></i>
                                <span class="nav-link-text">Menu Utama</span>
                            </a>
                            <div class="collapse" id="menu-utama">
                                <ul class="nav nav-sm flex-column">
                                    {{-- <li class="nav-item">
                                        <a href="{{ url('administrator/identitaswebsite') }}" class="nav-link">Identitas Website</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('administrator/menuwebsite') }}" class="nav-link">Menu Website</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('administrator/halamanbaru') }}" class="nav-link">Halaman Baru</a>
                                    </li> --}}
                                    {{-- @php
                                        $UserModul = new \App\Models\UserModul;
                                        $cek = $UserModul->umenu_akses("identitaswebsite", session('id_session'));
                                    @endphp
                                    @if($cek == 1 || session('level') == 'admin')
                                        <li><a href="{{ url('administrator/identitaswebsite') }}"><i class='fa fa-circle-o'></i> Identitas Website</a></li>
                                    @endif
                                    @php
                                        $UserModul = new \App\Models\UserModul;
                                        $cek = $UserModul->umenu_akses("menuwebsite", session('id_session'));
                                    @endphp
                                    @if($cek == 1 || session('level') == 'admin')
                                        <li><a href="{{ url('administrator/menuwebsite') }}"><i class='fa fa-circle-o'></i> Menu Website</a></li>
                                    @endif
                                    @php
                                        $UserModul = new \App\Models\UserModul;
                                        $cek = $UserModul->umenu_akses("halamanbaru", session('id_session'));
                                    @endphp
                                    @if($cek == 1 || session('level') == 'admin')
                                        <li><a href="{{ url('administrator/halamanbaru') }}"><i class='fa fa-circle-o'></i> Halaman Baru</a></li>
                                    @endif --}}

                                    @php
                                        $UserModul = new \App\Models\UserModul;
                                        $cekIdentitaswebsite = $UserModul->umenu_akses("identitaswebsite", session('id_session'));
                                        $cekMenuwebsite = $UserModul->umenu_akses("menuwebsite", session('id_session'));
                                        $cekHalamanbaru = $UserModul->umenu_akses("halamanbaru", session('id_session'));
                                    @endphp

                                    @if($cekIdentitaswebsite == 1 || session('level') == 'admin' || session('level') == 'user' || session('level') == 'kontributor')
                                        <li class="nav-item"><a class="nav-link" href="{{ url('administrator/identitaswebsite') }}"><i class='ni ni-diamond text-blue'></i> Identitas Website</a></li>
                                    @endif
                                    @if($cekMenuwebsite == 1 || session('level') == 'admin' || session('level') == 'user' || session('level') == 'kontributor')
                                        <li class="nav-item"><a class="nav-link" href="{{ url('administrator/menuwebsite') }}"><i class='ni ni-bullet-list-67 text-orange'></i> Menu Website</a></li>
                                    @endif
                                    @if($cekHalamanbaru == 1 || session('level') == 'admin' || session('level') == 'user' || session('level') == 'kontributor')
                                        <li class="nav-item"><a class="nav-link" href="{{ url('administrator/halamanbaru') }}"><i class='ni ni-book-bookmark text-purple'></i> Halaman Baru</a></li>
                                    @endif

                                </ul>
                            </div>
                            {{-- <div class="collapse" id="menu-utama">
                                <ul class="nav nav-sm flex-column">
                                    @if(Auth::user()->hasAccessTo('identitaswebsite'))
                                        <li class="nav-item">
                                            <a href="{{ url('administrator/identitaswebsite') }}" class="nav-link">
                                                <i class="ni ni-world text-orange"></i> Identitas Website
                                            </a>
                                        </li>
                                    @endif

                                    @if(Auth::user()->hasAccessTo('menuwebsite'))
                                        <li class="nav-item">
                                            <a href="{{ url('administrator/menuwebsite') }}" class="nav-link">
                                                <i class="ni ni-compass-04 text-orange"></i> Menu Website
                                            </a>
                                        </li>
                                    @endif

                                    @if(Auth::user()->hasAccessTo('halamanbaru'))
                                        <li class="nav-item">
                                            <a href="{{ url('administrator/halamanbaru') }}" class="nav-link">
                                                <i class="ni ni-fat-add text-orange"></i> Halaman Baru
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div> --}}
                        </li>
                        @php
                            $UserModul = new \App\Models\UserModul;
                            $hasAccess = false;

                            $cekBerita = $UserModul->umenu_akses("berita", session('id_session'));
                            $cekKategoriBerita = $UserModul->umenu_akses("kategoriberita", session('id_session'));
                            $cekTagBerita = $UserModul->umenu_akses("tagberita", session('id_session'));

                            if ($cekBerita == 1 || $cekKategoriBerita == 1 || $cekTagBerita == 1 || session('level') == 'admin' || session('level') == 'user' || session('level') == 'kontributor') {
                                $hasAccess = true;
                            }
                        @endphp

                        @if($hasAccess)
                            <li class="nav-item">
                                <a class="nav-link" href="#modul-berita" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="modul-berita">
                                    <i class="ni ni-ungroup text-orange"></i>
                                    <span class="nav-link-text">Modul Berita</span>
                                </a>
                                <div class="collapse" id="modul-berita">
                                    <ul class="nav nav-sm flex-column">
                                        @if($cekBerita == 1 || session('level') == 'admin' || session('level') == 'user' || session('level') == 'kontributor')
                                            <li class="nav-item"><a class="nav-link" href="{{ url('administrator/berita') }}"><i class='ni ni-paper-diploma text-blue'></i> Berita</a></li>
                                        @endif
                                        @if($cekKategoriBerita == 1 || session('level') == 'admin' || session('level') == 'user' || session('level') == 'kontributor')
                                            <li class="nav-item"><a class="nav-link" href="{{ url('administrator/kategoriberita') }}"><i class='ni ni-box-2 text-orange'></i> Kategori Berita</a></li>
                                        @endif
                                        @if($cekTagBerita == 1 || session('level') == 'admin' || session('level') == 'user' || session('level') == 'kontributor')
                                            <li class="nav-item"><a class="nav-link" href="{{ url('administrator/tagberita') }}"><i class='ni ni-ruler-pencil text-purple'></i> Tag Berita</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </li>
                        @endif

                        <li class="nav-item">
                            <a class="nav-link" href="#modul-video" data-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="modul-video">
                                <i class="ni ni-ui-04 text-info"></i>
                                <span class="nav-link-text">Modul Video</span>
                            </a>
                            <div class="collapse" id="modul-video">
                                <ul class="nav nav-sm flex-column">
                                    {{-- <li class="nav-item">
                                        <a href="{{ url('administrator/playlistvideo') }}"
                                            class="nav-link">Playlist Video</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('administrator/video') }}"
                                            class="nav-link">Video</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('administrator/tagvideo') }}"
                                            class="nav-link">Tag Video</a>
                                    </li> --}}
                                    {{-- @php
                                        $UserModul = new \App\Models\UserModul;
                                        $cek = $UserModul->umenu_akses("playlistvideo", session('id_session'));
                                    @endphp
                                    @if($cek == 1 || session('level') == 'admin')
                                        <li><a href="{{ url('administrator/playlistvideo') }}"><i class='fa fa-circle-o'></i> Playlist Video</a></li>
                                    @endif
                                    @php
                                        $UserModul = new \App\Models\UserModul;
                                        $cek = $UserModul->umenu_akses("video", session('id_session'));
                                    @endphp
                                    @if($cek == 1 || session('level') == 'admin')
                                        <li><a href="{{ url('administrator/video') }}"><i class='fa fa-circle-o'></i> Video</a></li>
                                    @endif
                                    @php
                                        $UserModul = new \App\Models\UserModul;
                                        $cek = $UserModul->umenu_akses("tagvideo", session('id_session'));
                                    @endphp
                                    @if($cek == 1 || session('level') == 'admin')
                                        <li><a href="{{ url('administrator/tagvideo') }}"><i class='fa fa-circle-o'></i> Tag Video</a></li>
                                    @endif --}}

                                    @php
                                        $UserModul = new \App\Models\UserModul;
                                        $cekPlaylistvideo = $UserModul->umenu_akses("playlistvideo", session('id_session'));
                                        $cekVideo = $UserModul->umenu_akses("video", session('id_session'));
                                        $cekTagvideo = $UserModul->umenu_akses("tagvideo", session('id_session'));
                                    @endphp

                                    @if($cekPlaylistvideo == 1 || session('level') == 'admin' || session('level') == 'user' || session('level') == 'kontributor')
                                        <li class="nav-item"><a class="nav-link" href="{{ url('administrator/playlistvideo') }}"><i class='ni ni-folder-17 text-blue'></i> Playlist Video</a></li>
                                    @endif
                                    @if($cekVideo == 1 || session('level') == 'admin' || session('level') == 'user' || session('level') == 'kontributor')
                                        <li class="nav-item"><a class="nav-link" href="{{ url('administrator/video') }}"><i class='ni ni-camera-compact text-orange'></i> Video</a></li>
                                    @endif
                                    @if($cekTagvideo == 1 || session('level') == 'admin' || session('level') == 'user' || session('level') == 'kontributor')
                                        <li class="nav-item"><a class="nav-link" href="{{ url('administrator/tagvideo') }}"><i class='ni ni-tag text-purple'></i> Tag Video</a></li>
                                    @endif
                                </ul>
                            </div>
                            {{-- <div class="collapse" id="modul-video">
                                <ul class="nav nav-sm flex-column">
                                    @if(Auth::user()->hasAccessTo('playlistvideo'))
                                        <li class="nav-item">
                                            <a href="{{ url('administrator/playlistvideo') }}" class="nav-link">
                                                <i class="ni ni-world text-orange"></i> Playlist Video
                                            </a>
                                        </li>
                                    @endif

                                    @if(Auth::user()->hasAccessTo('video'))
                                        <li class="nav-item">
                                            <a href="{{ url('administrator/video') }}" class="nav-link">
                                                <i class="ni ni-compass-04 text-orange"></i> Video
                                            </a>
                                        </li>
                                    @endif

                                    @if(Auth::user()->hasAccessTo('tagvideo'))
                                        <li class="nav-item">
                                            <a href="{{ url('administrator/tagvideo') }}" class="nav-link">
                                                <i class="ni ni-fat-add text-orange"></i> Tag Video
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div> --}}
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#modul-banner" data-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="modul-banner">
                                <i class="ni ni-single-copy-04 text-pink"></i>
                                <span class="nav-link-text">Modul Banner</span>
                            </a>
                            <div class="collapse" id="modul-banner">
                                <ul class="nav nav-sm flex-column">
                                    {{-- <li class="nav-item">
                                        <a href="{{ url('administrator/bannerslider') }}"
                                            class="nav-link">Banner Slider</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('administrator/bannerhome') }}"
                                            class="nav-link">Banner Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('administrator/iklansidebar') }}"
                                            class="nav-link">Iklan Sidebar</a>
                                    </li> --}}
                                    {{-- @php
                                        $UserModul = new \App\Models\UserModul;
                                        $cek = $UserModul->umenu_akses("bannerslider", session('id_session'));
                                    @endphp
                                    @if($cek == 1 || session('level') == 'admin')
                                        <li><a href="{{ url('administrator/bannerslider') }}"><i class='fa fa-circle-o'></i> Banner Slider</a></li>
                                    @endif
                                    @php
                                        $UserModul = new \App\Models\UserModul;
                                        $cek = $UserModul->umenu_akses("bannerhome", session('id_session'));
                                    @endphp
                                    @if($cek == 1 || session('level') == 'admin')
                                        <li><a href="{{ url('administrator/bannerhome') }}"><i class='fa fa-circle-o'></i> Banner Home</a></li>
                                    @endif
                                    @php
                                        $UserModul = new \App\Models\UserModul;
                                        $cek = $UserModul->umenu_akses("iklansidebar", session('id_session'));
                                    @endphp
                                    @if($cek == 1 || session('level') == 'admin')
                                        <li><a href="{{ url('administrator/iklansidebar') }}"><i class='fa fa-circle-o'></i> Iklan Sidebar</a></li>
                                    @endif --}}

                                    @php
                                        $UserModul = new \App\Models\UserModul;
                                        $cekBannerslider = $UserModul->umenu_akses("bannerslider", session('id_session'));
                                        $cekBannerhome = $UserModul->umenu_akses("bannerhome", session('id_session'));
                                        $cekIklansidebar = $UserModul->umenu_akses("iklansidebar", session('id_session'));
                                    @endphp

                                    @if($cekBannerslider == 1 || session('level') == 'admin' || session('level') == 'user' || session('level') == 'kontributor')
                                        <li class="nav-item"><a class="nav-link" href="{{ url('administrator/bannerslider') }}"><i class='ni ni-image text-blue'></i> Banner Slider</a></li>
                                    @endif
                                    @if($cekBannerhome == 1 || session('level') == 'admin' || session('level') == 'user' || session('level') == 'kontributor')
                                        <li class="nav-item"><a class="nav-link" href="{{ url('administrator/bannerhome') }}"><i class='ni ni-shop text-orange'></i> Banner Home</a></li>
                                    @endif
                                    @if($cekIklansidebar == 1 || session('level') == 'admin' || session('level') == 'user' || session('level') == 'kontributor')
                                        <li class="nav-item"><a class="nav-link" href="{{ url('administrator/iklansidebar') }}"><i class='ni ni-notification-70 text-purple'></i> Iklan Sidebar</a></li>
                                    @endif

                                </ul>
                            </div>
                            {{-- <div class="collapse" id="modul-banner">
                                <ul class="nav nav-sm flex-column">
                                    @if(Auth::user()->hasAccessTo('bannerslider'))
                                        <li class="nav-item">
                                            <a href="{{ url('administrator/bannerslider') }}" class="nav-link">
                                                <i class="ni ni-world text-orange"></i> Banner Slider
                                            </a>
                                        </li>
                                    @endif

                                    @if(Auth::user()->hasAccessTo('bannerhome'))
                                        <li class="nav-item">
                                            <a href="{{ url('administrator/bannerhome') }}" class="nav-link">
                                                <i class="ni ni-compass-04 text-orange"></i> Banner Home
                                            </a>
                                        </li>
                                    @endif

                                    @if(Auth::user()->hasAccessTo('iklansidebar'))
                                        <li class="nav-item">
                                            <a href="{{ url('administrator/iklansidebar') }}" class="nav-link">
                                                <i class="ni ni-fat-add text-orange"></i> Iklan Sidebar
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div> --}}
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#modul-web" data-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="modul-web">
                                <i class="ni ni-align-left-2 text-default"></i>
                                <span class="nav-link-text">Modul Web</span>
                            </a>
                            <div class="collapse" id="modul-web">
                                <ul class="nav nav-sm flex-column">
                                    {{-- <li class="nav-item">
                                        <a href="{{ url('administrator/logowebsite') }}"
                                            class="nav-link">Logo Website</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('administrator/templatewebsite') }}"
                                            class="nav-link">Template Website</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('administrator/backgroundwebsite') }}"
                                            class="nav-link">Background Website</a>
                                    </li> --}}
                                    {{-- @php
                                        $UserModul = new \App\Models\UserModul;
                                        $cek = $UserModul->umenu_akses("logowebsite", session('id_session'));
                                    @endphp
                                    @if($cek == 1 || session('level') == 'admin')
                                        <li><a href="{{ url('administrator/logowebsite') }}"><i class='fa fa-circle-o'></i> Logo Website</a></li>
                                    @endif
                                    @php
                                        $UserModul = new \App\Models\UserModul;
                                        $cek = $UserModul->umenu_akses("templatewebsite", session('id_session'));
                                    @endphp
                                    @if($cek == 1 || session('level') == 'admin')
                                        <li><a href="{{ url('administrator/templatewebsite') }}"><i class='fa fa-circle-o'></i> Template Website</a></li>
                                    @endif
                                    @php
                                        $UserModul = new \App\Models\UserModul;
                                        $cek = $UserModul->umenu_akses("backgroundwebsite", session('id_session'));
                                    @endphp
                                    @if($cek == 1 || session('level') == 'admin')
                                        <li><a href="{{ url('administrator/backgroundwebsite') }}"><i class='fa fa-circle-o'></i> Background Website</a></li>
                                    @endif --}}



                                    @php
                                        $UserModul = new \App\Models\UserModul;
                                        $cekLogowebsite = $UserModul->umenu_akses("logowebsite", session('id_session'));
                                        $cekBenefit = $UserModul->umenu_akses("benefit", session('id_session'));
                                        $cekTemplatewebsite = $UserModul->umenu_akses("templatewebsite", session('id_session'));
                                        $cekTestimoni = $UserModul->umenu_akses("testimoni", session('id_session'));
                                        $cekTrainer = $UserModul->umenu_akses("trainer", session('id_session'));
                                        $cekProgram = $UserModul->umenu_akses("program", session('id_session'));
                                        $cekMateri = $UserModul->umenu_akses("materi", session('id_session'));
                                        $cekMetode = $UserModul->umenu_akses("metode", session('id_session'));
                                        $cekMember = $UserModul->umenu_akses("member", session('id_session'));
                                        $cekRating = $UserModul->umenu_akses("rating", session('id_session'));
                                        $cekKategoriprogram = $UserModul->umenu_akses("kategoriprogram", session('id_session'));
                                        $cekLogo = $UserModul->umenu_akses("metodepembayaran", session('id_session'));
                                        $cekMitra = $UserModul->umenu_akses("mitra", session('id_session'));
                                        $cekBerlangganan = $UserModul->umenu_akses("berlangganan", session('id_session'));
                                        $cekProgramcv = $UserModul->umenu_akses("programcv", session('id_session'));
                                        $cekBootcamps = $UserModul->umenu_akses("bootcamps", session('id_session'));
                                        $cekBenefitbootcamp = $UserModul->umenu_akses("benefitbootcamp", session('id_session'));
                                    @endphp

                                    @if($cekLogowebsite == 1 || session('level') == 'admin' || session('level') == 'user' || session('level') == 'kontributor')
                                        <li class="nav-item"><a class="nav-link" href="{{ url('administrator/logowebsite') }}"><i class='ni ni-badge text-blue'></i> Logo Website</a></li>
                                    @endif
                                    @if($cekTemplatewebsite == 1 || session('level') == 'admin' || session('level') == 'user' || session('level') == 'kontributor')
                                        <li class="nav-item"><a class="nav-link" href="{{ url('administrator/templatewebsite') }}"><i class='ni ni-settings-gear-65 text-orange'></i> Template Website</a></li>
                                    @endif
                                    @if($cekTestimoni == 1 || session('level') == 'admin' || session('level') == 'user' || session('level') == 'kontributor')
                                        <li class="nav-item"><a class="nav-link" href="{{ url('administrator/testimoni') }}"><i class='ni ni-settings-gear-65 text-orange'></i> Testimoni</a></li>
                                    @endif
                                    @if($cekTrainer == 1 || session('level') == 'admin' || session('level') == 'user' || session('level') == 'kontributor')
                                        <li class="nav-item"><a class="nav-link" href="{{ url('administrator/trainer') }}"><i class='ni ni-settings-gear-65 text-orange'></i> Trainer</a></li>
                                    @endif
                                    @if($cekProgram == 1 || session('level') == 'admin' || session('level') == 'user' || session('level') == 'kontributor')
                                        <li class="nav-item"><a class="nav-link" href="{{ url('administrator/program') }}"><i class='ni ni-settings-gear-65 text-orange'></i> Program</a></li>
                                    @endif
                                    @if($cekMateri == 1 || session('level') == 'admin' || session('level') == 'user' || session('level') == 'kontributor')
                                        <li class="nav-item"><a class="nav-link" href="{{ url('administrator/materi') }}"><i class='ni ni-settings-gear-65 text-orange'></i> Materi</a></li>
                                    @endif
                                    @if($cekMetode == 1 || session('level') == 'admin' || session('level') == 'user' || session('level') == 'kontributor')
                                        <li class="nav-item"><a class="nav-link" href="{{ url('administrator/metode') }}"><i class='ni ni-settings-gear-65 text-orange'></i> Metode</a></li>
                                    @endif
                                    @if($cekBenefit == 1 || session('level') == 'admin' || session('level') == 'user' || session('level') == 'kontributor')
                                        <li class="nav-item"><a class="nav-link" href="{{ url('administrator/benefit') }}"><i class='ni ni-badge text-blue'></i>Benefit</a></li>
                                    @endif
                                    @if($cekBenefitbootcamp == 1 || session('level') == 'admin' || session('level') == 'user' || session('level') == 'kontributor')
                                        <li class="nav-item"><a class="nav-link" href="{{ url('administrator/benefitbootcamp') }}"><i class='ni ni-badge text-blue'></i>Benefit Bootcamp</a></li>
                                    @endif
                                    @if($cekMember == 1 || session('level') == 'admin' || session('level') == 'user' || session('level') == 'kontributor')
                                        <li class="nav-item"><a class="nav-link" href="{{ url('administrator/member') }}"><i class='ni ni-settings-gear-65 text-orange'></i> Member</a></li>
                                    @endif
                                    @if($cekRating == 1 || session('level') == 'admin' || session('level') == 'user' || session('level') == 'kontributor')
                                        <li class="nav-item"><a class="nav-link" href="{{ url('administrator/rating') }}"><i class='ni ni-settings-gear-65 text-orange'></i> Rating</a></li>
                                    @endif
                                    @if($cekBerlangganan == 1 || session('level') == 'admin' || session('level') == 'user' || session('level') == 'kontributor')
                                        <li class="nav-item"><a class="nav-link" href="{{ url('administrator/berlangganan') }}"><i class='ni ni-settings-gear-65 text-orange'></i> Berlangganan</a></li>
                                    @endif
                                    @if($cekKategoriprogram == 1 || session('level') == 'admin' || session('level') == 'user' || session('level') == 'kontributor')
                                        <li class="nav-item"><a class="nav-link" href="{{ url('administrator/kategoriprogram') }}"><i class='ni ni-settings-gear-65 text-orange'></i> Kategori Program</a></li>
                                    @endif
                                    @if($cekLogo == 1 || session('level') == 'admin' || session('level') == 'user' || session('level') == 'kontributor')
                                        <li class="nav-item"><a class="nav-link" href="{{ url('administrator/metodepembayaran') }}"><i class='ni ni-settings-gear-65 text-orange'></i> Logo Bawah</a></li>
                                    @endif
                                    @if($cekMitra == 1 || session('level') == 'admin' || session('level') == 'user' || session('level') == 'kontributor')
                                        <li class="nav-item"><a class="nav-link" href="{{ url('administrator/mitra') }}"><i class='ni ni-settings-gear-65 text-orange'></i> Mitra</a></li>
                                    @endif

                                    @if($cekProgramcv == 1 || session('level') == 'admin' || session('level') == 'user' || session('level') == 'kontributor')
                                        <li class="nav-item"><a class="nav-link" href="{{ url('administrator/programcv') }}"><i class='ni ni-settings-gear-65 text-orange'></i> Program CV</a></li>
                                    @endif
                                    @if($cekBootcamps == 1 || session('level') == 'admin' || session('level') == 'user' || session('level') == 'kontributor')
                                        <li class="nav-item"><a class="nav-link" href="{{ url('administrator/bootcamps') }}"><i class='ni ni-settings-gear-65 text-orange'></i> Bootcamp</a></li>
                                    @endif
                                </ul>
                            </div>
                            {{-- <div class="collapse" id="modul-web">
                                <ul class="nav nav-sm flex-column">
                                    @if(Auth::user()->hasAccessTo('logowebsite'))
                                        <li class="nav-item">
                                            <a href="{{ url('administrator/logowebsite') }}" class="nav-link">
                                                <i class="ni ni-world text-orange"></i> Logo Website
                                            </a>
                                        </li>
                                    @endif

                                    @if(Auth::user()->hasAccessTo('templatewebsite'))
                                        <li class="nav-item">
                                            <a href="{{ url('administrator/templatewebsite') }}" class="nav-link">
                                                <i class="ni ni-compass-04 text-orange"></i> Template Website
                                            </a>
                                        </li>
                                    @endif

                                    @if(Auth::user()->hasAccessTo('backgroundwebsite'))
                                        <li class="nav-item">
                                            <a href="{{ url('administrator/backgroundwebsite') }}" class="nav-link">
                                                <i class="ni ni-fat-add text-orange"></i> Background Website
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div> --}}
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#modul-interaksi" data-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="modul-interaksi">
                                <i class="ni ni-map-big text-primary"></i>
                                <span class="nav-link-text">Modul Interaksi</span>
                            </a>
                            <div class="collapse" id="modul-interaksi">
                                <ul class="nav nav-sm flex-column">
                                    {{-- <li class="nav-item">
                                        <a href="{{ url('administrator/agenda') }}"
                                            class="nav-link">Agenda</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('administrator/sekilasinfo') }}"
                                            class="nav-link">Sekilas Info</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('administrator/jejakpendapat') }}"
                                            class="nav-link">Jejak Pendapat</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('administrator/downloadarea') }}"
                                            class="nav-link">Download Area</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('administrator/alamatkontak') }}"
                                            class="nav-link">Alamat Kontak</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('administrator/pesanmasuk') }}"
                                            class="nav-link">Pesan Masuk</a>
                                    </li> --}}
                                    {{-- @if(Auth::user()->hasAccessTo('agenda'))
                                        <li class="nav-item">
                                            <a href="{{ url('administrator/agenda') }}" class="nav-link">
                                                <i class="ni ni-world text-orange"></i> Agenda
                                            </a>
                                        </li>
                                    @endif

                                    @if(Auth::user()->hasAccessTo('sekilasinfo'))
                                        <li class="nav-item">
                                            <a href="{{ url('administrator/sekilasinfo') }}" class="nav-link">
                                                <i class="ni ni-compass-04 text-orange"></i> Sekilas Info
                                            </a>
                                        </li>
                                    @endif

                                    @if(Auth::user()->hasAccessTo('jejakpendapat'))
                                        <li class="nav-item">
                                            <a href="{{ url('administrator/jejakpendapat') }}" class="nav-link">
                                                <i class="ni ni-fat-add text-orange"></i> Jajak Pendapat
                                            </a>
                                        </li>
                                    @endif

                                    @if(Auth::user()->hasAccessTo('alamatkontak'))
                                        <li class="nav-item">
                                            <a href="{{ url('administrator/alamatkontak') }}" class="nav-link">
                                                <i class="ni ni-fat-add text-orange"></i> Alamat Kontak
                                            </a>
                                        </li>
                                    @endif

                                    @if(Auth::user()->hasAccessTo('downloadarea'))
                                        <li class="nav-item">
                                            <a href="{{ url('administrator/downloadarea') }}" class="nav-link">
                                                <i class="ni ni-fat-add text-orange"></i> Download Area
                                            </a>
                                        </li>
                                    @endif

                                    @if(Auth::user()->hasAccessTo('pesanmasuk'))
                                        <li class="nav-item">
                                            <a href="{{ url('administrator/pesanmasuk') }}" class="nav-link">
                                                <i class="ni ni-fat-add text-orange"></i> Pesan Masuk
                                            </a>
                                        </li>
                                    @endif --}}
                                     {{-- @php
                                        $UserModul = new \App\Models\UserModul;
                                        $cek = $UserModul->umenu_akses("agenda", session('id_session'));
                                    @endphp
                                    @if($cek == 1 || session('level') == 'admin')
                                        <li><a href="{{ url('administrator/agenda') }}"><i class='fa fa-circle-o'></i> Agenda</a></li>
                                    @endif
                                    @php
                                        $UserModul = new \App\Models\UserModul;
                                        $cek = $UserModul->umenu_akses("sekilasinfo", session('id_session'));
                                    @endphp
                                    @if($cek == 1 || session('level') == 'admin')
                                        <li><a href="{{ url('administrator/sekilasinfo') }}"><i class='fa fa-circle-o'></i> Sekilas Info</a></li>
                                    @endif
                                    @php
                                        $UserModul = new \App\Models\UserModul;
                                        $cek = $UserModul->umenu_akses("jejakpendapat", session('id_session'));
                                    @endphp
                                    @if($cek == 1 || session('level') == 'admin')
                                        <li><a href="{{ url('administrator/jejakpendapat') }}"><i class='fa fa-circle-o'></i> Jajak Pendapat</a></li>
                                    @endif
                                    @php
                                        $UserModul = new \App\Models\UserModul;
                                        $cek = $UserModul->umenu_akses("downloadarea", session('id_session'));
                                    @endphp
                                    @if($cek == 1 || session('level') == 'admin')
                                        <li><a href="{{ url('administrator/downloadarea') }}"><i class='fa fa-circle-o'></i> Download Area</a></li>
                                    @endif
                                    @php
                                        $UserModul = new \App\Models\UserModul;
                                        $cek = $UserModul->umenu_akses("pesanmasuk", session('id_session'));
                                    @endphp
                                    @if($cek == 1 || session('level') == 'admin')
                                        <li><a href="{{ url('administrator/pesanmasuk') }}"><i class='fa fa-circle-o'></i> Pesan Masuk</a></li>
                                    @endif --}}



                                    @php
                                        $UserModul = new \App\Models\UserModul;
                                        $cekAgenda = $UserModul->umenu_akses("agenda", session('id_session'));
                                        $cekSekilasinfo = $UserModul->umenu_akses("sekilasinfo", session('id_session'));
                                        $cekJejakpendapat = $UserModul->umenu_akses("jejakpendapat", session('id_session'));
                                        $cekDownloadarea = $UserModul->umenu_akses("downloadarea", session('id_session'));
                                        $cekPesanmasuk = $UserModul->umenu_akses("pesanmasuk", session('id_session'));
                                    @endphp

                                    @if($cekAgenda == 1 || session('level') == 'admin' || session('level') == 'user' || session('level') == 'kontributor')
                                        <li class="nav-item"><a class="nav-link" href="{{ url('administrator/agenda') }}"><i class='ni ni-collection text-blue'></i> Agenda</a></li>
                                    @endif
                                    @if($cekSekilasinfo == 1 || session('level') == 'admin' || session('level') == 'user' || session('level') == 'kontributor')
                                        <li class="nav-item"><a class="nav-link" href="{{ url('administrator/sekilasinfo') }}"><i class='ni ni-single-copy-04 text-orange'></i> Sekilas Info</a></li>
                                    @endif
                                    @if($cekJejakpendapat == 1 || session('level') == 'admin' || session('level') == 'user' || session('level') == 'kontributor')
                                        <li class="nav-item"><a class="nav-link" href="{{ url('administrator/jejakpendapat') }}"><i class='ni ni-chart-bar-32 text-purple'></i> Jejak Pendapat</a></li>
                                    @endif
                                    @if($cekDownloadarea == 1 || session('level') == 'admin' || session('level') == 'user' || session('level') == 'kontributor')
                                        <li class="nav-item"><a class="nav-link" href="{{ url('administrator/downloadarea') }}"><i class='ni ni-cloud-download-95 text-blue'></i> Download Area</a></li>
                                    @endif
                                    @if($cekPesanmasuk == 1 || session('level') == 'admin' || session('level') == 'user' || session('level') == 'kontributor')
                                        <li class="nav-item"><a class="nav-link" href="{{ url('administrator/pesanmasuk') }}"><i class='ni ni-chat-round text-orange'></i> Pesan Masuk</a></li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#modul-users" data-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="modul-users">
                                <i class="ni ni-map-big text-primary"></i>
                                <span class="nav-link-text">Modul Users</span>
                            </a>
                            <div class="collapse" id="modul-users">
                                <ul class="nav nav-sm flex-column">
                                    {{-- <li class="nav-item">
                                        <a href="{{ url('administrator/manajemenuser') }}"
                                            class="nav-link">Manajemen User</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('administrator/manajemenmodul') }}"
                                            class="nav-link">Manajemen Modul</a>
                                    </li> --}}

                                    {{-- @php
                                        $UserModul = new \App\Models\UserModul;
                                        $cek = $UserModul->umenu_akses("manajemenuser", session('id_session'));
                                    @endphp
                                    @if($cek == 1 || session('level') == 'admin')
                                        <li><a href="{{ url('administrator/manajemenuser') }}"><i class='fa fa-circle-o'></i> Manajemen User</a></li>
                                    @endif
                                    @php
                                        $UserModul = new \App\Models\UserModul;
                                        $cek = $UserModul->umenu_akses("manajemenmodul", session('id_session'));
                                    @endphp
                                    @if($cek == 1 || session('level') == 'admin')
                                        <li><a href="{{ url('administrator/manajemenmodul') }}"><i class='fa fa-circle-o'></i> Manajemen Modul</a></li>
                                    @endif --}}


                                    @php
                                        $UserModul = new \App\Models\UserModul;
                                        $cekManajemenuser = $UserModul->umenu_akses("manajemenuser", session('id_session'));
                                        $cekManajemenmodul = $UserModul->umenu_akses("manajemenmodul", session('id_session'));
                                    @endphp

                                    @if($cekManajemenuser == 1 || session('level') == 'admin' || session('level') == 'user' || session('level') == 'kontributor')
                                        <li class="nav-item"><a class="nav-link" href="{{ url('administrator/manajemenuser') }}"><i class='ni ni-folder-17 text-blue'></i> Manajemen User</a></li>
                                    @endif
                                    @if($cekManajemenmodul == 1 || session('level') == 'admin' || session('level') == 'user' || session('level') == 'kontributor')
                                        <li class="nav-item"><a class="nav-link" href="{{ url('administrator/manajemenmodul') }}"><i class='ni ni-folder-17 text-orange'></i> Manajemen Modul</a></li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('administrator/database') }}">
                                <i class="ni ni-map-big text-primary"></i>
                                <span class="nav-link-text">Backup Database</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>



    <div class="main-content" id="panel">
        <nav class="navbar navbar-top navbar-expand navbar-light bg-secondary border-bottom">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    {{-- <form class="navbar-search navbar-search-dark form-inline mr-sm-3" id="navbar-search-main">
                        <div class="form-group mb-0">
                            <div class="input-group input-group-alternative input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                                <input class="form-control" placeholder="Search" type="text">
                            </div>
                        </div>
                        <button type="button" class="close" data-action="search-close"
                            data-target="#navbar-search-main" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </form> --}}
                    <ul class="navbar-nav align-items-center ml-md-auto">
                        <li class="nav-item d-xl-none">
                            <div class="pr-3 sidenav-toggler sidenav-toggler-light" data-action="sidenav-pin"
                                data-target="#sidenav-main">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item d-sm-none">
                            <a class="nav-link" href="#" data-action="search-show"
                                data-target="#navbar-search-main">
                                <i class="ni ni-zoom-split-in"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="ni ni-bell-55"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right py-0 overflow-hidden">
                                <div class="px-3 py-3">
                                    <h6 class="text-sm text-muted m-0">You have <strong class="text-primary">{{ $latestMessages->count() }}</strong> notifications.</h6>
                                </div>
                                <div class="list-group list-group-flush">
                                    @foreach($latestMessages as $message)
                                    <a href="{{ route('administrator.detailpesanmasuk.show', $message->id_hubungi) }}" class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <img alt="Image placeholder" src="../../assets/img/theme/team-1.jpg" class="avatar rounded-circle">
                                            </div>
                                            <div class="col ml--2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h4 class="mb-0 text-sm">{{ $message->nama }}</h4>
                                                    </div>
                                                    <div class="text-right text-muted">
                                                        <small>{{ $message->tanggal }}</small>
                                                    </div>
                                                </div>
                                                <p class="text-sm mb-0">{{ Str::limit($message->pesan, 50) }}</p>
                                            </div>
                                        </div>
                                    </a>
                                    @endforeach
                                </div>
                                <a href="{{ route('administrator.pesanmasuk.index') }}" class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav align-items-center ml-auto ml-md-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <div class="media align-items-center">
                                    <span class="avatar avatar-sm rounded-circle">
                                        <img alt="Image placeholder"
                                            src="{{ asset('assets/img/theme/team-4.jpg') }}">
                                    </span>
                                    <div class="media-body ml-2 d-none d-lg-block">
                                        <span class="mb-0 text-sm  font-weight-bold">
                                            @if(Auth::check())
                                            {{ Auth::user()->username }}
                                            @else
                                            Pengguna belum login
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome!</h6>
                                </div>
                                <a href="#!" class="dropdown-item">
                                    <i class="ni ni-single-02"></i>
                                    <span>Edit Profile</span>
                                </a>
                                {{-- <div class="dropdown-divider"></div>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div> --}}
                                <div class="dropdown-divider"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}" class="dropdown-item"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        <i class="ni ni-user-run"></i>
                                        <span>Logout</span>
                                    </a>
                                </form>

                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="header pb-6">
            <div class="container-fluid">
                @yield('submenu')
            </div>
        </div>
        <div class="container-fluid mt--6">
            @if (session()->has('pesan'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('pesan') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
            @yield('content')
        </div>

      @yield('footer')
    <footer class="footer pt-0">
      <div class="row align-items-center justify-content-lg-between">
        <div class="col-lg-12">
          <div class="copyright-text text-center">
            <strong>Copyright &copy;  <?php echo date('Y'); ?> <a target='_BLANK' href="http://www.lokomedia.web.id"> PT. Pandai Digital</a>.</strong> All rights reserved.
          </div>
        </div>
      </div>
    </footer>
  </div>


    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
  {{-- <script src="{{ url('assets/js/ckeditor.js') }}"></script> --}}
  {{-- <script src="https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.js"></script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="{{ url('assets/js/sweetalert2.js') }}"></script>
    <script src="{{ url('assets/vendor/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ url('assets/js/argon.js') }}"></script>

    <script src="{{ url('assets/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ url('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
    <script src="{{ url('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Optional JS -->
    <script src="{{ url('assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ url('assets/js/components/charts/chart-bar.js') }}"></script>
    <script src="{{ url('assets/vendor/chart.js/dist/Chart.extension.js') }}"></script>
    @yield('script')
      <script>
          CKEDITOR.replace('isi_halaman');
      </script>
      <script>
          CKEDITOR.replace('isi_berita');
      </script>
      <script>
        CKEDITOR.replace('keterangan');
    </script>
  <script>
    CKEDITOR.replace('isi_deskripsi');
  </script>
  <script>
    CKEDITOR.replace('alamat');
  </script>
  <script>
    CKEDITOR.replace('isi_agenda');
  </script>



  {{-- <script>
    $(function() {
      $('input[name="datefilter"]').daterangepicker({
        autoUpdateInput: false,
        locale: {
          cancelLabel: 'Bersihkan',
          applyLabel: 'Terapkan',
          format: 'DD/MM/YYYY'
        }
      });

      $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
      });

      $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
      });
    });
  </script> --}}
</body>

</html>
