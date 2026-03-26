<?php

namespace App\Http\Requests\Admin\Penjaminan\SistemDokumen;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreSistemDokumenRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check() && Auth::user()->isAdmin();
    }

    public function rules(): array
    {
        return [
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'file' => 'required|file|mimes:pdf|max:10240',
            'is_active' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'judul.required' => 'Judul dokumen wajib diisi',
            'judul.max' => 'Judul dokumen maksimal 255 karakter',
            'file.required' => 'File dokumen wajib diupload',
            'file.file' => 'File harus berupa dokumen',
            'file.mimes' => 'Format file harus PDF',
            'file.max' => 'Ukuran file maksimal 10MB',
        ];
    }
}
