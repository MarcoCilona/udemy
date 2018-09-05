@extends('layouts.app')

@section('title', 'Edit post')

@section('content')

	<form method="POST" action="{{route('posts.update', $post->id)}}">
		{{csrf_field()}}
		<input type="hidden" name="_method" value="PUT">
		<input placeholder="Enter title" type="text" name="title"  value="{{$post->title}}">
		<input type="submit" name="submit" value="Update">
	</form>
	
	<br />

	<form method="POST" action="{{route('posts.destroy', $post->id)}}">
		{{csrf_field()}}
		<input type="hidden" name="_method" value="DELETE">
		<input type="submit" value="Delete">
	</form>
		
@endsection

@yield('footer')