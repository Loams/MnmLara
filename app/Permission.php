<?php

namespace App;


use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    public static function getAll()
	{
		return Permission::all();
	}
}