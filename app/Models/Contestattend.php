<?php namespace App\Models;

class Contestattend extends BaseModel {

	protected $table = 'contestattends';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
						'created_at',
						'updated_at',
						'user_id',
						'contest_id',
						'username',
						'screen_name',
						'nick',
						'ip',
						'accepts',
						'penalty',
						'a_time',
						'a_failed_count',
						'b_time',
						'b_failed_count',
						'c_time',
						'c_failed_count',
						'd_time',
						'd_failed_count',
						'e_time',
						'e_failed_count',
						'f_time',
						'f_failed_count',
						'g_time',
						'g_failed_count',
						'h_time',
						'h_failed_count',
						'i_time',
						'i_failed_count',
						'j_time',
						'j_failed_count',
						'k_time',
						'k_failed_count',
						'l_time',
						'l_failed_count',
						'm_time',
						'm_failed_count',
						'n_time',
						'n_failed_count',
						'o_time',
						'o_failed_count',
						'p_time',
						'p_failed_count',
						'q_time',
						'q_failed_count',
						'r_time',
						'r_failed_count',
						's_time',
						's_failed_count',
						't_time',
						't_failed_count',
						'u_time',
						'u_failed_count',
						'v_time',
						'v_failed_count',
						'w_time',
						'w_failed_count',
						'x_time',
						'x_failed_count',
						'y_time',
						'y_failed_count',
						'z_time',
						'z_failed_count',
						];
							
	protected $hidden = [];

}
