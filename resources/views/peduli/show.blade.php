@extends('layouts.main')

@section('title') Salwa Peduli : {{ $peduli->judul }} @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/peduli' => 'SALWA PEDULI',
			'#' => str_limit($peduli->judul)
		]
	])

@stop

@section('content')

<div class="row">
	<div class="col-md-3 hidden-xs">
		@include('peduli._group')
	</div>
	<div class="col-md-6">
		<h2 style="margin-top:0;">{{ $peduli->judul }}</h2>
		<div class="text-muted">
			{{ $peduli->updated->diffForHumans() }}
		</div>
		<hr>

		@if ($peduli->img_artikel)
		<img src="/{{ $peduli->img_artikel }}" class="img-responsive" alt="{{ $peduli->judul }}" />
		@else
		<img src="/images/salwa-peduli.jpg" class="img-responsive" alt="{{ $peduli->judul }}" />
		@endif

		<br>

		{!! $peduli->isi !!}

		<hr>
		@include('layouts._share')
		<hr>

		@include('comment.index', [
		'comments' => $peduli->comments()
					->when((auth()->check() && !auth()->user()->isAdmin()) || auth()->guest(), function($query) {
						return $query->approved();
					})->get()
		])

		@if (auth()->check())
			@include('comment.form', [
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

	</div>
	<div class="col-md-3">
		<h4 class="title">TERKAIT</h4>
		@each('peduli._list-side', $terkait, 'peduli')
	</div>
</div>



@stop
