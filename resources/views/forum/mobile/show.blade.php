@extends('layouts.main')

@section('title', 'Forum : '.$forum->title)
@section('image', $forum->img)
@section('imageSquare', $forum->imgSquare)
@section('description', str_limit(strip_tags($forum->desc), 200))

@section('content')

	<div class="row-post">
		<h3>{{ $forum->title }}</h3>
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

	@include('forum._group', ['group' => $forum->group])

	{!! Form::open(['method' => 'DELETE']) !!}
		{!! Form::hidden('redirect', '/forum') !!}
		@can('update-forum', $forum)
			@include('layouts.delete-btn-mobile')
			@include('layouts.edit-btn-mobile')
		@endcan
		<a href="/forum/create">@include('layouts.add-btn-mobile')</a>
	{!! Form::close() !!}


@stop
