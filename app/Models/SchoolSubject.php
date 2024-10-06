<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolSubject extends Model
{
    use HasFactory;

    protected $table = 'school_subject';

    protected $fillable =[ 'school_id', 'name','level','code','sw_name'];
}
