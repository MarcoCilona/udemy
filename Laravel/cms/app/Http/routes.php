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

Route::get('/contact', function () {
	return "Hi from contact!";
});

Route::get('/about/{id}', function ($id) {
	return "Hi, this is the id you put: " . $id;
});

Route::get('/admin/about/example', array('as' =>'admin.home', function () {
	return "Trying naming routes! <br>The url is: " . route('admin.home');
}));