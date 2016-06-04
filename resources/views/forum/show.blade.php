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
		@include('forum._group', [
			'group' => $forum->group,
			'groups' => \App\Group::forum()->orderBy('group_name', 'ASC')->get()
		])
	</div>

	<div class="col-md-9">
		<h1>{{ $forum->title }}</h1>
		<hr>
		@include('layouts._share')

		@can('update-forum', $forum)
		<a href="/forum/{{ $forum->forum_id }}/edit" class="btn btn-info"><i class="fa fa-edit" class="btn btn-primary"></i> Edit Forum</a>
		@endcan
		<hr />

		@each('forum._list-komentar', $posts, 'p')

		<!-- <nav class="text-center">
			{ posts->links() }
		</nav> -->

		@if (auth()->check())

			@if ($forum->close == 'Y')
				<div class="alert alert-danger text-center">
					<strong>Anda tidak dapat berkomentar di thread ini. Forum ini sudah ditutup.</strong>
				</div>
			@elseif ($forum->user && (auth()->user()->jenis_kelamin == $forum->user->jenis_kelamin))
				@include('forum._form-komentar', ['url' => '/forum/comment/'.$forum->forum_id, 'method' => 'POST'])
			@else
				<div class="alert alert-danger text-center">
					<strong>Anda tidak dapat berkomentar di thread ini. Forum Akhwat dan Ikhwan kami pisahkan.</strong>
				</div>
			@endif

		@else
			<div class="alert alert-danger text-center">
				<strong>Silakan <a href="/login">Login</a> untuk menulis komentar.</strong>
			</div>
		@endif

		<h4 class="title">FORUM TERKAIT</h4>
		<ul class="list-group">
			@foreach ($terkait as $p)
			<li class="list-group-item">
				<b><a href="/forum/{{ $p->forum_id }}-{{ str_slug($p->title) }}">{{ $p->title }}</a></b><br>
				<i class="fa fa-user"></i> {{ $p->user ? $p->user->name : '' }}
				<i class="fa fa-clock-o"></i> {{ $p->updated->diffForHumans() }}
			</li>
			@endforeach
		</ul>

	</div>
</div>



@stop
