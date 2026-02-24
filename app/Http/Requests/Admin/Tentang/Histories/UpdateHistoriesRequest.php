<?php

namespace App\Http\Requests\Admin\Tentang\Histories;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateHistoriesRequest extends FormRequest
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
            'type' => 'required|in:intro,timeline,vision',
            'title' => 'required|string|max:255',
            'sub_title' => [
                Rule::requiredIf(in_array($this->section, ['timeline'])),
                'nullable',
                'string',
                'max:255',
            ],
            'content' => 'required|string',
            'extras' => [Rule::requiredIf(in_array($this->section, ['timeline', 'vision'])), 'nullable|array'],
            'extras.*' => [Rule::requiredIf(in_array($this->section, ['timeline', 'vision'])), 'string|max:255'],
            'order' => 'nullable|integer|min:1',
            'is_active' => 'boolean',
        ];
    }
}
