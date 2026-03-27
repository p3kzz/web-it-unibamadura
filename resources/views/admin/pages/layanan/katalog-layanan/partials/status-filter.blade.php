<select name="is_active"
    class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-uniba-blue"
    onchange="document.getElementById('search-form').submit()">
    <option value="" {{ ($isActive ?? '') === '' ? 'selected' : '' }}>Semua Status</option>
    <option value="1" {{ ($isActive ?? '') === '1' ? 'selected' : '' }}>Aktif</option>
    <option value="0" {{ ($isActive ?? '') === '0' ? 'selected' : '' }}>Nonaktif</option>
</select>