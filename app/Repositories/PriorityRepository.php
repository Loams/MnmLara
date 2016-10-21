<?php

namespace App\Repositories;

use App\Priority;

class PriorityRepository
{

    protected $priority;

    public function __construct(Priority $priority)
	{
		$this->priority = $priority;
	}

	private function save(Priority $priority, Array $inputs)
	{
		$priority->name = $inputs['name'];
		$priority->priority_level = $inputs['priority_level'];	
		$priority->save();
	}


	public function store(Array $inputs)
	{
		$priority = new $this->priority;		
		$this->save($priority, $inputs);

		return $priority;
	}

	public function getById($id)
	{
		return $this->priority->findOrFail($id);
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