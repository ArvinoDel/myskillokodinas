<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Welcome Pengajar-</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/logo.png') }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <link rel="stylesheet" href="{{ url('assets/css/sweetalert2.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}"
        type="text/css">
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
                <a class="navbar-brand" href="{{ url('pengajar/dashpengajar') }}">
                    Pengajar
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
                            <a class="nav-link" href="#materi" data-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="materi">
                                <i class="ni ni-ungroup text-orange"></i>
                                <span class="nav-link-text">Materi</span>
                            </a>
                            <div class="collapse" id="materi">
                                <ul class="nav nav-sm flex-column">
                                    @php
                                        $UserModul = new \App\Models\UserModul();
                                       
                                        $cekMateri = $UserModul->umenu_akses('materi', session('id_session'));
                                        // $cekTugas = $UserModul->umenu_akses('tugas', session('id_session'));
                                    @endphp
                                    @if ($cekMateri == 1 || session('level') == 'admin' || session('level') == 'user' || session('level') == 'pengajar')
                                        <li class="nav-item"><a class="nav-link"
                                                href="{{ url('pengajar/materi') }}"><i
                                                    class='ni ni-settings-gear-65 text-orange'></i> Materi</a></li>
                                    @endif
                                    {{-- @if ($cekTugas == 1 || session('level') == 'admin' || session('level') == 'user' || session('level') == 'pengajar')
                                        <li class="nav-item"><a class="nav-link"
                                                href="{{ url('pengajar/tugas') }}"><i
                                                    class='ni ni-settings-gear-65 text-orange'></i> Tugas</a></li>
                                    @endif --}}
                                </ul>
                            </div>
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
                
                <div id="search-results" class="dropdown-menu dropdown-menu-right" style="display: none;"></div>
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
                                    <h6 class="text-sm text-muted m-0">You have <strong
                                            class="text-primary">{{ $latestMessages->count() }}</strong>
                                        notifications.</h6>
                                </div>
                                <div class="list-group list-group-flush">
                                    @foreach ($latestMessages as $message)
                                        <a href="{{ route('administrator.detailpesanmasuk.show', $message->id_hubungi) }}"
                                            class="list-group-item list-group-item-action">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <img alt="Image placeholder"
                                                        src="../../assets/img/theme/team-1.jpg"
                                                        class="avatar rounded-circle">
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
                                <a href="{{ route('administrator.pesanmasuk.index') }}"
                                    class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav align-items-center ml-auto ml-md-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <div class="media align-items-center">
                                    <span class="avatar avatar-sm rounded-circle">
                                        @if (Auth::check() && Auth::user()->foto)
                                            <img alt="Image placeholder"
                                                src="{{ url('foto_user/' . Auth::user()->foto) }}">
                                        @else
                                            <img alt="Image placeholder"
                                                src="{{ asset('assets/img/theme/team-4.jpg') }}">
                                        @endif
                                    </span>
                                    <div class="media-body ml-2 d-none d-lg-block">
                                        <span class="mb-0 text-sm  font-weight-bold">
                                            @if (Auth::check())
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
                        <strong>Copyright &copy; <?php echo date('Y'); ?> <a target='_BLANK'
                                href="http://www.lokomedia.web.id"> PT. Pandai Digital</a>.</strong> All rights
                        reserved.
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
