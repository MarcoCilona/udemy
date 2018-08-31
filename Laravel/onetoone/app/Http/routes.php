<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\User;
use App\Address;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function () {

	// Finding the user we want to relate to the address
	$user = User::findOrFail(3);

	// Creating a new Address instance
	$address = new Address(['name'=>'Test address Camilla']);

	// Saving the new address and relating it to the user we have found
	$user->address()->save($address);

});

Route::get('update', function () {

	// Finding the address with a setted user_id
	$address = Address::where('user_id', 1)->first();

	// Updating the name field
	$address->name = "Updated new address!";

	// Save the update on the db
	$address->save();

});

Route::get('/read', function () {

	// Returning the user
	$user = User::findOrFail(1);

	// Echoing his address
	echo $user->address->name;

	// Deleting the address record (not the user's one)
	$user->address()->delete();

});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
