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


class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$submits = Submit::orderBy('submits.id', 'desc')->
		leftJoin('users','users.id','=','submits.user_id')->
		leftJoin('problems','problems.id','=','submits.problem_id')->
		select(array('submits.*','users.name as username','problems.title as problemtitle'))->
		paginate(30);
		return view('home', compact('submits'));
	}

}
