<?php namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Model;

use App\Http\Controllers\AdminController;
use App\Models\Contest;
use Paginator;
use Session;
use DB;
use Auth;

class ContestsController extends AdminController {

    /*
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
       $title = "Contests";
       $list = Contest::getContestsWithPageSize(20);
	   return view('admin.contests.index', compact('title','list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate()
    {
        $title = "Create Contest";
		return view('admin.contests.create_edit', compact('title'));
    }

}
