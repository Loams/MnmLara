<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePrioritiesTable extends Migration {

	public function up()
	{
		Schema::create('priorities', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('priority_level')->unique();
			$table->string('name', 20)->unique();
		});
	}

	public function down()
	{
		Schema::drop('priorities');
	}
}