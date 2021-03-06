<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
	use EntrustUserTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'password', 'photo', 'society_id', 'law_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	
	public function law()
	{
		return $this->belongsTo('App\Law', 'law_id');
	}

	public function society()
	{
		return $this->belongsTo('App\Society', 'society_id');
	}

	public function createTicket()
	{
		return $this->hasMany('App\Ticket', 'create_by');
	}

	public function treatTicket()
	{
		return $this->hasMany('App\Ticket', 'treat_by');
	}

	public function roles(){
		return $this->belongsToMany('App\Role');
	}
	
	static public function getAll(){
		return User::all();
	}
}
