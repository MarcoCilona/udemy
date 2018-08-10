<?php
	use App\Post;
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

Route::get('/insert', function (){

	DB::insert('INSERT INTO posts (title, content) VALUES(?, ?)', ['PHP Laravel', 'Laravel is the best thing that has appened to PHP']);

});

Route::get('/read', function () {

	$query_result = DB::select('SELECT * FROM posts ');

	foreach ($query_result as $key => $value) {
		echo $key . ": " . $value->title . ", " . $value->content . "<br />";
	}

});

Route::get('/update', function (){

	DB::update('UPDATE posts SET title = ? WHERE id = ?', ['New title', 1]);

});

Route::get('/delete', function () {

	DB::delete('DELETE FROM posts WHERE id = ?', [1]);

});

/**
 * Some different ways to retrieve data with Eloquent
 */

Route::get('/find', function(){

	// here i refer to the namespace
	$posts = Post::all()->toJson();

	foreach (json_decode($posts) as $key => $value) {
		echo $value->title . "<br />";
	}
		
});

Route::get('/findwhere', function() {

	$post = Post::orderBy('id', 'descending')->get();
	return $post;

});

/**
 * Ways to insert data using Eloquent
 */
Route::get('/basicInsert', function () {

	// create new Post instance
	$post = new Post;

	// setting values
	$post->title = "New post using ORM";
	$post->content = "Eloquen is very cool!";

	// save method will insert and update the record if needed
	$post->save();
	
});

/**
 * Updating an existing record using save method
 */
Route::get('/updateEl', function (){

	$post = Post::find(1);

	$post->title = 'Updated post';

	$post->save();

});

/**
 * Inserting using create method
 */
Route::get('/create', function (){

	Post::create(['title' => 'Create Method', 'content' => 'Create Content']);

});

/**
 * Updating using another method
 */
Route::get('/update2', function (){

	Post::where('id', 2)->where('is_admin', 0)->update(['title' => 'New Title']);

});

/**
 * Deleting records
 */

Route::get('/deleteEl', function () {

	$post = Post::find(4);

	$post->delete();

});

/**
 * Deleting records using different method that allows you to delete multiple records
 */
Route::get('/deleteEl2', function () {

	Post::destroy([5,6]);

});

/**
 * Deleting / trashing. It puts the records in a trash space from where you can delete it permanently.
 *
 * Next, function to retrieve trashed records
 */
Route::get('/trashing', function () {

	Post::find(6)->delete();

});

Route::get('/restore', function () {

	// retrieve the trashed record and restore it
	Post::withTrashed()->where('id', 1)->restore();	


});

/**
 * Permanently deleting a trashed record.
 */
Route::get('permDelete', function () {

	Post::withTrashed()->where('id', 6)->forceDelete();

});

