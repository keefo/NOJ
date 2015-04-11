<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->timestamps();
			$table->rememberToken();
			$table->string('password', 60);
			$table->string('passwordhash', 60);
			
			$table->boolean('disabled')->default(false);
			$table->string('email', 255)->unique();
			$table->boolean('emailprivate')->default(true);
			$table->string('name', 45)->unique();
			$table->string('screen_name', 45);
			$table->boolean('verified')->default(false);;
			$table->bigInteger('submit')->unsigned();
			$table->bigInteger('solved')->unsigned();
			$table->tinyInteger('gender');
			$table->tinyInteger('volume');
			$table->tinyInteger('lang');
			$table->tinyInteger('role');
			$table->string('avatarfile', 64);
			$table->string('recoveryhash', 20);
			$table->dateTime('login_at');
			$table->bigInteger('login_count');
			$table->string('login_ip', 20);
			$table->string('nick', 64);
			$table->string('nickcolor', 8);
			$table->dateTime('register_at');
			$table->string('register_ip', 20);
			$table->string('school', 80);
			$table->date('birthday');
			$table->boolean('birthdayprivate')->default(true);
			$table->string('phone', 20);
			$table->integer('country')->unsigned();
			$table->string('state', 20);
			$table->string('city', 64);
			$table->string('address', 64);
			$table->string('postalcode', 64);
			$table->string('location', 64);
			$table->string('homepage', 128);
			$table->string('qq', 45);
			$table->boolean('qqprivate')->default(false);
			$table->string('weibo', 45);
			$table->string('twitter', 45);
			$table->string('msn', 45);
			$table->string('gmail', 255);
			$table->boolean('gmailprivate')->default(true);
			$table->string('github', 45);
			$table->string('bio', 255);
			$table->string('sign', 512);
			$table->string('newemail', 32);
			$table->string('newemailhash', 32);
			$table->string('github_avatar_url', 255);
			$table->string('github_access_token', 128);
			$table->string('google_avatar_url', 255);
			$table->string('google_access_token', 128);
			$table->string('twitter_avatar_url', 255);
			$table->string('twitter_access_token', 128);
			
		
			$table->index('email');
			$table->index('name');
			$table->index('screen_name');
			$table->index('gmail');
			$table->index('qq');
			$table->index('github_access_token');
			$table->index('google_access_token');
			$table->index('twitter_access_token');
		
		
            $table->bigInteger('oldid')->unsigned();
			$table->index('oldid');
	
			
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
