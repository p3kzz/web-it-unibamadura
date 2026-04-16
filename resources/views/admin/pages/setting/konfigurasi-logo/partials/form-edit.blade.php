<div x-data="{
    open: false,
    form: {
        id: null,
        nama_web: '',
        logo_web: '',
        is_active: false
    },
    logoPreview: null,

    fileChosen(event) {
        const file = event.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = (e) => { this.logoPreview = e.target.result; };
        reader.readAsDataURL(file);
    },
}"
    x-on:open-edit-konfigurasi-logo.window="
        open = true;
        form = {
            id: $event.detail.id,
            nama_web: $event.detail.nama_web,
            logo_web: $event.detail.logo_web,
            is_active: Boolean($event.detail.is_active)
        };
    "
    x-show="open" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm p-4">

    <div @click.away="open = false" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="bg-white rounded-2xl w-full max-w-2xl shadow-2xl overflow-hidden">

        <div class="bg-uniba-blue px-6 py-4 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                        </path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-white">
                        Edit
                    </h3>
                    <p class="text-blue-100 text-sm">
                        Perbarui data
                    </p>
                </div>
            </div>
            <button @click="open = false"
                class="text-white hover:bg-white hover:bg-opacity-20 rounded-lg p-2 transition-all duration-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>

        <form method="POST" :action="`/admin_tik/konfigurasi-logo/${form.id}`" class="p-6">
            @csrf
            @method('PUT')

            <div class="space-y-5">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">
                        Nama Website <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="nama_web" x-model="form.nama_web" placeholder="Contoh: Nama Website"
                        class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5
                            focus:border-uniba-blue focus:ring-2 focus:ring-uniba-blue focus:ring-opacity-20 transition-all duration-200 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Logo</label>
                    <div class="flex items-center gap-4 p-3 border-2 border-dashed border-gray-200 rounded-xl">
                        <div class="relative w-20 h-20 flex-shrink-0">
                            <template x-if="logoPreview">
                                <img :src="logoPreview"
                                    class="w-20 h-20 rounded-lg object-cover border border-uniba-blue">
                            </template>
                            <template x-if="form.logo_web && !logoPreview">
                                <img :src="'{{ asset('storage') }}/' + form.logo_web"
                                    class="w-20 h-20 rounded-lg object-cover">
                            </template>
                            <template x-if="!logoPreview && !form.logo_web">
                                <div
                                    class="w-20 h-20 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                            </template>
                        </div>
                        <div class="flex-1">
                            <input type="file" name="logo_web" value="form.logo_web" accept="image/*"
                                @change="fileChosen"
                                class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-blue-50 file:text-uniba-blue hover:file:bg-blue-100 transition-all">
                        </div>
                    </div>
                </div>

                <input type="hidden" name="is_active" value="0">
                <div class="flex items-center gap-3">
                    <input type="checkbox" name="is_active" value="1" x-model="form.is_active"
                        class="w-5 h-5 text-uniba-blue border-gray-300 rounded focus:ring-uniba-blue">

                    <label class="text-sm text-gray-700">
                        Jadikan sebagai periode aktif
                    </label>
                </div>
            </div>

            <div class="flex items-center justify-between gap-3 mt-8 pt-6 border-t border-gray-200">

                <div class="flex gap-3">
                    <button type="button" @click="open = false"
                        class="px-6 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-lg transition-all duration-200 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Batal
                    </button>
                    <button type="submit"
                        class="px-6 py-2.5 bg-uniba-blue hover:bg-blue-700 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transition-all duration-200 transform hover:-translate-y-0.5 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        Update Data
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
