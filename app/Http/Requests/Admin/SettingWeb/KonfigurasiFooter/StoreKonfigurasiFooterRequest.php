<?php

namespace App\Http\Requests\Admin\SettingWeb\KonfigurasiFooter;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreKonfigurasiFooterRequest extends FormRequest
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
            'type' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'url' => 'nullable|url|max:255',
            'is_active' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'type.required' => 'Tipe harus diisi',
            'type.string' => 'Tipe harus berupa teks',
            'type.max' => 'Tipe tidak boleh lebih dari 255 karakter',
            'nama.required' => 'Nama harus diisi',
            'nama.string' => 'Nama harus berupa teks',
            'nama.max' => 'Nama tidak boleh lebih dari 255 karakter',
            'url.url' => 'URL harus berupa alamat yang valid',
            'url.max' => 'URL tidak boleh lebih dari 255 karakter',
            'is_active.boolean' => 'Status aktif harus berupa nilai boolean',
        ];
    }
}
