@extends('./myskill/layouts.main')
@section('container')
<section class="e-learning w-screen">
    <!-- Section 1: Hero -->
    <section class="bg-gradient-to-b from-orange-400 to-red-500 p-4 md:p-8">
        <div class="container mx-auto">
            <div class="flex flex-col md:flex-col lg:flex-row items-center">
                <img src="{{ asset('assets/e-learning/header.webp') }}" alt="Woman with laptop"
                    class="mb-4 md:mb-4 w-full h-auto max-sm:max-w-xs md:max-w-sm lg:w-1/2 rounded-lg">

                <div class="text-center lg:ml-6 lg:text-left">
                    <h1 class="text-3xl md:text-4xl font-bold mb-4 text-white">Kuasai Ratusan Skill,
                        Bangun Portfolio & Bersertifikat.</h1>
                    <p class="text-sm md:text-base text-white mb-4">Akses semua materi sekali bayar.
                        Lebih
                        dari sekadar nonton rekaman. Belajar fleksibel via • Video Materi • Case Study & Praktik • Bahan
                        Bacaan • Komunitas.</p>
                    <div class="flex justify-center lg:justify-start space-x-4 mb-4">
                        <a href="#pricing" class="bg-teal-500 lg:text-white px-6 py-2 rounded-md font-semibold text-gray-950">Mulai
                            Berlangganan</a>
                        <a href="#learning"
                            class="bg-yellow-500 lg:text-white px-6 py-2 rounded-md font-semibold text-gray-950">Lihat
                            900+ Materi</a>
                    </div>
                    <p class="text-sm text-white">2.000+ Orang Berlangganan Setiap Minggu</p>
                </div>
            </div>
        </div>
    </section>


    <!-- Section 2: Testimonials -->
    <section class="bg-gray-100 p-4 md:p-8">
        <div class="container mx-auto">
            <h2 class="text-2xl font-bold mb-6 text-center">Testimoni Member E-learning MySkill</h2>

            <div class="flex overflow-x-auto space-x-4 pb-4 no-scrollbar">
                @foreach($testimonis as $testimoni)
                <div class="bg-white p-4 rounded-2xl shadow-md min-w-[180px] sm:min-w-[200px] md:min-w-[220px]">
                    <div class="flex items-center mb-4">
                        <img class="rounded-lg max-w-[200px]" src="{{ asset('foto_testimoni/' . $testimoni->gambar) }}"/>
                    </div>
                    <a href="{{ $testimoni->link }}">
                        <button class="w-full bg-teal-500 text-white py-2 rounded-md font-semibold">Baca Cerita</button>
                    </a>
                    
                </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- Section 3: Solutions -->
    <section class="bg-white p-4 md:p-8">
        <div class="container mx-auto flex-col items-center text-center">
            <h4 class="text-md">E-Learning</h4>
            <h2 class="text-2xl font-bold mb-6">Solusi #1 Kuasai Ratusan Skill Profesional</h2>
        </div>

        <!-- Carousel Container -->
        <div id="card-container"
            class="flex overflow-x-auto whitespace-wrap w-auto scroll-smooth sm:hidden md:hidden lg:hidden no-scrollbar b-3">
            <!-- Card: Digital Marketing -->
            <div class="flex flex-col w-64 bg-white border border-gray-300 rounded-lg shadow-md mr-4">
                <img src="{{ asset('assets/e-learning/1.webp') }}" alt="Digital Marketing"
                    class="w-full h-auto object-cover rounded-t-lg">
                <div class="p-4 w-64">
                    <h3 class="font-bold mb-2 ">Belajar Fleksibel dan Bersertifikat</h3>
                    <p class="text-sm text-gray-600">Disusun bertahap dari level dasar hingga lanjutan oleh praktisi
                        industri dari berbagai top companies. Dapatkan e-certificate di tiap materi.</p>
                </div>
            </div>
            <!-- Card: Digital Marketing -->
            <div class="flex flex-col w-64 bg-white border border-gray-300 rounded-lg shadow-md mr-4">
                <img src="{{ asset('assets/e-learning/2.webp') }}" alt="Digital Marketing"
                    class="w-full h-auto object-cover rounded-t-lg">
                <div class="p-4 w-64">
                    <h3 class="font-bold mb-2 ">Kombinasi Strategi, Praktek & Portfolio</h3>
                    <p class="text-sm text-gray-600">Belajar sambil Praktek dengan ragam case study, worksheet dan
                        framework. Didasarkan pada kebutuhan industri dan profesi.</p>
                </div>
            </div><!-- Card: Digital Marketing -->
            <div class="flex flex-col w-64 bg-white border border-gray-300 rounded-lg shadow-md mr-4">
                <img src="{{ asset('assets/e-learning/4.webp') }}" alt="Digital Marketing"
                    class="w-full h-auto object-cover rounded-t-lg">
                <div class="p-4 w-64">
                    <h3 class="font-bold mb-2 ">Gabung Komunitas Diskusi secara Lifetime</h3>
                    <p class="text-sm text-gray-600">Bangun network profesional, saling sharing ilmu dan praktik,
                        sampai berbagi info loker maupun freelance. Hobi kumpul juga.</p>
                </div>
            </div><!-- Card: Digital Marketing -->
            <div class="flex flex-col w-64 bg-white border border-gray-300 rounded-lg shadow-md mr-4">
                <img src="{{ asset('assets/e-learning/3.webp') }}" alt="Digital Marketing"
                    class="w-full h-auto object-cover rounded-t-lg">
                <div class="p-4 w-64">
                    <h3 class="font-bold mb-2 ">Ratusan Ribu Member. Terbukti Berdampak</h3>
                    <p class="text-sm text-gray-600">Member MySkill telah terbukti diterima di National & Multinational
                        companies, membangun bisnis hingga freelance.</p>
                </div>
            </div>
        </div>


        <div class="container mx-auto hidden lg:flex md:flex flex-col md:flex-row">
            <!-- Left Column with Cards -->
            <div class="w-full md:w-1/2 flex flex-col space-y-4">
                <div id="card1" data-target="img1"
                    class="cards bg-white border border-gray-300 rounded-xl p-4 transition-transform duration-300 ease-in-out transform hover:scale-105 hover:border-indigo-500 focus:ring-2 focus:ring-light-blue-500 cursor-pointer shadow-md active-card">
                    <h3 class="font-bold mb-2">Belajar Fleksibel dan Bersertifikat</h3>
                    <p class="text-sm text-gray-600">Disusun bertahap dari level dasar hingga lanjutan oleh praktisi
                        industri dari berbagai top companies. Dapatkan e-certificate di tiap materi.</p>
                </div>
                <div id="card2" data-target="img2"
                    class="cards bg-white border border-gray-300 rounded-xl p-4 transition-transform duration-300 ease-in-out transform hover:scale-105 hover:border-indigo-500 focus:ring-2 focus:ring-light-blue-500 cursor-pointer shadow-md">
                    <h3 class="font-bold mb-2">Kombinasi Strategi, Praktek & Portfolio</h3>
                    <p class="text-sm text-gray-600">Belajar sambil Praktek dengan ragam case study, worksheet dan
                        framework. Didasarkan pada kebutuhan industri dan profesi.</p>
                </div>
                <div id="card3" data-target="img3"
                    class="cards bg-white border border-gray-300 rounded-xl p-4 transition-transform duration-300 ease-in-out transform hover:scale-105 hover:border-indigo-500 focus:ring-2 focus:ring-light-blue-500 cursor-pointer shadow-md">
                    <h3 class="font-bold mb-2">Gabung Komunitas Diskusi secara Lifetime</h3>
                    <p class="text-sm text-gray-600">Bangun network profesional, saling sharing ilmu dan praktik,
                        sampai berbagi info loker maupun freelance. Hobi kumpul juga.</p>
                </div>
                <div id="card4" data-target="img4"
                    class="cards bg-white border border-gray-300 rounded-xl p-4 transition-transform duration-300 ease-in-out transform hover:scale-105 hover:border-indigo-500 focus:ring-2 focus:ring-light-blue-500 cursor-pointer shadow-md">
                    <h3 class="font-bold mb-2">Ratusan Ribu Member. Terbukti Berdampak</h3>
                    <p class="text-sm text-gray-600">Member MySkill telah terbukti diterima di National & Multinational
                        companies, membangun bisnis hingga freelance.</p>
                </div>
            </div>
            <!-- Right Column with Images -->
            <div class="w-full md:w-1/2 flex items-center justify-center">
                <!-- Images for the Cards -->
                <div class="w-11/12 h-auto max-w-[90%] object-cover fade-in-left" id="img1">
                    <img src="{{ asset('assets/e-learning/1.webp') }}" alt="Image 1">
                </div>
                <div class="w-11/12 h-auto max-w-[90%] object-cover hidden" id="img2">
                    <img src="{{ asset('assets/e-learning/2.webp') }}" alt="Image 2">
                </div>
                <div class="w-11/12 h-auto max-w-[90%] object-cover hidden" id="img3">
                    <img src="{{ asset('assets/e-learning/4.webp') }}" alt="Image 3">
                </div>
                <div class="w-11/12 h-auto max-w-[90%] object-cover hidden" id="img4">
                    <img src="{{ asset('assets/e-learning/3.webp') }}" alt="Image 4">
                </div>
            </div>
        </div>

    </section>

    {{-- Section 4: Skills --}}
    <section class="bg-gray-100 p-4 md:p-8">
        <div class="container mx-auto text-center">
            <h2 class="text-2xl font-bold mb-4">Ratusan Skill Impian Kini Dalam Genggamanmu</h2>
            <p class="mb-4 text-gray-600">Lihat contoh beberapa materi terpopuler rancangan experts berikut. Materi
                baru
                setiap bulan tanpa tambahan biaya.</p>
            <!-- Buttons -->
            <div class="flex overflow-x-auto space-x-2 pb-2 no-scrollbar mb-5">
                <button id="btn-digitalmarketing"
                    class="tab-button bg-gray-200 text-gray-700 px-4 py-2 rounded-full font-semibold flex-shrink-0 whitespace-nowrap">Digital
                    Marketing</button>
                <button id="btn-datascience"
                    class="tab-button bg-gray-200 text-gray-700 px-4 py-2 rounded-full font-semibold flex-shrink-0 whitespace-nowrap">Data
                    Science & Data Analysis</button>
                <button id="btn-excel"
                    class="tab-button bg-gray-200 text-gray-700 px-4 py-2 rounded-full font-semibold flex-shrink-0 whitespace-nowrap">Microsoft
                    Excel, Word and PowerPoint</button>
                <button id="btn-uiux"
                    class="tab-button bg-gray-200 text-gray-700 px-4 py-2 rounded-full font-semibold flex-shrink-0 whitespace-nowrap">UI-UX
                    Research and Design</button>
                <button id="btn-productmanagement"
                    class="tab-button bg-gray-200 text-gray-700 px-4 py-2 rounded-full font-semibold flex-shrink-0 whitespace-nowrap">Product
                    and Project Management</button>
            </div>

            <!-- Carousel Container -->
            <div class="overflow-x-auto pb-2 no-scrollbar mb-5">
                @include('./myskill/partials.cards-elearning')
            </div>

            <div class="flex justify-center mt-4 gap-4">
                <a href="#pricing" class="scroll-smooth"><button
                        class="bg-yellow-500 text-white px-4 py-2 rounded-full">Mulai Berlangganan</button></a>
                <a href="#learning" class="scroll-smooth"><button
                        class="border border-blue-500 text-blue-500 px-4 py-2 rounded-full">Lihat Semua
                        Materi</button></a>
            </div>
        </div>
    </section>

    <!-- Section 5: Popular Courses -->
    <section id="learning" class="bg-gray-100 p-4 md:p-8">
        <div class="container mx-auto">
            <h2 class="text-2xl font-bold mb-4">Daftar Learning Path Rancangan Experts</h2>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <div
                    class="bg-white p-4 rounded-lg shadow-sm transition-transform duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg">
                    <a href="/e-learning/program">
                        <img src="{{ asset('assets/e-learning/test.webp') }}" alt="Copywriting"
                            class="w-4/5 justify-items-center mx-auto h-auto object-fit rounded-lg mb-2">
                        <h3 class="font-bold text-sm mb-4">Copywriting Introduction</h3>
                        <p class="text-xs text-gray-600 mb-6">VERONICA G.</p>
                        <div class="flex items-center text-xs text-gray-500">
                            <span>5 Video</span>
                            <span class="mx-1">•</span>
                            <span>21.403</span>
                        </div>
                        <div class="flex items-center mt-6">
                            <span class="text-yellow-400 text-sm">★★★★★</span>
                            <span class="ml-1 text-xs text-gray-600">4.7/5</span>
                            <span class="ml-1 text-xs bg-blue-100 text-blue-800 px-1 rounded">1</span>
                        </div>
                    </a>
                </div>
                <div
                    class="bg-white p-4 rounded-lg shadow-sm transition-transform duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg">
                    <img src="{{ asset('assets/e-learning/test.webp') }}" alt="Copywriting"
                        class="w-4/5 justify-items-center mx-auto h-auto object-fit rounded-lg mb-2">
                    <h3 class="font-bold text-sm mb-4">Copywriting Introduction</h3>
                    <p class="text-xs text-gray-600 mb-6">VERONICA G.</p>
                    <div class="flex items-center text-xs text-gray-500">
                        <span>5 Video</span>
                        <span class="mx-1">•</span>
                        <span>21.403</span>
                    </div>
                    <div class="flex items-center mt-6">
                        <span class="text-yellow-400 text-sm">★★★★★</span>
                        <span class="ml-1 text-xs text-gray-600">4.7/5</span>
                        <span class="ml-1 text-xs bg-blue-100 text-blue-800 px-1 rounded">1</span>
                    </div>
                </div>
                <div
                    class="bg-white p-4 rounded-lg shadow-sm transition-transform duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg">
                    <img src="{{ asset('assets/e-learning/test.webp') }}" alt="Copywriting"
                        class="w-4/5 justify-items-center mx-auto h-auto object-fit rounded-lg mb-2">
                    <h3 class="font-bold text-sm mb-4">Copywriting Introduction</h3>
                    <p class="text-xs text-gray-600 mb-6">VERONICA G.</p>
                    <div class="flex items-center text-xs text-gray-500">
                        <span>5 Video</span>
                        <span class="mx-1">•</span>
                        <span>21.403</span>
                    </div>
                    <div class="flex items-center mt-6">
                        <span class="text-yellow-400 text-sm">★★★★★</span>
                        <span class="ml-1 text-xs text-gray-600">4.7/5</span>
                        <span class="ml-1 text-xs bg-blue-100 text-blue-800 px-1 rounded">1</span>
                    </div>
                </div>
                <div
                    class="bg-white p-4 rounded-lg shadow-sm transition-transform duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg">
                    <img src="{{ asset('assets/e-learning/test.webp') }}" alt="Copywriting"
                        class="w-4/5 justify-items-center mx-auto h-auto object-fit rounded-lg mb-2">
                    <h3 class="font-bold text-sm mb-4">Copywriting Introduction</h3>
                    <p class="text-xs text-gray-600 mb-6">VERONICA G.</p>
                    <div class="flex items-center text-xs text-gray-500">
                        <span>5 Video</span>
                        <span class="mx-1">•</span>
                        <span>21.403</span>
                    </div>
                    <div class="flex items-center mt-6">
                        <span class="text-yellow-400 text-sm">★★★★★</span>
                        <span class="ml-1 text-xs text-gray-600">4.7/5</span>
                        <span class="ml-1 text-xs bg-blue-100 text-blue-800 px-1 rounded">1</span>
                    </div>
                </div>
                <div
                    class="bg-white p-4 rounded-lg shadow-sm transition-transform duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg">
                    <img src="{{ asset('assets/e-learning/test.webp') }}" alt="Copywriting"
                        class="w-4/5 justify-items-center mx-auto h-auto object-fit rounded-lg mb-2">
                    <h3 class="font-bold text-sm mb-4">Copywriting Introduction</h3>
                    <p class="text-xs text-gray-600 mb-6">VERONICA G.</p>
                    <div class="flex items-center text-xs text-gray-500">
                        <span>5 Video</span>
                        <span class="mx-1">•</span>
                        <span>21.403</span>
                    </div>
                    <div class="flex items-center mt-6">
                        <span class="text-yellow-400 text-sm">★★★★★</span>
                        <span class="ml-1 text-xs text-gray-600">4.7/5</span>
                        <span class="ml-1 text-xs bg-blue-100 text-blue-800 px-1 rounded">1</span>
                    </div>
                </div>
                <div
                    class="bg-white p-4 rounded-lg shadow-sm transition-transform duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg">
                    <img src="{{ asset('assets/e-learning/test.webp') }}" alt="Copywriting"
                        class="w-4/5 justify-items-center mx-auto h-auto object-fit rounded-lg mb-2">
                    <h3 class="font-bold text-sm mb-4">Copywriting Introduction</h3>
                    <p class="text-xs text-gray-600 mb-6">VERONICA G.</p>
                    <div class="flex items-center text-xs text-gray-500">
                        <span>5 Video</span>
                        <span class="mx-1">•</span>
                        <span>21.403</span>
                    </div>
                    <div class="flex items-center mt-6">
                        <span class="text-yellow-400 text-sm">★★★★★</span>
                        <span class="ml-1 text-xs text-gray-600">4.7/5</span>
                        <span class="ml-1 text-xs bg-blue-100 text-blue-800 px-1 rounded">1</span>
                    </div>
                </div>
                <div
                    class="bg-white p-4 rounded-lg shadow-sm transition-transform duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg">
                    <img src="{{ asset('assets/e-learning/test.webp') }}" alt="Copywriting"
                        class="w-4/5 justify-items-center mx-auto h-auto object-fit rounded-lg mb-2">
                    <h3 class="font-bold text-sm mb-4">Copywriting Introduction</h3>
                    <p class="text-xs text-gray-600 mb-6">VERONICA G.</p>
                    <div class="flex items-center text-xs text-gray-500">
                        <span>5 Video</span>
                        <span class="mx-1">•</span>
                        <span>21.403</span>
                    </div>
                    <div class="flex items-center mt-6">
                        <span class="text-yellow-400 text-sm">★★★★★</span>
                        <span class="ml-1 text-xs text-gray-600">4.7/5</span>
                        <span class="ml-1 text-xs bg-blue-100 text-blue-800 px-1 rounded">1</span>
                    </div>
                </div>
                <div
                    class="bg-white p-4 rounded-lg shadow-sm transition-transform duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg">
                    <img src="{{ asset('assets/e-learning/test.webp') }}" alt="Copywriting"
                        class="w-4/5 justify-items-center mx-auto h-auto object-fit rounded-lg mb-2">
                    <h3 class="font-bold text-sm mb-4">Copywriting Introduction</h3>
                    <p class="text-xs text-gray-600 mb-6">VERONICA G.</p>
                    <div class="flex items-center text-xs text-gray-500">
                        <span>5 Video</span>
                        <span class="mx-1">•</span>
                        <span>21.403</span>
                    </div>
                    <div class="flex items-center mt-6">
                        <span class="text-yellow-400 text-sm">★★★★★</span>
                        <span class="ml-1 text-xs text-gray-600">4.7/5</span>
                        <span class="ml-1 text-xs bg-blue-100 text-blue-800 px-1 rounded">1</span>
                    </div>
                </div>

            </div>
    </section>

    {{-- Section 6: Mentors --}}
    <section class="bg-gray-100 py-12 px-4">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center mb-2">Dibuat oleh Praktisi Profesional Terkurasi. Walk the talk.
            </h2>
            <p class="text-center text-gray-600 mb-8">Belajar langsung dari experienced professional yang mengajarkan
                pengalaman, case study & best practices.</p>

            <div
                class="flex flex-nowrap md:mx-24 justify-start md:justify-between overflow-x-auto pb-6 space-x-4 md:space-x-2 snap-x no-scrollbar">
                <!-- Repeat this card structure for each professional -->
                <div class="snap-start flex-shrink-0 w-40 md:w-48 h-auto relative group">
                    <img src="{{ asset('assets/e-learning/mentors.webp') }}" alt="Professional"
                        class="w-full h-full object-cover rounded-lg">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center rounded-lg">
                        <button
                            class="bg-white text-black py-2 px-4 rounded-full text-sm font-medium hover:bg-gray-200 mt-48 md:mt-64 transition">Lihat
                            Materi</button>
                    </div>
                </div>

                <div class="snap-start flex-shrink-0 w-40 md:w-48 h-auto relative group">
                    <img src="{{ asset('assets/e-learning/mentors2.webp') }}" alt="Professional"
                        class="w-full h-full object-cover rounded-lg">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center rounded-lg">
                        <button
                            class="bg-white text-black py-2 px-4 rounded-full text-sm font-medium hover:bg-gray-200 mt-48 md:mt-64 transition">Lihat
                            Materi</button>
                    </div>
                </div>

                <div class="snap-start flex-shrink-0 w-40 md:w-48 h-auto relative group">
                    <img src="{{ asset('assets/e-learning/mentors3.webp') }}" alt="Professional"
                        class="w-full h-full object-cover rounded-lg">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center rounded-lg">
                        <button
                            class="bg-white text-black py-2 px-4 rounded-full text-sm font-medium hover:bg-gray-200 mt-48 md:mt-64 transition">Lihat
                            Materi</button>
                    </div>
                </div>

                <div class="snap-start flex-shrink-0 w-40 md:w-48 h-auto relative group">
                    <img src="{{ asset('assets/e-learning/mentors4.webp') }}" alt="Professional"
                        class="w-full h-full object-cover rounded-lg">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center rounded-lg">
                        <button
                            class="bg-white text-black py-2 px-4 rounded-full text-sm font-medium hover:bg-gray-200 mt-48 md:mt-64 transition">Lihat
                            Materi</button>
                    </div>
                </div>

                <div class="snap-start flex-shrink-0 w-40 md:w-48 h-auto relative group">
                    <img src="{{ asset('assets/e-learning/mentors5.webp') }}" alt="Professional"
                        class="w-full h-full object-cover rounded-lg">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center rounded-lg">
                        <button
                            class="bg-white text-black py-2 px-4 rounded-full text-sm font-medium hover:bg-gray-200 mt-48 md:mt-64 transition">Lihat
                            Materi</button>
                    </div>
                </div>


                <div class="snap-start flex-shrink-0 w-40 md:w-48 h-auto relative group">
                    <img src="{{ asset('assets/e-learning/mentors6.webp') }}" alt="Professional"
                        class="w-full h-full object-cover rounded-lg">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center rounded-lg">
                        <button
                            class="bg-white text-black py-2 px-4 rounded-full text-sm font-medium hover:bg-gray-200 mt-48 md:mt-64 transition">Lihat
                            Materi</button>
                    </div>
                </div>

                <div class="snap-start flex-shrink-0 w-40 md:w-48 h-auto relative group">
                    <img src="{{ asset('assets/e-learning/mentors7.webp') }}" alt="Professional"
                        class="w-full h-full object-cover rounded-lg">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center rounded-lg">
                        <button
                            class="bg-white text-black py-2 px-4 rounded-full text-sm font-medium hover:bg-gray-200 mt-48 md:mt-64 transition">Lihat
                            Materi</button>
                    </div>
                </div>

                <div class="snap-start flex-shrink-0 w-40 md:w-48 h-auto relative group">
                    <img src="{{ asset('assets/e-learning/mentors8.webp') }}" alt="Professional"
                        class="w-full h-full object-cover rounded-lg">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center rounded-lg">
                        <button
                            class="bg-white text-black py-2 px-4 rounded-full text-sm font-medium hover:bg-gray-200 mt-48 md:mt-64 transition">Lihat
                            Materi</button>
                    </div>
                </div>

                <div class="snap-start flex-shrink-0 w-40 md:w-48 h-auto relative group">
                    <img src="{{ asset('assets/e-learning/mentors9.webp') }}" alt="Professional"
                        class="w-full h-full object-cover rounded-lg">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center rounded-lg">
                        <button
                            class="bg-white text-black py-2 px-4 rounded-full text-sm font-medium hover:bg-gray-200 mt-48 md:mt-64 transition">Lihat
                            Materi</button>
                    </div>
                </div>

                <div class="snap-start flex-shrink-0 w-40 md:w-48 h-auto relative group">
                    <img src="{{ asset('assets/e-learning/mentors10.webp') }}" alt="Professional"
                        class="w-full h-full object-cover rounded-lg">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center rounded-lg">
                        <button
                            class="bg-white text-black py-2 px-4 rounded-full text-sm font-medium hover:bg-gray-200 mt-48 md:mt-64 transition">Lihat
                            Materi</button>
                    </div>
                </div>

                <div class="snap-start flex-shrink-0 w-40 md:w-48 h-auto relative group">
                    <img src="{{ asset('assets/e-learning/mentors.webp') }}" alt="Professional"
                        class="w-full h-full object-cover rounded-lg">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center rounded-lg">
                        <button
                            class="bg-white text-black py-2 px-4 rounded-full text-sm font-medium hover:bg-gray-200 mt-48 md:mt-64 transition">Lihat
                            Materi</button>
                    </div>
                </div>

                <div class="snap-start flex-shrink-0 w-40 md:w-48 h-auto relative group">
                    <img src="{{ asset('assets/e-learning/mentors2.webp') }}" alt="Professional"
                        class="w-full h-full object-cover rounded-lg">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center rounded-lg">
                        <button
                            class="bg-white text-black py-2 px-4 rounded-full text-sm font-medium hover:bg-gray-200 mt-48 md:mt-64 transition">Lihat
                            Materi</button>
                    </div>
                </div>

                <!-- Repeat the above card structure for each professional (total of 7 cards) -->

            </div>
        </div>
    </section>

    <!-- Section 7: Pricing -->
    <section id="pricing" class="bg-gradient-to-b from-blue-100 to-white py-12 px-4">
        <div class="max-w-5xl mx-auto">
            <p class="text-3xl font-bold text-center mb-2">Langganan Sekarang dan Jadi Lebih Hebat</p>
            <p class="text-center mb-8 text-gray-600">Langganan bulanan untuk akses semua materi, tanpa batas. Makin
                lama, makin hemat dan untung banyak.</p>

            <div class="flex flex-col mt-9 md:flex-row gap-6">
                <!-- 12 Bulan Plan -->
                <div class="">
                    <!-- Header -->
                    <div class="bg-blue-500 p-6 rounded-t-lg">
                        <h3 class="text-white text-lg font-semibold mb-1">12 Bulan</h3>
                        <p class="text-blue-100 text-sm mb-2">PAKET VIDEO E-LEARNING</p>
                        <p class="text-white text-sm line-through mb-1">Rp 4.200.000</p>
                        <p class="text-white text-2xl font-bold mb-2">Rp 179.000</p>
                        <p class="text-white text-sm mb-2">Untuk akses semua, setara Rp 7.250 / minggu.</p>
                    </div>

                    <!-- Body -->
                    <div class="p-6 bg-white rounded-b-lg">

                        <ul class="text-gray-800 text-sm mb-6 space-y-2">
                            <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-gray-800" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>1400+ Materi Video</li>
                            <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-gray-800" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>1400+ Modul Praktik Portfolio</li>
                            <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-gray-800" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>Sertifikat di Tiap Materi</li>
                            <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-gray-800" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>Grup Komunitas</li>
                            <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-gray-800" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>FREE 6-12x Webinar Series</li>
                            <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-gray-800" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>Diskon untuk Bootcamp</li>
                        </ul>
                        <a href="/payment">
                            <button class="w-full bg-blue-500 text-white font-semibold py-2 rounded text-sm hover:bg-blue-600 transition-colors">Mulai
                                Berlangganan</button>
                        </a>
                        <p class="text-blue-100 text-xs mt-2">Segera Habis 🔥</p>
                        <div class="w-full h-1 bg-blue-400 rounded mt-1"></div>
                    </div>
                </div>

                <!-- 6 Bulan Plan (Most Popular) -->
                <div class=" bottom-5 border-4 border-yellow-400 rounded-lg relative">
                    <!-- Header -->
                    <div class="bg-teal-600 p-6 rounded-t-lg">
                        <div
                            class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-yellow-400 text-white px-4 py-1 rounded-full text-sm font-semibold">
                            TERPOPULER!
                        </div>
                        <h3 class="text-white text-md font-semibold mb-1">6 Bulan</h3>
                        <p class="text-white text-sm mb-2">PAKET VIDEO E-LEARNING</p>
                        <p class="text-white text-sm line-through mb-1">Rp 2.100.000</p>
                        <p class="text-white text-2xl font-bold mb-2">Rp 99.000</p>
                        <p class="text-white text-sm mb-2">Untuk akses semua, setara Rp 16.500 / bulan.</p>
                    </div>

                    <!-- Body -->
                    <div class="p-6 bg-white rounded-b-lg">
                        <ul class="text-gray-800 text-sm mb-6 space-y-2">
                            <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-teal-500" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>1400+ Materi Video</li>
                            <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-teal-500" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>1400+ Modul Praktik Portfolio</li>
                            <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-teal-500" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>Sertifikat di Tiap Materi</li>
                            <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-teal-500" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>Grup Komunitas</li>
                            <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-teal-500" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>FREE 6-12x Webinar Series</li>
                            <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-teal-500" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>Diskon untuk Bootcamp</li>
                        </ul>
                        <a href="/payment">
                            <button class="w-full bg-blue-500 text-white font-semibold py-2 rounded text-sm hover:bg-blue-600 transition-colors">Mulai
                                Berlangganan</button>
                        </a>
                        <p class="text-gray-700 text-xs mt-2">Segera Habis 🔥</p>
                        <div class="w-3/4 h-1 bg-teal-200 rounded mt-1"></div>
                    </div>
                </div>



                <!-- 1 Bulan Plan -->
                <div class="">
                    <!-- Header -->
                    <div class="bg-blue-500 p-6 rounded-t-lg">
                        <h3 class="text-white text-lg font-semibold mb-1">1 Bulan</h3>
                        <p class="text-blue-100 text-sm mb-2">PAKET VIDEO E-LEARNING</p>
                        <p class="text-white text-sm line-through mb-1">Rp 350.000</p>
                        <p class="text-white text-2xl font-bold mb-2">Rp 29.000</p>
                        <p class="text-white text-sm mb-2">Untuk akses semua, setara Rp 7.250 / minggu.</p>
                    </div>

                    <!-- Body -->
                    <div class="p-6 bg-white rounded-b-lg">
                        <ul class="text-gray-800 text-sm mb-6 space-y-2">
                            <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-gray-800" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>1400+ Materi Video</li>
                            <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-gray-800" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>1400+ Modul Praktik Portfolio</li>
                            <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-gray-800" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evxenodd"></path>
                                </svg>Sertifikat di Tiap Materi</li>
                            <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-gray-800" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>Grup Komunitas</li>
                        </ul>
                        <a href="/payment">
                            <button class="w-full bg-blue-500 text-white font-semibold py-2 rounded text-sm hover:bg-blue-600 transition-colors">Mulai
                                Berlangganan</button>
                        </a>
                        <p class="text-blue-100 text-xs mt-2">Segera Habis 🔥</p>
                        <div class="w-full h-1 bg-blue-400 rounded mt-1"></div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Section 8: Portofolio --}}
    <section class="bg-gray-100 p-4 md:p-8">
        <div class="container mx-auto">
            <h2 class="text-2xl font-bold mb-2 text-center">Portfolio Member MySkill</h2>
            <p class="mb-4 text-gray-600 text-center">Bangun Portfoliomu dengan belajar secara praktikal dan direct di
                MySkill.</p>

            <div class="flex overflow-x-auto space-x-4 pb-4 no-scrollbar">
                <div class="bg-white p-4 rounded-2xl shadow-md min-w-[180px] sm:min-w-[200px] md:min-w-[220px]">
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('assets/e-learning/DM.webp') }}" alt="" class="rounded-lg">
                    </div>
                    <h3 class="font-bold text-sm mb-4">Digital Marketing</h3>
                    <p class="text-xs text-gray-600 mb-2">Marketing Strategy for Pandora Catering</p>
                    <button class="w-full bg-teal-500 text-white py-2 rounded-md font-semibold">Lihat Portofolio</button>

                </div>
                <div class="bg-white p-4 rounded-2xl shadow-md min-w-[180px] sm:min-w-[200px] md:min-w-[220px]">
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('assets/e-learning/UI.webp') }}" alt="" class="rounded-lg">
                    </div>
                    <h3 class="font-bold text-sm mb-4">Digital Marketing</h3>
                    <p class="text-xs text-gray-600 mb-2">Marketing Strategy for Pandora Catering</p>
                    <button class="w-full bg-teal-500 text-white py-2 rounded-md font-semibold">Lihat Portofolio</button>

                </div>
                <div class="bg-white p-4 rounded-2xl shadow-md min-w-[180px] sm:min-w-[200px] md:min-w-[220px]">
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('assets/e-learning/DA.webp') }}" alt="" class="rounded-lg">
                    </div>
                    <h3 class="font-bold text-sm mb-4">Digital Marketing</h3>
                    <p class="text-xs text-gray-600 mb-2">Marketing Strategy for Pandora Catering</p>
                    <button class="w-full bg-teal-500 text-white py-2 rounded-md font-semibold">Lihat Portofolio</button>

                </div>
                <div class="bg-white p-4 rounded-2xl shadow-md min-w-[180px] sm:min-w-[200px] md:min-w-[220px]">
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('assets/e-learning/ME.webp') }}" alt="" class="rounded-lg">
                    </div>
                    <h3 class="font-bold text-sm mb-4">Digital Marketing</h3>
                    <p class="text-xs text-gray-600 mb-2">Marketing Strategy for Pandora Catering</p>
                    <button class="w-full bg-teal-500 text-white py-2 rounded-md font-semibold">Lihat Portofolio</button>

                </div>
                <div class="bg-white p-4 rounded-2xl shadow-md min-w-[180px] sm:min-w-[200px] md:min-w-[220px]">
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('assets/e-learning/DA.webp') }}" alt="" class="rounded-lg">
                    </div>
                    <h3 class="font-bold text-sm mb-4">Digital Marketing</h3>
                    <p class="text-xs text-gray-600 mb-2">Marketing Strategy for Pandora Catering</p>
                    <button class="w-full bg-teal-500 text-white py-2 rounded-md font-semibold">Lihat Portofolio</button>

                </div>
                <div class="bg-white p-4 rounded-2xl shadow-md min-w-[180px] sm:min-w-[200px] md:min-w-[220px]">
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('assets/e-learning/DM.webp') }}" alt="" class="rounded-lg">
                    </div>
                    <h3 class="font-bold text-sm mb-4">Digital Marketing</h3>
                    <p class="text-xs text-gray-600 mb-2">Marketing Strategy for Pandora Catering</p>
                    <button class="w-full bg-teal-500 text-white py-2 rounded-md font-semibold">Lihat Portofolio</button>
                </div>
                <div class="bg-white p-4 rounded-2xl shadow-md min-w-[180px] sm:min-w-[200px] md:min-w-[220px]">
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('assets/e-learning/UI.webp') }}" alt="" class="rounded-lg">
                    </div>
                    <h3 class="font-bold text-sm mb-4">Digital Marketing</h3>
                    <p class="text-xs text-gray-600 mb-2">Marketing Strategy for Pandora Catering</p>
                    <button class="w-full bg-teal-500 text-white py-2 rounded-md font-semibold">Lihat Portofolio</button>

                </div>
                <div class="bg-white p-4 rounded-2xl shadow-md min-w-[180px] sm:min-w-[200px] md:min-w-[220px]">
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('assets/e-learning/ME.webp') }}" alt="" class="rounded-lg">
                    </div>
                    <h3 class="font-bold text-sm mb-4">Digital Marketing</h3>
                    <p class="text-xs text-gray-600 mb-2">Marketing Strategy for Pandora Catering</p>
                    <button class="w-full bg-teal-500 text-white py-2 rounded-md font-semibold">Lihat Portofolio</button>

                </div>
                <div class="bg-white p-4 rounded-2xl shadow-md min-w-[180px] sm:min-w-[200px] md:min-w-[220px]">
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('assets/e-learning/DM.webp') }}" alt="" class="rounded-lg">
                    </div>
                    <h3 class="font-bold text-sm mb-4">Digital Marketing</h3>
                    <p class="text-xs text-gray-600 mb-2">Marketing Strategy for Pandora Catering</p>
                    <button class="w-full bg-teal-500 text-white py-2 rounded-md font-semibold">Lihat Portofolio</button>

                </div>
                <div class="bg-white p-4 rounded-2xl shadow-md min-w-[180px] sm:min-w-[200px] md:min-w-[220px]">
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('assets/e-learning/DA.webp') }}" alt="" class="rounded-lg">
                    </div>
                    <h3 class="font-bold text-sm mb-4">Digital Marketing</h3>
                    <p class="text-xs text-gray-600 mb-2">Marketing Strategy for Pandora Catering</p>
                    <button class="w-full bg-teal-500 text-white py-2 rounded-md font-semibold">Lihat Portofolio</button>

                </div>
                <div class="bg-white p-4 rounded-2xl shadow-md min-w-[180px] sm:min-w-[200px] md:min-w-[220px]">
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('assets/e-learning/UI.webp') }}" alt="" class="rounded-lg">
                    </div>
                    <h3 class="font-bold text-sm mb-4">Digital Marketing</h3>
                    <p class="text-xs text-gray-600 mb-2">Marketing Strategy for Pandora Catering</p>
                    <button class="w-full bg-teal-500 text-white py-2 rounded-md font-semibold">Lihat Portofolio</button>

                </div>
            </div>
        </div>
    </section>

    <!-- akses konten premium -->
    <section class="w-full h-auto rounded-b-3xl bg-white lg:flex items-center mt-12 mb-14 p-4">
        <img src="{{ asset('./assets/bootcamp/pembelajaran.png') }}" class="h-72 w-100 lg:ml-20 mx-auto py-4">
        <div class="mx-auto">
            <p class="text-4xl font-bold w-4/5 ml-4">E-learning & Training Untuk Perusahaan</p>
            <br>
            <p class="w-4/5 ml-4">Miliki akses ratusan konten elearning MySkill serta dukungan corporate training untuk
                perusahaan.
                Miliki juga berbagai fitur khusus untuk mendorong employee performance and development.</p>
            <br>
            <a href="/corporate-service" type="button"
                class="ml-4 focus:outline-none text-black bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-4 py-3 me-2 mb-2 dark:focus:ring-yellow-900">Hubungi
                Tim MySkill</a>
        </div>

    </section>

</section>