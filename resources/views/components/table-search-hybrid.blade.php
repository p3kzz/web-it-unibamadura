@props([
    'placeholder' => 'Cari data...',
    'currentSearch' => '',
    'preserveParams' => [] // Parameters yang ingin dipertahankan (section, periode_id, dll)
])

<div class="relative" x-data="{
    search: '{{ $currentSearch }}',
    isSearching: false,
    debounceTimer: null,

    init() {
        this.$watch('search', value => {
            clearTimeout(this.debounceTimer);
            this.debounceTimer = setTimeout(() => {
                this.performSearch();
            }, 400);
        });
    },

    performSearch() {
        this.isSearching = true;

        // Build URL with all parameters
        const params = new URLSearchParams(window.location.search);

        if (this.search.trim()) {
            params.set('search', this.search.trim());
        } else {
            params.delete('search');
        }

        // Preserve existing parameters
        @foreach($preserveParams as $key => $value)
            @if($value)
                params.set('{{ $key }}', '{{ $value }}');
            @endif
        @endforeach

        const url = window.location.pathname + '?' + params.toString();

        // Fetch via AJAX
        fetch(url, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'text/html'
            }
        })
        .then(response => response.text())
        .then(html => {
            const container = document.getElementById('ajax-table-container');
            if (container) {
                container.innerHTML = html;
            }

            // Update URL without reload
            window.history.pushState({}, '', url);

            this.isSearching = false;
        })
        .catch(error => {
            console.error('Search error:', error);
            this.isSearching = false;
        });
    },

    clearSearch() {
        this.search = '';
    }
}">
    <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
        </div>

        <input
            type="text"
            x-model="search"
            @keydown.escape="clearSearch"
            placeholder="{{ $placeholder }}"
            class="w-full pl-10 pr-10 py-2 text-sm border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-uniba-blue focus:border-uniba-blue transition-all duration-200"
        />

        <div class="absolute inset-y-0 right-0 flex items-center pr-2">
            <button
                x-show="search.length > 0"
                x-cloak
                @click="clearSearch"
                type="button"
                class="p-1 text-gray-400 hover:text-gray-600 rounded-md hover:bg-gray-100 transition-colors duration-200"
                title="Hapus pencarian">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

            <div x-show="isSearching" x-cloak class="ml-1">
                <svg class="animate-spin h-4 w-4 text-uniba-blue" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </div>
        </div>
    </div>

    {{-- Search Info --}}
    <div x-show="search.length > 0" x-cloak class="mt-1.5 text-xs text-gray-600">
        <span class="inline-flex items-center gap-1">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
            Mencari: <span class="font-semibold" x-text="search"></span>
        </span>
    </div>
</div>
