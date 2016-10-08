<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model {

	protected $table = 'status';
	public $timestamps = false;
	protected $fillable = array('status_level', 'name');

	public function ticket()
	{
		return $this->hasOne('App\Ticket', 'status_id');
	}

}