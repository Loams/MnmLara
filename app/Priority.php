<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Priority extends Model {

	protected $table = 'priorities';
	public $timestamps = false;
	protected $fillable = array('priority_level', 'name');

	public function ticket()
	{
		return $this->hasMany('App\Ticket', 'priority_id');
	}

}