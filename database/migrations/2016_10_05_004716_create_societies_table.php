<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSocietiesTable extends Migration {

	public function up()
	{
		Schema::create('societies', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 50)->unique();
			$table->string('siret', 14)->unique();
			$table->string('address');
			$table->smallInteger('cp');
			$table->string('city', 50);
		});
	}

	public function down()
	{
		Schema::drop('societies');
	}
}