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
use Online;

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
		parent::__construct();
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$totalGuests = Online::guests()->count();
		$onlineUsers = Online::registered()->get();
		$totalUsers = count($onlineUsers);
		
		$submits = Submit::getSubmitsWithPageSize(30);
		return view('home', compact('submits', 'onlineUsers', 'totalGuests', 'totalUsers'));
	}

}
