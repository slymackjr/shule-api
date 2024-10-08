<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SchoolRegistrationRequest extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'school_registration_requests';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'school_name',
        'school_registration_number',
        'school_phone_number',
        'school_email',
        'type',
        'level',
        'logo',
        'contract_number',
        'status',
        'postal_address',
        'motto',
        'region_id',
        'district_id',
        'ward_id',
        'street',
        'first_name',
        'last_name',
        'teacher_email',
        'phone_number',
    ];
    public function ward(): HasOne
    {
        return $this->hasOne(Ward::class, 'id', 'ward_id');
    }

    public function district(): HasOne
    {
        return $this->hasOne(District::class, 'id', 'district_id');
    }

    public function region(): HasOne
    {
        return $this->hasOne(Region::class, 'id', 'region_id');
    }
}
