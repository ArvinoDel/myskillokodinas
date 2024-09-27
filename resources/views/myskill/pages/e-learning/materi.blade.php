@extends('./myskill/layouts.main')
@section('container')
@if (Auth::check())
<section class="e-learning w-screen">
    <!-- Section 1: Hero -->
    <section class="bg-gradient-to-b from-orange-400 to-red-500 p-4 md:p-8 h-1/6">
        <div class="container mx-auto">
            <div class="grid grid-flow-row md:grid-flow-col bg-white rounded-3xl items-center h-auto md:h-96">
                @if (Auth::user()->id === $materi->trainer->id && Auth::user()->level == 'pengajar')
                <div class="grid grid-flow-row text-center mx-4 md:mx-6 p-4 max-lg:mx-16 max-lg:p-4">
                    <h3 class="font-bold text-lg md:text-xl py-2 max-lg:text-lg">Selamat Datang, Pengajar
                        Inspiratif! Wujudkan Pembelajaran yang Menarik untuk Siswa Anda!</h3>
                    <h3 class="text-sm md:text-md py-2 max-lg:text-base">Sebagai pengajar, Anda dapat mengakses
                        berbagai materi premium, termasuk video edukasi, modul interaktif, dan webinar dari para
                        pakar industri. Mari ciptakan pengalaman belajar yang luar biasa!</h3>

                    <div class="py-2">
                        <button
                            class="font-semibold py-3 px-4 md:px-6 bg-yellow-400 rounded-xl max-lg:px-5 max-lg:py-2">Mulai
                            Mengajar!</button>
                    </div>

                </div>

                <div class="mx-4 md:mx-8 max-lg:mx-12">
                    <div class="flex items-center justify-between">
                        <h3 class="text-gray-500 font-semibold py-4 mx-0 lg:mx-6">Materi</h3>
                        <i class="fa-solid fa-plus text-gray-900 text-2xl cursor-pointer hover:text-orange-600 transition duration-200 ease-in-out"
                            title="Tambah Materi"></i>
                    </div>
                    @foreach ($materi->isimateri as $isi)
                    <div class="flex items-center justify-between w-full">
                        <button
                            onclick="openFile('{{ asset('../files/' . $isi->file) }}', '{{ $isi->file }}')"
                            class="w-full">
                            <div class="py-2 flex items-center justify-between max-lg:py-3">
                                <div
                                    class="flex items-center space-x-2 mx-2 md:mx-6 flex-grow max-lg:space-x-1">
                                    <i
                                        class="fa-regular fa-circle-play text-sm md:text-lg max-lg:text-base"></i>
                                    <h3 class="text-sm md:text-base max-lg:text-base">{{ $isi->judul_file }}
                                    </h3>
                                </div>
                            </div>
                        </button>
                        <div class="ml-3 flex items-center space-x-2">
                            <a href="#">
                                <i class="fa-solid fa-pen-to-square text-gray-900 text-2xl cursor-pointer hover:text-orange-600 transition duration-200 ease-in-out"
                                    title="Edit"></i>
                            </a>
                            <a href="#">
                                <i class="fa-solid fa-trash text-gray-900 text-2xl cursor-pointer hover:text-orange-600 transition duration-200 ease-in-out"
                                    title="Hapus"></i>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                @if ($vidActive)
                <div class="grid grid-rows-1 md:grid-cols-2">
                    <div class="grid grid-flow-row text-center mx-4 md:mx-6 p-4 max-lg:mx-16 max-lg:p-4">
                        <h3 class="font-bold text-lg md:text-xl py-2 max-lg:text-lg">Selamat Datang,
                            Pengguna
                            Setia! Akses Materi Kapan Saja!</h3>
                        <h3 class="text-sm md:text-md py-2 max-lg:text-base">Sebagai pengguna berlangganan,
                            nikmati seluruh materi premium kami,
                            termasuk video edukasi, modul interaktif, dan webinar dari para pakar industri.
                            Belajar jadi lebih mudah!
                        </h3>
                        <div class="py-2">
                            <button
                                class="font-semibold py-3 px-4 md:px-6 bg-yellow-400 rounded-xl max-lg:px-5 max-lg:py-2">Mulai
                                Petualangan Belajarmu!</button>
                        </div>
                        <h3 class="font-bold text-xs md:text-sm text-red-500 p-2 max-lg:text-xs">Lebih dari
                            10.000+ Orang Telah Bergabung Setiap Bulan!</h3>
                    </div>

                    <div class="grid grid-rows-1 md:mx-12">
                        <div id="divMateri" class="mx-4 md:mx-8 max-lg:mx-12">
                            <h3 class="text-gray-500 font-semibold py-4 mx-0 lg:mx-6">Materi</h3>
                            @foreach ($materi->isimateri as $isi)
                            <button
                                onclick="openFile('{{ asset('../files/' . $isi->file) }}', '{{ $isi->file }}')"
                                class="w-full">
                                <div class="py-2 flex items-center justify-between max-lg:py-3">
                                    <div
                                        class="flex items-center space-x-2 mx-2 md:mx-6 flex-grow max-lg:space-x-1">
                                        <i
                                            class="fa-regular fa-circle-play text-sm md:text-lg max-lg:text-base"></i>
                                        <h3 class="text-sm md:text-base max-lg:text-base">
                                            {{ $isi->judul_file }}
                                        </h3>
                                    </div>
                                    <div class="ml-auto">
                                        <i
                                            class="fa-regular fa-square text-lg md:text-xl max-lg:text-lg"></i>
                                    </div>
                                </div>
                            </button>
                            @endforeach
                        </div>
                        <div id="tugasDiv" class="hidden mx-4 md:mx-8 max-lg:mx-12">
                            <h3 class="text-gray-500 font-semibold py-4 mx-0 lg:mx-6">Tugas</h3>
                            @foreach ($tugas as $task)
                            <button class="w-full">
                                <div class="py-2 flex items-center justify-between max-lg:py-3">
                                    <div class="flex items-center space-x-2 mx-2 md:mx-6 flex-grow max-lg:space-x-1">
                                        <i class="fa-regular fa-circle-play text-sm md:text-lg max-lg:text-base cursor-pointer"></i>
                                        <h3 class="text-sm md:text-base max-lg:text-base cursor-pointer">
                                            {{ $task->judul_tugas }}
                                        </h3>
                                    </div>
                                    <div class="ml-auto">
                                        <i class="fa-solid fa-upload text-lg md:text-xl max-lg:text-lg cursor-pointer" onclick="toggleModal(true)"></i>
                                    </div>
                                </div>
                            </button>
                            @endforeach
                        </div>

                        <!-- Modal Kirim Foto -->
                        <div id="photoUploadModal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black bg-opacity-50">
                            <div class="container w-full mx-auto items-center lg:py-16 md:py-8 max-sm:py-4 max-w-sm bg-white rounded-lg shadow-md overflow-hidden relative">
                                <!-- Cancel Icon -->
                                <button onclick="toggleModal(false)" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>

                                <div class="px-4 py-6">
                                    <div id="file-preview" class="max-w-sm p-6 mb-4 bg-gray-100 border-dashed border-2 border-gray-400 rounded-lg items-center mx-auto text-center cursor-pointer">
                                        <input id="fileInput" type="file" class="hidden" accept="image/*,application/pdf,video/*" onchange="previewFile()" />
                                        <label for="fileInput" class="cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-700 mx-auto mb-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                            </svg>
                                            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Tambahkan file</h5>
                                            <p class="font-normal text-sm text-gray-400 md:px-6">Format file harus berupa <b class="text-gray-600">JPG, PNG, PDF, atau Video</b></p>
                                            <span id="filename" class="text-gray-500 bg-gray-200 z-50"></span>
                                        </label>
                                    </div>
                                    <div class="mb-4">
                                        <textarea id="commentArea" class="w-full border border-gray-300 p-2 rounded" rows="4" placeholder="Tambahkan komentar..."></textarea>
                                    </div>
                                    <div class="flex items-center justify-center">
                                        <div class="w-full">
                                            <button onclick="submitFile()" class="w-full text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 flex items-center justify-center">
                                                <span class="text-center ml-2">Kirim</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <button id="lihatTugasBtn"
                            class="bg-orange-400 text-white font-semibold mx-10 md:mx-14 px-10 py-2 max-sm:mb-3 rounded-xl">
                            Lihat Tugas
                        </button>
                    </div>
                </div>
                @else
                <div class="grid grid-rows-1 md:grid-cols-2">
                    <div class="grid grid-flow-row text-center mx-4 md:mx-6 p-4 max-lg:mx-16 max-lg:p-4">
                        <h3 class="font-bold text-lg md:text-xl py-2 max-lg:text-lg">Yuk Berlangganan Untuk
                            Akses Materinya!</h3>
                        <h3 class="text-sm md:text-md py-2 max-lg:text-base">Berlangganan sekarang juga
                            untuk
                            mulai. Pilih skill apapun dan pelajari kapanpun. Dapatkan video materi
                            terstruktur,
                            modul praktik plus webinar series, rancangan para experts dari top companies.
                        </h3>
                        <div class="py-2">
                            <a href="/e-learning#pricing">
                                <button
                                    class="font-semibold py-3 px-4 md:px-6 bg-yellow-400 rounded-xl max-lg:px-5 max-lg:py-2">Mulai
                                    Berlangganan!</button>

                            </a>
                        </div>
                        <h3 class="font-bold text-xs md:text-sm text-red-500 p-2 max-lg:text-xs">Lebih dari
                            10.000+ Orang Telah Bergabung Setiap Bulan!</h3>
                    </div>

                    <div class="grid grid-rows-1 md:mx-12">
                        <div class="mx-4 md:mx-8 max-lg:mx-12">
                            <h3 class="text-gray-500 font-semibold py-4 mx-0 lg:mx-6">Materi</h3>
                            @foreach ($materi->isimateri as $isi)
                            <button
                                onclick="openFile('{{ asset('../files/' . $isi->file) }}', '{{ $isi->file }}')"
                                class="w-full" disabled>
                                <div class="py-2 flex items-center justify-between max-lg:py-3">
                                    <div
                                        class="flex items-center space-x-2 mx-2 md:mx-6 flex-grow max-lg:space-x-1">
                                        <i
                                            class="fa-regular fa-circle-play text-sm md:text-lg max-lg:text-base"></i>
                                        <h3 class="text-sm md:text-base max-lg:text-base">
                                            {{ $isi->judul_file }}
                                        </h3>
                                    </div>
                                    <div class="ml-auto">
                                        <i
                                            class="fa-regular fa-square text-lg md:text-xl max-lg:text-lg"></i>
                                    </div>
                                </div>
                            </button>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
                @endif
            </div>
            <!-- Modal untuk video -->
            <div id="videoModal"
                class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center pt-16">
                <div class="bg-white p-5 rounded-lg max-w-3xl w-full">
                    <!-- Tambahkan max-w-3xl untuk membatasi lebar -->
                    <span class="close" onclick="closeModal()">&times;</span>
                    <video id="videoPlayer" controls class="w-full">
                        <source id="videoSource" src="" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>

            <!-- Modal untuk PDF -->
            <div id="fileModal"
                class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center pt-20 lg:pt-10">
                <div class="bg-white p-4 rounded-lg max-w-3xl w-full">
                    <!-- Tambahkan max-w-3xl untuk membatasi lebar -->
                    <span class="close" onclick="closeFileModal()">&times;</span>
                    <iframe id="fileViewer" class="w-full h-96" src=""></iframe>
                </div>
            </div>

            <!-- Modal untuk Gambar -->
            <div id="imageModal"
                class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center pt-20 lg:pt-12">
                <div class="bg-white p-4 rounded-lg max-w-2xl w-full">
                    <!-- Ubah max-w-3xl menjadi max-w-2xl untuk memperkecil lebar -->
                    <span class="close" onclick="closeImageModal()">&times;</span>
                    <div class="justify-center items-center">
                        <img id="imageViewer" class="w-96 h-96 justify-center items-center" src=""
                            alt="Gambar">
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
                <h3 class="text-sm sm:text-base md:text-lg font-semibold py-1">Veronica Gabriella - Senior
                    Copywriter
                    SATU Dental Group</h3>
                <p class="text-xs sm:text-sm md:text-md py-1">Copywriting menjadi bagian dalam digital marketing
                    sebagai
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
                                <p class="text-xs sm:text-sm md:text-base break-words">Informasi terkait
                                    copywriting
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
                                <p class="text-xs sm:text-sm md:text-base break-words">Informasi terkait
                                    copywriting
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
                                <p class="text-xs sm:text-sm md:text-base break-words">Informasi terkait
                                    copywriting
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
                                <p class="text-xs sm:text-sm md:text-base break-words">Informasi terkait
                                    copywriting
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
                                <p class="text-xs sm:text-sm md:text-base break-words">Informasi terkait
                                    copywriting
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
                                <p class="text-xs sm:text-sm md:text-base break-words">Informasi terkait
                                    copywriting
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
                                <p class="text-xs sm:text-sm md:text-base break-words">Informasi terkait
                                    copywriting
                                    sangat bisa dipahami. Serta penyampaian materi yang sangat mudah didengar.</p>
                            </div>
                        </div>
                        <!-- Add more cards if needed -->
                    </div>
                </div>
            </div>

        </div>
    </section>


    <!-- Rating Form -->
    <div class="flex flex-col items-center justify-center p-6 bg-gray-100 rounded-lg shadow-lg">
        <!-- Judul -->
        <h2 class="text-lg font-semibold mb-4">Berikan Rating Untuk Materi Ini!</h2>
        @if (Auth::check())
        @if ($vidActive)
        @php
        $user_id = Auth::user()->id;
        $materi_rated_users = json_decode($materi->rated_users);
        @endphp
        @if ($materi_rated_users && in_array($user_id, $materi_rated_users))
        <!-- Jika pengguna sudah memberikan rating -->
        <div id="ratedStarContainer" class="flex justify-center space-x-1 mb-3">
            @for ($i = 1; $i <= 5; $i++)
                <svg xmlns="http://www.w3.org/2000/svg"
                class="w-8 h-8 fill-current {{ $i <= $materi->rating / $materi->rating_count ? 'text-yellow-500' : 'text-gray-400' }}"
                viewBox="0 0 16 16">
                <path
                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                </svg>
                @endfor
        </div>
        {{ $materi->rating_count > 0
                                ? (fmod($materi->rating / $materi->rating_count, 1) == 0
                                        ? number_format($materi->rating / $materi->rating_count, 0)
                                        : number_format($materi->rating / $materi->rating_count, 1)) .
                                    '/5 ' .
                                    ' (' .
                                    $materi->rating_count .
                                    ' users)'
                                : 'No rating available' }}

        <!-- Pesan bahwa pengguna sudah memberikan rating -->
        <div id="ratedMessage" class="text-lg font-semibold text-green-600 mb-3">Anda telah memberikan
            rating.
        </div>
        @else
        <!-- Jika pengguna belum memberikan rating -->
        <form action="{{ route('materi.rate', $materi->id_materi) }}" method="POST"
            id="ratingFormNew" class="text-center">
            @csrf
            <div id="newStarContainer" class="flex justify-center space-x-1 mb-3">
                @for ($i = 1; $i <= 5; $i++)
                    <svg xmlns="http://www.w3.org/2000/svg"
                    class="text-gray-400 w-8 h-8 fill-current cursor-pointer new-star"
                    data-rating="{{ $i }}" viewBox="0 0 16 16"
                    onclick="selectNewRating({{ $i }})">
                    <path
                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                    </svg>
                    @endfor
            </div>

            <!-- Indicator jumlah rating -->
            <div id="newRatingIndicator" class="text-lg font-semibold text-gray-700 mb-3">Rating: 0/5
            </div>

            <input type="hidden" name="rating" id="newRatingValue" required>
            <button type="submit" class="mt-3 px-4 py-2 bg-blue-500 text-white rounded">Submit
                Rating</button>
        </form>
        @endif
        @else
        <p class="text-red-500">Silakan <a href="/e-learning#pricing"
                class="underline text-indigo-600">Berlangganan</a> untuk memberikan rating.</p>
        @endif
        @else
        <p class="text-red-500">Silakan <a href="{{ route('login') }}"
                class="underline text-indigo-600">login</a> untuk memberikan rating.</p>
        @endif

    </div>

    {{-- Section 4: Skills --}}
    <section class="overflow-x-auto bg-white p-4 md:p-8">
        <div class="container mx-auto text-start sm:text-center">
            <h2 class="text-2xl font-bold mb-4">Rekomendasi Kelas Lainnya</h2>
            <p class="mb-4 text-gray-600">
                Pelajari skill melalui serial short video + mini quiz dengan learning path dan topik yang
                terstruktur.
            </p>

            <!-- Carousel Container -->
            <div class="overflow-x-auto pb-2 no-scrollbar mb-5">
                <div id="card-container" class="flex space-x-4">
                    @foreach ($materis as $materi)
                    <a href="{{ url('/e-learning/materi/' . $materi->id_materi) }}">
                        <div id="card-{{ $materi->kategoriprogram->id_kategori_program }}"
                            data-category-id="{{ $materi->kategoriprogram->id_kategori_program }}"
                            class="card flex-none bg-white rounded-lg shadow-md h-80 w-64 flex flex-col">
                            <div class="relative w-full h-40">
                                <img src="{{ asset('./thumbnail/' . $materi->thumbnail) }}"
                                    alt="{{ $materi->nama_materi }}"
                                    class="absolute inset-0 w-full h-full object-contain rounded-t-lg">
                            </div>
                            <div class="p-4 flex flex-col flex-grow">
                                <h3 class="font-bold text-lg mb-2">{{ $materi->nama_materi }}</h3>
                                <div class="flex items-center text-sm">
                                    <span class="mr-2">📅 {{ $materi->kategoriProgram->nama_kategori }}
                                        Video</span>
                                </div>
                                <div class="flex items-center text-sm mt-1">
                                    <span class="mr-2">👤 {{ $materi->rating_count }} users</span>
                                </div>
                                <div class="flex items-center mt-2">
                                    @if ($materi->rating_count > 0)
                                    <span class="text-yellow-500">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <=floor($materi->rating / $materi->rating_count))
                                            ★
                                            @else
                                            ☆
                                            @endif
                                            @endfor
                                    </span>
                                    @endif
                                    <span class="ml-1 text-sm">
                                        {{ $materi->rating_count > 0
                                                        ? (fmod($materi->rating / $materi->rating_count, 1) == 0
                                                                ? number_format($materi->rating / $materi->rating_count, 0)
                                                                : number_format($materi->rating / $materi->rating_count, 1)) .
                                                            '/5 ' .
                                                            ' (' .
                                                            $materi->rating_count .
                                                            ' users)'
                                                        : 'No rating available' }}

                                    </span>
                                </div>

                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>


            </div>
    </section>

    </div>
