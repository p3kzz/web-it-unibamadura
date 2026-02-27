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
        $maxYear = now()->year + 20;

        return [
            'name'       => 'required|string|max:255',
            'start_year' => "required|integer|between:1900,{$maxYear}",
            'end_year'   => "required|integer|between:1900,{$maxYear}|gte:start_year",
            'is_active'  => 'nullable|boolean',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {

            $start = (int) $this->start_year;
            $end   = (int) $this->end_year;

            $id = $this->route('periode')?->getKey();

            $overlap = Periode::query()
                ->when($id, fn($q) => $q->where('id', '!=', $id))
                ->where(function ($q) use ($start, $end) {
                    $q->whereBetween('start_year', [$start, $end])
                        ->orWhereBetween('end_year', [$start, $end])
                        ->orWhere(function ($q2) use ($start, $end) {
                            $q2->where('start_year', '<=', $start)
                                ->where('end_year', '>=', $end);
                        });
                })
                ->exists();

            if ($overlap) {
                $validator->errors()->add(
                    'start_year',
                    'Rentang tahun bertabrakan dengan periode lain.'
                );
            }
        });
    }
}
