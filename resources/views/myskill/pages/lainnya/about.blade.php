@extends('./myskill/layouts.main')
@section('container')

@section('container')
<div class="bg-black text-white p-8">
    <div class="max-w-7xl mx-auto">
        <h1 class="text-4xl font-bold mb-4">TENTANG PANDAI DIGITAL</h1>
        <p class="text-lg mb-6">
            Pandai Digital adalah platform pengembangan skill profesional dengan lebih dari 1 juta pengguna se-Indonesia. Pandai Digital percaya bahwa:
        </p>
        <blockquote class="text-orange-400 font-semibold text-lg mb-8">
            "PENDIDIKAN DAN PEKERJAAN YANG LAYAK ADALAH HAK BAGI SETIAP RAKYAT INDONESIA."
        </blockquote>

        <div class="flex flex-wrap gap-6 mb-10">
            <div class="flex-1">
                <h2 class="text-xl font-semibold mb-2">Pandai Digital telah menjadi bagian dari</h2>
                <div class="flex gap-4 items-center">
                    <img src="/path/to/linkedin-top-startup.png" alt="LinkedIn Top Startup" class="w-20 h-20 rounded-full">
                    <img src="/path/to/aws-edstart.png" alt="AWS EdStart Member" class="w-20 h-20 rounded-full">
                    <img src="/path/to/partner-logo.png" alt="Partner Logo" class="w-20 h-20 rounded-full">
                </div>
            </div>
            <div class="flex-1">
                <h2 class="text-xl font-semibold mb-2">Struktur Organisasi Pandai Digital</h2>
                <div class="flex gap-4 justify-center">
                    <div class="bg-gradient-to-r from-purple-400 via-pink-500 to-red-500 p-6 rounded-full text-center">
                        <span class="block text-white font-semibold">Founders</span>
                    </div>
                    <div class="bg-gradient-to-r from-purple-400 via-pink-500 to-red-500 p-6 rounded-full text-center">
                        <span class="block text-white font-semibold">Finance & HR</span>
                    </div>
                    <div class="bg-gradient-to-r from-purple-400 via-pink-500 to-red-500 p-6 rounded-full text-center">
                        <span class="block text-white font-semibold">Tech & Product</span>
                    </div>
                    <div class="bg-gradient-to-r from-purple-400 via-pink-500 to-red-500 p-6 rounded-full text-center">
                        <span class="block text-white font-semibold">Program & Marketing</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center">
            <h2 class="text-xl font-semibold mb-4">Co-founders dari Pandai Digital:</h2>
            <div class="flex justify-center gap-6">
                <div class="bg-gradient-to-r from-teal-400 via-blue-500 to-purple-500 p-8 rounded-2xl text-white text-center">
                    <img src="/path/to/angga-photo.png" alt="Angga" class="w-24 h-24 rounded-full mx-auto mb-4">
                    <p class="font-semibold">Angga</p>
                    <p>Pandai Digital</p>
                </div>
                <div class="bg-gradient-to-r from-teal-400 via-blue-500 to-purple-500 p-8 rounded-2xl text-white text-center">
                    <img src="/path/to/erahmat-photo.png" alt="Erahmat" class="w-24 h-24 rounded-full mx-auto mb-4">
                    <p class="font-semibold">Erahmat</p>
                    <p>Pandai Digital</p>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection