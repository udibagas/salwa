@extends('layouts.main')

@section('title') Salwa Image : {{ $image->judul }} @stop

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
	<div class="col-md-9">
		<h1>{{ $image->judul }}</h1><hr />
		<img src="http://www.salamdakwah.com/{{ $image->img_images }}" alt="" class="img-responsive" />

		<hr>
		@include('layouts._share')
		<hr>

		<h4 class="title">IMAGE TERKAIT</h4>
		<div class="row no-gutter">
			@foreach ($terkait as $t)
				@include('image._list', ['image' => $t])
			@endforeach
		</div>
	</div>

	<div class="col-md-3">
		@include('home.sidebar')
	</div>
</div>



@stop
