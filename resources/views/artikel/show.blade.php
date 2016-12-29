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
	<div class="col-sm-3 col-md-3 hidden-xs">
		@include('artikel._group')
	</div>
	<div class="col-sm-6 col-md-6">
		<!-- include('home.promo', ['promo' => \App\Banner::active()->get()]) -->

		<div class="panel panel-default">
			<div class="panel-body">
				<h2>{{ $artikel->judul }}</h2>

				<div class="text-muted">
					{{ $artikel->user ? $artikel->user->name.' - ' : '' }}
					{{ $artikel->created->diffForHumans() }}
				</div>

				<hr>

				@if ($artikel->img_artikel)
				<img src="/{{ $artikel->img_artikel }}" alt="{{ $artikel->judul }}" class="img-responsive" />
				<br>
				@endif

				{!! $artikel->isi !!}
				<hr>
				@include('layouts._share')

			</div>
		</div>

		<comment id="{{ $artikel->artikel_id }}" type="artikel" approved="1"></comment>

		<!-- include('comment.index', [
		'comments' => $artikel->comments()
					->when((auth()->check() && !auth()->user()->isAdmin()) || auth()->guest(), function($query) {
						return $query->approved();
					})->get()
		]) -->

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
	<div class="col-sm-3 col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">ARTIKEL TERKAIT</h3>
			</div>
			<div class="panel-body">
				@each('artikel._list-side', $terkait, 'artikel')
			</div>
		</div>
	</div>
</div>



@stop
