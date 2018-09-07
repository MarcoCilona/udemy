@extends('layouts.admin')

@section('title', 'User List')

@section('content')

	@section('header', 'Users')
	
		<table class="table">
		    <thead>
		      	<tr>
		        	<th>Name</th>
		        	<th>Email</th>
		        	<th>Role</th>
		     	</tr>
		    </thead>
		    <tbody>
				@foreach($users as $user)
					<tr>
						<td>{{$user->name}}</td>
						<td>{{$user->email}}</td>
						<td>{{$user->role->name}}</td>
					</tr>
				@endforeach	
			</tbody>
		</table>
	
@endsection
