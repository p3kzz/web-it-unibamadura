<div x-data="{
    open: false,
    form: {
        id: '',
        slug: '',
        title: '',
        description: '',
        is_active: false
    },
    sections: [],

    newSection(payload = {}) {
        return {
            uid: Date.now().toString(36) + Math.random().toString(36).slice(2),
            title: payload.title || '',
            content: payload.content || ''
        };
    },

    initEditor(section, index) {
        this.$nextTick(() => {
            const editorId = `edit-hosting-content-${section.uid}`;
            const $el = $('#' + editorId);

            if (!$el.length) return;

            initSummernote(editorId, section.content || '');
            $el.off('summernote.change').on('summernote.change', (event, contents) => {
                this.sections[index].content = contents;
                $el.val(contents);
            });
        });
    },

    syncEditor(section, index) {
        const editorId = `edit-hosting-content-${section.uid}`;
        const $el = $('#' + editorId);

        if (!$el.length) return;

        const content = $el.next('.note-editor').length ? $el.summernote('code') : ($el.val() || '');
        this.sections[index].content = content;
        $el.val(content);
    },

    syncAllEditors() {
        this.sections.forEach((section, index) => this.syncEditor(section, index));
    },

    initAllEditors() {
        this.sections.forEach((section, index) => this.initEditor(section, index));
    },

    addSection() {
        this.sections.push(this.newSection());
        this.$nextTick(() => {
            this.initEditor(this.sections[this.sections.length - 1], this.sections.length - 1);
        });
    },

    removeSection(index) {
        if (this.sections.length <= 1) return;

        const section = this.sections[index];
        const editorId = `edit-hosting-content-${section.uid}`;
        const $el = $('#' + editorId);

        if ($el.length && $el.next('.note-editor').length) {
            $el.summernote('destroy');
        }

        this.sections.splice(index, 1);

        this.$nextTick(() => {
            this.initAllEditors();
        });
    }
}"
    x-on:open-edit-audit.window="
    form = {
        id: $event.detail.id,
        slug: $event.detail.slug,
        title: $event.detail.title,
        description: $event.detail.description || '',
        is_active: Boolean($event.detail.is_active)
    };

    sections = $event.detail.sections && $event.detail.sections.length > 0
        ? $event.detail.sections.map((section) => newSection({
            title: section.title,
            content: section.content || ''
        }))
        : [newSection()];

    open = true;
    $nextTick(() => initAllEditors());
"
    x-show="open" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm p-4">

    <div @click.away="open = false" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="bg-white rounded-2xl w-full max-w-4xl shadow-2xl overflow-hidden max-h-[90vh] overflow-y-auto">

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
                    <h3 class="text-xl font-bold text-white">Edit Audit</h3>
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

        <form :action="`/admin_tik/audit/${form.slug || form.id}`" method="POST" @submit="syncAllEditors()"
            class="p-6">
            @csrf
            @method('PUT')

            <div class="space-y-5">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">
                        Judul Audit <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="title" x-model="form.title"
                        class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-uniba-blue focus:ring-2 focus:ring-uniba-blue focus:ring-opacity-20 transition-all duration-200 outline-none"
                        placeholder="Contoh: Audit Internal" required>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Deskripsi Singkat</label>
                    <textarea name="description" rows="3" x-model="form.description"
                        class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-uniba-blue focus:ring-2 focus:ring-uniba-blue focus:ring-opacity-20 transition-all duration-200 outline-none resize-none"
                        placeholder="Masukkan deskripsi singkat penjaminan mutu audit..."></textarea>
                </div>

                <div class="border-t border-gray-200 pt-5">
                    <div class="flex items-center justify-between mb-4">
                        <label class="block text-sm font-bold text-gray-700">
                            Bagian Audit <span class="text-red-500">*</span>
                        </label>
                        <button type="button" @click="addSection()"
                            class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-green-100 hover:bg-green-200 text-green-700 text-xs font-semibold rounded-lg transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4"></path>
                            </svg>
                            Tambah Bagian
                        </button>
                    </div>

                    <template x-for="(section, index) in sections" :key="section.uid">
                        <div class="bg-gray-50 rounded-xl p-4 mb-4 border border-gray-200">
                            <div class="flex items-center justify-between mb-3">
                                <span class="text-sm font-semibold text-gray-600">Bagian <span
                                        x-text="index + 1"></span></span>
                                <button type="button" @click="removeSection(index)" x-show="sections.length > 1"
                                    class="inline-flex items-center gap-1 px-2 py-1 bg-red-100 hover:bg-red-200 text-red-600 text-xs font-semibold rounded-lg transition-colors">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                    Hapus
                                </button>
                            </div>

                            <div class="space-y-3">
                                <div>
                                    <label class="block text-xs font-semibold text-gray-500 mb-1">
                                        Judul Bagian <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" :name="`sections[${index}][title]`" x-model="section.title"
                                        class="w-full border-2 border-gray-300 rounded-lg px-4 py-2 text-sm focus:border-uniba-blue focus:ring-2 focus:ring-uniba-blue focus:ring-opacity-20 transition-all duration-200 outline-none"
                                        placeholder="Contoh: Audit Internal" required>
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-gray-500 mb-1">
                                        Konten <span class="text-red-500">*</span>
                                    </label>
                                    <x-form-summernote id="" name="" ::id="`edit-hosting-content-${section.uid}`" ::name="`sections[${index}][content]`"
                                        :value="''" height="180"
                                        placeholder="Masukkan konten bagian audit..." />
                                </div>
                            </div>
                        </div>
                    </template>
                </div>

                <input type="hidden" name="is_active" value="0">
                <div class="flex items-center gap-3">
                    <input type="checkbox" name="is_active" value="1" x-model="form.is_active"
                        class="w-5 h-5 text-orange-500 border-gray-300 rounded focus:ring-uniba-blue">
                    <label class="text-sm text-gray-700">Jadikan sebagai data aktif</label>
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
