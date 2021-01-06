<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class Menu extends Authenticatable
{

    protected $table = 'menus';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'page_id', 'parent_id','url', 'module_id', 'name','kh_name','ch_name', 'description', 'slug', 'css_icon_class',
        'menu_position_id', 'menu_site_id', 'permission_id', 'active', 'default_order', 'page_id'
    ];

    public function permission()
    {
        return $this->belongsTo('App\Permission');
    }

	public function children() {
		return $this->hasMany('App\Menu', 'parent_id');
	}

	public function scopeParent($q) {
		return $q->where(function ($q) {
			$q->where('parent_id', 0);
			$q->orWhereNull('parent_id');
		});
	}

    public function findByRole($role)
    {
        return
            DB::table('menus')
                ->select(
                    'menus.parent_id',
                    'menus.id',
                    'menus.name',
                    'menus.slug',
                    'menus.description',
                    'menus.css_icon_class',
                    'menu_site.name as site',
                    'permission.name as permission_name',
                    'permission.keyword as permission_keyword',
                    'menu_position.name as position'
                )
                ->join('menu_site', 'menu_site.id', '=', 'menus.menu_site_id')
                ->join('menu_position', 'menu_position.id', '=', 'menus.menu_position_id')
                ->leftJoin('permission', 'permission.id', '=', 'menus.permission_id')
                ->join('role_permission', function ($join) use ($role) {
                    $join->on('role_permission.permission_id', '=', 'permission.id');
                    $join->on('role_permission.role_id', '=', DB::raw($role));
                })
                ->orderBy('default_order')
                ->orderBy('menus.name')
                ->get();

    }

    public function menuPosition()
    {
        return $this->belongsTo('App\MenuPosition');
    }

    public function menuSite()
    {
        return $this->belongsTo('App\MenuSite');
    }

    public function scopeActive($query, $active = 1)
    {
        return $query->where('active', $active);
    }

}
