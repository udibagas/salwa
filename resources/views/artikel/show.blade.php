@extends('layouts.main')

@section('title') Aktual : {{ $artikel->judul }} @stop
@section('image', 'http://www.salamdakwah.com/'.$artikel->img_artikel)
@section('description', str_limit(strip_tags($artikel->isi), 250))

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/artikel' => 'AKTUAL',
			'#' => str_limit($artikel->judul)
		]
	])

@stop

@section('content')

<div class="row">
	<div class="col-md-3 hidden-xs">
		@include('artikel._group')
	</div>
	<div class="col-md-6">
		<!-- include('home.promo', ['promo' => \App\Banner::active()->get()]) -->

		<h2 style="margin-top:0;">{{ $artikel->judul }}</h2>

		<div class="text-muted">
			{{ $artikel->user ? $artikel->user->name.' - ' : '' }}
			{{ $artikel->updated->diffForHumans() }}
		</div>

		<hr>

		@if ($artikel->img_artikel)
		<div style="height:300px;margin-bottom:30px;" class="thumbnail">
			<img src="/{{ $artikel->img_artikel }}" alt="{{ $artikel->judul }}" class="img-responsive cover" />
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
	</div>
	<div class="col-md-3">
		<h4 class="title">ARTIKEL TERKAIT</h4>
		@each('artikel._list-side', $terkait, 'artikel')
	</div>
</div>



@stop
