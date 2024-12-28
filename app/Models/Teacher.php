<?php
namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable 
{
    use HasFactory;
    use Notifiable;
    use HasApiTokens;
    use HasUuids;
    protected $table = 'teachers';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'email',
        'school_registration_number',
        'profile_picture',
        'phone_number',
        'password',
        'role',
        'active',
    ];
   
    public function school(): BelongsToMany
    {
        return $this->belongsToMany(School::class, 'school_teachers', 'teacher_id', 'school_id');
    }
    public function teachesIn()
    {
        return $this->belongsToMany(Stream::class, 'subject_teacher', 'teacher_id', 'stream_id');
    }
    public function classStream(): HasOne
    {
        return $this->hasOne(ClassStream::class, 'id');
    }
    public function ward(): HasOne
    {
        return $this->hasOne(Ward::class, 'id');
    }
    public function subjects(): BelongsToMany
    {
        return $this->belongsToMany(Subject::class)->using(TeacherSubject::class);
    }
    public function teacherSubject():HasMany
    {
        return $this->hasMany(TeacherSubject::class,'teacher_id');
    }
    public function schoolSubjects(): BelongsToMany
    {
        return $this->belongsToMany(SchoolSubject::class, TeacherSubject::class, 'teacher_id', 'school_subject_id');
    }
    public function classes(): BelongsToMany
    {
        return $this->belongsToMany(Classes::class, TeacherSubject::class, 'teacher_id', 'class_id');
    }
}
