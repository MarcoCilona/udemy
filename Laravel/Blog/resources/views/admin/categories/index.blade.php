@extends('layouts.admin')

@section('title', 'Categories')

@section('content')
	
	@section('header', 'Categories')

	<div class="row">
		
		<div class="col-xs-6">
					
			{!! Form::open(['method'=>'POST', 'action'=>'AdminCategoryController@store']) !!}
				
				<div class="form-group">
					
					{!! Form::label('name', 'Create new category') !!}
					{!! Form::text('name', null, ['class'=>'form-control']) !!}

				</div>

				{!! Form::submit('Create category', ['class'=>'btn btn-primary']) !!}

			{!! Form::close() !!}
		
		</div>

		<div class="col-xs-6">
			<table class="table">
			    <thead>
			      	<tr>
			        	<th>Id</th>
			        	<th>Name</th>
			        </tr>
			    </thead>
			    <tbody>
			    	@foreach($categories as $category)
					    <tr>
					    	@if($category->id == 1)
					    		<td>{{$category->id}}</td>
					    	@else
					        	<td><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->id}}</a></td>
					        @endif
					        <td>{{$category->name}}</td>
					    </tr>
				    @endforeach
				</tbody>
			</table>
		</div>	
	</div>

@endsection