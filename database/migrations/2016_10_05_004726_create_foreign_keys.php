<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('tickets', function(Blueprint $table) {
			$table->foreign('create_by')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('tickets', function(Blueprint $table) {
			$table->foreign('treat_by')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('tickets', function(Blueprint $table) {
			$table->foreign('category_id')->references('id')->on('categories')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('tickets', function(Blueprint $table) {
			$table->foreign('priority_id')->references('id')->on('priorities')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('tickets', function(Blueprint $table) {
			$table->foreign('status_id')->references('id')->on('status')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('users', function(Blueprint $table) {
			$table->foreign('law_id')->references('id')->on('laws')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('users', function(Blueprint $table) {
			$table->foreign('society_id')->references('id')->on('societies')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('ticket_message', function(Blueprint $table) {
			$table->foreign('ticket_id')->references('id')->on('tickets')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('ticket_message', function(Blueprint $table) {
			$table->foreign('message_id')->references('id')->on('messages')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('messages', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('tickets', function(Blueprint $table) {
			$table->dropForeign('tickets_create_by_foreign');
		});
		Schema::table('tickets', function(Blueprint $table) {
			$table->dropForeign('tickets_treat_by_foreign');
		});
		Schema::table('tickets', function(Blueprint $table) {
			$table->dropForeign('tickets_category_id_foreign');
		});
		Schema::table('tickets', function(Blueprint $table) {
			$table->dropForeign('tickets_priority_id_foreign');
		});
		Schema::table('tickets', function(Blueprint $table) {
			$table->dropForeign('tickets_status_id_foreign');
		});
		Schema::table('users', function(Blueprint $table) {
			$table->dropForeign('users_law_id_foreign');
		});
		Schema::table('users', function(Blueprint $table) {
			$table->dropForeign('users_society_id_foreign');
		});
		Schema::table('ticket_message', function(Blueprint $table) {
			$table->dropForeign('ticket_message_ticket_id_foreign');
		});
		Schema::table('ticket_message', function(Blueprint $table) {
			$table->dropForeign('ticket_message_message_id_foreign');
		});
		Schema::table('messages', function(Blueprint $table) {
			$table->dropForeign('messages_user_id_foreign');
		});
	}
}