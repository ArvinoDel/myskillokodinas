<nav id="navbar"
    class="sticky top-0 px-8 flex justify-between items-center bg-orange-400 z-10 w-screen transition-all duration-300 ease-in-out">
    <a class="text-2xl font-bold leading-none" href="#">
        <img class="max-w-20 max-sm:mx-0 max-md:w-20 mx-10 h-auto" src="{{ asset('assets/logo.png') }}" alt="logo-company">
    </a>
    <div class="lg:hidden">
        <button class="navbar-burger flex items-center p-3 focus:outline-none hover:text-white focus:text-gray-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                    clip-rule="evenodd" />
            </svg>
        </button>
    </div>
    <ul
        class="hidden absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:mx-auto lg:flex lg:items-center lg:w-auto lg:space-x-5">
        <li>
            <a href="/home"
                class="text-nowrap {{ request()->is('home') ? 'text-teal-400 before:scale-x-100' : 'text-black before:scale-x-0' }} text-sm lg:text-md font-medium hover:text-teal-400 relative px-2 py-2 rounded transition-all duration-300 before:absolute before:bottom-0 before:left-0 before:w-full before:h-0.5 before:bg-teal-400 before:scale-x-0 hover:before:scale-x-100 focus:outline-none focus:ring-0 active:text-teal-400 active:before:bg-teal-400">
                Home
            </a>
        </li>
        <li>
            <a href="/e-learning"
                class="text-nowrap {{ request()->is('e-learning') ? 'text-teal-400 before:scale-x-100' : 'text-black before:scale-x-0' }}  text-xs lg:text-md font-medium hover:text-teal-400 relative px-2 py-2 rounded transition-all duration-300 before:absolute before:bottom-0 before:left-0 before:w-full before:h-0.5 before:bg-teal-400 before:scale-x-0 hover:before:scale-x-100 focus:outline-none focus:ring-0 active:text-teal-400 active:before:bg-teal-400">
                E-Learning
            </a>
        </li>
        <li>
            <a href="/bootcamp"
                class="text-nowrap {{ request()->is('bootcamp') ? 'text-teal-400 before:scale-x-100' : 'text-black before:scale-x-0' }} text-xs lg:text-md font-medium relative px-2 py-2 rounded transition-all duration-300 before:absolute before:bottom-0 before:left-0 before:w-full before:h-0.5 before:bg-teal-400 hover:text-teal-400 hover:before:scale-x-100 focus:outline-none focus:ring-0">
                Program & Bootcamp
            </a>
        </li>
        <li>
            <a href="/review"
                class="text-nowrap {{ request()->is('review') ? 'text-teal-400 before:scale-x-100' : 'text-black before:scale-x-0' }} text-xs lg:text-md font-medium hover:text-teal-400 relative px-2 py-2 rounded transition-all duration-300 before:absolute before:bottom-0 before:left-0 before:w-full before:h-0.5 before:bg-teal-400 before:scale-x-0 hover:before:scale-x-100 focus:outline-none focus:ring-0 active:text-teal-400 active:before:bg-teal-400">
                Review CV
            </a>
        </li>
        <li>
            <a href="/corporate-service"
                class="text-nowrap {{ request()->is('corporate-service') ? 'text-teal-400 before:scale-x-100' : 'text-black before:scale-x-0' }} lg:text-md text-xs font-medium hover:text-teal-400 relative px-2 py-2 rounded transition-all duration-300 before:absolute before:bottom-0 before:left-0 before:w-full before:h-0.5 before:bg-teal-400 before:scale-x-0 hover:before:scale-x-100 focus:outline-none focus:ring-0 active:text-teal-400 active:before:bg-teal-400">
                Corporate Service
            </a>
        </li>
        <li>
            <a href="/company-profile"
                class="text-nowrap {{ request()->is('company-profile') ? 'text-teal-400 before:scale-x-100' : 'text-black before:scale-x-0' }} lg:text-md text-xs font-medium hover:text-teal-400 relative px-2 py-2 rounded transition-all duration-300 before:absolute before:bottom-0 before:left-0 before:w-full before:h-0.5 before:bg-teal-400 before:scale-x-0 hover:before:scale-x-100 focus:outline-none focus:ring-0 active:text-teal-400 active:before:bg-teal-400">
                Company Profile
            </a>
        </li>
    </ul>
    <div class="max-md:hidden lg:block space-x-2 justify-items-end mt-1.5">
        @if (Auth::check())
            <div class="bg-transparent flex justify-center items-center mx-5">
                <div x-data="{ open: false }" class="bg-transparent w-40 flex justify-center items-center">
                    <div @click="open = !open" class="relative py-1"
                        :class="{ 'border-indigo-700 transform transition duration-300 ': open }"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100">
                        <div class="flex justify-center items-center space-x-3 cursor-pointer">
                            <div class="w-12 h-12 rounded-full overflow-hidden border-2 border-gray-900">
                                <img src="https://images.unsplash.com/photo-1610397095767-84a5b4736cbd?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80"
                                    alt="" class="w-full h-full object-cover">
                            </div>
                            <div class="font-semibold text-gray-900 text-lg">

                                <div class="cursor-pointer"> {{ Auth::user()->username }}</div>
                            </div>
                        </div>
                        <div x-show="open" x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute w-40 px-5 py-3 rounded-lg bg-white shadow border dark:border-transparent mt-5">
                            <ul class="space-y-3">
                                <li class="font-medium">
                                    <a href="/my-profile"
                                        class="flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-indigo-700">
                                        <div class="mr-3">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                </path>
                                            </svg>
                                        </div>
                                        Account
                                    </a>
                                </li>
                                <li class="font-medium">
                                    <a href="#"
                                        class="flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-indigo-700">
                                        <div class="mr-3">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                                </path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                        </div>
                                        Setting
                                    </a>
                                </li>
                                <hr class="dark:border-gray-700">
                                <li class="font-medium">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); this.closest('form').submit();"
                                            class="flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-red-600">
                                            <div class="mr-3 text-red-600">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                                    </path>
                                                </svg>
                                            </div>
                                            Logout
                                        </a>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <a href="/login">
                <button type="button"
                    class="text-pink-500 hover:text-white border border-pink-500 hover:bg-pink-500 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-sm px-6 py-2 text-center me-2 mb-2 dark:border-pink-300 dark:hover:text-white dark:hover:bg-pink-400 dark:focus:ring-pink-900">Login</button>

            </a>
            <a href="/register">
                <button type="button"
                    class="focus:outline-none text-white bg-pink-500 hover:bg-pink-600 focus:ring-4 focus:ring-pink-300 font-medium rounded-lg text-sm px-6 py-2 me-2 mb-2 dark:bg-pink-600 dark:hover:bg-pink-600 dark:focus:ring-pink-500">Sign
                    Up</button>
            </a>
        @endif
    </div>
