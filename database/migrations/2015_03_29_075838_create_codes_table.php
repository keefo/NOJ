<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('codes', function(Blueprint $table)
		{
			$table->bigInteger('submit_id')->unsigned();
			$table->binary('source_code');
			$table->foreign('submit_id')->references('id')->on('submits');
			$table->index('submit_id');
			$table->primary('submit_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//Schema::drop('submit_id');
		Schema::drop('codes');
	}

}
