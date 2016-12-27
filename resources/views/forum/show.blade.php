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
		<h2 style="margin-top:0;">{{ $forum->title }}</h2>
		<hr>
		@include('layouts._share')

		@can('update-forum', $forum)
		<div class="pull-right">
			{!! Form::open(['url' => '/forum/'.$forum->forum_id, 'method' => 'DELETE']) !!}
			{!! Form::hidden('redirect', '/forum') !!}
			<div class="btn-group">
				<a href="/forum/{{ $forum->forum_id }}/edit" class="btn btn-info"><i class="fa fa-edit"></i> Edit Forum</a>
				<button type="submit" name="delete" class="delete btn btn-danger"><i class="fa fa-trash"></i> Delete Forum</button>
			</div>
			{!! Form::close() !!}
		</div>
		@endcan

		<br />
		<br />

		@each('post._list', $posts, 'p')

		<!-- <nav class="text-center">
			{ posts->links() }
		</nav> -->

		@if (auth()->check())

			@if ($forum->close == 'Y')
				<div class="alert alert-danger text-center">
					<strong>Anda tidak dapat berkomentar di thread ini. Forum ini sudah ditutup.</strong>
				</div>
			@elseif ($forum->user && (auth()->user()->jenis_kelamin == $forum->user->jenis_kelamin))
				@include('post._form', ['url' => '/post', 'method' => 'POST'])
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
