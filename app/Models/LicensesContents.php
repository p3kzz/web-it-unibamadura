<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LicensesContents extends Model
{
    use HasFactory;
    protected $table = 'license_contents';
    protected $fillable = [
        'license_section_id',
        'content',
    ];

    public function licenseSection()
    {
        return $this->belongsTo(LicensesSections::class, 'license_section_id');
    }
}
