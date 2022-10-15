<?php

namespace App\Repositories;

use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class RoleRepositories
{

    /**
     * get model
     * @return string
     */
    public function getAll($perPage)
    {
        $getData = DB::table('roles')->paginate($perPage);
        return $getData;
    }
    public function details($name)
    {
        $getData = DB::table('roles')
            ->join('role_has_permissions', 'roles.id', '=', 'role_has_permissions.role_id')
            ->join('permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
            ->where('roles.name', '=', $name)
            ->select('permissions.name as permissions_name')
            ->get();
        return $getData;
    }
    public function search($name, $perPage)
    {
        $getData = Role::where('name', 'LIKE', '%' . $name . '%')->paginate($perPage);
        return $getData;
    }
    public function insert($name)
    {
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        Role::create([
            'name' => strtolower($name),
            'display_name' => $name,
            'created_at' => $dt->toDateTimeString()
        ]);
    }
    public function update($name, $permissions)
    {
        $role_id = DB::table('roles')
            ->where('name', '=', $name)
            ->select('id')
            ->get()->pluck('id')->toArray();
        DB::table('role_has_permissions')
            ->where('role_id', '=', $role_id)
            ->delete();
        foreach ($permissions as $permission) {
            $permission_id = DB::table('permissions')
                ->where('name', '=', $permission)
                ->select('id')
                ->get()->pluck('id')->toArray();
            DB::table('role_has_permissions')->insert([
                'permission_id' => $permission_id[0],
                'role_id' => $role_id[0]
            ]);
        }
    }
    public function delete($id)
    {
        DB::table('roles')->where('id', $id)->delete();
    }
}
