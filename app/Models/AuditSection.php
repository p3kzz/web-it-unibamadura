<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditSection extends Model
{
    use HasFactory;
    protected $table = 'audits_sections';
    protected $fillable = [
        'audit_id',
        'title',
        'content',
    ];

    public function audit()
    {
        return $this->belongsTo(Audit::class, 'audit_id');
    }
}
