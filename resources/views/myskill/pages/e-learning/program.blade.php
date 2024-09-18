@extends('./myskill/layouts.main')
@section('container')
    <section class="e-learning w-screen">
        <!-- Section Main -->
        <section class="bg-gradient-to-b from-orange-400 to-red-500 p-4 md:p-8 w-screen">
            <div class="container mx-auto">
                <div class="flex flex-col md:flex-col lg:flex-row items-center">
                    <img src="{{ asset('assets/e-learning/header.webp') }}" alt="Woman with laptop"
                        class="mb-4 md:mb-4 w-full h-auto max-sm:max-w-xs md:max-w-sm lg:w-1/2 rounded-lg">

                    <div class="text-center max-sm:text-start md:text-start lg:ml-6 lg:text-left">
                        <h1 class="text-3xl md:text-4xl font-bold mb-4 text-white max">{{ $category->nama_kategori }}</h1>
                        <p class="text-sm md:text-base text-white mb-4">
                            <i class="fa-solid fa-book-open mr-1"></i>12 Topik <i class="fa-solid fa-list ml-2"></i>
                            @foreach ($kategoriProgram->materi as $materi)
                                {{ $kategoriProgram->materi->count() }} Materi
                            @endforeach
                        </p>
                        <p class="text-sm md:text-base text-white mb-4">
                            🎯 Belajar & praktek 140+ materi tentang Marketing Management, Brand Strategy, Copywriting,
                            Social Media, Campaign, Facebook Ads, Google Ads, TikTok Ads, SEO, CRM dan Influencer Marketing.
                        </p>
                        <p class="text-sm md:text-base font-semibold text-white mb-4">
                            ✅ Testimoni Tutor:
                        </p>
                        <p class="text-sm md:text-base text-white">
                            "Materi ini saya rancang dari 10 tahun lebih berkecimpung di multinational marketing agency dan
                            tech companies. Terstruktur dan sesuai standar industri terkini. Yuk mulai menyelami materinya!"
                        <p class="text-sm md:text-base font-semibold text-white mb-4"> - Ryan Dwana, Business Director at
                            Initiative - Global Media Agency. </p>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- section 2 : Horizontal scrollbar -->
        <section class="mt-8 lg:ml-6 overflow-x-auto flex gap-6 p-4 w-screen no-scrollbar">
            <!-- text area 1 -->
            <div class="flex-shrink-0 px-2 min-w-[16rem]">
                <article class="bg-white rounded-lg text-balance shadow-md p-4 md:p-6 w-64">
                    <h3 class="font-semibold text-md">Materi</h3>
                    <div class="h-1 w-12 bg-orange-500 mt-1 mb-2"></div>
                    <p class="text-gray-800 text-sm">Kuasai 140+ skill Digital Marketing, mulai dari membuat copywriting dan
                        konten hingga optimalisasi berbagai channel seperti Social Media, Ads, SEO, dan CRM. Dibuat oleh
                        para top companies untuk perkembangan.</p>
                </article>
            </div>
            <!-- text area 2 -->
            <div class="flex-shrink-0 px-2 min-w-[16rem]">
                <article class="bg-white rounded-lg text-balance shadow-md p-4 md:p-6 w-64">
                    <h3 class="font-semibold text-lg">Praktik</h3>
                    <div class="h-1 w-12 bg-orange-500 mt-1 mb-2"></div>
                    <p class="text-gray-800 text-sm">Puluhan project buatan praktisi yang disesuaikan dengan kebutuhan
                        industri sebagai portfoliomu. Jadikan dirimu lebih unggul untuk melamar kerja, freelance, rintis
                        bisnis hingga mengembangkan karir.</p>
                </article>
            </div>
            <!-- text area 3 -->
            <div class="flex-shrink-0 px-2 min-w-[16rem]">
                <article class="bg-white rounded-lg text-balance shadow-md p-4 md:p-6 w-64">
                    <h3 class="font-semibold text-lg">Benefit</h3>
                    <div class="h-1 w-12 bg-orange-500 mt-1 mb-2"></div>
                    <p class="text-gray-800 text-sm">Dapatkan Sertifikat tiap menyelesaikan materi. Modul Praktik untuk
                        Portfolio. Pre & Post Test untuk uji pemahaman. Gabung Grup Komunitas untuk berdiskusi. Short Class
                        Gratis Bulanan yang bersertifikat.</p>
                </article>
            </div>
            <!-- text area 4 -->
            <div class="flex-shrink-0 px-2 min-w-[16rem]">
                <article class="bg-white rounded-lg text-balance shadow-md p-4 md:p-6 w-64">
                    <h3 class="font-semibold text-lg">Persyaratan</h3>
                    <div class="h-1 w-12 bg-orange-500 mt-1 mb-2"></div>
                    <p class="text-gray-800 text-sm">Tidak harus memiliki background pendidikan tertentu. Tutor akan
                        mengajarimu dari level dasar hingga lanjut dengan kombinasi konsep, studi kasus dan praktik. Video
                        bisa dipelajari dengan berbagai device.</p>
                </article>
            </div>
        </section>

        <!-- Section 3 : Program Lainnya -->
        <section class="w-screen">
            <div
                class="flex flex-col sm:flex-row items-start sm:items-center justify-between lg:px-12 md:px-10 max-sm:px-8 py-4 w-screen">
                <h2 class="text-xl font-bold mb-2 sm:mb-0 ">Marketing Management</h2>
                <br class="max-sm:hidden md:hidden">
                <div class="w-full sm:flex-1 border-t-2 border-orange-500 mb-2 sm:mb-0 sm:mx-4"></div>
                <button class="bg-orange-500 font-bold text-white px-1 lg:mr-10 sm:px-4 py-1 rounded-md flex items-center">
                    Selengkapnya <i class="fa-solid fa-arrow-right ml-2"></i>
                </button>
            </div>
            <!-- program lainnya disini -->
            <div name="mb-8" class="overflow-x-auto no-scrollbar w-screen md:p-4 max-sm:p-4">
                <div class="flex space-x-4 w-max lg:px-12 max-sm:px-4 py-3">
                    <!-- Item Bootcamp 1 -->
                    @foreach ($kategoriProgram->materi as $materi)
                        <div
                            class="bg-white rounded-lg shadow-md lg:ml-0 lg:p-4 max-sm:p-2 max-sm:w-40 lg:w-48 flex flex-col justify-between md:ml-6 md:p-4">
                            <a href="{{ url('/e-learning/materi/' . $materi->id_materi) }}">
                            <img src="{{ asset('./assets/bootcamp/contentdummy.png') }}" class="h-34 w-full rounded-sm">
                            <p class="mt-2 text-gray-700 font-bold lg:text-lg max-sm:text-base max-sm:truncate">
                                {{ $materi->nama_materi }}</p>
                            <div class="flex flex-col mt-2 text-gray-500">
                                <div class="flex items-center">
                                    <i class="fa-solid fa-film mr-2"></i>
                                    <p class="text-sm">5 Video</p>
                                </div>
                                <div class="flex items-center">
                                    <i class="fa-solid fa-user-group mr-1"></i>
                                    <p class="text-sm">{{ $materi->rating_count }}</p>
                                </div>
                                <div class="flex items-center">
                                    <i class="fa-regular fa-star mr-1"></i>
                                    <p class="text-sm">{{ $materi->rating }}/5</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
        </section>
        <!-- Section 4 : Program Lainnya -->
        <section class="w-screen">
            <div
                class="flex flex-col sm:flex-row items-start sm:items-center justify-between lg:px-12 md:px-10 max-sm:px-8 py-4 w-screen">
                <h2 class="text-xl font-bold mb-2 sm:mb-0 ">Creative Copywriting</h2>
                <br class="max-sm:hidden md:hidden">
                <div class="w-full sm:flex-1 border-t-2 border-orange-500 mb-2 sm:mb-0 sm:mx-4"></div>
                <button class="bg-orange-500 font-bold text-white px-1 lg:mr-10 sm:px-4 py-1 rounded-md flex items-center">
                    Selengkapnya <i class="fa-solid fa-arrow-right ml-2"></i>
                </button>
            </div>
            <!-- program lainnya disini -->
            <div name="mb-8" class="overflow-x-auto no-scrollbar w-screen md:p-4 max-sm:p-4">
                <div class="flex space-x-4 w-max lg:px-12 max-sm:px-4 py-3">
                    <!-- Item Bootcamp 1 -->
                    <div
                        class="bg-white rounded-lg shadow-md lg:ml-0 lg:p-4 max-sm:p-2 max-sm:w-40 lg:w-48 flex flex-col justify-between md:ml-6 md:p-4">
                        <img src="{{ asset('./assets/bootcamp/contentdummy.png') }}" class="h-34 w-full rounded-sm">
                        <p class="mt-2 text-gray-700 font-bold lg:text-lg max-sm:text-base max-sm:truncate">Marketing
                            Introduction</p>
                        <div class="flex flex-col mt-2 text-gray-500">
                            <div class="flex items-center">
                                <i class="fa-solid fa-film mr-2"></i>
                                <p class="text-sm">5 Video</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-solid fa-user-group mr-1"></i>
                                <p class="text-sm">50.000</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-regular fa-star mr-1"></i>
                                <p class="text-sm">4.85/5</p>
                            </div>
                        </div>
                    </div>
                    <!-- Item Bootcamp 2 -->
                    <div
                        class="bg-white rounded-lg shadow-md lg:ml-0 lg:p-4 max-sm:p-2 max-sm:w-40 lg:w-48 flex flex-col justify-between md:ml-6 md:p-4">
                        <img src="{{ asset('./assets/bootcamp/contentdummy.png') }}" class="h-34 w-full rounded-sm">
                        <p class="mt-2 text-gray-700 font-bold lg:text-lg max-sm:text-base max-sm:truncate">Marketing
                            Introduction</p>
                        <div class="flex flex-col mt-2 text-gray-500">
                            <div class="flex items-center">
                                <i class="fa-solid fa-film mr-2"></i>
                                <p class="text-sm">5 Video</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-solid fa-user-group mr-1"></i>
                                <p class="text-sm">50.000</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-regular fa-star mr-1"></i>
                                <p class="text-sm">4.85/5</p>
                            </div>
                        </div>
                    </div>
                    <!-- Item Bootcamp 3 -->
                    <div
                        class="bg-white rounded-lg shadow-md lg:ml-0 lg:p-4 max-sm:p-2 max-sm:w-40 lg:w-48 flex flex-col justify-between md:ml-6 md:p-4">
                        <img src="{{ asset('./assets/bootcamp/contentdummy.png') }}" class="h-34 w-full rounded-sm">
                        <p class="mt-2 text-gray-700 font-bold lg:text-lg max-sm:text-base max-sm:truncate">Marketing
                            Introduction</p>
                        <div class="flex flex-col mt-2 text-gray-500">
                            <div class="flex items-center">
                                <i class="fa-solid fa-film mr-2"></i>
                                <p class="text-sm">5 Video</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-solid fa-user-group mr-1"></i>
                                <p class="text-sm">50.000</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-regular fa-star mr-1"></i>
                                <p class="text-sm">4.85/5</p>
                            </div>
                        </div>
                    </div>
                    <!-- Item Bootcamp 4 -->
                    <div
                        class="bg-white rounded-lg shadow-md lg:ml-0 lg:p-4 max-sm:p-2 max-sm:w-40 lg:w-48 flex flex-col justify-between md:ml-6 md:p-4">
                        <img src="{{ asset('./assets/bootcamp/contentdummy.png') }}" class="h-34 w-full rounded-sm">
                        <p class="mt-2 text-gray-700 font-bold lg:text-lg max-sm:text-base max-sm:truncate">Marketing
                            Introduction</p>
                        <div class="flex flex-col mt-2 text-gray-500">
                            <div class="flex items-center">
                                <i class="fa-solid fa-film mr-2"></i>
                                <p class="text-sm">5 Video</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-solid fa-user-group mr-1"></i>
                                <p class="text-sm">50.000</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-regular fa-star mr-1"></i>
                                <p class="text-sm">4.85/5</p>
                            </div>
                        </div>
                    </div>
                    <!-- Item Bootcamp 5 -->
                    <div
                        class="bg-white rounded-lg shadow-md lg:ml-0 lg:p-4 max-sm:p-2 max-sm:w-40 lg:w-48 flex flex-col justify-between md:ml-6 md:p-4">
                        <img src="{{ asset('./assets/bootcamp/contentdummy.png') }}" class="h-34 w-full rounded-sm">
                        <p class="mt-2 text-gray-700 font-bold lg:text-lg max-sm:text-base max-sm:truncate">Marketing
                            Introduction</p>
                        <div class="flex flex-col mt-2 text-gray-500">
                            <div class="flex items-center">
                                <i class="fa-solid fa-film mr-2"></i>
                                <p class="text-sm">5 Video</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-solid fa-user-group mr-1"></i>
                                <p class="text-sm">50.000</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-regular fa-star mr-1"></i>
                                <p class="text-sm">4.85/5</p>
                            </div>
                        </div>
                    </div>
                    <!-- Item Bootcamp 6 -->
                    <div
                        class="bg-white rounded-lg shadow-md lg:ml-0 lg:p-4 max-sm:p-2 max-sm:w-40 lg:w-48 flex flex-col justify-between md:ml-6 md:p-4">
                        <img src="{{ asset('./assets/bootcamp/contentdummy.png') }}" class="h-34 w-full rounded-sm">
                        <p class="mt-2 text-gray-700 font-bold lg:text-lg max-sm:text-base max-sm:truncate">Marketing
                            Introduction</p>
                        <div class="flex flex-col mt-2 text-gray-500">
                            <div class="flex items-center">
                                <i class="fa-solid fa-film mr-2"></i>
                                <p class="text-sm">5 Video</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-solid fa-user-group mr-1"></i>
                                <p class="text-sm">50.000</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-regular fa-star mr-1"></i>
                                <p class="text-sm">4.85/5</p>
                            </div>
                        </div>
                    </div>
                    <!-- Item Bootcamp 7 -->
                    <div
                        class="bg-white rounded-lg shadow-md lg:ml-0 lg:p-4 max-sm:p-2 max-sm:w-40 lg:w-48 flex flex-col justify-between md:ml-6 md:p-4">
                        <img src="{{ asset('./assets/bootcamp/contentdummy.png') }}" class="h-34 w-full rounded-sm">
                        <p class="mt-2 text-gray-700 font-bold lg:text-lg max-sm:text-base max-sm:truncate">Marketing
                            Introduction</p>
                        <div class="flex flex-col mt-2 text-gray-500">
                            <div class="flex items-center">
                                <i class="fa-solid fa-film mr-2"></i>
                                <p class="text-sm">5 Video</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-solid fa-user-group mr-1"></i>
                                <p class="text-sm">50.000</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-regular fa-star mr-1"></i>
                                <p class="text-sm">4.85/5</p>
                            </div>
                        </div>
                    </div>
                    <!-- Item More -->
                    <a href="/e-learning">
                        <div
                            class="w-screen bg-gray-100 rounded-lg shadow-md lg:p-4 lg:w-48 max-sm:w-40 max-sm:h-56 md:w-48 md:h-48 flex flex-col justify-center items-center md:p-4">
                            <p class="lg:text-4xl max-sm:text-center max-sm:text-2xl md:text-6xl text-gray-400 mb-4">+</p>
                            <p class="text-gray-500 max-sm:text-center md:text-center">lihat bootcamp lainnya...</p>
                        </div>
                    </a>
                </div>
            </div>
        </section>
        <!-- Section 5 : Program Lainnya -->
        <section class="w-screen">
            <div
                class="flex flex-col sm:flex-row items-start sm:items-center justify-between lg:px-12 md:px-10 max-sm:px-8 py-4 w-screen">
                <h2 class="text-xl font-bold mb-2 sm:mb-0 ">Social Media Marketing</h2>
                <br class="max-sm:hidden md:hidden">
                <div class="w-full sm:flex-1 border-t-2 border-orange-500 mb-2 sm:mb-0 sm:mx-4"></div>
                <button class="bg-orange-500 font-bold text-white px-1 lg:mr-10 sm:px-4 py-1 rounded-md flex items-center">
                    Selengkapnya <i class="fa-solid fa-arrow-right ml-2"></i>
                </button>
            </div>
            <!-- program lainnya disini -->
            <div name="mb-8" class="overflow-x-auto no-scrollbar w-screen md:p-4 max-sm:p-4">
                <div class="flex space-x-4 w-max lg:px-12 max-sm:px-4 py-3">
                    <!-- Item Bootcamp 1 -->
                    <div
                        class="bg-white rounded-lg shadow-md lg:ml-0 lg:p-4 max-sm:p-2 max-sm:w-40 lg:w-48 flex flex-col justify-between md:ml-6 md:p-4">
                        <img src="{{ asset('./assets/bootcamp/contentdummy.png') }}" class="h-34 w-full rounded-sm">
                        <p class="mt-2 text-gray-700 font-bold lg:text-lg max-sm:text-base max-sm:truncate">Marketing
                            Introduction</p>
                        <div class="flex flex-col mt-2 text-gray-500">
                            <div class="flex items-center">
                                <i class="fa-solid fa-film mr-2"></i>
                                <p class="text-sm">5 Video</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-solid fa-user-group mr-1"></i>
                                <p class="text-sm">50.000</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-regular fa-star mr-1"></i>
                                <p class="text-sm">4.85/5</p>
                            </div>
                        </div>
                    </div>
                    <!-- Item Bootcamp 2 -->
                    <div
                        class="bg-white rounded-lg shadow-md lg:ml-0 lg:p-4 max-sm:p-2 max-sm:w-40 lg:w-48 flex flex-col justify-between md:ml-6 md:p-4">
                        <img src="{{ asset('./assets/bootcamp/contentdummy.png') }}" class="h-34 w-full rounded-sm">
                        <p class="mt-2 text-gray-700 font-bold lg:text-lg max-sm:text-base max-sm:truncate">Marketing
                            Introduction</p>
                        <div class="flex flex-col mt-2 text-gray-500">
                            <div class="flex items-center">
                                <i class="fa-solid fa-film mr-2"></i>
                                <p class="text-sm">5 Video</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-solid fa-user-group mr-1"></i>
                                <p class="text-sm">50.000</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-regular fa-star mr-1"></i>
                                <p class="text-sm">4.85/5</p>
                            </div>
                        </div>
                    </div>
                    <!-- Item Bootcamp 3 -->
                    <div
                        class="bg-white rounded-lg shadow-md lg:ml-0 lg:p-4 max-sm:p-2 max-sm:w-40 lg:w-48 flex flex-col justify-between md:ml-6 md:p-4">
                        <img src="{{ asset('./assets/bootcamp/contentdummy.png') }}" class="h-34 w-full rounded-sm">
                        <p class="mt-2 text-gray-700 font-bold lg:text-lg max-sm:text-base max-sm:truncate">Marketing
                            Introduction</p>
                        <div class="flex flex-col mt-2 text-gray-500">
                            <div class="flex items-center">
                                <i class="fa-solid fa-film mr-2"></i>
                                <p class="text-sm">5 Video</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-solid fa-user-group mr-1"></i>
                                <p class="text-sm">50.000</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-regular fa-star mr-1"></i>
                                <p class="text-sm">4.85/5</p>
                            </div>
                        </div>
                    </div>
                    <!-- Item Bootcamp 4 -->
                    <div
                        class="bg-white rounded-lg shadow-md lg:ml-0 lg:p-4 max-sm:p-2 max-sm:w-40 lg:w-48 flex flex-col justify-between md:ml-6 md:p-4">
                        <img src="{{ asset('./assets/bootcamp/contentdummy.png') }}" class="h-34 w-full rounded-sm">
                        <p class="mt-2 text-gray-700 font-bold lg:text-lg max-sm:text-base max-sm:truncate">Marketing
                            Introduction</p>
                        <div class="flex flex-col mt-2 text-gray-500">
                            <div class="flex items-center">
                                <i class="fa-solid fa-film mr-2"></i>
                                <p class="text-sm">5 Video</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-solid fa-user-group mr-1"></i>
                                <p class="text-sm">50.000</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-regular fa-star mr-1"></i>
                                <p class="text-sm">4.85/5</p>
                            </div>
                        </div>
                    </div>
                    <!-- Item Bootcamp 5 -->
                    <div
                        class="bg-white rounded-lg shadow-md lg:ml-0 lg:p-4 max-sm:p-2 max-sm:w-40 lg:w-48 flex flex-col justify-between md:ml-6 md:p-4">
                        <img src="{{ asset('./assets/bootcamp/contentdummy.png') }}" class="h-34 w-full rounded-sm">
                        <p class="mt-2 text-gray-700 font-bold lg:text-lg max-sm:text-base max-sm:truncate">Marketing
                            Introduction</p>
                        <div class="flex flex-col mt-2 text-gray-500">
                            <div class="flex items-center">
                                <i class="fa-solid fa-film mr-2"></i>
                                <p class="text-sm">5 Video</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-solid fa-user-group mr-1"></i>
                                <p class="text-sm">50.000</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-regular fa-star mr-1"></i>
                                <p class="text-sm">4.85/5</p>
                            </div>
                        </div>
                    </div>
                    <!-- Item Bootcamp 6 -->
                    <div
                        class="bg-white rounded-lg shadow-md lg:ml-0 lg:p-4 max-sm:p-2 max-sm:w-40 lg:w-48 flex flex-col justify-between md:ml-6 md:p-4">
                        <img src="{{ asset('./assets/bootcamp/contentdummy.png') }}" class="h-34 w-full rounded-sm">
                        <p class="mt-2 text-gray-700 font-bold lg:text-lg max-sm:text-base max-sm:truncate">Marketing
                            Introduction</p>
                        <div class="flex flex-col mt-2 text-gray-500">
                            <div class="flex items-center">
                                <i class="fa-solid fa-film mr-2"></i>
                                <p class="text-sm">5 Video</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-solid fa-user-group mr-1"></i>
                                <p class="text-sm">50.000</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-regular fa-star mr-1"></i>
                                <p class="text-sm">4.85/5</p>
                            </div>
                        </div>
                    </div>
                    <!-- Item Bootcamp 7 -->
                    <div
                        class="bg-white rounded-lg shadow-md lg:ml-0 lg:p-4 max-sm:p-2 max-sm:w-40 lg:w-48 flex flex-col justify-between md:ml-6 md:p-4">
                        <img src="{{ asset('./assets/bootcamp/contentdummy.png') }}" class="h-34 w-full rounded-sm">
                        <p class="mt-2 text-gray-700 font-bold lg:text-lg max-sm:text-base max-sm:truncate">Marketing
                            Introduction</p>
                        <div class="flex flex-col mt-2 text-gray-500">
                            <div class="flex items-center">
                                <i class="fa-solid fa-film mr-2"></i>
                                <p class="text-sm">5 Video</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-solid fa-user-group mr-1"></i>
                                <p class="text-sm">50.000</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-regular fa-star mr-1"></i>
                                <p class="text-sm">4.85/5</p>
                            </div>
                        </div>
                    </div>
                    <!-- Item More -->
                    <a href="/e-learning">
                        <div
                            class="w-screen bg-gray-100 rounded-lg shadow-md lg:p-4 lg:w-48 max-sm:w-40 max-sm:h-56 md:w-48 md:h-48 flex flex-col justify-center items-center md:p-4">
                            <p class="lg:text-4xl max-sm:text-center max-sm:text-2xl md:text-6xl text-gray-400 mb-4">+</p>
                            <p class="text-gray-500 max-sm:text-center md:text-center">lihat bootcamp lainnya...</p>
                        </div>
                    </a>
                </div>
            </div>
        </section>
        <!-- Section 6: Program Lainnya -->
        <section class="w-screen">
            <div
                class="flex flex-col sm:flex-row items-start sm:items-center justify-between lg:px-12 md:px-10 max-sm:px-8 py-4 w-screen">
                <h2 class="text-xl font-bold mb-2 sm:mb-0 ">Campaign and Media Planning</h2>
                <br class="max-sm:hidden md:hidden">
                <div class="w-full sm:flex-1 border-t-2 border-orange-500 mb-2 sm:mb-0 sm:mx-4"></div>
                <button class="bg-orange-500 font-bold text-white px-1 lg:mr-10 sm:px-4 py-1 rounded-md flex items-center">
                    Selengkapnya <i class="fa-solid fa-arrow-right ml-2"></i>
                </button>
            </div>
            <!-- program lainnya disini -->
            <div name="mb-8" class="overflow-x-auto no-scrollbar w-screen md:p-4 max-sm:p-4">
                <div class="flex space-x-4 w-max lg:px-12 max-sm:px-4 py-3">
                    <!-- Item Bootcamp 1 -->
                    <div
                        class="bg-white rounded-lg shadow-md lg:ml-0 lg:p-4 max-sm:p-2 max-sm:w-40 lg:w-48 flex flex-col justify-between md:ml-6 md:p-4">
                        <img src="{{ asset('./assets/bootcamp/contentdummy.png') }}" class="h-34 w-full rounded-sm">
                        <p class="mt-2 text-gray-700 font-bold lg:text-lg max-sm:text-base max-sm:truncate">Marketing
                            Introduction</p>
                        <div class="flex flex-col mt-2 text-gray-500">
                            <div class="flex items-center">
                                <i class="fa-solid fa-film mr-2"></i>
                                <p class="text-sm">5 Video</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-solid fa-user-group mr-1"></i>
                                <p class="text-sm">50.000</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-regular fa-star mr-1"></i>
                                <p class="text-sm">4.85/5</p>
                            </div>
                        </div>
                    </div>
                    <!-- Item Bootcamp 2 -->
                    <div
                        class="bg-white rounded-lg shadow-md lg:ml-0 lg:p-4 max-sm:p-2 max-sm:w-40 lg:w-48 flex flex-col justify-between md:ml-6 md:p-4">
                        <img src="{{ asset('./assets/bootcamp/contentdummy.png') }}" class="h-34 w-full rounded-sm">
                        <p class="mt-2 text-gray-700 font-bold lg:text-lg max-sm:text-base max-sm:truncate">Marketing
                            Introduction</p>
                        <div class="flex flex-col mt-2 text-gray-500">
                            <div class="flex items-center">
                                <i class="fa-solid fa-film mr-2"></i>
                                <p class="text-sm">5 Video</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-solid fa-user-group mr-1"></i>
                                <p class="text-sm">50.000</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-regular fa-star mr-1"></i>
                                <p class="text-sm">4.85/5</p>
                            </div>
                        </div>
                    </div>
                    <!-- Item Bootcamp 3 -->
                    <div
                        class="bg-white rounded-lg shadow-md lg:ml-0 lg:p-4 max-sm:p-2 max-sm:w-40 lg:w-48 flex flex-col justify-between md:ml-6 md:p-4">
                        <img src="{{ asset('./assets/bootcamp/contentdummy.png') }}" class="h-34 w-full rounded-sm">
                        <p class="mt-2 text-gray-700 font-bold lg:text-lg max-sm:text-base max-sm:truncate">Marketing
                            Introduction</p>
                        <div class="flex flex-col mt-2 text-gray-500">
                            <div class="flex items-center">
                                <i class="fa-solid fa-film mr-2"></i>
                                <p class="text-sm">5 Video</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-solid fa-user-group mr-1"></i>
                                <p class="text-sm">50.000</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-regular fa-star mr-1"></i>
                                <p class="text-sm">4.85/5</p>
                            </div>
                        </div>
                    </div>
                    <!-- Item Bootcamp 4 -->
                    <div
                        class="bg-white rounded-lg shadow-md lg:ml-0 lg:p-4 max-sm:p-2 max-sm:w-40 lg:w-48 flex flex-col justify-between md:ml-6 md:p-4">
                        <img src="{{ asset('./assets/bootcamp/contentdummy.png') }}" class="h-34 w-full rounded-sm">
                        <p class="mt-2 text-gray-700 font-bold lg:text-lg max-sm:text-base max-sm:truncate">Marketing
                            Introduction</p>
                        <div class="flex flex-col mt-2 text-gray-500">
                            <div class="flex items-center">
                                <i class="fa-solid fa-film mr-2"></i>
                                <p class="text-sm">5 Video</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-solid fa-user-group mr-1"></i>
                                <p class="text-sm">50.000</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-regular fa-star mr-1"></i>
                                <p class="text-sm">4.85/5</p>
                            </div>
                        </div>
                    </div>
                    <!-- Item Bootcamp 5 -->
                    <div
                        class="bg-white rounded-lg shadow-md lg:ml-0 lg:p-4 max-sm:p-2 max-sm:w-40 lg:w-48 flex flex-col justify-between md:ml-6 md:p-4">
                        <img src="{{ asset('./assets/bootcamp/contentdummy.png') }}" class="h-34 w-full rounded-sm">
                        <p class="mt-2 text-gray-700 font-bold lg:text-lg max-sm:text-base max-sm:truncate">Marketing
                            Introduction</p>
                        <div class="flex flex-col mt-2 text-gray-500">
                            <div class="flex items-center">
                                <i class="fa-solid fa-film mr-2"></i>
                                <p class="text-sm">5 Video</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-solid fa-user-group mr-1"></i>
                                <p class="text-sm">50.000</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-regular fa-star mr-1"></i>
                                <p class="text-sm">4.85/5</p>
                            </div>
                        </div>
                    </div>
                    <!-- Item Bootcamp 6 -->
                    <div
                        class="bg-white rounded-lg shadow-md lg:ml-0 lg:p-4 max-sm:p-2 max-sm:w-40 lg:w-48 flex flex-col justify-between md:ml-6 md:p-4">
                        <img src="{{ asset('./assets/bootcamp/contentdummy.png') }}" class="h-34 w-full rounded-sm">
                        <p class="mt-2 text-gray-700 font-bold lg:text-lg max-sm:text-base max-sm:truncate">Marketing
                            Introduction</p>
                        <div class="flex flex-col mt-2 text-gray-500">
                            <div class="flex items-center">
                                <i class="fa-solid fa-film mr-2"></i>
                                <p class="text-sm">5 Video</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-solid fa-user-group mr-1"></i>
                                <p class="text-sm">50.000</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-regular fa-star mr-1"></i>
                                <p class="text-sm">4.85/5</p>
                            </div>
                        </div>
                    </div>
                    <!-- Item Bootcamp 7 -->
                    <div
                        class="bg-white rounded-lg shadow-md lg:ml-0 lg:p-4 max-sm:p-2 max-sm:w-40 lg:w-48 flex flex-col justify-between md:ml-6 md:p-4">
                        <img src="{{ asset('./assets/bootcamp/contentdummy.png') }}" class="h-34 w-full rounded-sm">
                        <p class="mt-2 text-gray-700 font-bold lg:text-lg max-sm:text-base max-sm:truncate">Marketing
                            Introduction</p>
                        <div class="flex flex-col mt-2 text-gray-500">
                            <div class="flex items-center">
                                <i class="fa-solid fa-film mr-2"></i>
                                <p class="text-sm">5 Video</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-solid fa-user-group mr-1"></i>
                                <p class="text-sm">50.000</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-regular fa-star mr-1"></i>
                                <p class="text-sm">4.85/5</p>
                            </div>
                        </div>
                    </div>
                    <!-- Item More -->
                    <a href="/e-learning">
                        <div
                            class="w-screen bg-gray-100 rounded-lg shadow-md lg:p-4 lg:w-48 max-sm:w-40 max-sm:h-56 md:w-48 md:h-48 flex flex-col justify-center items-center md:p-4">
                            <p class="lg:text-4xl max-sm:text-center max-sm:text-2xl md:text-6xl text-gray-400 mb-4">+</p>
                            <p class="text-gray-500 max-sm:text-center md:text-center">lihat bootcamp lainnya...</p>
                        </div>
                    </a>
                </div>
            </div>
        </section>
        <!-- Section 7 : Program Lainnya -->
        <section class="w-screen">
            <div
                class="flex flex-col sm:flex-row items-start sm:items-center justify-between lg:px-12 md:px-10 max-sm:px-8 py-4 w-screen">
                <h2 class="text-xl font-bold mb-2 sm:mb-0 ">Facebook Ads</h2>
                <br class="max-sm:hidden md:hidden">
                <div class="w-full sm:flex-1 border-t-2 border-orange-500 mb-2 sm:mb-0 sm:mx-4"></div>
                <button class="bg-orange-500 font-bold text-white px-1 lg:mr-10 sm:px-4 py-1 rounded-md flex items-center">
                    Selengkapnya <i class="fa-solid fa-arrow-right ml-2"></i>
                </button>
            </div>
            <!-- program lainnya disini -->
            <div name="mb-8" class="overflow-x-auto no-scrollbar w-screen md:p-4 max-sm:p-4">
                <div class="flex space-x-4 w-max lg:px-12 max-sm:px-4 py-3">
                    <!-- Item Bootcamp 1 -->
                    <div
                        class="bg-white rounded-lg shadow-md lg:ml-0 lg:p-4 max-sm:p-2 max-sm:w-40 lg:w-48 flex flex-col justify-between md:ml-6 md:p-4">
                        <img src="{{ asset('./assets/bootcamp/contentdummy.png') }}" class="h-34 w-full rounded-sm">
                        <p class="mt-2 text-gray-700 font-bold lg:text-lg max-sm:text-base max-sm:truncate">Marketing
                            Introduction</p>
                        <div class="flex flex-col mt-2 text-gray-500">
                            <div class="flex items-center">
                                <i class="fa-solid fa-film mr-2"></i>
                                <p class="text-sm">5 Video</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-solid fa-user-group mr-1"></i>
                                <p class="text-sm">50.000</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-regular fa-star mr-1"></i>
                                <p class="text-sm">4.85/5</p>
                            </div>
                        </div>
                    </div>
                    <!-- Item Bootcamp 2 -->
                    <div
                        class="bg-white rounded-lg shadow-md lg:ml-0 lg:p-4 max-sm:p-2 max-sm:w-40 lg:w-48 flex flex-col justify-between md:ml-6 md:p-4">
                        <img src="{{ asset('./assets/bootcamp/contentdummy.png') }}" class="h-34 w-full rounded-sm">
                        <p class="mt-2 text-gray-700 font-bold lg:text-lg max-sm:text-base max-sm:truncate">Marketing
                            Introduction</p>
                        <div class="flex flex-col mt-2 text-gray-500">
                            <div class="flex items-center">
                                <i class="fa-solid fa-film mr-2"></i>
                                <p class="text-sm">5 Video</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-solid fa-user-group mr-1"></i>
                                <p class="text-sm">50.000</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-regular fa-star mr-1"></i>
                                <p class="text-sm">4.85/5</p>
                            </div>
                        </div>
                    </div>
                    <!-- Item Bootcamp 3 -->
                    <div
                        class="bg-white rounded-lg shadow-md lg:ml-0 lg:p-4 max-sm:p-2 max-sm:w-40 lg:w-48 flex flex-col justify-between md:ml-6 md:p-4">
                        <img src="{{ asset('./assets/bootcamp/contentdummy.png') }}" class="h-34 w-full rounded-sm">
                        <p class="mt-2 text-gray-700 font-bold lg:text-lg max-sm:text-base max-sm:truncate">Marketing
                            Introduction</p>
                        <div class="flex flex-col mt-2 text-gray-500">
                            <div class="flex items-center">
                                <i class="fa-solid fa-film mr-2"></i>
                                <p class="text-sm">5 Video</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-solid fa-user-group mr-1"></i>
                                <p class="text-sm">50.000</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-regular fa-star mr-1"></i>
                                <p class="text-sm">4.85/5</p>
                            </div>
                        </div>
                    </div>
                    <!-- Item Bootcamp 4 -->
                    <div
                        class="bg-white rounded-lg shadow-md lg:ml-0 lg:p-4 max-sm:p-2 max-sm:w-40 lg:w-48 flex flex-col justify-between md:ml-6 md:p-4">
                        <img src="{{ asset('./assets/bootcamp/contentdummy.png') }}" class="h-34 w-full rounded-sm">
                        <p class="mt-2 text-gray-700 font-bold lg:text-lg max-sm:text-base max-sm:truncate">Marketing
                            Introduction</p>
                        <div class="flex flex-col mt-2 text-gray-500">
                            <div class="flex items-center">
                                <i class="fa-solid fa-film mr-2"></i>
                                <p class="text-sm">5 Video</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-solid fa-user-group mr-1"></i>
                                <p class="text-sm">50.000</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-regular fa-star mr-1"></i>
                                <p class="text-sm">4.85/5</p>
                            </div>
                        </div>
                    </div>
                    <!-- Item Bootcamp 5 -->
                    <div
                        class="bg-white rounded-lg shadow-md lg:ml-0 lg:p-4 max-sm:p-2 max-sm:w-40 lg:w-48 flex flex-col justify-between md:ml-6 md:p-4">
                        <img src="{{ asset('./assets/bootcamp/contentdummy.png') }}" class="h-34 w-full rounded-sm">
                        <p class="mt-2 text-gray-700 font-bold lg:text-lg max-sm:text-base max-sm:truncate">Marketing
                            Introduction</p>
                        <div class="flex flex-col mt-2 text-gray-500">
                            <div class="flex items-center">
                                <i class="fa-solid fa-film mr-2"></i>
                                <p class="text-sm">5 Video</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-solid fa-user-group mr-1"></i>
                                <p class="text-sm">50.000</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-regular fa-star mr-1"></i>
                                <p class="text-sm">4.85/5</p>
                            </div>
                        </div>
                    </div>
                    <!-- Item Bootcamp 6 -->
                    <div
                        class="bg-white rounded-lg shadow-md lg:ml-0 lg:p-4 max-sm:p-2 max-sm:w-40 lg:w-48 flex flex-col justify-between md:ml-6 md:p-4">
                        <img src="{{ asset('./assets/bootcamp/contentdummy.png') }}" class="h-34 w-full rounded-sm">
                        <p class="mt-2 text-gray-700 font-bold lg:text-lg max-sm:text-base max-sm:truncate">Marketing
                            Introduction</p>
                        <div class="flex flex-col mt-2 text-gray-500">
                            <div class="flex items-center">
                                <i class="fa-solid fa-film mr-2"></i>
                                <p class="text-sm">5 Video</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-solid fa-user-group mr-1"></i>
                                <p class="text-sm">50.000</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-regular fa-star mr-1"></i>
                                <p class="text-sm">4.85/5</p>
                            </div>
                        </div>
                    </div>
                    <!-- Item Bootcamp 7 -->
                    <div
                        class="bg-white rounded-lg shadow-md lg:ml-0 lg:p-4 max-sm:p-2 max-sm:w-40 lg:w-48 flex flex-col justify-between md:ml-6 md:p-4">
                        <img src="{{ asset('./assets/bootcamp/contentdummy.png') }}" class="h-34 w-full rounded-sm">
                        <p class="mt-2 text-gray-700 font-bold lg:text-lg max-sm:text-base max-sm:truncate">Marketing
                            Introduction</p>
                        <div class="flex flex-col mt-2 text-gray-500">
                            <div class="flex items-center">
                                <i class="fa-solid fa-film mr-2"></i>
                                <p class="text-sm">5 Video</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-solid fa-user-group mr-1"></i>
                                <p class="text-sm">50.000</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fa-regular fa-star mr-1"></i>
                                <p class="text-sm">4.85/5</p>
                            </div>
                        </div>
                    </div>
                    <!-- Item More -->
                    <a href="/e-learning">
                        <div
                            class="w-screen bg-gray-100 rounded-lg shadow-md lg:p-4 lg:w-48 max-sm:w-40 max-sm:h-56 md:w-48 md:h-48 flex flex-col justify-center items-center md:p-4">
                            <p class="lg:text-4xl max-sm:text-center max-sm:text-2xl md:text-6xl text-gray-400 mb-4">+</p>
                            <p class="text-gray-500 max-sm:text-center md:text-center">lihat bootcamp lainnya...</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="w-full flex justify-center mt-8">
                <hr class="mb-6 mt-4 w-11/12 border-1 ">
            </div>
        </section>
    @endsection
