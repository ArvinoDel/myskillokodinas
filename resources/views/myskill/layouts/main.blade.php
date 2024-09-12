<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/logo.png') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Pandai Digital || {{ ucfirst(Route::currentRouteName()) }}</title>

    {{-- @vite('resources/css/appskill.css') --}}

    <link rel="stylesheet"
        href="https://rawcdn.githack.com/ArvinoDel/MySkill/db1485d305b176ef2fc16baac98bcef23eb790fd/resources/css/app.css">


    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>

    {{-- <link rel="stylesheet" href="./resources/css/appskill.css"> --}}


    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>

</head>

<body class="">
    @include('./myskill/partials.navbar')

    <div class="container" id="container">
        @yield('container')
    </div>

    @include('./myskill/partials.footer')

    <!-- wa button -->
    <a target="_blank"
        href="https://wa.me/6285224216499?text=Saya%20tertarik%20untuk%20berlangganan%20bimbel%20online%20MySkill.%20Mohon%20informasi%20lebih%20lanjut%20mengenai%20paket%20langganan%2C%20harga%2C%20dan%20fitur%20yang%20tersedia.%20Terima%20kasih.">
        <button
            class="fixed end-12 max-sm:end-2 justify-center bottom-8  bg-orange-500 text-white p-3 rounded-full shadow-lg">
            <i class="fab fa-whatsapp " style="font-size: 20px; padding: 4px; margin-left: 4px;"></i>
            <span class="max-sm:hidden">Whatsapp</span>
        </button>
    </a>

    <!--
    <script src="../../js/buttons.js"></script>
    <script src="../../js/e-learning.js"></script>
    <script src="../../js/navbar.js"></script> -->

    <script src="https://rawcdn.githack.com/ArvinoDel/MySkill/db1485d305b176ef2fc16baac98bcef23eb790fd/resources/js/app.js"
        defer></script>
    <script
        src="https://rawcdn.githack.com/ArvinoDel/MySkill/db1485d305b176ef2fc16baac98bcef23eb790fd/resources/js/navbar.js"
        defer></script>
    <script
        src="https://rawcdn.githack.com/ArvinoDel/MySkill/db1485d305b176ef2fc16baac98bcef23eb790fd/resources/js/e-learning.js"
        defer></script>
    <script
        src="https://rawcdn.githack.com/ArvinoDel/MySkill/db1485d305b176ef2fc16baac98bcef23eb790fd/resources/js/buttons.js"
        defer></script>

</body>

</html>