</section>


<script>
    document.getElementById('lihatTugasBtn').addEventListener('click', function() {
        const tugasDiv = document.getElementById('tugasDiv');
        const divMateri = document.getElementById('divMateri');

        // Toggle visibility
        tugasDiv.classList.toggle('hidden');
        divMateri.classList.toggle('hidden'); // Pastikan ini juga toggle

        // Ganti teks tombol
        this.textContent = tugasDiv.classList.contains('hidden') ? 'Lihat Tugas' : 'Lihat Materi';
    });

    let selectedRating = 0;

    function selectRating(rating) {
        selectedRating = rating;
        document.getElementById('ratingValue').value = rating;

        // Debug: Log rating to ensure it's selected
        console.log("Rating yang dipilih: ", rating);

        // Update rating indicator
        document.getElementById('ratingIndicator').textContent = `Rating: ${rating}/5`;

        // Get all star elements
        const stars = document.querySelectorAll('.star');

        // Change the color of the selected stars
        stars.forEach((star, index) => {
            if (index < rating) {
                star.classList.remove('text-gray-400');
                star.classList.add('text-yellow-500');
            } else {
                star.classList.remove('text-yellow-500');
                star.classList.add('text-gray-400');
            }
        });
    }

    // Script untuk rating baru (belum memberikan rating)
    let selectedNewRating = 0;

    function selectNewRating(rating) {
        selectedNewRating = rating;
        document.getElementById('newRatingValue').value = rating;

        // Debug: Log rating untuk memastikan telah dipilih
        console.log("Rating yang dipilih: ", rating);

        // Update indikator rating
        document.getElementById('newRatingIndicator').textContent = `Rating: ${rating}/5`;

        // Ambil semua elemen bintang
        const newStars = document.querySelectorAll('.new-star');

        // Ganti warna bintang yang dipilih
        newStars.forEach((star, index) => {
            if (index < rating) {
                star.classList.remove('text-gray-400');
                star.classList.add('text-yellow-500');
            } else {
                star.classList.remove('text-yellow-500');
                star.classList.add('text-gray-400');
            }
        });
    }

    // Prevent form submission if no rating is selected
    document.getElementById('ratingForm').addEventListener('submit', function(event) {
        if (selectedRating === 0) {
            event.preventDefault();
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'Please select a rating before submitting.',
                timer: 3000, // Auto close after 3 seconds
                showConfirmButton: false
            });
        }
    });

    function openFile(fileUrl, fileName) {
        const fileExtension = fileName.split('.').pop().toLowerCase();
        // Tambahkan kondisi untuk mendukung ekstensi file yang baru
        const videoExtensions = ['mp4', 'avi', 'mpeg'];
        const documentExtensions = ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'txt'];
        const imageExtensions = ['png', 'jpg', 'jpeg', 'gif'];

        if (videoExtensions.includes(fileExtension)) {
            document.getElementById('videoSource').src = fileUrl;
            document.getElementById('videoPlayer').load();
            document.getElementById('videoModal').classList.remove('hidden');
        } else if (documentExtensions.includes(fileExtension)) {
            document.getElementById('fileViewer').src = fileUrl;
            document.getElementById('fileModal').classList.remove('hidden');
        } else if (imageExtensions.includes(fileExtension)) {
            document.getElementById('imageViewer').src = fileUrl;
            document.getElementById('imageModal').classList.remove('hidden');
        } else {
            alert('Format file tidak didukung.');
        }
    }

    function closeFileModal() {
        document.getElementById('fileModal').classList.add('hidden');
        document.getElementById('fileViewer').src = '';
    }

    function closeImageModal() {
        document.getElementById('imageModal').classList.add('hidden');
        document.getElementById('imageViewer').src = '';
    }

    document.addEventListener("DOMContentLoaded", function() {
        var totalRating = parseFloat(document.getElementById('totalRating').innerText);
        var jumlahUser = parseInt(document.getElementById('jumlahUser').innerText);

        var averageRating = 0;
        if (jumlahUser > 0) {
            averageRating = totalRating / jumlahUser;
        }

        document.getElementById('averageRating').innerText = averageRating.toFixed(
            1); // Membulatkan ke 1 angka desimal
    });

    // Tambahkan fungsi closeModal
    function closeModal() {
        document.getElementById('videoModal').classList.add('hidden');
        document.getElementById('videoSource').src = ''; // Reset video source
        document.getElementById('videoPlayer').load(); // Reload video player
    }
