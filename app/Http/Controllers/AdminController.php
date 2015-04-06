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
use App\Models\Admin\Admin;
use App\Models\Admin\MenuItem;
use Paginator;
use Session;
use Input;
use DB;
use Auth;
use View;

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
	public $menu;
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
		
		Admin::admin();//this class will guard admin user.
				
		$this->menu=array();
		
		$this->menu[]=new MenuItem('Dashboard', url('admin/'), 'fa-dashboard');
		$this->menu[]=new MenuItem('User', url('admin/users'), 'fa-users');
		$this->menu[]=new MenuItem('Problem', url('admin/problems'), 'fa-book');
		$this->menu[]=new MenuItem('Article', url('admin/articles'), 'fa-newspaper-o');
		
		 View::share('menu', $this->menu);
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
