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
		<!-- include('home.promo', ['promo' => \App\Banner::active()->get()]) -->

		<h1>{{ $artikel->judul }}</h1>

		<i class="fa fa-user"></i> {{ $artikel->user ? $artikel->user->name : '' }}
		<i class="fa fa-clock-o"></i> {{ $artikel->updated->diffForHumans() }}
		<hr>

		@if ($artikel->img_artikel)
		<div style="width:600px;height:300px;margin-bottom:30px;" class="thumbnail">
			<img src="/{{ $artikel->img_artikel }}" alt="{{ $artikel->judul }}" class="cover" />
		</div>
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
			@include('comment.form', [
				'url' => '/comment', 'method' => 'POST',
				'comment' => new \App\Comment([
					'commentable_id' => $artikel->artikel_id,
					'commentable_type' => 'artikel'
				])
			])
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
