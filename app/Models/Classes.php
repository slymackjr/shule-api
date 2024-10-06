<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Classes extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'school_id'
    ];
    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }

    public function stream(): BelongsToMany
    {
        return $this->belongsToMany(Stream::class, Class_stream::class, 'class_id', 'stream_id');
    }
    public function class_streams(): HasMany
    {
        return $this->hasMany(Class_stream::class, 'class_id');
    }

    public function subjects(): HasMany
    {
        return $this->hasMany(Subject::class);
    }
    public function class_subjects(): BelongsToMany
    {
        return $this->belongsToMany(Subject::class, 'subject_teacher', 'class_id', 'subject_id');
    }
    public function tout_stream(): BelongsToMany
    {
        return $this->belongsToMany(Stream::class, 'subject_teacher', 'class_id', 'stream_id', 'teacher_id','id', Teacher::class);
    }
}
