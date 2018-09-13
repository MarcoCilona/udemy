<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Category;
use App\Comment;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $posts = Post::all();
        $categories = Category::where('id', '!=', 1)->get();

        return view('index', compact('posts', 'categories'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $post = Post::findOrFail($id);
        $comments = $post->comments;

        $categories = Category::where('id', '!=', 1)->get();

        return view('post', compact('post', 'comments', 'categories'));

    }

}
