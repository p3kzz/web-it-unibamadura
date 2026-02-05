<?php

namespace App\Http\Requests\Admin\Periode;

use App\Models\Periode;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdatePeriodeRequest extends FormRequest
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
        $maxYear = now()->year + 10;

        return [
            'name'       => 'required|string|max:255',
            'start_year' => "required|integer|between:1900,{$maxYear}",
            'end_year'   => "required|integer|between:1900,{$maxYear}|gte:start_year",
            'is_active'  => 'nullable|boolean',
        ];
    }
}
