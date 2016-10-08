<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Society extends Model {

	protected $table = 'societies';
	public $timestamps = false;
	protected $fillable = array('name', 'siret', 'address', 'cp', 'city');

	public function user()
	{
		return $this->hasMany('App\User', 'society_id');
	}
	
	static public function getAll(){
		return Society::all();
	}

}