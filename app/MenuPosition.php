<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class MenuPosition extends Authenticatable
{

    protected $table = 'menu_position';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'display_name'
    ];

    public function menu()
    {
        return $this->hasMany('App\Menu');
    }
}
