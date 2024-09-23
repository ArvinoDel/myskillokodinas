@extends('./myskill/layouts.main')
@section('container')
<div class="corporate">
    <section
        class="w-screen h-auto rounded-b-3xl bg-white lg:bg-gradient-to-b from-orange-400 to-red-400 text-white flex flex-col lg:flex-row">
        <!-- Adjust margin and padding for the image container -->
        <div class="flex justify-center lg:justify-start">
            <img loading="lazy" src="{{ asset('./assets/corporate/header.webp') }}"
                class="h-48 w-auto lg:h-80 lg:mt-4 lg:ml-4 lg:mr-2 mt-4 lg:w-auto object-cover rounded-md">
            <!-- Further reduced max-w -->
        </div>

        <div class="lg:ml-4 lg:mt-8 p-4 lg:p-0">
            <button type="button"
                class="focus:outline-none text-white bg-gray-900 font-medium rounded-full text-sm px-5 py-2.5 me-2 dark:focus:ring-yellow-900 mb-4 lg:mb-0">Pandai Digital
                for Business</button>
            <p class="text-base lg:text-4xl font-bold text-black lg:text-white">
                Tingkatkan Skill & Performa Karyawan
            </p>
            <p class="text-base lg:text-4xl font-bold text-black lg:text-white mb-0">
                dengan Corporate Training
            </p>
            <p class="mt-2 text-sm lg:text-lg text-black lg:text-white">Pandai Digital membantu ratusan enterprise, startup,
                badan pemerintahan dan</p>
            <p class="text-sm lg:text-lg text-black lg:text-white"> institusi lainnya untuk mengembangkan potensi
                karyawan melalui </p>
            <p class="text-sm lg:text-lg text-black lg:text-white">customizable training.</p>
            <br>

            <button type="button"
                class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Konsultasi
                Gratis Sekarang</button>
            <div class="flex flex-wrap justify-center lg:justify-start items-center space-x-4 mb-4">
                <img loading="lazy" src="./assets/corporate/microsoft.webp" alt="Microsoft" class="h-4 lg:h-6 mb-2">
                <!-- Reduced size on mobile -->
                <img loading="lazy" src="./assets/corporate/kemenkeu.webp" alt="kemenkeu" class="h-4 lg:h-6 mb-2">
                <!-- Reduced size on mobile -->
                <img loading="lazy" src="./assets/corporate/bank-mandiri.webp" alt="mandiri" class="h-4 lg:h-6 mb-2">
                <!-- Reduced size on mobile -->
                <img loading="lazy" src="./assets/corporate/bank-indonesia.webp" alt="bi" class="h-4 lg:h-6 mb-2">
                <!-- Reduced size on mobile -->
                <img loading="lazy" src="./assets/corporate/mizan.webp" alt="mizan" class="h-4 lg:h-6 mb-2">
                <!-- Reduced size on mobile -->
            </div>
        </div>
    </section>

    <h3 class="text-center mt-4 mr-100 text-3xl font-bold mb-4 text-black">Pandai Digital Dipercaya Ratusan Institusi Sebagai
        Learning Partner Karena</h3>
    <div class="flex flex-wrap justify-center mb-4 space-x-4">
        <!-- Customizable Program -->
        <div class="bg-white text-black p-6 rounded-lg w-64 border border-spacing-1 flex flex-col items-center max-sm:ml-4">
            <img loading="lazy" src="./assets/corporate/workshop.webp" alt="" class="mx-auto mb-4 w-3/4 max-w-xs h-32 object-fill">
            <p class="text-md font-bold text-center">Customizable Program</p>
            <p class="text-sm text-center">Dari segi topik materi, online/offline,<br>durasi serta lokasi pelatihan.</p>
        </div>
        <!-- Dibawakan Praktisi Senior -->
        <div class="bg-white text-black p-6 rounded-lg w-64 border border-spacing-1 flex flex-col items-center">
            <img loading="lazy" src="./assets/corporate/senior-practicioner.webp" alt="" class="mx-auto mb-4 w-3/4 max-w-xs h-32 object-fill">
            <p class="text-md font-bold text-center">Dibawakan Praktisi Senior</p>
            <p class="text-sm text-center">Pandai Digital menggandeng professional terkurasi dari notable companies.</p>
        </div>
        <!-- Workshop & Practice Driven -->
        <div class="bg-white text-black p-6 rounded-lg w-64 border border-spacing-1 flex flex-col items-center">
            <img loading="lazy" src="./assets/corporate/workshop.webp" alt="" class="mx-auto mb-4 w-3/4 max-w-xs h-32 object-fill">
            <p class="text-md font-bold text-center">Workshop & Practice Driven</p>
            <p class="text-sm text-center">Pelatihan Pandai Digital mengkombinasikan pemahaman, praktik dan case study.</p>
        </div>
        <!-- Before & After yang Terukur -->
        <div class="bg-white text-black p-6 rounded-lg w-64 border border-spacing-1 flex flex-col items-center">
            <img loading="lazy" src="./assets/corporate/measured-impact.webp" alt="" class="mx-auto mb-4 w-3/4 max-w-xs h-32 object-fill">
            <p class="text-md font-bold text-center">Before & After yang Terukur</p>
            <p class="text-sm text-center">Dari need assessment, test, reporting & konsultasi pasca training.</p>
        </div>
    </div>


