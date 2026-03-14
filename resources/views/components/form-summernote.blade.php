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

    // destroy jika sudah pernah init
    if ($el.next('.note-editor').length) {
        $el.summernote('destroy')
    }

    $el.summernote({

        height: {{ $height }},
        placeholder: "{{ $placeholder }}",
        dialogsInBody: true,
        disableDragAndDrop: true,

        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture']],
            ['view', ['codeview']]
        ],

        callbacks: {

            onImageUpload: function(files) {

                for (let i = 0; i < files.length; i++) {
                    uploadImage(files[i], $el)
                }

            }

        }

    })

    if (content) {
        $el.summernote('code', content)
    }

}


// function upload image
function uploadImage(file, $editor) {

    const formData = new FormData()

    formData.append('file', file)
    formData.append('_token', '{{ csrf_token() }}')

    $.ajax({

        url: '{{ route("admin.editor.upload-image") }}',
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,

        success: function(response) {

            if (response.url) {
                $editor.summernote('insertImage', response.url)
            }

        },

        error: function() {

            alert(
                'Gagal mengunggah gambar.\n\nPastikan ukuran file tidak melebihi 2MB dan format yang didukung: JPG, JPEG, PNG, WebP.'
            )

        }

    })

}

</script>
@endpush
