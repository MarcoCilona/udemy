@extends('layouts.blog-post')

@section('navigation')
	@include('includes.navigation')
@endsection

@section('post_title', $post->title)
@section('post_author', $post->author->name)
@section('post_date', $post->created_at->diffForHumans())
@section('post_img', $post->photos->file_path)
@section('post_content', $post->content)

@section('comment')
	@foreach($comments as $comment)
		@if($comment->is_active == 1)
			@include('includes.commentTemplate')
		@endif
	@endforeach
@endsection