</div>

<section class="w-screen h-auto">
    <div class="text-center mb-4">
        <button type="button"
            class="focus:outline-none text-base sm:text-xl text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg px-4 sm:px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
            Konsultasi Gratis Sekarang
        </button>
    </div>
    <h2 class="text-xl sm:text-3xl font-bold mb-4 sm:mb-6 text-center">
        Fokus Mendorong Performa, Bukan Sekadar Organizer
    </h2>

    <section class="mt-8 overflow-x-auto whitespace-nowrap px-8 py-4 mb-12 no-scrollbar">
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
        <div class="inline-block px-4">
            <div class="bg-white rounded-lg shadow-md p-4 w-64">
                <img loading="lazy" src="{{ asset('./assets/corporate/bi.webp') }}" class="h-34 w-64 pb-1 rounded-sm mb-4">
                <p class="text-sm text-center ">Microsoft Excel - Bank Indonesia</p>
            </div>
        </div>
        <div class="inline-block px-4">
            <div class="bg-white rounded-lg shadow-md p-4 w-64">
                <img loading="lazy" src="{{ asset('./assets/corporate/fb.webp') }}" class="h-34 w-64 rounded-sm">
                <p class="text-sm text-center ">Kuningan Dev. International - </p>
                <p class="text-sm text-center pb-1">Facebook Ads</p>
            </div>
        </div>
        <div class="inline-block px-2">
            <div class="bg-white rounded-lg shadow-md p-4 w-64">
                <img loading="lazy" src="{{ asset('./assets/corporate/ojk.webp') }}" class="h-34 w-64 rounded-sm">
                <p class="text-sm">Otoritas Jasa Keuangan - Business</p>
                <p class="text-sm text-center pb-1"> English</p>
            </div>
        </div>
        <div class="inline-block px-4">
            <div class="bg-white rounded-lg shadow-md p-4 w-64">
                <img loading="lazy" src="{{ asset('./assets/corporate/qoala.webp') }}" class="h-34 w-64 rounded-sm">
                <p class="text-sm py-4 pb-1">Qoala - Professional Communication</p>
            </div>
        </div>
        <div class="inline-block px-4">
            <div class="bg-white rounded-lg shadow-md p-4 w-64">
                <img loading="lazy" src="{{ asset('./assets/corporate/pln.webp') }}" class="h-34 w-64 pb-1 rounded-sm mb-4">
                <p class="text-sm text-center pb-1">PLN - Data Analysis</p>
            </div>
        </div>
        <div class="inline-block px-4">
            <div class="bg-white rounded-lg shadow-md p-4 w-64">
                <img loading="lazy" src="{{ asset('./assets/corporate/djp.webp') }}" class="h-34 w-64 rounded-sm">
                <p class="text-sm">Direktorat Jendral Pajak - Marketing</p>
                <p class="text-sm text-center pb-1">Communication</p>
            </div>
        </div>
    </section>

    <h3 class="text-center mt-4 mb-4 text-3xl font-bold text-black mx-4 sm:mx-10 md:mx-20 lg:mx-20">
        Mengapa Ratusan Perusahaan Memilih Pandai Digital?
    </h3>

    <div class="flex flex-wrap justify-center mb-4 space-x-4 space-y-4">
        <!-- LinkedIn Top Startup Award -->
        <div class="bg-white text-black p-6 rounded-xl w-64 border border-spacing-2 flex flex-col items-center">
            <img loading="lazy" src="./assets/corporate/linkedin-top-startup.webp" alt="LinkedIn Top Startup Award"
                class="mx-auto mb-4 w-1/2 max-w-xs">
            <p class="text-md text-center">2X LinkedIn Top Startup Award</p>
            <p class="text-center">Satu-satunya startup Education Technology di Indonesia.</p>
        </div>
        <!-- Course Report -->
        <div class="bg-white text-black p-6 rounded-xl w-64 border border-spacing-2 flex flex-col items-center">
            <img loading="lazy" src="./assets/corporate/course-report.webp" alt="Course Report" class="mx-auto mb-4 w-1/2 max-w-xs">
            <p class="text-md text-center">Rating 4.99 di Course Report</p>
            <p class="text-center">Mendapatkan rating sangat memuaskan dari para peserta.</p>
        </div>
        <!-- Users -->
        <div class="bg-white text-black p-6 rounded-xl w-64 border border-spacing-2 flex flex-col items-center">
            <img loading="lazy" src="./assets/corporate/userbase.webp" alt="Users" class="mx-auto mb-4 w-1/2 max-w-xs">
            <p class="text-md text-center">Lebih dari 1.5 Juta Pengguna</p>
            <p class="text-center">Komunitas pengembangan skill terbesar di Indonesia.</p>
        </div>
    </div>


    @include('./myskill/partials.hubungi-kami')

</section>
</div>
@endsection