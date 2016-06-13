@extends('layouts.main')

@section('title', 'Aktual : {{ $artikel->judul }}')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/artikel' => 'AKTUAL',
			'#' => str_limit($artikel->judul)
		]
	])

@stop

@section('content')

@include('artikel._group')

<div class="row-post">
	<h3>{{ $artikel->judul }}</h3>
	<small>
		{{ $artikel->user ? $artikel->user->name.' | ' : '' }} {{ $artikel->created->diffForHumans() }}
	</small>

	<br>
	<br>

	@if ($artikel->img_artikel)
	<img class="img-responsive" src="/{{ $artikel->img_artikel }}" alt="{{ $artikel->judul }}">
	@endif

	<br>

	{!! $artikel->isi !!}
	<div class="text-center">
		@include('layouts._share')
	</div>
	<br>
</div>

<br>

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
@each('artikel.mobile._list', $terkait, 'a')

@stop
