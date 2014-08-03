<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeeinformationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('employeeinformations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('employeeid');
			$table->integer('rid');
			$table->integer('department_id')->unsigned()->index();
			$table->foreign('department_id')->references('id')->on('departments');
			$table->integer('user_id')->unsigned()->index();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
		Schema::drop('employeeinformations');
	}

}
