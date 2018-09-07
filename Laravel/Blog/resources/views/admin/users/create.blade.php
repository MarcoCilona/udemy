@extends('layouts.admin')

@section('title', 'Create User')

@section('content')
	@section('header', 'Create New User')

	{!! Form::open(['method'=>'POST', 'action' => 'AdminUsersController@store', 'files' => true]) !!}	
		
		<div class="form-group">
			{!! Form::label('name', 'Name') !!}
			{!! Form::text('name', null, ['class' => 'form-control']) !!}	
		</div>

		<div class="form-group">
			{!! Form::label('email', 'Email') !!}
			{!! Form::email('email', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('pw', 'Password') !!}
			{!! Form::password('password', ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('role', 'Role') !!}
			{!! Form::select('role', $roles, 2, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('status', 'Status') !!}
			{!! Form::select('status', ['0' => 'Inactive', '1' => 'Active'], 0, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('img', 'File') !!}
			{!! Form::file('img', ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Create user', ['class' => 'btn btn-primary']) !!}
		</div>
		
	{!! Form::close() !!}

	@include('includes.submitError')

@endsection