<?php namespace App\Models;
	
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends BaseModel implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	
/*
	protected $guarded = [
						'id', 
						'created_at', 
						'updated_at', 
						'verified', 
						'login_ip', 
						'login_count',
						'login_at',
						'recoveryhash',
						'register_at', 
						'register_ip', 
						'github_avatar_url', 
						'github_access_token', 
						'google_avatar_url', 
						'google_access_token',
						];
*/
						 
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 
							'email', 
							'password', 
							'passwordhash',
							'screen_name', 
							'created_at', 
							'updated_at', 
							'remember_token', 
							'emailprivate', 
							'screen_name', 
							'verified', 
							'submit', 
							'solved', 
							'gender', 
							'volume', 
							'lang', 
							'role', 
							'avatarfile', 
							'recoveryhash', 
							'login_at', 
							'login_count', 
							'login_ip', 
							'nick', 
							'nickcolor', 
							'register_at', 
							'register_ip', 
							'school', 
							'birthday', 
							'birthdayprivate', 
							'phone', 
							'address', 
							'country', 
							'state'	, 
							'city', 
							'postalcode', 
							'location', 
							'homepage', 
							'qq', 
							'qqprivate', 
							'weibo', 
							'twitter', 
							'msn', 
							'gmail', 
							'gmailprivate', 
							'github', 
							'bio', 
							'sign', 
							'newemail', 
							'newemailhash', 
							'github_avatar_url', 
							'github_access_token', 
							'google_avatar_url', 
							'google_access_token',
							'oldid',
							];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'passwordhash', 'remember_token'];
	
	public static function encrypthash($pure_string) {
		//xulianwhocreatenoj
		$USER_PASSWORD_SALT = env('USER_PASSWORD_SALT');
		$key = pack('H*', $USER_PASSWORD_SALT);
		$pure_string = trim($pure_string);
		$iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_CBC);
	    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
	    $encrypted_string = mcrypt_encrypt(MCRYPT_BLOWFISH, $key, utf8_encode($pure_string), MCRYPT_MODE_ECB, $iv);
	    return base64_encode($encrypted_string);
	}
	
	/**
	 * Returns decrypted original string
	 */
	public static function decrypthash($encrypted_string) {
		$USER_PASSWORD_SALT = env('USER_PASSWORD_SALT');
		$key = pack('H*', $USER_PASSWORD_SALT);
		$encrypted_string=base64_decode($encrypted_string);
	    $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_CBC);
	    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
	    $decrypted_string = mcrypt_decrypt(MCRYPT_BLOWFISH, $key, $encrypted_string, MCRYPT_MODE_ECB, $iv);
	    return trim($decrypted_string);
	}
	
	public function isTeamMember()
	{
		//role 0:member 1:acmteam 2:oldacmteam 4:contributor 8:admin
		return ($this->role*1 & 1)>0;
	}
	
	public function isOldTeamMember()
	{
		//role 0:member 1:acmteam 2:oldacmteam 4:contributor 8:admin
		return ($this->role*1 & 2)>0;
	}
	
	public function isContributor()
	{
		//role 0:member 1:acmteam 2:oldacmteam 4:contributor 8:admin
		return ($this->role*1 & 4)>0;
	}
	
	public function isAdmin()
	{
		//role 0:member 1:acmteam 2:oldacmteam 4:contributor 8:admin
		return ($this->role*1 & 8)>0;
	}


}


