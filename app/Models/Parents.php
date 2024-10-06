<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    use HasFactory;

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
        return $this->hasMany(Student_parent::class);
    }
}