</nav>
<div class="navbar-menu relative z-50 hidden">
    <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
    <nav
        class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white bg-opacity-75 border-r border-white border-opacity-50 shadow-lg backdrop-blur-lg">
        <div class="flex items-center mb-8">
            <a class="mr-auto text-3xl font-bold leading-none hover:text-green-600" href="#">
                <img class="w-20" src="{{ asset('assets/logo.png') }}" alt="logo-company">
            </a>
            <button class="navbar-close focus:outline-none">
                <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-green-500 "
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>
        <div>
            <div>
                <ul>
                    <li class="mb-1 inline-flex group rounded w-full">
                        <div
                            class="flex w-1 scale-y-0 transition-transform origin-top rounded-full duration-400 ease-in">
                        </div>
                        <a class="flex p-4 text-sm font-semibold {{ request()->is('home') ? 'text-teal-400' : 'text-black' }}"
                            href="/home">Home</a>
                    </li>
                    <li class="mb-1 inline-flex group rounded w-full">
                        <div
                            class="flex w-1 group0 scale-y-0 transition-transform origin-top rounded-full duration-400 ease-in">
                        </div>
                        <a class="block p-4 text-sm font-semibold {{ request()->is('e-learning') ? 'text-teal-400' : 'text-black' }}"
                            href="/e-learning">E-learning</a>
                    </li>
                    <li class="mb-1 inline-flex group rounded w-full">
                        <div
                            class="flex w-1 group0 scale-y-0 transition-transform origin-top rounded-full duration-400 ease-in">
                        </div>
                        <a class="block p-4 text-sm font-semibold {{ request()->is('bootcamp') ? 'text-teal-400' : 'text-black' }}"
                            href="/bootcamp">Program & Bootcamp</a>
                    </li>
                    <li class="mb-1 inline-flex group rounded w-full">
                        <div
                            class="flex w-1 group0 scale-y-0 transition-transform origin-top rounded-full duration-400 ease-in">
                        </div>
                        <a class="block p-4 text-sm font-semibold {{ request()->is('review') ? 'text-teal-400' : 'text-black' }}"
                            href="/review">Review CV</a>
                    </li>
                    <li class="mb-1 inline-flex group rounded w-full">
                        <div
                            class="flex w-1 scale-y-0 transition-transform origin-top rounded-full duration-400 ease-in">
                        </div>
                        <a class="block p-4 text-sm font-semibold {{ request()->is('corporate-service') ? 'text-teal-400' : 'text-black' }}"
                            href="/corporate-service">Corporate
                            Service</a>
                    </li>
                    <li class="mb-1 inline-flex group rounded w-full">
                        <div
                            class="flex w-1 scale-y-0 transition-transform origin-top rounded-full duration-400 ease-in">
                        </div>
                        <a class="block p-4 text-sm font-semibold {{ request()->is('company-profile') ? 'text-teal-400' : 'text-black' }}"
                            href="/company-profile">Company Profile</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="mt-auto flex justify-between">
            @if (Auth::check())
                <div class="bg-transparent flex justify-center items-center my-5 mx-5">
                    <a href="/my-profile">
                        <div class="flex justify-center items-center space-x-3 cursor-pointer">
                            <div class="w-12 h-12 rounded-full overflow-hidden border-2 border-gray-900">
                                <img src="https://images.unsplash.com/photo-1610397095767-84a5b4736cbd?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80"
                                    alt="" class="w-full h-full object-cover">
                            </div>
                        </div>
                    </a>
                </div>


                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                        <button
                            class="group flex items-center justify-start mt-5 w-11 h-11 bg-red-600 rounded-full cursor-pointer relative overflow-hidden transition-all duration-200 shadow-lg hover:w-32 hover:rounded-lg active:translate-x-1 active:translate-y-1">
                            <div
                                class="flex items-center justify-center w-full transition-all duration-300 group-hover:justify-start group-hover:px-3">
                                <svg class="w-4 h-4" viewBox="0 0 512 512" fill="white">
                                    <path
                                        d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z">
                                    </path>
                                </svg>
                            </div>
                            <div
                                class="absolute right-5 transform translate-x-full opacity-0 text-white text-lg font-semibold transition-all duration-300 group-hover:translate-x-0 group-hover:opacity-100">
                                Logout
                            </div>
                        </button>
                    </a>
                </form>
            @else
                <a href="/login" type="button"
                    class="text-pink-500 hover:text-pink-500 border border-pink-400 hover:bg-pink-500 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-sm px-6 py-2 text-center me-2 mb-2 dark:border-pink-300">
                    Login
                </a>
                <a href="/register" type="button"
                    class="focus:outline-none text-white bg-pink-500 hover:bg-pink-600 focus:ring-4 focus:ring-pink-300 font-medium rounded-lg text-sm px-6 py-2 me-2 mb-2">
                    Sign Up
                </a>
            @endif
        </div>

    </nav>
</div>
