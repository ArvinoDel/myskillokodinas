@extends('./myskill/layouts.main')
@section('container')
    <div class="payment bg-gray-50 font-inter w-screen">
        <div class="max-w-5xl mx-auto my-1 ml-20 px-4 md:px-10">
            <!-- Main Container -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2">
                    <!-- eLearning Banner -->
                    <div
                        class="bg-gradient-to-r from-blue-500 to-teal-500 rounded-lg p-6 flex flex-col md:flex-row items-center space-x-0 md:space-x-4 space-y-4 md:space-y-0">
                        <div class="md:w-1/2">
                            <h2 class="text-2xl font-bold text-white mb-2">eLearning</h2>
                            <p class="text-white mb-4">Pelajari Ratusan Skill Bersertifikat Sekali Bayar. Fleksibel &
                                Praktikal.</p>
                            <button
                                class="bg-yellow-400 text-black px-4 py-2 rounded-full font-semibold">Selengkapnya</button>
                        </div>
                        <div class="md:w-1/2">
                            <img src="https://placehold.co/250x150" alt="eLearning Image" class="rounded-lg mx-auto">
                        </div>
                    </div>

                    <!-- Testimonial Section -->
                    <div class="mt-8 px-4 border-b mb-4 pb-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Testimoni</h3>
                        <div class="flex items-center mb-6 flex-col sm:flex-row sm:items-start">
                            <img src="https://placehold.co/50x50" alt="Course Report"
                                class="mb-2 sm:mb-0 sm:mr-2 max-w-[50px]">
                            <span class="text-green-600 font-semibold text-center sm:text-left">4.9 rating on Course
                                Report</span>
                            <div class="flex items-center mt-2 sm:mt-0">
                                <img src="https://placehold.co/50x50" alt="Course Report"
                                    class="rounded-full mr-1 max-w-[30px]">
                                <img src="https://placehold.co/50x50" alt="Course Report"
                                    class="rounded-full mr-1 max-w-[30px]">
                                <img src="https://placehold.co/50x50" alt="Course Report"
                                    class="rounded-full mr-1 max-w-[30px]">
                                <img src="https://placehold.co/50x50" alt="Course Report"
                                    class="rounded-full mr-1 max-w-[30px]">
                            </div>
                            <span class="text-gray-500 mx-2">></span>
                            <span class="text-gray-600">1.5 Juta Member</span>
                        </div>

                        <div class="overflow-x-scroll no-scrollbar">
                            <div class="flex space-x-4">
                                <div class="flex-shrink-0 flex items-center p-4 bg-white rounded-lg shadow w-[300px] my-1 ml-2">
                                    <img src="https://placehold.co/60x60" alt="Paksi Cahyo Baskoro"
                                        class="rounded-lg mr-4 max-w-[60px]">
                                    <div>
                                        <p class="font-semibold text-gray-800 text-sm">Paksi Cahyo Baskoro</p>
                                        <p class="text-gray-600 text-xs">Diterima sebagai Copywriter di DBS Bank Indonesia.
                                        </p>
                                    </div>
                                </div>
                                <div class="flex-shrink-0 flex items-center p-4 bg-white rounded-lg shadow w-[300px] my-1 ml-2">
                                    <img src="https://placehold.co/60x60" alt="M. Arkhan Doohan"
                                        class="rounded-lg mr-4 max-w-[60px]">
                                    <div>
                                        <p class="font-semibold text-gray-800 text-sm">M. Arkhan Doohan</p>
                                        <p class="text-gray-600 text-xs">Diterima sebagai Data Analyst di United Tractors.
                                        </p>
                                    </div>
                                </div>
                                <div class="flex-shrink-0 flex items-center p-4 bg-white rounded-lg shadow w-[300px] my-1 ml-2">
                                    <img src="https://placehold.co/60x60" alt="M. Arkhan Doohan"
                                        class="rounded-lg mr-4 max-w-[60px]">
                                    <div>
                                        <p class="font-semibold text-gray-800 text-sm">M. Arkhan Doohan</p>
                                        <p class="text-gray-600 text-xs">Diterima sebagai Data Analyst di United Tractors.
                                        </p>
                                    </div>
                                </div>
                                <div class="flex-shrink-0 flex items-center p-4 bg-white rounded-lg shadow w-[300px] my-1 ml-2">
                                    <img src="https://placehold.co/60x60" alt="M. Arkhan Doohan"
                                        class="rounded-lg mr-4 max-w-[60px]">
                                    <div>
                                        <p class="font-semibold text-gray-800 text-sm">M. Arkhan Doohan</p>
                                        <p class="text-gray-600 text-xs">Diterima sebagai Data Analyst di United Tractors.
                                        </p>
                                    </div>
                                </div>
                                <div class="flex-shrink-0 flex items-center p-4 bg-white rounded-lg shadow w-[300px] my-1 ml-2">
                                    <img src="https://placehold.co/60x60" alt="M. Arkhan Doohan"
                                        class="rounded-lg mr-4 max-w-[60px]">
                                    <div>
                                        <p class="font-semibold text-gray-800 text-sm">M. Arkhan Doohan</p>
                                        <p class="text-gray-600 text-xs">Diterima sebagai Data Analyst di United Tractors.
                                        </p>
                                    </div>
                                </div>
                                <div class="flex-shrink-0 flex items-center p-4 bg-white rounded-lg shadow w-[300px] my-1 ml-2">
                                    <img src="https://placehold.co/60x60" alt="M. Arkhan Doohan"
                                        class="rounded-lg mr-4 max-w-[60px]">
                                    <div>
                                        <p class="font-semibold text-gray-800 text-sm">M. Arkhan Doohan</p>
                                        <p class="text-gray-600 text-xs">Diterima sebagai Data Analyst di United Tractors.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Right Section -->
                <div class="lg:ml-9 lg:w-full">
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h3 class="text-gray-700 font-semibold mb-4">RINGKASAN PRODUK</h3>
                        <div class="border-b border-gray-300 pb-4 mb-4">
                            <p class="text-gray-800">Paket Video E-Learning
                                {{ $berlanggananss->masa_berlangganan ?? 'Data tidak tersedia' }}</p>
                            <p class="text-gray-600">Rp. {{ number_format($berlanggananss->harga_diskon, 0, ',', '.') }}
                            </p>
                        </div>
                        <div class="mb-4">
                            <label for="promo" class="text-gray-700 text-sm mb-2 block">Kode Promo / Kupon</label>
                            <input type="text" id="promo" class="w-full p-2 border border-gray-300 rounded-md">
                            <button
                                class="mt-2 w-full text-sm text-blue-600 flex items-center bg-transparent hover:bg-blue-100 border border-blue-600 rounded-md px-3 py-2">
                                <i class="fa-solid fa-tag mr-2"></i>Lihat Promo Hari Ini
                            </button>
                        </div>

                        <!-- Dropdown for Payment Methods -->
                        <div class="relative mb-4">
                            <button class="w-full bg-teal-600 text-white py-2 rounded-md" id="dropdownButton">Pilih
                                Metode
                                Pembayaran <i class="fa-solid fa-chevron-down ml-2"></i></button>
                            <div class="absolute w-full bg-white shadow-lg rounded-md mt-2 hidden" id="dropdownMenu">
                                @foreach ($metod as $met)
                                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100"
                                        data-method="{{ $met->nama_pembayaran }}"
                                        data-image="{{ asset('/foto_pembayaran/' . $met->pembayaran) }}">{{ $met->nama_pembayaran }}</a>
                                @endforeach
                            </div>
                        </div>
                        <div class="border-b border-gray-300 pb-4 mb-4">
                            <div class="flex justify-between text-gray-700">
                                <span>Subtotal</span>
                                <span>Rp {{ number_format($berlanggananss->harga_diskon, 0, ',', '.') }}</span>
                                <!-- Format harga tanpa desimal -->
                            </div>
                            <div class="flex justify-between text-gray-500 text-sm font-medium">
                                <span>PPN (11%)</span>
                                <span>Rp {{ number_format($berlanggananss->harga_diskon * 0.11, 0, ',', '.') }}</span>
                                <!-- Menghitung PPN 11% dari harga -->
                            </div>
                        </div>
                        <div class="flex justify-between font-semibold text-gray-800 text-lg">
                            <span>Total</span>
                            <span>Rp
                                {{ number_format($berlanggananss->harga_diskon + $berlanggananss->harga_diskon * 0.11, 0, ',', '.') }}</span>
                            <!-- Total = Subtotal + PPN -->
                        </div>
                        <p class="text-gray-500 text-xs mt-2 text-right ml-auto">+ kode unik</p>
                        <button id="payButton" class="w-full bg-gray-200 text-gray-600 py-2 rounded-md mt-4"
                            disabled>Lanjut
                            Bayar</button>
                    </div>
                </div>
            </div>

            <div class="mt-9">
                <!-- Header Section -->
                <h2 class="text-gray-500 font-semibold text-sm mb-2">Berlangganan E-Learning</h2>
                <h1 class="text-3xl font-bold text-gray-900 mb-4">Paket Video E-Learning
                    {{ $berlanggananss->masa_berlangganan ?? 'Data tidak tersedia' }}</h1>
                <div class="text-2xl font-semibold text-gray-700">
                    Rp. {{ number_format($berlanggananss->harga_diskon, 0, ',', '.') }} <span
                        class="text-sm line-through text-gray-500">Rp.
                        {{ number_format($berlanggananss->harga_berlangganan, 0, ',', '.') }}</span>
                </div>

                <!-- Product Description -->
                <div class="mt-6">
                    <h3 class="text-lg font-semibold text-teal-600 mb-2">Deskripsi Produk</h3>
                    <p class="text-gray-700 leading-relaxed">
                        Langganan sekali bayar untuk bisa akses semua materi bersertifikat. Tanpa Batas. Makin lama
                        periode
                        langganan, makin hemat dan untung banyak!
                    </p>
                </div>

                <!-- Benefits Section -->
                <div class="mt-6">
                    <h3 class="text-lg font-semibold text-teal-600 mb-2">Benefits</h3>
                    <ul class="text-gray-700 space-y-2">
                        @foreach ($berlanggananss->benefits() as $benefit)
                            <li class="flex items-start">
                                <i class="fa-solid fa-check-circle text-teal-600 mr-2"></i>
                                <span>{{ $benefit->nama_benefit }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Program Pembelajaran Section -->
                <div class="mt-6">
                    <h3 class="text-lg font-semibold text-teal-600 mb-2">Program Pembelajaran</h3>
                    <ul class="text-gray-700 space-y-2">
                        <li class="flex items-start">
                            <i class="fa-solid fa-check-circle text-teal-600 mr-2"></i>
                            <span>Technology</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fa-solid fa-check-circle text-teal-600 mr-2"></i>
                            <span>Business</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fa-solid fa-check-circle text-teal-600 mr-2"></i>
                            <span>Soft Skills</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fa-solid fa-check-circle text-teal-600 mr-2"></i>
                            <span>Personal Development</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        @if (Auth::check())
            <!-- Payment Modal -->
            <div id="paymentModal"
                class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
                <div
                    class="bg-white rounded-lg w-11/12 max-w-md md:w-1/2 md:max-h-[83vh] p-4 md:p-6 relative mt-10 md:mt-16">
                    <button id="closeModal"
                        class="absolute top-2 right-2 text-gray-600 hover:text-gray-900">&times;</button>
                    <div class="flex flex-col md:flex-row justify-between items-center mb-4">
                        <img src="{{ asset('assets/logo.png') }}" class="w-32 md:w-24" alt="Logo">
                        <span class="text-gray-600 font-semibold mt-2 md:mt-0">No. Invoice: INV123456</span>
                    </div>
                    <ul class="text-gray-600 mb-4 text-sm md:text-base">
                        <li><strong>Program:</strong> Paket Video E-Learning
                            {{ $berlanggananss->masa_berlangganan ?? 'Data tidak tersedia' }}</li>
                        <li><strong>Tanggal & Waktu:</strong> <span id="datetime"></span></li>
                        <li><strong>Username:</strong> {{ Auth::user()->username }}</li>
                        @if (Auth::user()->email)
                            <li><strong>Email:</strong> {{ Auth::user()->email }}</li>
                        @elseif (Auth::user()->phone)
                            <li><strong>Phone:</strong> {{ Auth::user()->phone }}</li>
                        @endif
                        <li><strong>Metode Pembayaran:</strong> <span id="selectedMethod"></span></li>
                    </ul>
                    <div class="flex justify-center mb-4">
                        <img src="{{ asset('/foto_pembayaran/' . $met->pembayaran) }}" alt="paymentImage"
                            id="paymentImage" class="rounded-lg w-32 md:w-32 mx-auto my-2">
                    </div>
                    <button id="downloadQR"
                        class="bg-teal-600 text-white px-3 py-2 rounded-md text-sm md:text-base">Download
                        Invoice</button>
                </div>
            </div>
        @else
            <script>
                // Trigger SweetAlert with an error message
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'You must be logged in to access this page.',
                    didClose: () => {
                        // Redirect to the login page when the alert is closed
                        window.location.href = "{{ route('login') }}";
                    }
                });
            </script>
        @endif

    </div>




    <script>
        document.getElementById('dropdownButton').addEventListener('click', function() {
            var dropdownMenu = document.getElementById('dropdownMenu');
            dropdownMenu.classList.toggle('hidden');
        });

        document.querySelectorAll('#dropdownMenu a').forEach(function(item) {
            item.addEventListener('click', function() {
                // Mengisi metode pembayaran yang dipilih
                var selectedMethod = this.getAttribute('data-method');
                var paymentImage = this.getAttribute('data-image'); // Ambil URL gambar
                document.getElementById('dropdownButton').textContent = selectedMethod;
                document.getElementById('paymentImage').src = paymentImage; // Set gambar
                document.getElementById('dropdownMenu').classList.add('hidden');
                document.getElementById('payButton').classList.remove('bg-gray-200', 'text-gray-600');
                document.getElementById('payButton').classList.add('bg-teal-600', 'text-white');
                document.getElementById('payButton').disabled =
                    false; // Enable button after selecting payment method
            });
        });

        document.getElementById('payButton').addEventListener('click', function() {
            document.getElementById('paymentModal').classList.remove('hidden');
            var now = new Date();
            var options = {
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                timeZone: 'Asia/Jakarta'
            };
            var formattedDate = now.toLocaleDateString('id-ID', options);
            document.getElementById('datetime').textContent = formattedDate;

            // Mengambil metode pembayaran yang dipilih
            var selectedMethod = document.getElementById('dropdownButton').textContent.trim();
            document.getElementById('selectedMethod').textContent = selectedMethod;
        });

        document.getElementById('closeModal').addEventListener('click', function() {
            document.getElementById('paymentModal').classList.add('hidden');
        });

        document.getElementById('downloadQR').addEventListener('click', function() {
            var modal = document.querySelector('#paymentModal .bg-white'); // Ambil modal yang ingin di-download
            var downloadButton = document.getElementById('downloadQR'); // Ambil button Download QR

            downloadButton.style.display = 'none';

            var qrCode = document.getElementById('qrCode');
            qrCode.style.margin = '20px auto';
            qrCode.style.display = 'block';

            html2canvas(modal).then(function(canvas) {
                var imgData = canvas.toDataURL('image/png');
                var {
                    jsPDF
                } = window.jspdf;
                var pdf = new jsPDF({
                    orientation: 'portrait',
                    unit: 'mm',
                    format: 'a4'
                });

                var imgWidth = 190;
                var imgHeight = (canvas.height * imgWidth) / canvas.width;

                pdf.addImage(imgData, 'PNG', 10, 10, imgWidth, imgHeight);
                pdf.save('Pembayaran.pdf');
                downloadButton.style.display = 'block';
            });
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
@endsection
