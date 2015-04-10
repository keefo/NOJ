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
		if(Auth::user()==null){
			return redirect()->guest('auth/login');
		}
		$user_id = Auth::user()->id;
		//$submit = Submit::where('id', '=', $submit_id)->firstOrFail();
		$submit = Submit::with('code')->where('id', '=', $submit_id)->firstOrFail();
		if($submit->user_id!==$user_id){
			dd('not the author');
		}
		dd($submit);
		
		return view('problems.show', compact('problem'));
		
	}
	
	
	public function post(){
		
	}
	
}

