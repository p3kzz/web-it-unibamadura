<?php

namespace App\Http\Requests\Admin\Tentang;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreVisiMisiRequest extends FormRequest
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
            'type' => 'required|in:visi,misi,tujuan,sasaran',
            'content' => 'required|string|min:5',
            'order' => 'nullable|integer|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'type.required' => 'Tipe wajib dipilih',
            'type.in' => 'Tipe tidak valid',
            'content.required' => 'Konten tidak boleh kosong',
            'content.min' => 'Konten terlalu pendek',
        ];
    }
}
