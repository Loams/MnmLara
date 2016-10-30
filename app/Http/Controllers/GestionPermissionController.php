<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;

class GestionPermissionController extends Controller
{
	protected $permissions;
	protected $roles;

    public function __construct()
	{
		$this->permissions = Permission::all();
		$this->roles = Role::all();
	}

	public function index()
	{

		$permissions = $this->permissions;

		$roles = $this->roles;

		return view('content.gestionpermission', compact('permissions', 'roles'));
	}

	public function store(Request $request)
	{
	dd($request);
	}

	public function create()
	{

	}

	public function show()
	{

	}

	public function update(Request $request)
	{
		$test =array();
		foreach($request->input() as $key => $value )
		{
			$firstKey = substr($key, 0, 1);
			//echo "premiere lettre : " . $firstKey . " key : " . $key . " value : " . $value ."<br>";
			if($firstKey != '_'){
				$attributes = explode('_', $key);

				$test[$attributes[0]] = array();
				foreach($test as $key2 => $value2)
				{
					if($attributes[0] == $key2)
					{
						$test3 = array($attributes[1] => $value);
						array_push($key2, $test3);
					}
				}
				/*foreach($test as $role => $permission){

					echo("<pre>");
					var_dump($role);
					echo("</pre>");
					//echo  " role : " . $role . " permission : " . $permission ."<br>";
				}*/
			//echo "premiere lettre : " . $firstKey . " key : " . $key . " value : " . $value ."<br>";
			}
		}
		echo("<pre>");
		var_dump($test);
		echo("</pre>");
		dd($request->input());
	}

	public function edit(Request $request)
	{
		dd($request);
	}

	public function destroy()
	{

	}
}
