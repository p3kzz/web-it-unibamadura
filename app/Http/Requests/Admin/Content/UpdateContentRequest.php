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
        $currentContent = $this->route('content');

        return [

            'title' => 'required|string|max:255',
            'type' => ['required', Rule::in(['news', 'announcement', 'agenda'])],
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpg,png,webp|max:2048',
            'status' => ['required', Rule::in(['draft', 'published'])],
            'published_at' => 'nullable|date',
            'event_date' => [
                Rule::requiredIf($this->input('type') === 'agenda'),
                'nullable',
                'date',
                'after_or_equal:today'
            ],
            'event_time' => [
                Rule::requiredIf($this->input('type') === 'agenda'),
                'nullable',
                'date_format:H:i'
            ],
            'location' => [
                Rule::requiredIf($this->input('type') === 'agenda'),
                'nullable',
                'string',
                'max:255'
            ],
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',

        ];
    }
}
