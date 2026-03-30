<?php

namespace App\Http\Requests\Admin\Layanan\LicensesSoftware;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreLicensesRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'is_active' => 'boolean',
            'sections' => 'required|array',
            'sections.*.title' => 'required|string|max:255',
            'sections.*.content' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama lisensi wajib diisi',
            'name.string' => 'Nama lisensi harus berupa string',
            'name.max' => 'Nama lisensi maksimal 255 karakter',
            'short_description.string' => 'Deskripsi singkat harus berupa string',
            'is_active.boolean' => 'Status aktif harus berupa boolean',
            'sections.required' => 'Bagian-bagian lisensi wajib diisi',
            'sections.array' => 'Bagian-bagian lisensi harus berupa array',
            'sections.*.title.required' => 'Judul bagian wajib diisi',
            'sections.*.title.string' => 'Judul bagian harus berupa string',
            'sections.*.title.max' => 'Judul bagian maksimal 255 karakter',
            'sections.*.content.required' => 'Konten bagian wajib diisi',
            'sections.*.content.string' => 'Konten bagian harus berupa string',
        ];
    }
}
