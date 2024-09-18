@extends('./myskill/layouts.main')
@section('container')
@php
$buttons = [
['id' => 1, 'label' => '📕 Learning'],
['id' => 2, 'label' => '💼 Onboarding'],
['id' => 3, 'label' => '✅ Project'],
['id' => 4, 'label' => '🎯 Performance'],
['id' => 5, 'label' => '📊 Analytics'],
];
$activeButton = request()->query('activeButton');
@endphp

<div class="corporate w-screen">
    <section
        class="flex flex-col lg:flex-row-reverse h-auto rounded-b-3xl bg-white lg:bg-gradient-to-b from-orange-400 to-red-400 text-white w-full">
        <!-- Image Container -->
        <div class="flex justify-center lg:justify-end mb-4 lg:mb-0 lg:mr-16 mt-4 lg:mt-0">
            <img src="{{ asset('./assets/corporate/hero-illustration.webp') }}" alt="Corporate"
                class="lg:h-80 lg:mt-4 lg:ml-20 lg:mr-20 lg:mb-20 md:h-56 max-sm:w-56">
        </div>

        <!-- Text Container -->
        <div class="text-left lg:text-left lg:mr-4 text-black lg:text-white p-4 lg:p-8 lg:ml-16">
            <button type="button"
                class="focus:outline-none text-white bg-gray-900 font-medium rounded-full text-sm px-5 py-2.5 me-2 dark:focus:ring-yellow-900">
                Pandai Digital for Business
            </button>
            <p class="text-xl lg:text-5xl font-bold mb-2 lg:mb-4 lg:w-10/12 ">
                Solusi Meningkatkan Performa Tim & Perusahaan
            </p>
            <p class="mt-2 text-base lg:text-lg mb-2 w-4/5">
                Pandai Digital Experience adalah software bagi karyawan untuk UpSkilling serta mengelola Onboarding, Project & Target KPI.
            </p>
            <br>
            <!-- Container for buttons -->
            <div
                class="flex flex-col lg:flex-row lg:justify-start lg:space-x-4 lg:items-center items-center space-y-4 lg:space-y-0 mb-4">
                <!-- Corporate Training Button -->
                <a href="#form"
                    class="text-black lg:text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-4 py-2 mb-2 lg:mb-0 dark:focus:ring-yellow-900">
                    Pelajari Selengkapnya
                </a>

                <!-- Performance Management Software Button -->
                <a href="/login" type="button"
                    class="text-black lg:text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-4 py-2 mb-2 lg:mb-0 dark:focus:ring-yellow-900">
                    Login
                </a>
            </div>
        </div>
    </section>

    <!-- button here -->
    <div id="buttonContainer" class="flex overflow-x-auto space-x-4 m-4 lg:ml-14 lg:mr-14 lg:mt-14 no-scrollbar max-sm:text-nowrap">
        @foreach ($buttons as $button)
        <a id="button-{{ $button['id'] }}" href="#{{ $button['id'] }}" data-target="content-{{ $button['id'] }}"
            class="py-1 px-2 rounded-md font-semibold
                bg-white border border-black text-gray-800
                hover:bg-gray-300 hover:border-gray-400 hover:text-gray-900">
            {{ $button['label'] }}
        </a>
        @endforeach
    </div>



    <!-- INI KAALO MAU BIKIN DIV, PASTIKAN ADA ID CONTENT-#ID SESUAI DENGAN ID BUTTON NYA  DAN CLASS NYA PASTI HIDDEN -->
    <div id="content-1" class="flex flex-col lg:flex-row max-sm:flex-col">
        <div class="w-auto lg:w-1/2 lg:ml-14 text-left flex flex-col items-start ml-4">
            <!-- Bagian ini tidak perlu 'text-center' pada max-sm -->
            <div>
                <p class="lg:text-3xl font-bold mb-2 max-sm:text-4xl max-sm:text-left">
                    Ratusan Materi Upskilling Untuk Semua Tim.
                </p>
                <p class="text-sm lg:text-lg max-sm:text-left">
                    Akses 900+ video dan modul latihan hasil rancangan para experts. Upgrade skill karyawan di semua divisi dengan efisien.
                </p>
            </div>

            <button type="button"
                class="text-black bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-4 py-2 mt-4 mb-2 lg:mb-0">
                Saya tertarik
            </button>
        </div>
        <video src="{{ asset('assets/corporate/learning.mp4') }}" autoplay loop muted
            class="w-full lg:w-1/2 h-auto lg:mr-12 mt-4 lg:ml-4" playsinline>
        </video>
    </div>


    <div id="content-2" class="flex flex-col lg:flex-row max-sm:flex-col">
        <!-- Konten Teks -->
        <div class="w-auto lg:w-1/2 lg:ml-14 text-left flex flex-col items-start ml-4">
            <div>
                <p class="lg:text-3xl font-bold mb-2 max-sm:text-4xl max-sm:text-left">
                    Buat dan Bagikan Materi Onboarding.
                </p>
                <p class="text-sm lg:text-lg max-sm:text-left">
                    Kurangi repetisi dan hemat waktu hingga 90% untuk membagikan informasi bagi Karyawan maupun Mitra bisnis baru di perusahaan.
                </p>
            </div>
            <button type="button"
                class="text-black bg-yellow-400 hover:bg-yellow-500 mt-4 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-4 py-2 mb-2 lg:mb-0">
                Saya tertarik
            </button>
        </div>

        <!-- Video -->
        <video src="{{ asset('assets/corporate/onboarding.mp4') }}" autoplay loop muted
            class="w-full lg:w-1/2 h-auto lg:mr-12 mt-4 lg:ml-4" playsinline>
        </video>
    </div>


    <div id="content-3" class="flex flex-col lg:flex-row max-sm:flex-col">
        <!-- Konten Teks -->
        <div class="w-auto lg:w-1/2 lg:ml-14 text-left flex flex-col items-start ml-4">
            <div>
                <p class="lg:text-3xl font-bold mb-2 max-sm:text-4xl max-sm:text-left">
                    Tools Manajemen Proyek secara Kolaboratif.
                </p>
                <p class="text-sm lg:text-lg max-sm:text-left">
                    Buat dan kerjakan tugas di dalam tim maupun dengan pihak eksternal. Simpel, rapi dan mudah dipantau.
                </p>
            </div>
            <button type="button"
                class="text-black bg-yellow-400 hover:bg-yellow-500 mt-4 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-4 py-2 mb-2 lg:mb-0">
                Saya tertarik
            </button>
        </div>

        <!-- Video -->
        <video src="{{ asset('assets/corporate/project.mp4') }}" autoplay loop muted
            class="w-full lg:w-1/2 h-auto lg:mr-12 mt-4 lg:ml-4" playsinline>
        </video>
    </div>



    <div id="content-4" class="flex flex-col lg:flex-row max-sm:flex-col">
        <!-- Konten Teks -->
        <div class="w-auto lg:w-1/2 lg:ml-14 text-left flex flex-col items-start ml-4">
            <div>
                <p class="lg:text-3xl font-bold mb-2 max-sm:text-4xl max-sm:text-left">
                    Buat dan Pantau Target KPI Semua Karyawan.
                </p>
                <p class="text-sm lg:text-lg max-sm:text-left">
                    Pastikan performa tiap tim mencapai target. Ketahui perkembangan dari setiap tujuan.
                </p>
            </div>
            <button type="button"
                class="text-black bg-yellow-400 hover:bg-yellow-500 mt-4 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-4 py-2 mb-2 lg:mb-0">
                saya tertarik
            </button>
        </div>

        <!-- Video -->
        <video src="{{ asset('assets/corporate/performance.mp4') }}" autoplay loop muted
            class="w-full lg:w-1/2 h-auto lg:mr-12 mt-4 lg:ml-4" playsinline>
        </video>
    </div>


    <div id="content-5" class="flex flex-col lg:flex-row max-sm:flex-col">
        <!-- Konten Teks -->
        <div class="w-auto lg:w-1/2 lg:ml-14 text-left flex flex-col items-start ml-4">
            <div>
                <p class="lg:text-3xl font-bold mb-2 max-sm:text-4xl max-sm:text-left">
                    Dapatkan Insight dari Perkembangan & Performa Tim.
                </p>
                <p class="text-sm lg:text-lg max-sm:text-left">
                    Satu dashboard untuk memantau semua. Dari aktivitas upskilling, proyek hingga performa.
                </p>
            </div>
            <button type="button"
                class="text-black bg-yellow-400 hover:bg-yellow-500 mt-4 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-4 py-2 mb-2 lg:mb-0">
                saya tertarik
            </button>
        </div>

        <!-- Video -->
        <video src="{{ asset('assets/corporate/analytics.mp4') }}" autoplay loop muted
            class="w-full lg:w-1/2 h-auto lg:mr-12 mt-4 lg:ml-4" playsinline>
        </video>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const buttons = document.querySelectorAll('#buttonContainer a');
            const contents = document.querySelectorAll('[id^="content-"]');
            const defaultContent = document.querySelector('#content-1'); // Default visible content

            // Hide all contents except the default
            contents.forEach(content => {
                if (content !== defaultContent) {
                    content.style.display = 'none';
                }
            });

            // Add event listener to each button
            buttons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault(); // Prevent default link behavior
                    const targetId = this.getAttribute('data-target');
                    const targetContent = document.getElementById(targetId);

                    // Hide all content sections
                    contents.forEach(content => {
                        content.style.display = 'none';
                    });

                    // Show the selected content section
                    if (targetContent) {
                        targetContent.style.display = 'flex';
                    }
                });
            });
        });
    </script>



    <section
        class="mt-12 py-14 lg:flex-row-reverse h-auto bg-white lg:bg-gradient-to-b from-orange-400 to-red-400 text-white w-full">
        <div class="flex flex-col items-center">
            <p class="text-center mt-4 text-4xl w-9/12 font-bold text-black mb-4">Dirancang oleh Pandai Digital. Platform Upskilling #1 dengan 1 Juta lebih Pengguna.
            </p>
            <p class="text-xl mb-4 w-4/5 text-black">
                Kembangkan bisnis perusahaan Kamu dengan mendorong tiap karyawan bekerja dan berkembang dengan lebih efektif.
            </p>
            <div class="flex flex-col px-4 mr-4">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    <!-- Card 1 -->
                    <div class="bg-white text-black p-6 rounded-lg w-full border border-spacing-2">
                        <p class="text-md font-medium text-center mb-4">Didukung oleh</p>
                        <img src="./assets/corporate/east-ventures.webp" alt="" class="mx-auto">
                    </div>
                    <!-- Card 2 -->
                    <div class="bg-white text-black p-6 rounded-lg w-full border border-spacing-2">
                        <p class="text-md font-medium text-center mb-4">Didukung oleh</p>
                        <div class="flex justify-center">
                            <img src="./assets/corporate/aws-edstart.webp" alt="" class="mx-2 h-16">
                            <img src="./assets/corporate/linkedin-top-startupp.webp" alt="" class="mx-2 h-16">
                        </div>
                    </div>
                    <!-- Card 3 -->
                    <div class="bg-white text-black p-6 rounded-lg w-full border border-spacing-2">
                        <p class="text-md font-medium text-center mb-4">Bekerjasama dengan</p>
                        <div class="flex justify-center space-x-2 mt-8">
                            <img src="./assets/corporate/paragon.webp" alt="Users" class="mx-auto h-6">
                            <img src="./assets/corporate/microsoftt.webp" alt="Users" class="mx-auto h-6">
                            <img src="./assets/corporate/mandiri.webp" alt="Users" class="mx-auto h-6">
                        </div>
                    </div>
                    <!-- Card 4 -->
                    <div class="bg-white text-black p-6 rounded-lg w-full border border-spacing-2">
                        <p class="text-md font-medium text-center mb-4">Bekerjasama dengan</p>
                        <div class="flex justify-center space-x-1 mt-8">
                            <img src="./assets/corporate/techinasia.webp" alt="Users" class="mx-auto h-4">
                            <img src="./assets/corporate/cnbc.webp" alt="Users" class="mx-auto h-4">
                            <img src="./assets/corporate/technode.webp" alt="Users" class="mx-auto h-4">
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>

    <section class="w-full h-auto px-4" id="form">
        <p class="bg-clip-text bg-gradient-to-r from-orange-400 to-pink-500 mt-4 text-transparent text-xl text-center">
            Pandai Digital Experience akan Rilis Segera!
        </p>
        <h3 class="mt-4 text-2xl lg:text-4xl font-bold mb-4 text-center text-black">
            Daftar sekarang untuk mendapat info detail produk dan promo.
        </h3>
        <p class="text-black mt-4 text-transparent text-lg text-center">
            Kembangkan bisnis perusahaan Kamu dengan mengembangkan SDM di
        </p>
        <p class="text-black mb-4 text-transparent text-lg text-center">
            dalamnya melalui LMS Pandai Digital segera.
        </p>

        <div class="flex justify-center">
            <div class="w-full max-w-4xl">
                <form class="bg-white space-y-6 p-4">
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        <label for="email" class="font-bold">Email Resmi / Perusahaan
                            <input type="text" id="email" class="w-full p-4 bg-gray-300 rounded-lg">
                        </label>
                        <label for="phone" class="font-bold">Telepon / WhatsApp
                            <input type="text" id="phone" class="w-full p-4 bg-gray-300 rounded-lg">
                        </label>
                        <label for="department" class="font-bold">Departemen
                            <input type="text" id="department" class="w-full p-4 bg-gray-300 rounded-lg">
                        </label>
                        <label for="total-employees" class="font-bold">Total Karyawan
                            <input type="number" id="total-employees" class="w-full p-4 bg-gray-300 rounded-lg">
                        </label>
                        <label for="full-name" class="font-bold">Nama Lengkap
                            <input type="text" id="full-name" class="w-full p-4 bg-gray-300 rounded-lg">
                        </label>
                        <label for="position" class="font-bold">Posisi di Perusahaan
                            <input type="text" id="position" class="w-full p-4 bg-gray-300 rounded-lg">
                        </label>
                        <label for="company-name" class="font-bold">Nama Perusahaan
                            <input type="text" id="company-name" class="w-full p-4 bg-gray-300 rounded-lg">
                        </label>
                        <label for="website" class="font-bold">Website Perusahaan
                            <input type="text" id="website" class="w-full p-4 bg-gray-300 rounded-lg">
                        </label>
                    </div>
                    <div class="flex flex-col items-center space-y-4">
                        <button type="submit" class="w-full max-w-xs px-4 py-2 bg-gray-300 text-white font-bold rounded-lg">
                            Kirim
                        </button>
                        <p class="text-center">
                            Silahkan lengkapi form diatas untuk mengirim pesan
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </section>

</div>
@endsection