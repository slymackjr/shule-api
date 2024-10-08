<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Subject extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'subjects';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ['name', 'level', 'type', 'sw_name'];
    public function subjectStreams(): HasMany
    {
        return $this->hasMany(SubjectStream::class);
    }
    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany(Teacher::class)->using(TeacherSubject::class);
    }
    public function teachClass(): BelongsToMany
    {
        return $this->belongsToMany(Classes::class, TeacherSubject::class, 'subject_id', 'teacher_id');
    }
    public function classes(): BelongsToMany
    {
        return $this->belongsToMany(Classes::class, 'subject_teacher', 'subject_id', 'class_id');
    }
}
