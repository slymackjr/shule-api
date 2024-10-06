<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class School_teacher extends Model
{
    use HasFactory;
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
