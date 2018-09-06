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

use App\Staff;
use App\Photo;
use App\Product;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function() {

	$staff = Staff::find(1);

	$staff->photos()->create(['path'=>'example.jpg']);

});

Route::get('/read', function() {

	$staff = Staff::findOrFail(1);

	foreach ($staff->photos as $key => $value) {
		echo $value->path . '<br />';
	}

});

Route::get('/update', function() {

	$staff = Staff::findOrFail(1);

	$photo = $staff->photos()->where('id', 2)->first();

	$photo->path = "updated.jpg";

	$photo->save();

});