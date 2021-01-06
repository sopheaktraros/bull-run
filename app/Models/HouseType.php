<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HouseType extends Model
{
    protected $fillable = [
        'name',
        'delete',
        'created_by',
        'updated_by' 
    ];
}
