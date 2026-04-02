<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionEmailAkun extends Model
{
    use HasFactory;
    protected $table = 'section_email_akun';
    protected $fillable = [
        'email_akun_id',
        'title',
        'content',
    ];

    public function emailAkun()
    {
        return $this->belongsTo(EmailAkun::class, 'email_akun_id');
    }
}

