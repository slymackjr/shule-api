<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SchoolTeacher extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'school_teachers';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'school_id',
        'teacher_id',
    ];
    public function schools(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }

    public function teachers(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

}
