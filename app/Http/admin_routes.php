<?php

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
	
    Route::pattern('id', '[0-9]+');
    Route::pattern('id2', '[0-9]+');

    #Admin Dashboard
    Route::get('dashboard', 'Admin\DashboardController@index');
    
    #problems
    Route::get('problems', 'Admin\ProblemsController@index');
    Route::get('problems/create', 'Admin\ProblemsController@getCreate');
    Route::post('problems/create', 'Admin\ProblemsController@postCreate');
    Route::get('problems/{id}/edit', 'Admin\ProblemsController@getEdit');
    Route::post('problems/{id}/edit', 'Admin\ProblemsController@postEdit');
    Route::get('problems/{id}/delete', 'Admin\ProblemsController@getDelete');
    Route::post('problems/{id}/delete', 'Admin\ProblemsController@postDelete');
    Route::get('problems/data', 'Admin\ProblemsController@data');
    Route::get('problems/reorder', 'Admin\ProblemsController@getReorder');

    #articles
    Route::get('articles', 'Admin\ArticlesController@index');
    Route::get('articles/create', 'Admin\ArticlesController@getCreate');
    Route::post('articles/create', 'Admin\ArticlesController@postCreate');
    Route::get('articles/{id}/edit', 'Admin\ArticlesController@getEdit');
    Route::post('articles/{id}/edit', 'Admin\ArticlesController@postEdit');
    Route::get('articles/{id}/delete', 'Admin\ArticlesController@getDelete');
    Route::post('articles/{id}/delete', 'Admin\ArticlesController@postDelete');
    Route::get('articles/data', 'Admin\ArticlesController@data');
    Route::get('articles/reorder', 'Admin\ArticlesController@getReorder');

    #Users
    Route::get('users/', 'Admin\UsersController@index');
    
    Route::get('users/{id}/toggle', 'Admin\UsersController@getToggle');
    
    Route::get('users/create', 'Admin\UsersController@getCreate');
    Route::post('users/create', 'Admin\UsersController@postCreate');
    Route::get('users/{id}/edit', 'Admin\UsersController@getEdit');
    Route::post('users/{id}/edit', 'Admin\UsersController@postEdit');
    Route::get('users/{id}/delete', 'Admin\UsersController@getDelete');
    Route::post('users/{id}/delete', 'Admin\UsersController@postDelete');
    Route::get('users/data', 'Admin\UsersController@data');

   #submit
    Route::get('submits/', 'Admin\SubmitsController@index');
    Route::get('submits/create', 'Admin\SubmitsController@getCreate');
    Route::post('submits/create', 'Admin\SubmitsController@postCreate');
    Route::get('submits/{id}/edit', 'Admin\SubmitsController@getEdit');
    Route::post('submits/{id}/edit', 'Admin\SubmitsController@postEdit');
    Route::get('submits/{id}/delete', 'Admin\SubmitsController@getDelete');
    Route::post('submits/{id}/delete', 'Admin\SubmitsController@postDelete');
    Route::get('submits/data', 'Admin\SubmitsController@data');

   #Contest
    Route::get('contests/', 'Admin\ContestsController@index');
    Route::get('contests/create', 'Admin\ContestsController@getCreate');
    Route::post('contests/create', 'Admin\ContestsController@postCreate');
    Route::get('contests/{id}/edit', 'Admin\ContestsController@getEdit');
    Route::post('contests/{id}/edit', 'Admin\ContestsController@postEdit');
    Route::get('contests/{id}/delete', 'Admin\ContestsController@getDelete');
    Route::post('contests/{id}/delete', 'Admin\ContestsController@postDelete');
    Route::get('contests/data', 'Admin\ContestsController@data');

});
