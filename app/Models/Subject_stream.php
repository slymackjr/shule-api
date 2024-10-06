<?php

namespace App\Models;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Subject_stream extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'stream_id',
        'subject_id',
        'class_id'
    ];

    public function stream(): BelongsTo
    {
        return $this->belongsTo(Stream::class);
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }


    public function results(): HasMany
    {
        return $this->hasMany(Result::class);
    }

    public function class(): BelongsTo
    {
        return $this->belongsTo(Classes::class);
    }
}
