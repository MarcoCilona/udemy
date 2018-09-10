@extends('layouts.admin')

@section('title', 'Posts')

@section('content')

	@section('header', 'All posts')

	<p>{{session('message')}}</p>

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
		        	<td>{{$post->id}}</td>
		        	<td>{{$post->title}}</td>
		        	<td>{{$post->content}}</td>
		        	<td><img class="img-responsive" src="{{$post->photos->file}}"></td>
		        	<td>{{$post->author->name}}</td>

		    	</tr>
		    @endforeach
		</tbody>
	</table>

@endsection