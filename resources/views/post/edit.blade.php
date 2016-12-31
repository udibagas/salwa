@extends('layouts.user')

@section('title', 'Forum : Edit Post')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/forum' => 'FORUM',
			'/forum/'.$post->forum_id => $post->forum->title,
			'#' => 'Edit Post',
		]
	])

@stop

@section('user-content')

	@include('post._form', ['url' => '/post/'.$post->post_id, 'method' => 'PUT'])

@stop
