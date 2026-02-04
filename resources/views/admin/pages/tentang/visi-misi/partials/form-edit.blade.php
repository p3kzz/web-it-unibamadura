<div x-data="{
    open: false,
    form: {}
}" x-on:open-edit.window="open = true; form = $event.detail" x-show="open" x-cloak
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">

    <div class="bg-white rounded-xl w-full max-w-lg p-6">
        <h3 class="text-lg font-bold mb-4">
            Edit {{ ucfirst($section) }}
        </h3>

        <form :action="`/admin/visi-misi/${form.id}`" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-sm font-semibold mb-1">Konten</label>
                <textarea name="content" rows="4" class="w-full border rounded-lg px-3 py-2" x-model="form.content" required></textarea>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-semibold mb-1">Urutan</label>
                <input type="number" name="order" class="w-full border rounded-lg px-3 py-2" x-model="form.order">
            </div>

            <div class="flex justify-end gap-2">
                <button type="button" @click="open = false" class="px-4 py-2 bg-gray-200 rounded-lg">
                    Batal
                </button>
                <button type="submit" class="px-4 py-2 bg-uniba-blue text-white rounded-lg">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
