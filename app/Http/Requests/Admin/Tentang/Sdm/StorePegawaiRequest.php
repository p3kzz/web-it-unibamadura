<?php

namespace App\Http\Requests\Admin\Tentang\Sdm;

use Illuminate\Foundation\Http\FormRequest;

class StorePegawaiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'nama' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'jabatan' => 'required|string|max:255',
            'sertifikasi' => 'nullable|string',
            'unit_organisasi_id' => 'nullable|exists:unit_organisasi,id',
            'status' => 'nullable|in:aktif,nonaktif',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'nama.required' => 'Nama pegawai wajib diisi.',
            'nama.max' => 'Nama pegawai maksimal 255 karakter.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Format gambar harus jpg, jpeg, png, atau webp.',
            'foto.max' => 'Ukuran foto maksimal 2MB.',
            'jabatan.required' => 'Jabatan wajib diisi.',
            'jabatan.max' => 'Jabatan maksimal 255 karakter.',
            'unit_organisasi_id.exists' => 'Unit organisasi tidak valid.',
        ];
    }
}
