<?php

namespace App\Models;

use App\Models\Region;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pupil extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'pupils';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'postal',
        'region_id',
        'district_id',
        'ward_id',
        'email',
        'phone_number',
        'gender',
        'pupil_reg_number',
        'stream_id',
        'street',
        'date_birth',
        'status',
        'payment_status'
    ];
    public function stream(): BelongsTo
    {
        return $this->belongsTo(Stream::class);
    }

    public function studentParents(): HasMany
    {
        return $this->hasMany(StudentParent::class);
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function ward(): BelongsTo
    {
        return $this->belongsTo(Ward::class);
    }
}
