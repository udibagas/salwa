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
	<div class="col-md-3 hidden-xs">
		@include('image._group')
	</div>
	<div class="col-md-6">
		<h2 style="margin-top:0;">{{ $image->judul }}</h2><hr />
		<img src="/{{ $image->img_images }}" alt="{{ $image->judul }}" class="img-responsive" />

		<hr>
		@include('layouts._share')
	</div>
	<div class="col-md-3">
		<h4 class="title">IMAGE TERKAIT</h4>
		<div class="row no-gutter">
			@each('image._list-side', $terkait, 'image')
		</div>
	</div>
</div>

@stop
