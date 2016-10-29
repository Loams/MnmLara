<?php

namespace App;


use Illuminate\Support\Facades\DB;
use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    public static function getAll()
	{
		return Permission::all();
	}

	public function roles()
	{
		return $this->belongsToMany('App\Role');
	}

	public function hasRole($id)
	{
		return DB::table('permission_role')->where('permission_id', '=', $this->id)->where('role_id', '=', $id)->get();
	}
}
