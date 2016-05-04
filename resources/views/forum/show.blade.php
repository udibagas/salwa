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
		]);
	</div>

	<div class="col-md-7">
		<h1>{{ $forum->title }}</h1><hr />

		@foreach ($posts as $p)

		<div class="alert alert-info">
			<h4>{{ $p->user->name }} | {{ $p->updated ? $p->updated->diffForHumans() : "" }}</h4>
			{!! nl2br($p->description) !!}
		</div>

		@endforeach

		<hr>
		<nav class="text-center">
			{{ $posts->links() }}
		</nav>

		<form class="form-vertical" action="index.html" method="post">
			<div class="form-group">
				<textarea name="komentar" rows="8" class="form-control" placeholder="Tulis komentar"></textarea>
			</div>
			<button type="submit" name="button" class="btn btn-primary"><span class="fa fa-send"></span> Kirim Komentar</button>
		</form>

	</div>

	<div class="col-md-3">
		@include('home.sidebar')
	</div>
</div>



@stop
