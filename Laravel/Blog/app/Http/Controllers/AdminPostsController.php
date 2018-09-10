<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Http\Requests;
use App\Http\Requests\PostRequest;

// Models
use Auth;
use App\Photo;
use App\Post;
use App\User;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    	$posts = Post::all();

        return view('admin.posts.index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    	$users = User::pluck('name', 'id')->all();
    	    	
        return view('admin.posts.create', compact('users'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        
        // Retrieving the logged user, the author of the post
    	$logged_user = Auth::user()->id;

    	// Creating the new post
        $post = Post::create([
        	'title' => $request->title,
        	'content' => $request->content,
        	'user_id' => $logged_user,
        ]);

        // Get the image passed by the form
        $image = $request->file('image');

        // Setting the image name to be saved
       	$name = time() . $image->getClientOriginalName();

       	// Moving the image to the images folder (in public folder)
       	$image->move('images', $name);

       	// Creating the new Photo instance
       	$photo = Photo::create(['file' => $name]);

       	// Saving the photo and relating it to the post
       	$post->photos()->save($photo);

       	// Setting a session message to be shown to inform the post has been created
       	Session::flash('post_message', 'Post Created');

       	return redirect(route('admin.posts.index'));
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
