@extends('layouts.admin')

@section('title', 'Media page')

@section('content')
	
	@section('header', 'Media page')
	
	<div class="row">
		<div class="col-xs-12">
			<table class="table">
			    <thead>
			      	<tr>
			        	<th>Id</th>
			        	<th>Name</th>
			        	<th></th>
			        	<th>Table</th>
			        	<th>Delete</th>
			     	</tr>
			    </thead>

			    <tbody>
				@foreach($photos as $photo)
				    <tr>
				        <td>{{$photo->id}}</td>
				        <td>{{$photo->file}}</td>
				        <td><img class="img-responsive" src="{{$photo->file_path}}"></td>
				        <td>{{$photo->imageable_type}}</td>
				        <td>
				        	{!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediaController@destroy', $photo->id]]) !!}
								
								{!! Form::submit('Delete photo', ['class'=>'btn btn-danger']) !!}
								
				        	{!! Form::close() !!}
				        </td>
				    </tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection