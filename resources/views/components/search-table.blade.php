@props(['endpoint', 'placeholder' => 'Cari data...'])

<div x-data="ajaxTable('{{ $endpoint }}')" x-init="init()" class="space-y-4">

    <div class="flex justify-between items-center">
        <input type="text" x-model="search" placeholder="{{ $placeholder }}"
            class="border border-gray-300 rounded-lg px-4 py-2 text-sm w-64
                focus:ring-2 focus:ring-uniba-blue focus:outline-none">
    </div>

    <div x-ref="tableWrapper">
        {{ $slot }}
    </div>

</div>

<script>
    function ajaxTable(endpoint) {
        return {
            endpoint: endpoint,
            search: '',
            loading: false,
            debounceTimer: null,

            init() {
                this.$watch('search', value => {
                    clearTimeout(this.debounceTimer);
                    this.debounceTimer = setTimeout(() => {
                        this.fetchData();
                    }, 400);
                });
            },

            fetchData(url = null) {
                this.loading = true;

                let target = url ?? `${this.endpoint}?search=${this.search}`;

                fetch(target, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(res => res.text())
                    .then(html => {
                        const external = document.getElementById('ajax-table-container');
                        if (external) {
                            external.innerHTML = html;
                        } else if (this.$refs.tableWrapper) {
                            this.$refs.tableWrapper.innerHTML = html;
                        }
                        this.loading = false;
                    });
            }
        }
    }
</script>
