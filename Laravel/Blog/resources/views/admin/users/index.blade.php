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
		        	<th>Profile Image</th>
		     	</tr>
		    </thead>
		    <tbody>
				@foreach($users as $user)
					<tr>
						<td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
						<td>{{$user->email}}</td>
						<td>{{$user->role->name}}</td>
						<td><img height="100px" src="{{$user->photos->file}}"></td>
					</tr>
				@endforeach	
			</tbody>
		</table>

	
@endsection
