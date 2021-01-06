<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class RolePermission extends Authenticatable
{

    protected $table = 'role_permission';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id', 'permission_id'
    ];

    public function permission()
    {
        return $this->belongsTo('App\Permission');
    }

    public function allPermissionsWithRole($role_id)
    {
        return
            DB::table('role_permission')
                ->select(
                    'role_permission.*',
                    'permission.*',
                    'roles.name as role_name'
                )
                ->rightJoin('permission', function ($join) use ($role_id) {
                    $join->on('permission.id', '=', 'role_permission.permission_id');
                    $join->on('role_permission.role_id', '=', DB::raw($role_id));
                })
                ->leftJoin('roles', 'roles.id', '=', 'role_permission.role_id')
                ->orderBy('permission.name', 'asc')
                ->get();
    }

    public function allPermissions()
    {
        return
            DB::table('role_permission')
                ->rightJoin('permission', function ($join) {
                    $join->on('permission.id', '=', 'role_permission.permission_id');
                })
                ->orderBy('permission.name', 'asc')
                ->get();
    }

    public function deleteByRoleId($role_id)
    {
        DB::table('role_permission')
            ->where('role_id', '=', $role_id)
            ->delete();

        return true;
    }

    public function replace($role_id, $data)
    {
        if(!isset($data['permission_id'])) {
            return false;
        }

        if($this->deleteByRoleId($role_id)) {
            $permissions = $data['permission_id'];

            $insertData = [];
            if(is_array($permissions)) {
                foreach($permissions as $permission_id) {
                    $insertData[] = [
                        'role_id' => $role_id,
                        'permission_id' => $permission_id
                    ];
                }
            }

            if(count($insertData)) {
                DB::table('role_permission')->insert($insertData);
            }

        }

        return true;
    }

    /**
     * @param $permission_id
     */
    public function replacePermissionForRoot($permission_id)
    {
        $role = new Role();

        $rootRole = $role->findRoot();

        $permissionExists = $this->where([
            'role_id' => $rootRole->id,
            'permission_id' => $permission_id
        ])->get();

        if(count($permissionExists) == 0) {
            $this->insert([
                'role_id' => $rootRole->id,
                'permission_id' => $permission_id
            ]);
        }

        return true;
    }
    
}
