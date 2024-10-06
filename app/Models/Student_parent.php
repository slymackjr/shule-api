<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_parent extends Model
{
    use HasFactory;

    public function pupils(): BelongsTo
    {
        return $this->belongsTo(Pupil::class);
    }

    public function parents(): BelongsTo
    {
        return $this->belongsTo(Parent::class);
    }
}
