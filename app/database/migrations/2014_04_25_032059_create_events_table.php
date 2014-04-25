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
                    $table->integer('user_id')->unsigned();
                    $table->string('title');
                    $table->string('description');
                    $table->dateTime('from');
                    $table->dateTime('to');
                    $table->timestamps();
                    $table->softDeletes();
                    
            });
            
            Schema::table('events', function($table)
            {
                    $table->foreign('user_id')
                            ->references('id')->on('users')
                            ->onDelete('cascade');
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
