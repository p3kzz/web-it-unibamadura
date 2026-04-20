<?php

namespace App\Http\Requests\Admin\Layanan\DetailLayanan;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreDetailLayananRequest extends FormRequest
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
            'katalog_layanan_id' => 'required|exists:katalog_layanans,id',
            'title' => 'required|string|max:255',
            'sections' => 'required|array|min:1',
            'sections.*.title' => 'required|string|max:255',
            'sections.*.content' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'katalog_layanan_id.required' => 'Katalog Layanan harus dipilih.',
            'katalog_layanan_id.exists' => 'Katalog Layanan yang dipilih tidak valid.',
            'title.required' => 'Judul detail layanan harus diisi.',
            'title.string' => 'Judul detail layanan harus berupa teks.',
            'title.max' => 'Judul detail layanan tidak boleh lebih dari 255 karakter.',
            'sections.required' => 'Minimal harus ada satu bagian.',
            'sections.array' => 'Bagian harus berupa array.',
            'sections.min' => 'Minimal harus ada satu bagian.',
            'sections.*.title.required' => 'Judul bagian harus diisi.',
            'sections.*.title.string' => 'Judul bagian harus berupa teks.',
            'sections.*.title.max' => 'Judul bagian tidak boleh lebih dari 255 karakter.',
            'sections.*.content.required' => 'Konten bagian harus diisi.',
            'sections.*.content.string' => 'Konten bagian harus berupa teks.',
        ];
    }
}
