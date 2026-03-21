<?php

namespace App\Http\Requests\Admin\Tentang\UnitOrganisasi;

use App\Models\UnitOrganisasi;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateUnitOrganisasiRequest extends FormRequest
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
            'description' => 'nullable|string',
        ];
    }

    /**
     * Get the custom messages for validation errors.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Nama unit wajib diisi.',
            'name.max' => 'Nama unit maksimal 255 karakter.',
            'parent_id.exists' => 'Parent unit tidak valid.',
            'type.required' => 'Tipe unit wajib dipilih.',
            'type.in' => 'Tipe unit harus directorate atau subdirectorate.',
            'description.string' => 'Deskripsi unit harus berupa string.',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {

            $unit = $this->route('unit');

            if ($this->parent_id) {
                $parent = UnitOrganisasi::find($this->parent_id);

                if ($parent && $unit && $parent->struktur_organisasi_id != $unit->struktur_organisasi_id) {
                    $validator->errors()->add('parent_id', 'Parent harus dalam struktur yang sama.');
                }

                if ($unit && $this->parent_id == $unit->id) {
                    $validator->errors()->add('parent_id', 'Unit tidak boleh menjadi parent dirinya sendiri.');
                }
            }

            if ($this->type === 'directorate' && $this->parent_id) {
                $validator->errors()->add('parent_id', 'Directorate tidak boleh memiliki parent.');
            }

            if ($this->type === 'subdirectorate' && !$this->parent_id) {
                $validator->errors()->add('parent_id', 'Subdirectorate wajib memiliki parent.');
            }
        });
    }
}
