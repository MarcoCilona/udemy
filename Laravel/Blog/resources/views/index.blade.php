@extends('layouts.blog-home')

@section('title', 'Blog')
	
@section('navigation')
	@include('includes.navigation')
@endsection

@section('posts')
	@foreach($posts as $post)
		@section('post_link', route('post.show', $post->id))
		@section('post_title', $post->title)
		@section('post_author', $post->author->name)
		@section('post_date', $post->created_at->diffForHumans())
		@section('post_img', $post->photos->filePath)
		@section('post_abstract', str_limit($post->content, $limit = 100))
		@include('includes.postTemplate')
	@endforeach
@endsection