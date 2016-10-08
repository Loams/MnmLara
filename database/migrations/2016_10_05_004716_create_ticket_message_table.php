<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTicketMessageTable extends Migration {

	public function up()
	{
		Schema::create('ticket_message', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('ticket_id')->unsigned();
			$table->integer('message_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('ticket_message');
	}
}