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
		@section('comment_img', $comment->authorName->photos->filePath)
		@section('comment_date', $comment->created_at->diffForHumans())
		@section('comment_body', $comment->body)
		@include('includes.commentTemplate')
	@endforeach
@endsection