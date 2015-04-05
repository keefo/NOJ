<?php namespace App\Models;

class Contestproblem extends BaseModel {

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
