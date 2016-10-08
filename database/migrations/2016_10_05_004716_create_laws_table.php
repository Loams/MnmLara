<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLawsTable extends Migration {

	public function up()
	{
		Schema::create('laws', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 20);
			$table->tinyInteger('law_level');
		});
	}

	public function down()
	{
		Schema::drop('laws');
	}
}