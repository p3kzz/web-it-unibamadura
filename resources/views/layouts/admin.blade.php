<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - UPT TIK UNIBA</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-800 antialiased" x-data="{ sidebarOpen: false }">

    <div class="flex h-screen overflow-hidden">

        <div x-show="sidebarOpen" @click="sidebarOpen = false"
            x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-20 bg-black bg-opacity-50 lg:hidden">
        </div>

        {{-- Sidebar --}}
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
            class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto bg-gradient-to-b from-uniba-blue to-uniba-dark text-white lg:translate-x-0 lg:static lg:inset-0 transition-transform duration-300 ease-in-out shadow-2xl flex flex-col">

            <div
                class="relative h-20 border-b border-blue-800 bg-gradient-to-r from-uniba-dark to-blue-900 overflow-hidden">
                <div class="absolute inset-0 opacity-10">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-uniba-yellow rounded-full -mr-16 -mt-16"></div>
                    <div class="absolute bottom-0 left-0 w-24 h-24 bg-blue-400 rounded-full -ml-12 -mb-12"></div>
                </div>

                <div class="relative flex items-center justify-center h-full">
                    <div class="flex items-center gap-3">
                        <a href="/"
                            class="w-10 h-10 bg-gradient-to-br from-uniba-yellow to-yellow-500 rounded-xl flex items-center justify-center shadow-lg transform hover:scale-110 transition-transform duration-200">
                            <svg class="w-6 h-6 text-uniba-blue" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </a>
                        <div>
                            <span class="text-base font-bold tracking-wide block">ADMIN PANEL</span>
                            <span class="text-xs text-blue-300">UPT TIK UNIBA</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Navbar --}}
            @include('partials.admin.navbar')

            {{-- footer --}}
            @include('partials.admin.footer')
        </aside>

        {{-- Main Content --}}
        <div class="flex flex-col flex-1 overflow-hidden">

            {{-- Header --}}
            @include('partials.admin.header')

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50">
                <div class="container mx-auto px-6 py-6">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

</body>

</html>
