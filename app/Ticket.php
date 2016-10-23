<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ticket extends Model {

	protected $table = 'tickets';
	public $timestamps = true;
	protected $fillable = array('title', 'date_resolution', 'create_by', 'treat_by', 'category_id', 'priority_id', 'status_id', 'solved');
	
	public function treatBy()
	{
		return $this->belongsTo('App\User', 'treat_by');
	}

	public function status()
	{
		return $this->belongsTo('App\Status', 'status_id');
	}

	public function category()
	{
		return $this->belongsTo('App\Categories', 'category_id');
	}

	public function priority()
	{
		return $this->belongsTo('App\Priority', 'priority_id');
	}

	public function createBy()
	{
		return $this->belongsTo('App\User', 'create_by');
	}

	public function message()
	{
		return $this->belongsToMany('App\Message');
	}
	
	static public function getAll(){
		return Ticket::all();
	}
	
	static public function getNbYourTicket($id)
	{
		return DB::table('tickets')->where('open', '=', 0)->where('create_by', '=', $id)->count();
	}
	static public function getNbTicket($id = null)
	{
		return DB::table('tickets')->where('open', '=', 0)->count();
	}

}