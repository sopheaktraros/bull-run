<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Permission extends Authenticatable
{

    protected $table = 'permission';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'keyword','description'
    ];

    public function menu()
    {
        return $this->hasOne('App\Menu');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role', 'role_permission', 'permission_id', 'role_id');
    }

    public function rolePermission()
    {
        return $this->hasOne('App\RolePermission');
    }

}
