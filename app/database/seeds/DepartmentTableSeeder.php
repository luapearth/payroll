<?php

// Composer: "fzaninotto/faker": "v1.3.0"
// use Faker\Factory as Faker;

class DepartmentTableSeeder extends Seeder {

	public function run()
	{
		// $faker = Faker::create();

		Department::create(array(
			'name'		=> 'ADMIN'
		));
		Department::create(array(
			'name'		=> 'REGISTRAR'
		));
		Department::create(array(
			'name'		=> 'FINANCE'
		));
		Department::create(array(
			'name'		=> 'BASIC EDUCATION'
		));
		Department::create(array(
			'name'		=> 'GENERAL EDUCATION'
		));
		Department::create(array(
			'name'		=> 'ACADEMIC'
		));
		Department::create(array(
			'name'		=> 'LAN / EMRC'
		));
	}

}