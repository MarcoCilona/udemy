@extends('layouts.admin')

@section('title', 'Create post')

@section('content')
	
	@section('header', 'Create Post')

	<div class="row">
		
		{!! Form::open(['method'=>'POST', 'action' => 'AdminPostsController@store', 'files' => true]) !!}

			<div class="form-group">

				{!! Form::label('title', 'Post Title') !!}
				{!! Form::text('title', null, ['class' => 'form-control']) !!}

			</div>	

			<div class="form-group">
				
				{!! Form::label('content', 'Post Content') !!}
				{!! Form::textarea('content', null, ['class' => 'form-control']) !!}

			</div>	

			<div class="form-group">
				
				{!! Form::label('image', 'Post Image') !!}
				{!! Form::file('image', ['class' => 'form-control']) !!}

			</div>

			<div class="form-group">
								
				{!! Form::submit('Create Post', ['class' => 'btn btn-primary']) !!}

			</div>			

		{!! Form::close() !!}

	</div>
	
	@include('includes.submitError')

@endsection