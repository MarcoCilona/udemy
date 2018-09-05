@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
	
	<form method="POST" action="/posts">
		{{csrf_field()}}
		<input placeholder="Enter title" type="text" name="title" >
		<input type="submit" name="submit">
	</form>


@endsection

@yield('footer')