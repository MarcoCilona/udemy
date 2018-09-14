@extends('layouts.blog-home')

@section('title', 'Blog')
	
@section('navigation')
	@include('includes.navigation')
@endsection

@section('posts')
	@foreach($posts as $post)
		@include('includes.postTemplate')
	@endforeach
@endsection