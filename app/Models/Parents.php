<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;

class Parents extends Model
{
    use HasFactory, HasApiTokens, HasUuids;

    protected $table = 'parents';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable =
    [
        'first_name',
        'middle_name',
        'last_name',
        'phone_number',
        'postal',
        'ward_id',
        'district_id',
        'region_id',
        'street',
        'user_id',

    ];
    public function student_parents(): HasMany
    {
        return $this->hasMany(StudentParent::class);
    }
}
