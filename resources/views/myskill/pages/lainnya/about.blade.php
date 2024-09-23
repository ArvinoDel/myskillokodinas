@extends('./myskill/layouts.main')
@section('container')

<div class="bg-black text-white p-6 w-screen">
    <div class="mx-auto">
        <h1 class="text-4xl font-bold mb-4">TENTANG PANDAI DIGITAL</h1>
        <p class="text-lg mb-6">
            Pandai Digital adalah platform pengembangan skill profesional dengan lebih dari 1 juta pengguna
            se-Indonesia. Pandai Digital percaya bahwa:
        </p>
        <blockquote class="text-orange-400 font-semibold text-2xl mb-8">
            "PENDIDIKAN DAN PEKERJAAN YANG LAYAK ADALAH HAK BAGI SETIAP RAKYAT INDONESIA."
        </blockquote>
        <blockquote class="text-lg font-semibold mb-2 text-center sm:break-words md:break-words">Pandai Digital telah menjadi bagian dari</blockquote>

        <div class="overflow-x-hidden">
            <div class="flex flex-wrap gap-4 mb-10 w-screen">
                <div class="flex-1 ">
                    <div class="flex gap-4 items-center bg-orange-100 justify-center">
                        <img loading="lazy" src="{{ asset('./foto_metode/startup.svg') }}" alt="Startup Studio"
                            class="lg:w-40 max-sm:w-16 md:w-30  rounded-lg object-cover lg:p-6">
                        <img loading="lazy" src="{{ asset('./foto_metode/techinasia.svg') }}" alt="TECHINASIA"
                            class="lg:w-40 max-sm:w-16 md:w-30 rounded-lg object-cover lg:p-6">
                        <img loading="lazy" src="{{ asset('./foto_metode/technode.svg') }}" alt="Technode global"
                            class="lg:w-40 max-sm:w-16 md:w-30 rounded-lg object-cover lg:p-6 max-sm:mr-8">
                    </div>
                </div>
            </div>
        </div>

        <h2 class="text-lg sm:text-xl font-semibold mb-4 text-center">Co-founders dari Pandai Digital:</h2>
        <div class="text-center">
            <div class="flex justify-center gap-4 flex-wrap">
                <div
                    class="bg-gradient-to-r from-teal-400 via-blue-500 to-purple-500 p-4 sm:p-6 md:p-8 rounded-2xl text-white text-center max-w-xs">
                    <img loading="lazy" src="{{ asset('foto_trainer/mentors3.webp') }}" alt="Angga" class="w-20 h-20 sm:w-24 sm:h-24 rounded-full mx-auto mb-4">
                    <p class="font-semibold">Angga</p>
                    <p>Pandai Digital</p>
                </div>
                <div
                    class="bg-gradient-to-r from-teal-400 via-blue-500 to-purple-500 p-4 sm:p-6 md:p-8 rounded-2xl text-white text-center max-w-xs">
                    <img loading="lazy" src="{{ asset('foto_trainer/mentors5.webp') }}" alt="Erahmat" class="w-20 h-20 sm:w-24 sm:h-24 rounded-full mx-auto mb-4">
                    <p class="font-semibold">Erahmat</p>
                    <p>Pandai Digital</p>
                </div>
            </div>
        </div>
    </div>


    @endsection