@extends('layouts.app')

@section('title', 'Standard Operating Procedure - UPT TIK UNIBA Madura')

@section('content')

    {{-- Hero Section --}}
    <section class="relative bg-gradient-to-br from-uniba-blue via-blue-700 to-uniba-dark py-20 overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>

        <div
            class="absolute top-20 left-10 w-72 h-72 bg-yellow-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse-slow">
        </div>
        <div class="absolute bottom-20 right-10 w-72 h-72 bg-red-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse-slow"
            style="animation-delay: 1s;"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-3xl mx-auto">
                <span
                    class="inline-block bg-blue-800 text-blue-200 text-xs font-bold px-4 py-2 rounded-full uppercase tracking-wider mb-4 animate-fade-in-up">
                    Penjaminan Mutu
                </span>
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 animate-fade-in-up stagger-1">
                    Standard Operating Procedure
                </h1>
                <p class="text-lg text-blue-100 animate-fade-in-up stagger-2">
                    Dokumen prosedur standar operasional layanan UPT TIK UNIBA Madura
                </p>
            </div>
        </div>

        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">
            <svg class="relative block w-full h-12" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path
                    d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                    class="fill-gray-50"></path>
            </svg>
        </div>
    </section>

    {{-- SOP List Section --}}
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12 scroll-animate">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Dokumen SOP</h2>
                <div class="w-20 h-1 bg-uniba-yellow mx-auto mb-4"></div>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Download dokumen Standard Operating Procedure untuk berbagai layanan TIK
                </p>
            </div>

            @if ($sopItems->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-6xl mx-auto">
                    @foreach ($sopItems as $index => $sop)
                        <div class="scroll-animate stagger-{{ ($index % 4) + 1 }}">
                            <div
                                class="bg-white rounded-2xl shadow-lg overflow-hidden border-2 border-gray-100 hover:border-red-500 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 group h-full flex flex-col">
                                {{-- Header with PDF Icon --}}
                                <div
                                    class="relative h-32 bg-gradient-to-br from-red-500 to-red-700 flex items-center justify-center">
                                    <div
                                        class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]">
                                    </div>
                                    <div class="relative z-10 text-center">
                                        <div
                                            class="w-16 h-16 bg-white bg-opacity-20 backdrop-blur-sm rounded-2xl flex items-center justify-center mx-auto group-hover:scale-110 transition-transform duration-300">
                                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zm-1 2l5 5h-5V4zm-3 9v6h-2v-4H7v-2h6zm3 0v6h-2v-6h2zm3 0v6h-2v-6h2z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                {{-- Content --}}
                                <div class="p-6 flex-grow flex flex-col">
                                    <h3
                                        class="text-lg font-bold text-gray-900 mb-3 group-hover:text-red-600 transition-colors">
                                        {{ $sop->judul }}
                                    </h3>

                                    @if ($sop->deskripsi)
                                        <div class="prose prose-sm max-w-none text-gray-600 flex-grow mb-4 line-clamp-3">
                                            {!! Str::limit(strip_tags($sop->deskripsi), 150) !!}
                                        </div>
                                    @else
                                        <p class="text-gray-400 italic text-sm flex-grow mb-4">Tidak ada deskripsi</p>
                                    @endif

                                    {{-- Download Button --}}
                                    <a href="{{ asset('storage/' . $sop->file) }}" target="_blank"
                                        class="inline-flex items-center justify-center gap-2 w-full px-4 py-3 bg-red-50 text-red-600 font-semibold rounded-xl hover:bg-red-100 transition-colors duration-200 group/btn">
                                        <svg class="w-5 h-5 group-hover/btn:animate-bounce" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                        </svg>
                                        Download PDF
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                {{-- Empty State --}}
                <div class="text-center py-16">
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Belum Ada Dokumen SOP</h3>
                    <p class="text-gray-500 max-w-md mx-auto">
                        Dokumen Standard Operating Procedure belum tersedia untuk ditampilkan saat ini.
                    </p>
                </div>
            @endif
        </div>
    </section>

    {{-- Info Section --}}
    <section class="py-16 bg-white scroll-animate">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl p-8 border border-blue-100">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">Tentang SOP</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Standard Operating Procedure (SOP) adalah dokumen yang berisi serangkaian instruksi tertulis
                                yang dibakukan mengenai berbagai proses penyelenggaraan aktivitas organisasi, bagaimana dan
                                kapan harus dilakukan, dimana dan oleh siapa dilakukan. SOP ini bertujuan untuk menjamin
                                konsistensi dan kualitas layanan yang diberikan oleh UPT TIK UNIBA Madura.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-16 bg-gradient-to-r from-uniba-blue to-blue-800 scroll-animate">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl font-bold text-white mb-4">
                    Butuh Bantuan?
                </h2>
                <p class="text-blue-100 mb-8 text-lg">
                    Jika Anda memiliki pertanyaan terkait SOP atau membutuhkan bantuan, silakan hubungi kami
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="/fasilitas"
                        class="px-8 py-3 bg-uniba-yellow text-uniba-blue font-bold rounded-lg hover:bg-yellow-400 transition shadow-lg transform hover:-translate-y-1">
                        Lihat Fasilitas
                    </a>
                    <a href="#"
                        class="px-8 py-3 bg-white text-uniba-blue font-bold rounded-lg hover:bg-gray-100 transition shadow-lg transform hover:-translate-y-1">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection
