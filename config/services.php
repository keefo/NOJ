<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Third Party Services
	|--------------------------------------------------------------------------
	|
	| This file is for storing the credentials for third party services such
	| as Stripe, Mailgun, Mandrill, and others. This file provides a sane
	| default location for this type of information, allowing packages
	| to have a conventional place to find your various credentials.
	|
	*/

	'mailgun' => [
		'domain' => '',
		'secret' => '',
	],

	'mandrill' => [
		'secret' => '',
	],

	'ses' => [
		'key' => '',
		'secret' => '',
		'region' => 'us-east-1',
	],

	'stripe' => [
		'model'  => 'App\Model\User',
		'secret' => '',
	],
	
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

];
