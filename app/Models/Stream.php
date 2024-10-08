<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Stream extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'streams';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ['name', 'year', 'tearm'];
    public function classStreams(): HasMany
    {
        return $this->hasMany(ClassStream::class, 'id');
    }
    public function classes(): BelongsToMany
    {
        return $this->belongsToMany(classes::class,'class_streams','stream_id','class_id');
    }

    public function attendenceLogs()
    {
        return $this->hasOne(AttendenceLog::class);
    }

    public function pupils(): HasMany
    {
        return $this->hasMany(Pupil::class);
    }

    public function subjectStreams(): HasMany
    {
        return $this->hasMany(SubjectStream::class);
    }

    public function hasSubject(): BelongsToMany
    {
        return $this->belongsToMany(Subject::class, 'subject_teacher', 'stream_id', 'subject_id');
    }
}
