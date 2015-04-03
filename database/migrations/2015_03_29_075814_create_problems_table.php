<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProblemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('problems', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->timestamps();
			$table->bigInteger('updated_by')->unsigned();
			$table->bigInteger('created_by')->unsigned();
			
			$table->boolean('published');
			$table->string('title', 128);
			$table->string('slug', 128)->unique();
			$table->integer('time_limit');
			$table->integer('memory_limit');
			$table->integer('case_time_limit');
			$table->integer('difficulty_level')->unsigned();
			$table->boolean('is_special_judge');
			$table->string('special_judger', 64);
			
			$table->text('description');
			$table->text('input');
			$table->text('output');
			$table->text('sample_input');
			$table->text('sample_output');
			$table->text('hint');
			$table->text('analysis');
			
			$table->string('source', 128);
			$table->string('source_url', 256);
			$table->string('author',32);
			$table->string('author_url', 256);
			
			$table->bigInteger('accept_count')->unsigned();
			$table->bigInteger('submit_count')->unsigned();
			$table->bigInteger('submit_user_count')->unsigned();
			$table->bigInteger('solved_user_count')->unsigned();

			$table->foreign('created_by')->references('id')->on('users');
			$table->foreign('updated_by')->references('id')->on('users');
				
			$table->index('title');
			$table->index('published');
			$table->index('source');
			$table->index('slug');
				
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//Schema::dropForeign('problems_create_by_foreign');
		//Schema::dropForeign('problems_updated_by_foreign');
		Schema::drop('problems');
	}

}
