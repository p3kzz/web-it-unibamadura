@props([
'id',
'name',
'value' => '',
'placeholder' => 'Tulis konten di sini...',
'height' => 250
])

<textarea
    id="{{ $id }}"
    name="{{ $name }}"
    {{ $attributes->merge([
        'class' => 'summernote w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-uniba-blue outline-none'
    ]) }}
>{{ $value }}</textarea>

@push('scripts')
<script>

window.initSummernote = function(id, content = '') {

    const $el = $('#' + id)

    if (!$el.length) return

    if ($el.next('.note-editor').length) {
        $el.summernote('destroy')
    }

    $el.summernote({
        height: {{ $height }},
        placeholder: "{{ $placeholder }}",
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture']],
            ['view', ['codeview']]
        ]
    })

    if (content) {
        $el.summernote('code', content)
    }
}

</script>
@endpush
