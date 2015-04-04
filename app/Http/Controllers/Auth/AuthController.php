<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

use Auth;
use Input;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;
	

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */

	public function postLogin(Request $request)
	{
	    $this->validate($request, [
	        'inputid' => 'required',
	        'password' => 'required',
	    ]);
		
		$field = filter_var($request->input('inputid'), FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
		$request->merge([$field => $request->input('inputid')]);
		//dd(Input::all());
		
	    if ($this->auth->attempt($request->only($field, 'password'), $request->has('remember')))
	    {
	        return redirect()->intended($this->redirectPath());
	    }
	
	    return redirect($this->loginPath())
	                ->withInput($request->only('name', 'remember'))
	                ->withErrors([
	                    'name' => 'These credentials do not match our records.',
	                ]);
	}


	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;
		$this->middleware('guest', ['except' => 'getLogout']);
	}

}
