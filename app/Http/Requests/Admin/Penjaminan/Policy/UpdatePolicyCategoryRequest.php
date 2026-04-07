<?php

namespace App\Http\Requests\Admin\Penjaminan\Policy;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdatePolicyCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check() && Auth::user()->isAdmin();
    }

    public function rules(): array
    {
        $categoryId = $this->route('policy_category')?->id ?? $this->route('policy_category');

        return [
            'name' => 'required|string|max:255',
            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('policy_categories', 'slug')->ignore($categoryId),
            ],
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
