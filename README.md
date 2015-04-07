## NUC Online Judge v3

This is the 3rd version of NUC Online Judge system. The new system build on [Laravel 5](http://laravel.com/).

## How to start?

1. Make sure you have PHP and http server installed on your machine.
2. Make sure you have [Composer](https://getcomposer.org/doc/00-intro.md) installed on your machine.
3. Fork this repository.
4. Clone the forked project into your local machine.
5. Under the folder, run ```composer install```
6. run ```php artisan vendor:publish```
7. Config .env.example file to .env file and edit it to map your local environment.
8. Start coding add new features.

## Some DevLogs

### 1. Modify Laravel AuthController to support email and username login

By default the Laravel auth module support only email authentication. To support email or username login, we need to modify the ```App\Http\Controllers\Auth\AuthController```

add to the header of the file:

	use Auth;
	use Input;


add this into the AuthController class:

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
		
	    if ($this->auth->attempt($request->only($field, 'password'), $request->has('remember')))
	    {
	        return redirect()->intended($this->redirectPath());
	    }
	
	    return redirect($this->loginPath())
	                ->withInput($request->only('inputid', 'remember'))
	                ->withErrors([
	                    'inputid' => 'This credential do not match our records.',
	                ]);
	}

replace the email input in ```resources\views\auth\login.blade.php``` with

	{!! Form::text('inputid', Input::old('inputid'), array('tabindex' => '1', 'class' => 'form-control')) !!}


### 2. Added GitHub login support

add to ```composer.json``` file:

	"laravel/socialite": "~2.0"

run

	composer update
	
add following lines to ```App\Http\routes.php``` file:

	Route::get('login/{service}', array('uses' => 'LoginController@index'));
	Route::get('loginerror/{message}', array('uses' => 'LoginController@error'));

add following lines ```config\services.php``` file:

	'github' => [
	    'client_id' => env('GITHUB_CLIENT_ID'),
	    'client_secret' => env('GITHUB_CLIENT_SECRET'),
	    'redirect' => env('GITHUB_CALLBACK_URL'),
	],
	
	'twitter' => [
	    'client_id' => env('TWITTER_CLIENT_ID'),
	    'client_secret' => env('TWITTER_CLIENT_SECRET'),
	    'redirect' => env('TWITTER_CALLBACK_URL'),
	],
	
	'google' => [
	    'client_id' => env('GOOGLE_CLIENT_ID'),
	    'client_secret' => env('GOOGLE_CLIENT_SECRET'),
	    'redirect' => env('GOOGLE_CALLBACK_URL'),
	],


remember to put all your app keys into .env file.

finally, create a controller ```App\Http\Controllers\LoginController.php``` and add corresponding login button into login view.


## Contributors

**Xu Lian** - a Mac and iOS developer, the founder of  [Beyondcow](https://www.beyondcow.com), follow him on Twitter or Github.

- <https://twitter.com/lianxu>
- <https://github.com/keefo>
- <http://lianxu.me>

## License

    CATweaker & CATweakerSense is published under MIT License

    Copyright (c) 2015 Xu Lian (@lianxu)

    Permission is hereby granted, free of charge, to any person obtaining a copy of
    this software and associated documentation files (the "Software"), to deal in
    the Software without restriction, including without limitation the rights to use,
    copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the
    Software, and to permit persons to whom the Software is furnished to do so,
    subject to the following conditions:

    The above copyright notice and this permission notice shall be included in all
    copies or substantial portions of the Software.

    THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
    IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
    FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
    COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
    IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
    CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

