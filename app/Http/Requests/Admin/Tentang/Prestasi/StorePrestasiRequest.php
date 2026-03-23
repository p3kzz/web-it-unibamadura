<?php

namespace App\Http\Requests\Admin\Tentang\Prestasi;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StorePrestasiRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check() && Auth::user()->isAdmin();
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'description' => 'nullable|string',
            'achievement_date' => 'required|date',
            'year' => 'required|integer|min:2000|max:2100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_active' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Judul prestasi wajib diisi',
            'title.max' => 'Judul prestasi terlalu panjang',
            'organization.required' => 'Pemberi penghargaan wajib diisi',
            'organization.max' => 'Nama pemberi penghargaan terlalu panjang',
            'achievement_date.required' => 'Tanggal pencapaian wajib diisi',
            'achievement_date.date' => 'Format tanggal tidak valid',
            'year.required' => 'Tahun wajib diisi',
            'year.integer' => 'Tahun harus berupa angka',
            'year.min' => 'Tahun minimal 2000',
            'year.max' => 'Tahun maksimal 2100',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, atau webp',
            'image.max' => 'Ukuran gambar maksimal 2MB',
        ];
    }
}
