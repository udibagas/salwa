@extends('layouts.main')

@section('title', 'Comment : Edit Comment')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/'.($comment->commentable_type).'/'.$comment->commentable_id => strtoupper($comment->commentable_type),
			'#' => 'Edit Comment',
		]
	])

@stop

@section('content')

	<div class="col-md-offset-2 col-md-8">
		@include('comment.form', [
			'url' => '/comment/'.$comment->id, 'method' => 'PUT',
			'header' => 'Edit'
		])
	</div>
	<div class="clearfix"></div>

@stop
