<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuSite extends Model
{

    protected $table = 'menu_site';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug'
    ];

    public function menus()
    {
        return $this->hasMany('App\Menu')->orderBy('default_order', 'ASC');
    }

}
