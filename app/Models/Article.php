<?php namespace App\Models;

class Article extends BaseModel {

	protected $table = 'articles';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
						'created_at',
						'created_by',
						'updated_at',
						'updated_by',
						'category',
						'published',
						'title',
						'slug',
						'content',
						];
							
	protected $hidden = [];


}
