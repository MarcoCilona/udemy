@extends('layouts.app')

@section('title', 'Post Index')

@section('content')

	<ul>
		<li><a href="{{route('posts.edit', $post->id)}}">ID: {{$post->id}}</a></li>
		<li>Title: {{$post->title}}</li>		
		
	</ul>
		
@endsection

@yield('footer')