<?php

namespace App\Repositories;

use App\Status;

class StatusRepository
{

    protected $status;

    public function __construct(Status $status)
	{
		$this->status = $status;
	}

	private function save(Status $status, Array $inputs)
	{
		$status->name = $inputs['name'];
		$status->status_level = $inputs['status_level'];	
		$status->save();
	}


	public function store(Array $inputs)
	{
		$status = new $this->status;		
		$this->save($status, $inputs);

		return $status;
	}

	public function getById($id)
	{
		return $this->status->findOrFail($id);
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