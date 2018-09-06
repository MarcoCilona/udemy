@extends('layouts.app')

@section('title', 'Create Post')

@section('content')

	{!! Form::open(['method'=>'POST', 'action'=>'PostController@store', 'files'=>true]) !!}	

		<div class="form-group">
			{!! Form::file('file', null, ['class'=>'form-group']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('title', 'Post title:') !!}
			{!! Form::text('title', null, ['class'=>'form-group']) !!}
		</div>
	
		<div class="form-group">
			{!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}	
		</div>		

		{{csrf_field()}}
			
	{!! Form::close() !!}

	@if(count($errors) > 0)
	
		<div class="alert alert-danger">
			
			<ul>
				@foreach($errors->all() as $error)
					
					<li>{{$error}}</li>				
	
				@endforeach
			</ul>			

		</div>

	@endif


@endsection

@yield('footer')