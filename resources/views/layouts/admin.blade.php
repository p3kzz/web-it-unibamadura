<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - UPT TIK UNIBA</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        uniba: {
                            blue: '#1e3a8a',
                            dark: '#172554',
                            yellow: '#facc15',
                            light: '#eff6ff',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-800" x-data="{ sidebarOpen: false }">

    <div class="flex h-screen overflow-hidden">

        <div x-show="sidebarOpen" @click="sidebarOpen = false"
            x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-20 bg-black bg-opacity-50 lg:hidden"></div>

        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
            class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto transition-duration-300 transform bg-uniba-blue text-white lg:translate-x-0 lg:static lg:inset-0 transition-transform duration-300 ease-in-out shadow-xl flex flex-col">

            <div class="flex items-center justify-center h-20 border-b border-blue-800 bg-uniba-dark">
                <div class="flex items-center gap-3">
                    <div
                        class="w-8 h-8 bg-uniba-yellow rounded-full flex items-center justify-center text-uniba-blue font-bold">
                        A</div>
                    <span class="text-lg font-bold tracking-wider">ADMIN PANEL</span>
                </div>
            </div>

            <nav class="mt-5 flex-1 px-4 space-y-2">

                <p class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Utama</p>

                <a href="#"
                    class="flex items-center px-4 py-3 bg-blue-800 border-l-4 border-uniba-yellow text-white rounded-r-md transition-colors duration-200">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                        </path>
                    </svg>
                    Dashboard
                </a>

                <p class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider mt-6 mb-2">Konten Website
                </p>

                <a href="#"
                    class="flex items-center px-4 py-3 text-gray-300 hover:bg-blue-800 hover:text-white rounded-md transition-colors duration-200">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                        </path>
                    </svg>
                    Berita & Pengumuman
                </a>

                <a href="#"
                    class="flex items-center px-4 py-3 text-gray-300 hover:bg-blue-800 hover:text-white rounded-md transition-colors duration-200">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01">
                        </path>
                    </svg>
                    Manajemen Layanan
                </a>

                <a href="#"
                    class="flex items-center px-4 py-3 text-gray-300 hover:bg-blue-800 hover:text-white rounded-md transition-colors duration-200">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2z">
                        </path>
                    </svg>
                    Agenda Kegiatan
                </a>

                <p class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider mt-6 mb-2">Pengaturan</p>

                <a href="#"
                    class="flex items-center px-4 py-3 text-gray-300 hover:bg-blue-800 hover:text-white rounded-md transition-colors duration-200">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                        </path>
                    </svg>
                    Manajemen User
                </a>
            </nav>

            <div class="p-4 border-t border-blue-800 bg-blue-900">
                <a href="#"
                    class="flex items-center px-4 py-2 text-sm text-white hover:text-uniba-yellow transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                        </path>
                    </svg>
                    Keluar / Logout
                </a>
            </div>
        </aside>

        <div class="flex flex-col flex-1 overflow-hidden">

            <header class="flex items-center justify-between px-6 py-4 bg-white shadow-sm border-b">
                <div class="flex items-center">
                    <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>

                    <h2 class="text-xl font-bold text-gray-800 ml-4 lg:ml-0">Dashboard Overview</h2>
                </div>

                <div class="flex items-center gap-4">
                    <button class="relative p-2 text-gray-400 hover:text-gray-600">
                        <span class="absolute top-0 right-0 h-2 w-2 rounded-full bg-red-500 ring-2 ring-white"></span>
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                            </path>
                        </svg>
                    </button>

                    <div x-data="{ dropdownOpen: false }" class="relative">
                        <button @click="dropdownOpen = !dropdownOpen"
                            class="flex items-center gap-2 focus:outline-none">
                            <div class="text-right hidden md:block">
                                <p class="text-sm font-bold text-gray-700">Admin TIK</p>
                                <p class="text-xs text-gray-500">Administrator</p>
                            </div>
                            <img class="w-8 h-8 rounded-full object-cover border-2 border-uniba-blue"
                                src="https://ui-avatars.com/api/?name=Admin+TIK&background=1e3a8a&color=fff"
                                alt="Avatar">
                        </button>

                        <div x-show="dropdownOpen" @click.away="dropdownOpen = false" x-transition
                            class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 border border-gray-100 z-50">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profil
                                Saya</a>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Pengaturan</a>
                            <div class="border-t border-gray-100"></div>
                            <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50">Logout</a>
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
                @yield('content')
            </main>
        </div>
    </div>

</body>

</html>
