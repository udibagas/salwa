@extends('layouts.main')

@section('title', 'Informasi : '.$informasi->judul)
@section('image', $informasi->img)
@section('imageSquare', $informasi->imgSquare)
@section('description', str_limit(strip_tags($informasi->content), 250))

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/informasi' => 'INFORMASI',
			'#' => str_limit($informasi->judul)
		]
	])

@stop

@section('content')

<div class="row">
	<div class="col-sm-3 col-md-3 hidden-xs">
		@include('informasi._group')
	</div>
	<div class="col-sm-6 col-md-6">
		<div class="panel panel-default">
			<div class="panel-body">
				<h2>{{ $informasi->judul }}</h2>
				<div class="text-muted">
					{{ $informasi->updated->diffForHumans() }}
				</div>
				<hr>

				<img src="{{ $informasi->img }}" class="img-responsive" alt="{{ $informasi->judul }}" />

				<br>

				{!! $informasi->content !!}

				@if ($images)
				<div class="row no-gutter">
					@each('informasi._images', $images, 'image')
				</div>
				@endif


				<hr>
				@include('layouts._share')
			</div>
		</div>

		@if (count($dokumens))
		<div class="list-group">
			@foreach ($dokumens as $d)
			<a class="list-group-item" href="/{{ $d->file_upload }}" target="_blank">
				<i class="fa fa-download"></i>
				{{ str_replace('uploads/dirfile_upload/', '' ,$d->file_upload) }}
			</a>
			@endforeach
		</div>
		@endif

		@include('comment.index', [
		'comments' => $informasi->comments()
					->when((auth()->check() && !auth()->user()->isAdmin()) || auth()->guest(), function($query) {
						return $query->approved();
					})->get()
		])

		@if (auth()->check())
			@include('comment.form', [
				'url' => '/comment', 'method' => 'POST',
				'comment' => new \App\Comment([
					'commentable_id' => $informasi->informasi_id,
					'commentable_type' => 'informasi'
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
				<h3 class="panel-title">INFORMASI TERKAIT</h3>
			</div>
			<div class="panel-body">
				@each('informasi._list-side', $terkait, 'informasi')
			</div>
		</div>
	</div>
</div>

@stop
