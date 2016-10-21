<?php

namespace App\Repositories;

use App\Society;


class SocietiesRepository
{

    protected $societies;

    public function __construct(Society $societies)
	{
		$this->societies = $societies;
	}

	private function save(Society $societies, Array $inputs)
	{
		$societies->name = $inputs['name'];
		$societies->siret = $inputs['siret'];
		$societies->address = $inputs['address'];
		$societies->cp = $inputs['cp'];
		$societies->city = $inputs['city'];
		$societies->save();
	}


	public function store(Array $inputs)
	{
		$societies = new $this->societies;		
		$this->save($societies, $inputs);

		return $societies;
	}

	public function getById($id)
	{
		return $this->societies->findOrFail($id);
	}

	public function update($id, Array $inputs)
	{
		$this->save($this->getById($id), $inputs);
	}

	public function destroy($id)
	{
		
		$society = $this->getById($id);
		
		if(!$society->user()->where('society_id','=', $id)->get()->isEmpty())
		{
			$errors = 'un ou plusieurs utilisateurs sont lier a cette societé, veuillez supprimer ces utilisateurs avant de supprimer cette société?';
			return redirect('societies.index')->with('status', $errors);
		}
		
		
		$society = $this->getById($id)->delete();
		
	}

}