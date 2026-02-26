<?php

namespace App\Http\Requests\Admin\Tentang\VisiMisi;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateVisiMisiRequest extends FormRequest
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
            'periode_id' => 'required|exists:periode,id',
            'section' => [
                'required',
                Rule::in(['visi', 'misi', 'tujuan', 'sasaran']),
            ],

            'title' => [
                Rule::requiredIf(
                    in_array($this->section, ['misi', 'tujuan', 'sasaran'])
                ),
                'nullable',
                'string',
                'max:255',
            ],
            'content' => 'required|string|min:5',
            'is_active' => 'nullable|boolean',
        ];
    }
}
