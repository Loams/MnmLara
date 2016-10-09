<?php

namespace App\Repositories;

use App\Law;

class LawRepository
{

    protected $law;

    public function __construct(Law $law)
	{
		$this->law = $law;
	}

	private function save(Law $law, Array $inputs)
	{
		$law->name = $inputs['name'];
		$law->law_level = $inputs['law_level'];	
		$law->save();
	}


	public function store(Array $inputs)
	{
		$law = new $this->law;		
		$this->save($law, $inputs);

		return $law;
	}

	public function getById($id)
	{
		return $this->law->findOrFail($id);
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