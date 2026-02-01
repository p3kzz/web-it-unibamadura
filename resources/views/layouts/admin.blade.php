<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - UPT TIK UNIBA</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak] {
            display: none !important;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 antialiased" x-data="{ sidebarOpen: false }">

    <div class="flex h-screen overflow-hidden">

        {{-- Overlay for Mobile --}}
        <div x-show="sidebarOpen" @click="sidebarOpen = false"
            x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-20 bg-black bg-opacity-50 lg:hidden">
        </div>

        {{-- Sidebar --}}
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
            class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto bg-gradient-to-b from-uniba-blue to-uniba-dark text-white lg:translate-x-0 lg:static lg:inset-0 transition-transform duration-300 ease-in-out shadow-2xl flex flex-col">

            {{-- Logo Section --}}
            <div
                class="relative h-20 border-b border-blue-800 bg-gradient-to-r from-uniba-dark to-blue-900 overflow-hidden">
                {{-- Decorative Background --}}
                <div class="absolute inset-0 opacity-10">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-uniba-yellow rounded-full -mr-16 -mt-16"></div>
                    <div class="absolute bottom-0 left-0 w-24 h-24 bg-blue-400 rounded-full -ml-12 -mb-12"></div>
                </div>

                <div class="relative flex items-center justify-center h-full">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-10 h-10 bg-gradient-to-br from-uniba-yellow to-yellow-500 rounded-xl flex items-center justify-center shadow-lg transform hover:scale-110 transition-transform duration-200">
                            <svg class="w-6 h-6 text-uniba-blue" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <span class="text-base font-bold tracking-wide block">ADMIN PANEL</span>
                            <span class="text-xs text-blue-300">UPT TIK UNIBA</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Navigation --}}
            <nav class="mt-6 flex-1 px-3 space-y-1 overflow-y-auto pb-4">

                {{-- Dashboard (Main Entry) --}}
                <div class="mb-3">
                    <p class="px-4 text-sm font-semibold text-blue-300 tracking-wider mb-3 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M2 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1H3a1 1 0 01-1-1V4zM8 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1H9a1 1 0 01-1-1V4zM15 3a1 1 0 00-1 1v12a1 1 0 001 1h2a1 1 0 001-1V4a1 1 0 00-1-1h-2z">
                            </path>
                        </svg>
                        Menu Utama
                    </p>

                    <a href="#"
                        class="group flex items-center px-4 py-3 bg-gradient-to-r from-blue-800 to-blue-700 text-white rounded-xl mb-2 shadow-lg transform hover:scale-105 transition-all duration-200">
                        <div
                            class="w-10 h-10 bg-white bg-opacity-20 rounded-lg flex items-center justify-center mr-3 group-hover:bg-opacity-30 transition-colors duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                                </path>
                            </svg>
                        </div>
                        <span class="font-semibold">Dashboard</span>
                        <div class="ml-auto w-2 h-2 bg-uniba-yellow rounded-full"></div>
                    </a>
                </div>

                {{-- Tentang Kami --}}
                <div class="mb-1" x-data="{ open: false }">
                    <button @click="open = !open"
                        class="w-full px-3 py-2.5 rounded-xl text-sm font-semibold tracking-wider flex items-center justify-between transition-all duration-200"
                        :class="open ? 'bg-blue-800 bg-opacity-50 text-white' :
                            'text-blue-300 hover:text-white hover:bg-blue-800 hover:bg-opacity-30'">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-lg flex items-center justify-center transition-colors duration-200"
                                :class="open ? 'bg-blue-600 bg-opacity-60' : 'bg-white bg-opacity-10'">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z">
                                    </path>
                                </svg>
                            </div>
                            <span>Tentang Kami</span>
                        </div>
                        <svg class="w-4 h-4 transform transition-transform duration-200"
                            :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>

                    <div x-show="open" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 -translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0" class="space-y-1">

                        <a href="#"
                            class="group flex items-center px-4 py-2.5 text-blue-100 hover:bg-blue-800 hover:bg-opacity-50 rounded-lg transition-all duration-200 hover:translate-x-1">
                            <div class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-3"></div>
                            <span class="text-sm">Visi & Misi</span>
                        </a>

                        <a href="#"
                            class="group flex items-center px-4 py-2.5 text-blue-100 hover:bg-blue-800 hover:bg-opacity-50 rounded-lg transition-all duration-200 hover:translate-x-1">
                            <div class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-3"></div>
                            <span class="text-sm">Sejarah TIK</span>
                        </a>

                        <a href="#"
                            class="group flex items-center px-4 py-2.5 text-blue-100 hover:bg-blue-800 hover:bg-opacity-50 rounded-lg transition-all duration-200 hover:translate-x-1">
                            <div class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-3"></div>
                            <span class="text-sm">Struktur Organisasi</span>
                        </a>

                        <a href="#"
                            class="group flex items-center px-4 py-2.5 text-blue-100 hover:bg-blue-800 hover:bg-opacity-50 rounded-lg transition-all duration-200 hover:translate-x-1">
                            <div class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-3"></div>
                            <span class="text-sm">Sumber Daya Manusia</span>
                        </a>

                        <a href="#"
                            class="group flex items-center px-4 py-2.5 text-blue-100 hover:bg-blue-800 hover:bg-opacity-50 rounded-lg transition-all duration-200 hover:translate-x-1">
                            <div class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-3"></div>
                            <span class="text-sm">Program Kerja</span>
                        </a>

                        <a href="#"
                            class="group flex items-center px-4 py-2.5 text-blue-100 hover:bg-blue-800 hover:bg-opacity-50 rounded-lg transition-all duration-200 hover:translate-x-1">
                            <div class="w-1.5 h-1.5 bg-blue-400 rounded-full mr-3"></div>
                            <span class="text-sm">Prestasi</span>
                        </a>

                    </div>
                </div>

                {{-- Layanan --}}
                <div class="mb-1" x-data="{ open: false }">
                    <button @click="open = !open"
                        class="w-full px-3 py-2.5 rounded-xl text-sm font-semibold tracking-wider flex items-center justify-between transition-all duration-200"
                        :class="open ? 'bg-blue-800 bg-opacity-50 text-white' :
                            'text-blue-300 hover:text-white hover:bg-blue-800 hover:bg-opacity-30'">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-lg flex items-center justify-center transition-colors duration-200"
                                :class="open ? 'bg-blue-600 bg-opacity-60' : 'bg-white bg-opacity-10'">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z">
                                    </path>
                                </svg>
                            </div>
                            <span>Layanan</span>
                        </div>
                        <svg class="w-4 h-4 transform transition-transform duration-200"
                            :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>

                    <div x-show="open" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 -translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0" class="space-y-1">

                        <a href="#"
                            class="group flex items-center px-4 py-2.5 text-blue-100 hover:bg-blue-800 hover:bg-opacity-50 rounded-lg transition-all duration-200 hover:translate-x-1">
                            <div class="w-1.5 h-1.5 bg-green-400 rounded-full mr-3"></div>
                            <span class="text-sm">Katalog Layanan</span>
                        </a>

                        <a href="#"
                            class="group flex items-center px-4 py-2.5 text-blue-100 hover:bg-blue-800 hover:bg-opacity-50 rounded-lg transition-all duration-200 hover:translate-x-1">
                            <div class="w-1.5 h-1.5 bg-green-400 rounded-full mr-3"></div>
                            <span class="text-sm">Lisensi Software</span>
                        </a>

                        <a href="#"
                            class="group flex items-center px-4 py-2.5 text-blue-100 hover:bg-blue-800 hover:bg-opacity-50 rounded-lg transition-all duration-200 hover:translate-x-1">
                            <div class="w-1.5 h-1.5 bg-green-400 rounded-full mr-3"></div>
                            <span class="text-sm">Web Hosting</span>
                        </a>

                        <a href="#"
                            class="group flex items-center px-4 py-2.5 text-blue-100 hover:bg-blue-800 hover:bg-opacity-50 rounded-lg transition-all duration-200 hover:translate-x-1">
                            <div class="w-1.5 h-1.5 bg-green-400 rounded-full mr-3"></div>
                            <span class="text-sm">Email & Akun Uniba</span>
                        </a>

                        {{-- Network Status (item khusus dengan styling berbeda) --}}
                        <a href="#"
                            class="group flex items-center px-4 py-2.5 text-blue-100 hover:bg-blue-800 hover:bg-opacity-50 rounded-lg transition-all duration-200 hover:translate-x-1">
                            <div class="w-1.5 h-1.5 bg-green-400 rounded-full mr-3 animate-pulse"></div>
                            <span class="text-sm font-semibold text-green-300">Network Service Status</span>
                        </a>

                    </div>
                </div>

                {{-- Konten Umum --}}
                <div class="mb-1" x-data="{ open: false }">
                    <button @click="open = !open"
                        class="w-full px-3 py-2.5 rounded-xl text-sm font-semibold tracking-wider flex items-center justify-between transition-all duration-200"
                        :class="open ? 'bg-blue-800 bg-opacity-50 text-white' :
                            'text-blue-300 hover:text-white hover:bg-blue-800 hover:bg-opacity-30'">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-lg flex items-center justify-center transition-colors duration-200"
                                :class="open ? 'bg-blue-600 bg-opacity-60' : 'bg-white bg-opacity-10'">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                                    <path fill-rule="evenodd"
                                        d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <span>Konten Umum</span>
                        </div>
                        <svg class="w-4 h-4 transform transition-transform duration-200"
                            :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>

                    <div x-show="open" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 -translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0" class="space-y-1">

                        <a href="#"
                            class="group flex items-center px-4 py-2.5 text-blue-100 hover:bg-blue-800 hover:bg-opacity-50 rounded-lg transition-all duration-200 hover:translate-x-1">
                            <div class="w-1.5 h-1.5 bg-yellow-400 rounded-full mr-3"></div>
                            <span class="text-sm">Berita & Pengumuman</span>
                            <span class="ml-auto bg-red-500 text-white text-xs px-2 py-0.5 rounded-full">3</span>
                        </a>

                        <a href="#"
                            class="group flex items-center px-4 py-2.5 text-blue-100 hover:bg-blue-800 hover:bg-opacity-50 rounded-lg transition-all duration-200 hover:translate-x-1">
                            <div class="w-1.5 h-1.5 bg-yellow-400 rounded-full mr-3"></div>
                            <span class="text-sm">Agenda Kegiatan</span>
                        </a>

                    </div>
                </div>

                {{-- Kebijakan --}}
                <div class="mb-1" x-data="{ open: false }">
                    <button @click="open = !open"
                        class="w-full px-3 py-2.5 rounded-xl text-sm font-semibold tracking-wider flex items-center justify-between transition-all duration-200"
                        :class="open ? 'bg-blue-800 bg-opacity-50 text-white' :
                            'text-blue-300 hover:text-white hover:bg-blue-800 hover:bg-opacity-30'">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-lg flex items-center justify-center transition-colors duration-200"
                                :class="open ? 'bg-blue-600 bg-opacity-60' : 'bg-white bg-opacity-10'">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <span>Kebijakan</span>
                        </div>
                        <svg class="w-4 h-4 transform transition-transform duration-200"
                            :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>

                    <div x-show="open" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 -translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0" class="space-y-1">

                        <a href="#"
                            class="group flex items-center px-4 py-2.5 text-blue-100
                            hover:bg-blue-800 hover:bg-opacity-50 rounded-lg transition-all duration-200
                            hover:translate-x-1">
                            <div class="w-1.5 h-1.5 bg-purple-400 rounded-full mr-3"></div>
                            <span class="text-sm">Kebijakan & Aturan Umum</span>
                        </a>

                        <a href="#"
                            class="group flex items-center px-4 py-2.5 text-blue-100 hover:bg-blue-800 hover:bg-opacity-50 rounded-lg transition-all duration-200 hover:translate-x-1">
                            <div class="w-1.5 h-1.5 bg-purple-400 rounded-full mr-3"></div>
                            <span class="text-sm">Aturan Koneksi & Jaringan</span>
                        </a>

                        <a href="#"
                            class="group flex items-center px-4 py-2.5 text-blue-100 hover:bg-blue-800 hover:bg-opacity-50 rounded-lg transition-all duration-200 hover:translate-x-1">
                            <div class="w-1.5 h-1.5 bg-purple-400 rounded-full mr-3"></div>
                            <span class="text-sm">Hak Cipta</span>
                        </a>

                        <a href="#"
                            class="group flex items-center px-4 py-2.5 text-blue-100 hover:bg-blue-800 hover:bg-opacity-50 rounded-lg transition-all duration-200 hover:translate-x-1">
                            <div class="w-1.5 h-1.5 bg-purple-400 rounded-full mr-3"></div>
                            <span class="text-sm">Kebijakan Server Institusi</span>
                        </a>

                        <a href="#"
                            class="group flex items-center px-4 py-2.5 text-blue-100 hover:bg-blue-800 hover:bg-opacity-50 rounded-lg transition-all duration-200 hover:translate-x-1">
                            <div class="w-1.5 h-1.5 bg-purple-400 rounded-full mr-3"></div>
                            <span class="text-sm">Panduan Situs</span>
                        </a>

                        <a href="#"
                            class="group flex items-center px-4 py-2.5 text-blue-100 hover:bg-blue-800 hover:bg-opacity-50 rounded-lg transition-all duration-200 hover:translate-x-1">
                            <div class="w-1.5 h-1.5 bg-purple-400 rounded-full mr-3"></div>
                            <span class="text-sm">Kebijakan Privasi</span>
                        </a>

                    </div>
                </div>

                {{-- Penjaminan Mutu --}}
                <div class="mb-1" x-data="{ open: false }">
                    <button @click="open = !open"
                        class="w-full px-3 py-2.5 rounded-xl text-sm font-semibold tracking-wider flex items-center justify-between transition-all duration-200"
                        :class="open ? 'bg-blue-800 bg-opacity-50 text-white' :
                            'text-blue-300 hover:text-white hover:bg-blue-800 hover:bg-opacity-30'">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-lg flex items-center justify-center transition-colors duration-200"
                                :class="open ? 'bg-blue-600 bg-opacity-60' : 'bg-white bg-opacity-10'">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <span>
                                Penjaminan Mutu
                            </span>
                        </div>
                        <svg class="w-4 h-4 transform transition-transform duration-200"
                            :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>

                    <div x-show="open" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 -translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0" class="space-y-1">

                        <a href="#"
                            class="group flex items-center px-4 py-2.5 text-blue-100 hover:bg-blue-800 hover:bg-opacity-50 rounded-lg transition-all duration-200 hover:translate-x-1">
                            <div class="w-1.5 h-1.5 bg-orange-400 rounded-full mr-3"></div>
                            <span class="text-sm">SOP (Standar Operasional)</span>
                        </a>

                        <a href="#"
                            class="group flex items-center px-4 py-2.5 text-blue-100 hover:bg-blue-800 hover:bg-opacity-50 rounded-lg transition-all duration-200 hover:translate-x-1">
                            <div class="w-1.5 h-1.5 bg-orange-400 rounded-full mr-3"></div>
                            <span class="text-sm">Sistem Dokumentasi</span>
                        </a>

                        <a href="#"
                            class="group flex items-center px-4 py-2.5 text-blue-100 hover:bg-blue-800 hover:bg-opacity-50 rounded-lg transition-all duration-200 hover:translate-x-1">
                            <div class="w-1.5 h-1.5 bg-orange-400 rounded-full mr-3"></div>
                            <span class="text-sm">Audit Internal</span>
                        </a>

                        <a href="#"
                            class="group flex items-center px-4 py-2.5 text-blue-100 hover:bg-blue-800 hover:bg-opacity-50 rounded-lg transition-all duration-200 hover:translate-x-1">
                            <div class="w-1.5 h-1.5 bg-orange-400 rounded-full mr-3"></div>
                            <span class="text-sm">Tinjauan Manajemen</span>
                        </a>

                    </div>
                </div>

            </nav>

            {{-- Fixed Bottom: Pengaturan + Logout --}}
            <div class="border-t border-blue-800 bg-gradient-to-r from-blue-900 to-uniba-dark"
                x-data="{ settingsOpen: false }">

                {{-- Pengaturan Toggle --}}
                <button @click="settingsOpen = !settingsOpen"
                    class="w-full flex items-center justify-between px-4 py-3 text-blue-200 hover:text-white hover:bg-blue-800 hover:bg-opacity-40 transition-all duration-200">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-white bg-opacity-10 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <span class="text-sm font-semibold">Pengaturan</span>
                    </div>
                    <svg class="w-4 h-4 transform transition-transform duration-200"
                        :class="settingsOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                        </path>
                    </svg>
                </button>

                {{-- Sub-menu Pengaturan --}}
                <div x-show="settingsOpen" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 -translate-y-1"
                    x-transition:enter-end="opacity-100 translate-y-0" class="px-3 pb-2 space-y-1">

                    <a href="# route('admin.manajemen-user') }}"
                        class="flex items-center px-4 py-2 text-blue-200 hover:bg-blue-800 hover:bg-opacity-50 rounded-lg transition-all duration-200 hover:translate-x-1">
                        <div class="w-1.5 h-1.5 bg-red-400 rounded-full mr-3"></div>
                        <span class="text-sm">Manajemen User</span>
                    </a>

                    <a href="# route('admin.konfigurasi-website') }}"
                        class="flex items-center px-4 py-2 text-blue-200 hover:bg-blue-800 hover:bg-opacity-50 rounded-lg transition-all duration-200 hover:translate-x-1">
                        <div class="w-1.5 h-1.5 bg-red-400 rounded-full mr-3"></div>
                        <span class="text-sm">Konfigurasi Website</span>
                    </a>

                </div>

                {{-- Divider --}}
                <div class="mx-4 border-t border-blue-800"></div>

                {{-- Logout Button --}}
                <div class="p-3">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="w-full flex items-center px-4 py-2.5 text-sm text-white bg-red-600 hover:bg-red-700 rounded-lg transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                </path>
                            </svg>
                            <span class="font-semibold">Keluar / Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        {{-- Main Content Area --}}
        <div class="flex flex-col flex-1 overflow-hidden">

            {{-- Top Header --}}
            <header class="flex items-center justify-between px-6 py-4 bg-white shadow-sm border-b border-gray-200">
                <div class="flex items-center gap-4">
                    {{-- Mobile Menu Toggle --}}
                    <button @click="sidebarOpen = true"
                        class="text-gray-500 hover:text-gray-700 focus:outline-none lg:hidden transition-colors duration-200">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>

                    {{-- Page Title --}}
                    <div>
                        <h2 class="text-xl font-bold text-gray-800">@yield('page-title', 'Dashboard Overview')</h2>
                        <p class="text-sm text-gray-500 mt-0.5">@yield('page-subtitle', 'Selamat datang di Admin Panel')</p>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    {{-- Quick Actions --}}
                    <button
                        class="hidden md:flex items-center gap-2 px-4 py-2.5 bg-uniba-blue text-white rounded-lg hover:bg-blue-800 transition-all duration-200 shadow hover:shadow-lg transform hover:-translate-y-0.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4">
                            </path>
                        </svg>
                        <span class="text-sm font-medium">Tambah Konten</span>
                    </button>

                    {{-- Notifications --}}
                    <button class="relative p-2 text-gray-400 hover:text-gray-600 transition-colors duration-200">
                        <span
                            class="absolute top-1 right-1 h-2 w-2 rounded-full bg-red-500 ring-2 ring-white animate-pulse"></span>
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                            </path>
                        </svg>
                    </button>

                    {{-- User Dropdown --}}
                    <div x-data="{ dropdownOpen: false }" class="relative">
                        <button @click="dropdownOpen = !dropdownOpen"
                            class="flex items-center gap-3 focus:outline-none hover:bg-gray-50 rounded-lg px-2 py-1 transition-colors duration-200">
                            <div class="text-right hidden md:block">
                                <p class="text-sm font-bold text-gray-700">Admin TIK</p>
                                <p class="text-xs text-gray-500">Administrator</p>
                            </div>
                            <img class="w-10 h-10 rounded-full object-cover border-2 border-uniba-blue shadow-sm"
                                src="https://ui-avatars.com/api/?name=Admin+TIK&background=1e3a8a&color=fff"
                                alt="Avatar">
                            <svg class="w-4 h-4 text-gray-400 hidden md:block" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
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
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Profil Saya
                            </a>

                            <a href="#"
                                class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-150">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
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

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50">
                <div class="container mx-auto px-6 py-6">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

</body>

</html>
