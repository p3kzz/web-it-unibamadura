<div x-data="{
    open: false,
    form: {
        id: null,
        name: '',
        start_year: '',
        end_year: '',
        is_active: false
    }
}"
    x-on:open-edit-periode.window="
        open = true;
        form = {
            id: $event.detail.id,
            name: $event.detail.name,
            start_year: $event.detail.start_year,
            end_year: $event.detail.end_year,
            is_active: Boolean($event.detail.is_active)
        }
    "
    x-show="open" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm">

    <div @click.away="open = false" class="bg-white rounded-2xl w-full max-w-lg shadow-xl overflow-hidden">

        <div class="bg-uniba-blue px-6 py-4">
            <h3 class="text-lg font-bold text-white">
                Edit Periode
            </h3>
            <p class="text-sm text-orange-100">
                Perbarui data periode
            </p>
        </div>

        <form method="POST" :action="`/admin/periode/${form.id}`" class="p-6 space-y-5">

            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">
                    Nama Periode <span class="text-red-500">*</span>
                </label>
                <input type="text" name="name" x-model="form.name"
                    class="w-full border-2 border-gray-300 rounded-lg px-4 py-2
                        focus:border-orange-500 focus:ring-orange-500">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">
                        Tahun Mulai
                    </label>
                    <input type="number" name="start_year" x-model="form.start_year"
                        class="w-full border-2 border-gray-300 rounded-lg px-4 py-2">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">
                        Tahun Selesai
                    </label>
                    <input type="number" name="end_year" x-model="form.end_year"
                        class="w-full border-2 border-gray-300 rounded-lg px-4 py-2">
                </div>
            </div>
            <input type="hidden" name="is_active" value="0">
            <div class="flex items-center gap-3">
                <input type="checkbox" name="is_active" value="1" x-model="form.is_active"
                    class="w-5 h-5 text-orange-500 border-gray-300 rounded">

                <label class="text-sm text-gray-700">
                    Jadikan sebagai periode aktif
                </label>
            </div>
            <div class="flex justify-end gap-3 pt-4 border-t">
                <button type="button" @click="open = false" class="px-4 py-2 bg-gray-100 rounded-lg hover:bg-gray-200">
                    Batal
                </button>

                <button type="submit" class="px-5 py-2 bg-uniba-blue text-white rounded-lg hover:bg-blue-600">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
