<?php

namespace App\Http\Requests\Admin\Layanan\KatalogLayanan;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateKatalogLayananRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check() && Auth::user()->isAdmin();
    }

    public function rules(): array
    {
        return [
            'kategori_layanan_id' => 'nullable|exists:kategori_layanan,id',
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
            'link' => 'nullable|url|max:500',
            'is_active' => 'nullable|boolean',
            'sort_order' => 'nullable|integer|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required' => 'Nama layanan wajib diisi',
            'nama.max' => 'Nama layanan maksimal 255 karakter',
            'icon.image' => 'Icon harus berupa gambar',
            'icon.mimes' => 'Format icon harus jpeg, png, jpg, svg, atau webp',
            'icon.max' => 'Ukuran icon maksimal 2MB',
            'link.url' => 'Link harus berupa URL yang valid',
            'kategori_layanan_id.exists' => 'Kategori layanan tidak ditemukan',
        ];
    }
}

