<div x-data="{
    open: false,
    struktur_id: null,
    functions: [''],
    addFunction() {
        this.functions.push('');
    },
    removeFunction(index) {
        if (this.functions.length > 1) {
            this.functions.splice(index, 1);
        }
    }
}"
    x-on:open-create-unit.window="open = true; struktur_id = $event.detail.struktur_id; functions = [''];" x-show="open"
    x-cloak @click.self="open = false"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm p-4">

    <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
        @keydown.escape="open = false"
        class="bg-white rounded-2xl w-full max-w-xl shadow-2xl overflow-hidden max-h-[90vh] flex flex-col">

        {{-- Header --}}
        <div class="bg-emerald-500 px-6 py-4 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-white">Tambah Unit Organisasi</h3>
                    <p class="text-emerald-100 text-sm">Direktorat atau Subdirektorat</p>
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
        <form method="POST" action="{{ route('admin.tentang.unit-organisasi.store') }}" class="flex-1 overflow-y-auto">
            @csrf
            <input type="hidden" name="struktur_organisasi_id" x-bind:value="struktur_id">

            <div class="p-6 space-y-5">
                {{-- Name --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Nama Unit <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="name" required
                        class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none transition-all"
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
                            <input type="radio" name="type" value="directorate" checked
                                class="w-4 h-4 text-emerald-500 border-gray-300 focus:ring-emerald-500/20">
                            <span
                                class="text-sm font-semibold text-gray-600 group-hover:text-emerald-600">Direktorat</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer group">
                            <input type="radio" name="type" value="subdirectorate"
                                class="w-4 h-4 text-emerald-500 border-gray-300 focus:ring-emerald-500/20">
                            <span
                                class="text-sm font-semibold text-gray-600 group-hover:text-emerald-600">Subdirektorat</span>
                        </label>
                    </div>
                </div>

                {{-- Parent (for subdirectorate) --}}
                @if (isset($directorates) && $directorates->count() > 0)
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Parent Direktorat</label>
                        <select name="parent_id"
                            class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none transition-all">
                            <option value="">Tidak ada (Unit tingkat atas)</option>
                            @foreach ($directorates as $dir)
                                <option value="{{ $dir->id }}">{{ $dir->name }}</option>
                            @endforeach
                        </select>
                        <p class="text-xs text-gray-500 mt-1">Pilih jika ini adalah subdirektorat</p>
                    </div>
                @endif

                {{-- Tasks --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Tugas</label>
                    <textarea name="tasks" rows="3"
                        class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none transition-all resize-none"
                        placeholder="Deskripsi tugas unit ini..."></textarea>
                </div>

                {{-- Functions (dynamic) --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Fungsi</label>
                    <div class="space-y-2">
                        <template x-for="(func, index) in functions" :key="index">
                            <div class="flex gap-2">
                                <input type="text" :name="`functions[${index}]`" x-model="functions[index]"
                                    class="flex-1 border-2 border-gray-300 rounded-lg px-4 py-2 focus:border-emerald-500 outline-none transition-all text-sm"
                                    placeholder="Masukkan fungsi...">
                                <button type="button" @click="removeFunction(index)" x-show="functions.length > 1"
                                    class="w-10 h-10 bg-red-100 text-red-500 rounded-lg flex items-center justify-center hover:bg-red-200 transition-all">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                        </template>
                    </div>
                    <button type="button" @click="addFunction()"
                        class="mt-2 inline-flex items-center gap-1 text-sm text-emerald-600 hover:text-emerald-700 font-semibold">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4">
                            </path>
                        </svg>
                        Tambah Fungsi
                    </button>
                </div>

                {{-- Order --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Urutan</label>
                    <input type="number" name="order" value="0" min="0"
                        class="w-24 border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-emerald-500 outline-none transition-all">
                    <p class="text-xs text-gray-500 mt-1">Angka kecil ditampilkan lebih dulu</p>
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
                        class="px-5 py-2.5 bg-emerald-500 text-white font-semibold rounded-xl shadow-md shadow-emerald-200 hover:bg-emerald-600 transform hover:-translate-y-0.5 transition-all flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
