<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Stream extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'year', 'tearm'];

    public function class_streams(): HasMany
    {
        return $this->hasMany(Class_stream::class, 'id');
    }
    public function classes(): BelongsToMany
    {
        return $this->belongsToMany(classes::class,'class_streams','stream_id','class_id');
    }

    public function attendence_logs()
    {
        return $this->hasOne(Attendence_log::class);
    }

    public function pupils(): HasMany
    {
        return $this->hasMany(Pupil::class);
    }

    public function subject_streams(): HasMany
    {
        return $this->hasMany(Subject_stream::class);
    }

    public function has_subject(): BelongsToMany
    {
        return $this->belongsToMany(Subject::class, 'subject_teacher', 'stream_id', 'subject_id');
    }
}
