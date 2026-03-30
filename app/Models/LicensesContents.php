<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LicensesContents extends Model
{
    use HasFactory;
    protected $table = 'licenses_contents';
    protected $fillable = [
        'licenses_sections_id',
        'content',
    ];

    public function licenseSection()
    {
        return $this->belongsTo(LicensesSections::class, 'licenses_sections_id');
    }
}
