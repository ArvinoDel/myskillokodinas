 <!DOCTYPE html>
 <html>

 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
     <meta name="author" content="Creative Tim">
     <title>Masuk untuk akses</title>
     <!-- Favicon -->
     <link rel="icon" href="../../assets/img/brand/favicon.png" type="image/png">
     <!-- Fonts -->
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
     <!-- Icons -->
     <link rel="stylesheet" href="{{ url('assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
     <link rel="stylesheet" href="{{ url('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}"
         type="text/css">
     <!-- Argon CSS -->
     <link rel="stylesheet" href="{{ url('assets/css/argon.css') }}" type="text/css">
 </head>

 <body class="bg-gradient-primary" style="overflow: hidden;">
     <div class="main-content d-flex align-items-center justify-content-center min-vh-100">
         <div class="header bg-gradient-primary py-5 w-100">
             <div class="container">
                 <div class="header-body text-center mb-7">
                     <div class="row justify-content-center">
                         <div class="col-lg-5 col-md-7 col-sm-10 col-12">
                             <img src="{{ asset('assets/logo.png') }}" alt="Your Icon"
                                 class="mb-3 mx-auto d-block" style="width: 50px; height: 50px;">
                             <div class="card bg-secondary border-0 mb-0">
                                 <div class="card-body px-lg-5 py-lg-5">
                                     <div class="text-center text-muted mb-4">
                                         <h1>Log in</h1>
                                         <small>Use your Full name to Continue</small>
                                     </div>
                                     <form method="POST" action="{{ route('login') }}">
                                         @csrf
                                         <div class="form-group mb-3">
                                             <div class="input-group input-group-merge input-group-alternative">
                                                 <div class="input-group-prepend">
                                                     <span class="input-group-text"><i
                                                             class="ni ni-circle-08"></i></span>
                                                 </div>
                                                 <input class="form-control" placeholder="Full name" name="username"
                                                     type="text">
                                             </div>
                                         </div>
                                         <div class="form-group mb-2">
                                             <div class="input-group input-group-merge input-group-alternative">
                                                 <div class="input-group-prepend">
                                                     <span class="input-group-text"><i
                                                             class="ni ni-lock-circle-open"></i></span>
                                                 </div>
                                                 <input class="form-control" placeholder="Password" name="password"
                                                     type="password">
                                             </div>
                                         </div>
                                         <div class="custom-control custom-control-alternative custom-checkbox">
                                             <input class="custom-control-input" id="remember_me" type="checkbox"
                                                 name="remember">
                                             <label class="custom-control-label d-flex justify-content-start"
                                                 for="remember_me">
                                                 <span class="text-muted">Remember me</span>
                                             </label>
                                         </div>
                                         <div class="text-center">
                                             <button type="submit" class="btn btn-primary my-4 w-100">Sign in</button>
                                         </div>
                                         <div class="d-flex justify-content-center">
                                             <div class="custom-control custom-control-alternative">
                                                 <a href="{{ route('password.request') }}"
                                                     class="text-primary"><small>Forgot password?</small></a>
                                             </div>
                                         </div>
                                     </form>
                                     <!-- Commented out section -->
                                     <!-- <div class="row mt-3 justify-content-center">
                                     <div class="">
                                       <span class="small">Don't have an account?</span>
                                       <a href="{{ route('register') }}" class="text-primary"><small>Create an account</small></a>
                                     </div>
                                   </div> -->
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <script src="{{ url('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
     <script src="{{ url('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
     <script src="{{ url('assets/vendor/js-cookie/js.cookie.js') }}"></script>
     <script src="{{ url('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
     <script src="{{ url('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
     <!-- Argon JS -->
     <script src="{{ url('assets/js/argon.js') }}"></script>
     <!-- Demo JS - remove this in your project -->
     <script src="{{ url('assets/js/demo.min.js') }}"></script>
 </body>


 </html>
