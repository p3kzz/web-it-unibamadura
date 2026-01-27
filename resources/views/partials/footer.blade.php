<footer class="bg-gray-900 text-gray-300 py-12 border-t border-gray-800 scroll-animate">
    <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="animate-fade-in-up stagger-1">
            <h3 class="text-white text-lg font-bold mb-4">IT UNIBA MADURA</h3>
            <p class="text-sm leading-relaxed">
                Jl. Raya Lenteng No. 10, Batuan, Sumenep<br>
                Jawa Timur, Indonesia
            </p>
        </div>
        <div class="animate-fade-in-up stagger-2">
            <h3 class="text-white text-lg font-bold mb-4">Tautan Cepat</h3>
            <ul class="space-y-2 text-sm">
                <li><a href="#" class="hover:text-white transition-colors transform hover:translate-x-1 inline-block">SIAKAD</a></li>
                <li><a href="#" class="hover:text-white transition-colors transform hover:translate-x-1 inline-block">E-Learning</a></li>
                <li><a href="#" class="hover:text-white transition-colors transform hover:translate-x-1 inline-block">Pendaftaran Mahasiswa Baru</a></li>
            </ul>
        </div>
        <div class="animate-fade-in-up stagger-3">
            <h3 class="text-white text-lg font-bold mb-4">Media Sosial</h3>
            <div class="flex space-x-4">
                <a href="#" class="text-gray-400 hover:text-white transition-all transform hover:scale-110">Instagram</a>
                <a href="#" class="text-gray-400 hover:text-white transition-all transform hover:scale-110">Facebook</a>
                <a href="#" class="text-gray-400 hover:text-white transition-all transform hover:scale-110">YouTube</a>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 mt-12 pt-8 border-t border-gray-800 flex flex-col md:flex-row justify-between items-center text-sm text-gray-500">
        <p>&copy; {{ date('Y') }} UPT TIK Universitas Bahaudin Mudhary Madura.</p>
        <p class="mt-2 md:mt-0 flex items-center gap-1">
            Developed by
            <button @click="devModalOpen = true" class="text-uniba-yellow hover:underline font-bold focus:outline-none transform hover:scale-105 transition-transform">
                [Muhammad Afifullah]
            </button>
        </p>
    </div>
</footer>
