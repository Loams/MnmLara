<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Priority extends Model {

	protected $table = 'priorities';
	public $timestamps = false;
	protected $fillable = array('priority_level', 'name', 'class');

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function ticket()
	{
		return $this->hasMany('App\Ticket', 'priority_id');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	static public function getAll(){
		return Priority::all();
	}
}