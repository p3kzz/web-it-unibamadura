@extends('layouts.app')

@section('title', 'Program Kerja - UPT TIK UNIBA Madura')

@section('content')

    {{-- Hero Section --}}
    <section class="relative bg-gradient-to-br from-uniba-blue via-blue-700 to-uniba-dark py-20 overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>

        {{-- Animated Background Elements --}}
        <div
            class="absolute top-20 right-10 w-72 h-72 bg-yellow-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse-slow">
        </div>
        <div class="absolute bottom-20 left-10 w-72 h-72 bg-blue-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse-slow"
            style="animation-delay: 1s;"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-3xl mx-auto">
                <span
                    class="inline-block bg-blue-800 text-blue-200 text-xs font-bold px-4 py-2 rounded-full uppercase tracking-wider mb-4 animate-fade-in-up">
                    Tentang Kami
                </span>
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 animate-fade-in-up stagger-1">
                    Program Kerja
                </h1>
                <p class="text-lg text-blue-100 animate-fade-in-up stagger-2">
                    Rencana strategis dan program unggulan UPT TIK UNIBA Madura
                    @if (isset($periodeAktif))
                        <br><span class="text-uniba-yellow font-semibold">{{ $periodeAktif->name }}
                        </span>
                    @endif
                </p>
            </div>
        </div>

        {{-- Decorative Wave --}}
        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">
            <svg class="relative block w-full h-12" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path
                    d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                    class="fill-gray-50"></path>
            </svg>
        </div>
    </section>

    {{-- Pilar Transformasi Digital Section --}}
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-12 scroll-animate">
                    <div class="flex items-center justify-center gap-4 mb-4">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Pilar Transformasi Digital</h2>
                    <div class="w-20 h-1 bg-uniba-yellow mx-auto mb-4"></div>
                    <p class="text-gray-600 max-w-2xl mx-auto">
                        Fondasi utama dalam mewujudkan kampus digital
                    </p>
                </div>

                @php
                    $colors = ['blue', 'green', 'purple', 'orange', 'indigo', 'red'];
                    $icons = [
                        'M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01',
                        'M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z',
                        'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z',
                        'M13 10V3L4 14h7v7l9-11h-7z',
                        'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z',
                        'M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z',
                    ];
                @endphp

                @if (isset($pilars) && $pilars->count() > 0)
                    <div class="grid md:grid-cols-{{ min($pilars->count(), 3) }} gap-8">
                        @foreach ($pilars as $index => $pilar)
                            @php
                                $color = $colors[$index % count($colors)];
                                $icon = $icons[$index % count($icons)];
                                $number = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                            @endphp
                            <div class="scroll-animate stagger-{{ $index + 1 }}">
                                <div
                                    class="bg-white rounded-2xl shadow-xl overflow-hidden group hover:shadow-2xl transition-all duration-300 h-full flex flex-col">
                                    {{-- Header --}}
                                    <div
                                        class="bg-gradient-to-r from-{{ $color }}-500 to-{{ $color }}-600 p-6 relative overflow-hidden">
                                        <div class="absolute top-0 right-0 text-9xl font-bold text-white opacity-10">
                                            {{ $number }}</div>
                                        <div class="relative z-10">
                                            <div
                                                class="w-14 h-14 bg-white bg-opacity-20 backdrop-blur-sm rounded-xl flex items-center justify-center mb-4">
                                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="{{ $icon }}"></path>
                                                </svg>
                                            </div>
                                            <h3 class="text-xl font-bold text-white mb-1">{{ $pilar->title }}</h3>
                                            @if ($pilar->subtitle)
                                                <p class="text-{{ $color }}-100 text-sm">{{ $pilar->subtitle }}</p>
                                            @endif
                                        </div>
                                    </div>

                                    {{-- Content --}}
                                    <div class="p-6 flex-1 flex flex-col">
                                        @if ($pilar->description)
                                            <p class="text-gray-600 mb-6 leading-relaxed">{{ $pilar->description }}</p>
                                        @endif

                                        @if ($pilar->key_components && count($pilar->key_components) > 0)
                                            <div class="mt-auto">
                                                <p class="text-xs font-semibold text-gray-500 uppercase mb-3">Key
                                                    Components:
                                                </p>
                                                <ul class="space-y-2">
                                                    @foreach ($pilar->key_components as $component)
                                                        <li class="flex items-center gap-2">
                                                            <svg class="w-4 h-4 text-{{ $color }}-500"
                                                                fill="currentColor" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd"
                                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                    clip-rule="evenodd"></path>
                                                            </svg>
                                                            <span class="text-gray-700 text-sm">{{ $component }}</span>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12 bg-white rounded-2xl shadow-lg">
                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                </path>
                            </svg>
                        </div>
                        <p class="text-gray-500 text-lg">Belum ada data pilar transformasi</p>
                    </div>
                @endif
            </div>
        </div>
    </section>

    {{-- Program Kerja Detail Section --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-12 scroll-animate">
                    <div class="flex items-center justify-center gap-4 mb-4">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Kode & Program Kerja</h2>
                    <div class="w-20 h-1 bg-uniba-yellow mx-auto mb-4"></div>
                    <p class="text-gray-600 max-w-2xl mx-auto">
                        Rincian program kerja berdasarkan kode kegiatan
                    </p>
                </div>

                @php
                    $statusColors = [
                        'planning' => ['bg' => 'yellow', 'text' => 'Perencanaan'],
                        'in_progress' => ['bg' => 'blue', 'text' => 'Berjalan'],
                        'completed' => ['bg' => 'green', 'text' => 'Selesai'],
                        'cancelled' => ['bg' => 'red', 'text' => 'Dibatalkan'],
                    ];
                @endphp

                @if (isset($programKerja) && $programKerja->count() > 0)
                    {{-- Desktop Table --}}
                    <div class="scroll-animate hidden md:block">
                        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border-t-4 border-orange-500">
                            <div class="overflow-x-auto">
                                <table class="w-full">
                                    <thead>
                                        <tr class="bg-gradient-to-r from-orange-500 to-orange-600 text-white">
                                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Kode
                                            </th>
                                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">
                                                Program
                                                Kerja</th>
                                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Pilar
                                            </th>
                                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">
                                                Target
                                            </th>
                                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">
                                                Status
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        @foreach ($programKerja as $program)
                                            @php
                                                $pilarColor = 'gray';
                                                if ($program->pilar && isset($pilars)) {
                                                    $pilarIndex =
                                                        $pilars->search(function ($p) use ($program) {
                                                            return $p->id === $program->pilar_id;
                                                        }) ?? 0;
                                                    $pilarColor = $colors[$pilarIndex % count($colors)] ?? 'gray';
                                                }
                                                $status = $statusColors[$program->status] ?? [
                                                    'bg' => 'gray',
                                                    'text' => $program->status,
                                                ];
                                            @endphp
                                            <tr class="hover:bg-{{ $pilarColor }}-50 transition-colors duration-200">
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <span
                                                        class="inline-flex items-center justify-center px-3 py-1 rounded-full text-xs font-bold bg-{{ $pilarColor }}-100 text-{{ $pilarColor }}-700">
                                                        {{ $program->kode }}
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <span class="font-semibold text-gray-900">{{ $program->nama }}</span>
                                                    @if ($program->tujuan)
                                                        <p class="text-sm text-gray-600 mt-1">
                                                            <span class="font-medium text-gray-700">Tujuan:</span>
                                                            {{ Str::limit($program->tujuan, 100) }}
                                                        </p>
                                                    @endif
                                                    @if ($program->sasaran)
                                                        <p class="text-sm text-gray-600 mt-1">
                                                            <span class="font-medium text-gray-700">Sasaran:</span>
                                                            {{ Str::limit($program->sasaran, 100) }}
                                                        </p>
                                                    @endif
                                                    @if ($program->deskripsi)
                                                        <p class="text-sm text-gray-500 mt-1 italic">
                                                            {{ Str::limit($program->deskripsi, 150) }}</p>
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4">
                                                    @if ($program->pilar)
                                                        <span
                                                            class="text-gray-600 text-sm">{{ $program->pilar->title }}</span>
                                                    @else
                                                        <span class="text-gray-400 text-sm">-</span>
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4">
                                                    @if ($program->target_waktu)
                                                        <span class="inline-flex items-center gap-1 text-gray-700 text-sm">
                                                            <svg class="w-4 h-4 text-gray-400" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                                </path>
                                                            </svg>
                                                            {{ $program->target_waktu }}
                                                        </span>
                                                    @else
                                                        <span class="text-gray-400 text-sm">-</span>
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4">
                                                    <span
                                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-{{ $status['bg'] }}-100 text-{{ $status['bg'] }}-700">
                                                        @if ($program->status === 'in_progress')
                                                            <span
                                                                class="w-2 h-2 bg-{{ $status['bg'] }}-500 rounded-full mr-2 animate-pulse"></span>
                                                        @else
                                                            <span
                                                                class="w-2 h-2 bg-{{ $status['bg'] }}-500 rounded-full mr-2"></span>
                                                        @endif
                                                        {{ $status['text'] }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    {{-- Mobile Cards for Program Kerja --}}
                    <div class="md:hidden space-y-4">
                        @foreach ($programKerja as $program)
                            @php
                                $pilarColor = 'gray';
                                if ($program->pilar && isset($pilars)) {
                                    $pilarIndex =
                                        $pilars->search(function ($p) use ($program) {
                                            return $p->id === $program->pilar_id;
                                        }) ?? 0;
                                    $pilarColor = $colors[$pilarIndex % count($colors)] ?? 'gray';
                                }
                                $status = $statusColors[$program->status] ?? [
                                    'bg' => 'gray',
                                    'text' => $program->status,
                                ];
                            @endphp
                            <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                                <div
                                    class="bg-gradient-to-r from-{{ $pilarColor }}-500 to-{{ $pilarColor }}-600 px-4 py-3">
                                    <span
                                        class="inline-flex items-center justify-center px-3 py-1 rounded-full text-xs font-bold bg-white text-{{ $pilarColor }}-700">
                                        {{ $program->kode }}
                                    </span>
                                </div>
                                <div class="p-4 space-y-3">
                                    <h4 class="font-semibold text-gray-900">{{ $program->nama }}</h4>
                                    @if ($program->tujuan)
                                        <div class="text-sm">
                                            <span class="font-medium text-gray-700">Tujuan:</span>
                                            <span class="text-gray-600">{{ Str::limit($program->tujuan, 100) }}</span>
                                        </div>
                                    @endif
                                    @if ($program->sasaran)
                                        <div class="text-sm">
                                            <span class="font-medium text-gray-700">Sasaran:</span>
                                            <span class="text-gray-600">{{ Str::limit($program->sasaran, 100) }}</span>
                                        </div>
                                    @endif
                                    @if ($program->deskripsi)
                                        <p class="text-sm text-gray-500 italic">{{ Str::limit($program->deskripsi, 150) }}
                                        </p>
                                    @endif
                                    <div class="flex flex-wrap gap-2 pt-2">
                                        @if ($program->pilar)
                                            <span
                                                class="inline-flex items-center px-2 py-1 rounded text-xs bg-gray-100 text-gray-700">
                                                {{ $program->pilar->title }}
                                            </span>
                                        @endif
                                        @if ($program->target_waktu)
                                            <span
                                                class="inline-flex items-center px-2 py-1 rounded text-xs bg-gray-100 text-gray-700">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                                {{ $program->target_waktu }}
                                            </span>
                                        @endif
                                        <span
                                            class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-{{ $status['bg'] }}-100 text-{{ $status['bg'] }}-700">
                                            @if ($program->status === 'in_progress')
                                                <span
                                                    class="w-1.5 h-1.5 bg-{{ $status['bg'] }}-500 rounded-full mr-1.5 animate-pulse"></span>
                                            @endif
                                            {{ $status['text'] }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-16 bg-gray-50 rounded-2xl">
                        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                </path>
                            </svg>
                        </div>
                        <p class="text-gray-500 text-xl font-semibold mb-2">Belum ada data program kerja</p>
                        <p class="text-gray-400">Data program kerja akan ditampilkan setelah ditambahkan</p>
                    </div>
                @endif
            </div>
        </div>
    </section>

    {{-- Statistics Summary Section --}}
    @if (isset($programKerja) && $programKerja->count() > 0)
        <section class="py-20 bg-gradient-to-br from-gray-900 to-blue-900 text-white relative overflow-hidden">
            <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]">
            </div>

            <div class="container mx-auto px-4 relative z-10">
                <div class="max-w-5xl mx-auto text-center">
                    <h2 class="text-3xl font-bold mb-4">Statistik Program Kerja</h2>
                    <p class="text-blue-200 mb-12">Ringkasan status program kerja
                        @if (isset($periodeAktif))
                            periode {{ $periodeAktif->name }}
                        @endif
                    </p>

                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        @php
                            $stats = [
                                [
                                    'label' => 'Total Program',
                                    'count' => $programKerja->count(),
                                    'color' => 'blue',
                                    'icon' =>
                                        'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2',
                                ],
                                [
                                    'label' => 'Perencanaan',
                                    'count' => $programKerja->where('status', 'planning')->count(),
                                    'color' => 'yellow',
                                    'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
                                ],
                                [
                                    'label' => 'Berjalan',
                                    'count' => $programKerja->where('status', 'in_progress')->count(),
                                    'color' => 'green',
                                    'icon' => 'M13 10V3L4 14h7v7l9-11h-7z',
                                ],
                                [
                                    'label' => 'Selesai',
                                    'count' => $programKerja->where('status', 'completed')->count(),
                                    'color' => 'purple',
                                    'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
                                ],
                            ];
                        @endphp

                        @foreach ($stats as $stat)
                            <div
                                class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-6 hover:bg-opacity-20 transition-all duration-300">
                                <div
                                    class="w-12 h-12 bg-{{ $stat['color'] }}-500 bg-opacity-20 rounded-lg flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-6 h-6 text-{{ $stat['color'] }}-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="{{ $stat['icon'] }}"></path>
                                    </svg>
                                </div>
                                <div class="text-4xl font-bold mb-2">{{ $stat['count'] }}</div>
                                <div class="text-sm text-blue-200">{{ $stat['label'] }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

@endsection
