<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Problem extends BaseModel {

	protected $table = 'problems';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['created_by',
						'updated_by',
						'created_at',
						'updated_at',
						'published',
						'is_special_judge',
						'special_judger',
						'title',
						'slug',
						'time_limit',
						'memory_limit',
						'case_time_limit',
						'difficulty_level',
						'description',
						'input',
						'output',
						'sample_input',
						'sample_output',
						'hint',
						'analysis',
						'source',
						'source_url',
						'author',
						'author_url',
						'accept_count',
						'submit_count',
						'submit_user_count',
						'solved_user_count'
						];
							
	protected $hidden = ['special_judger'];
	

}
