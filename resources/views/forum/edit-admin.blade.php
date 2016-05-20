@extends('layouts.cms')

@section('title', 'Forum : Edit Forum')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/forum/admin' => 'FORUM',
			'#' => 'Edit Forum',
		]
	])

@stop

@section('cms-content')

	<h4 class="title"><i class="fa fa-edit"></i> Edit Forum</h4>
	@include('forum._form', ['url' => '/forum/'.$forum->forum_id, 'method' => 'PUT'])

@stop
