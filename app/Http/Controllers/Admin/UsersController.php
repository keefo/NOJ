<?php namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Model;

use App\Http\Controllers\AdminController;
use App\Models\User;
use Paginator;
use Session;
use DB;
use Auth;
use Response;

class UsersController extends AdminController {

    /*
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
       $title = "Users";
       $list = User::getUsersWithPageSize(20);
	   return view('admin.users.index', compact('title','list'));
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
    
	public function getToggle($id=null)
	{
		if (is_null($id)) 
		{
			return Response::json('-1', 404);
		} 
		else{
    		$user = User::find($id);
			if(is_null($user)){
    		    return Response::json('-1', 404);
			} else {
            	$user->disabled = !$user->disabled;
            	$user->save();
            	if($user->disabled){
    			    return Response::json('disabled');
            	}
            	else if($user->verified){
    			    return Response::json('verified');
            	}
            	else{
    			    return Response::json('unverified');
            	}
			}
		}
	}
	
    
    /**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getEdit($id=null)
	{
		if (is_null($id)) 
		{
			return Response::json('User id is required', 404);
		} 
		else{
    		$user = User::find($id);
			if(is_null($user)){
			    return Response::json('User not found', 404);
			} else {
                return Response::json($user);
			}
		}
	}
	
	
	public function postEdit()
	{
        return Response::json('unimplemented', 500);
	}

}
