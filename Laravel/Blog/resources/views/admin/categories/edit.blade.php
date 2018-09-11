@extends('layouts.admin')

@section('title', 'Edit Category')

@section('content')
	
	@section('header', 'Edit Category')
	
	<div class="row">
		
		<div class="col-xs-12">
			{!! Form::open(['method' => 'PATCH', 'action' => ['AdminCategoryController@update', $category->id]]) !!}
			
				<div class="form-group">
					
					{!! Form::label('name', 'Category Name') !!}
					{!! Form::text('name', $category->name, ['class' => 'form-control']) !!}

				</div>

				<div class="row">
					
					<div class="col-xs-6">
						{!! Form::submit('Edit Name', ['class' => 'btn btn-primary']) !!}
					</div>

			{!! Form::close() !!}

				{!! Form::open(['method'=>'DELETE', 'action' => ['AdminCategoryController@destroy', $category->id]]) !!}

					<div class="col-xs-6 pull-right">
							
						{!! Form::submit('Delete Category', ['class'=>'btn btn-danger pull-right']) !!}

					</div>

				{!! Form::close() !!}	

				</div>
		</div>
	</div>

@endsection