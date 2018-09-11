@extends('layouts.admin')

@section('title', 'Edit Post')

@section('content')
	
	@section('header', 'Edit User')

	<div class="row">
		<div class="col-xs-3">
			<img class="img-responsive img-rounded" src="{{$post->file}}"></img>
		</div>

		<div class="col-xs-9">
			{!! Form::model($post, ['method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id], 'files'=>true]) !!}
			
			<div class="form-group">
				{!! Form::label('title', 'Post title') !!}
				{!! Form::text('title', null, ['class' => 'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('content', 'Post content') !!}
				{!! Form::textarea('content', null, ['class' => 'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('category', 'Post category') !!}
				{!! Form::select('category',  $categories, null, ['class' => 'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('image', 'Post image') !!}
				{!! Form::file('image', ['class' => 'form-control']) !!}
			</div>

			<div class="row">
				
				<div class="col-xs-6">
					{!! Form::submit('Edit User', ['class' => 'btn btn-primary']) !!}	
				</div>
			{!! Form::close() !!}

			{!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id]]) !!}
				
				<div class="col-xs-6 pull-right">
					{!! Form::submit('Delete User', ['class'=>'btn btn-danger pull-right']) !!}							
				</div>
			
			{!! Form::close() !!}

			</div>
			
		</div>


	</div>

@endsection