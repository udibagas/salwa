@extends('layouts.main')

@section('title', 'Forum : Edit Forum')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/forum' => 'FORUM',
			'/forum/'.$forum->forum_id => $forum->title,
			'#' => 'Edit Forum',
		]
	])

@stop

@section('content')

	<div class="col-md-offset-2 col-md-8 col-xs-12">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-edit"></i> Edit Forum</h3>
			</div>
			<div class="panel-body">
				@include('forum._form', ['url' => '/forum/'.$forum->forum_id, 'method' => 'PUT'])
			</div>
		</div>
	</div>
	<div class="clearfix"></div>

@stop
