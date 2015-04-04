<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

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
