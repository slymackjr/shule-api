<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use League\CommonMark\Extension\CommonMark\Parser\Block\ThematicBreakStartParser;

class Teacher extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'profile_picture',
        'phone_number',
        'ward_id',
        'region_id',
        'district_id',
        'street',
        'postal',
        'must_complete_details',
        'active',
        'user_id'
    ];
    public function school(): BelongsToMany
    {
        return $this->belongsToMany(School::class, 'school_teachers', 'teacher_id', 'school_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function teaches_in()
    {
        return $this->belongsToMany(Stream::class, 'subject_teacher', 'teacher_id', 'stream_id');
    }

    public function class_stream(): HasOne
    {
        return $this->hasOne(Class_stream::class, 'id');
    }


    public function ward(): HasOne
    {
        return $this->hasOne(Ward::class, 'id');
    }
    public function roles()
    {
        if ($this->user) {
            return $this->user->roles;
        }
    }
    public function subjects(): BelongsToMany
    {
        return $this->belongsToMany(Subject::class)->using(TeacherSubject::class);
        // return $this->belongsToMany(Subject::class, TeacherSubject::class,'subject_id','teacher_id');
    }
    public function teacher_subject():HasMany
    {
        return $this->hasMany(TeacherSubject::class,'teacher_id');
    }
    public function school_subjects(): BelongsToMany
    {
        return $this->belongsToMany(SchoolSubject::class, TeacherSubject::class, 'teacher_id', 'school_subject_id');
    }
    public function classes(): BelongsToMany
    {
        return $this->belongsToMany(Classes::class, TeacherSubject::class, 'teacher_id', 'class_id');
    }
}
