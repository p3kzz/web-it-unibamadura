<div x-data="{ open: false }" x-on:open-create-periode.window="open = true" x-show="open" x-cloak
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm">

    <div @click.away="open = false" class="bg-white rounded-2xl w-full max-w-lg shadow-xl overflow-hidden">
        <div class="bg-uniba-blue px-6 py-4">
            <h3 class="text-lg font-bold text-white">
                Tambah Periode
            </h3>
            <p class="text-sm text-blue-100">
                Isi periode kerja / kepengurusan
            </p>
        </div>

        <form method="POST" action="{{ route('admin.periode.store') }}" class="p-6 space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">
                    Nama Periode <span class="text-red-500">*</span>
                </label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Contoh: Periode 2024–2028"
                    class="w-full border-2 border-gray-300 rounded-lg px-4 py-2
                        focus:border-uniba-blue focus:ring-uniba-blue">

                @error('name')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">
                        Tahun Mulai <span class="text-red-500">*</span>
                    </label>
                    <input type="number" name="start_year" value="{{ old('start_year') }}" placeholder="2024"
                        class="w-full border-2 border-gray-300 rounded-lg px-4 py-2">

                    @error('start_year')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">
                        Tahun Selesai <span class="text-red-500">*</span>
                    </label>
                    <input type="number" name="end_year" value="{{ old('end_year') }}" placeholder="2028"
                        class="w-full border-2 border-gray-300 rounded-lg px-4 py-2">

                    @error('end_year')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <input type="hidden" name="is_active" value="0">
            <div class="flex items-center gap-3">
                <input type="checkbox" name="is_active" value="1"
                    class="w-5 h-5 text-orange-500 border-gray-300 rounded">

                <label class="text-sm text-gray-700">
                    Jadikan sebagai periode aktif
                </label>
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t">
                <button type="button" @click="open = false" class="px-4 py-2 bg-gray-100 rounded-lg hover:bg-gray-200">
                    Batal
                </button>

                <button type="submit" class="px-5 py-2 bg-uniba-blue text-white rounded-lg hover:bg-blue-800">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
