<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class BaseModel extends Model {
	
	
	public function relativeCreatedDate(){
		if($this->created_at!=null){
			return Carbon::createFromTimeStamp(strtotime($this->created_at))->diffForHumans();
		}
	}

}
