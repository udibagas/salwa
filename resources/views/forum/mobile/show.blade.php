@extends('layouts.main')

@section('title', 'Forum : '.$forum->title)

@section('content')

	<div class="row-post">
		<h3>{{ $forum->title }}</h3>
		@can('update-forum', $forum)
			{!! Form::open(['url' => '/forum/'.$forum->forum_id, 'method' => 'DELETE']) !!}
			{!! Form::hidden('redirect', '/forum') !!}
			<div class="btn-group">
				<a href="/forum/{{ $forum->forum_id }}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit Forum</a>
				<button type="submit" name="delete" class="delete btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete Forum</button>
			</div>
			{!! Form::close() !!}
		@endcan
	</div>

	<div class="row-post text-center">
		@include('layouts._share')
	</div>

	@each('post.mobile._list', $posts, 'p')

	@if (auth()->check())

		@if ($forum->close == 'Y')
			<div class="row-post text-center text-danger">
				<strong>Anda tidak dapat berkomentar di thread ini. Forum ini sudah ditutup.</strong>
			</div>
		@elseif ($forum->user && (auth()->user()->jenis_kelamin == $forum->user->jenis_kelamin))
			@include('post.mobile._form', ['url' => '/post', 'method' => 'POST'])
		@else
			<div class="row-post text-center text-danger">
				<strong>Anda tidak dapat berkomentar di thread ini. Forum Akhwat dan Ikhwan kami pisahkan.</strong>
			</div>
		@endif

	@else
		<div class="row-post text-center text-danger">
			<strong>Silakan <a href="/login">Login</a> untuk menulis komentar.</strong>
		</div>
	@endif

	<h4 class="title">FORUM TERKAIT</h4>
	@each('forum.mobile._list', $terkait, 'a')

	@include('forum._group', [
		'group' => $forum->group,
		'groups' => \App\Group::active()->forum()->orderBy('group_name', 'ASC')->get()
	])

	<a href="/forum/create">
		<img class="profile img-circle" data-name="+" style="position:fixed;bottom:20px;right:20px;" data-font-size="40" />
	</a>

@stop
