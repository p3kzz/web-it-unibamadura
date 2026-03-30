<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LicensesSections extends Model
{
    use HasFactory;
    protected $table = 'license_sections';
    protected $fillable = [
        'software_licenses_id',
        'title',
    ];

    public function softwareLicense()
    {
        return $this->belongsTo(SoftwareLicenses::class, 'software_licenses_id');
    }

    public function contents()
    {
        return $this->hasMany(LicensesContents::class, 'license_section_id');
    }
}
