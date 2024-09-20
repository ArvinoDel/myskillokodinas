@extends('./myskill/layouts.main')
@section('container')
    <div class="w-screen h-auto  rounded-b-3xl bg-gradient-to-b from-orange-400 to-red-500">
        <div class="snap-x snap-mandatory flex overflow-x-auto no-scrollbar gap-6 max-sm:mx-1 md:mx-4 lg:mx-12"
            style="scrollbar-width: none; -ms-overflow-style: none;" ontouchstart="this.classList.add('touching')"
            ontouchend="this.classList.remove('touching')" onmousedown="this.classList.add('touching')"
            onmouseup="this.classList.remove('touching')">
            <?php
            $bootcamp = 'Bootcamp';
            $corporateTraining = 'Corporate Training';
            $home = 'Home';
            $elearning = 'E-Learning';
            $review = 'Review CV';
            $software = 'Software HRIS';
            ?>
            @foreach ($banners as $link)
                @if ($link->is_myskill == 1)
                    @php
                        $href = '#'; // Default href
                        if ($link->judul == $bootcamp) {
                            $href = '/bootcamp';
                        } elseif ($link->judul == $corporateTraining) {
                            $href = '/corporate-training';
                        } elseif ($link->judul == $home) {
                            $href = '/home';
                        } elseif ($link->judul == $elearning) {
                            $href = '/elearning';
                        } elseif ($link->judul == $review) {
                            $href = '/review-cv';
                        } elseif ($link->judul == $software) {
                            $href = '/experience';
                        }
                    @endphp
                    <a href="{{ $href }}" class="snap-always snap-center flex-shrink-0">
                        <img src="{{ url('foto_banner/' . $link->gambar) }}" alt="{{ $link->judul }}"
                            class="max-sm:h-[89px] lg:h-80 md:h-52 w-auto mx-auto lg:rounded-2xl md:rounded-xl max-sm:rounded-lg">
                    </a>
                @endif
            @endforeach


        </div>
        <div>
            <h2
                class="lg:text-4xl max-sm:text-lg md:text-3xl text-center lg:py-14 md:py-12 max-sm:py-6 font-bold text-white">
                Mari Merintis Karir Bersama Pandai
                Digital</h2>
        </div>


        <div class="md:overflow-x-auto max-sm:overflow-x-auto flex md:ps-4 max-sm:ps-2 md:gap-x-2 lg:gap-5 max-sm:gap-2 no-scrollbar max-sm:flex-nowrap mx-4">
            <div
                class="w-48 h-64 max-sm:w-36 max-sm:h-52 max-md:w-40 max-md:h-56 md:w-56 md:h-60 md:mb-2 md:mr-2 bg-white border border-black rounded-2xl shadow flex-shrink-0 snap-start max-sm:mb-2">
                <img class="mx-auto rounded-t-lg my-4 w-auto h-24 max-sm:h-16 max-md:h-18 lg:w-28 lg:h-28"
                    src="{{ asset('../home-myskill/alumny.webp') }}" alt="" />
                <div class="p-6 max-sm:p-4"> <!-- Padding ditingkatkan -->
                    <h5 class="text-sm max-sm:text-xs text-center font-bold text-gray-900">Noteworthy Lebih dari 1.5 Juta+ Member
                        Belajar Bersama</h5>
                </div>
            </div>
            <div
                class="w-48 h-64 max-sm:w-36 max-sm:h-52 max-md:w-40 max-md:h-56 md:w-56 md:h-60 md:mb-2 md:mr-2 bg-white border border-black rounded-2xl shadow flex-shrink-0 snap-start max-sm:mb-2">
                <img class="mx-auto rounded-t-lg my-4 w-auto h-24 max-sm:h-16 max-md:h-18 lg:w-28 lg:h-28"
                    src="{{ asset('../home-myskill/existing-member.webp') }}" alt="" />
                <div class="p-6 max-sm:p-4"> <!-- Padding ditingkatkan -->
                    <h5 class="text-sm max-sm:text-xs text-center font-bold text-gray-900">Ribuan Alumni Bekerja di National &
                        Global Company</h5>
                </div>
            </div>
            <div
                class="w-48 h-64 max-sm:w-36 max-sm:h-52 max-md:w-40 max-md:h-56 md:w-56 md:h-60 md:mb-2 md:mr-2 bg-white border border-black rounded-2xl shadow flex-shrink-0 snap-start max-sm:mb-2">
                <img class="mx-auto rounded-t-lg my-4 w-auto h-24 max-sm:h-16 max-md:h-18 lg:w-28 lg:h-28"
                    src="{{ asset('../home-myskill/new-member.webp') }}" alt="" />
                <div class="p-6 max-sm:p-4"> <!-- Padding ditingkatkan -->
                    <h5 class="text-sm max-sm:text-xs text-center font-bold text-gray-900">Praktikal & Bersertifikat. Bangun Skill
                        dan Portfolio</h5>
                </div>
            </div>
            <div
                class="w-48 h-64 max-sm:w-36 max-sm:h-52 max-md:w-40 max-md:h-56 md:w-56 md:h-60 md:mb-2 md:mr-2 bg-white border border-black rounded-2xl shadow flex-shrink-0 snap-start max-sm:mb-2">
                <img class="mx-auto rounded-t-lg my-4 w-auto h-24 max-sm:h-16 max-md:h-18 lg:w-28 lg:h-28"
                    src="{{ asset('../home-myskill/practical.webp') }}" alt="" />
                <div class="p-6 max-sm:p-4"> <!-- Padding ditingkatkan -->
                    <h5 class="text-sm max-sm:text-xs text-center font-bold text-gray-900">4.9 Rating di Course Report & Award
                        LinkedIn Top Startup</h5>
                </div>
            </div>
            <div
                class="w-44 h-64 max-sm:w-32 max-sm:h-52 max-md:w-36 max-md:h-56 md:w-56 md:h-60 bg-white border md:mr-2 border-black rounded-2xl shadow flex-shrink-0 max-sm:mr-2">
                <img class="mx-auto rounded-t-lg my-4 w-auto h-24 max-sm:h-16 max-md:h-18 lg:w-28 lg:h-28"
                    src="{{ asset('../home-myskill/rating.webp') }}" alt="" />
                <div class="p-6 max-sm:p-4"> <!-- Padding ditingkatkan -->
                    <h5 class="text-sm max-sm:text-xs text-center font-bold text-gray-900">50k++ New Member Ikut Belajar Bulan
                    </h5>
                </div>
            </div>
        </div>
        



    </div>
    <div class="py-12">
        <h2 class="text-2xl text-center font-bold">Terbukti Memberi Hasil dan Membuka Batasan Diri</h2>
    </div>

    <div class="flex overflow-x-auto space-x-4 mx-5 px-1 pb-4 no-scrollbar">
        @foreach ($testimonis as $testimoni)
            <div class="bg-white p-4 rounded-2xl shadow-md max-w-[220px] sm:max-w-[180px] md:max-w-[200px] flex-shrink-0">
                <div class="flex items-center justify-center mb-4">
                    <img class="rounded-lg w-full max-h-[220px] object-cover"
                        src="{{ asset('foto_testimoni/' . $testimoni->gambar) }}" alt="Testimoni Image" />
                </div>
                <a href="{{ $testimoni->link }}">
                    <button class="w-full bg-violet-500 text-white py-2 rounded-md font-semibold">Baca
                        Cerita</button>
                </a>
            </div>
        @endforeach
    </div>

    <div>
        <h3 class="py-12 text-center font-bold text-2xl text-black">Berbagai Macam Program di Pandai Digital</h3>
    </div>

    <div class="grid md:grid-cols-2 lg:py-10">
        <img class="lg:w-96 md:w-80 max-sm:w-64 ms-10 lg:ms-48 max-sm:ms-auto max-sm:mr-10"
            src="{{ asset('img/image1.svg') }}" alt="" />
        <div class="text-start px-10 lg:px-20 lg:py-4">
            <h2 class="font-bold text-black text-2xl">E-learning</h2>
            <h1 class="text-black text-lg pt-7 font-semibold">Pelajari Ratusan Skill Sekali Bayar. Praktik dan
                Bersertifikat</h1>
            <div class="ms-3">
                <ul>

                    <li class="font-semibold">
                        Belajar fleksibel via Video Materi, Bahan Bacaan, Project dan Studi Kasus
                    </li>
                    <li class="font-semibold">
                        Praktikal & Actionable. Bertahap dari level Dasar hingga Lanjut
                    </li>
                    <li class="font-semibold">
                        Grup Komunitas Diskusi Lifetime. Kelas Gratis Tiap Bulannya
                    </li>
                </ul>
            </div>
            <div class="mt-8"></div>
            <a href="/e-learning" class="font-semibold px-5 py-2.5 rounded-xl  mt-4 bg-orange-400 ">Lihat Materi</a>
        </div>
    </div>

    <div class="md:grid flex flex-col-reverse md:grid-cols-2 md:py-10">
        <div class="text-start px-10 lg:px-20 py-2 lg:py-4">
            <h2 class="font-bold text-black text-2xl">Bootcamp</h2>
            <h1 class="text-black text-lg pt-7 font-semibold">Intensive Live Class bersama Experts. Praktikal & Mendalam
            </h1>
            <div class="ms-3">
                <ul>
                    <li class="font-semibold">
                        Kombinasi Case Study, Diskusi dan Praktik di Tiap Sesi. Basic to Advanced.
                    </li>
                    <li class="font-semibold">
                        Group Mentoring Semi-Privat untuk Bangun Portfolio
                    </li>
                    <li class="font-semibold">
                        Tutor Terkurasi. Memiliki Lebih dari 30.000 Alumni
                    </li>
                </ul>
            </div>
            <div class="mt-8"></div>
            <a href="/bootcamp" class="font-semibold px-5 py-2.5 rounded-xl mt-4 bg-orange-400 max-sm:text-xs">Lihat Ragam
                Bootcamp</a>
        </div>
        <img class="w-80 lg:w-96 h-80 ms-10 max-sm:w-64 max-sm:ms-auto max-sm:mr-10" src="{{ asset('img/image2.svg') }}"
            alt="" />
    </div>

    <div class="grid md:grid-cols-2 md:py-10">
        <img class="ms-10 w-80 lg:w-96 h-80 max-sm:w-64 lg:ps-20 max-sm:ms-auto max-sm:mr-10"
            src="{{ asset('img/image3.svg') }}" alt="" />
        <div class="text-start px-10 lg:px-20  lg:py-4">
            <h2 class="font-bold text-black text-2xl">Review CV</h2>
            <h1 class="text-black text-lg pt-7 font-semibold">Dapatkan review dan dokumen persiapan karir dari HRD</h1>
            <div class="ms-3">
                <ul>

                    <li class="font-semibold">
                        Dapatkan 20+ Template CV (Indonesia & English), surat lamaran dan masih banyak lainnya
                    </li>
                    <li class="font-semibold">
                        Dokumen Ratusan QnA Wawancara dan optimalisasi Linkedin
                    </li>
                    <li class="font-semibold">
                        Peluang diterima magang dan kerja full time meningkat dengan bantuan review CV oleh HRD
                    </li>
                </ul>
            </div>
            <div class="mt-8"></div>
            <a href="/review" class="font-semibold px-5 py-2.5 rounded-xl mt-4 bg-orange-400 ">Review CV</a>
        </div>
    </div>

    <div class="md:grid md:grid-cols-2 flex flex-col-reverse md:py-10">
        <div class="text-start px-12 lg:px-20 lg:py-4">
            <h2 class="font-bold text-black text-2xl">Bootcamp</h2>
            <h1 class="text-black text-lg pt-7 font-semibold">Intensive Live Class bersama Experts. Praktikal & Mendalam
            </h1>
            <div class="ms-3">
                <ul>

                    <li class="font-semibold">
                        Belajar fleksibel via Video Materi, Bahan Bacaan, Project dan Studi Kasus
                    </li>
                    <li class="font-semibold">
                        Praktikal & Actionable. Bertahap dari level Dasar hingga Lanjut
                    </li>
                    <li class="font-semibold">
                        Grup Komunitas Diskusi Lifetime. Kelas Gratis Tiap Bulannya
                    </li>
                </ul>
            </div>
            <div class="grid grid-cols-2 gap-4 text-center">
                <a href="/corporate-service"
                    class="font-semibold rounded-xl  mt-4 max-sm:text-sm px-2.5 py-2.5 md:px-5 md:py-2.5 lg:px-5 lg:py-2.5 bg-orange-400 ">Corporate
                    Service</a>
                <a href="/experience"
                    class="font-semibold px-2.5 py-2.5 md:px-5 md:py-2.5 lg:px-5 lg:py-2.5  rounded-xl max-sm:text-sm mt-4 bg-orange-400 ">Sofware
                    HRIS</a>
            </div>
        </div>
        <img class="lg:w-96 w-80 h-80 ms-10 max-sm:w-64 max-sm:ms-auto max-sm:mr-10" src="{{ asset('img/image88.svg') }}"
            alt="" />
    </div>
    </div>

    <h2 class="text-center font-bold text-2xl mx-3 lg:px-80 py-24">Rasanya Gabung Dengan Komunitas Pandai Digital #Sipaling
        Ngoding
    </h2>

    <div class="snap-x snap-mandatory flex overflow-x-auto no-scrollbar ps-6 gap-11"
        style="scrollbar-width: none; -ms-overflow-style: none;" ontouchstart="this.classList.add('touching')"
        ontouchend="this.classList.remove('touching')" onmousedown="this.classList.add('touching')"
        onmouseup="this.classList.remove('touching')">
        @foreach ($album as $album)
            <div class="snap-always snap-center flex-shrink-0 w-52 h-full mb-4 bg-white shadow-lg border rounded-lg">
                <div class="flex flex-col justify-center items-center">
                    <img class="rounded-2xl py-2 w-32 h-32 object-cover"
                        src="{{ asset('img_album/' . $album->gbr_album) }}" alt="Album Image" />
                </div>
                <p class="text-base font-semibold text-black text-center p-4">{{ $album->jdl_album }}</p>
            </div>
        @endforeach
    </div>

    {{-- Section : Mentors --}}
    <section class="bg-gray-100 py-3 my-3 px-4 lg:mt-20">
        <div class="container mx-auto">
            <h3 class="text-2xl text-center font-bold py-3">Belajar Bersama Senior Operator Langsung di Kantor</h3>
            <p class="text-center text-gray-600 mb-8">Belajar langsung dari experienced professional yang mengajarkan
                pengalaman, case study & best practices.</p>
            <div
                class="flex flex-nowrap md:mx-24 justify-start md:justify-center overflow-x-auto pb-3 space-x-4 snap-x no-scrollbar">
                @foreach ($trainer as $train)
                    <div class="snap-start flex-shrink-0 w-40 md:w-48 h-auto group">
                        <!-- Div untuk gambar -->
                        <div class="relative">
                            <img src="{{ asset('foto_trainer/' . $train->foto) }}" alt="Professional"
                                class="w-full h-full object-cover rounded-lg">
                            <div
                                class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end justify-center">
                                <a href="{{ $train->link }}">
                                    <button
                                        class="bg-white text-black py-2 px-4 rounded-full text-sm font-medium hover:bg-gray-200 transition mb-5">Lihat
                                        Materi</button>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        </div>
    </section>

    <p class="py-20 sm:mx-8 text-center text-2xl font-bold">Bersama Experts dan Case Study dari Beberapa Company</p>
    <div class="grid md:grid-cols-4 max-sm:grid-cols-3 gap-3 md:mx-16 max-sm:mx-6">
        @foreach ($mitra as $m)
            <div class="flex justify-center items-center">
                <img class="lg:w-52 md:w-52 max-sm:w-72" src="{{ asset('mitra/' . $m->gambar) }}" alt="">
            </div>
        @endforeach
    </div>
    <h3 class="text-center text-2xl font-bold py-16">Investors dan Affiliations</h3>
    <div class="snap-x snap-mandatory flex overflow-x-auto no-scrollbar ps-6 gap-5 lg:gap-11"
        style="scrollbar-width: none; -ms-overflow-style: none;" ontouchstart="this.classList.add('touching')"
        ontouchend="this.classList.remove('touching')" onmousedown="this.classList.add('touching')"
        onmouseup="this.classList.remove('touching')">
        @foreach ($links as $l)
            <div class="snap-always snap-center flex-shrink-0 w-48 h-24 border border-black rounded-xl">
                <img class="flex justify-center mx-auto mt-4 w-16" src="{{ asset('foto_bannerhome/' . $l->gambar) }}"
                    alt="" />
            </div>
        @endforeach
    </div>
    <h3 class="py-16 text-center text-2xl font-bold">Most Featured in</h3>
    <div class="snap-x snap-mandatory flex overflow-x-auto no-scrollbar ps-6 gap-5 lg:gap-11"
        style="scrollbar-width: none; -ms-overflow-style: none;" ontouchstart="this.classList.add('touching')"
        ontouchend="this.classList.remove('touching')" onmousedown="this.classList.add('touching')"
        onmouseup="this.classList.remove('touching')">
        @foreach ($logo_bawah as $lb)
            <div
                class="snap-always snap-center object-cover p-3 flex-shrink-0 w-48 h-24 border border-black rounded-xl flex items-center justify-center">
                <img class="w-auto h-auto" src="{{ asset('foto_metode/' . $lb->gambar) }}" alt="" />
            </div>
        @endforeach

    </div>
    <h3 class="py-20 text-center text-2xl font-bold ">Yang Sering Ditanyakan</h3>

    <div class="sm:mx-0 lg:mx-8">
        <div class="mb-1 border border-gray-300 rounded lg:mt-2 max-sm:mt-2 md:m-4 max-sm:p-1 max-sm:mx-1">
            <button class="w-full text-left bg-white p-2 rounded flex justify-between items-center font-semibold"
                onclick="toggleDropdown('dropdown1', this)">
                Apakah Pandai Digital bagus ?
                <i id="icon2"
                    class="fa-solid fa-chevron-down ml-2 text-sm mt-1.5 transition-transform duration-300"></i>
            </button>
            <div id="dropdown1"
                class="hidden p-2 bg-white transition-all duration-300 ease-in-out max-h-0 overflow-hidden">
                <p class="text-gray-700 block text-sm" role="menuitem">Pandai Digital memiliki tiga fitur utama
                    e-learning untuk belajar Mandiri via video modul belajar dan webinar series bulanan bootcamp
                    untuk belajar intensif fokus pada praktik via Zoom barang ekspor mentoring untuk dapat template
                    dan review CV hingga persiapan wawancara bersama HRD</p>
            </div>
        </div>

        <div class="mb-1 border border-gray-300 rounded lg:mt-2 max-sm:mt-2 md:m-4 max-sm:p-1 max-sm:mx-1">
            <button class="w-full text-left bg-white p-2 rounded flex justify-between items-center font-semibold"
                onclick="toggleDropdown('dropdown2', this)">
                Apakah Pandai Digital Berbayar ?
                <i id="icon3"
                    class="fa-solid fa-chevron-down ml-2 text-sm mt-1.5 transition-transform duration-300"></i>
            </button>
            <div id="dropdown2"
                class="hidden p-2 bg-white transition-all duration-300 ease-in-out max-h-0 overflow-hidden">
                <p class="text-gray-700 block text-sm" role="menuitem">Ya, setiap peserta akan mendapatkan
                    sertifikat setelah menyelesaikan kursus.</p>
            </div>
        </div>

        <div class="mb-1 border border-gray-300 rounded lg:mt-2 max-sm:mt-2 md:m-4 max-sm:p-1 max-sm:mx-1">
            <button class="w-full text-left bg-white p-2 rounded flex justify-between items-center font-semibold"
                onclick="toggleDropdown('dropdown3', this)">
                Platform Pembayaran apa saja yang digunakan pada Pandai Digital ?
                <i id="icon4"
                    class="fa-solid fa-chevron-down ml-2 text-sm mt-1.5 transition-transform duration-300"></i>
            </button>
            <div id="dropdown3"
                class="hidden p-2 bg-white transition-all duration-300 ease-in-out max-h-0 overflow-hidden">
                <p class="text-gray-700 block text-sm" role="menuitem">Pembayaran bisa menggunakan
                    berbagai e-wallet, QRIS, transfer bank hingga melalui swalayan terdekat</p>
            </div>
        </div>
    </div>


    <!-- script dropdown -->
    <script>
        function toggleDropdown(id, button) {
            const dropdown = document.getElementById(id);
            const arrow = button.querySelector('i');

            if (dropdown.classList.contains('hidden')) {
                dropdown.classList.remove('hidden');
                dropdown.style.maxHeight = dropdown.scrollHeight + "px";
                arrow.classList.remove('fa-chevron-down');
                arrow.classList.add('fa-chevron-up');
            } else {
                dropdown.style.maxHeight = '0px';
                arrow.classList.remove('fa-chevron-up');
                arrow.classList.add('fa-chevron-down');
                setTimeout(() => {
                    dropdown.classList.add('hidden');
                }, 300);
            }
        }
    </script>
@endsection
