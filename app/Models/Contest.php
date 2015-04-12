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
						'slug',
						'description',
						'start_time',
						'end_time',
						'private',
						'password',
						'solution_report',
						'oldid'
						];
							
	protected $hidden = [];
	

	public static function getContestsWithPageSize($pagelen=20){
		$items = Contest::orderBy('id', 'desc')->
		select(array('*'))->
		paginate($pagelen);
		return $items;
	}
	
}
