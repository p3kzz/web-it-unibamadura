<header class="flex items-center justify-between px-6 py-4 bg-white shadow-sm border-b border-gray-200">
    <div class="flex items-center gap-4">
        {{-- Mobile Menu Toggle --}}
        <button @click="sidebarOpen = true"
            class="text-gray-500 hover:text-gray-700 focus:outline-none lg:hidden transition-colors duration-200">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </button>

        {{-- Page Title --}}
        <div>
            <h2 class="text-xl font-bold text-gray-800">@yield('page-title', 'Dashboard Overview')</h2>
            <p class="text-sm text-gray-500 mt-0.5">@yield('page-subtitle', 'Selamat datang di Admin Panel')</p>
        </div>
    </div>

    <div class="flex items-center gap-4">
        {{-- User --}}
        <div x-data="{ dropdownOpen: false }" class="relative">
            <button @click="dropdownOpen = !dropdownOpen"
                class="flex items-center gap-3 focus:outline-none hover:bg-gray-50 rounded-lg px-2 py-1 transition-colors duration-200">
                <div class="text-right hidden md:block">
                    <p class="text-sm font-bold text-gray-700">Admin TIK</p>
                    <p class="text-xs text-gray-500">Administrator</p>
                </div>
                <img class="w-10 h-10 rounded-full object-cover border-2 border-uniba-blue shadow-sm"
                    src="https://ui-avatars.com/api/?name=Admin+TIK&background=1e3a8a&color=fff" alt="Avatar">
                <svg class="w-4 h-4 text-gray-400 hidden md:block" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>

            <div x-show="dropdownOpen" x-cloak @click.away="dropdownOpen = false"
                x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95"
                class="absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-lg py-2.5 border border-gray-100 z-50">

                <div class="px-4 py-3 border-b border-gray-100">
                    <p class="text-sm font-semibold text-gray-700">Admin TIK</p>
                    <p class="text-xs text-gray-500 mt-0.5">admin@uniba.ac.id</p>
                </div>

                <a href="#"
                    class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-150">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    Profil Saya
                </a>

                <a href="#"
                    class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-150">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                        </path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    Pengaturan
                </a>

                <div class="border-t border-gray-100 my-1"></div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 transition-colors duration-150">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                            </path>
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>
