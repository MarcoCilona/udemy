@extends('layouts.app')

@section('title', 'Edit post')

@section('content')

	{!! Form::model($post, ['method'=>'PATCH', 'action'=>['PostController@update', $post->id]]) !!}
		
		{{csrf_field()}}

		<div class="form-group">
			{!! Form::label('title', 'Post title:') !!}
			{!! Form::text('title', null, ['class'=>'form-group']) !!}
		</div>
	
		<div class="form-group">
			{!! Form::submit('Edit Post', ['class'=>'btn btn-primary']) !!}	
		</div>

	{!! Form::close() !!}
	
	<br />

	{!! Form::open(['method'=>'DELETE', 'action'=>['PostController@destroy', $post->id]]) !!}
	
		{{csrf_field()}}
		{!! Form::submit('Delete post', ['class'=>'btn btn-primary']) !!}
		
	{!! Form::close() !!}
		
@endsection

@yield('footer')