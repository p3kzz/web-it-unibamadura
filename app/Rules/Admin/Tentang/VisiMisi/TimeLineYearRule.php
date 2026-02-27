<?php

namespace App\Rules\Admin\Tentang\VisiMisi;

use App\Models\Histories;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class TimeLineYearRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $value = trim($value);
        $value = preg_replace('/\s*-\s*/', '-', $value);

        if (!preg_match('/^\d{4}(-\d{4})?$/', $value)) {
            $fail('Format tahun harus YYYY atau YYYY-YYYY.');
            return;
        }

        [$startYear, $endYear] = array_pad(explode('-', $value), 2, null);

        $startYear = (int) $startYear;
        $endYear   = $endYear ? (int) $endYear : $startYear;

        if ($endYear < $startYear) {
            $fail('Tahun akhir tidak boleh lebih kecil dari tahun awal.');
            return;
        }

        $latest = Histories::query()
            ->whereNotNull('sub_title')
            ->first();

        if (!$latest) {
            return;
        }

        [$latestStart, $latestEnd] = array_pad(explode('-', $latest->sub_title), 2, null);

        $latestStart = (int) $latestStart;

        if (!$latestEnd || !is_numeric($latestEnd)) {
            $latestEnd = now()->year;
        } else {
            $latestEnd = (int) $latestEnd;
        }

        if ($startYear < $latestEnd) {
            $fail('Tahun tidak boleh lebih kecil dari timeline terakhir.');
            return;
        }
    }
}
