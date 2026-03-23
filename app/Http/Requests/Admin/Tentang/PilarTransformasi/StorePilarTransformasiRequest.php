<?php

namespace App\Http\Requests\Admin\Tentang\PilarTransformasi;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StorePilarTransformasiRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check() && Auth::user()->isAdmin();
    }

    public function rules(): array
    {
        return [
            'periode_id' => 'required|exists:periode,id',
            'kode' => 'nullable|string|max:50',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'key_components' => 'nullable|array',
            'key_components.*' => 'string',
            'is_active' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'periode_id.required' => 'Periode wajib dipilih',
            'periode_id.exists' => 'Periode tidak valid',
            'title.required' => 'Judul wajib diisi',
            'title.max' => 'Judul terlalu panjang',
            'kode.max' => 'Kode terlalu panjang',
            'subtitle.max' => 'Subtitle terlalu panjang',
        ];
    }
}
