<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Ward extends Model
{
    use HasFactory;

    protected $table = 'wards';
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $keyType = 'int';
    protected $fillable = [
        'id',
        'name',
        'district_id'
    ];

    public function district(): HasOne
    {
        return $this->hasOne(District::class, 'id', 'district_id');
    }

}
