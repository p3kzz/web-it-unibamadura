<?php

namespace App\Http\Requests\Admin\Fasilitas;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreFasilitasRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check() && Auth::user()->isAdmin();
    }

    public function rules(): array
    {
        return [
            'nama' => 'required|string|max:150',
            'deskripsi' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_active' => 'nullable|boolean',
            'gallery_images' => 'nullable|array|max:10',
            'gallery_images.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required' => 'Nama fasilitas wajib diisi',
            'nama.max' => 'Nama fasilitas maksimal 150 karakter',
            'deskripsi.required' => 'Deskripsi fasilitas wajib diisi',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, atau webp',
            'image.max' => 'Ukuran gambar maksimal 2MB',
            'gallery_images.max' => 'Maksimal 10 gambar galeri',
            'gallery_images.*.image' => 'File galeri harus berupa gambar',
            'gallery_images.*.mimes' => 'Format gambar galeri harus jpeg, png, jpg, atau webp',
            'gallery_images.*.max' => 'Ukuran gambar galeri maksimal 2MB per file',
        ];
    }
}
