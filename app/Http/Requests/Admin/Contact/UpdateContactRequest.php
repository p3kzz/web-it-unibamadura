<?php

namespace App\Http\Requests\Admin\Contact;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateContactRequest extends FormRequest
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
            'label' => 'required|string|max:255',
            'value' => 'required|string',
            'type' => 'nullable|string|max:50',
            'is_active' => 'boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'label.required' => 'Label kontak wajib diisi',
            'label.string' => 'Label kontak harus berupa string',
            'label.max' => 'Label kontak maksimal 255 karakter',
            'value.required' => 'Nilai kontak wajib diisi',
            'value.string' => 'Nilai kontak harus berupa string',
            'type.string' => 'Tipe kontak harus berupa string',
            'type.max' => 'Tipe kontak maksimal 50 karakter',
            'is_active.boolean' => 'Status aktif harus berupa boolean',
        ];
    }
}
