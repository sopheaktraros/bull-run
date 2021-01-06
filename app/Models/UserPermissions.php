<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPermissions extends Model
{
    protected $fillable = [
        'role_id',
        'name',
        'group',
        'order',
        'route',
        'icon',
        'active',
        'enable',
        'write',
        'update',
        'delete',
        'viewall'
    ];
}
