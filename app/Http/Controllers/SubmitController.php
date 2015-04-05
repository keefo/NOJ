<?php namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Problem;
use App\Models\Code;
use App\Models\Submit;
use Illuminate\Database\Eloquent\Model;
use Paginator;
use Session;
use Input;
use DB;

class SubmitController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$results = Code::firstOrFail();
		//dd($results->code());
		$submits = Submit::orderBy('submits.id', 'desc')->
		leftJoin('users','users.id','=','submits.user_id')->
		leftJoin('problems','problems.id','=','submits.problem_id')->
		select(array('submits.*','users.name as username','problems.title as problemtitle','problems.slug as problemslug'))->
		paginate(20);
		return view('submits.index', compact('submits'));
	}
	
	
	public function show()
	{
		/*
		$problem = Problem::whereSlug($slug)->firstOrFail();
		if(!$problem->published){
			return view('problems.notpublished');
		}
		return view('problems.show', compact('problem'));
		*/
	}
	
	
	public function post(){
		
	}
	
}

