<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Create users table
		Schema::create('users', function($table){
			$table->increments('id');
			$table->string('username', 50)->unique();
			$table->string('password', 400);
			$table->string('first_name', 50);
			$table->string('last_name', 50);
			$table->string('locale', 50);
			$table->string('timezone', 50);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// Drop users table
		Schema::dropIfExists('users');
	}

}
