<div x-data="{
    open: false,
    form: {
        id: '',
        nama: '',
        deskripsi: '',
        image: '',
        is_active: false
    },
    imagePreview: null,
    existingGalleryImages: [],
    newGalleryPreviews: [],
    fileChosen(event) {
        const file = event.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = (e) => { this.imagePreview = e.target.result; };
        reader.readAsDataURL(file);
    },
    async refreshTable() {
        try {
            const response = await fetch(window.location.href, {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            });
            if (response.ok) {
                const html = await response.text();
                const container = document.getElementById('ajax-table-container');
                if (container) container.innerHTML = html;
            }
        } catch (e) {}
    },
    async deleteExistingImage(imageId, index) {
        const result = await Swal.fire({
            title: 'Hapus gambar?',
            text: 'Gambar akan dihapus permanen',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc2626',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        });

        if (result.isConfirmed) {
            try {
                const response = await fetch(`/admin_tik/fasilitas/gallery/${imageId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content,
                        'Accept': 'application/json'
                    }
                });

                const data = await response.json();

                if (response.ok && data.success) {
                    this.existingGalleryImages.splice(index, 1);
                    await this.refreshTable();
                    Swal.fire('Berhasil!', 'Gambar telah dihapus', 'success');
                } else {
                    Swal.fire('Error', data.message || 'Gagal menghapus gambar', 'error');
                }
            } catch (error) {
                Swal.fire('Error', 'Gagal menghapus gambar', 'error');
            }
        }
    },
    handleNewGalleryImages(event) {
        const files = Array.from(event.target.files);
        const totalImages = this.existingGalleryImages.length + this.newGalleryPreviews.length + files.length;

        if (totalImages > 10) {
            Swal.fire('Error', 'Maksimal 10 gambar galeri', 'error');
            event.target.value = '';
            return;
        }

        files.forEach(file => {
            const reader = new FileReader();
            reader.onload = (e) => {
                this.newGalleryPreviews.push(e.target.result);
            };
            reader.readAsDataURL(file);
        });
    }
}"
    x-on:open-edit-fasilitas.window="
        open = true;
        form = {
            id: $event.detail.id,
            nama: $event.detail.nama,
            deskripsi: $event.detail.deskripsi || '',
            image: $event.detail.image || '',
            is_active: Boolean($event.detail.is_active)
        };
        imagePreview = form.image ? '/storage/' + form.image : null;
        existingGalleryImages = $event.detail.gallery_images || [];
        newGalleryPreviews = [];
        $nextTick(() => {
            initSummernote('deskripsi-edit', form.deskripsi);
        });
    "
    x-show="open" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm p-4">

    <div @click.away="open = false" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="bg-white rounded-2xl w-full max-w-2xl shadow-2xl overflow-hidden max-h-[90vh] overflow-y-auto">

        <div class="bg-uniba-blue px-6 py-4 flex items-center justify-between sticky top-0 z-10">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                        </path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-white">Edit Fasilitas</h3>
                    <p class="text-blue-100 text-sm">Perbarui data yang sudah ada</p>
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

        <form :action="`{{ url('admin_tik/fasilitas') }}/${form.id}`" method="POST" enctype="multipart/form-data"
            class="p-6">
            @csrf
            @method('PUT')

            <div class="space-y-5">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">
                        Nama Fasilitas <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="nama" x-model="form.nama"
                        class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-uniba-blue focus:ring-2 focus:ring-uniba-blue focus:ring-opacity-20 transition-all duration-200 outline-none"
                        placeholder="Contoh: Laboratorium Komputer" required>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">
                        Deskripsi <span class="text-red-500">*</span>
                    </label>
                    <x-form-summernote id="deskripsi-edit" name="deskripsi" :value="''" height="200" />
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Gambar Fasilitas</label>
                    <div class="flex items-start gap-4">
                        <div class="relative w-24 h-24 flex-shrink-0">
                            <template x-if="imagePreview">
                                <img :src="imagePreview"
                                    class="w-24 h-24 rounded-lg object-cover border-2 border-gray-200">
                            </template>
                            <template x-if="!imagePreview">
                                <div
                                    class="w-24 h-24 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400 border-2 border-dashed border-gray-300">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                            </template>
                        </div>
                        <div class="flex-1">
                            <input type="file" name="image" accept="image/*" @change="fileChosen"
                                class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-uniba-blue focus:ring-2 focus:ring-uniba-blue focus:ring-opacity-20 transition-all duration-200 outline-none file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            <p class="mt-1 text-xs text-gray-500">Format: JPEG, PNG, JPG, WEBP. Maksimal 2MB. Biarkan
                                kosong jika tidak ingin mengubah.</p>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Galeri Gambar</label>
                    <div class="space-y-3">
                        <div x-show="existingGalleryImages.length > 0" class="mb-3">
                            <p class="text-xs text-gray-500 mb-2">Gambar yang sudah ada. Klik X untuk menghapus.</p>
                            <div class="grid grid-cols-4 gap-3">
                                <template x-for="(img, index) in existingGalleryImages" :key="img.id">
                                    <div class="relative group">
                                        <img :src="img.url"
                                            class="w-full h-20 rounded-lg object-cover border-2 border-gray-200">
                                        <button type="button" @click="deleteExistingImage(img.id, index)"
                                            class="absolute -top-2 -right-2 w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center text-xs opacity-0 group-hover:opacity-100 transition-opacity">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <div x-show="newGalleryPreviews.length > 0" class="mb-3">
                            <p class="text-xs text-gray-600 mb-2">Gambar baru:</p>
                            <div class="grid grid-cols-4 gap-3">
                                <template x-for="(preview, index) in newGalleryPreviews" :key="'new-' + index">
                                    <div class="relative group">
                                        <img :src="preview"
                                            class="w-full h-20 rounded-lg object-cover border-2 border-green-300">
                                        <span
                                            class="absolute bottom-1 left-1 bg-green-500 text-white text-xs px-1 rounded">Baru</span>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <input type="file" name="gallery_images[]" accept="image/*" multiple
                            @change="handleNewGalleryImages"
                            class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-uniba-blue focus:ring-2 focus:ring-uniba-blue focus:ring-opacity-20 transition-all duration-200 outline-none file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        <p class="text-xs text-gray-500">Format: JPEG, PNG, JPG, WEBP. Maksimal 2MB per file. Maksimal
                            10 gambar total.</p>
                    </div>
                </div>

                <input type="hidden" name="is_active" value="0">
                <div class="flex items-center gap-3">
                    <input type="checkbox" name="is_active" value="1" x-model="form.is_active"
                        class="w-5 h-5 text-uniba-blue border-gray-300 rounded focus:ring-uniba-blue">
                    <label class="text-sm text-gray-700">Jadikan sebagai fasilitas aktif</label>
                </div>

            </div>

            <div class="flex items-center justify-between gap-3 mt-8 pt-6 border-t border-gray-200">
                <div class="text-sm text-gray-500 flex items-center gap-1">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="text-red-500">*</span> Field wajib diisi
                </div>
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
