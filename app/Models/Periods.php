<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periods extends Model
{
    protected $fillable = [
        'name',
        'period',
        'rate',
        'delete',
        'created_by',
        'updated_by' 
    ];
}
