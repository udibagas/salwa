@extends('layouts.main')

@section('title', 'Aktual : {{ $artikel->judul }}')

@section('content')

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
</div>

<div class="row-post text-center">
	@include('layouts._share')
</div>

@include('comment.mobile.index', [
'comments' => $artikel->comments()
			->when((auth()->check() && !auth()->user()->isAdmin()) || auth()->guest(), function($query) {
				return $query->approved();
			})->get()
])

@if (auth()->check())
	@include('comment.mobile.form', [
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

@include('artikel._group')

@stop
