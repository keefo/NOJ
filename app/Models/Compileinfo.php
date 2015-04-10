<?php namespace App\Models;

class Compileinfo extends BaseModel {

	protected $table = 'compileinfos';
	public $timestamps = false;
	private $compile = null;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
						'compile_info'
						];
							
	protected $hidden = [];

	public function compile()
	{
		if($this->compile==null){
			$this->compile = $this->attributes['compile_info'];
			$this->compile = gzuncompress(substr($this->compile_info, 4));
		}
		return $this->compile;
	}
	
}
