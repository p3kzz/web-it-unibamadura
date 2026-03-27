<?php

namespace App\Http\Requests\Admin\Layanan\KategoriLayanan;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateKategoriLayananRequest extends FormRequest
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
            'nama' => 'required|string|max:255',
            'is_active' => 'boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required' => 'Nama kategori layanan wajib diisi',
            'nama.string' => 'Nama kategori layanan harus berupa string',
            'nama.max' => 'Nama kategori layanan maksimal 255 karakter',
            'is_active.boolean' => 'Status aktif harus berupa boolean',
        ];
    }
}
