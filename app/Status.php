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

	static public function getAll(){
		return Status::all();
	}
	
	public function getByStatus($status){
		return DB::table('tickets')->where('tickets.status_id')->join('status', 'status.id', '=', 'tickets.status_id')->get;
	}
}