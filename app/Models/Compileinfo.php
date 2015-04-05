<?php namespace App\Models;

class Compileinfo extends BaseModel {

	protected $table = 'compileinfos';
	public $timestamps = false;
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
						'submit_id',
						'compile_info'
						];
							
	protected $hidden = [];


}
