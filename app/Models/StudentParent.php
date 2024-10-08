<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentParent extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'student_parents';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'pupil_registration_number',
        'payment_status',
        'term',
        'pupil_id',
        'parent_id',
    ];
    public function pupils(): BelongsTo
    {
        return $this->belongsTo(Pupil::class);
    }

    public function parents(): BelongsTo
    {
        return $this->belongsTo(Parent::class);
    }
}
