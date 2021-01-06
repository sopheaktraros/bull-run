<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class Role extends Authenticatable
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description',
    ];

    public $none = 2;

    public function scopeDefaultOrder($query)
    {
        return $query->orderByRaw("FIELD(id , '2') ASC")->orderBy('id', 'ASC');
    }

    public function user()
    {
        return $this->hasMany('App\User');
    }

    public function findRoot()
    {
        $query =
            DB::table('roles')
                ->select('id', 'name', 'description')
                ->where('name', '=', 'root')
                ->limit(1)
                ->get();

        if (count($query) == 0) {
            die('User root not defined!!');
        }

        return $query[0];
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Permission', 'role_permission', 'role_id', 'permission_id');
    }

    public function findSubscriber()
    {
        return DB::table('roles')->where('subscriber', '1')->first();
    }

	public function scopeActive($q) {
		return $q->where('id', '!=', 1);
    }

}
