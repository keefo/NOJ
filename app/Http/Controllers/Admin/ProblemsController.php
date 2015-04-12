<?php namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Model;

use App\Http\Controllers\AdminController;
use App\Models\Problem;
use Paginator;
use Session;
use DB;
use Auth;

class ProblemsController extends AdminController {

    /*
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
       $title = "Problems";
       $list = Problem::getProblemsWithPageSize(100);
	   return view('admin.problems.index', compact('title','list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate()
    {
        $title = "Create Problem";
		return view('admin.problems.create_edit', compact('title'));
    }

}
