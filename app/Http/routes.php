<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');
Route::get('problems', 'ProblemController@index');
Route::get('help', 'HelpController@index');
Route::get('problems/{slug}', array('as' => 'problems.show', 'uses' => 'ProblemController@show'));
Route::get('submit', 'SubmitController@index');
Route::post('submit', 'SubmitController@post');
Route::get('code/{id}', array('as' => 'code.show', 'uses' => 'SubmitController@code'));

//Route::resource('problems', 'ProblemController');
//Route::resource('problems/{id}', 'ProblemController@show');

Route::get('login/{service}', array('uses' => 'LoginController@index'));
Route::get('loginerror/{message}', array('uses' => 'LoginController@error'));


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

/*
Route::get('admin', 'AdminController@index');
Route::get('admin/articles', 'AdminController@articles');
Route::get('admin/problems', 'AdminController@problems');
Route::get('admin/users', 'AdminController@users');
*/

Route::get('admin', 'Admin\DashboardController@index');

if (Request::is('admin/*'))
{
    require __DIR__.'/admin_routes.php';
}

