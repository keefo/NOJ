<?php namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Problem;
use Illuminate\Database\Eloquent\Model;

class ProblemController extends Controller {

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
		$problems = Problem::paginate(100);
		//dd($problems);
		return view('problems.index', compact('problems'));
	}
	
	
/*
	public function show(Problem $problem)
	{
		//dd($problem);
		if(!$problem->published){
			return view('problems.notpublished');
		}
		return view('problems.show', compact('problem'));
	}
*/

	/*
	public function show($id)
	{
		dd($id);
		$problem = Problem::find($id);
		if(!$problem->published){
			return view('problems.notpublished');
		}
		return view('problems.show', compact('problem'));

	}
	*/
	
	public function show($slug)
	{
		$problem = Problem::whereSlug($slug)->firstOrFail();
		if(!$problem->published){
			return view('problems.notpublished');
		}
		return view('problems.show', compact('problem'));
	}
	
	

}
