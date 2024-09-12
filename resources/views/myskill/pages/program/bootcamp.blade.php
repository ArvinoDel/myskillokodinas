@extends('./myskill/layouts.main')
@section('container')
    <style>
        /* Hide scrollbar for Chrome, Safari and Opera */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        .no-scrollbar {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }
    </style>
    <section class="bootcamp-program w-screen">
        <div class="bootcamp w-screen">
            <section
                class="w-full h-auto bg-gradient-to-b from-orange-400 to-red-400 text-white lg:flex max-sm:text-black max-sm:bg-white">
                <img src="{{ asset('./assets/bootcamp/hero-header.png') }}"
                    class="lg:h-80 w-auto lg:ml-16 py-2 max-sm:h-48 max-sm:mx-auto max-sm:my-4m md:mx-auto md:block md:w-96">
                <div class="lg:ml-4 max-sm:text-black max-sm:w-full max-sm:text-center max-sm:mx-auto max-sm:py-4">
                    <p class="text-4xl font-bold w-4/5 max-sm:text-xl max-sm:w-full max-sm:mx-auto text-white md:ml-6">
                        Bootcamp yang Memberi Hasil. Fokus Praktik & Portfolio.</p>
                    <br>
                    <p class="w-8/12 max-sm:w-full max-sm:text-sm max-sm:mx-auto text-white md:ml-6">Full Online dan Dipandu
                        oleh Praktisi Senior. Praktikal, lebih dari sekadar Webinar. Fokus Bantu Kembangkan Skill dan
                        Portfolio Ribuan Alumni.</p>
                    <br>
                    <a href="#bootcamp" type="button"
                        class="focus:outline-none text-black bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900 max-sm:bg-yellow-500 max-sm:text-white max-sm:px-3 max-sm:py-1.5 max-sm:w-4/5 max-sm:mx-auto md:ml-6">Lihat
                        Program Pilihan</a>
                    <div class="flex items-center mt-2 sm:mt-4 max-sm:flex-col max-sm:items-center">
                        <div class="flex space-x-1 max-sm:space-x-2 max-sm:justify-center md:ml-6">
                            <img src="{{ asset('./assets/bootcamp/hero-header.png') }}"
                                class="h-6 w-6 rounded-full max-sm:h-3 max-sm:w-3 md:w-8 md:h-8">
                            <img src="{{ asset('./assets/bootcamp/hero-header.png') }}"
                                class="h-6 w-6 rounded-full max-sm:h-3 max-sm:w-3 md:w-8 md:h-8">
                            <img src="{{ asset('./assets/bootcamp/hero-header.png') }}"
                                class="h-6 w-6 rounded-full max-sm:h-3 max-sm:w-3 md:w-8 md:h-8">
                            <img src="{{ asset('./assets/bootcamp/hero-header.png') }}"
                                class="h-6 w-6 rounded-full max-sm:h-3 max-sm:w-3 md:w-8 md:h-8">
                            <img src="{{ asset('./assets/bootcamp/hero-header.png') }}"
                                class="h-6 w-6 rounded-full max-sm:h-3 max-sm:w-3 md:w-8 md:h-8">
                        </div>
                        <p
                            class="lg:ml-4 lg:text-white text-md font-semibold max-sm:text-white max-sm:ml-0 max-sm:text-sm max-sm:mt-2 md:text-white md:ml-1">
                            > 10.000 Orang Telah Lulus</p>
                    </div>
                </div>
            </section>
        </div>


        <!-- Horizontal Scrollable Section -->

        <p class="mt-4 font-bold text-2xl flex justify-center px-14">Testimoni Alumni Bootcamp MySkill</p>
        <section class="mt-8 whitespace-nowrap px-8 md:px-2 py-4 mb-12 ">
            <div class="flex overflow-x-auto space-x-4 mx-5 px-1 pb-4 no-scrollbar">
                @foreach ($testimonis as $testimoni)
                    <div
                        class="bg-white p-4 rounded-2xl shadow-md max-w-[220px] sm:max-w-[180px] md:max-w-[200px] flex-shrink-0">
                        <div class="flex items-center justify-center mb-4">
                            <img class="rounded-lg w-full max-h-[220px] object-cover"
                                src="{{ asset('foto_testimoni/' . $testimoni->gambar) }}" alt="Testimoni Image" />
                        </div>
                        <a href="{{ $testimoni->link }}">
                            <button class="w-full bg-teal-500 text-white py-2 rounded-md font-semibold">Baca
                                Cerita</button>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>


        <!-- search bar -->
        <div class="relative w-11/12 mx-auto mb-6" id="bootcamp">
            <input type="text" class="w-full p-2 pl-10 border border-gray-300 rounded"
                placeholder="Apa yang ingin kamu pelajari ?">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <i class="fas fa-search text-gray-500"></i>
            </span>
        </div>
        <!-- end search bar -->

        <!-- start grid -->
        <div
            class="grid grid-cols-2 max-sm:p-2 max-sm:m-2 max-sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 lg:gap-6 lg:px-14 md:gap-8 md:px-14 max-sm:mt-2">
            <!-- grid card here -->

            <!-- garis batas -->
            <a href="/bootcamp/digital-marketing">
                <div
                    class="bg-white mt-2 mb-2 border rounded-lg shadow-md max-sm:p-2 max-sm:mr-2 max-sm:flex max-sm:flex-col max-sm:items-center max-sm:justify-start">
                    <img src="{{ asset('./assets/bootcamp/contentdummy.png') }}"
                        class="lg:h-48 lg:w-full md:h-32 md:w-full sm:h-48 sm:w-full rounded-sm">
                    <div class="text-left sm:text-left sm:mt-4">
                        <p class="mt-4 text-gray-700 font-semibold font-sans max-sm:text-xs md:text-lg lg:text-lg ml-2">
                            Digital Marketing : Fullstack Intensive</p>
                        <div
                            class="flex items-center justify-start sm:justify-start max-sm:mt-1 max-sm:text-nowrap md:mt-4 lg:mt-4 text-gray-500">
                            <i class="fas ml-2 fa-calendar-alt mr-2"></i>
                            <p class="text-sm">9 Oktober 2024</p>
                        </div>
                        <div
                            class="flex items-center justify-start sm:justify-start max-sm:mt-1 md:mt-4 lg:mt-4 lg:mb-4 text-gray-500">
                            <i class="fas ml-2 fa-tag mr-2"></i>
                            <p class="text-sm">Rp 590.000<span
                                    class="line-through text-xs/tight max-sm:hidden text-red-500">Rp 1.000.000</span></p>
                        </div>
                    </div>
                </div>
            </a>
            <div
                class="bg-white mt-2 mb-2 border rounded-lg shadow-md max-sm:p-2 max-sm:mr-2 max-sm:flex max-sm:flex-col max-sm:items-center max-sm:justify-start">
                <img src="{{ asset('./assets/bootcamp/contentdummy.png') }}"
                    class="lg:h-48 lg:w-full md:h-32 md:w-full sm:h-48 sm:w-full rounded-sm">
                <div class="text-left sm:text-left sm:mt-4">
                    <p class="mt-4 text-gray-700 font-semibold font-sans max-sm:text-xs md:text-lg lg:text-lg ml-2">Digital
                        Marketing : Fullstack Intensive</p>
                    <div
                        class="flex items-center justify-start sm:justify-start max-sm:mt-1 max-sm:text-nowrap md:mt-4 lg:mt-4 text-gray-500">
                        <i class="fas ml-2 fa-calendar-alt mr-2"></i>
                        <p class="text-sm">9 Oktober 2024</p>
                    </div>
                    <div
                        class="flex items-center justify-start sm:justify-start max-sm:mt-1 md:mt-4 lg:mt-4 lg:mb-4 text-gray-500">
                        <i class="fas ml-2 fa-tag mr-2"></i>
                        <p class="text-sm">Rp 590.000<span class="line-through text-xs/tight max-sm:hidden text-red-500">Rp
                                1.000.000</span></p>
                    </div>
                </div>
            </div>
            <div
                class="bg-white mt-2 mb-2 border rounded-lg shadow-md max-sm:p-2 max-sm:mr-2 max-sm:flex max-sm:flex-col max-sm:items-center max-sm:justify-start">
                <img src="{{ asset('./assets/bootcamp/contentdummy.png') }}"
                    class="lg:h-48 lg:w-full md:h-32 md:w-full sm:h-48 sm:w-full rounded-sm">
                <div class="text-left sm:text-left sm:mt-4">
                    <p class="mt-4 text-gray-700 font-semibold font-sans max-sm:text-xs md:text-lg lg:text-lg ml-2">Digital
                        Marketing : Fullstack Intensive</p>
                    <div
                        class="flex items-center justify-start sm:justify-start max-sm:mt-1 max-sm:text-nowrap md:mt-4 lg:mt-4 text-gray-500">
                        <i class="fas ml-2 fa-calendar-alt mr-2"></i>
                        <p class="text-sm">9 Oktober 2024</p>
                    </div>
                    <div
                        class="flex items-center justify-start sm:justify-start max-sm:mt-1 md:mt-4 lg:mt-4 lg:mb-4 text-gray-500">
                        <i class="fas ml-2 fa-tag mr-2"></i>
                        <p class="text-sm">Rp 590.000<span class="line-through text-xs/tight max-sm:hidden text-red-500">Rp
                                1.000.000</span></p>
                    </div>
                </div>
            </div>
            <div
                class="bg-white mt-2 mb-2 border rounded-lg shadow-md max-sm:p-2 max-sm:mr-2 max-sm:flex max-sm:flex-col max-sm:items-center max-sm:justify-start">
                <img src="{{ asset('./assets/bootcamp/contentdummy.png') }}"
                    class="lg:h-48 lg:w-full md:h-32 md:w-full sm:h-48 sm:w-full rounded-sm">
                <div class="text-left sm:text-left sm:mt-4">
                    <p class="mt-4 text-gray-700 font-semibold font-sans max-sm:text-xs md:text-lg lg:text-lg ml-2">Digital
                        Marketing : Fullstack Intensive</p>
                    <div
                        class="flex items-center justify-start sm:justify-start max-sm:mt-1 max-sm:text-nowrap md:mt-4 lg:mt-4 text-gray-500">
                        <i class="fas ml-2 fa-calendar-alt mr-2"></i>
                        <p class="text-sm">9 Oktober 2024</p>
                    </div>
                    <div
                        class="flex items-center justify-start sm:justify-start max-sm:mt-1 md:mt-4 lg:mt-4 lg:mb-4 text-gray-500">
                        <i class="fas ml-2 fa-tag mr-2"></i>
                        <p class="text-sm">Rp 590.000<span class="line-through text-xs/tight max-sm:hidden text-red-500">Rp
                                1.000.000</span></p>
                    </div>
                </div>
            </div>
            <div
                class="bg-white mt-2 mb-2 border rounded-lg shadow-md max-sm:p-2 max-sm:mr-2 max-sm:flex max-sm:flex-col max-sm:items-center max-sm:justify-start">
                <img src="{{ asset('./assets/bootcamp/contentdummy.png') }}"
                    class="lg:h-48 lg:w-full md:h-32 md:w-full sm:h-48 sm:w-full rounded-sm">
                <div class="text-left sm:text-left sm:mt-4">
                    <p class="mt-4 text-gray-700 font-semibold font-sans max-sm:text-xs md:text-lg lg:text-lg ml-2">Digital
                        Marketing : Fullstack Intensive</p>
                    <div
                        class="flex items-center justify-start sm:justify-start max-sm:mt-1 max-sm:text-nowrap md:mt-4 lg:mt-4 text-gray-500">
                        <i class="fas ml-2 fa-calendar-alt mr-2"></i>
                        <p class="text-sm">9 Oktober 2024</p>
                    </div>
                    <div
                        class="flex items-center justify-start sm:justify-start max-sm:mt-1 md:mt-4 lg:mt-4 lg:mb-4 text-gray-500">
                        <i class="fas ml-2 fa-tag mr-2"></i>
                        <p class="text-sm">Rp 590.000<span
                                class="line-through text-xs/tight max-sm:hidden text-red-500">Rp 1.000.000</span></p>
                    </div>
                </div>
            </div>
            <div
                class="bg-white mt-2 mb-2 border rounded-lg shadow-md max-sm:p-2 max-sm:mr-2 max-sm:flex max-sm:flex-col max-sm:items-center max-sm:justify-start">
                <img src="{{ asset('./assets/bootcamp/contentdummy.png') }}"
                    class="lg:h-48 lg:w-full md:h-32 md:w-full sm:h-48 sm:w-full rounded-sm">
                <div class="text-left sm:text-left sm:mt-4">
                    <p class="mt-4 text-gray-700 font-semibold font-sans max-sm:text-xs md:text-lg lg:text-lg ml-2">Digital
                        Marketing : Fullstack Intensive</p>
                    <div
                        class="flex items-center justify-start sm:justify-start max-sm:mt-1 max-sm:text-nowrap md:mt-4 lg:mt-4 text-gray-500">
                        <i class="fas ml-2 fa-calendar-alt mr-2"></i>
                        <p class="text-sm">9 Oktober 2024</p>
                    </div>
                    <div
                        class="flex items-center justify-start sm:justify-start max-sm:mt-1 md:mt-4 lg:mt-4 lg:mb-4 text-gray-500">
                        <i class="fas ml-2 fa-tag mr-2"></i>
                        <p class="text-sm">Rp 590.000<span
                                class="line-through text-xs/tight max-sm:hidden text-red-500">Rp 1.000.000</span></p>
                    </div>
                </div>
            </div>
            <div
                class="bg-white mt-2 mb-2 border rounded-lg shadow-md max-sm:p-2 max-sm:mr-2 max-sm:flex max-sm:flex-col max-sm:items-center max-sm:justify-start">
                <img src="{{ asset('./assets/bootcamp/contentdummy.png') }}"
                    class="lg:h-48 lg:w-full md:h-32 md:w-full sm:h-48 sm:w-full rounded-sm">
                <div class="text-left sm:text-left sm:mt-4">
                    <p class="mt-4 text-gray-700 font-semibold font-sans max-sm:text-xs md:text-lg lg:text-lg ml-2">Digital
                        Marketing : Fullstack Intensive</p>
                    <div
                        class="flex items-center justify-start sm:justify-start max-sm:mt-1 max-sm:text-nowrap md:mt-4 lg:mt-4 text-gray-500">
                        <i class="fas ml-2 fa-calendar-alt mr-2"></i>
                        <p class="text-sm">9 Oktober 2024</p>
                    </div>
                    <div
                        class="flex items-center justify-start sm:justify-start max-sm:mt-1 md:mt-4 lg:mt-4 lg:mb-4 text-gray-500">
                        <i class="fas ml-2 fa-tag mr-2"></i>
                        <p class="text-sm">Rp 590.000<span
                                class="line-through text-xs/tight max-sm:hidden text-red-500">Rp 1.000.000</span></p>
                    </div>
                </div>
            </div>
            <div
                class="bg-white mt-2 mb-2 border rounded-lg shadow-md max-sm:p-2 max-sm:mr-2 max-sm:flex max-sm:flex-col max-sm:items-center max-sm:justify-start">
                <img src="{{ asset('./assets/bootcamp/contentdummy.png') }}"
                    class="lg:h-48 lg:w-full md:h-32 md:w-full sm:h-48 sm:w-full rounded-sm">
                <div class="text-left sm:text-left sm:mt-4">
                    <p class="mt-4 text-gray-700 font-semibold font-sans max-sm:text-xs md:text-lg lg:text-lg ml-2">Digital
                        Marketing : Fullstack Intensive</p>
                    <div
                        class="flex items-center justify-start sm:justify-start max-sm:mt-1 max-sm:text-nowrap md:mt-4 lg:mt-4 text-gray-500">
                        <i class="fas ml-2 fa-calendar-alt mr-2"></i>
                        <p class="text-sm">9 Oktober 2024</p>
                    </div>
                    <div
                        class="flex items-center justify-start sm:justify-start max-sm:mt-1 md:mt-4 lg:mt-4 lg:mb-4 text-gray-500">
                        <i class="fas ml-2 fa-tag mr-2"></i>
                        <p class="text-sm">Rp 590.000<span
                                class="line-through text-xs/tight max-sm:hidden text-red-500">Rp 1.000.000</span></p>
                    </div>
                </div>
            </div>
            <div
                class="bg-white mt-2 mb-2 border rounded-lg shadow-md max-sm:p-2 max-sm:mr-2 max-sm:flex max-sm:flex-col max-sm:items-center max-sm:justify-start">
                <img src="{{ asset('./assets/bootcamp/contentdummy.png') }}"
                    class="lg:h-48 lg:w-full md:h-32 md:w-full sm:h-48 sm:w-full rounded-sm">
                <div class="text-left sm:text-left sm:mt-4">
                    <p class="mt-4 text-gray-700 font-semibold font-sans max-sm:text-xs md:text-lg lg:text-lg ml-2">Digital
                        Marketing : Fullstack Intensive</p>
                    <div
                        class="flex items-center justify-start sm:justify-start max-sm:mt-1 max-sm:text-nowrap md:mt-4 lg:mt-4 text-gray-500">
                        <i class="fas ml-2 fa-calendar-alt mr-2"></i>
                        <p class="text-sm">9 Oktober 2024</p>
                    </div>
                    <div
                        class="flex items-center justify-start sm:justify-start max-sm:mt-1 md:mt-4 lg:mt-4 lg:mb-4 text-gray-500">
                        <i class="fas ml-2 fa-tag mr-2"></i>
                        <p class="text-sm">Rp 590.000<span
                                class="line-through text-xs/tight max-sm:hidden text-red-500">Rp 1.000.000</span></p>
                    </div>
                </div>
            </div>
            <div
                class="bg-white mt-2 mb-2 border rounded-lg shadow-md max-sm:p-2 max-sm:mr-2 max-sm:flex max-sm:flex-col max-sm:items-center max-sm:justify-start">
                <img src="{{ asset('./assets/bootcamp/contentdummy.png') }}"
                    class="lg:h-48 lg:w-full md:h-32 md:w-full sm:h-48 sm:w-full rounded-sm">
                <div class="text-left sm:text-left sm:mt-4">
                    <p class="mt-4 text-gray-700 font-semibold font-sans max-sm:text-xs md:text-lg lg:text-lg ml-2">Digital
                        Marketing : Fullstack Intensive</p>
                    <div
                        class="flex items-center justify-start sm:justify-start max-sm:mt-1 max-sm:text-nowrap md:mt-4 lg:mt-4 text-gray-500">
                        <i class="fas ml-2 fa-calendar-alt mr-2"></i>
                        <p class="text-sm">9 Oktober 2024</p>
                    </div>
                    <div
                        class="flex items-center justify-start sm:justify-start max-sm:mt-1 md:mt-4 lg:mt-4 lg:mb-4 text-gray-500">
                        <i class="fas ml-2 fa-tag mr-2"></i>
                        <p class="text-sm">Rp 590.000<span
                                class="line-through text-xs/tight max-sm:hidden text-red-500">Rp 1.000.000</span></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- end grid -->

        <!-- akses konten premium -->
        <section class="w-full h-auto rounded-b-3xl bg-orange-100 lg:flex items-center mt-12 p-4">
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
        </div>
    </section>
@endsection
