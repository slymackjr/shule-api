<?php

namespace App\Models;
use App\Models\Stream;
use App\Models\Classes;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassStream extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'class_id',
        'stream_id',
        'teacher_id',
        'school_id',
        'alias',
    ];
    public function class(): BelongsTo
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function stream(): BelongsTo
    {
        return $this->belongsTo(Stream::class, 'stream_id');
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class,'teacher_id');
    }
}
