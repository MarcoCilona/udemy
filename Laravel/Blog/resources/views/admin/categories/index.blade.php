@extends('layouts.admin')

@section('title', 'Categories')

@section('content')
	
	@section('header', 'Categories')

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

@endsection