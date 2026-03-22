<div x-data="{
    open: false,
    item: {
        id: '',
        struktur_organisasi_id: '',
        name: '',
        type: 'directorate',
        parent_id: '',
        description: ''
    },
    initEdit(data) {
        this.item = {
            id: data.id || '',
            struktur_organisasi_id: data.struktur_organisasi_id || '',
            name: data.name || '',
            type: data.type || 'directorate',
            parent_id: data.parent_id || '',
            description: data.description || ''
        };
        $nextTick(() => {
            initSummernote('edit-unit-description', data.description || '');
        });
    },
}" x-on:open-edit-unit.window="open = true; initEdit($event.detail);" x-show="open" x-cloak
    @click.self="open = false"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm p-4">

    <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
        @keydown.escape="open = false"
        class="bg-white rounded-2xl w-full max-w-2xl shadow-2xl overflow-hidden max-h-[90vh] flex flex-col">

        {{-- Header --}}
        <div class="bg-amber-500 px-6 py-4 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                        </path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-white">Edit Unit Organisasi</h3>
                    <p class="text-amber-100 text-sm">Perbarui data unit</p>
                </div>
            </div>
            <button @click="open = false" class="text-white hover:bg-white/20 rounded-lg p-2 transition-all">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>

        {{-- Form --}}
        <form method="POST" :action="`{{ url('admin_tik/unit-organisasi') }}/${item?.id}`"
            class="flex-1 overflow-y-auto">
            @csrf
            @method('PUT')
            <input type="hidden" name="struktur_organisasi_id" x-bind:value="item?.struktur_organisasi_id">

            <div class="p-6 space-y-5">
                {{-- Name --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Nama Unit <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="name" x-model="item.name" required
                        class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 outline-none transition-all"
                        placeholder="Contoh: Direktorat Teknologi Informasi">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Type --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Tipe Unit <span
                            class="text-red-500">*</span></label>
                    <div class="flex gap-4 p-3 bg-gray-50 rounded-xl border border-gray-200">
                        <label class="flex items-center gap-2 cursor-pointer group">
                            <input type="radio" name="type" value="directorate" x-model="item.type"
                                class="w-4 h-4 text-amber-500 border-gray-300 focus:ring-amber-500/20">
                            <span
                                class="text-sm font-semibold text-gray-600 group-hover:text-amber-600">Direktorat</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer group">
                            <input type="radio" name="type" value="subdirectorate" x-model="item.type"
                                class="w-4 h-4 text-amber-500 border-gray-300 focus:ring-amber-500/20">
                            <span
                                class="text-sm font-semibold text-gray-600 group-hover:text-amber-600">Subdirektorat</span>
                        </label>
                    </div>
                </div>

                {{-- Parent (for subdirectorate) --}}
                @if (isset($directorates) && $directorates->count() > 0)
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Parent Direktorat</label>
                        <select name="parent_id" x-model="item.parent_id"
                            class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 outline-none transition-all">
                            <option value="">Tidak ada (Unit tingkat atas)</option>
                            @foreach ($directorates as $dir)
                                <option value="{{ $dir->id }}">{{ $dir->name }}</option>
                            @endforeach
                        </select>
                        <p class="text-xs text-gray-500 mt-1">Pilih jika ini adalah subdirektorat</p>
                    </div>
                @endif

                {{-- Description with Summernote --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Deskripsi</label>
                    <x-form-summernote id="edit-unit-description" name="description" value="" :height="200"
                        placeholder="Deskripsi tugas dan fungsi unit..." />
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Footer --}}
            <div class="p-6 bg-gray-50 border-t border-gray-200 flex items-center justify-between">
                <span class="text-xs text-gray-500"><span class="text-red-500">*</span> Wajib diisi</span>
                <div class="flex gap-3">
                    <button type="button" @click="open = false"
                        class="px-5 py-2.5 bg-white border border-gray-300 text-gray-700 font-semibold rounded-xl hover:bg-gray-50 transition-all">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-5 py-2.5 bg-amber-500 text-white font-semibold rounded-xl shadow-md shadow-amber-200 hover:bg-amber-600 transform hover:-translate-y-0.5 transition-all flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        Perbarui
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
