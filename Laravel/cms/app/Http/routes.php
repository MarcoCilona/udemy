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

Route::get('/', function () {
    return view('welcome');
});

/**
 * Every time we make a request to the url it will call the index method of the PostController.
 */
Route::get('/contact/{name?}', 'PostController@show_view');

/**
 * Using the resource function to get Laravel to build special routes for us.
 */
Route::resource('posts', 'PostController');