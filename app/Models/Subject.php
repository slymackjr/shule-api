<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
    protected $table = 'subjects';
    use HasFactory;

    protected $fillable = ['name', 'level', 'type', 'sw_name'];
    public function subject_streams(): HasMany
    {
        return $this->hasMany(Subject_stream::class);
    }
    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany(Teacher::class)->using(TeacherSubject::class);
    }
    public function teach_class(): BelongsToMany
    {
        return $this->belongsToMany(Classes::class, TeacherSubject::class, 'subject_id', 'teacher_id');
    }
    public function classes(): BelongsToMany
    {
        return $this->belongsToMany(Classes::class, 'subject_teacher', 'subject_id', 'class_id');
    }
}
