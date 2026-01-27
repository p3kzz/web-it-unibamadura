<div class="grid md:grid-cols-2 gap-6">
    @php
    $berita = [
        [
            'image' => 'https://images.unsplash.com/photo-1517048676732-d65bc937f952?auto=format&fit=crop&w=600&q=80',
            'category' => 'PRESTASI',
            'title' => 'Mahasiswa TI Juarai Hackathon Nasional',
            'excerpt' => 'Tim mahasiswa UNIBA berhasil menyabet juara 1 kategori Smart City App.'
        ],
        [
            'image' => 'https://images.unsplash.com/photo-1531545514256-b1400bc00f31?auto=format&fit=crop&w=600&q=80',
            'category' => 'KEGIATAN',
            'title' => 'Kunjungan Industri ke Jakarta',
            'excerpt' => 'Mengenal lebih dekat ekosistem startup unicorn di Indonesia.'
        ]
    ];
    @endphp

    @foreach($berita as $item)
    <article class="bg-white rounded-lg shadow-sm overflow-hidden group hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
        <div class="h-40 overflow-hidden">
            <img src="{{ $item['image'] }}" 
                alt="{{ $item['title'] }}"
                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
        </div>
        <div class="p-5">
            <span class="text-xs text-uniba-blue font-bold">{{ $item['category'] }}</span>
            <h3 class="font-bold text-gray-800 mt-1 mb-2 group-hover:text-uniba-blue transition-colors">
                {{ $item['title'] }}
            </h3>
            <p class="text-gray-500 text-sm line-clamp-2">{{ $item['excerpt'] }}</p>
        </div>
    </article>
    @endforeach
</div>
