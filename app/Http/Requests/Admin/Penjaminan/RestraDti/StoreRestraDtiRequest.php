<?php

namespace App\Http\Requests\Admin\Penjaminan\RestraDti;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreRestraDtiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
   public function authorize(): bool
    {
        return Auth::check() && Auth::user()->isAdmin();
    }

    public function rules(): array
    {
        return [
            'judul' => 'required|string|max:255',
            'year' => 'required|integer|min:2000|max:2100',
            'deskripsi' => 'nullable|string',
            'file' => 'required|file|mimes:pdf|max:10240',
            'is_active' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'judul.required' => 'Judul SOP wajib diisi',
            'judul.max' => 'Judul SOP maksimal 255 karakter',
            'year.required' => 'Tahun wajib diisi',
            'year.integer' => 'Tahun harus berupa angka',
            'year.min' => 'Tahun tidak valid',
            'year.max' => 'Tahun tidak valid',
            'file.required' => 'File SOP wajib diupload',
            'file.file' => 'File harus berupa dokumen',
            'file.mimes' => 'Format file harus PDF',
            'file.max' => 'Ukuran file maksimal 10MB',
        ];
    }
}
