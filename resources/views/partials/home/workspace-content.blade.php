<div class="lg:w-3/5 scroll-animate w-full mt-8 lg:mt-0">
    <div class="space-y-4 sm:space-y-6">
        {{-- Badge --}}
        <div class="inline-block bg-blue-100 text-blue-700 px-3 py-1.5 sm:px-4 sm:py-2 rounded-full text-xs sm:text-sm font-semibold animate-fade-in">
            Premium Features
        </div>

        {{-- Title --}}
        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-900 leading-tight animate-fade-in stagger-1">
            Kolaborasi Tanpa Batas dengan <span class="text-blue-600">Google Workspace</span>
        </h2>

        {{-- Description --}}
        <p class="text-sm sm:text-base lg:text-lg text-gray-600 leading-relaxed animate-fade-in stagger-2">
            Setiap mahasiswa dan dosen UNIBA Madura mendapatkan akun Google Workspace for Education dengan
            penyimpanan cloud <strong class="text-blue-600">unlimited</strong>, email institusi profesional, dan fitur premium Google Meet untuk pembelajaran jarak jauh.
        </p>

        {{-- Benefits List --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4 animate-fade-in stagger-3">
            @php
            $benefits = [
                ['title' => 'Penyimpanan Unlimited', 'desc' => 'Storage tanpa batas untuk semua file', 'color' => 'green'],
                ['title' => 'Email Profesional', 'desc' => '@uniba-madura.ac.id', 'color' => 'blue'],
                ['title' => 'Google Meet Premium', 'desc' => 'Meeting hingga 500 peserta', 'color' => 'purple'],
                ['title' => 'Kolaborasi Real-time', 'desc' => 'Edit dokumen bersama tim', 'color' => 'yellow']
            ];
            @endphp

            @foreach($benefits as $benefit)
            <div class="flex items-start gap-2 sm:gap-3 bg-white p-3 sm:p-4 rounded-xl shadow-sm hover:shadow-md transition-shadow">
                <div class="w-8 h-8 sm:w-10 sm:h-10 bg-{{ $benefit['color'] }}-100 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5 text-{{ $benefit['color'] }}-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <div>
                    <h4 class="font-semibold text-sm sm:text-base text-gray-900">{{ $benefit['title'] }}</h4>
                    <p class="text-xs sm:text-sm text-gray-600">{{ $benefit['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Buttons --}}
        <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 animate-fade-in stagger-4">
            <a href="https://support.google.com/a/answer/10403871?hl=id" target="_blank"
                class="px-5 sm:px-6 py-2.5 sm:py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-semibold text-xs sm:text-sm shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-2">
                <span>Aktivasi Akun Sekarang</span>
                <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>
            <a href="#" class="px-5 sm:px-6 py-2.5 sm:py-3 bg-white border-2 border-blue-600 text-blue-600 rounded-lg hover:bg-blue-50 font-semibold text-xs sm:text-sm transform hover:-translate-y-1 transition-all duration-300 text-center">
                Pelajari Lebih Lanjut
            </a>
        </div>
    </div>
</div>
