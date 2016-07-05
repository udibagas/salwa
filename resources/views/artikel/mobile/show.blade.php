@extends('layouts.main')

@section('title', 'Aktual : '.$artikel->judul)
@section('description', str_limit(strip_tags($artikel->isi), 250))
@section('image', 'http://www.salamdakwah.com/'.$artikel->img_artikel)

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

@if (auth()->check() && auth()->user()->isAdmin())
	{!! Form::open(['method' => 'DELETE']) !!}
		{!! Form::hidden('redirect', '/artikel') !!}
		@include('layouts.delete-btn-mobile')
		@include('layouts.edit-btn-mobile')
		<a href="/artikel/create">@include('layouts.add-btn-mobile')</a>
	{!! Form::close() !!}
@endif

@stop
