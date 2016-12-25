@extends('layouts.main')

@section('title', 'Forum : Edit Forum')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/forum' => 'FORUM',
			'/forum/'.$forum->forum_id => str_limit($forum->title),
			'#' => 'Edit Forum',
		]
	])

@stop

@section('content')

	<div class="row">
		<div class="col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="fa fa-edit"></i> EDIT FORUM</h3>
				</div>
				<div class="panel-body">
					@include('forum._form', ['url' => '/forum/'.$forum->forum_id, 'method' => 'PUT'])
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			@include('forum._panduan')
		</div>
	</div>

@stop
