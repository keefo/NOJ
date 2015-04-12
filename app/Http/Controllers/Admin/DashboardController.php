<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Models\Article;
use App\Models\User;
use App\Models\Problem;
use App\Models\Contest;
use App\Models\Submit;

class DashboardController extends AdminController {

    public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
        $title = "Dashboard";

        $users = User::count();
        $problems = Problem::count();
        $submits = Submit::count();
        $contests = Contest::count();
        $articles = Article::count();
        
		return view('admin.dashboard.index',  compact('title','users','problems','submits','contests','articles'));
	}
}