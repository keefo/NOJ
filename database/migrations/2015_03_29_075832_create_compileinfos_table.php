<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompileinfosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('compileinfos', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->binary('compile_info');
			
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
		//Schema::drop('submit_id');
		Schema::drop('compileinfos');
	}

}
