<?php

namespace App\Http\Requests\Admin\Penjaminan\Policy;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StorePolicyCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check() && Auth::user()->isAdmin();
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:policy_categories,slug',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama kategori wajib diisi',
            'name.max' => 'Nama kategori maksimal 255 karakter',
            'slug.unique' => 'Slug sudah digunakan',
            'slug.max' => 'Slug maksimal 255 karakter',
        ];
    }
}
