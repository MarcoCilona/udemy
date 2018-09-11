@extends('layouts.admin')

@section('styles')

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">

@endsection

@section('title', 'Upload new photo')

@section('content')
	
	@section('header', 'Upload file')

	{!! Form::open(['method'=>'POST', 'action'=>'AdminMediaController@store', 'file'=>true, 'class'=>'dropzone']) !!}

		

	{!! Form::close() !!}

@endsection

@section('footer')

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

@endsection