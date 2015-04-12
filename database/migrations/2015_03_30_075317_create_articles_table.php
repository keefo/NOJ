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
			$table->bigInteger('created_by')->unsigned();
			$table->integer('category');
			
			$table->boolean('published')->default(false);
			$table->string('title', 128);
			$table->string('slug', 128)->unique();
			$table->text('introduction');
			
			$table->mediumText('content');
			
			$table->foreign('updated_by')->references('id')->on('users');
			$table->foreign('created_by')->references('id')->on('users');
			
			$table->index('title');
			$table->index('slug');
			$table->index('category');
			
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
