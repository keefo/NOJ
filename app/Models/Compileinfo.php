<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compileinfo extends Model {

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
