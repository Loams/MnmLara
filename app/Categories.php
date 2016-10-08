<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model {

	protected $table = 'categories';
	public $timestamps = false;
	protected $fillable = array('name');

	public function tickets()
	{
		return $this->hasMany('App\Ticket', 'category_id');
	}

}