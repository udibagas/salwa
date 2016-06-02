@extends('layouts.main')

@section('title', ' Informasi : '.$informasi->judul)

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/informasi' => 'INFORMASI',
			'#' => $informasi->judul
		]
	])

@stop

@section('content')

<div class="row">
	<div class="col-md-3">
		@include('informasi._group')
	</div>
	<div class="col-md-9">
		<h1>{{ $informasi->judul }}</h1>
		<i class="fa fa-clock-o"></i> {{ $informasi->updated->diffForHumans() }}
		<hr>

		@if ($informasi->img_gambar)
		<img src="/{{ $informasi->img_gambar }}" class="img-responsive" style="margin-bottom:30px;" alt="" />
		@endif

		{!! $informasi->content !!}

		@if ($dokumens)
		<div class="list-group">
			@foreach ($dokumens as $d)
			<a class="list-group-item" href="/{{ $d->file_upload }}" target="_blank">
				<i class="fa fa-download"></i>
				{{ str_replace('uploads/dirfile_upload/', '' ,$d->file_upload) }}
			</a>
			@endforeach
		</div>
		@endif

		@if ($images)
		<div class="row no-gutter">
			@each('informasi._images', $images, 'image')
		</div>
		@endif

		<hr>
		@include('layouts._share')
		<hr>

		@include('comment.index', [
		'comments' => $informasi->comments()->ofType('informasi')
					->when(! auth()->user()->isAdmin(), function($query) {
						return $query->approved();
					})->get()
		])

		@if (auth()->check())
			@include('comment.form', ['post_id' => $informasi->informasi_id, 'type' => 'informasi'])
		@else
			<div class="alert alert-danger text-center">
				<strong>Silakan <a href="/login">login</a> untuk menulis komentar.</strong>
			</div>
		@endif

		<h4 class="title">INFORMASI TERKAIT</h4>
		<div class="row no-gutter">
			@each('informasi._list', $terkait, 'informasi')
		</div>

	</div>
</div>

@stop
