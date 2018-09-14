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

Route::get('/', ['as'=>'homePage', 'uses'=>'PostController@index']);

Route::auth();

Route::group(['middleware' => ['auth', 'admin']], function() {
	
	/**
	 * Admin route.
	 */
	Route::get('/admin', function () {
		return view('admin.index');
	});	

	/**
	 * Admin Users Route.
	 */
	Route::resource('admin/users', 'AdminUsersController');
	
	/*
	 * Admin Post routes.
	 */
	Route::resource('admin/posts', 'AdminPostsController', ['except' => ['edit']]);

	/**
	 * Setting middleware only for the edit posts requests.
	 */
	Route::group(['middleware' => 'edit_post'], function () {

		Route::resource('admin/posts', 'AdminPostsController', ['only' => ['edit']]);

	});

	Route::resource('admin/categories', 'AdminCategoryController');

	Route::resource('admin/media', 'AdminMediaController');

	Route::resource('admin/comments', 'AdminCommentsController');

	Route::resource('admin/comments/replies', 'AdminCommentRepliesController');

});

Route::resource('/post', 'PostController', ['only'=>['show']]);
