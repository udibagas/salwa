@extends('layouts.main')

@section('title') Salwa Image : {{ $image->judul }} @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/image' => 'SALWA IMAGE',
			'#' => $image->judul
		]
	])

@stop

@section('content')

<div class="row">
	<div class="col-md-8">
		<h1>{{ $image->judul }}</h1><hr />
		<img src="http://www.salamdakwah.com/{{ $image->img_images }}" alt="" class="img img-responsive" style="width:100%" />

		<hr>
		@include('layouts._share', ['url' => url('/image/'.$image->id_salwaimages.'-'.str_slug($image->judul))])
		<hr>

		<h4 class="title">IMAGE TERKAIT</h4>
		<div class="row">
			@foreach ($terkait as $t)
				@include('image._list', ['image' => $t])
			@endforeach
		</div>
	</div>

	<div class="col-md-4">
		@include('home.sidebar')
	</div>
</div>



@stop
