<?php

namespace App\Models;

use App\Models\Exam;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Result extends Model
{
    protected $fillable = [
        'score',
        'remark',
        'pupil_reg_number',
        'exam_id',
        'subject_stream_id',
    ];

    use HasFactory;
    public function exam(): BelongsTo
    {
        return $this->belongsTo(Exam::class);
    }

    public function subjectStream(): BelongsTo
    {
        return $this->belongsTo(Subject_stream::class);
    }

}
