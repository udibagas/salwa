@extends('layouts.main')

@section('title', 'Forum : Edit Post')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/forum' => 'FORUM',
			'#' => 'Edit Post',
		]
	])

@stop

@section('content')

	<div class="col-md-offset-2 col-md-8">
		@include('forum._form-komentar', ['url' => '/forum/update-post/'.$post->post_id, 'method' => 'PUT'])
	</div>
	<div class="clearfix"></div>

@stop
