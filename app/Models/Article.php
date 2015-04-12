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
						'introduction',
						'content',
						];
							
	protected $hidden = [];
	
	
	public static function getArticlesWithPageSize($pagelen=20){
		$items = Article::orderBy('articles.id', 'desc')->
		leftJoin('users','users.id','=','articles.created_by')->
		select(array('articles.*','users.username as authorSlug','users.screen_name as authorName'))->
		paginate($pagelen);
		return $items;
	}

}
