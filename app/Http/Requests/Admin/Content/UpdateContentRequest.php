<?php

namespace App\Http\Requests\Admin\Content;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateContentRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'type' => 'required', Rule::in(['news', 'announcement', 'agenda']),
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpg,png,webp|max:2048',
            'status' => 'required', Rule::in(['draft', 'published']),
            'published_at' => [Rule::requiredIf($this->status === 'published'), 'nullable', 'date'],
            'event_date' => [Rule::requiredIf($this->type === 'agenda'), 'nullable', 'date'],
            'location' => [Rule::requiredIf($this->type === 'agenda'), 'nullable', 'string', 'max:255'],
            'meta_title' => 'nullable|string|max:255',
            'meta_descrition' => 'nullable|string|max:255',
        ];
    }
}
