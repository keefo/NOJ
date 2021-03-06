<?php namespace App\Models;

class Code extends BaseModel {

	protected $table = 'codes';
	public $timestamps = false;
	private $source = null;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
						'source_code',
						'oldid',
						];
							
	protected $hidden = [];
	
	
	public function code()
	{
		if($this->source==null){
			$this->source = $this->attributes['source_code'];
			$this->source = trim(gzuncompress(substr($this->source, 4)));
		}
		return $this->source;
	}
	
}
