<?php namespace App\Models\Admin;

use Illuminate\Support\Arr;
use App\Models\BaseModel;
use App\Models\User;
use App\Html\HtmlBuilder;
use Session;
use Auth;

/**
 * Class MenuItem
 */
class Admin extends BaseModel
{
	public static $instance;
	
	public $htmlBuilder;
	public $user;
	public $name;
	
	function __construct()
	{
		static::$instance = $this;

		$user = Auth::user();
		if($user==null || !$user->isAdmin()){
			header('Location: '.url('home'));
			exit;
		}
		
		$this->htmlBuilder = new HtmlBuilder();
		$this->user = $user;
		$this->name = $user->name;
	}
	
	public static function admin()
	{
		if (is_null(static::$instance))
		{
			app('\App\Models\Admin\Admin');
		}
		return static::$instance;
	}
	

}