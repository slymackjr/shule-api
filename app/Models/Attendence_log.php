<?php

namespace App\Models;

use App\Models\Pupil;
use PhpParser\Node\Expr\Cast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attendence_log extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'date',
        'pupil_id',
        'stream_id'
    ];
    public function stream()
    {
        return $this->belongsTo(Stream::class);
    }

    public function pupil(): BelongsTo
    {
        return $this->belongsTo(Pupil::class);
    }
}
