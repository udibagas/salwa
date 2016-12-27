@extends('layouts.main')

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

@section('content')

	<div class="col-md-offset-2 col-md-8 col-xs-12">
		@include('post._form', ['url' => '/post/'.$post->post_id, 'method' => 'PUT'])
	</div>
	<div class="clearfix"></div>

@stop
