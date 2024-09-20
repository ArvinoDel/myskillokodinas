@extends('./myskill/layouts.main')
@section('container')

<div class="container mx-auto my-10 p-5">
    <h1 class="text-3xl font-bold text-center mb-10">Panduan Pandai Digital</h1>

    <section class="mb-10">
        <h2 class="text-2xl font-bold mb-5">1. Cara Daftar Akun Pandai Digital</h2>
        <p>1. Silakan mengunjungi halaman <a href="/register" class="text-blue-500 underline">Pendaftaran Pandai Digital</a></p>
        <p>2. Masukkan akun e-mail (gmail) yang masih aktif dan password.</p>
        <p>3. Jika pendaftaran berhasil, kamu akan menerima e-mail verifikasi.</p>
    </section>

    <section class="mb-10">
        <h2 class="text-2xl font-bold mb-5">2. Cara Daftar Program dan Pembayaran</h2>
        <ol class="list-decimal list-inside">
            <li>Login ke website <a href="/login" class="text-blue-500 underline">Pandai Digital</a></li>
            <li>Pilih program yang ingin diikuti (E-learning/Bootcamp/Mentoring CV)</li>
            <li>Masukkan kode promo jika ada</li>
            <li>Pilih metode pembayaran, kemudian selesaikan pembayaran di <a href="/e-learning#pricing" class="text-blue-500 underline">Transaksi Saya</a></li>
            <li>Akses produk di bagian <a href="/profile/my-purchase" class="text-blue-500 underline">Pembelian Saya</a></li>
        </ol>

        <h3 class="text-xl font-semibold mt-5">Ketentuan Pembayaran</h3>
        <ul class="list-disc list-inside">
            <li>Virtual account, E-wallet, Alfamart, Indomaret, QRIS</li>
            <li>Kode promo hanya berlaku untuk e-wallet dan QRIS</li>
            <li>Pembayaran berlaku 1x24 jam dari pembuatan invoice</li>
        </ul>
    </section>

    <section class="mb-10">
        <h2 class="text-2xl font-bold mb-5">3. E-Learning</h2>
        <h3 class="text-xl font-semibold">Cara Akses E-learning Setelah Berhasil Bayar</h3>
        <ol class="list-decimal list-inside">
            <li>Login akun Pandai Digital atau klik <a href="/login" class="text-blue-500 underline">E-learning</a></li>
            <li>Pilih salah satu learning path (misalnya Digital Marketing)</li>
            <li>Kerjakan pretest, belajar lewat video, dan kerjakan post test</li>
            <li>Pastikan progres belajar mencapai 100%</li>
        </ol>
        <p class="mt-3 text-red-600 font-semibold">Catatan: Pastikan login menggunakan e-mail yang kamu gunakan untuk pembayaran</p>

        <h3 class="text-xl font-semibold mt-5">Mengatasi Notifikasi "Anda Belum Berlangganan"</h3>
        <p>1. Cek apakah e-mail yang digunakan untuk login sama dengan yang ada di invoice pembayaran.</p>
        <p>2. Jika masalah berlanjut, hubungi support dengan melampirkan bukti pembayaran.</p>

    </section>

    <section class="mb-10">
        <h2 class="text-2xl font-bold mb-5">4. Bootcamp</h2>
        <h3 class="text-xl font-semibold">Cara Akses Bootcamp Setelah Bayar</h3>
        <ol class="list-decimal list-inside">
            <li>Akses bootcamp di <a href="/profile/my-purchase" class="text-blue-500 underline">Pembelian Saya</a></li>
            <li>Bergabung ke grup Telegram sesuai batch bootcamp</li>
            <li>Info pelaksanaan bootcamp akan dikirimkan melalui grup Telegram</li>
        </ol>
    </section>
a
    <section class="mb-10">
        <h2 class="text-2xl font-bold mb-5">5. Short Class</h2>
        <h3 class="text-xl font-semibold">Cara Daftar Kelas Gratis</h3>
        <ol class="list-decimal list-inside">
            <li>Klik <a href="/bootcamp" class="text-blue-500 underline">Bootcamp</a> dan pilih course gratis</li>
            <li>Lengkapi profil, lalu klik "Daftar Sekarang"</li>
            <li>Cek akses kelas gratis di <a href="/bootcamp" class="text-blue-500 underline">Pembelian Saya</a>
            </li>
        </ol>

        <h3 class="text-xl font-semibold mt-5">Cara Akses Kelas Gratis Setelah Daftar</h3>
        <ol class="list-decimal list-inside">
            <li>Gabung ke grup Telegram, link ada di profil</li>
            <li>Upload twibbon di media sosial tidak privat</li>
            <li>Tunggu informasi link Zoom di grup Telegram atau e-mail</li>
        </ol>
    </section>
</div>

@endsection