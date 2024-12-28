<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class PersonalAccessToken extends Model
{
    /* use HasUuids; // This should automatically generate UUIDs for the 'id' field

    protected $table = 'personal_access_tokens';
    protected $primaryKey = 'id';
    protected $keyType = 'string'; // UUIDs are strings
    public $incrementing = false; // UUIDs are not auto-incrementing

    // Ensure that UUIDs are being generated correctly
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    } */
}
