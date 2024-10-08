<!-- resources/views/components/navbar.blade.php -->
<nav class="bg-orange-500 border-b border-gray-200 dark:bg-gray-900 dark:border-gray-700">
    <div class="w-full max-w-screen-xl flex flex-wrap items-center justify-between mx-auto py-3 px-6">
        <div class="flex items-center gap-2">
            <!-- Hamburger Menu -->
            <button data-collapse-toggle="navbar-user" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg hover:bg-white hover:text-orange-500 md:hidden focus:outline-none focus:ring-2 focus:ring-gray-200 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-user" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>

            <!-- Logo -->
            <a href="" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">Flowbite</span>
            </a>
        </div>

        <!-- User and Dark Mode Buttons Jadi di atas -->
        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <!-- Dark Mode Button -->
            <button id="theme-toggle" type="button"
                class="mx-3 text-gray-900 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                </svg>
                <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                        fill-rule="evenodd" clip-rule="evenodd"></path>
                </svg>
            </button>

            @auth('mahasiswa')
                <!-- User Mode Button -->
                <button type="button"
                    class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                    data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full"
                        src="{{ Auth::guard('mahasiswa')->user()->profile_photo_url ?? '/docs/images/people/profile-picture-3.jpg' }}"
                        alt="user photo">
                </button>
                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                    id="user-dropdown">
                    <div class="px-4 py-3">
                        <span class="block text-sm text-white">{{ Auth::guard('mahasiswa')->user()->name }}</span>
                        <span
                            class="block text-sm text-gray-500 truncate dark:text-gray-400">{{ Auth::guard('mahasiswa')->user()->email }}</span>
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <li>
                            <form method="POST" action="{{ route('mahasiswa.logout') }}">
                                @csrf
                                <a href="{{ route('mahasiswa.logout') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    Sign out
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <!-- User Mode Button -->
                <button type="button"
                    class="flex p-1 text-sm border text-white bg-transparent border-white dark:text-blue-500 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                    data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    <x-heroicon-o-user class="h-7 rounded-full" />
                </button>
                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                    id="user-dropdown">
                    <div class="px-4 py-3 space-y-2 rounded-lg">
                        <a href="/admin/login"
                            class="block border border-transparent p-1 text-sm rounded-lg text-gray-500 truncate dark:text-gray-400 hover:border-gray-400">Dosen</a>
                        <a href="{{ route('mahasiswa.login') }}"
                            class="block border border-transparent p-1 text-sm rounded-lg text-gray-500 truncate dark:text-gray-400 hover:border-gray-400">Mahasiswa</a>
                    </div>
                </div>
            @endauth
        </div>

        <div class="items-start whitespace-nowrap text-white font-bold justify-between hidden w-full mt-1 mx-2 md:flex md:flex-auto md:ml-10 md:w-auto md:order-1"
            id="navbar-user">
            <ul
                class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-orange-500 md:space-x-4 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-orange-500 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                {{-- <x-nav-link href="/belajar" :active="request()->is('belajar')">Belajar</x-nav-link> --}}
                <x-nav-link href="/belajars" :active="request()->is('belajars')">Belajar</x-nav-link>
                {{-- <x-nav-link href="/tester" :active="request()->is('tester')">Tester</x-nav-link> --}}
                {{-- <a href="{{ route('categories') }}" class="text-xl text-blue-500 hover:underline">Pilih Kategori</a> --}}
            </ul>
        </div>
    </div>
</nav>
