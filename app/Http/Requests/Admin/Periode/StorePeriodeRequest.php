<?php

namespace App\Http\Requests\Admin\Periode;

use App\Models\Periode;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StorePeriodeRequest extends FormRequest
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
        $maxYear = now()->year + 20;

        return [
            'name'       => 'required|string|max:255',
            'start_year' => "required|integer|between:1900,{$maxYear}",
            'end_year'   => "required|integer|between:1900,{$maxYear}|gte:start_year",
            'is_active'  => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'        => 'Nama periode wajib diisi',
            'name.max'             => 'Nama periode terlalu panjang',
            'start_year.required'  => 'Tahun mulai wajib diisi',
            'start_year.integer'   => 'Tahun mulai harus berupa angka',
            'start_year.between'   => 'Tahun mulai tidak valid',
            'end_year.required'    => 'Tahun berakhir wajib diisi',
            'end_year.integer'     => 'Tahun berakhir harus berupa angka',
            'end_year.between'     => 'Tahun berakhir tidak valid',
            'end_year.gte'         => 'Tahun berakhir harus sama atau lebih besar dari tahun mulai',
            'is_active.boolean'    => 'Status aktif tidak valid',
        ];
    }
}
