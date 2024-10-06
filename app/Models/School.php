<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'physical_address',
        'email',
        'logo',
        'motto',
        'phone_number',
        'level',
        'contact_person',
        'school_number',
        'cooperate_color',
        'school_registration_no',
        'contract_number',
        'status',
        'ward_ids',
        'initial',
        'type'
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
