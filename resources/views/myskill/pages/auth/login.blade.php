<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Pandai Digital</title>
    @vite('./resources/css/appskill.css')
</head>

<body>
    <div class="flex w-full mt-5 mx-auto overflow-hidden bg-white rounded-lg lg:max-w-4xl">
        <div class="hidden lg:flex ms-10 lg:w-1/2 items-center justify-center image-container">
            <img class="w-full h-full object-contain" src="{{ asset('assets/login.svg') }}">
        </div>
        <div class="w-full px-6 py-8 md:mx-24 lg:w-1/2">
            <p class="mt-3 text-xl text-start text-gray-900 font-bold :text-gray-200">
                Masuk ke Pandai Digital
            </p>

            <p class="mt-1 text-sm text-start text-gray-600 :text-gray-200">
                Silahkan Masukkan Informasi Akun Kamu
            </p>

            <p class="mt-6 text-md text-start text-gray-900 :text-gray-200">
                Belum memiliki akun? <a href="/register"
                    class="bg-clip-text text-transparent bg-gradient-to-r from-orange-500 to-pink-500">Daftar
                    Sekarang</a>
            </p>

            <div class="mt-6">
                <label class="block mb-2 text-sm font-medium text-gray-600" for="LoggingEmailAddress">Email
                    Address</label>
                <input id="LoggingEmailAddress"
                    class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-lg focus:border-blue-400 focus:ring-opacity-40 focus:outline-none focus:ring focus:ring-blue-300"
                    type="email" />
            </div>

            <div class="mt-4">
                <div class="flex justify-between">
                    <label class="block mb-2 text-sm font-medium text-gray-600" for="loggingPassword">Password</label>
                    <a href="#" class="text-xs hover:underline">Forget Password?</a>
                </div>

                <input id="loggingPassword"
                    class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-lg focus:border-blue-400 focus:ring-opacity-40 focus:outline-none focus:ring focus:ring-blue-300"
                    type="password" />
            </div>


            <div class="mt-5 inline-flex items-center">
                <label class="relative flex items-center p-3 rounded-full cursor-pointer" htmlFor="check">
                    <input type="checkbox"
                        class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-md border border-blue-gray-200 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-gray-900 checked:bg-gray-900 checked:before:bg-gray-900 hover:before:opacity-10"
                        id="check" />
                    <span
                        class="absolute text-white transition-opacity opacity-0 pointer-events-none top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 peer-checked:opacity-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20"
                            fill="currentColor" stroke="currentColor" stroke-width="1">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </span>
                </label>
                <label class="mt-px text-sm font-light text-gray-700 cursor-pointer select-none" htmlFor="check">
                    Ingat Saya
                </label>
            </div>

            <div class="mt-1">
                <button
                    class="w-full px-6 py-3 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-gradient-to-r from-pink-400 to-orange-400 rounded-lg hover:from-pink-500 hover:to-orange-500 focus:outline-none focus:ring focus:ring-gray-300 focus:ring-opacity-50">
                    Sign In
                </button>
            </div>

            <div class="flex items-center justify-between mt-4">
                <span class="w-1/5 border-b lg:w-1/4"></span>
                <a href="#" class="text-xs text-center uppercase :text-gray-400 hover:underline">or login
                    with Google</a>
                <span class="w-1/5 border-b :border-gray-400 lg:w-1/4"></span>
            </div>

            <a href="#"
                class="flex items-center justify-center mt-4 text-gray-600 transition-colors duration-300 transform border rounded-lg  ">
                <div class="px-4 py-2">
                    <svg class="w-6 h-6" viewBox="0 0 40 40">
                        <path
                            d="M36.3425 16.7358H35V16.6667H20V23.3333H29.4192C28.045 27.2142 24.3525 30 20 30C14.4775 30 10 25.5225 10 20C10 14.4775 14.4775 9.99999 20 9.99999C22.5492 9.99999 24.8683 10.9617 26.6342 12.5325L31.3483 7.81833C28.3717 5.04416 24.39 3.33333 20 3.33333C10.7958 3.33333 3.33335 10.7958 3.33335 20C3.33335 29.2042 10.7958 36.6667 20 36.6667C29.2042 36.6667 36.6667 29.2042 36.6667 20C36.6667 18.8825 36.5517 17.7917 36.3425 16.7358Z"
                            fill="#FFC107" />
                        <path
                            d="M5.25497 12.2425L10.7308 16.2583C12.2125 12.59 15.8008 9.99999 20 9.99999C22.5491 9.99999 24.8683 10.9617 26.6341 12.5325L31.3483 7.81833C28.3716 5.04416 24.39 3.33333 20 3.33333C13.5983 3.33333 8.04663 6.94749 5.25497 12.2425Z"
                            fill="#FF3D00" />
                        <path
                            d="M20 36.6667C24.305 36.6667 28.2167 35.0192 31.1742 32.34L26.0159 27.975C24.3425 29.2425 22.2625 30 20 30C15.665 30 11.9842 27.2359 10.5975 23.3784L5.16254 27.5659C7.92087 32.9634 13.5225 36.6667 20 36.6667Z"
                            fill="#4CAF50" />
                        <path
                            d="M36.3425 16.7358H35V16.6667H20V23.3333H29.4192C28.7592 25.1975 27.56 26.805 26.0133 27.9758C26.0142 27.975 26.015 27.975 26.0158 27.9742L31.1742 32.3392C30.8092 32.6708 36.6667 28.3333 36.6667 20C36.6667 18.8825 36.5517 17.7917 36.3425 16.7358Z"
                            fill="#1976D2" />
                    </svg>
                </div>
                <span class="w-5/6 px-4 py-3 font-bold text-center">Sign in with Google</span>
            </a>
        </div>
    </div>
</body>

</html>