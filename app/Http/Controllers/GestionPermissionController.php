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
		foreach($request->input() as $key => $value )
		{
			echo "key : " . $key . "value : " . $value ."<br>";
		}
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
