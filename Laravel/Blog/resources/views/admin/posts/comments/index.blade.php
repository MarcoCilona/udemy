@extends('layouts.admin')

@section('title', 'Comments')

@section('content')
		
	@section('header', 'All Comments')

	<table class="table">
	    <thead>
	      	<tr>
	        	<th>Post</th>
	        	<th>Author</th>
	        	<th>Body</th>
	        	<th>Status</th>
	     	</tr>
	    </thead>
	    <tbody>
	    	@foreach($comments_groups as $key => $group)
			       	
			       	<td rowspan="{{count($group) + 1}}">{{App\Post::findOrFail($key)->title}}</td>
			        
			        @foreach($group as $comment)
				        <tr>
					        <td>{{$comment->authorName->name}}</td>
					        <td>{{$comment->body}}</td>
					        <td>{!! Form::open(['method'=>'PATCH', 'action'=>['AdminCommentsController@update', $comment->id]]) !!}
								
								<div class="form-group">
									{!! Form::submit($comment->status, ['class'=>'btn btn-primary']) !!}
								</div>
				        	{!! Form::close() !!}
							</td>
						</tr>
					@endforeach
			    
			    @endforeach		    
		</tbody>
	</table>

@endsection


