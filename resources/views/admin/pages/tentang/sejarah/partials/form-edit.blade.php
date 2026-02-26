<div x-data="{
    open: false,
    form: {
        id: '',
        title: '',
        sub_title: '',
        content: '',
        extras: [],
        is_active: false
    }
}"
    x-on:open-edit-histories.window="
        open = true;
        form = {
            id: $event.detail.id,
            title: $event.detail.title,
            sub_title: $event.detail.sub_title ?? '',
            content: $event.detail.content,
            extras: Array.isArray($event.detail.extras) ? $event.detail.extras : ($event.detail.extras ? [$event.detail.extras] : ['']),
            is_active: Boolean($event.detail.is_active)
        }
    "
    x-show="open" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm p-4">

    <div @click.away="open = false" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="bg-white rounded-2xl w-full max-w-2xl shadow-2xl overflow-hidden max-h-[90vh] flex flex-col">

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
                        Edit {{ ucfirst($section) }}
                    </h3>
                    <p class="text-orange-100 text-sm">Perbarui data yang sudah ada</p>
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

        <form :action="`{{ route('admin.tentang.histories.destroy', ':id') }}`.replace(':id', form.id)" method="POST"
            class="p-6 overflow-y-auto flex-1">
            @csrf
            @method('PUT')
            <input type="hidden" name="type" value="{{ $section }}">

            <div class="space-y-5">

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">
                        Title {{ ucfirst($section) }}
                        <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="title" x-model="form.title"
                        class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-uniba-blue focus:ring-2 focus:ring-uniba-blue focus:ring-opacity-20 transition-all duration-200 outline-none"
                        placeholder="Masukkan judul {{ $section }}" required>
                    @error('title')
                        <p class="mt-1 text-sm text-red-600 flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                @if (in_array($section, ['timeline']))
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            Sub Title {{ ucfirst($section) }}
                            <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="sub_title" x-model="form.sub_title"
                            class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-uniba-blue focus:ring-2 focus:ring-uniba-blue focus:ring-opacity-20 transition-all duration-200 outline-none"
                            placeholder="Masukkan sub judul {{ $section }}" required>
                        @error('sub_title')
                            <p class="mt-1 text-sm text-red-600 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                @endif

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">
                        Konten {{ ucfirst($section) }}
                        <span class="text-red-500">*</span>
                    </label>
                    <textarea name="content" rows="5" x-model="form.content"
                        class="w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-uniba-blue focus:ring-2 focus:ring-uniba-blue focus:ring-opacity-20 transition-all duration-200 outline-none resize-none"
                        placeholder="Masukkan konten {{ $section }} dengan detail..." required></textarea>
                    <p class="mt-1 text-xs text-gray-500 flex items-center gap-1">
                        Tuliskan konten dengan jelas dan detail
                    </p>
                    @error('content')
                        <p class="mt-1 text-sm text-red-600 flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                @if (in_array($section, ['timeline', 'vision']))
                    <div x-data="{}">
                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            {{ $section === 'timeline' ? 'Highlights' : 'Tags / Badges' }}
                            <span class="text-red-500">*</span>
                        </label>

                        <template x-for="(item, index) in form.extras" :key="index">
                            <div class="flex gap-2 mb-2">
                                <input type="text" name="extras[]"
                                    class="w-full border-2 border-gray-300 rounded-lg px-3 py-2 focus:border-uniba-blue outline-none"
                                    placeholder="Masukkan {{ $section === 'timeline' ? 'highlight' : 'tag' }}"
                                    x-model="form.extras[index]">
                                <button type="button" @click="form.extras.splice(index, 1)"
                                    class="px-3 bg-red-500 text-white rounded-lg">
                                    ✕
                                </button>
                            </div>
                        </template>

                        <button type="button" @click="form.extras.push('')"
                            class="text-sm text-uniba-blue font-semibold">
                            + Tambah
                        </button>
                    </div>
                @endif
                <input type="hidden" name="is_active" value="0">
                <div class="flex items-center gap-3">
                    <input type="checkbox" name="is_active" value="1" x-model="form.is_active"
                        class="w-5 h-5 text-orange-500 border-gray-300 rounded">
                    <label class="text-sm text-gray-700">
                        Jadikan sebagai {{ $section }} aktif
                    </label>
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
