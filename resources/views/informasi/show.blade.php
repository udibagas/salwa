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

		@if ($informasi->dokumens)
		<div class="list-group">
			@foreach ($informasi->dokumens as $d)
			<a class="list-group-item" href="/{{ $d->file_upload }}" target="_blank">
				<i class="fa fa-download"></i>
				{{ $d->file_upload }}
			</a>
			@endforeach
		</div>
		@endif

		@if ($informasi->images)
		<div class="row no-gutter">
			@each('informasi._images', $informasi->images, 'image')
		</div>
		@endif

		<hr>
		@include('layouts._share')
		<hr>

		<h4 class="title">INFORMASI TERKAIT</h4>
		<div class="row no-gutter">
			@each('informasi._list', $terkait, 'informasi')
		</div>

	</div>
</div>

@stop
