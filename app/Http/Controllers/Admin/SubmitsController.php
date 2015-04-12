<?php namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Model;

use App\Http\Controllers\AdminController;
use App\Models\Submit;
use Paginator;
use Session;
use DB;
use Auth;

class SubmitsController extends AdminController {

    /*
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
       $title = "Submits";
       $list = Submit::getSubmitsWithPageSize(20);
	   return view('admin.submits.index', compact('title','list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate()
    {
        $title = "Create Article";
		return view('admin.articles.create_edit', compact('title'));
    }

}
