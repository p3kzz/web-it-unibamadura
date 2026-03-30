<?php

namespace App\Http\Requests\Admin\Layanan\LicensesSoftware;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateLicensesRequest extends FormRequest
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
            'name' => 'sometimes|string|max:255',
            'short_description' => 'nullable|string',
            'is_active' => 'boolean',
            'sections' => 'sometimes|array',
            'sections.*.title' => 'sometimes|string|max:255',
            'sections.*.content' => 'sometimes|string',
        ];
    }
}
