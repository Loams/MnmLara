<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStatusTable extends Migration {

	public function up()
	{
		Schema::create('status', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('status_level')->unique();
			$table->string('name', 20)->unique();
		});
	}

	public function down()
	{
		Schema::drop('status');
	}
}