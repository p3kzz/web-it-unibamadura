<div class="space-y-4">
    @php
    $pengumuman = [
        [
            'title' => 'Jadwal Maintenance Server SIAKAD',
            'content' => 'Server akan dimatikan sementara pada tanggal 30 Januari pukul 00:00 WIB.',
            'badge' => 'Penting',
            'badge_color' => 'red'
        ],
        [
            'title' => 'Batas Akhir Validasi Email',
            'content' => 'Mahasiswa baru harap melakukan validasi sebelum UTS dimulai.',
            'badge' => 'Info',
            'badge_color' => 'yellow'
        ]
    ];
    @endphp

    @foreach($pengumuman as $item)
    <div class="bg-white p-4 border-l-4 border-{{ $item['badge_color'] }}-500 shadow-sm rounded-r-lg flex items-start hover:shadow-md transition-shadow duration-300 transform hover:translate-x-1">
        <div class="flex-1">
            <h4 class="font-bold text-gray-800 hover:text-{{ $item['badge_color'] }}-600 cursor-pointer transition-colors">
                {{ $item['title'] }}
            </h4>
            <p class="text-sm text-gray-600 mt-1">{{ $item['content'] }}</p>
        </div>
        <span class="text-xs font-bold bg-{{ $item['badge_color'] }}-100 text-{{ $item['badge_color'] }}-{{ $item['badge_color'] == 'yellow' ? '700' : '600' }} px-2 py-1 rounded {{ $item['badge_color'] == 'red' ? 'animate-pulse-slow' : '' }}">
            {{ $item['badge'] }}
        </span>
    </div>
    @endforeach
</div>
