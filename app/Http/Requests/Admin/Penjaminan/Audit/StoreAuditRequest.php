<?php

namespace App\Http\Requests\Admin\Penjaminan\Audit;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreAuditRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
            'sections' => 'required|array|min:1',
            'sections.*.title' => 'required|string|max:255',
            'sections.*.content' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Judul web hosting wajib diisi',
            'title.string' => 'Judul web hosting harus berupa string',
            'title.max' => 'Judul web hosting maksimal 255 karakter',
            'description.string' => 'Deskripsi harus berupa string',
            'is_active.boolean' => 'Status aktif harus berupa boolean',
            'sections.required' => 'Bagian web hosting wajib diisi',
            'sections.array' => 'Bagian web hosting harus berupa array',
            'sections.min' => 'Minimal harus ada 1 bagian web hosting',
            'sections.*.title.required' => 'Judul bagian wajib diisi',
            'sections.*.title.string' => 'Judul bagian harus berupa string',
            'sections.*.title.max' => 'Judul bagian maksimal 255 karakter',
            'sections.*.content.required' => 'Konten bagian wajib diisi',
            'sections.*.content.string' => 'Konten bagian harus berupa string',
        ];
    }
}
