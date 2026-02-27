<?php

namespace App\Rules\Admin\Tentang\Histories;

use App\Models\Histories;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class TimeLineYearRule implements ValidationRule
{
    public function __construct(private ?int $ignoreId = null) {}
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $value = trim($value);
        $value = strtolower($value);
        $value = preg_replace('/\s*-\s*/', '-', $value);

        if (!preg_match('/^\d{4}(-(\d{4}|sekarang))?$/', $value)) {
            $fail('Format tahun harus YYYY atau YYYY-YYYY atau YYYY-Sekarang.');
            return;
        }

        [$startYear, $endYear] = array_pad(explode('-', $value), 2, null);

        $startYear = (int) $startYear;

        if (!$endYear || $endYear === 'sekarang') {
            $endYear = now()->year;
        } else {
            $endYear = (int) $endYear;
        }

        if ($endYear < $startYear) {
            $fail('Tahun akhir tidak boleh lebih kecil dari tahun awal.');
            return;
        }

        $timelines = Histories::query()
            ->where('type', 'timeline')
            ->whereNotNull('sub_title')
            ->when($this->ignoreId, fn($q) => $q->where('id', '!=', $this->ignoreId))
            ->get();

        if ($timelines->isEmpty()) {
            return;
        }

        $latestEndYear = $timelines->max(function ($item) {

            [$s, $e] = array_pad(explode('-', strtolower($item->sub_title)), 2, null);

            if (!$e || $e === 'sekarang') {
                return now()->year;
            }

            return (int) $e;
        });

        if ($startYear < $latestEndYear) {
            $fail('Tahun tidak boleh lebih kecil dari timeline terakhir.');
            return;
        }
    }
}
