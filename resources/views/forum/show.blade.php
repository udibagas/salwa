@extends('layouts.main')

@section('title') Forum : {{ $forum->title }} @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/forum' => 'FORUM',
			'/forum-category/'.$forum->group_id.'-'.str_slug($forum->group->group_name) => $forum->group->group_name,
			'#' => $forum->title
		]
	])

@stop

@section('content')

<div class="row">
	<div class="col-md-2">
		@include('forum.list-category', [
			'group' => $forum->group,
			'groups' => \App\Group::forum()->orderBy('group_name', 'ASC')->get()
		])
	</div>

	<div class="col-md-7">
		<h1>{{ $forum->title }}</h1><hr />

		@foreach ($posts as $p)
			@include('forum._list-komentar')
		@endforeach

		<nav class="text-center">
			{{ $posts->links() }}
		</nav>

		@if (!Auth::check())
			@include('forum._form-komentar')
		@endif

	</div>

	<div class="col-md-3">
		@include('home.sidebar')
	</div>
</div>



@stop
