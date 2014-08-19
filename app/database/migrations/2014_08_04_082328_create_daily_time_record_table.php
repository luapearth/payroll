<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDailyTimeRecordTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('daily_time_records', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('rid')->nullable();
			$table->string('employeeid')->nullable();
			$table->date('rdate');
			$table->string('rtime');
			$table->string('rtype');
			$table->string('img_url')->nullable();
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
		Schema::drop('daily_time_records');
	}

}
