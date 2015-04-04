<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contestproblem extends Model {

	protected $table = 'contestproblems';
	public $timestamps = false;
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
						'contest_id',
						'problem_id',
						'order',
						'title',
						];
							
	protected $hidden = [];
	
}
