<?php

namespace App\Http\Requests\Admin\Tentang\StrukturOrganisasi;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateStrukturRequest extends FormRequest
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
        $strukturId = $this->route('struktur_organisasi_item')?->id;

        return [
            'periode_id' => [
                'required',
                'exists:periode,id',
                Rule::unique('struktur_organisasi', 'periode_id')->ignore($strukturId),
            ],
            'image' => 'sometimes|image|mimes:jpg,jpeg,png,webp|max:5120',
            'is_active'  => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'periode_id.required' => 'Periode wajib dipilih.',
            'periode_id.exists' => 'Periode yang dipilih tidak valid.',
            'periode_id.unique' => 'Periode ini sudah memiliki struktur organisasi.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Format gambar harus jpg, jpeg, png, atau webp.',
            'image.max' => 'Ukuran gambar maksimal 5MB.',
            'is_active.boolean'    => 'Status aktif tidak valid',
        ];
    }
}
