@extends('./myskill/layouts.main')
@section('container')
    <section class="py-10 bg-white">
        <div class="container mx-auto px-4">

            <!-- Header Section -->
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center md:-mt-20">
                <div class="flex items-center space-x-4">
                    <div class="flex items-center w-full h-full">
                        <video controls class="w-full h-full rounded-xl" controlsList="nodownload" disablePictureInPicture>
                            <source src="{{ asset('preview_video/lv_7299370342382865671_20231214115434.mp4') }}"
                                type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>

                
                <div class="p-6 rounded-lg shadow-lg mt-20">
                    <h3 class="font-bold ">Video Lainnya</h3>
                    <div class="flex items-center w-72 my-5">
                        <a href="{{ asset('preview_video/1720101974242.jpg') }}" class="grid grid-flow-col gap-2" target="_blank">
                            <img src="{{ asset('preview_video/1720101974242.jpg') }}" class="w-40 rounded-lg" alt="Video Preview">
                            <div class="grid grid-flow-row">
                                <h3 class="font-semibold text-md truncate">Subtest Literasi Dalam Testing</h3>
                                <h3 class="truncate">-</h3>
                                <h3>14 Hari Lalu</h3>
                            </div>
                        </a>
                    </div>
                    <div class="flex items-center w-72 my-5">
                        <a href="{{ asset('preview_video/1720101974242.jpg') }}" class="grid grid-flow-col gap-2" target="_blank">
                            <img src="{{ asset('preview_video/1720101974242.jpg') }}" class="w-40 rounded-lg" alt="Video Preview">
                            <div class="grid grid-flow-row">
                                <h3 class="font-semibold text-md truncate">Subtest Literasi Dalam Testing</h3>
                                <h3 class="truncate">-</h3>
                                <h3>14 Hari Lalu</h3>
                            </div>
                        </a>
                    </div>
                    <div class="flex items-center w-72 my-5">
                        <a href="{{ asset('preview_video/1720101974242.jpg') }}" class="grid grid-flow-col gap-2" target="_blank">
                            <img src="{{ asset('preview_video/1720101974242.jpg') }}" class="w-40 rounded-lg" alt="Video Preview">
                            <div class="grid grid-flow-row">
                                <h3 class="font-semibold text-md truncate">Subtest Literasi Dalam Testing</h3>
                                <h3 class="truncate">-</h3>
                                <h3>20 Hari Lalu</h3>
                            </div>
                        </a>
                    </div>
                    <div class="flex items-center w-72 my-5">
                        <a href="{{ asset('preview_video/1720101974242.jpg') }}" class="grid grid-flow-col gap-2" target="_blank">
                            <img src="{{ asset('preview_video/1720101974242.jpg') }}" class="w-40 rounded-lg" alt="Video Preview">
                            <div class="grid grid-flow-row">
                                <h3 class="font-semibold text-md truncate">Subtest Literasi Dalam Testing</h3>
                                <h3 class="truncate">-</h3>
                                <h3>20 Hari Lalu</h3>
                            </div>
                        </a>
                    </div>
                    <div class="flex items-center w-72 my-5">
                        <a href="{{ asset('preview_video/1720101974242.jpg') }}" class="grid grid-flow-col gap-2" target="_blank">
                            <img src="{{ asset('preview_video/1720101974242.jpg') }}" class="w-40 rounded-lg" alt="Video Preview">
                            <div class="grid grid-flow-row">
                                <h3 class="font-semibold text-md truncate">Subtest Literasi Dalam Testing</h3>
                                <h3 class="truncate">-</h3>
                                <h3>20 Hari Lalu</h3>
                            </div>
                        </a>
                    </div>
                    <div class="flex items-center w-72 my-5">
                        <a href="{{ asset('preview_video/1720101974242.jpg') }}" class="grid grid-flow-col gap-2" target="_blank">
                            <img src="{{ asset('preview_video/1720101974242.jpg') }}" class="w-40 rounded-lg" alt="Video Preview">
                            <div class="grid grid-flow-row">
                                <h3 class="font-semibold text-md truncate">Subtest Literasi Dalam Testing</h3>
                                <h3 class="truncate">-</h3>
                                <h3>20 Hari Lalu</h3>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Content Section -->
            <div class="">
                <h3 class="text-2xl font-bold">Subtest Kemampuan Memahami Bacaan dan Menulis</h3>
                <p class="text-sm text-gray-600 mt-4">Diunggah pada 3 Oktober 2024</p>

                <!-- Questions list -->
                <div class="mt-4">
                    <ol class="list-decimal list-inside space-y-2 text-sm text-gray-700">
                        <li>Penulisan huruf
                            <ul class="list-disc list-inside ml-6">
                                <li>Mencari penulisan huruf yang tepat di dalam judul</li>
                                <li>Mencari penulisan huruf yang tepat pada sebuah frasa</li>
                            </ul>
                        </li>
                        <li>Penulisan kata tidak baku</li>
                        <li>Kata rujukan</li>
                        <li>Kalimat efektif</li>
                        <!-- Add more list items as needed -->
                    </ol>
                </div>
            </div>

        </div>
    </section>
@endsection
