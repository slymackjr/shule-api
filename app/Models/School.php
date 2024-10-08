<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class School extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'schools';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
            'name',
            'ward_id',
            'district_id',
            'region_id',
            'street',
            'email',
            'logo',
            'motto',
            'level',
            'type',
            'school_number',
            'corporate_color',
            'school_registration_number',
            'contract_number',
            'status',
    ];
    public function wards(): BelongsTo
    {
        return $this->belongsTo(Ward::class);
    }

    public function teacher(): BelongsToMany
    {
        return $this->belongsToMany(Teacher::class,'school_teachers','school_id','teacher_id');
    }

    public function classes(): HasMany
    {
        return $this->hasMany(Classes::class);
    }
}
