<?php

namespace App\Http\Requests\Admin\Penjaminan\Policy;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StorePolicyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check() && Auth::user()->isAdmin();
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:policies,slug',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'is_active' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Judul kebijakan wajib diisi',
            'title.max' => 'Judul kebijakan maksimal 255 karakter',
            'slug.unique' => 'Slug sudah digunakan',
            'slug.max' => 'Slug maksimal 255 karakter',
            'excerpt.max' => 'Ringkasan maksimal 500 karakter',
            'content.required' => 'Konten kebijakan wajib diisi',
        ];
    }
}
