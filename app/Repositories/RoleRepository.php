<?php


namespace App\Repositories;


use App\Role;

class RoleRepository
{
	protected $role;

	public function __construct(Role $role)
	{
		$this->role = $role;
	}

	private function save(Role $role, Array $inputs)
	{
		$role->name = $inputs['name'];
		$role->display_name = $inputs['display_name'];
		$role->description = $inputs['description'];

		$role->save();
	}


	public function store(Array $inputs)
	{
		$role = new $this->role;
		$this->save($role, $inputs);

		return $role;
	}

	public function getById($id)
	{
		return $this->role->findOrFail($id);
	}

	public function update($id, Array $inputs)
	{
		$this->save($this->getById($id), $inputs);
	}

	public function destroy($id)
	{
		$this->getById($id)->delete();
	}

	public function updatePermission($id, Array $inputs)
	{
		$this->getById($id);
	}
}