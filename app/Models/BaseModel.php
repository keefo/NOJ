<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/*
use SleepingOwl\Admin\Exceptions\ValidationException;
use SleepingOwl\Html\FormBuilder;
use SleepingOwl\Admin\Validation\Validator;
use SleepingOwl\Models\SleepingOwlModel;
use SleepingOwl\Models\Interfaces\ModelWithOrderFieldInterface;
use SleepingOwl\Models\Traits\ModelWithOrderFieldTrait;
*/

class BaseModel extends Model {
	
	
	public function relativeCreatedDate(){
		if($this->created_at!=null){
			return Carbon::createFromTimeStamp(strtotime($this->created_at))->diffForHumans();
		}
	}

}
