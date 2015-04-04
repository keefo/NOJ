<?php namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;

class HelpController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$article = Article::whereSlug('faq')->firstOrFail();
		if(!$article->published){
			return view('help.notpublished');
		}
		return view('help.index', ['article' => $article]);
	}

}
