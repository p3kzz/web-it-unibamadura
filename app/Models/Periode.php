<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;
    protected $table = 'periode';
    protected $fillable = [
        'name',
        'start_year',
        'end_year',
        'is_active',
    ];

    public function VisiMisiItems()
    {
        return $this->hasMany(VisiMisiItem::class);
    }

    public function strukturOrganisasi()
    {
        return $this->hasMany(StrukturOrganisasi::class);
    }

    public function pilarTransformasi()
    {
        return $this->hasMany(PilarTransformasi::class);
    }

    public function programKerja()
    {
        return $this->hasMany(ProgramKerja::class);
    }
}
