<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmitsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('submits', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->timestamps();
			$table->bigInteger('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			
			$table->bigInteger('problem_id')->unsigned();
			$table->foreign('problem_id')->references('id')->on('problems');
			
			$table->integer('time');
			$table->integer('memory');
			$table->string('class_name', 16);
			$table->tinyInteger('result');
			$table->tinyInteger('language');
			$table->string('ip', 20);
			
			$table->boolean('is_valid_solution');
			$table->integer('code_length')->unsigned();
			$table->boolean('shared');
			
			$table->bigInteger('contest_id')->unsigned();
			$table->foreign('contest_id')->references('id')->on('contests');
			
			$table->tinyInteger('contest_problem_number');
			
			$table->index('user_id');
			$table->index('problem_id');
			$table->index('is_valid_solution');
			$table->index('result');
			$table->index('language');
			$table->index('contest_id');
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//Schema::drop('user_id');
		//Schema::drop('problem_id');
		//Schema::drop('contest_id');
		Schema::drop('submits');
	}

}
