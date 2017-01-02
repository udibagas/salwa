@extends('layouts.main')

@section('title') Forum : {{ $forum->title }} @stop
@section('image', $forum->img)
@section('imageSquare', $forum->imgSquare)
@section('description', str_limit(strip_tags($forum->desc), 200))

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/forum' => 'FORUM',
			'#' => str_limit($forum->title, 60)
		]
	])

@stop

@section('content')

<div class="row">
	<div class="col-sm-3 col-md-3 hidden-xs">
		@include('forum._group', ['group' => $forum->group])
	</div>

	<div class="col-sm-6 col-md-6">
		@if (session('success'))
			<div class="alert alert-success text-center">
				{{ session('success') }}
			</div>
		@endif
		<div class="panel panel-default">
			<div class="panel-body">
				<h2>{{ $forum->title }}</h2>
				<hr>
				@can('update-forum', $forum)
				<div class="pull-right">
					<a href="/forum/{{ $forum->forum_id }}/edit">Edit</a> &bull;
					<a href="#" onclick="event.preventDefault(); if(confirm('Anda yakin?')) {document.getElementById('delete-forum').submit()}">Hapus</a>

					{!! Form::open(['url' => '/forum/'.$forum->forum_id, 'method' => 'DELETE', 'style' => 'display:none;', 'id' => 'delete-forum']) !!}
					{!! Form::hidden('redirect', '/forum') !!}
					{!! Form::close() !!}
				</div>
				@endcan
				@include('layouts._share')
			</div>
		</div>

		@each('post._list', $posts, 'p')

		@if ($forum->status == 'b')
			<div class="alert alert-danger text-center">
				Forum belum disetuji.
			</div>
			
		@elseif (auth()->check())

			@if ($forum->close == 'Y')
				<div class="alert alert-danger text-center">
					Anda tidak dapat berkomentar di thread ini. Forum ini sudah ditutup.
				</div>
			@elseif ($forum->user && (auth()->user()->jenis_kelamin == $forum->user->jenis_kelamin))
				@include('post._form', ['url' => '/post', 'method' => 'POST'])
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

	<div class="col-sm-3 col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">FORUM TERKAIT</h3>
			</div>
			<ul class="list-group">
				@foreach ($terkait as $p)
				<li class="list-group-item">
				<div class="media">
					<div class="media-left">
						<img class="media-object profile img-circle" data-name="{{ $p->title }}" data-width="30" data-height="30" data-font-size="15" />
					</div>
					<div class="media-body">
						<b><a href="/forum/{{ $p->forum_id }}-{{ str_slug($p->title) }}">{{ $p->title }}</a></b><br>
						<div class="text-muted">
							{{ $p->user ? $p->user->name.' - ' : '' }}
							{{ $p->updated->diffForHumans() }}
						</div>
					</div>
				</div>
				</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>



@stop
