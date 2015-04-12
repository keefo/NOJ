<?php namespace App\Http\Controllers;

use App\Models\Admin\MenuItem;
use View;

class AdminController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
        
        $menu=array();
		$menu[]=new MenuItem('Dashboard', ('/admin/dashboard'), 'fa-dashboard');
		$menu[]=new MenuItem('Users', ('/admin/users'), 'fa-users');
		$menu[]=new MenuItem('Problems', ('/admin/problems'), 'fa-book');
		$menu[]=new MenuItem('Contests', ('/admin/contests'), 'fa-trophy');
		$menu[]=new MenuItem('Articles', ('/admin/articles'), 'fa-newspaper-o');
		$menu[]=new MenuItem('Submits', ('/admin/submits'), 'fa-list');
		
		View::share('menu', $menu);
    	View::share('tableclass', 'table table-striped table-hover table-condensed');
    }

}
