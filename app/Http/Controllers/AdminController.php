<?php namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;

use App\Models\Article;
use App\Models\Code;
use App\Models\Compileinfo;
use App\Models\Contest;
use App\Models\Contestattend;
use App\Models\Contestproblem;
use App\Models\Problem;
use App\Models\Submit;
use App\Models\User;
use Paginator;
use Session;
use Input;
use DB;
use Auth;

class AdminController extends Controller {

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
		if(!Auth::user()->isAdmin()){
			header('Location: '.url('home'));
			exit;
		}
	}
	
	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.index');
	}

}
