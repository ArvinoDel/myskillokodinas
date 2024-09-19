@extends('./myskill/layouts.main')
@section('container')

    <div class="flex flex-col lg:flex-row gap-4">
        <!-- Sidebar -->
        <aside class="w-full md:w-full lg:w-1/4 px-4 h-full max-md:relative lg:sticky top-5 lg:top-0">
            <!-- Sidebar Container -->
            <input type="checkbox" id="toggle-nav" class="hidden" />
            <div class="bg-white rounded-lg shadow-md md:mt-2 overflow-hidden border border-gray-300">
                <!-- Toggle Button -->
                <label for="toggle-nav"
                    class="lg:hidden bg-blue-600 text-white font-semibold p-3 rounded-lg shadow-md cursor-pointer flex items-center justify-between">
                    Navigasi Profil
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform transition-transform duration-200"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </label>

                <!-- Sidebar Content -->
                <div class="transition-all duration-300 ease-in-out max-h-0 md:max-h-0 lg:max-h-full lg:block overflow-hidden"
                    id="sidebar-content">
                    <h2 class="text-gray-700 font-semibold hidden lg:block ml-4 mt-4">Navigasi Profil</h2>
                    <ul class="space-y-1 py-3">
                        <li class="p-1 px-5">
                            <a href="/my-profile" class="flex items-center text-gray-600 hover:bg-blue-100 rounded-lg p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M10 2a6 6 0 100 12 6 6 0 000-12zM8 13a4.978 4.978 0 00-3.5 1.5A8.978 8.978 0 0110 16c1.654 0 3.18-.446 4.5-1.5A4.978 4.978 0 0012 13H8z" />
                                </svg>
                                Profil Saya
                            </a>
                        </li>
                        <li class="p-1 px-5">
                            <a href="/profile/my-purchase"
                                class="flex items-center text-blue-600 hover:bg-gray-100 rounded-lg p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M16 6V4a2 2 0 00-2-2H6a2 2 0 00-2 2v2H3a1 1 0 00-1 1v9a3 3 0 003 3h10a3 3 0 003-3V7a1 1 0 00-1-1h-1zM6 4h8v2H6V4zm4 11a2 2 0 110-4 2 2 0 010 4z" />
                                </svg>
                                Akses Pembelian
                            </a>
                        </li>
                        <li class="p-1 px-5">
                            <a href="/profile/my-activity"
                                class="flex items-center text-gray-600 hover:bg-gray-100 rounded-lg p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M6 2a1 1 0 00-.894.553L2.382 10H4v5a2 2 0 002 2h8a2 2 0 002-2v-5h1.618l-2.724-7.447A1 1 0 0014 2H6zm4 12a2 2 0 110-4 2 2 0 010 4z"
                                        clip-rule="evenodd" />
                                </svg>
                                Aktivitas Saya
                            </a>
                        </li>
                        <li class="p-1 px-5">
                            <a href="/profile/my-transaction"
                                class="flex items-center text-gray-600 hover:bg-gray-100 rounded-lg p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M2 5a1 1 0 011-1h14a1 1 0 011 1v10a1 1 0 01-1 1H3a1 1 0 01-1-1V5zm3 7a1 1 0 100-2 1 1 0 000 2zm9-1a1 1 0 100-2 1 1 0 000 2z"
                                        clip-rule="evenodd" />
                                </svg>
                                Riwayat Transaksi
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>

        <style>
            /* Toggle the visibility of the sidebar content */
            #toggle-nav:checked~div #sidebar-content {
                max-height: 500px;
                /* Adjust this value as needed to accommodate the content */
            }

            /* Rotate the arrow when the dropdown is active */
            #toggle-nav:checked~div label svg {
                transform: rotate(180deg);
            }

            /* Ensure content is hidden by default on small and medium screens */
            #sidebar-content {
                max-height: 0;
                overflow: hidden;
            }

            /* For large screens, display the content fully */
            @media (min-width: 1024px) {
                #sidebar-content {
                    max-height: none;
                    overflow: visible;
                }
            }
        </style>


        <!-- Content Area -->
        <div class="w-full h full  bg-white  p-6">
            <div class="flex justify-between items-center border-b border-gray-300 pb-2 mb-6 tab-container">
                <div class="flex space-x-4">
                    <a href="#" id="show-elearning" class="text-lg tab active-tab">E-Learning</a>
                    <a href="#" id="show-bootcamp" class="text-lg tab">Bootcamp</a>
                    <a href="#" id="show-mentoring" class="text-lg tab">Review CV</a>
                </div>
                <span class="underline" id="underline"></span>
            </div>

            <div id="elearning-content" class="text-start">
                <h2 class="text-xl font-semibold text-gray-800">Semua E-learning Saya</h2>

                @if ($elearningPayments->isEmpty())
                    <h2 class="text-xl font-semibold text-gray-800">Oops, sepertinya Kamu Tidak Memiliki Langganan Aktif.
                    </h2>
                    <p class="mt-2 text-gray-600">Ayo berlangganan sekarang untuk akses ratusan materi e-learning MySkill!
                    </p>
                    <button class="mt-4 bg-teal-500 text-white px-6 py-2 rounded-lg hover:bg-teal-600">
                        ⚡ Mulai Berlangganan
                    </button>
                    <div class="mt-10">
                        <h3 class="text-lg font-semibold text-gray-800">Pembelian Sebelumnya</h3>
                        <p class="mt-2 text-gray-600">Hmm, sepertinya kamu belum pernah berlangganan e-learning. Yuk segera
                            berlangganan untuk dapatkan akses penuh ke materi MySkill.</p>
                    </div>
                @else
                    @php
                        $canceledPayments = $elearningPayments->filter(function ($payment) {
                            return $payment->status === 'canceled';
                        });

                        $pendingPayments = $elearningPayments->filter(function ($payment) {
                            return $payment->status === 'pending';
                        });

                        $activePayments = $elearningPayments->filter(function ($payment) {
                            return $payment->status === 'completed';
                        });
                    @endphp

                    @if ($activePayments->isNotEmpty())
                        <h2 class="text-xl font-semibold text-gray-800">Langganan Aktif:</h2>
                        @foreach ($activePayments as $payment)
                            <div class="mt-4 p-4 border border-gray-300 rounded-lg">
                                <h3 class="text-lg font-semibold text-gray-800">{{ $payment->program_name }}</h3>
                                <p class="my-2 text-gray-600">Tanggal Pembayaran:
                                    {{ $payment->payment_datetime }}</p>
                                Status: <p class=" text-gray-600"> {{ ucfirst($payment->status) }}</p>
                            </div>
                        @endforeach
                    @else
                        <h2 class="text-xl font-semibold text-gray-800">Langganan Aktif: </h2>
                        <p class="mt-2 text-gray-600">Belum ada langganan aktif. </p>
                    @endif

                    @if ($pendingPayments->isNotEmpty())
                        <div class="mt-10">
                            <h2 class="text-xl font-semibold text-gray-800">Langganan Menunggu:</h2>
                            @foreach ($pendingPayments as $payment)
                                <div class="mt-4 p-4 border border-gray-300 rounded-lg bg-yellow-100">
                                    <h3 class="text-lg font-semibold text-gray-800">{{ $payment->program_name }}</h3>
                                    <p class="my-2 text-gray-600">Tanggal Pembayaran:
                                        {{ $payment->payment_datetime }}</p>
                                    Status:<p class=" text-yellow-600"> Menunggu Konfirmasi</p>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    @if ($canceledPayments->isNotEmpty())
                        <div class="mt-10">
                            <h2 class="text-xl font-semibold text-gray-800">Langganan Dibatalkan:</h2>
                            @foreach ($canceledPayments as $payment)
                                <div class="mt-4 p-4 border border-gray-300 rounded-lg bg-red-100">
                                    <h3 class="text-lg font-semibold text-gray-800">{{ $payment->program_name }}</h3>
                                    <p class="mt-2 text-gray-600">Tanggal Pembayaran:
                                        {{ $payment->payment_datetime }}</p>
                                    Status: <p class=" text-red-600"> Dibatalkan</p>
                                </div>
                            @endforeach
                        </div>
                    @endif
                @endif
            </div>



            <div id="bootcamp-content" class="text-start hidden">
                <h2 class="text-xl font-semibold text-gray-800">Semua Bootcamp Saya</h2>
                @if ($bootcampPayments->isEmpty())
                    <p class="mt-2 text-gray-600">Hmm, sepertinya kamu belum pernah bergabung bootcamp MySkill. Yuk eksplor
                        bootcamp yang tersedia di MySkill dengan mengklik tombol dibawah.</p>
                    <button class="mt-4 bg-teal-500 text-white px-6 py-2 rounded-lg hover:bg-teal-600">
                        ⚡ Mulai Berlangganan Bootcamp
                    </button>
                @else
                    @php
                        $canceledPayments = $bootcampPayments->filter(function ($payment) {
                            return $payment->status === 'canceled';
                        });

                        $pendingPayments = $bootcampPayments->filter(function ($payment) {
                            return $payment->status === 'pending';
                        });

                        $activePayments = $bootcampPayments->filter(function ($payment) {
                            return $payment->status === 'completed';
                        });
                    @endphp

                    @if ($activePayments->isNotEmpty())
                        <h2 class="text-xl font-semibold text-gray-800">Langganan Aktif:</h2>
                        @foreach ($activePayments as $payment)
                            <div class="mt-4 p-4 border border-gray-300 rounded-lg">
                                <h3 class="text-lg font-semibold text-gray-800">{{ $payment->program_name }}</h3>
                                <p class="my-2 text-gray-600">Tanggal Pembayaran:
                                    {{ $payment->payment_datetime }}</p>
                                Status: <p class=" text-gray-600"> {{ ucfirst($payment->status) }}</p>
                            </div>
                        @endforeach
                    @else
                        <h2 class="text-xl font-semibold text-gray-800">Langganan Aktif: </h2>
                        <p class="mt-2 text-gray-600">Belum ada langganan aktif. </p>
                    @endif

                    @if ($pendingPayments->isNotEmpty())
                        <div class="mt-10">
                            <h2 class="text-xl font-semibold text-gray-800">Langganan Menunggu:</h2>
                            @foreach ($pendingPayments as $payment)
                                <div class="mt-4 p-4 border border-gray-300 rounded-lg bg-yellow-100">
                                    <h3 class="text-lg font-semibold text-gray-800">{{ $payment->program_name }}</h3>
                                    <p class="my-2 text-gray-600">Tanggal Pembayaran:
                                        {{ $payment->payment_datetime }}</p>
                                    Status:<p class=" text-yellow-600"> Menunggu Konfirmasi</p>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    @if ($canceledPayments->isNotEmpty())
                        <div class="mt-10">
                            <h2 class="text-xl font-semibold text-gray-800">Langganan Dibatalkan:</h2>
                            @foreach ($canceledPayments as $payment)
                                <div class="mt-4 p-4 border border-gray-300 rounded-lg bg-red-100">
                                    <h3 class="text-lg font-semibold text-gray-800">{{ $payment->program_name }}</h3>
                                    <p class="mt-2 text-gray-600">Tanggal Pembayaran:
                                        {{ $payment->payment_datetime }}</p>
                                    Status: <p class=" text-red-600"> Dibatalkan</p>
                                </div>
                            @endforeach
                        </div>
                    @endif
                @endif
            </div>

            <div id="mentoring-content" class="text-start hidden">
                <h2 class="text-xl font-semibold text-gray-800">Semua Mentoring Review CV Saya</h2>
                @if ($reviewPayments->isEmpty())
                    <h2 class="text-xl font-semibold text-gray-800">Oops, sepertinya Kamu Tidak Memiliki Langganan
                        Mentoring
                        Aktif.</h2>
                    <p class="mt-2 text-gray-600">Ayo beli sekarang dan dapatkan review CV dari MySkill!</p>
                    <button class="mt-4 bg-teal-500 text-white px-6 py-2 rounded-lg hover:bg-teal-600">
                        ⚡ Mulai Berlangganan Mentoring
                    </button>
                    <div class="mt-10">
                        <h3 class="text-lg font-semibold text-gray-800">Pembelian Sebelumnya</h3>
                        <p class="mt-2 text-gray-600">Hmm, sepertinya kamu belum pernah berlangganan review CV. Yuk segera
                            berlangganan untuk dapatkan akses untuk review CV MySkill.</p>
                    </div>
                @else
                    @php
                        $canceledPayments = $reviewPayments->filter(function ($payment) {
                            return $payment->status === 'canceled';
                        });

                        $pendingPayments = $reviewPayments->filter(function ($payment) {
                            return $payment->status === 'pending';
                        });

                        $activePayments = $reviewPayments->filter(function ($payment) {
                            return $payment->status === 'completed';
                        });
                    @endphp

                    @if ($activePayments->isNotEmpty())
                        <h2 class="text-xl font-semibold text-gray-800">Langganan Aktif:</h2>
                        @foreach ($activePayments as $payment)
                            <div class="mt-4 p-4 border border-gray-300 rounded-lg">
                                <h3 class="text-lg font-semibold text-gray-800">{{ $payment->program_name }}</h3>
                                <p class="my-2 text-gray-600">Tanggal Pembayaran:
                                    {{ $payment->payment_datetime }}</p>
                                Status: <p class=" text-gray-600"> {{ ucfirst($payment->status) }}</p>
                            </div>
                        @endforeach
                    @else
                        <h2 class="text-xl font-semibold text-gray-800">Langganan Aktif: </h2>
                        <p class="mt-2 text-gray-600">Belum ada langganan aktif. </p>
                    @endif

                    @if ($pendingPayments->isNotEmpty())
                        <div class="mt-10">
                            <h2 class="text-xl font-semibold text-gray-800">Langganan Menunggu:</h2>
                            @foreach ($pendingPayments as $payment)
                                <div class="mt-4 p-4 border border-gray-300 rounded-lg bg-yellow-100">
                                    <h3 class="text-lg font-semibold text-gray-800">{{ $payment->program_name }}</h3>
                                    <p class="my-2 text-gray-600">Tanggal Pembayaran:
                                        {{ $payment->payment_datetime }}</p>
                                    Status:<p class=" text-yellow-600"> Menunggu Konfirmasi</p>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    @if ($canceledPayments->isNotEmpty())
                        <div class="mt-10">
                            <h2 class="text-xl font-semibold text-gray-800">Langganan Dibatalkan:</h2>
                            @foreach ($canceledPayments as $payment)
                                <div class="mt-4 p-4 border border-gray-300 rounded-lg bg-red-100">
                                    <h3 class="text-lg font-semibold text-gray-800">{{ $payment->program_name }}</h3>
                                    <p class="mt-2 text-gray-600">Tanggal Pembayaran:
                                        {{ $payment->payment_datetime }}</p>
                                    Status: <p class=" text-red-600"> Dibatalkan</p>
                                </div>
                            @endforeach
                        </div>
                    @endif
                @endif
            </div>


            <div class="flex justify-end gap-4 mt-6">
                <button class="bg-gray-100 text-gray-500 px-4 py-2 rounded hover:bg-gray-200">
                    &lt; Sebelumnya
                </button>
                <button class="bg-gray-100 text-gray-500 px-4 py-2 rounded hover:bg-gray-200">
                    Selanjutnya &gt;
                </button>
            </div>
        </div>

        <style>
            .underline {
                position: absolute;
                bottom: 0;
                left: 0;
                height: 2px;
                background-color: black;
                transition: left 0.3s, width 0.3s;
            }

            .tab-container {
                position: relative;
            }

            .tab {
                position: relative;
                padding-bottom: 8px;
            }

            .active-tab {
                font-weight: bold;
            }
        </style>

        <script>
            const tabs = document.querySelectorAll('.tab');
            const underline = document.getElementById('underline');
            const contents = {
                'show-elearning': 'elearning-content',
                'show-bootcamp': 'bootcamp-content',
                'show-mentoring': 'mentoring-content'
            };

            function updateUnderline(tab) {
                const tabRect = tab.getBoundingClientRect();
                const containerRect = tab.parentElement.getBoundingClientRect();
                underline.style.width = `${tabRect.width}px`;
                underline.style.left = `${tabRect.left - containerRect.left}px`;
            }

            tabs.forEach(tab => {
                tab.addEventListener('click', function(event) {
                    event.preventDefault();
                    tabs.forEach(t => t.classList.remove('active-tab'));
                    tab.classList.add('active-tab');
                    updateUnderline(tab);

                    Object.keys(contents).forEach(key => {
                        document.getElementById(contents[key]).classList.add('hidden');
                    });
                    document.getElementById(contents[tab.id]).classList.remove('hidden');
                });
            });

            // Initialize underline position
            updateUnderline(document.querySelector('.active-tab'));
        </script>
    </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3" defer></script>
@endsection
