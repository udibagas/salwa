@extends('layouts.main')

@section('title', 'Informasi : {{ $peduli->judul }}')

@section('content')

<div class="row-post">
	<h3>{{ $peduli->judul }}</h3>
	<small>
		{{ $peduli->group ? $peduli->group->group_name.' | ' : '' }} {{ $peduli->created->diffForHumans() }}
	</small>

	<br>
	<br>

	@if ($peduli->img_artikel)
	<img class="img-responsive" src="/{{ $peduli->img_artikel }}" alt="{{ $peduli->judul }}">
	@endif

	<br>

	{!! $peduli->isi !!}

</div>

<div class="row-post text-center">
	@include('layouts._share')
</div>

@include('comment.mobile.index', [
'comments' => $peduli->comments()
			->when((auth()->check() && !auth()->user()->isAdmin()) || auth()->guest(), function($query) {
				return $query->approved();
			})->get()
])

@if (auth()->check())
	@include('comment.mobile.form', [
		'url' => '/comment', 'method' => 'POST',
		'comment' => new \App\Comment([
			'commentable_id' => $peduli->peduli_id,
			'commentable_type' => 'peduli'
		])
	])
@else
	<div class="alert alert-danger text-center">
		<strong>Silakan <a href="/login">login</a> untuk menulis komentar.</strong>
	</div>
@endif

<h4 class="title">TERKAIT</h4>
@each('peduli.mobile._list', $terkait, 'a')

@include('peduli._group')

@stop
