@extends('layouts.admin')

@section('title', 'Posts')

@section('content')

	@section('header', 'All posts')

	<p>{{session('post_message')}}</p>

	<table class="table">
	    <thead>
	      	<tr>
	        	<th>Id</th>
	        	<th>Title</th>
	        	<th>Content</th>
	        	<th>Image</th>
	        	<th>Author</th>
	        	<th>Category</th>
	     	</tr>
	    </thead>
	    <tbody>
	    	@foreach($posts as $post)
		      	<tr>
		        	<td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->id}}</a></td>
		        	<td>{{$post->title}}</td>
		        	<td>{{$post->content}}</td>
		        	<td><img class="img-responsive" src="{{$post->photos->file_path}}"></td>
		        	<td>{{$post->author->name}}</td>
		        	<td>{{$post->category->name}}</td>

		    	</tr>
		    @endforeach
		</tbody>
	</table>

@endsection