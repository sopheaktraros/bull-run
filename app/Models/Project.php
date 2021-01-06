<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'project_no',
        'name',
        'delete',
        'created_by',
        'updated_by' 
    ];
}
