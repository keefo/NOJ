<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submit extends Model {

	protected $table = 'submits';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
						'created_at',
						'updated_at',
						'user_id',
						'problem_id',
						'time',
						'memory',
						'result',
						'language',
						'ip',
						'is_valid_solution',
						'code_length',
						'shared',
						'contest_id',
						];
							
	protected $hidden = [];
	

}
