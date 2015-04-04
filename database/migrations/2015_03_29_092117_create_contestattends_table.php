<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContestattendsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contestattends', function(Blueprint $table)
		{
			$table->timestamps();
			$table->bigInteger('user_id')->unsigned();
			$table->bigInteger('contest_id')->unsigned();
			
			$table->string('username', 45);
			$table->string('screen_name', 45);
			$table->string('nick', 64);
			$table->string('ip', 20);
			
			$table->integer('accepts')->unsigned();
			$table->integer('penalty')->unsigned();
			
			$table->integer('a_time')->unsigned();
			$table->integer('a_failed_count')->unsigned();
			$table->integer('b_time')->unsigned();
			$table->integer('b_failed_count')->unsigned();
			$table->integer('c_time')->unsigned();
			$table->integer('c_failed_count')->unsigned();
			$table->integer('d_time')->unsigned();
			$table->integer('d_failed_count')->unsigned();
			$table->integer('e_time')->unsigned();
			$table->integer('e_failed_count')->unsigned();
			$table->integer('f_time')->unsigned();
			$table->integer('f_failed_count')->unsigned();
			$table->integer('g_time')->unsigned();
			$table->integer('g_failed_count')->unsigned();
			$table->integer('h_time')->unsigned();
			$table->integer('h_failed_count')->unsigned();
			$table->integer('i_time')->unsigned();
			$table->integer('i_failed_count')->unsigned();
			$table->integer('j_time')->unsigned();
			$table->integer('j_failed_count')->unsigned();
			$table->integer('k_time')->unsigned();
			$table->integer('k_failed_count')->unsigned();
			$table->integer('l_time')->unsigned();
			$table->integer('l_failed_count')->unsigned();
			$table->integer('m_time')->unsigned();
			$table->integer('m_failed_count')->unsigned();
			$table->integer('n_time')->unsigned();
			$table->integer('n_failed_count')->unsigned();
			$table->integer('o_time')->unsigned();
			$table->integer('o_failed_count')->unsigned();
			$table->integer('p_time')->unsigned();
			$table->integer('p_failed_count')->unsigned();
			$table->integer('q_time')->unsigned();
			$table->integer('q_failed_count')->unsigned();
			$table->integer('r_time')->unsigned();
			$table->integer('r_failed_count')->unsigned();
			$table->integer('s_time')->unsigned();
			$table->integer('s_failed_count')->unsigned();
			$table->integer('t_time')->unsigned();
			$table->integer('t_failed_count')->unsigned();
			$table->integer('u_time')->unsigned();
			$table->integer('u_failed_count')->unsigned();
			$table->integer('v_time')->unsigned();
			$table->integer('v_failed_count')->unsigned();
			$table->integer('w_time')->unsigned();
			$table->integer('w_failed_count')->unsigned();
			$table->integer('x_time')->unsigned();
			$table->integer('x_failed_count')->unsigned();
			$table->integer('y_time')->unsigned();
			$table->integer('y_failed_count')->unsigned();
			$table->integer('z_time')->unsigned();
			$table->integer('z_failed_count')->unsigned();

			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('contest_id')->references('id')->on('contests');
			
			$table->index('user_id');
			$table->index('contest_id');
			
			$table->primary(array('user_id', 'contest_id'));
			
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
		//Schema::drop('contest_id');
		Schema::drop('contestattends');
	}

}
