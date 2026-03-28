<?php

namespace App\Http\Requests\Admin\Layanan\KatalogLayanan;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateKatalogLayananRequest extends FormRequest
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
            'kategori_layanan_id' => 'sometimes|exists:kategori_layanan,id',
            'nama' => 'sometimes|string|max:255',
            'deskripsi' => 'sometimes|string',
            'pengguna_sasaran' => 'sometimes|string',
            'service_owner' => 'sometimes|string',
            'jam_layanan' => 'sometimes|string',
            'sla' => 'sometimes|string',
            'biaya' => 'sometimes|string',
            'cara_akses' => 'sometimes|string',
            'status' => ['required', Rule::in(['Aktif', 'Tidak Aktif', 'Maintenance'])],
            'dependencies' => 'nullable|string',
            'kontak' => 'nullable|string',
            'is_active' => 'boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'kategori_layanan_id.exists' => 'Kategori layanan tidak valid',
            'nama.string' => 'Nama layanan harus berupa string',
            'nama.max' => 'Nama layanan maksimal 255 karakter',
            'deskripsi.string' => 'Deskripsi layanan harus berupa string',
            'pengguna_sasaran.string' => 'Pengguna sasaran harus berupa string',
            'service_owner.string' => 'Service owner harus berupa string',
            'jam_layanan.string' => 'Jam layanan harus berupa string',
            'sla.string' => 'SLA harus berupa string',
            'biaya.string' => 'Biaya harus berupa string',
            'cara_akses.string' => 'Cara akses harus berupa string',
            'status.in' => 'Status harus berupa nilai yang valid',
            'dependencies.string' => 'Dependencies harus berupa string',
            'kontak.string' => 'Kontak harus berupa string',
            'is_active.boolean' => 'Status aktif harus berupa boolean',
        ];
    }
}
