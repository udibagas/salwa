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

	<div class="row">
		<div class="col-md-3">
			@include('forum._group', [
				'groups' => \App\Group::forum()->orderBy('group_name', 'ASC')->get(),
				'group' => null
			])
		</div>
		<div class="col-md-9">
			<h4 class="title"><i class="fa fa-edit"></i> Edit Post</h4>
			@include('forum._form-komentar', ['url' => '/forum/update-post/'.$post->post_id, 'method' => 'PUT'])
		</div>
	</div>

@stop
