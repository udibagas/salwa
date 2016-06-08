@extends('layouts.main')

@section('title', 'Salwa Image : '.$image->judul)

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/image' => 'SALWA IMAGES',
			'#' => $image->judul
		]
	])

@stop

@section('content')

<div class="row">
	<div class="col-md-3">
		@include('image._group')
	</div>
	<div class="col-md-9">
		<h2>{{ $image->judul }}</h2><hr />
		<img src="/{{ $image->img_images }}" alt="{{ $image->judul }}" class="img-responsive" />

		<hr>
		@include('layouts._share')
		<hr>

		<h4 class="title">IMAGE TERKAIT</h4>
		<div class="row no-gutter">
			@each('image._list', $terkait, 'image')
		</div>
	</div>
</div>

@stop
