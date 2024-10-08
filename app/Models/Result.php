<?php

namespace App\Models;

use App\Models\Exam;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Result extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'results';
    protected $keyType = 'string';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = [
        'score',
        'remark',
        'pupil_reg_number',
        'exam_id',
        'subject_stream_id',
    ];
    
    public function exam(): BelongsTo
    {
        return $this->belongsTo(Exam::class);
    }

    public function subjectStream(): BelongsTo
    {
        return $this->belongsTo(SubjectStream::class);
    }

}
