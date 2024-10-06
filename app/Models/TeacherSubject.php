<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\Pivot;

class TeacherSubject extends Pivot
{
    use HasFactory;

    protected $table = 'subject_teacher';
    public $incrementing = true;
    protected $fillable = ['subject_id', 'teacher_id', 'class_id', 'stream_id', 'school_id','year','term', 'school_subject_id'];

    public function classes(): HasMany
    {
        return $this->hasMany(Classes::class, 'class_id');
    }
    public function subjects(): HasMany
    {
        return $this->hasMany(Subject::class, 'subject_id');
    }
}
