<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTicketsTable extends Migration {

	public function up()
	{
		Schema::create('tickets', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title', 250);
			$table->datetime('date_resolution');
			$table->integer('create_by')->unsigned();
			$table->integer('treat_by')->unsigned();
			$table->integer('category_id')->unsigned();
			$table->integer('priority_id')->unsigned();
			$table->integer('status_id')->unsigned();
			$table->boolean('solved');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('tickets');
	}
}