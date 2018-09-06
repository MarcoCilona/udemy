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

use App\User;
use App\Post;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function () {

	// Finding the user
	$user = User::find(3);

	// Creating post instance
	$post = new Post(['title'=>'Testing one to many', 'body'=>'Testign eloquent one to many']);

	// Saving the new post on the db and relating it with the selected user
	$user->posts()->save($post);

});

Route::get('/read', function () {

	$user = User::findOrFail(3);

	foreach ($user->posts as $key => $post) {
	
		echo $post->title;

	}
	

});

Route::get('/update', function () {

	$user = User::find(3);

	$user->posts()->where('id', 1)->update(['title'=>'Updated title']);

});

Route::get('/delete', function () {

	$user = User::findOrFail(3);

	$user->posts()->where('id', 1)->delete();

});