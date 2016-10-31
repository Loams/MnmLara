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
		$this->getById($id)->users()->sync([]); // Delete relationship data
		$this->getById($id)->perms()->sync([]); // Delete relationship data

		$this->getById($id)->forceDelete(); // Now force delete will work regardless of whether the pivot table has cascading delete
		//$this->getById($id)->delete();
	}

	public function updatePermission($id, Array $inputs)
	{
		$attach = array();
		$this->role = $this->role->findOrFail($id);

		foreach($inputs as $perm_id => $value)
		{
			$firstKey = substr($perm_id, 0, 1);
			//echo "premiere lettre : " . $firstKey . " key : " . $key . " value : " . $value ."<br>";
			if($firstKey != '_'){
				echo( "id : " . $perm_id . " value : " . $value . "<br>");
				if($value == 'on')
				{
					$attach[] = $perm_id;
				}
			}
		}
		$this->role->permission()->sync($attach);
	}
}