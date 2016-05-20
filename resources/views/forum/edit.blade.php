@extends('layouts.main')

@section('title', 'Forum : Edit Forum')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/forum' => 'FORUM',
			'#' => 'Edit Forum',
		]
	])

@stop

@section('content')

	<div class="row">
		<div class="col-md-3">
			@include('forum.list-category', [
				'groups' => \App\Group::forum()->orderBy('group_name', 'ASC')->get(),
				'group' => null
			])
		</div>
		<div class="col-md-9">
			<h4 class="title"><i class="fa fa-edit"></i> Edit Forum</h4>
			@include('forum._form', ['url' => '/forum/'.$forum->forum_id, 'method' => 'PUT'])
		</div>
	</div>

@stop
