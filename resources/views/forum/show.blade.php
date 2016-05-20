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
	<div class="col-md-3">
		@include('forum.list-category', [
			'group' => $forum->group,
			'groups' => \App\Group::forum()->orderBy('group_name', 'ASC')->get()
		])
	</div>

	<div class="col-md-9">
		<h1>{{ $forum->title }}</h1>
		<hr>
		@include('layouts._share')

		@if ($forum->user_id == auth()->user()->user_id)
		<a href="/forum/{{ $forum->forum_id }}/edit"><i class="fa fa-edit" class="btn btn-primary"></i> Edit Forum</a>
		@endif
		<hr />

		@foreach ($posts as $p)
			@include('forum._list-komentar')
		@endforeach

		<nav class="text-center">
			{{ $posts->links() }}
		</nav>

		@if (auth()->check())

			@if ($forum->close == 'Y')
				<div class="alert alert-danger text-center">
					Anda tidak dapat berkomentar di thread ini. Forum ini sudah ditutup.
				</div>
			@elseif (auth()->user()->jenis_kelamin == $forum->user->jenis_kelamin)
				@include('forum._form-komentar')
			@else
				<div class="alert alert-danger text-center">
					Anda tidak dapat berkomentar di thread ini. Forum Akhwat dan Ikhwan kami pisahkan.
				</div>
			@endif

		@else
			<div class="alert alert-danger text-center">
				Silakan <a href="/login">Login</a> untuk menulis komentar.
			</div>
		@endif

	</div>

	<!-- <div class="col-md-3">
		include('home.sidebar')
	</div> -->
</div>



@stop
