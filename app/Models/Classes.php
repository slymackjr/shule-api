<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Classes extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'classes';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
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
        return $this->belongsToMany(Stream::class, ClassStream::class, 'class_id', 'stream_id');
    }
    public function classStreams(): HasMany
    {
        return $this->hasMany(ClassStream::class, 'class_id');
    }

    public function subjects(): HasMany
    {
        return $this->hasMany(Subject::class);
    }
    public function classSubjects(): BelongsToMany
    {
        return $this->belongsToMany(Subject::class, 'subject_teacher', 'class_id', 'subject_id');
    }
    public function toutStream(): BelongsToMany
    {
        return $this->belongsToMany(Stream::class, 'subject_teacher', 'class_id', 'stream_id', 'teacher_id','id', Teacher::class);
    }
}
