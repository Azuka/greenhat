<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		User::create([
			'username' => 'john',
			'password' => Hash::make('changemenow'),
			'first_name' => 'John',
			'last_name' => 'Q. Public',
			'locale' => 'en',
			'timezone' => 'America/Los_Angeles',
		]);
	}

}