</script>
@else
<script>
    window.onload = function() {
        // Redirect to a specific URL
        window.location.href = "/login";
    };
</script>
@endif

<script>
    function previewFile() {
        const fileInput = document.getElementById('fileInput');
        const filePreview = document.getElementById('file-preview');
        const file = fileInput.files[0];

        if (file) {
            const fileType = file.type;

            if (fileType.startsWith('image/')) {
                // Preview image
                const reader = new FileReader();
                reader.onload = (e) => {
                    filePreview.innerHTML = `<img src="${e.target.result}" class="max-h-48 rounded-lg mx-auto" alt="Image preview" />`;
                };
                reader.readAsDataURL(file);
            } else if (fileType === 'application/pdf') {
                // Preview PDF
                filePreview.innerHTML = `
                    <embed src="${URL.createObjectURL(file)}" type="application/pdf" class="w-full h-48 rounded-lg mx-auto" />
                `;
            } else if (fileType.startsWith('video/')) {
                // Preview video
                filePreview.innerHTML = `
                    <video controls class="w-full max-h-48 rounded-lg mx-auto">
                        <source src="${URL.createObjectURL(file)}" type="${fileType}" />
                        Your browser does not support the video tag.
                    </video>
                `;
            } else {
                filePreview.innerHTML = `<div class="text-gray-500">Unsupported file format</div>`;
            }

            // Display filename
            document.getElementById('filename').textContent = file.name;
            filePreview.classList.remove('border-dashed', 'border-2', 'border-gray-400');
        } else {
            // Reset preview if no file is selected
            filePreview.innerHTML = `<div class="bg-gray-200 h-48 rounded-lg flex items-center justify-center text-gray-500">No file preview</div>`;
            filePreview.classList.add('border-dashed', 'border-2', 'border-gray-400');
        }
    }

    function toggleModal(show) {
        const modal = document.getElementById('photoUploadModal');
        modal.classList.toggle('hidden', !show);
    }

    function submitFile() {
        // Logic to handle the file submission
        console.log("File submitted!");
        toggleModal(false); // Close modal after submission
    }
</script>



@endsection
