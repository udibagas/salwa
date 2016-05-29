@extends('layouts.main')

@section('title', 'Forum : Create New Thread')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/forum' => 'FORUM',
			'#' => 'New Thread',
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
			<h4 class="title">Buat Thread Baru</h4>
			@include('forum._form', ['method' => 'POST', 'url' => '/forum'])
		</div>
	</div>

@endsection
