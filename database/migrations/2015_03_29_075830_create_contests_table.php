<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contests', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->timestamps();
			$table->bigInteger('create_by')->unsigned();
			$table->bigInteger('updated_by')->unsigned();
			$table->boolean('published')->default(false);
			$table->string('title', 128);
			$table->text('description');
			$table->dateTime('start_time');
			$table->dateTime('end_time');
			$table->boolean('private')->default(false);
			$table->string('password', 32);
			$table->text('solution_report');

			$table->foreign('create_by')->references('id')->on('users');
			$table->foreign('updated_by')->references('id')->on('users');
			$table->index('title');
			$table->index('private');
			$table->index('published');


            $table->bigInteger('oldid')->unsigned();
			$table->index('oldid');

			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//Schema::drop('create_by');
		//Schema::drop('updated_by');
		Schema::drop('contests');
	}

}
