<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SchoolSubject extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'school_subjects';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable =[ 'school_id', 'name','level','code','sw_name'];
}
