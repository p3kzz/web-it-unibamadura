{{-- @props(['name', 'title', 'action', 'method' => 'POST', 'maxWidth' => '2xl'])

<div x-data="{
    open: false,
    item: {},
    thumbnailPreview: null,

    fileChosen(event) {
        const file = event.target.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = e => this.thumbnailPreview = e.target.result;
        reader.readAsDataURL(file);
    },

    openCreate() {
        this.item = {};
        this.thumbnailPreview = null;
        this.open = true;
    },

    openEdit(data) {
        this.item = data;
        this.thumbnailPreview = null;
        this.open = true;
    }
}"
x-on:open-create-{{ $name }}.window="openCreate()"
    x-on:open-edit-{{ $name }}.window="openEdit($event.detail)" x-show="open" x-cloak
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm p-4">

    <div @click.away="open=false" x-show="open" x-transition
        class="bg-white rounded-2xl w-full max-w-{{ $maxWidth }} shadow-2xl overflow-hidden max-h-[90vh] flex flex-col">
        <div class="bg-uniba-blue px-6 py-4 flex items-center justify-between">

            <div class="flex items-center gap-3">

                <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                    {{ $icon ?? '' }}
                </div>

                <div>
                    <h3 class="text-xl font-bold text-white">
                        {{ $title }}
                    </h3>

                    <p class="text-blue-100 text-sm" x-show="item.id">
                        ID: <span x-text="item.id"></span>
                    </p>
                </div>

            </div>

            <button @click="open=false" class="text-white hover:bg-white/20 rounded-lg p-2">

                ✕

            </button>

        </div>

        <form method="POST" :action="item.slug ? `${{ json_encode($action) }}/${item.slug}` : '{{ $action }}'"
            enctype="multipart/form-data" class="flex flex-col flex-1">

            @csrf

            <template x-if="item.slug">
                <input type="hidden" name="_method" value="PUT">
            </template>

            <div class="flex-1 overflow-y-auto">

                {{ $slot }}

            </div>

            <div class="p-6 bg-gray-50 border-t border-gray-200 flex justify-end gap-3">

                <button type="button" @click="open=false"
                    class="px-5 py-2.5 bg-white border border-gray-300 text-gray-700 font-semibold rounded-xl">

                    Batal

                </button>

                <button type="submit" class="px-5 py-2.5 bg-uniba-blue text-white font-semibold rounded-xl shadow-md">

                    <span x-text="item.slug ? 'Simpan Perubahan' : 'Simpan Data'"></span>

                </button>

            </div>

        </form>

    </div>

</div> --}}
