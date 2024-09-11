<nav id="navbar"
    class="sticky top-0 px-8 flex justify-between items-center bg-orange-400 z-10 w-screen transition-all duration-300 ease-in-out">
    <a class="text-2xl font-bold leading-none" href="#">
        <img class="max-w-20 max-md:w-20 mx-10 h-auto" src="{{ asset('assets/logo.png') }}" alt="logo-company">
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
    <div class="max- hidden lg:block space-x-2 justify-items-end mt-1.5">
        <a href="/login">
            <button type="button"
                class="text-pink-500 hover:text-white border border-pink-500 hover:bg-pink-500 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-sm px-6 py-2 text-center me-2 mb-2 dark:border-pink-300 dark:hover:text-white dark:hover:bg-pink-400 dark:focus:ring-pink-900">Login</button>

        </a>
        <a href="/register">
            <button type="button"
                class="focus:outline-none text-white bg-pink-500 hover:bg-pink-600 focus:ring-4 focus:ring-pink-300 font-medium rounded-lg text-sm px-6 py-2 me-2 mb-2 dark:bg-pink-600 dark:hover:bg-pink-600 dark:focus:ring-pink-500">Sign
                Up</button>
        </a>
    </div>
</nav>
<div class="navbar-menu relative z-50 hidden">
    <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
    <nav
        class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white bg-opacity-75 border-r border-white border-opacity-50 shadow-lg backdrop-blur-lg">
        <div class="flex items-center mb-8">
            <a class="mr-auto text-3xl font-bold leading-none hover:text-green-600" href="#">
                <img class="w-23" src="{{ asset('assets/logo-company.svg') }}" alt="logo-company">
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
                        <a class="flex p-4 text-sm font-semibold {{ request()->is('home') ? 'text-teal-400' : 'text-black' }}" href="/home">Home</a>
                    </li>
                    <li class="mb-1 inline-flex group rounded w-full">
                        <div
                            class="flex w-1 group0 scale-y-0 transition-transform origin-top rounded-full duration-400 ease-in">
                        </div>
                        <a class="block p-4 text-sm font-semibold {{ request()->is('e-learning') ? 'text-teal-400' : 'text-black' }}" href="/e-learning">E-learning</a>
                    </li>
                    <li class="mb-1 inline-flex group rounded w-full">
                        <div
                            class="flex w-1 group0 scale-y-0 transition-transform origin-top rounded-full duration-400 ease-in">
                        </div>
                        <a class="block p-4 text-sm font-semibold {{ request()->is('bootcamp') ? 'text-teal-400' : 'text-black' }}" href="/bootcamp">Program & Bootcamp</a>
                    </li>
                    <li class="mb-1 inline-flex group rounded w-full">
                        <div
                            class="flex w-1 group0 scale-y-0 transition-transform origin-top rounded-full duration-400 ease-in">
                        </div>
                        <a class="block p-4 text-sm font-semibold {{ request()->is('review') ? 'text-teal-400' : 'text-black' }}" href="/review">Review CV</a>
                    </li>
                    <li class="mb-1 inline-flex group rounded w-full">
                        <div
                            class="flex w-1 scale-y-0 transition-transform origin-top rounded-full duration-400 ease-in">
                        </div>
                        <a class="block p-4 text-sm font-semibold {{ request()->is('corporate-service') ? 'text-teal-400' : 'text-black' }}" href="/corporate-service">Corporate
                            Service</a>
                    </li>
                    <li class="mb-1 inline-flex group rounded w-full">
                        <div
                            class="flex w-1 scale-y-0 transition-transform origin-top rounded-full duration-400 ease-in">
                        </div>
                        <a class="block p-4 text-sm font-semibold {{ request()->is('company-profile') ? 'text-teal-400' : 'text-black' }}" href="/company-profile">Company Profile</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="mt-auto flex justify-end">
            <a href="/login" type="button"
                class="text-pink-500 hover:text-pink-500 border border-pink-400 hover:bg-pink-500 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-sm px-6 py-2 text-center me-2 mb-2 dark:border-pink-300">
                Login
            </a>
            <a href="/register" type="button"
                class="focus:outline-none text-white bg-pink-500 hover:bg-pink-600 focus:ring-4 focus:ring-pink-300 font-medium rounded-lg text-sm px-6 py-2 me-2 mb-2">
                Sign Up
            </a>
        </div>

    </nav>
</div>
