@extends('layouts.main')

@section('title') Aktual : {{ $artikel->judul }} @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/artikel' => 'AKTUAL',
			'#' => $artikel->judul
		]
	])

@stop

@section('content')

<div class="row">
	<div class="col-md-3">
		@include('artikel._group')
	</div>
	<div class="col-md-9">
		<h1>{{ $artikel->judul }}</h1>

		<i class="fa fa-user"></i> {{ $artikel->user ? $artikel->user->name : '' }}
		<i class="fa fa-clock-o"></i> {{ $artikel->updated->diffForHumans() }}
		<hr>

		@if ($artikel->img_artikel)
		<img src="/{{ $artikel->img_artikel }}" style="margin-bottom:30px;" alt="" class="img-responsive" />
		@endif

		{!! $artikel->isi !!}

		<hr>
		@include('layouts._share')
		<hr>

		@include('comment.index', [
		'comments' => $artikel->comments()
					->when((auth()->check() && !auth()->user()->isAdmin()) || auth()->guest(), function($query) {
						return $query->approved();
					})->get()
		])

		@if (auth()->check())
			@include('comment.form', ['commentable_id' => $artikel->artikel_id, 'commentable_type' => 'artikel'])
		@else
			<div class="alert alert-danger text-center">
				<strong>Silakan <a href="/login">login</a> untuk menulis komentar.</strong>
			</div>
		@endif

		<h4 class="title">ARTIKEL TERKAIT</h4>
		<div class="row no-gutter">
			@each('artikel._list', $terkait, 'artikel')
		</div>

	</div>
</div>



@stop
