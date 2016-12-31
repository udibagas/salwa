@extends('layouts.user')

@section('title', 'Comment : Edit Comment')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/'.($comment->commentable_type).'/'.$comment->commentable_id => strtoupper($comment->commentable_type),
			'#' => 'Edit Comment',
		]
	])

@stop

@section('user-content')

	@include('comment.form', [
		'url' => '/comment/'.$comment->id, 'method' => 'PUT',
		'header' => 'EDIT'
	])

@stop
