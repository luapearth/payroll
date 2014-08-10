<?php

// Composer: "fzaninotto/faker": "v1.3.0"
// use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$user = User::create([
			'email' => 'demo@demo.com',
			'password' => Hash::make('demopassword')
		]);

		$user->addRole('admin');
	}

}