<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('events', function($table)
            {
                    /* @var $table \Illuminate\Database\Schema\Blueprint */
                    $table->increments('id');
                    $table->bigInteger('user_id')->unsigned();
                    $table->string('title');
                    $table->string('description');
                    $table->dateTime('from');
                    $table->dateTime('to');
                    $table->timestamps();
                    $table->softDeletes();
            });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            Schema::drop('events');
	}

}
