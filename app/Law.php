<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Law extends Model {

	protected $table = 'laws';
	public $timestamps = false;
	protected $fillable = array('name', 'law_level');

	public function user()
	{
		return $this->hasMany('App\User', 'law_id');
	}
	
	static public function getAll(){
		return Law::all();
	}
}