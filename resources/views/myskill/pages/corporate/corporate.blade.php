@extends('./myskill/layouts.main')
@section('container')
<div class="corporate">
    <section
        class="flex flex-col lg:flex-row h-auto rounded-b-3xl bg-gradient-to-b from-orange-400 to-red-400 text-white w-screen">
        <!-- Adjust margin and padding for the image container -->
        <div class="flex justify-center lg:justify-start mb-4 lg:mb-0 lg:ml-16 mt-4 lg:mt-0">
            <img src="{{ asset('./assets/corporate/corporate.webp') }}" alt="Corporate"
                class="h-48 lg:mt-5 w-auto lg:h-64 lg:w-auto object-cover">
        </div>

        <div class="text-left sm:ml-5 max-sm:ml-3 lg:text-left max-md:m-4 lg:ml-4 text-black lg:text-white">
            <button type="button"
                class="focus:outline-none text-white bg-gray-900 font-medium rounded-full text-sm px-5 py-2.5 me-2 dark:focus:ring-yellow-900">Pandai Digital
                for Business</button>
            <p class="text-xl lg:text-4xl lg:w-4/5 font-bold mb-2 lg:mb-4 text-white">
                Layanan Pengembangan Skill dan Peningkatan Performa Karyawan
            </p>
            <p class="lg:w-8/12 lg:text-white text-white">
                Jalankan corporate training yang disesuaikan dengan kebutuhan perusahaan, maupun akses Performance Management Software dan E-learning Pandai Digital for Business.
            </p>
            <br>
            <!-- Container for buttons -->
            <div class="flex flex-col lg:flex-row lg:justify-start lg:space-x-2 lg:items-center items-center mb-4">

                <!-- Corporate Training Button -->
                <a href="/corporate-training"
                    class="text-black lg:text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-4 py-2 mb-2 lg:mb-0 dark:focus:ring-yellow-900">
                    Corporate Training
                </a>

                <!-- Performance Management Software Button -->
                <a href="/experience"
                    class="text-black lg:text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-4 py-2 mb-2 lg:mb-0 dark:focus:ring-yellow-900">
                    Performance Management Software
                </a>
            </div>

            <div class="flex flex-wrap justify-center lg:justify-start items-center space-x-4 mb-4">
                <img src="./assets/corporate/microsoft.webp" alt="Microsoft" class="h-6">
                <img src="./assets/corporate/kemenkeu.webp" alt="kemenkeu" class="h-6">
                <img src="./assets/corporate/bank-mandiri.webp" alt="mandiri" class="h-6">
                <img src="./assets/corporate/bank-indonesia.webp" alt="bi" class="h-6">
                <img src="./assets/corporate/mizan.webp" alt="mizan" class="h-6">
            </div>
        </div>
    </section>

    <div class="flex flex-col items-center">
        <h3 class="text-center mt-4 text-3xl font-bold mb-4 text-black">Mengapa Ratusan Perusahaan Memilih Pandai Digitalrainer?
        </h3>
        <div class="flex flex-col sm:flex-row justify-center mb-4 space-y-4 sm:space-y-0 sm:space-x-4 px-2">
            <div class="bg-white text-black p-4 rounded-lg w-full sm:w-56 border border-spacing-2 max-lg:text-sm">
                <img src="./assets/corporate/linkedin-top-startup.webp" alt="LinkedIn Top Startup Award"
                    class="mx-auto mb-2 max-lg:w-3/4">
                <p class="text-sm font-medium">2X LinkedIn Top Startup Award</p>
                <p class="text-xs">Satu-satunya startup Education Technology di Indonesia.</p>
            </div>
            <div class="bg-white text-black p-4 rounded-lg w-full sm:w-56 border border-spacing-2 max-lg:text-sm">
                <img src="./assets/corporate/course-report.webp" alt="Course Report" class="mx-auto mb-2 max-lg:w-3/4">
                <p class="text-sm font-medium">Rating 4.99 di Course Report</p>
                <p class="text-xs">Mendapatkan rating sangat memuaskan dari para peserta.</p>
            </div>
            <div class="bg-white text-black p-4 rounded-lg w-full sm:w-56 border border-spacing-2 max-lg:text-sm">
                <img src="./assets/corporate/userbase.webp" alt="Users" class="mx-auto mb-2 max-lg:w-3/4">
                <p class="text-sm font-medium">Lebih dari 1.5 Juta Pengguna</p>
                <p class="text-xs">Komunitas pengembangan skill terbesar di Indonesia.</p>
            </div>
        </div>

    </div>

    <section class="w-full h-auto">
        <h3 class="text-center mt-4 mr-12 text-3xl font-bold mb-4 text-black w-full">Berbagai Program Pandai Digitalrainer</h3>
        <!-- Corporate Training -->
        <div class="flex flex-col lg:flex-row gap-8 px-4 py-6 items-center">
            <img src="./assets/corporate/corporate-training.webp" alt="Corporate Training"
                class="h-56 w-full lg:h-72 lg:w-1/2 object-cover rounded-md mb-4 lg:mb-0">
            <div class="lg:w-1/2">
                <h2 class="text-pink-600 text-xl lg:text-2xl font-bold ">Corporate Training</h2>
                <p class="text-gray-700 mb-4">
                    Assessment, Pelatihan, dan Konsultasi Pasca Training.
                </p>
                <ul class="list-disc pl-5 mb-3">
                    <li>
                        Customizeable: offline / online, berbagai topik dan durasi bisa disesuaikan.
                    </li>
                    <li>
                        Dibawakan praktisi senior dari notable companies dan industri yang relevan.
                    </li>
                    <li>
                        Fokus praktik & case study. Assessment before dan after training yang lengkap.
                    </li>
                </ul>
                <a href="/corporate-training"
                    class="focus:outline-none text-white bg-pink-600 font-medium rounded-md text-sm px-5 py-2.5 dark:focus:ring-yellow-900">Pelajari
                    Corporate Training</a>
            </div>
        </div>

        <!-- Performance Management Software -->
        <div class="flex flex-col-reverse md:flex-row md:mr-12 justify-center md:justify-end gap-12 px-4 md:px-0">
            <div class="flex-1 md:ml-12 mb-4 md:mb-0">
                <h2 class="text-pink-600 text-2xl font-bold">Performance Management Software</h2>
                <p class="text-gray-700 mb-4">
                    Tools HRIS untuk Melacak Performa & Employee Learning
                </p>
                <p class="text-gray-700 text-md mb-4 w-full md:w-10/12">
                <ul class="list-disc pl-5 mb-3">
                    <li>
                        Pencatatan dan Monitoring KPI setiap divisi dan karyawan.
                    </li>
                    <li>
                        1.000+ konten materi upskilling untuk semua divisi di perusahaan.
                    </li>
                    <li>
                        Dashboard analytics yang lengkap untuk data-driven decision.
                    </li>
                </ul>
                </p>
                <a href="/experience"
                    class="focus:outline-none text-white bg-pink-600 font-medium rounded-md max-sm:text-xs px-5 py-2.5 mb-4 dark:focus:ring-yellow-900">Pelajari
                    Performance Management Software</a>
            </div>
            <img src="./assets/corporate/experience.webp" alt="Performance Management Software"
                class="h-64 object-cover shadow-lg rounded-lg md:mr-10 md:h-auto max-w-xs md:max-w-none mx-4 md:mx-0">
        </div>


        <!-- Corporate Campaign, Partnership & CSR -->
        <div class="flex flex-col lg:flex-row gap-12 py-6 justify-items-center px-4">
            <img src="./assets/corporate/corporate-campaign.webp" alt="Corporate Training"
                class="h-48 w-auto lg:h-80 lg:w-auto object-cover rounded-md">
            <div>
                <h2 class="text-pink-600 text-2xl font-bold">Corporate Campaign, Partnership & CSR</h2>
                <p class="text-gray-700 mb-4">
                    Perbesar Brand Awareness & Dampak Besama 1.5 Juta+ Member
                </p>
                <ul class="list-disc pl-5 mb-3">
                    <li>
                        Kerjasama pelaksanaan Public Training, Event & Workshop.

                    </li>
                    <li>
                        Perkenalkan brand & expertise perusahaan, perkuat corporate branding

                    </li>
                    <li>
                        Terbukti membangun virality dan word of mouth dengan ribuan peserta.

                    </li>
                </ul>
                <a href="#call" type="button"
                    class="focus:outline-none mb-4 text-white bg-pink-600 font-medium rounded-md text-sm px-5 py-2.5 me-2 dark:focus:ring-yellow-900">Hubungi
                    Tim Pandai Digital</a>
            </div>
        </div>

        <div class="min-h-screen flex items-center justify-center mt-9 px-4 sm:px-6 lg:px-8" id="call">
            <div class="w-full max-w-lg">
                <h2 class="text-2xl sm:text-3xl font-bold mb-4 sm:mb-6 text-center">Hubungi Pandai Digitalrainer untuk Diskusi
                    Lebih Lanjut</h2>
                <form class="bg-white space-y-4 sm:space-y-6 p-4 sm:p-6">
                    <div class="grid grid-cols-1 gap-4 sm:gap-6">
                        <label for="nama" class="font-bold text-sm sm:text-base">Nama
                            <input type="text" id="nama"
                                class="w-full p-3 sm:p-4 bg-gray-300 rounded-lg text-sm sm:text-base">
                        </label>
                        <label for="jabatan" class="font-bold text-sm sm:text-base">Jabatan
                            <input type="text" id="jabatan"
                                class="w-full p-3 sm:p-4 bg-gray-300 rounded-lg text-sm sm:text-base">
                        </label>
                        <label for="perusahaan" class="font-bold text-sm sm:text-base">Perusahaan
                            <input type="text" id="perusahaan"
                                class="w-full p-3 sm:p-4 bg-gray-300 rounded-lg text-sm sm:text-base">
                        </label>
                        <label for="email" class="font-bold text-sm sm:text-base">Email Resmi
                            <input type="email" id="email"
                                class="w-full p-3 sm:p-4 bg-gray-300 rounded-lg text-sm sm:text-base">
                        </label>
                        <label for="no-hp" class="font-bold text-sm sm:text-base">No. HP / WhatsApp
                            <input type="text" id="no-hp"
                                class="w-full p-3 sm:p-4 bg-gray-300 rounded-lg text-sm sm:text-base">
                        </label>
                        <label for="layanan" class="font-bold text-sm sm:text-base">Pilih Layanan</label>
                        <select id="layanan" class="w-full p-3 sm:p-4 bg-gray-300 rounded-lg text-sm sm:text-base">
                            <option value="" disabled selected hidden></option>
                            <option value="corporate-training">Corporate Training</option>
                            <option value="performance-management-software">Performance Management Software</option>
                            <option value="employee-learning-development">Employee Learning and Development</option>
                            <option value="consulting-services">Consulting Services</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div>
                        <label for="pesan" class="font-bold text-sm sm:text-base">Pesan</label>
                        <textarea id="pesan" class="w-full p-3 sm:p-4 bg-gray-300 rounded-lg mt-2 text-sm sm:text-base h-32 sm:h-40"></textarea>
                    </div>
                    <div class="flex flex-col sm:flex-row items-center space-y-4 sm:space-x-4 sm:space-y-0">
                        <button type="submit"
                            class="w-full sm:w-auto px-4 py-2 bg-gray-300 text-white font-bold rounded-lg">Kirim</button>
                        <p class="text-xs sm:text-sm">Silahkan lengkapi form diatas untuk mengirim pesan</p>
                    </div>
                </form>
            </div>
        </div>

    </section>
</div>
@endsection