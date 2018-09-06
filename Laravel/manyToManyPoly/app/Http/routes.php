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

use App\Post;
use App\Video;
use App\Tag;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/insert', function () {

	$post = Post::create(['name'=>'New post']);

	$tag = Tag::find(1);

	$post->tags()->save($tag);

	
	$video = Video::create(['name'=>'New video']);

	$tag2 = Tag::find(2);

	$video->tags()->save($tag2);

});
