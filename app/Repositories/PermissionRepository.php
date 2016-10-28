<?php


namespace App\Repositories;


use App\Permission;

class PermissionRepository
{
	protected $permission;

	public function __construct(Permission $permission)
	{
		$this->permission = $permission;
	}

	private function save(Permission $permission, Array $inputs)
	{
		$permission->name = $inputs['name'];
		$permission->display_name = $inputs['display_name'];
		$permission->description = $inputs['description'];

		$permission->save();
	}


	public function store(Array $inputs)
	{
		$permission = new $this->permission;
		$this->save($permission, $inputs);

		return $permission;
	}

	public function getById($id)
	{
		return $this->permission->findOrFail($id);
	}

	public function update($id, Array $inputs)
	{
		$this->save($this->getById($id), $inputs);
	}

	public function destroy($id)
	{
		$this->getById($id)->delete();
	}
}