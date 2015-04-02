<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContestproblemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contestproblems', function(Blueprint $table)
		{
			$table->bigInteger('contest_id')->unsigned();
			$table->bigInteger('problem_id')->unsigned();
			$table->integer('order')->unsigned();
			$table->string('title', 64);
			
			$table->foreign('contest_id')->references('id')->on('contests');
			$table->foreign('problem_id')->references('id')->on('problems');
			
			$table->index('contest_id');
			$table->index('problem_id');
			
			$table->primary(array('contest_id', 'problem_id'));
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//Schema::drop('contest_id');
		//Schema::drop('problem_id');
		Schema::drop('contestproblems');
	}

}
