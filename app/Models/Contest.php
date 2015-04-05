<?php namespace App\Models;

class Contest extends BaseModel {

	protected $table = 'contests';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
						'created_at',
						'updated_at',
						'create_by',
						'updated_by',
						'published',
						'title',
						'description',
						'start_time',
						'end_length',
						'private',
						'password',
						'solution_report'
						];
							
	protected $hidden = [];
	

}
