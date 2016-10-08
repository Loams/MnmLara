<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketsMessages extends Model {

	protected $table = 'ticket_message';
	public $timestamps = false;
	protected $fillable = array('ticket_id', 'message_id');

}