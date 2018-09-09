@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')
	@section('header', 'Edit User')
	
	<div class="col-sm-3">
		
		<img class="img-responsive img-rounded"height="100px" src={{$user->photos->file}} />
		
	</div>

	<div class="col-sm-9">
		{!! Form::open(['method'=>'PATCH', 'action' => ['AdminUsersController@update', $user->id], 'files' => true]) !!}	
			
			<div class="form-group">
				{!! Form::label('name', 'Name') !!}
				{!! Form::text('name', $user->name, ['class' => 'form-control']) !!}	
			</div>
	
			<div class="form-group">
				{!! Form::label('email', 'Email') !!}
				{!! Form::email('email', $user->email, ['class' => 'form-control']) !!}
			</div>
	
			<div class="form-group">
				{!! Form::label('pw', 'Password') !!}
				{!! Form::password('password', ['class' => 'form-control']) !!}
			</div>
	
			<div class="form-group">
				{!! Form::label('role', 'Role') !!}
				{!! Form::select('role', $roles, $user->role_id, ['class' => 'form-control']) !!}
			</div>
	
			<div class="form-group">
				{!! Form::label('status', 'Status') !!}
				{!! Form::select('status', ['0' => 'Inactive', '1' => 'Active'], $user->is_active, ['class' => 'form-control']) !!}
			</div>
	
			<div class="form-group">
				{!! Form::label('img', 'File') !!}
				{!! Form::file('img', ['class' => 'form-control']) !!}
			</div>
	
			<div class="form-group">
				{!! Form::submit('Edit user', ['class' => 'btn btn-primary']) !!}
			</div>
			
		{!! Form::close() !!}
	</div>
	
	@include('includes.submitError')

@endsection