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
use DB;
use Auth;
use View;
use Socialize;
use Request;
use Carbon\Carbon;

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
		if($service!=='github' && $service!=='google'){
			return new RedirectResponse(url('/'));
		}
		
		$provider = Socialize::with($service);
	    if (Input::has('code'))
	    {
	        $userData = $provider->user();
	        //dd($userData->user['url']);
	        /*
		        User {▼
  +token: "511a6fdd62e521fa5d1114a16742be30a9adadca"
  +id: 809588
  +nickname: "keefo"
  +name: "Xu Lian"
  +email: "lianxu@me.com"
  +avatar: "https://avatars.githubusercontent.com/u/809588?v=3"
  +"user": array:30 [▼
    "login" => "keefo"
    "id" => 809588
    "avatar_url" => "https://avatars.githubusercontent.com/u/809588?v=3"
    "gravatar_id" => ""
    "url" => "https://api.github.com/users/keefo"
    "html_url" => "https://github.com/keefo"
    "followers_url" => "https://api.github.com/users/keefo/followers"
    "following_url" => "https://api.github.com/users/keefo/following{/other_user}"
    "gists_url" => "https://api.github.com/users/keefo/gists{/gist_id}"
    "starred_url" => "https://api.github.com/users/keefo/starred{/owner}{/repo}"
    "subscriptions_url" => "https://api.github.com/users/keefo/subscriptions"
    "organizations_url" => "https://api.github.com/users/keefo/orgs"
    "repos_url" => "https://api.github.com/users/keefo/repos"
    "events_url" => "https://api.github.com/users/keefo/events{/privacy}"
    "received_events_url" => "https://api.github.com/users/keefo/received_events"
    "type" => "User"
    "site_admin" => false
    "name" => "Xu Lian"
    "company" => "http://www.beyondcow.com/"
    "blog" => "http://www.lianxu.me/"
    "location" => "Vancouver"
    "email" => "lianxu@me.com"
    "hireable" => true
    "bio" => null
    "public_repos" => 65
    "public_gists" => 20
    "followers" => 204
    "following" => 37
    "created_at" => "2011-05-25T10:33:31Z"
    "updated_at" => "2015-04-07T05:07:39Z"
  ]
}
		        */
	        
			$ojuser = DB::table('users')
                    ->where('name', '=', $userData->nickname)
                    ->orWhere('email', $userData->email)
                    ->first();
            
            if($ojuser==null){
	            
	           	$date = Carbon::now();
	           	$ip = Request::ip();
	           	$pwd = $userData->token;
	           	
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
	
}
