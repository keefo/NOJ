<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('articles', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->timestamps();
			$table->bigInteger('updated_by')->unsigned();
			$table->bigInteger('create_by')->unsigned();
			
			$table->boolean('published');
			$table->string('title', 128);
			$table->string('slug', 128)->unique();
			$table->mediumText('content');
			
			$table->foreign('updated_by')->references('id')->on('users');
			$table->foreign('create_by')->references('id')->on('users');
			
			$table->index('title');
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
		//Schema::drop('updated_by');
		//Schema::drop('create_by');
		Schema::drop('articles');
	}

}