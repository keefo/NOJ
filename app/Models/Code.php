<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Code extends Model {

	protected $table = 'codes';
	public $timestamps = false;
	private $source = null;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
						'submit_id',
						'source_code'
						];
							
	protected $hidden = [];
	
	
	public function code()
	{
		if($this->source==null){
			$this->source = $this->attributes['source_code'];
			$this->source = gzuncompress(substr($this->source, 4));
		}
		return $this->source;
	}
}
