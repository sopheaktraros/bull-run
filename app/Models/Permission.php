<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'role_id',
        'name',
        'group',
        'order',
        'control',
        'icon',
        'enable',
        'active',
        'write',
        'update',
        'delete',
        'viewable'
    ];
}
