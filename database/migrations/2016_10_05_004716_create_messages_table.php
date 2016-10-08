<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMessagesTable extends Migration {

	public function up()
	{
		Schema::create('messages', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->text('message');
			$table->string('uploded_file')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('messages');
	}
}