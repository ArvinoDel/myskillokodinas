@extends('./myskill/layouts.main')
@section('container')
    <section class="e-learning w-screen">
        <!-- Section 1: Hero -->
        <section class="bg-gradient-to-b from-orange-400 to-red-500 p-4 md:p-8 h-1/6">
            <div class="container mx-auto">
                <div class="grid grid-flow-row md:grid-flow-col bg-white rounded-3xl items-center h-auto md:h-96">
                    <div class="grid grid-flow-row text-center mx-4 md:mx-32 p-4">
                        <h3 class="font-bold text-lg md:text-xl py-2">Yuk Berlangganan Untuk Akses Materinya!</h3>
                        <h3 class="text-sm md:text-md py-2">Berlangganan sekarang juga untuk mulai. Pilih skill apapun dan
                            pelajari
                            kapanpun. Dapatkan video materi terstruktur, modul praktik plus webinar series rancangan para
                            experts dari top companies.</h3>
                        <div class="py-2">
                            <button class="font-semibold py-3 px-4 md:px-6 bg-yellow-400 rounded-xl">Berlangganan
                                Sekarang!</button>
                        </div>
                        <h3 class="font-bold text-xs md:text-sm text-red-500 p-2">10.000+ Orang Berlangganan Tiap Bulan</h3>
                    </div>
                    <div class="mx-4 md:mx-20 -mt-8 md:-mt-28">
                        <h3 class="text-gray-500 font-semibold py-4">Materi</h3>
                        <div class="py-2 flex items-center justify-between">
                            <div class="flex items-center space-x-2 mx-2 md:mx-6">
                                <i class="fa-regular fa-circle-play text-sm md:text-lg"></i>
                                <h3 class="text-sm md:text-base">1. Copywriting Introduction</h3>
                            </div>
                            <i class="fa-regular fa-square text-lg md:text-xl"></i>
                        </div>
                        <div class="py-2 flex items-center justify-between">
                            <div class="flex items-center space-x-2 mx-2 md:mx-6">
                                <i class="fa-regular fa-circle-play text-sm md:text-lg"></i>
                                <h3 class="text-sm md:text-base">2. The Importance of Copywriting</h3>
                            </div>
                            <i class="fa-regular fa-square text-lg md:text-xl"></i>
                        </div>
                        <div class="py-2 flex items-center justify-between">
                            <div class="flex items-center space-x-2 mx-2 md:mx-6">
                                <i class="fa-regular fa-circle-play text-sm md:text-lg"></i>
                                <h3 class="text-sm md:text-base">3. Copywriting vs Content Writing</h3>
                            </div>
                            <i class="fa-regular fa-square text-lg md:text-xl"></i>
                        </div>
                        <div class="py-2 flex items-center justify-between">
                            <div class="flex items-center space-x-2 mx-2 md:mx-6">
                                <i class="fa-regular fa-circle-play text-sm md:text-lg"></i>
                                <h3 class="text-sm md:text-base">4. Characteristic of Copywriting</h3>
                            </div>
                            <i class="fa-regular fa-square text-lg md:text-xl"></i>
                        </div>
                        <div class="py-2 flex items-center justify-between">
                            <div class="flex items-center space-x-2 mx-2 md:mx-6">
                                <i class="fa-regular fa-circle-play text-sm md:text-lg"></i>
                                <h3 class="text-sm md:text-base">5. Copywriting Media</h3>
                            </div>
                            <i class="fa-regular fa-square text-lg md:text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="md:p-8">
            <div class="container mx-auto px-4">
                <!-- Button Group -->
                <div class="flex flex-wrap items-center space-x-2 mb-4 pt-4 md:pt-4 lg:pt-0">
                    <button class="border border-teal-600 text-teal-600 px-3 py-1 text-xs sm:text-sm rounded-lg mb-2">
                        Digital Marketing
                    </button>
                    <i class="fa-solid fa-chevron-right text-xs -mt-3 md:-mt-0 lg:-mt-0"></i>
                    <button class="border border-teal-600 text-teal-600 px-3 py-1 text-xs sm:text-sm rounded-lg mb-2">
                        Digital Marketing
                    </button>
                    <i class="fa-solid fa-chevron-right text-xs -mt-3 md:-mt-0 lg:-mt-0"></i>
                    <button class="text-teal-600 px-3 py-1 text-xs sm:text-sm mb-2">
                        Digital Marketing
                    </button>
                </div>

                <!-- Text Content -->
                <div class="text-start py-4">
                    <h3 class="text-xl sm:text-2xl md:text-4xl font-bold py-2">Copywriting Introduction</h3>
                    <h3 class="text-sm sm:text-base md:text-lg font-semibold py-1">Veronica Gabriella - Senior Copywriter
                        SATU Dental Group</h3>
                    <p class="text-xs sm:text-sm md:text-md py-1">Copywriting menjadi bagian dalam digital marketing sebagai
                        sarana untuk berkomunikasi dengan audiens mengenai produk supaya pada akhirnya akan menjadi
                        keputusan dalam pembelian. Dalam materi ini kita akan mempelajari pengertian copywriting serta
                        perkembangan dalam copywriting. Kita juga akan mempelajari kedudukan dari copywriting.</p>
                </div>

                <hr class="py-4">

                <!-- Achievements Section -->
                <div>
                    <h3 class="font-bold text-lg sm:text-xl md:text-2xl">Akan Didapatkan</h3>
                    <div class="py-4 flex flex-wrap gap-2">
                        <button class="bg-blue-600 px-4 py-2 flex items-center rounded-lg text-xs sm:text-sm">
                            <i class="fa-solid fa-medal text-white text-sm mr-2"></i>
                            <span class="text-white font-semibold">Sertifikat</span>
                        </button>
                        <button class="bg-blue-600 px-4 py-2 flex items-center rounded-lg text-xs sm:text-sm">
                            <i class="fa-regular fa-file-lines text-white text-sm mr-2"></i>
                            <span class="text-white font-semibold">Modul Praktik</span>
                        </button>
                        <button class="bg-blue-600 px-4 py-2 flex items-center rounded-lg text-xs sm:text-sm">
                            <i class="fa-solid fa-book-bookmark text-white text-sm mr-2"></i>
                            <span class="text-white font-semibold">Bahan Bacaan</span>
                        </button>
                        <button class="bg-blue-600 px-4 py-2 flex items-center rounded-lg text-xs sm:text-sm">
                            <i class="fa-solid fa-users text-white text-sm mr-2"></i>
                            <span class="text-white font-semibold">Grup Diskusi</span>
                        </button>
                    </div>
                    <hr class="py-4">
                </div>
            </div>
        </section>

        <!-- Section 2: Testimonials -->
        <h2 class="text-xl md:text-2xl font-bold mb-6 text-start px-4 md:px-14">Rating Materi</h2>
        <section class="overflow-x-auto bg-white p-4 md:p-4">
            <div class="grid grid-flow-row gap-4">
                <div class="container mx-auto px-4">                    
                    <div class="overflow-x-auto pb-2 no-scrollbar mb-5">
                        <div id="card-container" class="flex space-x-4">
                            <!-- Rating Card -->
                            <div
                                class="overflow-x-auto bg-white p-4 rounded-2xl shadow-md max-w-[150px] sm:max-w-[200px] md:max-w-[250px] lg:max-w-[300px] flex-shrink-0 mx-2">
                                <div class="flex flex-col items-start">
                                    <h3 class="font-bold text-xs sm:text-sm md:text-base mb-2 break-words">Sukisworo
                                        Nurrudin Rizky</h3>
                                    <div class="flex flex-row space-x-1 mb-2">
                                        <i class="fa-solid fa-star text-yellow-300"></i>
                                        <i class="fa-solid fa-star text-yellow-300"></i>
                                        <i class="fa-solid fa-star text-yellow-300"></i>
                                        <i class="fa-solid fa-star text-yellow-300"></i>
                                        <i class="fa-solid fa-star text-yellow-300"></i>
                                    </div>
                                    <div class="flex flex-row space-x-2 mb-2 text-xs text-gray-400">
                                        <i class="fa-regular fa-calendar-days"></i>
                                        <span>9 Sep 2024</span>
                                    </div>
                                    <p class="text-xs sm:text-sm md:text-base break-words">Informasi terkait copywriting
                                        sangat bisa dipahami. Serta penyampaian materi yang sangat mudah didengar.</p>
                                </div>
                            </div>
                            <!-- Repeat Rating Card as needed -->
                            <div
                                class="overflow-x-auto bg-white p-4 rounded-2xl shadow-md max-w-[150px] sm:max-w-[200px] md:max-w-[250px] lg:max-w-[300px] flex-shrink-0 mx-2">
                                <div class="flex flex-col items-start">
                                    <h3 class="font-bold text-xs sm:text-sm md:text-base mb-2 break-words">Sukisworo
                                        Nurrudin Rizky</h3>
                                    <div class="flex flex-row space-x-1 mb-2">
                                        <i class="fa-solid fa-star text-yellow-300"></i>
                                        <i class="fa-solid fa-star text-yellow-300"></i>
                                        <i class="fa-solid fa-star text-yellow-300"></i>
                                        <i class="fa-solid fa-star text-yellow-300"></i>
                                        <i class="fa-solid fa-star text-yellow-300"></i>
                                    </div>
                                    <div class="flex flex-row space-x-2 mb-2 text-xs text-gray-400">
                                        <i class="fa-regular fa-calendar-days"></i>
                                        <span>9 Sep 2024</span>
                                    </div>
                                    <p class="text-xs sm:text-sm md:text-base break-words">Informasi terkait copywriting
                                        sangat bisa dipahami. Serta penyampaian materi yang sangat mudah didengar.</p>
                                </div>
                            </div>
                            <!-- Additional Cards -->
                            <div
                                class="overflow-x-auto bg-white p-4 rounded-2xl shadow-md max-w-[150px] sm:max-w-[200px] md:max-w-[250px] lg:max-w-[300px] flex-shrink-0 mx-2">
                                <div class="flex flex-col items-start">
                                    <h3 class="font-bold text-xs sm:text-sm md:text-base mb-2 break-words">Sukisworo
                                        Nurrudin Rizky</h3>
                                    <div class="flex flex-row space-x-1 mb-2">
                                        <i class="fa-solid fa-star text-yellow-300"></i>
                                        <i class="fa-solid fa-star text-yellow-300"></i>
                                        <i class="fa-solid fa-star text-yellow-300"></i>
                                        <i class="fa-solid fa-star text-yellow-300"></i>
                                        <i class="fa-solid fa-star text-yellow-300"></i>
                                    </div>
                                    <div class="flex flex-row space-x-2 mb-2 text-xs text-gray-400">
                                        <i class="fa-regular fa-calendar-days"></i>
                                        <span>9 Sep 2024</span>
                                    </div>
                                    <p class="text-xs sm:text-sm md:text-base break-words">Informasi terkait copywriting
                                        sangat bisa dipahami. Serta penyampaian materi yang sangat mudah didengar.</p>
                                </div>
                            </div>
                            <div
                                class="overflow-x-auto bg-white p-4 rounded-2xl shadow-md max-w-[150px] sm:max-w-[200px] md:max-w-[250px] lg:max-w-[300px] flex-shrink-0 mx-2">
                                <div class="flex flex-col items-start">
                                    <h3 class="font-bold text-xs sm:text-sm md:text-base mb-2 break-words">Sukisworo
                                        Nurrudin Rizky</h3>
                                    <div class="flex flex-row space-x-1 mb-2">
                                        <i class="fa-solid fa-star text-yellow-300"></i>
                                        <i class="fa-solid fa-star text-yellow-300"></i>
                                        <i class="fa-solid fa-star text-yellow-300"></i>
                                        <i class="fa-solid fa-star text-yellow-300"></i>
                                        <i class="fa-solid fa-star text-yellow-300"></i>
                                    </div>
                                    <div class="flex flex-row space-x-2 mb-2 text-xs text-gray-400">
                                        <i class="fa-regular fa-calendar-days"></i>
                                        <span>9 Sep 2024</span>
                                    </div>
                                    <p class="text-xs sm:text-sm md:text-base break-words">Informasi terkait copywriting
                                        sangat bisa dipahami. Serta penyampaian materi yang sangat mudah didengar.</p>
                                </div>
                            </div>
                            <div
                                class="overflow-x-auto bg-white p-4 rounded-2xl shadow-md max-w-[150px] sm:max-w-[200px] md:max-w-[250px] lg:max-w-[300px] flex-shrink-0 mx-2">
                                <div class="flex flex-col items-start">
                                    <h3 class="font-bold text-xs sm:text-sm md:text-base mb-2 break-words">Sukisworo
                                        Nurrudin Rizky</h3>
                                    <div class="flex flex-row space-x-1 mb-2">
                                        <i class="fa-solid fa-star text-yellow-300"></i>
                                        <i class="fa-solid fa-star text-yellow-300"></i>
                                        <i class="fa-solid fa-star text-yellow-300"></i>
                                        <i class="fa-solid fa-star text-yellow-300"></i>
                                        <i class="fa-solid fa-star text-yellow-300"></i>
                                    </div>
                                    <div class="flex flex-row space-x-2 mb-2 text-xs text-gray-400">
                                        <i class="fa-regular fa-calendar-days"></i>
                                        <span>9 Sep 2024</span>
                                    </div>
                                    <p class="text-xs sm:text-sm md:text-base break-words">Informasi terkait copywriting
                                        sangat bisa dipahami. Serta penyampaian materi yang sangat mudah didengar.</p>
                                </div>
                            </div>
                            <div
                                class="overflow-x-auto bg-white p-4 rounded-2xl shadow-md max-w-[150px] sm:max-w-[200px] md:max-w-[250px] lg:max-w-[300px] flex-shrink-0 mx-2">
                                <div class="flex flex-col items-start">
                                    <h3 class="font-bold text-xs sm:text-sm md:text-base mb-2 break-words">Sukisworo
                                        Nurrudin Rizky</h3>
                                    <div class="flex flex-row space-x-1 mb-2">
                                        <i class="fa-solid fa-star text-yellow-300"></i>
                                        <i class="fa-solid fa-star text-yellow-300"></i>
                                        <i class="fa-solid fa-star text-yellow-300"></i>
                                        <i class="fa-solid fa-star text-yellow-300"></i>
                                        <i class="fa-solid fa-star text-yellow-300"></i>
                                    </div>
                                    <div class="flex flex-row space-x-2 mb-2 text-xs text-gray-400">
                                        <i class="fa-regular fa-calendar-days"></i>
                                        <span>9 Sep 2024</span>
                                    </div>
                                    <p class="text-xs sm:text-sm md:text-base break-words">Informasi terkait copywriting
                                        sangat bisa dipahami. Serta penyampaian materi yang sangat mudah didengar.</p>
                                </div>
                            </div>
                            <div
                                class="overflow-x-auto bg-white p-4 rounded-2xl shadow-md max-w-[150px] sm:max-w-[200px] md:max-w-[250px] lg:max-w-[300px] flex-shrink-0 mx-2">
                                <div class="flex flex-col items-start">
                                    <h3 class="font-bold text-xs sm:text-sm md:text-base mb-2 break-words">Sukisworo
                                        Nurrudin Rizky</h3>
                                    <div class="flex flex-row space-x-1 mb-2">
                                        <i class="fa-solid fa-star text-yellow-300"></i>
                                        <i class="fa-solid fa-star text-yellow-300"></i>
                                        <i class="fa-solid fa-star text-yellow-300"></i>
                                        <i class="fa-solid fa-star text-yellow-300"></i>
                                        <i class="fa-solid fa-star text-yellow-300"></i>
                                    </div>
                                    <div class="flex flex-row space-x-2 mb-2 text-xs text-gray-400">
                                        <i class="fa-regular fa-calendar-days"></i>
                                        <span>9 Sep 2024</span>
                                    </div>
                                    <p class="text-xs sm:text-sm md:text-base break-words">Informasi terkait copywriting
                                        sangat bisa dipahami. Serta penyampaian materi yang sangat mudah didengar.</p>
                                </div>
                            </div>
                            <!-- Add more cards if needed -->
                        </div>
                    </div>
                </div>

            </div>
        </section>




        {{-- Section 4: Skills --}}
        <section class="overflow-x-auto bg-white p-4 md:p-8">
            <div class="container mx-auto text-start sm:text-center">
                <h2 class="text-2xl font-bold mb-4">Rekomendasi Kelas Lainnya</h2>
                <p class="mb-4 text-gray-600">
                    Pelajari skill melalui serial short video + mini quiz dengan learning path dan topik yang terstruktur.
                </p>

                <!-- Carousel Container -->
                <div class="overflow-x-auto pb-2 no-scrollbar mb-5">
                    @include('./myskill/partials.cards-elearning')
                </div>
            </div>
        </section>

        </div>
    </section>
@endsection
