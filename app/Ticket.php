<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model {

	protected $table = 'tickets';
	public $timestamps = true;

	public function treatBy()
	{
		return $this->belongsTo('App\User', 'id');
	}

	public function status()
	{
		return $this->belongsTo('App\Status', 'id');
	}

	public function category()
	{
		return $this->belongsTo('App\Categories', 'id');
	}

	public function priority()
	{
		return $this->belongsTo('App\Priority', 'id');
	}

	public function createBy()
	{
		return $this->belongsTo('App\User', 'id');
	}

	public function message()
	{
		return $this->belongsToMany('App\Message');
	}

}