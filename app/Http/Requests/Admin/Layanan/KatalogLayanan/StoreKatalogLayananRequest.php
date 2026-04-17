<?php

namespace App\Http\Requests\Admin\Layanan\KatalogLayanan;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreKatalogLayananRequest extends FormRequest
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
            'nama' => 'required|string|max:255',
            'icon' => 'nullable|image|max:2048|mimes:png,jpg,jpeg,webp',
            'deskripsi' => 'required|string',
            'pengguna_sasaran' => 'required|string',
            'service_owner' => 'required|string',
            'jam_layanan' => 'required|string',
            'sla' => 'required|string',
            'biaya' => 'required|string',
            'cara_akses' => 'required|string',
            'status' => ['required', Rule::in(['Aktif', 'Tidak Aktif', 'Maintenance'])],
            'dependencies' => 'nullable|string',
            'kontak' => 'nullable|string',
            'is_active' => 'boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'icon.image' => 'Icon layanan harus berupa gambar',
            'icon.max' => 'Icon layanan maksimal 2048 KB',
            'icon.mimes' => 'Icon layanan harus berformat png, jpg, jpeg, atau webp',
            'nama.required' => 'Nama layanan wajib diisi',
            'nama.string' => 'Nama layanan harus berupa string',
            'nama.max' => 'Nama layanan maksimal 255 karakter',
            'deskripsi.required' => 'Deskripsi layanan wajib diisi',
            'deskripsi.string' => 'Deskripsi layanan harus berupa string',
            'pengguna_sasaran.required' => 'Pengguna sasaran wajib diisi',
            'pengguna_sasaran.string' => 'Pengguna sasaran harus berupa string',
            'service_owner.required' => 'Service owner wajib diisi',
            'service_owner.string' => 'Service owner harus berupa string',
            'jam_layanan.required' => 'Jam layanan wajib diisi',
            'jam_layanan.string' => 'Jam layanan harus berupa string',
            'sla.required' => 'SLA wajib diisi',
            'sla.string' => 'SLA harus berupa string',
            'biaya.required' => 'Biaya wajib diisi',
            'biaya.string' => 'Biaya harus berupa string',
            'cara_akses.required' => 'Cara akses wajib diisi',
            'cara_akses.string' => 'Cara akses harus berupa string',
            'status.required' => 'Status wajib diisi',
            'status.in' => 'Status harus berupa nilai yang valid',
            'dependencies.string' => 'Dependencies harus berupa string',
            'kontak.string' => 'Kontak harus berupa string',
            'is_active.boolean' => 'Status aktif harus berupa boolean',
        ];
    }
}
