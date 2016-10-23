<?php

namespace App\Repositories;

use App\User;

class UsersRepository
{

    protected $users;

    public function __construct(User $users)
	{
		$this->users = $users;
	}

	private function save(User $users, Array $data)
	{
		$users->firstname = $data['firstname'];
        $users->lastname = $data['lastname'];
        $users->email = $data['email'];
        $users->law_id = $data['law_id'];
        $users->society_id = $data['society_id'];
		if(isset($data['password']))
		{
			$users->password = bcrypt($data['password']) ;
		}
        $users->photo = $data['photo'];
		$users->save();
	}


	public function store(Array $inputs)
	{
		$users = new $this->users;		
		$this->save($users, $inputs);

		return $users;
	}

	public function getById($id)
	{
		return $this->users->findOrFail($id);
	}

	public function update($id, Array $inputs)
	{
		$this->save($this->getById($id), $inputs);
	}
	
	public function updatePassword($id, Array $inputs)
	{
		unset($inputs['oldpassword']);
		$inputs['password'] = $inputs['newpassword'];
		unset($inputs['newpassword']);
		$this->save($this->getById($id), $inputs);
	}
	
	public function destroy($id)
	{
		$this->getById($id)->delete();
	}

}