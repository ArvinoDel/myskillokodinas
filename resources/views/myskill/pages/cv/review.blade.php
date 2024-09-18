@extends('./myskill/layouts.main')
@section('container')
    <!-- header here -->
    <section class="review w-screen h-auto">
        <section class="bg-white bg-gradient-to-b from-orange-400 to-red-400 text-white lg:flex md:flex md:flex-row">
            <img src="{{ asset('./assets/review/reviewcv.png') }}"
                class="lg:h-72 md:h-64 md:w-56 max-lg:w-1/4 lg:ml-16 py-2 max-sm:h-64 max-sm:w-64 md:ml-10 mx-auto">
            <!-- Added mx-auto for centering -->
            <div class="p-4"> <!-- Added text-center for centering text -->
                <p
                    class="lg:text-4xl max-sm:text-3xl md:text-3xl lg:w-11/12 max-sm:w-auto font-bold lg:text-white md:text-white text-white w-full max-lg:w-96">
                    Dapatkan Review CV oleh HRD & Dokumen Persiapan Melamar Kerja.
                </p>
                <br class="max-sm:hidden">
                <p class="lg:w-8/12 md:w-full lg:mb-4 lg:text-white text-white md:text-white">
                    Tingkatkan peluang diterima magang dan kerja full-time dengan bantuan HRD. Mulai dari Review CV,
                    Template Surat Lamaran, hingga persiapan wawancara.
                </p>
                <button type="button"
                    onclick="document.getElementById('harga-program').scrollIntoView({ behavior: 'smooth' });"
                    class="max-sm:hidden md:hidden lg:block focus:outline-none text-black bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2">
                    Daftar Sekarang
                </button>
                <div class="flex items-center mt-2 max-sm:hidden md:hidden lg:flex lg:justify-start">
                    <div class="flex space-x-1">
                        <img src="{{ asset('./assets/bootcamp/hero-header.png') }}" class="h-6 w-6 rounded-full">
                        <img src="{{ asset('./assets/bootcamp/hero-header.png') }}" class="h-6 w-6 rounded-full">
                        <img src="{{ asset('./assets/bootcamp/hero-header.png') }}" class="h-6 w-6 rounded-full">
                        <img src="{{ asset('./assets/bootcamp/hero-header.png') }}" class="h-6 w-6 rounded-full">
                        <img src="{{ asset('./assets/bootcamp/hero-header.png') }}" class="h-6 w-6 rounded-full">
                    </div>
                    <p class="ml-4 text-white text-md font-semibold text-nowrap">> 10.000 CV Telah Direview</p>
                </div>

            </div>
        </section>


        <!-- card here -->
        <section class="bg-red-400 text-white lg:flex max-sm:hidden">
            <div class="flex justify-center items-center w-full">
                <p class="text-center text-2xl font-bold text-white">Testimoni Peserta Review CV
                    MySkill</p>
            </div>
        </section>
        <section class="bg-white bg-gradient-to-b from-red-400 to-red-500 text-white lg:flex ">
            <p class="text-white font-bold text-2xl ml-4 md:hidden lg:hidden">Testimoni Peserta Review CV</p>
            <br>
            <div class="flex overflow-x-auto space-x-4 mx-5 px-1 py-4 no-scrollbar">
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


        <div class="container mx-auto px-4 py-8">
            <div class="flex flex-wrap -mx-4">
                <div class="w-full max-lg:hidden md:w-1/4 px-4 mb-8 sticky top-11 h-screen">
                    <div class="bg-white rounded-xl shadow-2xl p-6 border border-spacing-2">
                        <h4 class="font-bold text-lg mb-4">Detail</h4>
                        <ul class="space-y-2">
                            <li><a href="#tentang-bootcamp" class="text-black hover:text-orange-600"><i
                                        class="fas fa-chevron-right text-orange-600 mr-3"></i>Tentang Program</a>
                            </li>
                            <li><a href="#benefit-tambahan" class="text-black hover:text-orange-600"><i
                                        class="fas fa-chevron-right text-orange-600 mr-3"></i>Benefit Tambahan</a>
                            </li>
                            <li><a href="#untuk-siapa-saja" class="text-black hover:text-orange-600"><i
                                        class="fas fa-chevron-right text-orange-600 mr-3"></i>Untuk Siapa Saja</a>
                            </li>
                            <li><a href="#harga-program" class="text-black hover:text-orange-600"><i
                                        class="fas fa-chevron-right text-orange-600 mr-3"></i>Harga Program</a></li>
                        </ul>
                        <button
                            class="w-full bg-yellow-500 text-white font-bold py-2 px-4 rounded mt-6 hover:bg-yellow-600"> <i
                                class="fas fa-bolt mr-2"></i>Daftar
                            Sekarang</button>
                    </div>
                </div>

                <div class="w-screen lg:w-3/4 px-4">
                    <div class="bg-white rounded-lg mb-6">
                        <p id="tentang-bootcamp"
                            class="text-orange-600 lg:ml-4 lg:text-xl max-sm:text-lg max-sm:ml-2 font-bold md:text-xl md:mb-4">
                            <i class="fas fa-chevron-right sm:text-base text-orange-600 mr-3"></i>Tentang Bootcamp
                        </p>
                        <!-- Gambar di sebelah kiri -->
                        <p class="mb-4 lg:ml-4 lg:text-base max-sm:ml-2 text-black">MySkill paham, proses melamar magang
                            atau kerja
                            amat membingungkan. Kita seolah menebak-nebak standar HRD dalam menilai CV kita akan seperti
                            apa? Untuk itu, HR Consultant MySkill hadir untuk membantu mereview CV kamu. Dalam waktu 7 hari
                            kerja, kamu akan mendapatkan saran terperinci untuk meningkatkan kualitas CV lamaranmu.</p>
                        <div class="flex flex-col md:flex-row items-start">

                            <img src="./assets/corporate/benefit-main.webp" alt=""
                                class="w-60 mx-auto max-sm:justify-items-center md:w-1/3 mb-4 md:mb-0 md:mr-4">
                            <!-- Tulisan di sebelah kanan -->
                            <div>
                                <ul class="space-y-2">
                                    <li class="flex items-start">
                                        <svg class="w-6 h-6 text-green-500 mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        CV kamu akan direview langsung oleh HRD profesional. Baik CV magang, kerja, beasiswa
                                        dan keperluan profesional lainnya.
                                    </li>
                                    <li class="flex items-start">
                                        <svg class="w-6 h-6 text-green-500 mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        Review diberikan maksimal dalam waktu 7 hari kerja (Dilakukan pada hari dan jam
                                        kerja: Senin - Jumat, pukul 09.00 - 17.00 WIB)
                                    </li>
                                    <li class="flex items-start">
                                        <svg class="w-6 h-6 text-green-500 mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        Pembahasan detail dan mendalam untuk setiap bagian CV. Kamu akan mendapat saran
                                        editing dan contoh di tiap poin CV kamu.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg p-6 mb-8">
                        <p id="benefit-tambahan"
                            class="text-orange-600 lg:mb-4 lg:ml-4 lg:text-xl max-sm:text-lg max-sm:mb-6 max-sm:ml-2 font-bold md:text-xl md:mb-4">
                            <i class="fas fa-chevron-right sm:text-base text-orange-600 mr-3"></i>Benefit Tambahan
                        </p>
                        <div class="overflow-x-auto no-scrollbar">
                            <div class="flex space-x-6">
                                <div class="border rounded-lg p-4 flex-shrink-0 w-80">
                                    <div class="flex items-center">
                                        <!-- Gambar di sebelah kiri -->
                                        <img src="./assets/corporate/benefit-additional-1.webp" alt=""
                                            class="w-24 h-24 object-cover mr-4">
                                        <!-- Tulisan di sebelah kanan -->
                                        <div>
                                            <h5 class="font-bold text-lg mb-2">20 Template CV</h5>
                                            <p class="mb-2">Bahasa Indonesia & Bahasa Inggris yang ATS Friendly</p>
                                            <p class="text-sm text-gray-600">7.345 pengguna</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="border rounded-lg p-4 flex-shrink-0 w-80">
                                    <div class="flex items-center">
                                        <img src="./assets/corporate/benefit-additional-2.webp" alt=""
                                            class="w-24 h-24 object-cover mr-4">
                                        <div>
                                            <h5 class="font-bold text-lg mb-2">20 Template Surat Lamaran</h5>
                                            <p class="mb-2">Bahasa Indonesia & Bahasa Inggris</p>
                                            <p class="text-sm text-gray-600">6.845 pengguna</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="border rounded-lg p-4 flex-shrink-0 w-80">
                                    <div class="flex items-center">
                                        <img src="./assets/corporate/benefit-additional-3.webp" alt=""
                                            class="w-24 h-24 object-cover mr-4">
                                        <div>
                                            <h5 class="font-bold text-lg mb-2">100+ Powerful Keywords for CV</h5>
                                            <p class="mb-2">Bahasa Indonesia & Bahasa Inggris sesuai profesi</p>
                                            <p class="text-sm text-gray-600">7.264 pengguna</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="border rounded-lg p-4 flex-shrink-0 w-80">
                                    <div class="flex items-center">
                                        <img src="./assets/corporate/benefit-additional-4.webp" alt=""
                                            class="w-24 h-24 object-cover mr-4">
                                        <div>
                                            <h5 class="font-bold text-lg mb-2">10 Template Email Lamaran</h5>
                                            <p class="mb-2">Bahasa Indonesia & Bahasa Inggris</p>
                                            <p class="text-sm text-gray-600">5.567 pengguna</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="border rounded-lg p-4 flex-shrink-0 w-80">
                                    <div class="flex items-center">
                                        <img src="./assets/corporate/benefit-additional-5.webp" alt=""
                                            class="w-24 h-24 object-cover mr-4">
                                        <div>
                                            <h5 class="font-bold text-lg mb-2">Interview Question & Tips</h5>
                                            <p class="mb-2">Bikin HR susah skip</p>
                                            <p class="text-sm text-gray-600">4.425 pengguna</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="border rounded-lg p-4 flex-shrink-0 w-80">
                                    <div class="flex items-center">
                                        <img src="./assets/corporate/benefit-additional-6.webp" alt=""
                                            class="w-24 h-24 object-cover mr-4">
                                        <div>
                                            <h5 class="font-bold text-lg mb-2">LinkedIn Guideline</h5>
                                            <p class="mb-2">Sulap profil LinkedIn-mu jadi profesional</p>
                                            <p class="text-sm text-gray-600">4.756 pengguna</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg p-6">
                        <p id="untuk-siapa-saja"
                            class="text-orange-600 lg:ml-4 lg:text-xl max-sm:text-lg max-sm:ml-2 max-sm:mb-4 font-bold md:text-xl md:mb-4">
                            <i class="fas fa-chevron-right sm:text-base text-orange-600 mr-3"></i>Untuk Siapa Saja
                        </p>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            @foreach (['Mahasiswa', 'Fresh Graduate', 'Job Seeker', 'Karyawan Profesional', 'Lulusan SMA/SMK', 'Internship Hunter', 'Pencari Beasiswa', 'Freelancer'] as $audience)
                                <div class="bg-gray-100 rounded-lg p-3 flex items-center">
                                    <svg class="w-5 h-5 text-blue-500 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                    </svg>
                                    {{ $audience }}
                                </div>
                            @endforeach
                        </div>
                    </div>


                    <p id="harga-program"
                        class="text-orange-600 lg:mb-4 lg:ml-10 lg:text-xl max-sm:text-lg max-sm:mb-6 max-sm:ml-2 font-bold md:text-xl md:ml-6">
                        <i class="fas fa-chevron-right sm:text-base text-orange-600 mr-3"></i>Harga Program
                    </p>
                    <div class="overflow-x-auto mt-2 no-scrollbar">
                        <div class="flex justify-evenly md:w-[90%] lg:w-96 space-x-4">
                            <!-- Flex container dengan space-x-4 -->
                            @foreach ($programs as $program)
                                <div
                                    class="bg-white rounded-2xl lg:shadow-lg md:ml-2 border md:mt-4 lg:p-6 md:p-6 max-sm:p-2 max-sm:m-2 m-4 md:w-5/6 max-sm:w-5/6 flex-shrink-0 flex flex-col">
                                    <!-- Added flex column -->
                                    <h2 class="text-orange-600 text-lg font-bold mb-4 max-sm:ml-2">
                                        {{ $program->nama_programcv . '(' . $program->masa_berlangganan . ')' }}
                                    </h2>
                                    <ul class="text-gray-700 mb-6 space-y-2">
                                        @foreach ($program->benefitscv() as $benefitcv)
                                            <li class="max-sm:ml-2">🔥 {{ $benefitcv->nama_benefit }}</li>
                                        @endforeach
                                    </ul>
                                    <div class="mb-4">
                                        <p class="text-lg line-through text-gray-400 whitespace-nowrap">Rp
                                            {{ number_format($program->harga_berlangganan, 0, ',', '.') }}</p>
                                        <p class="text-2xl font-bold text-orange-600 whitespace-nowrap">Rp
                                            {{ number_format($program->harga_diskon, 0, ',', '.') }}</p>
                                    </div>
                                    <a href="{{ route('payment', ['id' => $program->id_programcv]) }}">
                                        <button class="bg-orange-500 text-white font-bold py-2 px-4 rounded-lg w-full">
                                            Daftar Sekarang
                                        </button>
                                    </a>

                                </div>
                            @endforeach

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
@endsection
