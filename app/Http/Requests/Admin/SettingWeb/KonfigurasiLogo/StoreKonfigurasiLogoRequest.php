<?php

namespace App\Http\Requests\Admin\SettingWeb\KonfigurasiLogo;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreKonfigurasiLogoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check() && Auth::user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'logo_web' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
            'nama_web' => 'nullable|string|max:255',
            'is_active' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'logo_web.image' => 'File yang diunggah harus berupa gambar',
            'logo_web.mimes' => 'Format gambar harus png, jpg, jpeg, atau webp',
            'logo_web.max' => 'Ukuran gambar tidak boleh lebih dari 2MB',
            'nama_web.string' => 'Nama web harus berupa teks',
            'nama_web.max' => 'Nama web tidak boleh lebih dari 255 karakter',
            'is_active.boolean' => 'Status aktif harus berupa nilai boolean',
        ];
    }
}
