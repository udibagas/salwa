@extends('layouts.main')

@section('title') Salwa Peduli : {{ $peduli->judul }} @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/peduli' => 'SALWA PEDULI',
			'#' => $peduli->judul
		]
	])

@stop

@section('content')

<div class="row">
	<div class="col-md-3">
		@include('peduli._group')
	</div>
	<div class="col-md-9">
		<h1>{{ $peduli->judul }}</h1>
		<i class="fa fa-clock-o"></i> {{ $peduli->updated->diffForHumans() }}
		<br /><br />

		@if ($peduli->img_artikel)
		<img src="/{{ $peduli->img_artikel }}" class="img-responsive" style="margin-bottom:30px;" alt="" />
		@endif

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

		<h4 class="title">SALWA PEDULI</h4>
		<div class="row no-gutter">
			@each('peduli._list', $terkait, 'peduli')
		</div>

	</div>
</div>



@stop
