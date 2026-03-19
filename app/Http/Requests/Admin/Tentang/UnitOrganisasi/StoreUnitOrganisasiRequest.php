<?php

namespace App\Http\Requests\Admin\Tentang\UnitOrganisasi;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreUnitOrganisasiRequest extends FormRequest
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
            'struktur_organisasi_id' => 'required|exists:struktur_organisasi,id',
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:unit_organisasi,id',
            'type' => ['required', Rule::in(['directorate', 'subdirectorate'])],
            'tasks' => 'nullable|string',
            'functions' => 'nullable|array',
            'functions.*' => 'nullable|string|max:500',
            'order' => 'nullable|integer|min:0',
        ];
    }

    /**
     * Get the custom messages for validation errors.
     */
    public function messages(): array
    {
        return [
            'struktur_organisasi_id.required' => 'Struktur organisasi wajib dipilih.',
            'struktur_organisasi_id.exists' => 'Struktur organisasi tidak valid.',
            'name.required' => 'Nama unit wajib diisi.',
            'name.max' => 'Nama unit maksimal 255 karakter.',
            'parent_id.exists' => 'Parent unit tidak valid.',
            'type.required' => 'Tipe unit wajib dipilih.',
            'type.in' => 'Tipe unit harus directorate atau subdirectorate.',
            'functions.array' => 'Format fungsi tidak valid.',
            'functions.*.max' => 'Setiap fungsi maksimal 500 karakter.',
            'order.integer' => 'Urutan harus berupa angka.',
            'order.min' => 'Urutan minimal 0.',
        ];
    }
}
