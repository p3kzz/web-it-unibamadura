<div class="bg-gray-50 rounded-xl border border-gray-200 overflow-hidden">
    <div class="p-4">
        <div class="flex items-start gap-3">
            <img src="{{ $p->foto_url }}" alt="{{ $p->nama }}"
                class="w-14 h-14 rounded-xl object-cover border-2 border-gray-200 flex-shrink-0">
            <div class="flex-1 min-w-0">
                <p class="font-bold text-gray-800">{{ $p->nama }}</p>
                <p class="text-sm text-gray-500">{{ $p->jabatan }}</p>
                @php
                    $currentUnit = $p->penugasan->where('is_primary', true)->first()?->unitOrganisasi;
                @endphp
                @if ($currentUnit)
                    <span
                        class="inline-flex items-center px-2 py-0.5 mt-1 rounded-full text-xs font-semibold {{ $currentUnit->type === 'directorate' ? 'bg-blue-100 text-blue-800' : 'bg-purple-100 text-purple-800' }}">
                        {{ $currentUnit->name }}
                    </span>
                @endif
            </div>
            <span
                class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold {{ $p->status === 'aktif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                {{ ucfirst($p->status) }}
            </span>
        </div>

        {{-- Sertifikasi --}}
        @if ($p->sertifikasi && count($p->sertifikasi) > 0)
            <div class="mt-3 pt-3 border-t border-gray-200">
                <p class="text-xs font-semibold text-gray-500 uppercase mb-2">Sertifikasi</p>
                <div class="flex flex-wrap gap-1">
                    @foreach ($p->sertifikasi as $sertif)
                        <span
                            class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            {{ $sertif }}
                        </span>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

    {{-- Actions --}}
    <div class="px-4 pb-3 flex gap-2">
        <button @click="$dispatch('open-show-pegawai', {{ json_encode($p) }})"
            class="flex-1 inline-flex items-center justify-center gap-1 px-3 py-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold rounded-lg transition-all">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            Detail
        </button>
        <button @click="$dispatch('open-edit-pegawai', {{ json_encode($p) }})"
            class="flex-1 inline-flex items-center justify-center gap-1 px-3 py-2 bg-orange-600 hover:bg-orange-700 text-white text-xs font-semibold rounded-lg transition-all">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
            Edit
        </button>
        <form action="{{ route('admin.tentang.pegawai.destroy', $p) }}" method="POST" class="flex-1"
            onsubmit="return confirm('Yakin ingin menghapus pegawai ini?')">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="w-full inline-flex items-center justify-center gap-1 px-3 py-2 bg-red-600 hover:bg-red-700 text-white text-xs font-semibold rounded-lg transition-all">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
                Hapus
            </button>
        </form>
    </div>
</div>
