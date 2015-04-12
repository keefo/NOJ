<?php namespace App\Models;

use Auth;

class Submit extends BaseModel {

	protected $table = 'submits';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
						'created_at',
						'updated_at',
						'user_id',
						'problem_id',
						'code_id',
						'contest_id',
						'time',
						'memory',
						'result',
						'language',
						'ip',
						'is_valid_solution',
						'code_length',
						'shared',
						];
							
	protected $hidden = [];
	

	public function language($codelink=true){
		//gcc -O2 -std=gnu99 -fno-asm -lm -Wall -w -static -DONLINE_JUDGE
		//g++ -O2 -std=gnu++0x -fno-asm -lm -Wall -w -static -DONLINE_JUDGE
		$lang = $this->language*1;
		$user = Auth::user();

		if($codelink && $user!=null && ($user->id==$this->user_id || $user->isAdmin())){
			$link = url('/code/'.$this->id);
			if($lang===0){
				return '<a href="'.$link.'" class="codelink" title="gcc C99">C</a>';
			}else if($lang===1){
				return '<a href="'.$link.'" class="codelink" title="g++ C++11">C++</a>';
			}else if($lang===2){
				return '<a href="'.$link.'" class="codelink">Pascal</a>';
			}			
		}else{
			if($lang===0){
				return '<span title="gcc C99">C</span>';
			}else if($lang===1){
				return '<span title="g++ C++11">C++</span>';
			}else if($lang===2){
				return '<span>Pascal</span>';
			}
		}
		return '';
	}
	
	public function time(){
		return $this->time.'ms';
	}
	
	public function memory(){
		return $this->memory.'K';
	}
	
	public function code(){
		$code = $this->hasOne('App\Models\Code', 'id')->first();
		return $code->code();
	}
	
	public function user(){
		$user = $this->hasOne('App\Models\User', 'id')->first();
		return $user;
	}

	public function resultStatus(){
		static $ra = [
	    	0 => '<span class="S_AC" title="Accepted">Accepted</span>',
			1 => '<span class="S_PE" title="Presentation Error">Presentation Error</span>',
			2 => '<span class="S_TL" title="Time Limit Exceed">Time Limit Exceed</span>',
			3 => '<span class="S_ML" title="Memory Limit Exceed">Memory Limit Exceed</span>',
			4 => '<span class="S_WA" title="Wrong Answer">Wrong Answer</span>',
			5 => '<span class="S_RE" title="Runtime Error">Runtime Error</span>',
			6 => '<span class="S_OL" title="Output Limit Exceed">tried</span>',
			7 => '<span class="S_CE" title="Compile Error">Compile Error</span>',
			8 => '<span class="S_SE" title="System Error">System Error</span>',
			9 => '<span class="S_VE" title="Validate Error">Validate Error</span>',
			10 => '<span class="S_WT" title="Waiting">Waiting</span>',
			11 => '<span class="S_WT" title="Rejudging">Rejudging</span>',
			12 => '<span class="S_WT" title="Judging">Judging</span>',
			13 => '<span class="S_WT" title="Compiling">Compiling</span>',
			14 => '<span class="S_RF" title="Restricted Function">Restricted Function</span>',
			15 => '<span class="S_AT" title="Runtime Error">Runtime Error</span>',
		];
		$result=$this->result*1;
		$r=$ra[$result];
		if($result===RS_CE || $result===RS_RF){
			if($this->id!==null && $this->id!==''){
				$r='<a href="/submit/compileinfo/?sid='.$this->id.'" target="_blank">'.$r.'</a>';
			}
		}
		return $r;
	}
	
	public function resultVerb(){
		static $ra = [
	    	0 => '<span class="S_AC">solved</span>',
			1 => '<span class="S_PE" title="Presentation Error">Presentation Error</span>',
			2 => '<span class="S_TL" title="Time Limit Exceed">fail to solve</span>',
			3 => '<span class="S_ML" title="Memory Limit Exceed">fail to solve</span>',
			4 => '<span class="S_WA" title="Wrong Answer">fail to solve</span>',
			5 => '<span class="S_RE" title="Runtime Error">fail to solve</span>',
			6 => '<span class="S_OL" title="Output Limit Exceed">fail to solve</span>',
			7 => '<span class="S_CE" title="Compile Error">fail to solve</span>',
			8 => '<span class="S_SE" title="System Error">fail to solve</span>',
			9 => '<span class="S_VE" title="Validate Error">fail to solve</span>',
			10 => '<span class="S_WT" title="Waiting">submit</span>',
			11 => '<span class="S_WT" title="Rejudging">submit</span>',
			12 => '<span class="S_WT" title="Judging">submit</span>',
			13 => '<span class="S_WT" title="Compiling">submit</span>',
			14 => '<span class="S_RF" title="Restricted Function">fail to solve</span>',
			15 => '<span class="S_AT" title="Runtime Error">fail to solve</span>',
		];
		
		$result=$this->result*1;
		$r=$ra[$result];
		return $r;
	}
	
	public function feedIcon(){
		static $ra = [
	    	0 => '<span class="S_AC">solve</span>',
			1 => '<span class="S_PE">Presentation Error</span>',
			2 => '<span class="S_TL">Time Limit Exceed</span>',
			3 => '<span class="S_ML">Memory Limit Exceed</span>',
			4 => '<span class="S_WA">Wrong Answer</span>',
			5 => '<span class="S_RE">Runtime Error</span>',
			6 => '<span class="S_OL">Output Limit Exceed</span>',
			7 => '<span class="S_CE">Compile Error</span>',
			8 => '<span class="S_SE">System Error</span>',
			9 => '<span class="S_VE">Validate Error</span>',
			10 => '<span class="S_WT">Waiting</span>',
			11 => '<span class="S_WT">Rejudging</span>',
			12 => '<span class="S_WT">Judging</span>',
			13 => '<span class="S_WT">Compiling</span>',
			14 => '<span class="S_RF">Restricted Function</span>',
			15 => '<span class="S_AT">Runtime Error</span>',
		];
		
		$result=$this->result*1;
		
		if($result==0) return '<span class="glyphicon glyphicon-ok"></span>';
		//if($result==2) return '<span class="glyphicon glyphicon-hourglass"></span>';
		if($result==10) return '<span class="glyphicon glyphicon-hourglass"></span>';
	/*
		if($result==2) return "cpulimit";
		if($result==3) return "memlimit";
		if($result==4) return "wronganswer";
		if($result==5) return "runtimeerror";
		if($result==5) return "runtimeerror";
	*/
	
		return '<span class="glyphicon glyphicon-remove"></span>';
	}
	
	public function feedContent(){
		return '<a href="'.url('/user').'">'.$this->username.'</a> '.$this->resultVerb().' the problem <a href="'.url('/problems', $this->problemslug).'">'.$this->problemtitle.'</a> <span class="date">'.$this->relativeCreatedDate().'</span>';
	}
	
	public static function getSubmitsWithPageSize($pagelen=20){
		$submits = Submit::orderBy('submits.id', 'desc')->
		leftJoin('users','users.id','=','submits.user_id')->
		leftJoin('problems','problems.id','=','submits.problem_id')->
		select(array('submits.*','users.username','users.screen_name','problems.title as problemtitle','problems.slug as problemslug'))->
		paginate($pagelen);
		return $submits;
	}
	
}
