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

Route::get('/insert', function() {

	// Finding the user we want
	$user = App\User::find(1);

	// Create a new instance
	$role = new App\Role(['name'=>'admin']);

	// Saving the record on the db and connect it to the user we found
	$user->roles()->save($role);

});

Route::get('/read', function() {

	$user = App\User::find(1);

	foreach ($user->roles as $key => $value) {
		echo $value->name;
	}

});

Route::get('/update', function() {

	$user = App\User::findOrFail(1);

	if($user->has('roles')){

		foreach ($user->roles as $key => $value) {
			if($value->name === 'admin'){
				
				$value->name = "Admin";
				$value->save();
		
			}
		}

	}

});


/**
 * Attaching a role to a user.
 * IF YOU RUN IT MULTIPLE TIMES IT WILL ATTACH IT EVERY TIME
 */
Route::get('/attach', function() {

	$user = App\User::findOrFail(1);

	$user->roles()->attach(1);

});


/**
 * Detaching a role from a user
 */
Route::get('/detach', function() {

	$user = App\User::findOrFail(1);

	$user->roles()->detach();

});


/**
 * Sync function takes an array as parameter and if you do not insert the current saved roles for the user, it will delete those relations and insert only the ones in the array. 
 */
Route::get('/sync', function() {

	$user = App\User::findOrFail(1);

	$user->roles()->sync([1]);

});