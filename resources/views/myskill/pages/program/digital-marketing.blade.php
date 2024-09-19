@extends('./myskill/layouts.main')
@section('container')
    <div class="digital-marketing">
        <section
            class="w-full h-auto bg-white bg-gradient-to-b from-orange-400 to-red-400 text-white lg:flex max-sm:text-black max-sm:bg-white lg:mb-4">
            <img src="{{ asset('./assets/bootcamp/full.png') }}"
                class="lg:h-96 md:h-full md:p-4 rounded-3xl w-auto lg:mt-4 lg:ml-16 py-2 max-sm:h-60 max-sm:mx-auto">
            <div class="lg:ml-4 max-sm:text-black max-sm:w-full max-sm:text-center max-sm:mx-auto max-sm:py-4"
                style="width: 100%;">
                <p
                    class="lg:ml-4 md:ml-4 text-white lg:text-4xl font-bold lg:w-4/5 max-sm:text-2xl max-sm:text-left max-sm:w-full max-sm:px-3 lg:mt-4">
                    {{ $bootcamp->judul_bootcamp }}
                </p>
                <br>

                <div class="max-sm:overflow-x-auto">
                    <div class="flex flex-wrap justify-start max-sm:flex-nowrap">
                        <!-- batch 1 -->
                        @foreach ($bootcamp->batch as $batch)
                            <div
                                class="lg:w-52 lg:h-30 md:w-48 md:h-30 max-sm:w-[90%] max-sm:h-28 lg:ml-4 md:ml-3 max-sm:ml-2 max-sm:mb-2 bg-white border border-gray-400 lg:rounded-2xl md:rounded-xl max-sm:rounded-lg shadow relative">
                                <div class="flex justify-between items-start max-sm:ml-2 max-sm:mr-2">
                                    <p
                                        class="font-bold text-orange-600 text-2xl lg:ml-4 lg:mt-2 md:ml-3 md:text-lg max-sm:text-base">
                                        {{ $batch->nama_sesi }}
                                    </p>
                                    <span
                                        class="bg-red-500 text-white text-xs font-bold px-1 rounded-full max-sm:text-xs max-sm:mt-1 md:mt-1 md:mr-1">Limited</span>
                                </div>
                                <p
                                    class="flex justify-start text-black font-regular text-xl lg:ml-4 md:ml-3 md:text-base max-sm:ml-2 max-sm:text-lg">
                                    Rp.
                                    {{ $bootcamp->harga }}
                                </p>
                                <p
                                    class="flex justify-start text-gray-500 font-regular text-xs lg:ml-4 line-through md:ml-3 max-sm:ml-2">
                                    Early sale: Rp.
                                    {{ $bootcamp->harga_diskon }}
                                </p>
                                <p
                                    class="flex justify-start text-gray-500 font-regular text-xs lg:ml-4 md:ml-3 max-sm:ml-2 max-sm:text-xs">
                                    Late sale: Rp.
                                    {{ $bootcamp->harga }}
                                </p>
                                <p
                                    class="flex justify-start text-black font-base text-nowrap text-sm lg:ml-4 lg:mb-1 md:ml-3 md:mb-1 max-sm:ml-2 max-sm:mb-2">
                                    {{ $batch->tanggal_mulai }} - {{ $batch->tanggal_selesai }}
                                </p>
                            </div>
                    </div>
                    <a href="{{ route('payment.bootcamp', ['id' => $batch->id_batch]) }}">
                        <button type="button"
                            class="lg:ml-4 lg:mt-2 md:ml-4  md:text-base md:mt-4 md:p-4 focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-2 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2 max-sm:bg-yellow-500 max-sm:px-3 max-sm:py-1.5 max-sm:w-4/5 max-sm:mx-auto">
                            <i class="fas fa-bolt ml-2"></i> Daftar Sekarang
                        </button>
                    </a>
                    @endforeach



                </div>



                <div class="flex items-center mt-1 max-sm:flex-col max-sm:items-center">
                    <p
                        class="lg:ml-4 md:ml-4 md:text-sm md:mb-4 text-white text-md font-semibold max-sm:ml-0 max-sm:text-sm max-sm:mt-2">
                        5.000+ Alumni Bootcamp Tiap Bulan</p>
                </div>
            </div>
        </section>
    </div>
    <!-- Modal -->
    <div id="registrationModal" class="fixed inset-0 z-50 hidden justify-center">
        <div class="flex items-center justify-center min-h-screen px-4 py-12 sm:px-0">
            <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true"></div>
            <div class="z-50 w-full max-w-md p-6 overflow-hidden transition-all transform bg-white rounded-lg shadow-xl">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-medium text-gray-900">Pendaftaran Bootcamp</h3>
                    <button
                        class="text-gray-400 hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <span class="sr-only">Close</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <div class="mt-4">
                    <div class="flex bg-yellow-100 px-5 py-3 rounded-xl">
                        <i class="fa-solid fa-triangle-exclamation me-2 py-2" style="color: #FAB13A;"></i>
                        <p class="text-sm text-stone-600">Sebelum mendaftar bootcamp, yuk cek kembali data profil yang akan
                            digunakan di sertifikatmu nanti.</p>
                    </div>
                    <form>
                        <div class="mt-4">
                            <label for="fullName" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                            <input type="text" id="fullName"
                                class="w-full mt-1 py-3 px-2 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                placeholder="Masukan Nama Lengkap">
                        </div>
                        <div class="mt-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" id="email"
                                class="w-full mt-1 py-3 px-2  border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                placeholder="Masukan Email Anda">
                        </div>
                        <div class="mt-4">
                            <label for="phone" class="block text-sm font-medium text-gray-700">No. HP</label>
                            <input type="text" id="phone"
                                class="w-full mt-1 py-3 px-2  border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                placeholder="Masukkan No. HP">
                        </div>
                        <div class="mt-4">
                            <label for="batch" class="block text-sm font-medium text-gray-700">Batch Bootcamp</label>
                            <select id="batch"
                                class="w-full mt-1 py-3 px-2  border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                <option selected>Silahkan pilih batch bootcamp...</option>
                                <option value="batch1">Batch 1</option>
                                <option value="batch2">Batch 2</option>
                                <!-- Tambahkan batch lainnya di sini -->
                            </select>
                        </div>
                    </form>
                </div>
                <div class="flex justify-end mt-4">
                    <button type="button"
                        class="px-4 py-2 mr-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Tutup</button>
                    <button type="button"
                        class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Lanjut
                        Pendaftaran</button>
                </div>
            </div>
        </div>
    </div>
    <div class="flex ">
        <!-- Sidebar -->
        <div class="w-64 md:w-1/4 px-4 pt-6 mb-8 sticky top-11 h-full max-sm:hidden lg:block md:hidden">
            <div class="h-10/12 top-0 pb-10 bg-white rounded-lg shadow-md p-4 lg:ml-4 lg:mb-4 lg:mt-4">
                <ul class="space-y-2">
                    <p class="text-md font-semibold">Detail</p>
                    <!-- Daftar item di sini -->
                    <li class="flex items-center hover:bg-gray-300">
                        <i class="fas fa-chevron-right text-black"></i>
                        <a href="#tentang-bootcamp" class="text-black font-medium ml-2">Tentang Bootcamp</a>
                    </li>
                    <li class="flex items-center hover:bg-gray-300">
                        <i class="fas fa-chevron-right text-black"></i>
                        <a href="#prospek" class="text-black font-medium ml-2">Prospek Karier</a>
                    </li>
                    <li class="flex items-center hover:bg-gray-300">
                        <i class="fas fa-chevron-right text-black"></i>
                        <a href="#dapatkan" class="text-black font-medium ml-2">Yang Bisa Kamu Dapatkan</a>
                    </li>
                    <li class="flex items-center hover:bg-gray-300">
                        <i class="fas fa-chevron-right text-black"></i>
                        <a href="#benefit" class="text-black font-medium ml-2">Benefit Bootcamp</a>
                    </li>
                    <li class="flex items-center hover:bg-gray-300">
                        <i class="fas fa-chevron-right text-black"></i>
                        <a href="#peserta" class="text-black font-medium ml-2">Peserta Bootcamp</a>
                    </li>
                    <li class="flex items-center hover:bg-gray-300">
                        <i class="fas fa-chevron-right text-black"></i>
                        <a href="#kurikulum" class="text-black font-medium ml-2">Kurikulum & Silabus</a>
                    </li>
                    <li class="flex items-center hover:bg-gray-300">
                        <i class="fas fa-chevron-right text-black"></i>
                        <a href="#sistem" class="text-black font-medium ml-2">Sistem Belajar</a>
                    </li>
                    <li class="flex items-center hover:bg-gray-300">
                        <i class="fas fa-chevron-right text-black"></i>
                        <a href="#faq" class="text-black font-medium ml-2">FAQ</a>
                    </li>
                    <li class="flex items-center hover:bg-gray-300">
                        <i class="fas fa-chevron-right text-black"></i>
                        <a href="#komunitas" class="text-black font-medium ml-2">Komunitas</a>
                    </li>
                    <!-- Tambahkan item lainnya di sini -->
                </ul>
            </div>
            <!-- Tombol Daftar Sekarang dengan Ikon Petir -->
            <div class="">
                <a href="/payment">
                    <button
                        class="absolute top-[340px] left-4 w-9/12 bg-yellow-500 hover:bg-yellow-500 focus:ring-2 focus:ring-yellow-300 text-white rounded-lg flex items-center justify-center lg:p-1 lg:ml-7 lg:mb-4 lg:mt-12">
                        <i class="fas fa-bolt mr-2"></i>
                        Daftar Sekarang
                    </button>
                </a>
            </div>
        </div>
        <!-- Main Content -->
        <div class="flex-1 lg:p-8 max-sm:p-2">
            <p id="tentang-bootcamp"
                class="text-orange-600 lg:ml-4 lg:text-xl max-sm:text-base max-sm:ml-2 font-bold md:text-xl md:mt-4"><i
                    class="fas fa-chevron-right sm:text-sm text-orange-600 mr-3 md:ml-6 md:text-xl"></i>Tentang Bootcamp
            </p>
            <p class="lg:mt-1 sm:mt-2 ml-2 max-sm:mb-1 lg:text-base max-sm:text-sm md:ml-6">
                {{ $bootcamp->deskripsi }}
            </p>
            <br>
            <img src="{{ asset('./assets/bootcamp/adv.png') }}"
                class="lg:h-64 rounded-3xl w-auto lg:mt-4 lg:ml-6 lg:py-2 max-sm:h-fit max-sm:w-12 max-sm:mx-auto max-sm:my-4">
            <br class="max-sm:hidden">
            <div class="max-sm:hidden md:hidden">
                <!-- Konten ini akan hilang pada layar kecil -->
                <div class="flex overflow-x-auto space-x-4 no-scrollbar">
                    <img src="{{ asset('./assets/bootcamp/motivasi.png') }}"
                        class="lg:h-64 max-sm:h-44 lg:w-auto object-fill">
                    <img src="{{ asset('./assets/bootcamp/motivasi2.png') }}"
                        class="lg:h-64 max-sm:h-44 lg:w-auto object-fill">
                    <img src="{{ asset('./assets/bootcamp/motivasi.png') }}"
                        class="lg:h-64 max-sm:h-44 lg:w-auto object-fill">
                    <img src="{{ asset('./assets/bootcamp/motivasi2.png') }}"
                        class="lg:h-64 max-sm:h-44 lg:w-auto object-fill">
                    <img src="{{ asset('./assets/bootcamp/motivasi.png') }}"
                        class="lg:h-64 max-sm:h-44 lg:w-auto object-fill">
                </div>
            </div>
            <div class="lg:hidden">
                <!-- Konten ini akan hilang pada layar besar -->
                <div class="flex overflow-x-auto space-x-4 no-scrollbar">
                    <img src="{{ asset('./assets/bootcamp/motiv1.png') }}" class="max-sm:w-96 object-fill">
                    <img src="{{ asset('./assets/bootcamp/motif2.png') }}" class="max-sm:w-96 object-fill">
                    <img src="{{ asset('./assets/bootcamp/motiv1.png') }}" class="max-sm:w-96 object-fill">
                    <img src="{{ asset('./assets/bootcamp/motif2.png') }}" class="max-sm:w-96 object-fill">
                </div>
            </div>
            <br>
            <div>
                <!-- prospek karir start -->
                <p id="prospek"
                    class="text-orange-600 lg:text-xl max-sm:text-base max-sm:ml-2 font-bold md:ml-6 md:text-xl"><i
                        class="fas fa-chevron-right text-orange-600 mr-3 md:ml-1 md:text-xl"></i>Prospek Karir</p>
                <p class="lg:mt-4 sm:mt-2 lg:ml-2 max-sm:mb-1 lg:text-base max-sm:text-sm md:ml-6">Ikuti Intensive Bootcamp
                    dan dapatkan balik modal secara berlipat dari
                    gaji pertamamu. Berbagai pilihan profesi yang bisa dijalani saat memiliki skill digital marketing:
                    <br>
                    💎 Social Media Specialist : Rp 5-15 Juta/bulan.
                    <br>
                    💎 Copywriter : Rp 4-12 Juta/bulan.
                    <br>
                    💎 Content Writer : Rp 4-13 Juta/bulan.
                    <br>
                    💎 SEO/SEM Specialist : Rp 6-15 Juta/bulan.
                    <br>
                    💎 Performance Marketing : Rp 8- 15 Juta/bulan.
                    <br>
                    💎 Brand Strategist : Rp 6-17 Juta/bulan.
                    <br>
                    💎 KOL Management : Rp 3,5 - 12 Juta/bulan.
                    <br>
                    💎 Customer Relationship Management : Rp 3,5-16 Juta/bulan.
                    <br>
                    *Source: Glasdoor
                </p>
                <p class="lg:mt-4 sm:mt-2 ml-2 max-sm:mb-1 lg:text-base max-sm:text-sm md:ml-6">
                    MySkill percaya, kamu pun bisa belajar dari nol dan rintis karir impianmu meski awalnya terasa sulit.
                    Maka, tak perlu diperumit dengan harus memikirkan biaya selangit. <b>Saat ini, para peserta Bootcamp
                        MySkill telah diterima bekerja di berbagai multinational dan top local companies seperti:</b>
                </p>
            </div>
            <div>
                <img src="{{ asset('./assets/bootcamp/trusted.png') }}"
                    class="lg:h-80 rounded-3xl w-full lg:w-auto lg:mt-4 lg:ml-2 py-2 max-sm:w-full max-sm:h-auto max-sm:mx-auto max-sm:my-4 object-cover md:p-4">

            </div>
            <!-- prospek karir end -->
            <!-- yang bisa kamu dapatkan start -->
            <p id="dapatkan" class="text-orange-600 lg:text-xl max-sm:text-base max-sm:ml-2 font-bold md:text-xl"><i
                    class="fas fa-chevron-right text-orange-600 mr-3 md:ml-6 md:text-xl"></i>Apa Yang Bisa Kamu Dapatkan
            </p>
            <p class="lg:mt-4 sm:mt-2 ml-2 max-sm:mb-1 lg:text-base max-sm:text-sm md:ml-6">Upgrade skill mulai dari
                memahami konsep, analisa studi kasus, hingga praktik untuk mengoptimalkannya. Kuasai berbagai skill dan
                tools di bidang Digital Marketing untuk karier maupun bisnis kamu.
                <b>Contoh Skill & Portfolio yang bisa kamu miliki:</b>
            </p>
            <img src="{{ asset('./assets/bootcamp/get.png') }}"
                class="lg:h-80 rounded-3xl w-auto lg:mt-4 lg:ml-2 py-2 max-sm:w-full max-sm:mx-auto max-sm:my-4 object-cover">
            <!-- scrollbar-2 -->
            <div name="scrollbar-2 mb-4">
                <div class="flex overflow-x-auto space-x-4 no-scrollbar">
                    <img src="{{ asset('./assets/bootcamp/get3.png') }}" class="h-64 w-auto max-sm:w-64 max-sm:h-32">
                    <img src="{{ asset('./assets/bootcamp/get2.png') }}" class="h-64 w-auto max-sm:w-64 max-sm:h-32">
                    <img src="{{ asset('./assets/bootcamp/get3.png') }}" class="h-64 w-auto max-sm:w-64 max-sm:h-32">
                    <img src="{{ asset('./assets/bootcamp/get2.png') }}" class="h-64 w-auto max-sm:w-64 max-sm:h-32">
                    <img src="{{ asset('./assets/bootcamp/get3.png') }}" class="h-64 w-auto max-sm:w-64 max-sm:h-32">
                </div>
            </div>
            <!-- yang bisa kamu dapatkan end -->
            <!-- benefit start -->
            <p id="benefit"
                class="text-orange-600 lg:text-xl max-sm:text-base max-sm:ml-2 lg:mt-6 max-sm:mt-2 font-bold md:text-xl"><i
                    class="fas fa-chevron-right text-orange-600 mr-3 md:ml-6"></i>Benefit Bootcamp</p>
            <p class="lg:mt-2 lg:mb-1 max-sm:ml-2 max-sm:mt-2 md:text-base md:ml-6 md:mt-2"><b>Materi Kelas:</b></p>
            @foreach ($bootcamp->benefit() as $benefit)
                <span><br>
                    <p class="lg:mt-4 sm:mt-2 ml-2 max-sm:mb-1 lg:text-base max-sm:text-sm md:ml-6">✅
                        {{ $benefit->nama_benefit }}
                    </p>
            @endforeach

            <p class="lg:mt-6 lg:mb-6 max-sm:ml-2 md:ml-6 md:mt-2 "><b>Seletah Kelas:</b></p>
            <p class="lg:mt-4 sm:mt-2 ml-2 max-sm:mb-1 lg:text-base max-sm:text-sm md:ml-6">
                ✅ Mendapat rekaman video setiap Sesi untuk dipelajari Kembali.
                <br>
                ✅ Mendapatkan e-Certificate selesai pelatihan.
            </p>
            <p class="md:ml-6 md:mb-2 lg:mt-4 sm:mt-2 ml-2 max-sm:mb-1 lg:text-base max-sm:text-sm">
                <b><i>[Opsional] +Additional Fee jika ingin bergabung program Final Project secara berkelompok.</i></b>
                Pembayaran dilakukan terpisah, saat Bootcamp dimulai.
            </p>
            <b class="max-sm:mt-6 max-sm:ml-2 md:ml-6"><i>Final Fotofolio Project</i></b>
            <p class="lg:mt-4 sm:mt-2 ml-2 max-sm:mb-1 lg:text-base max-sm:text-sm md:ml-6 md:mb-2">✅ Dibentuk team project
                untuk pembuatan final portofolio. <br>
                ✅ Portfolio dibuat komprehensif sesuai standar melamar kerja. <br>
                ✅ 3x sesi mentoring dan review untuk final portfolio project. <br>
                ✅ Special award untuk tim terbaik.</p>
            <b class="max-sm:mt-6 max-sm:ml-2 md:ml-6 "><i>Akselerasi Karir</i></b>
            <p class="lg:mt-4 sm:mt-2 ml-2 max-sm:mb-1 lg:text-base max-sm:text-sm md:ml-6">✅ Mendapat template CV & Surat
                Lamaran kerja versi Bahasa Inggris & Bahasa Indonesia. <br>
                ✅ Akses Ratusan Video eLearning dengan ratusan sertifikat yang bisa didapatkan.</p>
            <img src="{{ asset('./assets/bootcamp/sertifikat.png') }}"
                class="lg:h-80 rounded-3xl w-full lg:w-auto lg:mt-4 lg:ml-2 py-2 max-sm:w-full max-sm:h-auto max-sm:mx-auto max-sm:my-4 object-cover md:p-4">
            <!-- benefit end -->

            <!-- peserta bootcamp -->
            <p id="peserta"
                class="text-orange-600 lg:text-xl max-sm:text-base max-sm:ml-2 lg:mt-6 font-bold md:text-xl md:mb-4 md:mt-4">
                <i class="fas fa-chevron-right text-orange-600 mr-3 md:ml-6 "></i>Peserta Bootcamp
            </p>
            <img src="{{ asset('./assets/bootcamp/peserta.png') }}"
                class="lg:h-80 rounded-3xl w-full lg:w-auto lg:mt-4 lg:ml-2 py-2 max-sm:w-full max-sm:h-auto max-sm:mx-auto max-sm:my-4 object-cover md:p-4">
            <!-- Kurikulum & Silabus -->
            <p id="kurikulum"
                class="text-orange-600 lg:text-xl max-sm:text-base max-sm:ml-2 lg:mt-6 font-bold md:text-xl"><i
                    class="fas fa-chevron-right text-orange-600 mr-3 md:ml-6"></i>Kurikulum & Silabus</p>
            <b class="lg:mt-4 sm:mt-2 ml-2 max-sm:mb-1 lg:text-base max-sm:text-sm md:ml-6">Dirancang & Belajar Langsung
                Dari Yang Terbaik!</b>
            <p class="lg:mt-4 sm:mt-2 ml-2 max-sm:mb-1 lg:text-base max-sm:text-sm md:ml-6">
                📝 Aliya Mutiara Devi - Senior Product Marketing at Technology Industry <br>
                📝 Naura Yasyfina - Brand Strategist at OLX Indonesia <br>
                📝 Ken Kirana - Product Marketing at Bibit <br>
                📝 Ghevira Azzahra - Digital Media Planner at i-dac (Hakuhodo International Indonesia) <br>
                📝 Nur Rahmah - Content Writer at Kitabisa.com <br>
                📝 Heru Raharja Catur Putra - Founder at Juwara Copywriting <br>
                📝 Tita Pratiwi - Head of Digital at Vindes Corp <br>
                📝 Jovita Wibowo - Lead Social Media Strategist at Mekari <br>
                📝 Ferdinand Siswanto - Ecommerce Business Development Manager at Colgate-Palmolive <br>
                📝 Ray Maximillian - KOL Lead at Bibit.id <br>
                📝 Yosanatan Manuel - Performance Marketing Specialist at Bibit <br>
                📝 Nanda Faturrohmi Putri - Digital Marketing Specialist at THIS IS APRIL <br>
                📝 Antonius Putu Satria K.W.C - SEO and ASO Manager at Transfez <br>
                📝 Nanda Saputri - SEO Strategist Manager at Tirto.id <br>
                📝 Aldi Dwi Putra - CRM Strategy and Planning at Sayurbox <br>
                📝 Raudah Sabila, Senior Talent Acquisition Specialist at Bukalapak <br>
            </p>
            <!-- jadwal kelas -->
            <p class="lg:mt-4 sm:mt-2 ml-2 max-sm:mb-1 lg:text-base max-sm:text-sm md:ml-6"><b>Jadwal Kelas:</b></p>
            <p class="lg:mt-4 sm:mt-2 ml-2 max-sm:mb-1 lg:text-base max-sm:text-sm md:ml-6">✅ Batch 25: 5 Juni - 22 Juli
                2024</p>
            <b class="lg:mt-4 sm:mt-2 ml-2 max-sm:mb-1 lg:text-base max-sm:text-sm md:ml-6">Sesi On Boarding: Senin, 3 Juni
                2024</b>
            <p class="lg:mt-4 sm:mt-2 ml-2 max-sm:mb-1 lg:text-base max-sm:text-sm md:ml-6">✅ Batch 26: 7 Agustus - 20
                September 2024</p>
            <b class="lg:mt-4 sm:mt-2 ml-2 max-sm:mb-1 lg:text-base max-sm:text-sm md:ml-6">Sesi On Boarding: Senin, 5
                Agustus 2024</b>
            <p class="lg:mt-4 max-sm:mt-6 ml-2 max-sm:mb-6 lg:text-base max-sm:text-sm md:ml-6"><b>
                    📌Notes: <br>
                    Sesi On boarding ini bersifat opsional dan ditujukan untuk mengenal satu sama lain dan program dengan
                    lebih baik. Bukan sesi materi.
                    <br>
                    Jika terlewat, tetap bisa mendaftar bootcamp hingga tanggal penutupan, dan melihat recording maupun
                    panduan bootcamp yang diberikan.
                </b></p>
            <p class="lg:mt-6 lg:mb-4 sm:mt-8 ml-2 max-sm:mb-1 lg:text-base max-sm:text-sm md:ml-6 md:mb-6"><b>Pelaksanaan
                    Kelas :</b><br>
                Setiap hari Senin, Rabu dan Jumat.<br>
                Pukul 19.30-21.30 WIB
            </p>
            <div>
                <!-- Dropdown 1 -->
                <div class="mb-2 border border-gray-300 rounded lg:mt-2 max-sm:mt-6 md:m-4">
                    <button class="w-full text-left bg-white p-2 rounded flex justify-between items-center"
                        onclick="toggleDropdown('dropdown1', this)">
                        <p class="font-semibold">Onboarding and Sharing Session with Alumni (Optional)</p>
                        <i class="fas fa-chevron-down" id="arrow1"></i>
                    </button>
                    <div id="dropdown1" class="hidden p-2 bg-white transition-opacity duration-300 ease-in-out opacity-0">
                        <p>> Class introduction and rules</p>
                        <p>> Alumni sharing session</p>
                        <p class="mt-4">Alumni sharing session: Sesi On boarding ini bersifat opsional dan ditujukan
                            untuk mengenal satu sama lain dan program dengan lebih baik. Bukan sesi materi.</p>
                        <p>Jika terlewat, tetap bisa mendaftar bootcamp hingga tanggal penutupan, dan melihat recording
                            maupun panduan bootcamp yang diberikan.</p>
                    </div>
                </div>
                <!-- Dropdown 2 -->
                <div class="border border-gray-300 rounded mb-2 md:m-4">
                    <button class="w-full text-left bg-white p-2 rounded flex justify-between items-center"
                        onclick="toggleDropdown('dropdown2', this)">
                        <p class="font-semibold"> The Fundamental Of Marketing </p>
                        <i class="fas fa-chevron-down" id="arrow2"></i>
                    </button>
                    <div id="dropdown2" class="hidden p-2 bg-white transition-opacity duration-300 ease-in-out opacity-0">
                        <p>> Konsep Marketing & Komunikasi Pemasaran <br>
                            > Mengenal Marketing Mix (4P & 4C Matrix)</p>
                    </div>
                </div>
                <!-- Dropdown 3 -->
                <div class="border border-gray-300 rounded md:m-4">
                    <button class="w-full text-left bg-white p-2 rounded flex justify-between items-center"
                        onclick="toggleDropdown('dropdown3', this)">
                        <p class="font-semibold"> Brand Strategy </p>
                        <i class="fas fa-chevron-down" id="arrow2"></i>
                    </button>
                    <div id="dropdown3" class="hidden p-2 bg-white transition-opacity duration-300 ease-in-out opacity-0">
                        <p>> Mengenal komponen pembentuk brand <br>
                            > Strategi komunikasi brand <br>
                            > Merancang brand activation</p>
                    </div>
                </div>
                <!-- Dropdown 4 -->
                <div class="border border-gray-300 rounded mt-2 md:m-4">
                    <button class="w-full text-left bg-white p-2 rounded flex justify-between items-center"
                        onclick="toggleDropdown('dropdown4', this)">
                        <p class="font-semibold"> Audience Persona & Insight </p>
                        <i class="fas fa-chevron-down" id="arrow2"></i>
                    </button>
                    <div id="dropdown4" class="hidden p-2 bg-white transition-opacity duration-300 ease-in-out opacity-0">
                        > Merancang customer research & persona <br>
                        > Memahami audience pain points & motivation
                    </div>
                </div>
                <!-- Dropdown 5 -->
                <div class="border border-gray-300 rounded mt-2 md:m-4">
                    <button class="w-full text-left bg-white p-2 rounded flex justify-between items-center"
                        onclick="toggleDropdown('dropdown5', this)">
                        <p class="font-semibold"> Digital Marketing & Network </p>
                        <i class="fas fa-chevron-down" id="arrow2"></i>
                    </button>
                    <div id="dropdown5" class="hidden p-2 bg-white transition-opacity duration-300 ease-in-out opacity-0">
                        > Pemetaan audience buyer journey & funnel <br>
                        > Digital marketing trifecta <br>
                        > Digital marketing metrics and tools
                    </div>
                </div>
                <!-- Dropdown 6 -->
                <div class="border border-gray-300 rounded mt-2 md:m-4">
                    <button class="w-full text-left bg-white p-2 rounded flex justify-between items-center"
                        onclick="toggleDropdown('dropdown6', this)">
                        <p class="font-semibold"> Campaign & Media Planning </p>
                        <i class="fas fa-chevron-down" id="arrow2"></i>
                    </button>
                    <div id="dropdown6" class="hidden p-2 bg-white transition-opacity duration-300 ease-in-out opacity-0">
                        > Merangkai digital campaign
                        <br>
                        > Media planning strategy
                        <br>
                        > Eksperimentasi & evaluasi campaign
                    </div>
                </div>
                <!-- Dropdown 7 -->
                <div class="border border-gray-300 rounded mt-2 md:m-4">
                    <button class="w-full text-left bg-white p-2 rounded flex justify-between items-center"
                        onclick="toggleDropdown('dropdown7', this)">
                        <p class="font-semibold"> Content & Marketing </p>
                        <i class="fas fa-chevron-down" id="arrow2"></i>
                    </button>
                    <div id="dropdown7" class="hidden p-2 bg-white transition-opacity duration-300 ease-in-out opacity-0">
                        > Content funnel
                        <br>
                        > Perancangan & distribusi konten
                        <br>
                        > Eksperimentasi, metrik & improvement
                    </div>
                </div>
                <!-- Dropdown 8 -->
                <div class="border border-gray-300 rounded mt-2 md:m-4">
                    <button class="w-full text-left bg-white p-2 rounded flex justify-between items-center"
                        onclick="toggleDropdown('dropdown8', this)">
                        <p class="font-semibold"> Creative Copywriting </p>
                        <i class="fas fa-chevron-down" id="arrow2"></i>
                    </button>
                    <div id="dropdown8" class="hidden p-2 bg-white transition-opacity duration-300 ease-in-out opacity-0">
                        > Konsep & formula copywriting
                        <br>
                        > Menggali insight & konsep
                        <br>
                        > Copywriting best practice
                    </div>
                </div>
                <!-- Dropdown 9 -->
                <div class="border border-gray-300 rounded mt-2 md:m-4">
                    <button class="w-full text-left bg-white p-2 rounded flex justify-between items-center"
                        onclick="toggleDropdown('dropdown9', this)">
                        <p class="font-semibold"> Social Media Strategy </p>
                        <i class="fas fa-chevron-down" id="arrow2"></i>
                    </button>
                    <div id="dropdown9" class="hidden p-2 bg-white transition-opacity duration-300 ease-in-out opacity-0">
                        > Karakteristik tiap social media channel
                        <br>
                        > Mengenal target audience
                        <br>
                        > Membangun content pillar
                        <br>
                        > Eksperimentasi & optimalisasi social media
                    </div>
                </div>
                <!-- Dropdown 10 -->
                <div class="border border-gray-300 rounded mt-2 md:m-4">
                    <button class="w-full text-left bg-white p-2 rounded flex justify-between items-center"
                        onclick="toggleDropdown('dropdown10', this)">
                        <p class="font-semibold"> Social Media Research & Analytics </p>
                        <i class="fas fa-chevron-down" id="arrow2"></i>
                    </button>
                    <div id="dropdown10"
                        class="hidden p-2 bg-white transition-opacity duration-300 ease-in-out opacity-0">
                        > Competitor research
                        <br>
                        > Social media listening
                        <br>
                        > Social media metrics & improvement
                    </div>
                </div>
                <!-- Dropdown 11 -->
                <div class="border border-gray-300 rounded mt-2 md:m-4">
                    <button class="w-full text-left bg-white p-2 rounded flex justify-between items-center"
                        onclick="toggleDropdown('dropdown11', this)">
                        <p class="font-semibold"> Ecommerce Marketing </p>
                        <i class="fas fa-chevron-down" id="arrow2"></i>
                    </button>
                    <div id="dropdown11"
                        class="hidden p-2 bg-white transition-opacity duration-300 ease-in-out opacity-0">
                        > Membuat deskripsi dan display produk
                        <br>
                        > Membangun relasi pelanggan
                        <br>
                        > Strategi pemasaran
                        <br>
                        > Mengembangkan online shop
                    </div>
                </div>
            </div>
            <!-- sistem belajar -->
            <p id="sistem"
                class="text-orange-600 max-sm:mt-6 max-sm:mb-3 lg:text-xl max-sm:text-base max-sm:ml-2 lg:mt-6 font-bold lg:mb-4 md:ml-6 md:text-xl md:mb-2">
                <i class="fas fa-chevron-right text-orange-600 mr-3"></i>Sistem Belajar
            </p>
            <img class="MuiBox-root mui-style-nj2azm md:p-4"
                src="https://imagedelivery.net/I_EC-Jc9ZMucGPqxWez19A/e50f0b44-5d3b-42c1-dee3-500b93c71e00/public"
                alt="Sistem Belajar" loading="lazy">
            <!-- FAQ -->
            <p id="faq"
                class="text-orange-600 max-sm:mt-6 lg:text-xl max-sm:text-base max-sm:ml-2 lg:mt-6 font-bold lg:mb-1 md:ml-6 md:text-xl">
                <i class="fas fa-chevron-right text-orange-600 mr-3"></i>FAQ
            </p>
            <p class="lg:mt-4 sm:mt-2 ml-2 max-sm:mb-1 lg:text-base max-sm:text-sm md:ml-6">Masih bingung? Tenang :)</p>
            <!-- FAQ 1 -->
            <div class="border border-gray-300 rounded mt-2 md:m-4">
                <button class="w-full text-left bg-white p-2 rounded flex justify-between items-center"
                    onclick="toggleDropdown('faq1', this)">
                    <p class="font-semibold"> Saya tidak memiliki pengalaman sama sekali di bidang Digital Marketing,
                        apakah saya bisa mengikuti kelas? </p>
                    <i class="fas fa-chevron-down" id="arrow2"></i>
                </button>
                <div id="faq1"
                    class="hidden p-2 font-regular bg-white transition-opacity duration-300 ease-in-out opacity-0">
                    Tentu bisa! Pada Intensive Bootcamp Digital Marketing akan diampu oleh tutor expert dibidangnya yang
                    akan menyampaikan materi dari level dasar (basic) hingga level lanjut (advance) yang mudah dipahami
                    sehingga kamu tidak perlu khawatir sulit memahami materi walaupun kamu tidak memiliki background digital
                    marketing sebelumnya.
                </div>
            </div>
            <!-- FAQ 2 -->
            <div class="border border-gray-300 rounded mt-2 md:m-4">
                <button class="w-full text-left bg-white p-2 rounded flex justify-between items-center max-sm:text-xs"
                    onclick="toggleDropdown('faq2', this)">
                    <p class="font-semibold"> Bagaimana jika saya tidak bisa menghadiri kelas, apakah saya masih bisa
                        mengikuti materi ? </p>
                    <i class="fas fa-chevron-down" id="arrow2"></i>
                </button>
                <div id="faq2"
                    class="hidden p-2 font-regular bg-white transition-opacity duration-300 ease-in-out opacity-0 max-sm:text-xs">
                    Tentu saja! Jika kamu tidak dapat hadir pada sesi kelas, kamu bisa mengikuti materi melalui video
                    recording setiap sesinya sehingga kamu tidak tertinggal materi yang telah disampaikan di sesi kelas.
                </div>
            </div>
            <!-- FAQ 3 -->
            <div class="border border-gray-300 rounded mt-2 md:m-4">
                <button class="w-full text-left bg-white p-2 rounded flex justify-between items-center max-sm:text-xs"
                    onclick="toggleDropdown('faq3', this)">
                    <p class="font-semibold md:w-11/12"> Bagaimana jika saya mengalami kesulitan untuk mengerjakan team
                        project untuk portofolio saya ? </p>
                    <i class="fas fa-chevron-down" id="arrow2"></i>
                </button>
                <div id="faq3"
                    class="hidden p-2 font-regular bg-white transition-opacity duration-300 ease-in-out opacity-0 max-sm:text-xs">
                    <p>Jangan khawatir! Kamu akan didampingi oleh <i>learning asisstant (mentor)</i> selama proses
                        pengerjaan final team project, bersama mentor kamu bisa berdiskusi secara intensif dan interaktif
                    </p>
                </div>
            </div>
            <!-- FAQ 4 -->
            <div class="border border-gray-300 rounded mt-2 md:m-4">
                <button class="w-full text-left bg-white p-2 rounded flex justify-between items-center max-sm:text-xs"
                    onclick="toggleDropdown('faq4', this)">
                    <p class="font-semibold">Apakah final project portofolio, bisa saya gunakan untuk melamar kerja ? </p>
                    <i class="fas fa-chevron-down" id="arrow2"></i>
                </button>
                <div id="faq4"
                    class="hidden p-2 font-regular bg-white transition-opacity duration-300 ease-in-out opacity-0 max-sm:text-xs">
                    Final project portofolio tentu bisa digunakan sebagai portofolio untuk melamar pekerjaan. Kamu akan
                    mengerjakan final project secara real case secara end to end process sehingga sangat cukup untuk
                    mendukung kamu dari segi pemahaman dan praktik pada pekerjaaan bidang Digital Marketing. Dengan final
                    project yang dikerjakan terbukti MySkill sudah membantu banyak alumni dalam mencari pekerjaan. </div>
            </div>
            <!-- FAQ 5 -->
            <div class="border border-gray-300 rounded mt-2 md:m-4">
                <button class="w-full text-left bg-white p-2 rounded flex justify-between items-center max-sm:text-xs"
                    onclick="toggleDropdown('faq5', this)">
                    <p class="font-semibold"> Bagaimana cara agar bisa mengikuti extra sesi tambahan ? </p>
                    <i class="fas fa-chevron-down" id="arrow2"></i>
                </button>
                <div id="faq5"
                    class="hidden p-2 font-regular bg-white transition-opacity duration-300 ease-in-out opacity-0 max-sm:text-xs">
                    Peserta harus menghadiri setiap sesi kelas yang diselenggarakan, serta secara aktif berpartisipasi dalam
                    mengerjakan mini portofolio yang dikerjakan pada tiap sesi. </div>
            </div>
            <!-- FAQ 6 -->
            <div class="border border-gray-300 rounded mt-2 md:m-4">
                <button class="w-full text-left bg-white p-2 rounded flex justify-between items-center max-sm:text-xs"
                    onclick="toggleDropdown('faq6', this)">
                    <p class="font-semibold"> Seperti apa bentuk final project yang akan dikerjakan peserta ? </p>
                    <i class="fas fa-chevron-down" id="arrow2"></i>
                </button>
                <div id="faq6"
                    class="hidden p-2 font-regular bg-white transition-opacity duration-300 ease-in-out opacity-0 max-sm:text-xs">
                    Kamu akan diminta mempraktikkan semua materi yang telah dipelajari, dengan cara menghandle secara
                    langsung sebuah bisnis UMKM. Kamu akan berperan aktif dalam membuat strategi, eksekusi, hingga evaluasi
                    pada berbagai aspek.
                </div>
            </div>
            <!-- Komunitas -->
            <p id="komunitas"
                class="md:ml-6 md:text-xl text-orange-600 lg:text-xl max-sm:text-xs max-sm:ml-2 lg:mt-6 max-sm:mt-6 font-bold lg:mb-1 ">
                <i class="fas fa-chevron-right text-orange-600 mr-3"></i>Komunitas
            </p>
            <p class="md:ml-6 md:mb-4 lg:mt-4 sm:mt-2 ml-2 max-sm:mb-4 lg:text-base max-sm:text-xs md:w-11/12">Bukan
                sekadar join Bootcamp. Tapi, Komunitas berkembang bersama. Gabung grup untuk berdiskusi, berbagi info loker
                dan freelance, hingga kumpul offline dan networking. Bangun support system bersama yuk!</p>
            <!-- scrollbar-3 -->
            <div name="scrollbar-2 mb-8 ">
                <div class="flex overflow-x-auto space-x-4 max-sm:ps-2 no-scrollbar">
                    <img src="{{ asset('./assets/bootcamp/komun1.png') }}"
                        class="lg:h-64 lg:w-auto max-sm:w-64 max-sm:h-32 md:p-4">
                    <img src="{{ asset('./assets/bootcamp/komun2.png') }}"
                        class="lg:h-64 lg:w-auto max-sm:w-64 max-sm:h-32 md:p-4">
                    <img src="{{ asset('./assets/bootcamp/komun3.png') }}"
                        class="lg:h-64 lg:w-auto max-sm:w-64 max-sm:h-32 md:p-4">
                    <img src="{{ asset('./assets/bootcamp/komun4.png') }}"
                        class="lg:h-64 lg:w-auto max-sm:w-64 max-sm:h-32 md:p-4">
                </div>
            </div>
            <!-- komunitas end -->

            <!-- daftar sekarang -->
            <a href="/payment">
                <p
                    class="md:ml-6 md:text-xl text-orange-600 lg:text-xl max-sm:text-base max-sm:ml-2 lg:mt-6 font-bold lg:mb-1 max-sm:mt-4 hover:bg-yellow-500 focus:ring-2 focus:ring-yellow-300">
                    <i class="fas fa-chevron-right text-orange-600 mr-3"></i>Daftar Sekarang
                </p>
            </a>
            <p class="lg:mt-4 sm:mt-2 ml-2 max-sm:mb-1 lg:text-base max-sm:text-sm md:ml-6 md:mb-2">Ayo, persiapkan dirimu
                untuk mulai #RintisKarirImpian</p>

            <a href="/payment">
                <button type="button"
                    class="max-sm:w-full lg:mt-2 w-full md:w-11/12 md:ml-8 md:p-2 focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm lg:px-5 lg:py-3 max-sm:bg-yellow-500 max-sm:text-white max-sm:px-3 max-sm:py-2 max-sm:mt-1 max-sm:mx-auto">
                    <i class="fas fa-bolt"></i> Daftar Sekarang
                </button>
            </a>
        </div>
    </div>
    <div class="w-full flex justify-center">
        <hr class="mb-6 mt-2 w-11/12 border-1 ">
    </div>
    <!-- second content -->
    <p class="font-semibold text-3xl lg:ml-12 max-sm:ml-4 md:ml-6">Ikuti Juga Bootcamp Lainnya</p>
    <p class="lg:mt-1 sm:mt-2 lg:ml-12 max-sm:ml-4 max-sm:mb-1 lg:text-base max-sm:text-sm md:ml-6">Lanjut pelajari skill
        bersama tutor terbaik berpengalaman di bidangnya.</p>
    <!-- scrollbar horizontal 3 -->
    <div name="mb-8" class="overflow-x-auto no-scrollbar">
        <div class="flex space-x-4 w-max lg:px-12 max-sm:px-4 py-3">
            <!-- Item Bootcamp 1 -->
            <div
                class="bg-white rounded-lg shadow-md lg:ml-0 lg:p-4 max-sm:p-2 max-sm:w-40 lg:w-64 flex flex-col justify-between md:ml-6 md:p-4">
                <img src="{{ asset('./assets/bootcamp/contentdummy.png') }}" class="h-34 w-full rounded-sm">
                <p class="mt-2 text-gray-700 font-semibold font-sans lg:text-lg max-sm:text-base max-sm:truncate">DIGITAL
                    MARKETING : FULLSTACK INTENSIVE</p>
                <div class="flex flex-col mt-2 text-gray-500">
                    <div class="flex items-center">
                        <i class="fas fa-calendar-alt mr-2"></i>
                        <p class="text-sm">1 Januari 2025</p>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-tag mr-2"></i>
                        <p class="text-sm">Rp 500.000 <span class="line-through text-red-500 max-sm:hidden">Rp
                                800.000</span></p>
                    </div>
                </div>
            </div>
            <!-- Item Bootcamp 2 -->
            <div
                class="bg-white rounded-lg shadow-md lg:p-4 max-sm:p-2 max-sm:w-40 lg:w-64 flex flex-col justify-between md:p-4">
                <img src="{{ asset('./assets/bootcamp/contentdummy.png') }}" class="h-34 w-full rounded-sm">
                <p class="mt-2 text-gray-700 font-semibold font-sans lg:text-lg max-sm:text-base max-sm:truncate">DIGITAL
                    MARKETING : FULLSTACK INTENSIVE</p>
                <div class="flex flex-col mt-2 text-gray-500">
                    <div class="flex items-center">
                        <i class="fas fa-calendar-alt mr-2"></i>
                        <p class="text-sm">1 Januari 2025</p>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-tag mr-2"></i>
                        <p class="text-sm">Rp 500.000 <span class="line-through text-red-500 max-sm:hidden">Rp
                                800.000</span></p>
                    </div>
                </div>
            </div>
            <!-- Item Bootcamp 3 -->
            <div
                class="bg-white rounded-lg shadow-md lg:p-4 max-sm:p-2 max-sm:w-40 lg:w-64 flex flex-col justify-between md:p-4">
                <img src="{{ asset('./assets/bootcamp/contentdummy.png') }}" class="h-34 w-full rounded-sm">
                <p class="mt-2 text-gray-700 font-semibold font-sans lg:text-lg max-sm:text-base max-sm:truncate">DIGITAL
                    MARKETING : FULLSTACK INTENSIVE</p>
                <div class="flex flex-col mt-2 text-gray-500">
                    <div class="flex items-center">
                        <i class="fas fa-calendar-alt mr-2"></i>
                        <p class="text-sm">1 Januari 2025</p>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-tag mr-2"></i>
                        <p class="text-sm">Rp 500.000 <span class="line-through text-red-500 max-sm:hidden">Rp
                                800.000</span></p>
                    </div>
                </div>
            </div>
            <!-- Item Bootcamp 4 -->
            <div
                class="bg-white rounded-lg shadow-md lg:p-4 max-sm:p-2 max-sm:w-40 lg:w-64 flex flex-col justify-between md:p-4">
                <img src="{{ asset('./assets/bootcamp/contentdummy.png') }}" class="h-34 w-full rounded-sm">
                <p class="mt-2 text-gray-700 font-semibold font-sans lg:text-lg max-sm:text-base max-sm:truncate">DIGITAL
                    MARKETING : FULLSTACK INTENSIVE</p>
                <div class="flex flex-col mt-2 text-gray-500">
                    <div class="flex items-center">
                        <i class="fas fa-calendar-alt mr-2"></i>
                        <p class="text-sm">1 Januari 2025</p>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-tag mr-2"></i>
                        <p class="text-sm">Rp 500.000 <span class="line-through text-red-500 max-sm:hidden">Rp
                                800.000</span></p>
                    </div>
                </div>
            </div>
            <!-- Item Bootcamp 5 -->
            <div
                class="bg-white rounded-lg shadow-md lg:p-4 max-sm:p-2 max-sm:w-40 lg:w-64 flex flex-col justify-between md:p-4">
                <img src="{{ asset('./assets/bootcamp/contentdummy.png') }}" class="h-34 w-full rounded-sm">
                <p class="mt-2 text-gray-700 font-semibold font-sans lg:text-lg max-sm:text-base max-sm:truncate">DIGITAL
                    MARKETING : FULLSTACK INTENSIVE</p>
                <div class="flex flex-col mt-2 text-gray-500">
                    <div class="flex items-center">
                        <i class="fas fa-calendar-alt mr-2"></i>
                        <p class="text-sm">1 Januari 2025</p>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-tag mr-2"></i>
                        <p class="text-sm">Rp 500.000 <span class="line-through text-red-500 max-sm:hidden">Rp
                                800.000</span></p>
                    </div>
                </div>
            </div>
            <!-- Item More -->
            <a href="/bootcamp">
                <div
                    class="bg-gray-100 rounded-lg shadow-md lg:p-4 lg:w-64 lg:h-80 max-sm:w-40 max-sm:h-56 md:w-80 md:h-full flex flex-col justify-center items-center md:p-4">
                    <p class="lg:text-4xl max-sm:text-center max-sm:text-2xl md:text-6xl text-gray-400 mb-4">+</p>
                    <p class="text-gray-500 max-sm:text-center">lihat bootcamp lainnya...</p>
                </div>
            </a>
        </div>
    </div>
    <div class="w-full flex justify-center mt-8">
        <hr class="mb-6 mt-4 w-11/12 border-1 ">
    </div>

    <!-- footer hanya ada pada max-sm dan md -->
    <footer class="fixed bottom-0 left-0 w-full bg-white text-black max-sm:block md:block lg:hidden">
        <div class="flex justify-between items-center p-3 border-t-2 border-gray-300">
            <div class="flex flex-col text-left">
                <p class="text-red-500 font-bold text-sm">Kuota Terbatas!</p>
                <p class="text-black font-bold text-sm">Rp. {{ $bootcamp->harga }}</p>
            </div>
            <a href="/payment"
                class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded-lg focus:ring-2 focus:ring-yellow-300">
                Daftar Sekarang
            </a>
        </div>
    </footer>


    <!-- script dropdown -->
    <script>
        function toggleDropdown(id, button) {
            const dropdown = document.getElementById(id);
            const isHidden = dropdown.classList.contains('hidden');
            if (isHidden) {
                dropdown.classList.remove('hidden');
                setTimeout(() => {
                    dropdown.classList.remove('opacity-0');
                    dropdown.classList.add('opacity-100');
                }, 10); // Delay to allow the transition to take effect
            } else {
                dropdown.classList.remove('opacity-100');
                dropdown.classList.add('opacity-0');
                dropdown.addEventListener('transitionend', function() {
                    dropdown.classList.add('hidden');
                }, {
                    once: true
                });
            }
            const arrow = button.querySelector('i');
            arrow.classList.toggle('fa-chevron-down');
            arrow.classList.toggle('fa-chevron-up');
        }
    </script>
    <script>
        function toggleModal(modalID) {
            const modal = document.getElementById(modalID);
            modal.classList.toggle('hidden');
            modal.classList.toggle('flex');
        }
    </script>
@endsection
