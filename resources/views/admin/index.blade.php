@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard Overview')
@section('page-subtitle', 'Selamat datang kembali, Admin TIK!')

@section('content')

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <div
            class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl shadow-lg p-6 text-white transform hover:scale-105 transition-all duration-200">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-blue-100 text-sm font-medium mb-1">Total Berita</p>
                    <h3 class="text-3xl font-bold mb-2">45</h3>
                    <div class="flex items-center gap-1 text-xs">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span>+12% dari bulan lalu</span>
                    </div>
                </div>
                <div class="bg-white bg-opacity-20 rounded-xl p-3">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                        </path>
                    </svg>
                </div>
            </div>
        </div>

        <div
            class="bg-gradient-to-br from-green-500 to-green-600 rounded-2xl shadow-lg p-6 text-white transform hover:scale-105 transition-all duration-200">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-green-100 text-sm font-medium mb-1">Layanan Aktif</p>
                    <h3 class="text-3xl font-bold mb-2">28</h3>
                    <div class="flex items-center gap-1 text-xs">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span>Semua berjalan lancar</span>
                    </div>
                </div>
                <div class="bg-white bg-opacity-20 rounded-xl p-3">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01">
                        </path>
                    </svg>
                </div>
            </div>
        </div>

        <div
            class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl shadow-lg p-6 text-white transform hover:scale-105 transition-all duration-200">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-purple-100 text-sm font-medium mb-1">Pengunjung Hari Ini</p>
                    <h3 class="text-3xl font-bold mb-2">1,247</h3>
                    <div class="flex items-center gap-1 text-xs">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span>+8% dari kemarin</span>
                    </div>
                </div>
                <div class="bg-white bg-opacity-20 rounded-xl p-3">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                        </path>
                    </svg>
                </div>
            </div>
        </div>

        <div
            class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl shadow-lg p-6 text-white transform hover:scale-105 transition-all duration-200">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-orange-100 text-sm font-medium mb-1">Agenda Bulan Ini</p>
                    <h3 class="text-3xl font-bold mb-2">12</h3>
                    <div class="flex items-center gap-1 text-xs">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span>3 akan datang minggu ini</span>
                    </div>
                </div>
                <div class="bg-white bg-opacity-20 rounded-xl p-3">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        {{-- Recent Activity --}}
        <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-bold text-gray-800">Aktivitas Terbaru</h3>
                <button class="text-sm text-uniba-blue hover:text-blue-800 font-medium">Lihat Semua</button>
            </div>

            <div class="space-y-4">
                @php
                    $activities = [
                        [
                            'type' => 'news',
                            'title' => 'Berita baru ditambahkan',
                            'desc' => 'Workshop AI & Machine Learning 2026',
                            'time' => '5 menit yang lalu',
                            'icon' =>
                                'M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z',
                            'color' => 'blue',
                        ],
                        [
                            'type' => 'service',
                            'title' => 'Layanan diperbarui',
                            'desc' => 'Google Workspace - Status: Aktif',
                            'time' => '1 jam yang lalu',
                            'icon' =>
                                'M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01',
                            'color' => 'green',
                        ],
                        [
                            'type' => 'event',
                            'title' => 'Agenda baru ditambahkan',
                            'desc' => 'Pelatihan Keamanan Siber - 15 Feb 2026',
                            'time' => '3 jam yang lalu',
                            'icon' =>
                                'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z',
                            'color' => 'purple',
                        ],
                        [
                            'type' => 'user',
                            'title' => 'User baru terdaftar',
                            'desc' => 'Mohammad Rizki - Staff TIK',
                            'time' => '5 jam yang lalu',
                            'icon' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z',
                            'color' => 'orange',
                        ],
                    ];
                @endphp

                @foreach ($activities as $activity)
                    <div
                        class="flex items-start gap-4 p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors duration-200 cursor-pointer">
                        <div
                            class="flex-shrink-0 w-10 h-10 bg-{{ $activity['color'] }}-100 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-{{ $activity['color'] }}-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="{{ $activity['icon'] }}"></path>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-semibold text-gray-800">{{ $activity['title'] }}</p>
                            <p class="text-sm text-gray-600 mt-0.5">{{ $activity['desc'] }}</p>
                            <p class="text-xs text-gray-500 mt-1">{{ $activity['time'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Recent Posts & Upcoming Events --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        {{-- Recent Posts --}}
        <div class="bg-white rounded-2xl shadow-sm p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-bold text-gray-800">Berita Terbaru</h3>
                <a href="#" class="text-sm text-uniba-blue hover:text-blue-800 font-medium">Lihat Semua</a>
            </div>

            <div class="space-y-4">
                @for ($i = 1; $i <= 4; $i++)
                    <div class="flex gap-4 p-3 hover:bg-gray-50 rounded-xl transition-colors duration-200 cursor-pointer">
                        <img src="https://picsum.photos/seed/{{ $i }}/100/100" alt="Post"
                            class="w-16 h-16 rounded-lg object-cover">
                        <div class="flex-1 min-w-0">
                            <h4 class="text-sm font-semibold text-gray-800 line-clamp-2">Workshop AI & Machine Learning
                                untuk Dosen UNIBA</h4>
                            <p class="text-xs text-gray-500 mt-1">{{ now()->subDays($i)->format('d M Y') }}</p>
                        </div>
                        <span
                            class="px-2 py-1 bg-green-100 text-green-700 text-xs font-medium rounded-lg h-fit">Published</span>
                    </div>
                @endfor
            </div>
        </div>

        {{-- Upcoming Events --}}
        <div class="bg-white rounded-2xl shadow-sm p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-bold text-gray-800">Agenda Mendatang</h3>
                <a href="#" class="text-sm text-uniba-blue hover:text-blue-800 font-medium">Lihat Semua</a>
            </div>

            <div class="space-y-4">
                @php
                    $events = [
                        [
                            'date' => '15',
                            'month' => 'Feb',
                            'title' => 'Pelatihan Keamanan Siber',
                            'time' => '09:00 - 16:00 WIB',
                        ],
                        [
                            'date' => '20',
                            'month' => 'Feb',
                            'title' => 'Upgrading Infrastruktur Server',
                            'time' => '08:00 - 12:00 WIB',
                        ],
                        [
                            'date' => '25',
                            'month' => 'Feb',
                            'title' => 'Workshop Google Workspace',
                            'time' => '13:00 - 17:00 WIB',
                        ],
                        [
                            'date' => '28',
                            'month' => 'Feb',
                            'title' => 'Evaluasi Sistem UNIBA Satu Data',
                            'time' => '10:00 - 15:00 WIB',
                        ],
                    ];
                @endphp

                @foreach ($events as $event)
                    <div
                        class="flex gap-4 items-start p-3 hover:bg-gray-50 rounded-xl transition-colors duration-200 cursor-pointer">
                        <div
                            class="flex-shrink-0 w-14 text-center bg-gradient-to-br from-orange-500 to-orange-600 text-white rounded-lg p-2">
                            <div class="text-xl font-bold">{{ $event['date'] }}</div>
                            <div class="text-xs">{{ $event['month'] }}</div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h4 class="text-sm font-semibold text-gray-800">{{ $event['title'] }}</h4>
                            <p class="text-xs text-gray-500 mt-1 flex items-center gap-1">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $event['time'] }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
