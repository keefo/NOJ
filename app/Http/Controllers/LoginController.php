<?php namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Query\Builder as QueryBuilder;
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
use Auth;
use View;
use Socialize;
use Request;
use Carbon\Carbon;
use Redirect;

class LoginController extends Controller {


	public function __construct()
	{

	}
	
	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index($service='')
	{
		if($service!=='github' && 
		$service!=='google' && 
		$service!=='twitter'){
			return new RedirectResponse(url('/'));
		}
		
		$provider = Socialize::with($service);
	    if (Input::has('code') || Input::has('oauth_token'))
	    {
		   	
	        $userData = $provider->user();

            $ojuser = User::where('name', $userData->nickname)->orWhere('email', $userData->email)->first();
		
            if($ojuser==null){
	            
	           	$date = Carbon::now();
	           	$ip = Request::ip();
	           	$pwd = $userData->token;
	           	
	           	if($userData->email==null){
		           	/*
			           	TODO: handle no email oauth more user friendly.
		           	*/
		           	return new RedirectResponse(url('loginerror','OAuth require email address to login'));
	           	}
	           	
	            $ojuser = User::create([
			        'created_by'		   => 1,
			        'updated_by'		   => 1,
			        'created_at'		   => $date,
			        'updated_at'		   => $date,
			        'remember_token'       => '',
			        'password'    	       => bcrypt($pwd),
					'passwordhash'         => User::encrypthash($pwd),
		        	'email'    	           => $userData->email,
					'emailprivate'    	   => false,
			        'name'   	           => $userData->nickname,
			        'screen_name'   	   => $userData->name,
					'verified'    	       => true,
			        'submit'    	       => 0,
					'solved'    	       => 0,
					'gender'    	       => 0,
			        'volume'    	       => 1,
					'lang'    	           => 1,
					'role'    	           => 0,
					'avatarfile'           => '',
					'recoveryhash'    	   => '',
			        'login_at'    	       => $date,
					'login_count'    	   => 1,
					'login_ip'    	       => $ip,
					'nick'    	           => '',
					'nickcolor'    	       => '',
					'register_at'    	   => $date,
					'register_ip'    	   => $ip,
					'school'    	       => '',
					'birthday'    	       => '',
					'birthdayprivate'      => false,
					'phone'    	           => '',
					'address'    	       => '',
					'country'    	       => '',
					'state'      	       => '',
					'city'      	       => '',
					'postalcode'      	   => '',
					'location'      	   => '',
					'homepage'    	       => isset($userData->user['blog'])?$userData->user['blog']:'',
					'qq'    	           => '',
					'qqprivate'    	       => false,
					'weibo'    	           => '',
					'twitter'    	       => '',
					'msn'    	           => '',
					'gmail'    	           => '',
					'gmailprivate'    	   => false,
					'github'    	       => isset($userData->user['url'])?$userData->user['url']:'',
					'bio'    	           => '',
					'sign'    	           => '',
					'newemail'    	       => 0,
					'newemailhash'    	   => '',
			    ]);
	            
            }
            

	        if($service=='github'){
	        	$ojuser->github_avatar_url = $userData->avatar;
	        	$ojuser->github_access_token = $userData->token;
	        }
	        else{
	        	$ojuser->google_avatar_url = $userData->avatar;
	        	$ojuser->google_access_token = $userData->token;
	        }
	        
			$ojuser->save();
			
	        Auth::login($ojuser, $remember = true);
	        
	        if (Auth::check())
			{
				return new RedirectResponse(url('/home'));
			}
			
	    	return new RedirectResponse(url('auth/login'));
		} 
	    else 
	    {
	        return $provider->redirect();
	    }
	}
	
	public function error($message='')
	{
		return view('message', compact('message'));
	}
		
	
}
