<footer class="bg-gray-900 py-10 text-white w-screen">
    <div class="container mx-auto">

        <div class="text-center">
            <h2 class="text-xl font-bold">Pandai Digital</h2>
            <p class="mt-2">Mari Kejar Impian Bersama Pandai Digital</p>
            <p class="mt-2">PT. Pandai Digital</p>
            <p>Kota Baru Keandra, Cluster DrosiaF10</p>
            <p>Sumber - Cirebon</p>
            <p class="mt-2">0882002077497</p>
        </div>

        {{-- <div class="ml-36 mt-10 grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left"> --}}
        <div class="mt-10 flex max-sm:flex-col gap-7 justify-around">
            <div class="flex flex-col justify-center max-sm:text-center max-sm:mt-5">
                <h3 class="font-semibold">Pandai Digital</h3>
                <ul class="mt-2 space-y-2">
                    <li><a href="/about" class="hover:underline">Tentang</a></li>
                    <li><a href="/corporate-service" class="hover:underline">Kerjasama</a></li>
                </ul>
            </div>

            <div class="flex flex-col justify-center max-sm:text-center max-sm:mt-5">
                <h3 class="font-semibold">Produk</h3>
                <ul class="mt-2 space-y-2">
                    <li><a href="/e-learning" class="hover:underline">E-learning</a></li>
                    <li><a href="/bootcamp" class="hover:underline">Product & Bootcamp</a></li>
                    <li><a href="/review" class="hover:underline">Review CV</a></li>
                </ul>
            </div>

            <div class="flex flex-col justify-center max-sm:text-center max-sm:mt-5">
                <h3 class="font-semibold">Lainnya</h3>
                <ul class="mt-2 space-y-2">
                    <li><a href="/faq" class="hover:underline">FAQ</a></li>
                    <li><a href="/s&k" class="hover:underline">Syarat & Ketentuan</a></li>
                    <li><a href="/privacy-policy" class="hover:underline">Ketentuan Privasi</a></li>
                </ul>
            </div>
        </div>

        <div class="flex lg:mx-32 lg:justify-start max-lg:justify-center space-x-1 mt-8">
            <!-- Social Media Icons -->
            <a href="#"><img src="https://img.icons8.com/color/38/000000/tiktok--v1.png" alt="TikTok"></a>
            <a href="#"><img src="https://img.icons8.com/color/38/000000/instagram-new--v1.png"
                    alt="Instagram"></a>
            <a href="#"><img src="https://img.icons8.com/color/38/000000/linkedin.png" alt="LinkedIn"></a>
            <a href="#"><img src="https://img.icons8.com/color/38/000000/twitter.png" alt="Twitter"></a>
            <a href="#"><img src="https://img.icons8.com/color/38/000000/youtube-play.png" alt="YouTube"></a>
        </div>

        <div class="mt-8">
            <p class="flex lg:mx-32 lg:justify-start max-lg:justify-center">Metode Pembayaran</p>
            <div class="flex lg:mx-32 lg:justify-start max-lg:justify-center space-x-1 mt-2">
                <!-- Payment Method Icons -->
                @foreach ($metod as $pay)
                <img src="{{ asset('foto_metode/' . $pay->gambar) }}" class="max-w-12 mx-3" alt="Bank">
                @endforeach
                <!-- Add more payment icons as needed -->
            </div>
        </div>

        <p class="mt-8 text-center">&copy; 2024 - 2025. All rights reserved</p>
    </div>
</footer>