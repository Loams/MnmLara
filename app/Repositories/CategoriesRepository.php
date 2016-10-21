<?php

namespace App\Repositories;

use App\Categories;

class CategoriesRepository
{

    protected $categories;

    public function __construct(Categories $categories)
	{
		$this->categories = $categories;
	}

	private function save(Categories $categories, Array $inputs)
	{
		$categories->name = $inputs['name'];	
		$categories->save();
	}


	public function store(Array $inputs)
	{
		$categories = new $this->categories;		
		$this->save($categories, $inputs);

		return $categories;
	}

	public function getById($id)
	{
		return $this->categories->findOrFail($id);
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