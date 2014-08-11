<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddSssToEmployeeinformationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('employeeinformations', function(Blueprint $table)
		{
			$table->string('sss')->nullable();
			$table->string('tin')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('employeeinformations', function(Blueprint $table)
		{
			$table->dropColumn('sss');
			$table->dropColumn('tin');
		});
	}

}
