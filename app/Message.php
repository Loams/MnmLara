<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model {

	protected $table = 'messages';
	public $timestamps = true;
	protected $fillable = array('user_id', 'message');

	public function tickets()
	{
		return $this->belongsToMany('App\Ticket');
	}

	public function user()
	{
		return $this->belongsTo('App\User', 'id');
	}

}