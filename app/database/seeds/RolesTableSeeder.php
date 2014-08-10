<?php

// Composer: "fzaninotto/faker": "v1.3.0"
// use Faker\Factory as Faker;

class RolesTableSeeder extends Seeder {

	public function run()
	{
		Role::create([
			'name' => 'DTR Manager'
		]);
		Role::create([
			'name' => 'Department Manager'
		]);
		Role::create([
			'name' => 'Payroll Manager'
		]);
		Role::create([
			'name' => 'View DTR'
		]);
		Role::create([
			'name' => 'View Payslip'
		]);
	}

}