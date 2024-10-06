<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Ward extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
    ];
    public function district(): HasOne
    {
        return $this->hasOne(District::class, 'id', 'district_id');
    }

    public function schools(): HasMany
    {
        return $this->hasMany(School::class);
    }
}
