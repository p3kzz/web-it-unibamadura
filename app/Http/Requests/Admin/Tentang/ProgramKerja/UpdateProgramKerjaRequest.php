<?php

namespace App\Http\Requests\Admin\Tentang\ProgramKerja;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateProgramKerjaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check() && Auth::user()->isAdmin();
    }

    public function rules(): array
    {
        $programKerjaId = $this->route('program_kerja');

        return [
            'periode_id' => 'required|exists:periode,id',
            'pilar_id' => 'nullable|exists:pilar_transformasi,id',
            'kode' => [
                'required',
                'string',
                'max:50',
                Rule::unique('program_kerja')->where(function ($query) {
                    return $query->where('periode_id', $this->periode_id);
                })->ignore($programKerjaId),
            ],
            'nama' => 'required|string|max:255',
            'tujuan' => 'nullable|string',
            'sasaran' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'target_waktu' => 'nullable|string|max:255',
            'status' => ['nullable', Rule::in(['planning', 'in_progress', 'completed', 'cancelled'])],
            'is_active' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'periode_id.required' => 'Periode wajib dipilih',
            'periode_id.exists' => 'Periode tidak valid',
            'pilar_id.exists' => 'Pilar tidak valid',
            'kode.required' => 'Kode wajib diisi',
            'kode.max' => 'Kode terlalu panjang',
            'kode.unique' => 'Kode sudah digunakan pada periode yang sama',
            'nama.required' => 'Nama wajib diisi',
            'nama.max' => 'Nama terlalu panjang',
            'status.in' => 'Status tidak valid',
        ];
    }
}
