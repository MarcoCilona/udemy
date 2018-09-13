@extends('layouts.admin')

@section('title', 'Comments')

@section('content')
		
	@section('header', 'All Comments')

	<table class="table">
	    <thead>
	      	<tr>
	        	<th>Id</th>
	        	<th>Author</th>
	        	<th>Post</th>
	        	<th>Body</th>
	        	<th>Status</th>
	     	</tr>
	    </thead>
	    <tbody>
	    	@foreach($comments as $comment)
			    <tr>
			        <td>{{$comment->id}}</td>
			        <td>{{$comment->authorName->name}}</td>
			        <td>{{$comment->post->title}}</td>
			        <td>{{$comment->body}}</td>
			        @if($comment->is_active == 0)
			        	<td>Inactive</td>
			        @else
			        	<td>Active</td>
			        @endif
			    </tr>
			@endforeach		    
		</tbody>
	</table>

@endsection


