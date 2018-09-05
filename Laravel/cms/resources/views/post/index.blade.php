@extends('layouts.app')

@section('title', 'Post Index')

@section('content')

	<ul>
		@foreach($posts as $post)
			
			<li><a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a></li>

		@endforeach
	</ul>
		
@endsection

@yield('footer')