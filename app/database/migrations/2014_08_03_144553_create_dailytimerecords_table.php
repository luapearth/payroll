<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDailytimerecordsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dailytimerecords', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('rid');
			$table->dateTime('rdatetime');
			$table->string('rtime');
			$table->string('rtype');
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
		Schema::drop('dailytimerecords');
	}

}
