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
use Auth;

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
		parent::__construct();
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
		$submits = Submit::getSubmitsWithPageSize(20);
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
	

	
	public function code($submit_id)
	{
		$user = Auth::user();
		if($user==null){
			return redirect()->guest('auth/login');
		}
		
		$submit = Submit::select('submits.*', 'users.name', 'users.screen_name', 'problems.title', 'problems.slug', DB::raw('UNCOMPRESS(codes.source_code) as code'))->
				leftjoin('codes', 'codes.id', '=', 'submits.code_id')->
				leftjoin('problems', 'problems.id', '=', 'submits.problem_id')->
				leftjoin('users', 'users.id', '=', 'submits.user_id')->
				where('submits.id', $submit_id)->firstOrFail();
		
		if($submit->user_id!==$user->id && !$user->isAdmin()){
			return redirect()->guest('auth/login');
		}
		
		return view('submits.show', compact('submit'));
	}
	
	
	public function post(){
		
	}
	
}

