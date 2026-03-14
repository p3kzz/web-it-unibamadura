@props(['id', 'name', 'value' => '', 'placeholder' => 'Tulis konten di sini...', 'height' => 250])

<textarea id="{{ $id }}" name="{{ $name }}"
    {{ $attributes->merge([
        'class' => 'summernote w-full border-2 border-gray-300 rounded-lg px-4 py-2.5 focus:border-uniba-blue outline-none',
    ]) }}>{{ $value }}</textarea>

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
                disableDragAndDrop: false,
                imageAttributes: {
                    imageDialogShow: [
                        ['image', ['imageSize', 'imageAlt']],
                        ['float', ['floatLeft', 'floatRight', 'floatNone']],
                        ['remove', ['removeMedia']]
                    ],
                    imageSize: ['height', 'width', 'ratio']
                },

                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['codeview']]
                ],

                callbacks: {

                    onImageUpload: function(files) {
                        console.log('onImageUpload triggered with', files.length, 'files')

                        if (!files || files.length === 0) {
                            console.error('No files in onImageUpload')
                            return
                        }

                        for (let i = 0; i < files.length; i++) {
                            uploadImage(files[i], $el)
                        }

                    },

                    onPaste: function(e) {

                        const clipboardData = e.originalEvent.clipboardData

                        if (clipboardData && clipboardData.items) {

                            for (let i = 0; i < clipboardData.items.length; i++) {

                                const item = clipboardData.items[i]

                                if (item.type.indexOf("image") !== -1) {

                                    const file = item.getAsFile()
                                    uploadImage(file, $el)

                                }

                            }

                        }

                    }

                }

            })

            if (content) {
                $el.summernote('code', content)
            }

        }


        function uploadImage(file, $editor) {

            console.log('uploadImage called with file:', file)

            const formData = new FormData()

            formData.append('file', file)
            formData.append('_token', '{{ csrf_token() }}')

            $.ajax({

                url: '{{ route('admin.editor.upload-image') }}',
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,

                success: function(response) {
                    console.log('Upload success, response:', response)

                    if (response.url) {
                        console.log('Inserting image:', response.url)
                        $editor.summernote('insertImage', response.url)
                    } else {
                        console.error('No URL in response:', response)
                        alert('Gagal: Server tidak mengembalikan URL gambar')
                    }

                },

                error: function(xhr, status, error) {
                    console.error('Upload error:', xhr, status, error)

                    let errorMsg =
                        'Gagal mengunggah gambar.\n\nPastikan ukuran file tidak melebihi 2MB dan format yang didukung: JPG, JPEG, PNG, WebP.'

                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMsg = xhr.responseJSON.message
                    }

                    alert(errorMsg)

                }

            })

        }
    </script>
@endpush
